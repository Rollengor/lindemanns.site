<div data-tiptap-dropdown class="dropdown-center">
    <button data-tiptap-youtube-button data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
        <x-admin.icon :name="'youtube'" :width="25" :height="25"/>
    </button>

    <div class="dropdown-menu shadow-md mt-1 p-2 pt-3">
        <div style="width: 240px" class="d-flex flex-column gap-2">
            <div class="d-flex flex-column gap-3">
                <x-admin.field.text
                    :placeholder="__('tiptap.youtube.address')"
                    :size="'sm'"
                    :fieldAttrs="'data-tiptap-youtube-address'"
                    :required="false"
                />

                <div class="grid gap-2">
                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-youtube-width="20" type="radio" name="tiptap-youtube-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">20%</span>
                        </label>
                    </div>

                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-youtube-width="25" type="radio" name="tiptap-youtube-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">25%</span>
                        </label>
                    </div>

                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-youtube-width="50" type="radio" name="tiptap-youtube-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">50%</span>
                        </label>
                    </div>

                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-youtube-width="100" type="radio" name="tiptap-youtube-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">100%</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <div class="d-flex gap-2">
                    <label class="d-block">
                        <input data-tiptap-youtube-position="left" type="radio" name="tiptap-youtube-position" class="btn-check" autocomplete="off">
                        <span class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                            <x-admin.icon :name="'text-indent-left'" :width="20" :height="20"/>
                        </span>
                    </label>

                    <label class="d-block">
                        <input data-tiptap-youtube-position="center" type="radio" name="tiptap-youtube-position" class="btn-check" autocomplete="off">
                        <span class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                            <x-admin.icon :name="'text-center'" :width="20" :height="20"/>
                        </span>
                    </label>

                    <label class="d-block">
                        <input data-tiptap-youtube-position="right" type="radio" name="tiptap-youtube-position" class="btn-check" autocomplete="off">
                        <span class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                            <x-admin.icon :name="'text-indent-right'" :width="20" :height="20"/>
                        </span>
                    </label>
                </div>

                <button data-tiptap-youtube-create type="button" class="btn btn-sm d-flex flex-column btn-outline-secondary p-1 ms-auto">
                    <x-admin.icon :name="'floppy'" :width="20" :height="20"/>
                </button>
            </div>
        </div>
    </div>
</div>
