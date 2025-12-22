<?php

namespace App\Http\Controllers\Public\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioPageController extends Controller
{
    public function index(): View {
        $projects = [
            [
                'image' => '/img/temp/project-7.webp?v-2',
                'title' => 'The center of Zürich',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-8.webp?v-2',
                'title' => 'Salt Spring Villa & Spa',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-9.webp?v-2',
                'title' => 'Red Rock Villa',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-1.webp?v-2',
                'title' => 'Basel Art District Loft',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-2.webp?v-2',
                'title' => 'St. Moritz Chalet',
                'description' => 'Ultra-luxury alpine retreat blending traditional swiss craftsmanship with contemporary design excellence.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-6.webp?v-2',
                'title' => 'Basel Art District Loft',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-7.webp?v-2',
                'title' => 'The center of Zürich',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-8.webp?v-2',
                'title' => 'Salt Spring Villa & Spa',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
            [
                'image' => '/img/temp/project-9.webp?v-2',
                'title' => 'Red Rock Villa',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias debitis dolorem labore odio quasi totam vel.',
                'categories' => ['Lake Zurich', 'New Build'],
            ],
        ];

        return view('public.pages.portfolio.page', compact('projects'));
    }
}
