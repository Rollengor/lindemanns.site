<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait HasImageProcessing
{
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
