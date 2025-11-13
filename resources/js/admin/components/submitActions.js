import * as bootstrap from 'bootstrap';

let firstInvalidCatched = false;

export function submitActions() {
    document.addEventListener('submit', (event) => {
        const form = event?.target;
        const isSending = form?.isFormSending;

        if (!form || form?.tagName !== 'FORM' || isSending) {
            if (isSending) event.preventDefault();
            return;
        }

        const formId = form.id;
        const loader = formId ? document.querySelector(`[data-submit-loader][form="${formId}"]`) : null;

        form.isFormSending = true;
        form.classList.add('sending');
        loader?.classList?.add('sending');

        setTimeout(() => {
            const waitRequestProcessedMessage = document.getElementById('waitRequestProcessedMessage');

            if (!waitRequestProcessedMessage) return;

            const toast = new bootstrap.Toast(waitRequestProcessedMessage);

            toast.show();
        }, 3000);
    });

    document.addEventListener('invalid', (event) => {
        if (firstInvalidCatched) return;

        const field = event?.target;

        if (field) firstInvalidCatched = true;

        const scrollViewport = field.closest('[data-overlayscrollbars-viewport]');
        const parentTabPane = field.closest('.tab-pane');
        const currentTabButton = document.querySelector(`[data-bs-target="#${parentTabPane?.id}"]`);

        const parentAccordionCollapse = field.closest('.accordion-collapse');
        const currentCollapseButton = document.querySelector(`[data-bs-target="#${parentAccordionCollapse?.id}"]`);

        currentTabButton?.click();

        if(currentCollapseButton?.classList?.contains('collapsed')) currentCollapseButton?.click();

        setTimeout(() => {
            firstInvalidCatched = false;
        }, 50);

        if (!scrollViewport) return;

        setTimeout(() => {
            scrollViewport.scroll({
                top: scrollViewport.scrollTop + field.offsetHeight + 16,
                behavior: 'smooth',
            });
        }, 200);
    }, true);
}
