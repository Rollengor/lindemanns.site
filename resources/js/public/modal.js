import { Fancybox } from "@fancyapps/ui";

export function modal() {
    Fancybox.bind('[data-fancybox]', {
        dragToClose: false,
        trapFocus: false,
        compact: false,
    });

    //Fancybox.defaults.Hash = false;
    /*Fancybox.show([{
        src: '#contact-modal',
        type: 'inline',
    }], {
        dragToClose: false,
        trapFocus: false,
        compact: false,
    });*/
}
