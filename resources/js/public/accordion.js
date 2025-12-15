export function accordion() {
    document.addEventListener('click', event => {
        const accordionItemTarget = event?.target?.closest('[data-accordion-target]');

        if (!accordionItemTarget) return;

        const wrapper = accordionItemTarget.closest('[data-accordion]');
        const item = accordionItemTarget.closest('[data-accordion-item]');
        const active = wrapper.querySelector('[data-accordion-item].is-active');
        const content = item.querySelector('[data-accordion-content]');

        active?.classList.remove('is-active');

        if (item !== active) {
            item.style.setProperty('--content-scroll-height', `${content.scrollHeight + 1}px`);
            item.classList.add('is-active');
        }
    });
}
