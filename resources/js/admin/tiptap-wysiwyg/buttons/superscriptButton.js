export function superscriptButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-superscript-button]');

    if (!btn) {
        console.error('Error! Not found "superscript" button');
        return;
    }

    btn.addEventListener('click', () => instance.chain().focus().toggleSuperscript().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('superscript'));
    }
}
