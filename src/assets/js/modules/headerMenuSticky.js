const headerMenuSticky = () => {
    const menuSticky = document.querySelector('.site__header_sticky');
    let menuStickyTop = 0;

    if (window.matchMedia('(max-width: 700px)').matches) {
        menuStickyTop = document.querySelector('.header__content ').clientHeight;
    } else {
        menuStickyTop = document.querySelector('.header__content ').offsetTop;
    }

    function setStickyMenu() {
        if (menuSticky) {
            let winTop = window.pageYOffset;

            if (winTop >= menuStickyTop) {
                menuSticky.classList.add('sticky');
            } else {
                menuSticky.classList.remove('sticky');
            }
        }
    }

    setStickyMenu();
    window.addEventListener('scroll', () => {
        setStickyMenu();
    });

};

export default headerMenuSticky;