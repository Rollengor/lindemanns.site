import { fields } from "./fields.js";
import { select } from "../components/select.js";
import { wysiwyg } from "../components/wysiwyg.js";
import Sortable from 'sortablejs';

const namespaces = {
    main: '[data-dynamic-fields-wrapper]',
    wrapper: '[data-dynamic-fields-wrapper]',
    sortable: '[data-sortable-wrapper]',
    group: '[data-dynamic-fields-group]',
    template: '[data-dynamic-fields-template]',
    move: '[data-dynamic-fields-move]',
    minus: '[data-dynamic-fields-minus]',
    plus: '[data-dynamic-fields-plus]',
};

let isInited = false;

export function dynamicFields() {
    const sortableWrappers = document.querySelectorAll(`${namespaces.wrapper}${namespaces.sortable}`);

    sortableWrappers.forEach(wrapper => {
        if (wrapper.isSortableInited) return;

        const instance = new Sortable(wrapper, {
            draggable: namespaces.group,
            handle: namespaces.move,
            onEnd: function() {
                updateFieldIndexes(wrapper);
            }
        });

        wrapper.isSortableInited = true;
    });

    if (isInited) return;

    document.addEventListener('click', event => {
        const minusButton =  event?.target?.closest(namespaces.minus);
        const plusButton =  event?.target?.closest(namespaces.plus);

        if (!minusButton && !plusButton) return;

        const trigger = minusButton || plusButton;
        const wrapper = trigger.closest(namespaces.wrapper);
        const group = trigger.closest(namespaces.group);

        const updateEvent = new CustomEvent('dynamicFieldsUpdated', {
            bubbles: true,
            detail: { wrapper: wrapper }
        });

        if (plusButton) {
            const parent = plusButton.closest('[data-dynamic-fields]');
            const template = parent?.querySelector('[data-dynamic-fields-template]');

            if (!template) return;

            group.insertAdjacentHTML('afterend', template.innerHTML.trim());
            updateEvent.detail.action = 'add';
            document.dispatchEvent(updateEvent);
        }

        if (minusButton) {
            const groups = wrapper ? wrapper.querySelectorAll('[data-dynamic-fields-group]') : [];

            if (groups.length > 1) {
                group?.remove();
                updateEvent.detail.action = 'remove';
                document.dispatchEvent(updateEvent);
            }
        }

        updateFieldIndexes(wrapper);
        updateSyncLibs();
    });

    isInited = true;
}

export function updateFieldIndexes(wrapper) {
    const groups = wrapper.querySelectorAll('[data-dynamic-fields-group]');
    const regexp = wrapper.dataset.regexpType === 'simple' ? /\[\d+\]/ : /\[\d+\]/g;

    groups.forEach((group, index) => {
        const elements = group.querySelectorAll('[name], [id], [for]');

        elements.forEach(el => {
            ['name', 'id', 'for'].forEach(attr => {
                const value = el?.base_updated_attrs?.[`_${attr}`] || el.getAttribute(attr);

                if (!value) return;

                let updated = value;

                if (attr === 'name') updated = value.replace(regexp, `[${index}]`);
                if (attr === 'id' || attr === 'for') updated = value + `_${index}`;

                if (!el?.base_updated_attrs) {
                    el.base_updated_attrs = {};
                    el.base_updated_attrs[`_${attr}`] = value;
                } else if (!el?.base_updated_attrs?.[`_${attr}`]) {
                    el.base_updated_attrs[`_${attr}`] = value;
                }

                el.setAttribute(attr, updated);
            });
        });
    });
}

function updateSyncLibs() {
    fields();
    select();
    wysiwyg();
}
