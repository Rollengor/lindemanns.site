<div data-tiptap-dropdown class="dropdown-center">
    <button data-tiptap-highlight-button data-bs-toggle="dropdown" aria-expanded="false" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
        <x-admin.icon :name="'highlighter'" :width="25" :height="25"/>
    </button>

    <div class="dropdown-menu shadow-md mt-1 p-2">
        <div class="d-flex flex-column gap-2">
            <div class="d-flex gap-2">
                <label class="d-block position-relative pt-4 pb-1 ps-5 pe-2 overflow-hidden rounded-1 cursor-pointer flex-fill">
                    <input data-tiptap-color-picker style="scale: 2.6 1.5" type="color" class="w-100 h-100 position-absolute start-0 top-0 cursor-pointer">
                </label>

                <button data-tiptap-color-delete type="button" class="btn btn-sm d-flex btn-outline-danger p-1 disabled">
                    <x-admin.icon :name="'trash'" :width="20" :height="20"/>
                </button>
            </div>

            <div class="d-flex gap-2">
                <button data-tiptap-color-preset="#4855E3" style="background-color: #4855E3;" type="button" class="btn btn-sm pt-3 ps-3 pe-1 pb-1"></button>
                <button data-tiptap-color-preset="#ff0000" style="background-color: #ff0000;" type="button" class="btn btn-sm pt-3 ps-3 pe-1 pb-1"></button>
                <button data-tiptap-color-preset="#009900" style="background-color: #009900;" type="button" class="btn btn-sm pt-3 ps-3 pe-1 pb-1"></button>
                <button data-tiptap-color-preset="#ffcc00" style="background-color: #ffcc00;" type="button" class="btn btn-sm pt-3 ps-3 pe-1 pb-1"></button>
            </div>
        </div>
    </div>
</div>
