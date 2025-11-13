export function characterCounter(instance) {
    if (!instance) {
        console.error('Error! Not passed instance');
        return;
    }

    const wysiwyg = instance.options.element;
    const counter = wysiwyg.querySelector('[data-tiptap-character-counter]');

    if (!counter) {
        console.error('Error! Not found "counter" element');
        return;
    }

    const extension = instance.extensionManager.extensions.find(ext => ext.name === 'characterCount');
    const limit = extension?.options?.limit || null;

    counter.innerHTML = `0 / ${limit || 0}`;
    counter.classList.toggle('d-none', !limit);

    if (!limit) return;

    instance.on('create', updateCounter)
    instance.on('update', updateCounter);

    function updateCounter() {
        if (!limit) return;

        const characters = instance.storage.characterCount.characters();

        counter.innerHTML = `${characters} / ${limit}`;
        counter.classList.toggle('text-danger', characters >= limit);
    }
}
