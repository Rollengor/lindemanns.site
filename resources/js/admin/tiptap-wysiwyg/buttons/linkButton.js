import * as bootstrap from 'bootstrap';

export function linkButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-link-button]');

    if (!btn) {
        console.error('Error! Not found "link" button');
        return;
    }

    const dropdown = btn.closest('[data-tiptap-dropdown]');
    const linkAddress = dropdown.querySelector(`[data-tiptap-link-address]`);
    const linkTarget = dropdown.querySelector(`[data-tiptap-link-target]`);
    const createButton = dropdown.querySelector(`[data-tiptap-link-create]`);
    const deleteButton = dropdown.querySelector(`[data-tiptap-link-delete]`);

    createButton.addEventListener('click', () => {
        instance.chain().focus().extendMarkRange('link').setLink({ href: linkAddress.value, target: linkTarget.checked ? '_blank' : null }).run()
    });

    deleteButton.addEventListener('click', () => {
        linkAddress.value = '';
        linkTarget.checked = false;
        instance.chain().focus().unsetLink().run();
        linkAddress.dispatchEvent(new Event('input', { bubbles: true }));
    });

    instance.on('update', () => {
        toggleActiveClass();
        toggleActiveAddress();
        toggleActiveTarget();
    });
    instance.on('selectionUpdate', () => {
        toggleActiveClass();
        toggleActiveAddress();
        toggleActiveTarget();
    });

    function toggleActiveClass() {
        btn.classList.toggle('active', instance.isActive('link'));
        deleteButton.classList.toggle('disabled', !instance.getAttributes('link').href);
    }

    function toggleActiveAddress() {
        linkAddress.value = instance.getAttributes('link').href || '';
    }

    function toggleActiveTarget() {
        linkTarget.checked = instance.getAttributes('link').target === '_blank';
        linkAddress.dispatchEvent(new Event('input', { bubbles: true }));
    }
}
