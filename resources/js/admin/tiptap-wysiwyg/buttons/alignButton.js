export function alignButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-text-align-button]');
    const aligns = ['right', 'center', 'justify'];

    if (!btn) {
        console.error('Error! Not found "align" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');

    aligns.forEach(align => {
        const alignBtn = dropdown.querySelector(`[data-tiptap-align-button="${align}"]`);

        if (!alignBtn) return;

        alignBtn.addEventListener('click', () => instance.chain().focus()[!instance.isActive({ textAlign: align }) ? 'setTextAlign' : 'unsetTextAlign'](align).run());

        instance.on('update', toggleLevelActiveClass);
        instance.on('selectionUpdate', toggleLevelActiveClass);

        function toggleLevelActiveClass() {
            alignBtn.classList.toggle('active', instance.isActive({ textAlign: align }));
        }
    });

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', !!dropdown.querySelector(`[data-tiptap-align-button].active`));
    }
}
