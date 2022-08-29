import { Carousel } from "@fancyapps/ui";
import { Autoplay } from "@fancyapps/ui/dist/carousel.autoplay.esm.js";
Carousel.Plugins.Autoplay = Autoplay;

import headerMenuSticky from "../modules/headerMenuSticky";
import mediaAction from '../modules/mediaAction';
import newsModal from "../modules/newsModal";
import zoomImg from "../modules/zoomImg";

document.addEventListener('DOMContentLoaded', () => {
   "use strict"

    headerMenuSticky();

   let elNewsCarousel = document.querySelector("#newsCarousel")

    if (elNewsCarousel) {
        const newsCarousel = new Carousel(elNewsCarousel, {
            Dots: true,
            Navigation: false,
            center: true,
            infinite: false,
            Autoplay: {
                timeout: 3000,
            }
        });
    }


    mediaAction(767, headerMenuSticky);

    newsModal();

    zoomImg();

});