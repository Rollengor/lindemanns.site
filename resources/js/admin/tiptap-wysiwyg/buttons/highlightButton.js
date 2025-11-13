import * as bootstrap from 'bootstrap';

export function highlightButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-highlight-button]');

    if (!btn) {
        console.error('Error! Not found "highlight" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');
    const colorPicker = dropdown.querySelector(`[data-tiptap-color-picker]`);
    const deleteButton = dropdown.querySelector(`[data-tiptap-color-delete]`);
    const presetButtons = dropdown.querySelectorAll(`[data-tiptap-color-preset]`);

    colorPicker.addEventListener('input', () => instance.chain().focus().setHighlight({ color: colorPicker.value }).run());

    deleteButton.addEventListener('click', () => instance.chain().focus().unsetHighlight().run());

    presetButtons.forEach(presetBtn => {
        presetBtn.addEventListener('click', () => {
            colorPicker.value = presetBtn.dataset.tiptapColorPreset;
            colorPicker.dispatchEvent(new Event('input', { bubbles: true }));
        });
    });

    instance.on('update', () => {
        toggleActiveClass();
        toggleActiveColor();
    });
    instance.on('selectionUpdate', () => {
        toggleActiveClass();
        toggleActiveColor();
    });

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('highlight'));
        deleteButton.classList.toggle('disabled', !instance.isActive('highlight'));
    }

    function toggleActiveColor() {
        colorPicker.value = instance.getAttributes('highlight').color || '#000000';
    }
}
