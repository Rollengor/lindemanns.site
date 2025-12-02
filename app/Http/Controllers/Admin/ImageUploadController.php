<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,webp|max:20480',
        ]);

        $file = $request->file('image');
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('temp', $fileName, 'public');

        $url = Storage::url($path);

        $result = [
            [
                'url' => $url,
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
            ]
        ];

        return response()->json([
            'result' => $result,
        ]);
    }
}
