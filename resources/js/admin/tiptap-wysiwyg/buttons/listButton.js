export function listButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-list-button]');
    const aligns = ['right', 'center', 'justify'];

    if (!btn) {
        console.error('Error! Not found "list" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');
    const ulButton = dropdown.querySelector(`[data-tiptap-ul-button]`);
    const olButton = dropdown.querySelector(`[data-tiptap-ol-button]`);

    ulButton.addEventListener('click', () => instance.chain().focus().toggleBulletList().run());
    olButton.addEventListener('click', () => instance.chain().focus().toggleOrderedList().run());

    instance.on('update', toggleActiveClass);
    instance.on('selectionUpdate', toggleActiveClass);

    function toggleActiveClass() {
        ulButton.classList.toggle('active', instance.isActive('bulletList'));
        olButton.classList.toggle('active', instance.isActive('orderedList'));
        btn.classList.toggle('active', ulButton.classList.contains('active') || olButton.classList.contains('active'));
    }
}
