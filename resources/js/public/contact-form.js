import { Fancybox } from "@fancyapps/ui";
import { ajax, parseErrorsMessage } from '../ajax.js';

export function contactForm() {
    document.addEventListener('submit', event => {
        const contactForm = event?.target?.closest('[data-contact-form]');

        if (!contactForm) return;

        const errorsPlace = contactForm.querySelector('[data-form-errors]');
        const successModal = '#success-send-modal';
        const errorModal = '#error-send-modal';

        ajax(event, {
            form: contactForm,
            beforeHandler: () => {
                errorsPlace.innerHTML = '';
            },
            successHandler: () => {
                contactForm.reset();
                showFeedbackMessage(successModal);
            },
            errorHandler: (error) => {
                const errors = parseErrorsMessage(error?.response?.data?.errors);

                if (errors) {
                    errorsPlace.innerHTML = errorsPlace.dataset.errorMessage || errors;
                } else {
                    showFeedbackMessage(errorModal);
                }
            }
        });
    });
}

function showFeedbackMessage(trigger) {
    Fancybox.close();

    Fancybox.show([{
        src: trigger,
        type: 'inline',
    }], {
        dragToClose: false,
        compact: false,
    });
}
