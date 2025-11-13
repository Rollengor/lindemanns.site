import Youtube from "@tiptap/extension-youtube";

export const AdvancedYoutube = Youtube.extend({
    addAttributes() {
        return {
            ...this.parent?.(),
            dataWidth: {
                default: null,
                parseHTML: element => element.getAttribute('data-width'),
                renderHTML: attributes => ({
                    'data-width': attributes.dataWidth,
                }),
            },
            dataPosition: {
                default: null,
                parseHTML: element => element.getAttribute('data-position'),
                renderHTML: attributes => ({
                    'data-position': attributes.dataPosition,
                }),
            },
        };
    },
});
