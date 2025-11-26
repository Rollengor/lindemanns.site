<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index(): View {
        $projects = [
            [
                'image' => '/img/temp/project-1.webp',
                'title' => 'Basel Art District Loft',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-2.webp',
                'title' => 'St. Moritz Chalet',
                'description' => 'Ultra-luxury alpine retreat blending traditional swiss craftsmanship with contemporary design excellence.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-3.webp',
                'title' => 'Lausanne Heigths',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-4.webp',
                'title' => 'Zurich Green Tower',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
        ];

        return view('public.pages.home', compact('projects'));
    }
}
