export function presetField() {
    document.addEventListener('click', event => {
        const item = event?.target?.closest('[data-preset-value]');
        const wrapper = item?.closest('[data-preset-wrapper]');
        const control = wrapper?.querySelector('[data-form-control]');
        const value = item?.dataset.presetValue;

        if (!control || !value) return;

        control.value = value;

        control.dispatchEvent(new Event('input', { bubbles: true }));
    });
}
