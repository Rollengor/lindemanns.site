
import { ajax } from '../../ajax.js'
import { namespaces } from './namespaces.js'

export function paginationControl() {
    const pagination = document.getElementById('news-pagination');

    if (!pagination) return;

    const html = document.documentElement;
    const anchorSection = document.getElementById(pagination.dataset.anchorSectionId);
    const updateList = document.getElementById(pagination.dataset.updateListId);

    if (!updateList) return;

    pagination.addEventListener('click', event => {
        const pageLink = event?.target?.closest('a');

        if (!pageLink) return;

        event.preventDefault();

        if (html.classList.contains(namespaces.updating) || pageLink.classList.contains(namespaces.active)) return;

        const pageUrl = pageLink.href;

        if (!pageUrl) return;

        updateNewsWithPage(pageUrl);
    });

    function updateNewsWithPage(pageUrl) {
        ajax(null, {
            url: pageUrl,
            method: 'get',
            beforeHandler: () => {
                html.classList.add(namespaces.updating);
            },
            successHandler: (response) => {
                const { articles_list_html, pagination_html } = response.data;

                updateList.innerHTML = articles_list_html;
                pagination.innerHTML = pagination_html;

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
}
