<x-admin.modal.content
    :size="'xl'"
    :title="__('admin.editing')"
>
    <x-slot:body>
        <x-admin.control-form
            action="{{ route('admin.news.article.update', $article->id) }}"
            id="edit-article-control-form"

            :method="'PATCH'"
            :isUpdateFromView="true"
            :updateIdSection="'articles-list'"
        >
            @include('admin.news.articles.fields')
        </x-admin.control-form>
    </x-slot:body>

    <x-slot:footer>
        <x-admin.button
            class="me-auto"
            data-bs-dismiss="modal"
            :title="__('admin.cancel')"
            :btn="'btn-danger'"
        />

        <x-admin.button
            :type="'submit'"
            :form="'edit-article-control-form'"
            :withLoader="true"
            :title="__('admin.save')"
            :iconName="'floppy'"
        />
    </x-slot:footer>
</x-admin.modal.content>
