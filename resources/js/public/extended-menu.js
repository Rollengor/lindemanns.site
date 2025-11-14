const html = document.documentElement;
let changeClassTimer = null;

export function extendedMenu() {
    const toggleButton = document.getElementById('extended-menu-toggle-button');

    if (!toggleButton) return;

    const toggleClassname = 'is-opened-extended-menu';

    updateScrollBarWithProperty();

    window.addEventListener('resize', updateScrollBarWithProperty);

    toggleButton.addEventListener('click', () => {
        html.classList.toggle(toggleClassname);
    });
}

function updateScrollBarWithProperty() {
    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

    html.style.setProperty('--compensate-scrollbar', `${scrollbarWidth}px`);
}
