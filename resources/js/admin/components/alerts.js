import * as bootstrap from 'bootstrap';

export function alerts() {
    const allToastAlerts = document.querySelectorAll('[data-toast-alert]');

    allToastAlerts.forEach(toastAlert => {
        toastAlert.addEventListener('hidden.bs.toast', () => {
            toastAlert.remove();
        });
    });
}

export function showAlerts() {
    const allToastAlerts = document.querySelectorAll('[data-toast-alert]');
    let delay = 0;

    allToastAlerts.forEach(toastAlert => {
        const toast = new bootstrap.Toast(toastAlert);

        setTimeout(() => {
            toast.show();
        }, delay);

        delay += 100;
    });
}
