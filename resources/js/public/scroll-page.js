let lastScroll = 0;
let lastDownScroll = 0;
let isScrollDown = false;

export function scrollPage() {
    document.addEventListener('DOMContentLoaded', toggleScrolledClass);

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
        toggleScrolledClass();
    });
}

function toggleScrolledClass() {
    document.documentElement.classList.toggle('is-page-scrolled', window.scrollY > 0/*window.innerHeight*/);
}
