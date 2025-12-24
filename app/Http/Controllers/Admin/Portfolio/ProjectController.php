<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\Project\StoreRequest;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

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

            $project->description = $project->processImagesInDescription($project->description);
            $project->save();

            if ($request->hasFile('hero_image')) {
                $project->addMediaFromRequest('hero_image')
                    ->toMediaCollection($project->mediaHero);
            }

            foreach ($request->input('files') ?? [] as $index => $fileData) {
                $file = $request->file("files.{$index}.file");

                $project->addMedia($file)
                    ->withCustomProperties([
                        'name' => $fileData['name'],
                    ])
                    ->toMediaCollection($project->mediaFiles);
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

    public function getViewProjects(): View|string {
        $projects = Project::all();

        return view('admin.portfolio.projects.list', compact('projects'))->render();
    }
}
