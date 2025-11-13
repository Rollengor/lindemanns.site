export function isMobile() {
    return window.matchMedia('(hover: none)').matches || window.matchMedia('(pointer: coarse)').matches;
}
