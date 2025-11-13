export function underlineButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-underline-button]');

    if (!btn) {
        console.error('Error! Not found "underline" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleUnderline().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('underline'));
    }
}
