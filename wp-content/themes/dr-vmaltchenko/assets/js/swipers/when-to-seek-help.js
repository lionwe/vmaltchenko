import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

const initWhenToSeekHelpSwiper = () => {
    const selector = ".when-to-seek-help__swiper";
    if (!document.querySelector(selector)) return;

    new Swiper(selector, {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 20,
        enabled: true,
        navigation: {
            nextEl: ".when-to-seek-help-next",
            prevEl: ".when-to-seek-help-prev",
        },
        pagination: {
            el: ".when-to-seek-help__pagination",
            clickable: true,
        },
        breakpoints: {
            992: {
                enabled: false,
                slidesPerView: "auto",
                spaceBetween: 0,
            },
        },
    });
};

initWhenToSeekHelpSwiper();
