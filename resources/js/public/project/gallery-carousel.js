import Swiper from 'swiper';
import { EffectFade, Autoplay, Pagination } from "swiper/modules";

export function projectGalleryCarousel() {
    const container = document.getElementById('project-gallery-carousel');

    if (!container) return;

    const carousel = new Swiper(container, {
        speed: 1500,
        loop: true,
        autoHeight: true,
        effect: 'fade',
        pagination: {
            el: '.swiper-pagination',
            //clickable: true,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        modules: [EffectFade, Autoplay, Pagination],
        on: {
            afterInit: function (swiper) {
                loadImage(swiper);
            },
            slideChange: function (swiper) {
                loadImage(swiper);
            }
        },
    });

    function loadImage(swiper) {
        const nextSlide = swiper.slides[swiper.activeIndex + 1];

        if (!nextSlide || nextSlide.isLoadedImage) return;

        const image = nextSlide?.querySelector('img[data-src]');
        const srcset = image?.dataset?.srcset;

        if (!image) return;

        image.src = image.dataset.src;

        if (srcset) {
            image.srcset = srcset;
        }

        nextSlide.isLoadedImage = true;
    }
}