import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

const serviceSwiperContainer = document.querySelector(".services-swiper");

if (serviceSwiperContainer) {
    const swiper = new Swiper(serviceSwiperContainer, {
        modules: [Navigation, Pagination],
        slidesPerView: 1, 
        spaceBetween: 20,
        grabCursor: true,
        navigation: {
            nextEl: ".services-next",
            prevEl: ".services-prev",
        },
        pagination: {
            el: ".services-swiper ~ .services__controls .swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: "auto", 
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: "auto",
                spaceBetween: 29,
            }
        }
    });
}
