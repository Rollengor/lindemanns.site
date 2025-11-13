<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(Request $request): View {
        $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }

    public function password(Request $request): View {
        return view('admin.profile.password');
    }
}
