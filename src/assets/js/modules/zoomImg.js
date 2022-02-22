import "jquery-zoom/jquery.zoom";

const zoomImg = () => {

    jQuery('.zoom.zoom-img').zoom();

    document.querySelectorAll('.zoom.zoom-img').forEach(el => {
        el.style.overflow = null;
        let timer = 0;

        el.addEventListener('touchstart', () => {
            clearTimeout(timer);
            el.style.overflow = 'hidden';
        })

        el.addEventListener('touchmove', () => {
            clearTimeout(timer);
            el.style.overflow = 'hidden';
        })

        el.addEventListener('touchend', () => {
            timer = setTimeout(() => { el.style.overflow = null;}, 300)
        })

        el.addEventListener('mousemove', () => {
            clearTimeout(timer);
            el.style.overflow = 'hidden';
        })

        el.addEventListener('mouseenter', () => {
            clearTimeout(timer);
            el.style.overflow = 'hidden';
        })

        el.addEventListener('mouseleave', () => {
           timer = setTimeout(() => { el.style.overflow = null;}, 300)
        })

    })

};

export default zoomImg;