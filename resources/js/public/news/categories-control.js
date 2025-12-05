import { ajax } from '../../ajax.js'
import { namespaces } from './namespaces.js'

export function categoriesControl() {
    const tabsList = document.getElementById('news-categories-tabs');
    const tabsItems = tabsList?.querySelectorAll('[data-category]');
    const updateUrl = tabsList.dataset.updateUrl;

    if (!tabsItems || !tabsItems?.length || !updateUrl) return;

    const html = document.documentElement;
    const anchorSection = document.getElementById(tabsList.dataset.anchorSectionId);
    const updateList = document.getElementById(tabsList.dataset.updateListId);
    const updatePagination = document.getElementById(tabsList.dataset.updatePaginationId);

    if (!updateList || !updatePagination) return;

    tabsItems.forEach(tab => {
        const categoryId = tab.dataset.id;

        if (!categoryId) return;

        tab.addEventListener('click', () => {
            if (html.classList.contains(namespaces.updating) || tab.classList.contains(namespaces.active)) return;

            updateNewsFromCategory(categoryId);
        });
    });

    function updateNewsFromCategory(categoryId) {
        ajax(null, {
            url: updateUrl,
            method: 'get',
            params: {
                category_id: categoryId,
            },
            beforeHandler: () => {
                html.classList.add(namespaces.updating);
            },
            successHandler: (response) => {
                const { articles_list_html, pagination_html, category_id } = response.data;

                /*html.classList.add(namespaces.animate);

                setTimeout(() => {
                    updateList.innerHTML = articles_list_html;
                    html.classList.remove(namespaces.animate);
                }, 200);*/

                updateList.innerHTML = articles_list_html;
                updatePagination.innerHTML = pagination_html;

                updateActiveTab(category_id);

                anchorSection?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            },
            completeHandler: () => {
                html.classList.remove(namespaces.updating);
            },
        });
    }

    function updateActiveTab(categoryId) {
        const oldTab = [...tabsItems].find((el) => el.classList.contains(namespaces.active));
        const currentTab = [...tabsItems].find((el) => el.dataset.id == categoryId);

        if (oldTab !== currentTab) {
            oldTab?.classList.remove(namespaces.active);
            currentTab?.classList.add(namespaces.active)
        }
    }
}
