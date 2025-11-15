export function scrollPage() {
    document.addEventListener('DOMContentLoaded', toggleScrollClass);

    window.addEventListener('scroll', toggleScrollClass);
}

function toggleScrollClass() {
    document.documentElement.classList.toggle('is-page-scrolled', window.scrollY > 0/*window.innerHeight*/);
}
