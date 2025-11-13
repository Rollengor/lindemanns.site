export function fullScreenButton(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const btn = wysiwyg.querySelector('[data-tiptap-full-screen-button]');
    const html = document.documentElement;

    if (!btn) {
        console.error('Error! Not found "full-screen" button');
        return;
    }

    btn.addEventListener('click', () => {
        const isFullScreen = wysiwyg.classList.contains('tiptap-full-screen');
        const svgUse = btn.querySelector('svg use');
        let currentHref = svgUse.getAttribute('xlink:href');
        let newHref = currentHref.replace(!isFullScreen ? '#arrows-fullscreen' : '#fullscreen-exit', !isFullScreen ? '#fullscreen-exit' : '#arrows-fullscreen');

        html.classList.toggle('wysiwyg-full-screen', !isFullScreen);
        wysiwyg.classList.toggle('tiptap-full-screen', !isFullScreen);

        svgUse.setAttribute('xlink:href', newHref);

        instance.updateToolbarIndentation();
    });
}
