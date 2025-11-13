export function strikeButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-strike-button]');

    if (!btn) {
        console.error('Error! Not found "strike" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleStrike().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('strike'));
    }
}
