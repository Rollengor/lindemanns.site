<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DeleteModalController extends Controller
{
    public function show(Request $request): View|JsonResponse|string {
        $validator = Validator::make($request->all(), [
            'subtitle' => ['required', 'string'],
            'delete_action' => ['required', 'url'],
            'update_id_section' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error validation data',
                'error' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        if ($request->ajax()) {
            return view('admin.confirm-delete-content', $data)->render();
        }

        abort(404);
    }
}
