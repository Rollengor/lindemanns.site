import SlimSelect from "slim-select";
import { isMobile } from "../helpers/isMobile.js";

let isMouseDown = false;
let startX;
let scrollLeft;

export function select() {
    const elements = document.querySelectorAll('[data-form-select]');

    elements.forEach(el => {
        if (el?.customSelectInit) return;

        if (el.isFieldClearable && el.hasAttribute('data-id')) {
            const parent = el.parentElement;
            const optionsListId = el.dataset.id;
            const optionsList = parent.querySelector(`div[data-id="${optionsListId}"]`);

            el.removeAttribute('style');
            optionsList?.remove();
        }

        const instance = new SlimSelect({
            select: el,
            settings: {
                placeholderText: '',
                showSearch: el.hasAttribute('data-show-search'),
                closeOnSelect: !el.hasAttribute('multiple'),
            }
        });

        if (!instance.render.settings.isMultiple || isMobile()) return;

        const values = instance.render.main.values;

        values.addEventListener('mousedown', (event) => {
            isMouseDown = true;
            startX = event.pageX - values.offsetLeft;
            scrollLeft = values.scrollLeft;
        });

        values.addEventListener('mouseleave', () => {
            isMouseDown = false;
        });

        values.addEventListener('mouseup', () => {
            isMouseDown = false;
        });

        values.addEventListener('mousemove', (event) => {
            if (!isMouseDown) return;

            event.preventDefault();

            const x = event.pageX - values.offsetLeft;
            const walk = (x - startX) * 1;

            values.scrollLeft = scrollLeft - walk;
        });

        el.customSelectInit = true;
    });
}
