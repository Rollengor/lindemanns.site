@if($serviceCategories)
    <section class="services">
        <div class="container services-container">
            @foreach($serviceCategories as $category)
                <div class="services-row">
                    <div class="services-row-body">
                        <h3 class="services-row-title">{{ $category->name }}</h3>
                        <ul>
                            @foreach($category->services as $service)
                                <li><a href="{{ route('public.services.post', $service->slug) }}" class="primary-link">{{ $service->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <img
                        @php
                            $categoryImage = $category->hasMedia($category->mediaHero) ? $category->getFirstMedia($category->mediaHero) : '/img/default.svg';
                            $categoryImageSizes = [
                                'md' => is_object($categoryImage) ? $categoryImage->getUrl('md-webp') : $categoryImage,
                                'lg' => is_object($categoryImage) ? $categoryImage->getUrl('lg-webp') : $categoryImage
                            ];
                        @endphp

                        srcset="
                            {{ $categoryImageSizes['md'] }},
                            {{ $categoryImageSizes['lg'] }} 1.5x,
                            {{ $categoryImageSizes['lg'] }} 2x
                        "
                        src="{{ $categoryImageSizes['lg'] }}"
                        alt="{{ $category->name }}"
                        class="img services-row-image"
                        loading="lazy"
                    >
                </div>
            @endforeach
        </div>
    </section>
@endif
