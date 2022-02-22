const smoothLinks = () => {
    const smoothLinks = document.querySelectorAll('a[href^="#"]');
    const stickyBlock = document.querySelector('.site__header_sticky');


    let hash = location.hash;
    if (document.getElementById(hash)) {
        stickyBlock.classList.add('sticky');
        let topOffset = stickyBlock.clientHeight;

        const elementPosition = document.getElementById(hash).getBoundingClientRect().top;
        const offsetPosition = elementPosition - topOffset;

        document.querySelector('a[href="'+hash+'"]').parentElement.classList.add('active');

        window.scrollBy({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }

    try {
        smoothLinks.forEach(link => {

            link.addEventListener('click', function(e) {
                e.preventDefault();
                resetLinks();

                let href = this.getAttribute('href');

                const scrollTarget = document.querySelector(href);

                if (!scrollTarget) {
                    location.href = window.myajax.homeUrl+href;
                } else {
                    stickyBlock.classList.add('sticky');
                    let topOffset = stickyBlock.clientHeight;

                    const elementPosition = scrollTarget.getBoundingClientRect().top;
                    const offsetPosition = elementPosition - topOffset;

                    link.parentElement.classList.add('active');

                    window.scrollBy({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }

            });
        });

        function resetLinks() {
            smoothLinks.forEach(el => {
               el.parentElement.classList.remove('active');
            });
        }

    } catch (e) {
        console.error('Модуль smoothLinks.js');
        console.error(e);
    }

};

export default smoothLinks;