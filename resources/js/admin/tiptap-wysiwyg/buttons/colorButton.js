import * as bootstrap from 'bootstrap';

export function colorButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-color-button]');

    if (!btn) {
        console.error('Error! Not found "color" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');
    const colorPicker = dropdown.querySelector(`[data-tiptap-color-picker]`);
    const deleteButton = dropdown.querySelector(`[data-tiptap-color-delete]`);
    const presetButtons = dropdown.querySelectorAll(`[data-tiptap-color-preset]`);

    colorPicker.addEventListener('input', () => instance.chain().focus().setColor(colorPicker.value).run());

    deleteButton.addEventListener('click', () => instance.chain().focus().unsetColor().run());

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
        btn.classList.toggle('active', !!instance.getAttributes('textStyle').color);
        deleteButton.classList.toggle('disabled', !instance.getAttributes('textStyle').color);
    }

    function toggleActiveColor() {
        colorPicker.value = instance.getAttributes('textStyle').color || '#000000';
    }
}
