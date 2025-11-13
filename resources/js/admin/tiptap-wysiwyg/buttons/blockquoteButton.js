export function blockquoteButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-blockquote-button]');

    if (!btn) {
        console.error('Error! Not found "blockquote" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleBlockquote().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('blockquote'));
    }
}
