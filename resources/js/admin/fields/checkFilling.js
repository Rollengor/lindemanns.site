export function checkFilling() {
    const fields = document.querySelectorAll('[data-form-control]');

    fields.forEach(field => {
        if (field?.formControlInited) return;

        const eventName = ['file', 'checkbox', 'radio'].includes(field.type) || field.nodeName === 'SELECT' ? 'change' : 'input';

        changeField(field);

        field.addEventListener(eventName, () => {
            changeField(field);
        });

        field.formControlInited = true;
    });
}

function changeField(field) {
    const type = field.type;
    const isValue = type === 'file' ? !!field.files[0] : !!field.value?.trim();

    console.log(field?.files?.[0]);

    if (!isValue && type !== 'file') {
        field.value = '';
    }

    field.classList.toggle('is-filled', isValue);
}
