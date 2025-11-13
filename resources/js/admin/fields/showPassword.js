export function showPassword() {
    const fields = document.querySelectorAll('[data-ssp-field]');

    fields.forEach(field => {
        if (field?.switchShowPasswordInited) return;

        const parent = field.closest('[data-switch-show-password]');
        const switcher = parent?.querySelector('[data-ssp-switcher]');

        if (!parent || !switcher) return;

        switcher.addEventListener('click', () => {
            const attrType = field.getAttribute('type') === 'password' ? 'text' : 'password';

            field.setAttribute('type', attrType);
            switcher.classList.toggle('active');
        });

        field.switchShowPasswordInited = true;
    });
}
