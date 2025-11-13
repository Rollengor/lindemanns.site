export function headingButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-heading-button]');
    const levels = instance.options.extensions?.find(el => el.name === 'heading')?.options?.levels || [1, 2, 3, 4, 5, 6];

    if (!btn) {
        console.error('Error! Not found "heading" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');

    levels.forEach(level => {
        const levelBtn = dropdown.querySelector(`[data-tiptap-h-button="${level}"]`);

        if (!levelBtn) return;

        levelBtn.addEventListener('click', () => instance.chain().focus().toggleHeading({ level: level }).run());

        instance.on('update', toggleLevelActiveClass);
        instance.on('selectionUpdate', toggleLevelActiveClass);

        function toggleLevelActiveClass() {
            levelBtn.classList.toggle('active', instance.isActive('heading', { level: level }));
        }
    });

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        btn.classList.toggle('active', !!dropdown.querySelector(`[data-tiptap-h-button].active`));
    }
}
