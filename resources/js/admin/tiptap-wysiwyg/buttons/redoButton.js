export function redoButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-redo-button]');

    if (!btn) {
        console.error('Error! Not found "redo" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().redo().run());

    instance.on('update', () => {
        btn.classList.toggle('disabled', !instance.can().redo());
    });
}
