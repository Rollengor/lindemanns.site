<div data-tiptap-dropdown class="dropdown-center">
    <button data-tiptap-list-button data-bs-toggle="dropdown" aria-expanded="false" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
        <x-admin.icon :name="'list-ol'" :width="25" :height="25"/>
    </button>

    <div class="dropdown-menu shadow-md mt-1 p-2">
        <div class="d-flex flex-column gap-2">
            <button data-tiptap-ul-button type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
                <x-admin.icon :name="'list-ul'" :width="20" :height="20"/>
            </button>

            <button data-tiptap-ol-button type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
                <x-admin.icon :name="'list-ol'" :width="20" :height="20"/>
            </button>
        </div>
    </div>
</div>
