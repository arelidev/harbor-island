import Swiper, {Autoplay, Navigation, Pagination} from "swiper";

import "swiper/css"
import "swiper/css/navigation"
import "swiper/css/pagination"

window.addEventListener("load", function () {
    let sliders = document.querySelectorAll(".swiper")
    if (sliders) {
        sliders.forEach((slider) => {
            const swiper = new Swiper(slider, {
            modules: [Navigation, Pagination, Autoplay],
            loop: true,
            autoplay: {
                delay: 7000
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        })
        })
    }
})