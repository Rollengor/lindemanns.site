import { fields } from "./fields.js";
import { select } from "../components/select.js";
import { wysiwyg } from "../components/wysiwyg.js";
import Sortable from 'sortablejs';

const wrapperDataName = '[data-addetible-fields-wrapper]';
const columnDataName = '[data-addetible-fields-column]';
const moveDataName = '[data-addetible-fields-btn-move]';
const plusDataName = '[data-addetible-fields-btn-plus]';
const minusDataName = '[data-addetible-fields-btn-minus]';

export function addetibleFields() {
    const sortableWrappers = document.querySelectorAll(`${wrapperDataName}[data-sortable-wrapper]`);

    sortableWrappers.forEach(wrapper => {
        const instance = new Sortable(wrapper, {
            draggable: columnDataName,
            handle: moveDataName,
            onEnd: function() {
                reorderFileIndexes(wrapper);
            }
        });
    });

    document.addEventListener('click', (e) => {
        const addetibleFieldsBtnPlus = e?.target?.closest(plusDataName);
        const addetibleFieldsBtnMinus = e?.target?.closest(minusDataName);

        if (!addetibleFieldsBtnPlus && !addetibleFieldsBtnMinus) return;

        const wrapper = getWrapper.call(addetibleFieldsBtnPlus || addetibleFieldsBtnMinus);
        const parent = getColumn.call(addetibleFieldsBtnPlus || addetibleFieldsBtnMinus);

        if (addetibleFieldsBtnPlus) {

            const clone = clearFields.call(parent.cloneNode(true));

            parent.after(clone);

            if (wrapper.hasAttribute('data-index-trigger')) {
                updateIndexes(wrapper);
            }

            fields();
            select();
            wysiwyg();

        } else if (addetibleFieldsBtnMinus) {

            const columns = wrapper?.querySelectorAll(columnDataName);
            const count = columns?.length || 0;

            if (count < 2) {
                clearFields.call(parent);
                return;
            }

            parent.remove();
        }

        reorderFileIndexes(wrapper);
    });
}

function getWrapper() {
    return this.closest(wrapperDataName);
}

function getColumn() {
    return this.closest(columnDataName);
}

function clearFields() {
    const selectors = this.hasAttribute('data-clear-hidden-fields') ? 'input, textarea' : 'input:not([type="hidden"]), textarea, select';
    const fields = this.querySelectorAll(selectors);

    fields.forEach(field => {
        if (field.nodeName === 'SELECT') {
            field.selectedIndex = '-1';
        } else {
            field.value = '';
        }

        field.isFieldClearable = true;

        if (field.nodeName === 'SELECT') {
            field.dispatchEvent(new Event('change', { bubbles: true }));
        }

        if (field.nodeName !== 'INPUT') return;

        field.dispatchEvent(new Event('input', { bubbles: true }));
    });

    return this;
}

function updateIndexes(wrapper) {
    const columns = wrapper.querySelectorAll('[data-addetible-fields-column]');
    const trigger = wrapper.getAttribute('data-index-trigger');
    const regex = new RegExp(`${trigger}\\[\\d+\\]`);

    columns.forEach((column, index) => {
        const fields = column.querySelectorAll(`[name^="${trigger}"]`);

        fields.forEach(field => {
            const name = field.getAttribute('name');

            if (name) {
                const updatedName = name.replace(regex, `${trigger}[${index}]`);
                field.setAttribute('name', updatedName);
            }
        });
    });
}

function reorderFileIndexes(wrapper) {
    const fileFields = wrapper.querySelectorAll('input[type="file"]');

    fileFields.forEach((field, index) => {
        let name = field.name;
        let baseName = name.replace(/\[\d+\]/, '');
        field.name = `${baseName}[${index}]`;
    });
}
