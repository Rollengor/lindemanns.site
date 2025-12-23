@foreach($projects as $project)
    <div class="d-flex flex-column flex-sm-row align-items-sm-center px-3 px-sm-4 py-2 border-bottom border-dark border-opacity-25">
        {{--<div class="col-12 col-md-3 col-hd-2 fw-semibold">{{ $project->title }}</div>
        @if($project->short_description ?: $project->description)
            <div class="col-12 col-sm line-clamp-2 mt-2 mt-sm-0 px-0 px-sm-3">{!! $project->short_description ?: $project->description !!}</div>
        @endif--}}
        <div class="col-12 col-sm pe-0 pe-sm-3">
            <div class="fw-semibold">{{ $project->title }}</div>
            @if($project->short_description)
                <div style="font-size: 14px;" class="line-clamp-1 text-gray">{!! $project->short_description !!}</div>
            @endif
        </div>
        <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end gap-3 mt-2 mt-sm-0">
            <div class="me-auto pe-1">
                {{--<div style="font-size: 14px;" class="text-gray">{{ $project->category->name }}</div>--}}
            </div>

            @if(!$project->active)
                <x-admin.icon
                    :name="'eye-slash'"
                    :width="'30'"
                    :height="'30'"
                />
            @endif

            <x-admin.ajax.delete-modal-button
                :subtitle="$project->title"
                :deleteAction="route('admin.portfolio.project.delete', $project->id)"
                :updateIdSection="'projects-list'"
            />

            <x-admin.ajax.view-modal-button
                class="btn-sm p-2"

                :action="route('admin.portfolio.project.edit', $project->id)"
                :modal_id="'project-edit-modal'"

                :iconName="'pen'"
            />
        </div>
    </div>
@endforeach

@if($projects->isEmpty())
    <x-admin.empty-message/>
@endif
