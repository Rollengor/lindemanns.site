import { showAlerts } from "./alerts.js";

export function preloader() {
    const preloader = document.getElementById('preloader');

    if (!preloader) return;

    setTimeout(() => {
        preloader.classList.remove('active');

        setTimeout(() => {
            preloader.remove();
            showAlerts();
        }, 300);
    }, 500);
}
