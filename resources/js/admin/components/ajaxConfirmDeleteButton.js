import * as bootstrap from "bootstrap";

import { ajax } from '../../ajax.js';

export function ajaxConfirmDeleteButton() {
    document.addEventListener('click', event => {
        const button = event?.target?.closest('[data-ajax-view-delete-modal-button]');

        if (!button) return;

        const targetModal = document.getElementById('confirm-delete-modal');
        const withHideModals = +button.dataset.withHideModals;
        let url = button.dataset.action;

        ajax(event, {
            submitter: button,
            url: url,
            method: 'get',
            params: {
                'subtitle': button.dataset.subtitle,
                'delete_action': button.dataset.deleteAction,
                'update_id_section': button.dataset.updateIdSection,
            },
            successHandler: (response) => {
                if (withHideModals) hideAllModals();
                showModal(targetModal, response.data);
            },
            errorHandler: (error) => {
                console.log(error);
            }
        });
    });
}

function hideAllModals() {
    const modals = document.querySelectorAll('.modal.show');

    modals.forEach(modalEl => {
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) {
            modal.hide();
        } else {
            new bootstrap.Modal(modalEl).hide();
        }
    });
}

function showModal(targetModal, html = null) {
    if (!targetModal || !html) return;

    targetModal.innerHTML = html;

    let modal = bootstrap.Modal.getInstance(targetModal);

    if (modal?.show) {
        modal.show();

        return;
    }

    modal = new bootstrap.Modal(targetModal);

    modal.show();
}
