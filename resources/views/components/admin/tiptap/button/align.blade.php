<div data-tiptap-dropdown class="dropdown-center">
    <button data-tiptap-text-align-button data-bs-toggle="dropdown" aria-expanded="false" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
        <x-admin.icon :name="'text-left'" :width="25" :height="25"/>
    </button>

    <div class="dropdown-menu shadow-md mt-1 p-2">
        <div class="d-flex flex-column gap-2">
            <button data-tiptap-align-button="right" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
                <x-admin.icon :name="'text-right'" :width="20" :height="20"/>
            </button>

            <button data-tiptap-align-button="center" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
                <x-admin.icon :name="'text-center'" :width="20" :height="20"/>
            </button>

            <button data-tiptap-align-button="justify" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
                <x-admin.icon :name="'justify'" :width="20" :height="20"/>
            </button>
        </div>
    </div>
</div>
