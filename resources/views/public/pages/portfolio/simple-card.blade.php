<div class="project-simple-card">
    <img
        @php
            $projectImage = $project->hasMedia($project->mediaHero) ? $project->getFirstMedia($project->mediaHero) : '/img/default.svg';
            $projectImageSizes = [
                'md' => is_object($projectImage) ? $projectImage->getUrl('md-webp') : $projectImage,
                'lg' => is_object($projectImage) ? $projectImage->getUrl('lg-webp') : $projectImage
            ];
        @endphp

        srcset="
            {{ $projectImageSizes['md'] }},
            {{ $projectImageSizes['lg'] }} 1.5x,
            {{ $projectImageSizes['lg'] }} 2x
        "
        src="{{ $projectImageSizes['lg'] }}"
        alt="{{ $project->title }}"
        class="img-cover project-simple-card-image"
        loading="lazy"
    >
    <h4 class="project-simple-card-title">{{ $project->title }}</h4>
    <div class="project-simple-card-tags">
        @foreach($project['tags'] as $tag)
            <p>{{ $tag }}</p>
        @endforeach
    </div>
    <a href="{{ route('public.portfolio.project', $project->slug) }}" class="project-simple-card-link"></a>
</div>
