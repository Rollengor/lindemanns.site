import * as bootstrap from 'bootstrap';

export function imageButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-image-button]');

    if (!btn) {
        console.error('Error! Not found "image" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');
    const imageFile = dropdown.querySelector(`[data-tiptap-image-file]`);
    const imageName = dropdown.querySelector(`[data-tiptap-image-name]`);
    const imageAddress = dropdown.querySelector(`[data-tiptap-image-address]`);
    const imageTitle = dropdown.querySelector(`[data-tiptap-image-title]`);
    const createButton = dropdown.querySelector(`[data-tiptap-image-create]`);

    imageFile.addEventListener('change', () => {
        imageName.innerHTML = imageFile?.files[0]?.name || imageName.dataset.tiptapImageName;
    });

    createButton.addEventListener('click', () => {
        if (dropdown.isWaitingResponse) return;

        const imgFile = imageFile.files[0];
        const imgWidth = dropdown.querySelector(`[data-tiptap-image-width]:checked`);
        const imgPosition = dropdown.querySelector(`[data-tiptap-image-position]:checked`);
        const options = {
            src: imageAddress.value.trim(),
            alt: imageTitle.value.trim() || 'image',
            dataWidth: imgWidth?.dataset?.tiptapImageWidth || null,
            dataPosition: imgPosition?.dataset?.tiptapImagePosition || null,
        };

        imageAddress.value = '';
        imageTitle.value = '';

        if (imgWidth) {
            imgWidth.checked = false;
        }

        if (imgPosition) {
            imgPosition.checked = false;
        }

        if (options.src) {
            setImage(options);
            return;
        }

        if (imgFile) {
            dropdown.isWaitingResponse = true;
            dropdown.classList.add('sending');

            const reader = new FileReader();

            reader.onload = function(event) {
                const img = new Image();
                img.onload = function() {
                    options.width = `${img.width}px`;
                    options.height = `${img.height}px`;
                };
                img.src = event.target.result;
            };

            reader.readAsDataURL(imgFile);

            const formData = new FormData();
            const uploadUrl = btn.dataset.uploadUrl;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            formData.append('_token', csrfToken);
            formData.append('image', imgFile);

            axios.post(uploadUrl, formData)
                .then(function(response) {
                    options.src = response.data.result[0].url;
                    setImage(options);
                })
                .catch(function(error) {
                    const errors = error?.response?.data?.errors;
                    const message = error?.response?.data?.message;

                    if (errors) {
                        console.error(errors);
                    } else {
                        console.error(message);
                    }
                })
                .finally(() => {
                    dropdown.isWaitingResponse = false;
                    dropdown.classList.remove('sending');
                });
        }
    });

    function setImage(options) {
        instance.commands.setImage(options);
    }

    instance.on('selectionUpdate', () => {
        toggleActiveClass();
        toggleActiveAttributes();
    });

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('image'));
    }

    function toggleActiveAttributes() {
        let imgWidth, imgPosition;

        if (instance.isActive('image')) {
            imgWidth = dropdown.querySelector(`[data-tiptap-image-width="${instance.getAttributes('image').dataWidth}"]`);
            imgPosition = dropdown.querySelector(`[data-tiptap-image-position="${instance.getAttributes('image').dataPosition}"]`);
        } else {
            imgWidth = dropdown.querySelector(`[data-tiptap-image-width]:checked`);
            imgPosition = dropdown.querySelector(`[data-tiptap-image-position]:checked`);
        }

        imageFile.value = '';
        imageAddress.value = instance.getAttributes('image').src || '';
        imageTitle.value = instance.getAttributes('image').alt || '';

        if (imgWidth) {
            imgWidth.checked = instance.isActive('image');
        }

        if (imgPosition) {
            imgPosition.checked = instance.isActive('image');
        }

        imageFile.dispatchEvent(new Event('change', { bubbles: true }));
        imageAddress.dispatchEvent(new Event('input', { bubbles: true }));
        imageTitle.dispatchEvent(new Event('input', { bubbles: true }));
    }
}
