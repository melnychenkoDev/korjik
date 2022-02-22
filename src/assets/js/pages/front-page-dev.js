import { Carousel } from "@fancyapps/ui";

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
            slidesPerPage: 1,
            friction : 0.96,
            dragFree: true,
            infinite: false,
        });
    }


    mediaAction(767, headerMenuSticky);

    newsModal();

    zoomImg();

});