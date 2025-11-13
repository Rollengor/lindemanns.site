export function undoButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-undo-button]');

    if (!btn) {
        console.error('Error! Not found "undo" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().undo().run());

    instance.on('update', () => {
        btn.classList.toggle('disabled', !instance.can().undo());
    });
}
