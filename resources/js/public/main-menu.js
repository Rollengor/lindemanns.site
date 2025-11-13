export function mainMenu() {
    const header = document.getElementById('header');

    if (!header) return;

    const html = document.documentElement;
    const toggleClassname = 'is-opened-main-menu';

    header.addEventListener('click', event => {
        const toggler = event?.target?.closest('[data-header-menu-toggler]');

        if (!toggler) return;

        html.classList.toggle(toggleClassname);
    });

    /*menu.addEventListener('click', event => {
        const list = event?.target?.closest('#main-menu-list');

        if (list) return;

        html.classList.remove(toggleClassname);
    });*/
}
