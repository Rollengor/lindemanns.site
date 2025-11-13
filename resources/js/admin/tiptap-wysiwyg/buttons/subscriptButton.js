export function subscriptButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-subscript-button]');

    if (!btn) {
        console.error('Error! Not found "subscript" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleSubscript().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('subscript'));
    }
}
