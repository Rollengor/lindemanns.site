export function italicButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-italic-button]');

    if (!btn) {
        console.error('Error! Not found "italic" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleItalic().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('italic'));
    }
}
