import * as bootstrap from 'bootstrap';

export function saveAndShowActiveTab() {
    document.addEventListener('DOMContentLoaded', function () {
        const activeTabField = document.querySelector('input[type="hidden"][name="active_tab_param"]');
        const activeTabLink = document.querySelector('[data-active-tab-param]');

        if (!activeTabField && !activeTabLink) return;

        const triggerTabList = document.querySelectorAll('[data-bs-toggle="pill"]');

        if (!triggerTabList.length) return;

        const currentHash = window.location.hash;

        triggerTabList.forEach(tab => {
            const hash = tab.getAttribute('data-bs-target');

            if (currentHash === hash) {
                new bootstrap.Tab(tab).show();
                saveActiveTab(hash);
            }

            tab.addEventListener('shown.bs.tab', function (event) {
                saveActiveTab(hash);
            });
        });

        function saveActiveTab(hash) {
            const value = hash.replace('#', '');

            if (activeTabField) activeTabField.value = value;
            addParamToHref(activeTabLink, 'active_tab_param', value);
        }
    });
}

function addParamToHref(link, key, value) {
    if (!link) return;

    let url = new URL(link.href);
    url.searchParams.set(key, value);

    link.href = url.toString();
}
