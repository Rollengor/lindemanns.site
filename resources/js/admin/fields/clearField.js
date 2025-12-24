import { changeField } from './checkFilling.js';

let isInited = false;

export function clearField() {
    if (isInited) return;

    document.addEventListener('click', event => {
        const clearButton = event?.target?.closest('[data-form-control-clear-button]');

        if (!clearButton) return;

        const field = clearButton?.parentElement?.querySelector('input');

        if (field) {
            field.value = '';
            changeField(field);
        }
    });

    isInited = true;
}
