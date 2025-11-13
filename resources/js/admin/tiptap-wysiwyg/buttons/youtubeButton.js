import * as bootstrap from 'bootstrap';

export function youtubeButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-youtube-button]');

    if (!btn) {
        console.error('Error! Not found "youtube" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');
    const youtubeAddress = dropdown.querySelector(`[data-tiptap-youtube-address]`);
    const createButton = dropdown.querySelector(`[data-tiptap-youtube-create]`);

    createButton.addEventListener('click', () => {
        const youtubeWidth = dropdown.querySelector(`[data-tiptap-youtube-width]:checked`);
        const youtubePosition = dropdown.querySelector(`[data-tiptap-youtube-position]:checked`);
        const options = {
            src: youtubeAddress.value.trim(),
            dataWidth: youtubeWidth?.dataset?.tiptapYoutubeWidth || null,
            dataPosition: youtubePosition?.dataset?.tiptapYoutubePosition || null,
        };

        setYoutubeVideo(options);
    });

    function setYoutubeVideo(options) {
        instance.commands.setYoutubeVideo(options);
    }

    instance.on('selectionUpdate', () => {
        toggleActiveClass();
        toggleActiveAttributes();
    });

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('youtube'));
    }

    function toggleActiveAttributes() {
        let youtubeWidth, youtubePosition;

        if (instance.isActive('youtube')) {
            youtubeWidth = dropdown.querySelector(`[data-tiptap-youtube-width="${instance.getAttributes('youtube').dataWidth}"]`);
            youtubePosition = dropdown.querySelector(`[data-tiptap-youtube-position="${instance.getAttributes('youtube').dataPosition}"]`);
        } else {
            youtubeWidth = dropdown.querySelector(`[data-tiptap-youtube-width]:checked`);
            youtubePosition = dropdown.querySelector(`[data-tiptap-youtube-position]:checked`);
        }

        if (youtubeWidth) {
            youtubeWidth.checked = instance.isActive('youtube');
        }

        if (youtubePosition) {
            youtubePosition.checked = instance.isActive('youtube');
        }

        youtubeAddress.value = instance.getAttributes('youtube').src || '';
        youtubeAddress.dispatchEvent(new Event('input', { bubbles: true }));
    }
}
