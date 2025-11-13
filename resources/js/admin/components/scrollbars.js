import { OverlayScrollbars } from 'overlayscrollbars';

export function scrollbars() {
    const wrappers = document.querySelectorAll('[data-overlayscrollbars-initialize]');

    wrappers.forEach(wrapper => {
        OverlayScrollbars(wrapper, {
            overflow: {
                x: 'hidden',
            },
            scrollbars: {
                theme: 'os-theme-admin',
                autoHide: 'leave',
                autoHideDelay: 500,
            },
        });
    });
}
