const adminSidebar = document.getElementById('adminSidebar');
const adminSidebarToggler = document.getElementById('adminSidebarToggler');
const hideSize = 1200;
let updateTimer = null;

export function sidebar() {
    if (!adminSidebar || !adminSidebarToggler) return;

    adminSidebarToggler.addEventListener('click', toggleSidebar);

    window.addEventListener('resize', toggleSidebar);

    toggleSidebar();
}

function toggleSidebar(event = null) {
    clearTimeout(updateTimer);

    updateTimer = setTimeout(() => {
        adminSidebar.classList.toggle('active', !event || event?.type === 'resize' ? window.innerWidth >= hideSize : undefined);

        setTimeout(() => {
            adminSidebar.dispatchEvent(new CustomEvent('togglesidebar', {
                detail: { active: adminSidebar.classList.contains('active') },
                bubbles: true,
                cancelable: true,
            }));
        }, 250);
    }, event?.type === 'resize' ? 150 : 0);
}
