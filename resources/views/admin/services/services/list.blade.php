@foreach($services as $service)
    <div class="d-flex flex-column flex-sm-row align-items-sm-center px-3 px-sm-4 py-2 border-bottom border-dark border-opacity-25">
        {{--<div class="col-12 col-md-3 col-hd-2 fw-semibold">{{ $service->title }}</div>
        @if($service->short_description ?: $service->description)
            <div class="col-12 col-sm line-clamp-2 mt-2 mt-sm-0 px-0 px-sm-3">{!! $service->short_description ?: $service->description !!}</div>
        @endif--}}
        <div class="col-12 col-sm pe-0 pe-sm-3">
            <div class="fw-semibold">{{ $service->title }}</div>
            @if($service->description)
                <div style="font-size: 14px;" class="line-clamp-1 text-gray">{!! $service->description !!}</div>
            @endif
        </div>
        <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end gap-3 mt-2 mt-sm-0">
            <div class="me-auto pe-1">
                <div style="font-size: 14px;" class="text-gray">{{ $service->category->name }}</div>
            </div>

            @if(!$service->active)
                <x-admin.icon
                    :name="'eye-slash'"
                    :width="'30'"
                    :height="'30'"
                />
            @endif

            <x-admin.ajax.delete-modal-button
                :subtitle="$service->title"
                :deleteAction="route('admin.services.service.delete', $service->id)"
                :updateIdSection="'services-list'"
            />

            <x-admin.ajax.view-modal-button
                class="btn-sm p-2"

                :action="route('admin.services.service.edit', $service->id)"
                :modal_id="'service-edit-modal'"

                :iconName="'pen'"
            />
        </div>
    </div>
@endforeach

@if($services->isEmpty())
    <x-admin.empty-message/>
@endif
