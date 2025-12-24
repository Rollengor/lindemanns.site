<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasImageProcessing
{
    public static function bootHasImageProcessing()
    {
        static::saving(function ($model) {
            if ($model->isDirty('description')) {
                $model->handleDescriptionImages();
            }
        });
    }

    protected function handleDescriptionImages()
    {
        $oldJson = $this->getRawOriginal('description');
        $newJson = $this->getAttributes()['description'];

        $oldStandardizedJson = json_decode($oldJson, true);
        $newStandardizedJson = json_decode($newJson, true);

        if ($oldStandardizedJson && $oldStandardizedJson !== $newStandardizedJson) {
            $oldUrls = [];
            $newUrls = [];

            foreach (supported_languages_keys() as $lang) {
                $oldDescription = $oldStandardizedJson[$lang] ?? '';
                $newDescription = $newStandardizedJson[$lang] ?? '';

                preg_match_all('/<img[^>]+src=["\'](\/media\/[^"\']+)["\'][^>]*>/i', $oldDescription, $oldImages);
                preg_match_all('/<img[^>]+src=["\'](\/media\/[^"\']+)["\'][^>]*>/i', $newDescription, $newImages);

                $oldUrls = array_merge($oldUrls, $oldImages[1] ?? []);
                $newUrls = array_merge($newUrls, $newImages[1] ?? []);
            }

            $deletedUrls = array_diff(array_unique($oldUrls), array_unique($newUrls));
            $this->cleanupDeletedMedia($deletedUrls);
        }
    }

    protected function cleanupDeletedMedia(array $urls)
    {
        foreach ($urls as $url) {
            if (preg_match('/\/media\/(\d+)\//', $url, $matches)) {
                $mediaId = $matches[1];

                $media = Media::find($mediaId);

                if ($media) {
                    $media->delete();
                }
            }
        }
    }

    public function processImagesInDescription(string $content): string
    {
        $pattern = '/<img([^>]+)src=["\'](\/storage\/temp\/[^"\']+)["\']([^>]*)>/i';

        return preg_replace_callback($pattern, function ($matches) {
            $attributesBeforeSrc = $matches[1];
            $tempUrl = $matches[2];
            $attributesAfterSrc = $matches[3];

            $diskPath = str_replace('/storage/', '', $tempUrl);
            $diskName = 'public';

            if (!Storage::disk($diskName)->exists($diskPath)) {
                return $matches[0];
            }

            try {
                $media = $this
                    ->addMediaFromDisk($diskPath, $diskName)
                    ->toMediaCollection($this->mediaCollection);

                Storage::disk($diskName)->delete($diskPath);

            } catch (\Exception $exception) {
                Log::error(__('errors.upload_image_failed'), ['exception' => $exception]);

                return $matches[0];
            }

            $smUrl = $media->getUrl('sm-webp');
            $mdUrl = $media->getUrl('md-webp');
            $lgUrl = $media->getUrl('lg-webp');

            $smUrl = $this->getRelativeUrl($smUrl);
            $mdUrl = $this->getRelativeUrl($mdUrl);
            $lgUrl = $this->getRelativeUrl($lgUrl);

            return sprintf(
                '<img %s src="%s" srcset="%s 450w, %s 900w, %s 1800w" %s>',
                trim($attributesBeforeSrc),
                $mdUrl,
                $smUrl,
                $mdUrl,
                $lgUrl,
                trim($attributesAfterSrc)
            );
        }, $content) ?: $content;
    }

    private function getRelativeUrl(string $url): string
    {
        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['scheme']) && isset($parsedUrl['host'])) {
            $url = preg_replace('/^(http|https):\/\/[^\/]+/', '', $url);
        }

        return $url;
    }
}
