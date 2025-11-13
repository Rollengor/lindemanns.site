import { Image } from '@tiptap/extension-image';
import { mergeAttributes } from '@tiptap/core';

export const AdvancedImage = Image.extend({
    addAttributes() {
        return {
            ...this.parent?.(),
            width: {
                default: null,
                parseHTML: element => element.getAttribute('width'),
                renderHTML: attributes => ({
                    'width': attributes.width,
                }),
            },
            height: {
                default: null,
                parseHTML: element => element.getAttribute('height'),
                renderHTML: attributes => ({
                    'height': attributes.height,
                }),
            },
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
