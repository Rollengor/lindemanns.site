<div data-tiptap-dropdown class="dropdown-center">
    <button data-tiptap-image-button data-upload-url="{{ route('admin.image.upload') }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" type="button" class="btn btn-sm d-flex btn-outline-secondary p-1">
        <x-admin.icon :name="'image'" :width="25" :height="25"/>
    </button>

    <div class="dropdown-menu shadow-md mt-1 p-2 pt-3">
        <div style="width: 240px" class="d-flex flex-column gap-2">
            <div class="d-flex flex-column gap-3">
                <label class="d-flex align-items-center justify-content-center btn btn-sm btn-secondary position-relative gap-2">
                    <input data-tiptap-image-file type="file" accept=".png, .jpg, .jpeg, .webp" class="visually-hidden w-100 start-0 bottom-0">
                    <x-admin.icon :name="'upload'" :width="15" :height="15"/>
                    <span data-tiptap-image-name="{{ __('tiptap.image.upload') }}" style="max-width: calc(100% - 26px)" class="d-block text-center text-truncate">{{ __('tiptap.image.upload') }}</span>
                </label>

                <x-admin.field.text
                    :placeholder="__('tiptap.image.address')"
                    :size="'sm'"
                    :fieldAttrs="'data-tiptap-image-address'"
                    :required="false"
                />

                <x-admin.field.text
                    :placeholder="__('tiptap.image.title')"
                    :size="'sm'"
                    :fieldAttrs="'data-tiptap-image-title'"
                    :required="false"
                />

                <div class="grid gap-2">
                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-image-width="20" type="radio" name="tiptap-image-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">20%</span>
                        </label>
                    </div>

                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-image-width="25" type="radio" name="tiptap-image-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">25%</span>
                        </label>
                    </div>

                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-image-width="50" type="radio" name="tiptap-image-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">50%</span>
                        </label>
                    </div>

                    <div class="g-col-3">
                        <label class="d-block">
                            <input data-tiptap-image-width="100" type="radio" name="tiptap-image-size" class="btn-check" autocomplete="off">
                            <span class="d-block btn btn-sm btn-outline-secondary">100%</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <div class="d-flex gap-2">
                    <label class="d-block">
                        <input data-tiptap-image-position="left" type="radio" name="tiptap-image-position" class="btn-check" autocomplete="off">
                        <span class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                            <x-admin.icon :name="'text-indent-left'" :width="20" :height="20"/>
                        </span>
                    </label>

                    <label class="d-block">
                        <input data-tiptap-image-position="center" type="radio" name="tiptap-image-position" class="btn-check" autocomplete="off">
                        <span class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                            <x-admin.icon :name="'text-center'" :width="20" :height="20"/>
                        </span>
                    </label>

                    <label class="d-block">
                        <input data-tiptap-image-position="right" type="radio" name="tiptap-image-position" class="btn-check" autocomplete="off">
                        <span class="btn btn-sm d-flex flex-column btn-outline-secondary p-1">
                            <x-admin.icon :name="'text-indent-right'" :width="20" :height="20"/>
                        </span>
                    </label>
                </div>

                <button data-tiptap-image-create type="button" class="btn btn-sm d-flex flex-column btn-outline-secondary p-1 submit-loader ms-auto">
                    <x-admin.icon :name="'floppy'" :width="20" :height="20"/>

                    <span class="submit-loader-spinner">
                        <span class="spinner-border m-auto text-secondary"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
