import { Editor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Dropcursor from '@tiptap/extension-dropcursor'
import HardBreak from '@tiptap/extension-hard-break'
import History from '@tiptap/extension-history'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'
import TextStyle from '@tiptap/extension-text-style'
import Heading from '@tiptap/extension-heading'
import Bold from '@tiptap/extension-bold'
import Underline from '@tiptap/extension-underline'
import Italic from '@tiptap/extension-italic'
import Strike from '@tiptap/extension-strike'
import Blockquote from '@tiptap/extension-blockquote'
import Subscript from '@tiptap/extension-subscript'
import Superscript from '@tiptap/extension-superscript'
import TextAlign from '@tiptap/extension-text-align'
import ListItem from '@tiptap/extension-list-item'
import BulletList from '@tiptap/extension-bullet-list'
import OrderedList from '@tiptap/extension-ordered-list'
import { Color } from '@tiptap/extension-color'
import Highlight from '@tiptap/extension-highlight'
import Link from '@tiptap/extension-link'
import CharacterCount from '@tiptap/extension-character-count'
import { AdvancedImage } from './extensions/advancedImage.js'
import { AdvancedYoutube } from './extensions/advancedYoutube.js'

import {
    undoButton,
    redoButton,
    headingButton,
    boldButton,
    underlineButton,
    italicButton,
    strikeButton,
    blockquoteButton,
    subscriptButton,
    superscriptButton,
    alignButton,
    listButton,
    colorButton,
    highlightButton,
    linkButton,
    imageButton,
    youtubeButton,
    fullScreenButton
} from "./buttons/index.js"

import { characterCounter } from './informers/characterCounter.js'

export function tiptapWysiwyg() {
    const targets = document.querySelectorAll('[data-tiptap-wysiwyg]');

    targets.forEach(wysiwyg => {
        if (wysiwyg.wysiwygInited) return;

        const content = wysiwyg.querySelector('[data-tiptap-content]');
        const toolbar = wysiwyg.querySelector('[data-tiptap-toolbar]');
        const charLimit = +wysiwyg.dataset.charLimit || null;
        const buttons = wysiwyg?.dataset?.buttons ? wysiwyg.dataset.buttons.replace(/\s+/g, '').split(',') : [];

        const extensions = {
            'underline': underlineButton,
            'italic': italicButton,
            'strike': strikeButton,
            'blockquote': blockquoteButton,
            'subscript': subscriptButton,
            'superscript': superscriptButton,
            'color': colorButton,
            'highlight': highlightButton,
            'image': imageButton,
            'youtube': youtubeButton,
        };

        const instance = new Editor({
            element: wysiwyg,
            extensions: [
                Document,
                Dropcursor,
                HardBreak,
                History,
                Paragraph,
                Text,
                TextStyle,
                Heading.configure({
                    levels: [1, 2, 3, 4, 5, 6],
                }),
                Bold,
                Underline,
                Italic,
                Strike,
                Blockquote,
                Subscript,
                Superscript,
                TextAlign.configure({
                    types: ['heading', 'paragraph'],
                }),
                ListItem,
                BulletList,
                OrderedList,
                Color,
                Highlight.configure({
                    multicolor: true,
                }),
                Link.configure({
                    defaultProtocol: 'https',
                    openOnClick: false,
                    HTMLAttributes: {
                        rel: null,
                        target: null,
                    },
                }),
                AdvancedImage.configure({
                    inline: false,
                }),
                AdvancedYoutube.configure({
                    inline: false,
                }),
                CharacterCount.configure({
                    limit: charLimit,
                }),
            ],
            content: content.value,
            editable: true,
            editorProps: {
                attributes: {
                    class: `bg-white p-2 tiptap-wysiwyg-content ${charLimit ? 'border-bottom' : 'rounded-bottom'}`,
                },
                transformPastedText(text) {
                    return clearPastedText(text);
                },
                transformPastedHTML(html) {
                    return clearPastedText(html);
                },
            },
            onUpdate({ editor }) {
                const contentHTML = editor.getHTML();

                content.value = contentHTML.replace(/\s+/g, '') === '<p></p>' ? '' : contentHTML;

                console.log(content.value);

                const codeView = document.getElementById('codeView');

                if (!codeView) return;

                codeView.value = content.value;
            },
        });

        instance.updateToolbarIndentation = () => {
            const toolbarHeight = toolbar.offsetHeight;

            wysiwyg.style.paddingTop = toolbarHeight + 'px';
        }

        undoButton(instance);
        redoButton(instance);
        headingButton(instance);
        boldButton(instance);
        alignButton(instance);
        listButton(instance);
        linkButton(instance);

        fullScreenButton(instance);

        characterCounter(instance);

        if (Array.isArray(buttons) && buttons.length > 0) {
            buttons.forEach(extName => {
                extensions[extName](instance);
            });
        }

        instance.updateToolbarIndentation();

        window.addEventListener('resize', instance.updateToolbarIndentation);

        wysiwyg.wysiwygInited = true;
    });
}

function clearPastedText(text) {
    return text
        // Removing style attributes
        .replace(/\s*style\s*=\s*(['"])[\s\S]*?\1/gi, '')
        // Removing <span> tags with any attributes
        .replace(/<\s*\/?\s*span[^>]*>/gi, '')
        // Replace unnecessary spaces/characters
        //.replace(/[^\x20-\x7E\u00A0-\u02AF\u0370-\u03FF\p{Letter}\s]/gu, '')
        .replace(/\xA0/g, ' ')
        .replace(/&nbsp;/g, ' ')
        .replace(/\u200B/g, '');
}
