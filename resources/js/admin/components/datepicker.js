import { Datepicker, DateRangePicker } from 'vanillajs-datepicker';
import uk from 'vanillajs-datepicker/locales/uk';
import de from 'vanillajs-datepicker/locales/de';

Object.assign(Datepicker.locales, uk, de);

export function datepicker() {
    const elements = document.querySelectorAll('[data-datepicker]');

    elements.forEach((element) => {
        init(element);
    });
}

function init(element) {
    const type = element.dataset.type;
    const format = element.dataset.format || 'dd.mm.yyyy';
    const minDate = element.dataset.minDate ? ( element.dataset.minDate === 'now' ? new Date() : element.dataset.minDate) : null;
    const maxDate = element.dataset.maxDate ? ( element.dataset.maxDate === 'now' ? new Date() : element.dataset.maxDate) : null;
    const currentLang = document.documentElement.lang;
    let instance = null;

    const options = {
        buttonClass: 'btn',
        format: format,
        minDate: minDate,
        maxDate: maxDate,
        clearButton: true,
        todayButton: true,
        allowOneSidedRange: true,
        autohide: true,
        prevArrow: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-block m-auto ms-0" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/></svg>`,
        nextArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-block m-auto me-0" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/></svg>',
        language: currentLang,
    };

    if (type !== 'range') {
        instance = new Datepicker(element, options);
    } else {
        instance = new DateRangePicker(element, options);
    }

    element.addEventListener('changeDate', (event) => {
        event?.target?.dispatchEvent(new Event('input', { bubbles: true }));
    });
}
