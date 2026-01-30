import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

const treatmentResultsContainer = document.querySelector(".treatment-results-swiper");

if (treatmentResultsContainer) {
    const swiper = new Swiper(treatmentResultsContainer, {
        modules: [Navigation, Pagination],
        slidesPerView: 1, 
        spaceBetween: 20,
        grabCursor: true,
        navigation: {
            nextEl: ".treatment-results-next",
            prevEl: ".treatment-results-prev",
        },
        pagination: {
            el: ".treatment-results-swiper ~ .treatment-results__controls .swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                 slidesPerView: 2.2,
                 spaceBetween: 20,
            },
            992: { 
                slidesPerView: 3.5,
                spaceBetween: 26,
            }
        }
    });
}
