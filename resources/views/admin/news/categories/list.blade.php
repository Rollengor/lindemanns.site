@foreach($categories as $category)
    <div class="d-flex align-items-center px-3 px-sm-4 py-2 border-bottom border-dark border-opacity-25 gap-3">
        <div class="col fw-semibold">{{ $category->name }}</div>
        {{--@if($category->description)
            <div class="col-12 col-sm line-clamp-2 line-clamp-sm-1 mt-2 mt-sm-0">{!! $category->description !!}</div>
        @endif--}}
        <div class="col-auto d-flex align-items-center justify-content-end gap-3">
            @if(!$category->active)
                <x-admin.icon
                    class="me-auto"

                    :name="'eye-slash'"
                    :width="'30'"
                    :height="'30'"
                />
            @endif

            <x-admin.ajax.delete-modal-button
                :subtitle="$category->name"
                :deleteAction="route('admin.news.category.delete', $category->id)"
                :updateIdSection="'categories-list'"
            />

            <x-admin.ajax.view-modal-button
                class="btn-sm p-2"

                :action="route('admin.news.category.edit', $category->id)"
                :modal_id="'category-edit-modal'"

                :iconName="'pen'"
            />
        </div>
    </div>
@endforeach

@if($categories->isEmpty())
    <x-admin.empty-message/>
@endif
