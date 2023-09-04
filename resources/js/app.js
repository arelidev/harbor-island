import Fullpage from "fullpage.js/dist/fullpage.min"

import {Fancybox} from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import scrollObserver from "./observer"

import "animate.css"
import "./modal"
import "./residences"
import "./swiper"

window.addEventListener("load", function () {
    // Navigation toggle
    let main_navigation = document.querySelector("#primary-menu")
    if (main_navigation) {
        document.querySelector("#primary-menu-toggle").addEventListener("click", function (e) {
            e.preventDefault()
            main_navigation.classList.toggle("hidden")
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
            responsiveWidth: 900
        });
    }

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    // Load in animation
    scrollObserver(".observer")
})