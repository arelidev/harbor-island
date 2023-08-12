import Fullpage from "fullpage.js/dist/fullpage.min"
import Swiper, {Navigation, Pagination, Autoplay} from "swiper"
import {Fancybox} from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import scrollObserver from "./observer"

import "animate.css"
import "swiper/css"
import "swiper/css/navigation"
import "swiper/css/pagination"

window.addEventListener("load", function () {
    // Navigation toggle
    let main_navigation = document.querySelector("#primary-menu")
    if (main_navigation) {
        document.querySelector("#primary-menu-toggle").addEventListener("click", function (e) {
            e.preventDefault()
            main_navigation.classList.toggle("hidden")
        })
    }

    // Swiper slider
    let slider = document.querySelector(".swiper")
    if (slider) {
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
    }

    // fullPage.js
    let fullPage = document.querySelector("#fullpage");
    if (fullPage) {
        const fullPage = new Fullpage("#fullpage", {
            licenseKey: "gplv3-license",
            credits: {
                enabled: false
            },
            fitToSection: false,
            scrollOverflow: false,
        });
    }

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    // Load in animation
    scrollObserver(".observer")

    const modals = document.querySelectorAll(".modal");
    const modalButtons = document.querySelectorAll("#modal-button");
    const modalClose = document.querySelectorAll(".close");

    // Modal trigger
    for (let i = 0; i < modalButtons.length; i++) {
        modalButtons[i].addEventListener("click", function (e) {
            e.preventDefault();
            let targetModal = this.dataset.targetModal;

            document.querySelector("#" + targetModal + "-modal").style.display = "block";
        })
    }

    for (let i = 0; i < modalClose.length; i++) {
        modalClose[i].addEventListener("click", function (e) {
            e.preventDefault();

            for (let i = 0; i < modals.length; ++i) {
                modals[i].style.display = "none";
            }
        })
    }

    window.addEventListener("click", function (event) {
        if (event.target.classList.contains("modal")) {
            for (let i = 0; i < modals.length; ++i) {
                modals[i].style.display = "none";
            }
        }
    });
})



