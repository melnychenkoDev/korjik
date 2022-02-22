const mobMenu = () => {
    const mobMenuEl = document.querySelector('.site__header_mob_menu');
    const mobMenuTrigger = document.querySelector('.mob__menu_trigger');
    const overlay = document.querySelector('.overlay');

    mobMenuTrigger.addEventListener('click', openMenu);
    overlay.addEventListener('click', closeMenu);
    mobMenuEl.querySelector('.close').addEventListener('click', closeMenu);

    function openMenu() {
        mobMenuEl.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobMenuEl.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = null;
    }

};

export default mobMenu;