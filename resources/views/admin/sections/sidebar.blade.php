@php
    $user = auth()->user();

    $menu = [
            [
                'title' => __('titles.main'),
                'url' => 'admin.main',
                'icon' => 'buildings',
                'submenu' => [],
                'isCan' => true,
            ],
            [
                'title' => __('titles.home'),
                'url' => 'admin.home.page',
                'icon' => 'house',
                'submenu' => [],
                'isCan' => $user->can('all'),
            ],
            [
                'title' => __('titles.clarity'),
                'url' => 'admin.clarity.page',
                'icon' => 'gem',
                'submenu' => [],
                'isCan' => $user->can('all'),
            ],
            [
                'title' => __('titles.performance'),
                'url' => 'admin.performance.page',
                'icon' => 'columns-gap',
                'submenu' => [],
                'isCan' => $user->can('all'),
            ],
            [
                'title' => __('titles.framework'),
                'url' => 'admin.framework.page',
                'icon' => 'shadows',
                'submenu' => [],
                'isCan' => $user->can('all'),
            ],
            [
                'title' => __('titles.learning'),
                'url' => 'admin.learning',
                'icon' => 'mortarboard',
                'submenu' => [
                    [
                        'title' => __('SEO'),
                        'url' => 'admin.learning.page',
                        'groupUrl' => 'admin.learning.page*',
                        'icon' => null,
                        'submenu' => [],
                        'isCan' => $user->can('all'),
                    ],
                    [
                        'title' => __('titles.categories'),
                        'url' => 'admin.learning.categories',
                        'groupUrl' => 'admin.learning.categor*',
                        'icon' => null,
                        'submenu' => [],
                        'isCan' => $user->can('all'),
                    ],
                    [
                        'title' => __('titles.articles'),
                        'url' => 'admin.learning.articles',
                        'groupUrl' => 'admin.learning.article*',
                        'icon' => null,
                        'submenu' => [],
                        'isCan' => $user->can('all'),
                    ],
                ],
                'isCan' => $user->can('all'),
            ],
            [
                'title' => __('titles.login'),
                'url' => 'admin.login.page',
                'icon' => 'lock',
                'submenu' => [],
                'isCan' => $user->can('all'),
            ],
        ];
@endphp

<aside id="adminSidebar" class="sidebar d-flex flex-column bg-secondary text-white active">
    <div class="sidebar-header d-flex align-items-center gap-4 lh-sm border-bottom border-white border-opacity-25 shadow-sm py-2 px-3 position-relative">
        <a href="{{ route('public.home') }}" target="_blank" class="position-relative rounded-circle">
            <img src="/img/icons/logo.svg" alt="Logo" width="36" class="img-fluid p-1">
        </a>

        <span>{{ config('app.name') }}</span>

        <button id="adminSidebarToggler" type="button" class="d-flex btn btn-secondary position-absolute start-100 px-1 py-2 rounded-0 rounded-end">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="/img/icons/bootstrap-icons.svg#three-dots-vertical"/>
            </svg>
        </button>
    </div>

    <div data-overlayscrollbars-initialize class="sidebar-body flex-scroll">
        <nav id="accordionMenu" class="accordion sidebar-menu">
            @foreach($menu as $link)
                @if(!$link['isCan'])
                    @continue
                @endif

                @if(empty($link['submenu']))
                    <div class="accordion-item">
                        <a href="{{ $link['url'] !== '#' ? route($link['url']) : '#' }}" class="accordion-button gap-3 {{ request()->routeIs([$link['url'], $link['url'].'.*']) ? 'active' : '' }}">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="/img/icons/bootstrap-icons.svg#<?= $link['icon'] ?? 'circle'; ?>"/>
                            </svg>
                            <span><?= $link['title']; ?></span>
                        </a>
                    </div>
                @else
                    <div class="accordion-item">
                        <button class="accordion-button gap-3 {{ request()->routeIs($link['url'].'.*') ? 'active' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMenu{{ preg_replace('/\s+/', '', $link['title']) }}">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="/img/icons/bootstrap-icons.svg#{{ $link['icon'] ?? 'circle' }}"/>
                            </svg>
                            <span>{{ $link['title'] }}</span>
                        </button>

                        <div id="accordionMenu{{ preg_replace('/\s+/', '', $link['title']) }}" class="accordion-collapse collapse {{ request()->routeIs($link['url'].'.*') ? 'show' : '' }}" data-bs-parent="#accordionMenu">
                            @foreach($link['submenu'] as $sublink)
                                @if(!$sublink['isCan'])
                                    @continue
                                @endif

                                <div class="accordion-item">
                                    <a href="{{ $sublink['url'] !== '#' ? route($sublink['url']) : '#' }}" class="accordion-button gap-3 py-2 {{ request()->routeIs($sublink['groupUrl'] ? $sublink['groupUrl'] : $sublink['url']) ? 'active' : '' }}">
                                        <svg class="bi" width="20" height="20" fill="currentColor">
                                            <use xlink:href="/img/icons/bootstrap-icons.svg#<?= $sublink['icon'] ?? 'dot'; ?>"/>
                                        </svg>
                                        <span><?= $sublink['title']; ?></span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </nav>
    </div>

    <div class="sidebar-footer">

    </div>
</aside>
