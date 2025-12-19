<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\Service\StoreRequest;
use App\Http\Requests\Admin\Services\Service\UpdateRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View {
        $services = Service::latest()->get();

        return view('admin.services.services.index', compact('services'));
    }

    public function create(Request $request): View|JsonResponse|string {
        $categories = ServiceCategory::all();

        if ($request->ajax()) {
            return view('admin.services.services.create', compact('categories'))->render();
        }

        abort(404);
    }

    public function store(StoreRequest $request): View|JsonResponse|string {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $service = Service::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.service_store_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.service_store_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return $this->getViewServices();
        }

        abort(404);
    }

    public function edit(Request $request, Service $service): View|JsonResponse|string {
        $data = [
            'service' => $service,
            'categories' => ServiceCategory::all(),
        ];

        if ($request->ajax()) {
            return view('admin.news.articles.edit', $data)->render();
        }

        abort(404);
        //return view('admin.news.articles.test-edit', $data)->render();
    }

    public function update(UpdateRequest $request, Service $service): View|JsonResponse|string {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $service->updateOrFail($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.service_update_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.service_update_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return $this->getViewServices();
        }

        abort(404);
        //return redirect()->back();
    }

    public function delete(Request $request, Service $service) {
        try {
            DB::beginTransaction();

            $service->deleteOrFail();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(__('errors.service_delete_failed'), ['exception' => $exception]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => __('errors.service_delete_failed'),
                    'error' => $exception->getMessage(),
                ], 500);
            }

            if(app()->environment('local')) dd($exception);
            return redirect()->back()->with('error', __('errors.general'));
        }

        if ($request->ajax()) {
            return $this->getViewServices();
        }

        abort(404);
    }

    public function getViewServices(): View|string {
        $services = Service::all();

        return view('admin.services.services.list', compact('services'))->render();
    }
}
