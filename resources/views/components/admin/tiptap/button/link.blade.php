<div data-tiptap-dropdown class="dropdown-center">
    <button data-tiptap-link-button data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
        <x-admin.icon :name="'link-45deg'" :width="25" :height="25"/>
    </button>

    <div class="dropdown-menu shadow-md mt-1 p-2 pt-3">
        <div style="width: 240px" class="d-flex flex-column gap-2">
            <x-admin.field.text
                :placeholder="__('tiptap.link.address')"
                :size="'sm'"
                :fieldAttrs="'data-tiptap-link-address'"
                :required="false"
            />

            <x-admin.field.checkbox
                :title="__('tiptap.link.target')"
                :fieldAttrs="'data-tiptap-link-target'"
                :required="false"
            />

            <div class="d-flex gap-2">
                <button data-tiptap-link-delete type="button" class="btn btn-sm d-flex flex-column btn-outline-danger p-1 disabled ms-auto">
                    <x-admin.icon :name="'trash'" :width="20" :height="20"/>
                </button>

                <button data-tiptap-link-create type="button" class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                    <x-admin.icon :name="'floppy'" :width="20" :height="20"/>
                </button>
            </div>
        </div>
    </div>
</div>
