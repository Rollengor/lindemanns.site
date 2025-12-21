let lastScroll = 0;
let lastDownScroll = 0;
let isScrollDown = false;

export function scrollPage() {
    document.addEventListener('DOMContentLoaded', toggleClasses);

    window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;
        const windowHeight = window.innerHeight;

        isScrollDown = currentScroll > lastScroll;

        let isHeaderHide = isScrollDown && currentScroll > windowHeight;

        if (isScrollDown) {
            lastDownScroll = currentScroll;
        } else {
            isHeaderHide = !(lastDownScroll - currentScroll > windowHeight / 3 || currentScroll < windowHeight);
        }

        lastScroll = currentScroll;
        
        document.documentElement.classList.toggle('is-header-hide', isHeaderHide);
        toggleClasses();
    });
}

function toggleClasses() {
    const windowHeight = window.innerHeight;
    const currentScroll = window.scrollY;
    const isPageScrolled = currentScroll > 0;
    let isHeaderFixed = currentScroll > windowHeight || document.documentElement.classList.contains('is-header-fixed');

    document.documentElement.classList.toggle('is-page-scrolled', isPageScrolled);

    if (currentScroll === 0) {
        isHeaderFixed = false;
    }

    document.documentElement.classList.toggle('is-header-fixed', isHeaderFixed);
}
