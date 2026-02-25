<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\Project\StoreRequest;
use App\Http\Requests\Admin\Portfolio\Project\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProjectController extends Controller
{
    public function index(): View {
        $projects = Project::latest()->get();

        return view('admin.portfolio.projects.index', compact('projects'));
    }

    public function create(Request $request): View|JsonResponse|string {
        if ($request->ajax()) {
            return view('admin.portfolio.projects.create')->render();
        }

        abort(404);
    }

    public function store(StoreRequest $request): View|JsonResponse|string {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $project = Project::create($data);

            $project->description = $project->processImagesInDescription($project->getAttributes()['description']);
            $project->save();

            if ($request->hasFile('hero_image')) {
                $project->addMediaFromRequest('hero_image')
                    ->toMediaCollection($project->mediaHero);
            }

            foreach ($request->input('new_files') ?? [] as $index => $fileData) {
                $file = $request->file("new_files.{$index}.file");
                $fileName = $fileData['name'];

                if (!$file || !$fileName) continue;

                $project->addMedia($file)
                    ->withCustomProperties([
                        'name' => $fileName,
                    ])
                    ->toMediaCollection($project->mediaFiles);
            }

            foreach ($request->input('gallery') ?? [] as $index => $data) {
                $image = data_get($request->file('gallery'), $index . '.image');

                if ($image) {
                    $project->addMedia($image)->toMediaCollection($project->mediaGallery)->update(['order_column' => $index]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.project_store_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.project_store_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return response()->json([
                'toast' => [
                    'type' => 'success',
                    'message' => __('admin.success_create_data'),
                ],
                'html' => $this->getViewProjects(),
            ]);
        }

        abort(404);
    }

    public function edit(Request $request, Project $project): View|JsonResponse|string {
        if ($request->ajax()) {
            return view('admin.portfolio.projects.edit', compact('project'))->render();
        }

        // return view('admin.portfolio.projects.show-edit', compact('project'));

        abort(404);
    }

    public function update(UpdateRequest $request, Project $project): View|JsonResponse|RedirectResponse|string {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $project->updateOrFail($data);

            $project->description = $project->processImagesInDescription($project->getAttributes()['description']);
            $project->save();

            if ($request->hasFile('hero_image')) {
                $project->clearMediaCollection($project->mediaHero);
                $project->addMediaFromRequest('hero_image')
                    ->toMediaCollection($project->mediaHero);
            }

            foreach ($request->input('current_files') ?? [] as $id => $fileData) {
                $fileName = $fileData['name'];

                if (!$id || !$fileName) continue;

                $file = Media::find($id);

                $file->setCustomProperty('name', $fileName);
                $file->save();
            }

            foreach ($request->input('new_files') ?? [] as $index => $fileData) {
                $file = $request->file("new_files.{$index}.file");
                $fileName = $fileData['name'];

                if (!$file || !$fileName) continue;

                $project->addMedia($file)
                    ->withCustomProperties([
                        'name' => $fileName,
                    ])
                    ->toMediaCollection($project->mediaFiles);
            }

            $galleryCurrentMediaIds = collect($request->input('gallery', []))->pluck('media_id')->all();

            foreach ($request->input('gallery') ?? [] as $index => $data) {
                $media_id = data_get($data, key: 'media_id');
                $image = data_get($request->file('gallery'), $index . '.image');
                $media = Media::find($media_id);

                if ($media && $image) {
                    $media->delete();
                }

                if ($image) {
                    $media = $project->addMedia($image)->toMediaCollection($project->mediaGallery);

                    $galleryCurrentMediaIds[] = $media->id;
                }

                if ($media) {
                    $media->update(['order_column' => $index]);
                }
            }

            $galleryToDelete = $project->getMedia($project->mediaGallery)->whereNotIn('id', $galleryCurrentMediaIds);

            $galleryToDelete->each->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.project_update_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.project_update_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return response()->json([
                'toast' => [
                    'type' => 'success',
                    'message' => __('admin.success_update_data'),
                ],
                'html' => $this->getViewProjects(),
            ]);
        }

        // return redirect()
        //     ->back()
        //     ->with('success', __('admin.success_update_data'));

        abort(404);
    }

    public function delete(Request $request, Project $project) {
        try {
            DB::beginTransaction();

            $project->deleteOrFail();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.project_delete_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.project_delete_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return response()->json([
                'toast' => [
                    'type' => 'success',
                    'message' => __('admin.success_delete_data'),
                ],
                'html' => $this->getViewProjects(),
            ]);
        }

        abort(404);
    }

    public function deleteFile(Request $request, Media $media) {
        $project = Project::find($media->model_id);

        try {
            DB::beginTransaction();

            $media->deleteOrFail();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.file_delete_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.file_delete_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return response()->json([
                'toast' => [
                    'type' => 'success',
                    'message' => __('admin.success_delete_data'),
                ],
                'html' => view('admin.portfolio.projects.files', compact('project'))->render(),
            ]);
        }

        abort(404);
    }

    public function getViewProjects(): View|string {
        $projects = Project::latest()->get();

        return view('admin.portfolio.projects.list', compact('projects'))->render();
    }
}
