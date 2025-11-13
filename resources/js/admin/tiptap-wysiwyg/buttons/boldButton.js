export function boldButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-bold-button]');

    if (!btn) {
        console.error('Error! Not found "bold" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleBold().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('bold'));
    }
}
