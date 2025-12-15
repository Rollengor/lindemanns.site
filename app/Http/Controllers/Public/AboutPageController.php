<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    public function index(): View {
        $leaders = [
            [
                'image' => '/img/temp/about-leader-1.webp',
                'name' => 'Dr. Alexander Lindemann',
                'position' => 'Founder, LINDEMANNS REAL GMBH',
                'info' => [
                    [
                        'head' => '110+',
                        'value' => 'in successful real estate transactions.',
                    ],
                    [
                        'head' => 'CHF 12 billion',
                        'value' => 'in successful real estate transactions.',
                    ],
                ]
            ],
            [
                'image' => '/img/temp/about-leader-2.webp',
                'name' => 'Shynar Lindemann',
                'position' => 'Co-Founder, LINDEMANNS REAL GMBH',
                'info' => [
                    [
                        'head' => '110+',
                        'value' => 'in successful real estate transactions.',
                    ],
                    [
                        'head' => 'CHF 12 billion',
                        'value' => 'in successful real estate transactions.',
                    ],
                ]
            ],
        ];

        return view('public.pages.about', compact('leaders'));
    }
}
