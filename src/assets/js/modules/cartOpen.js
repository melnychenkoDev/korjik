const cartOpen = () => {

    const cartEl = document.querySelector('#cart');
    const overflowEl = document.querySelector('.cart_overlay');

    document.body.addEventListener('click', (e) => {
        let target = e.target;

        if (target.closest('.open_cart_btn')) {

            if (cartEl) {
                if (window.cartData && (window.cartData.count && window.cartData.count > 0) || (window.cartData[0] && window.cartData[0].count > 0)) {
                    cartEl.classList.add('active');
                    overflowEl.classList.add('active');
                    document.body.style.overflow = 'hidden';
                    // target.closest('.open_cart_btn').style.display = 'none';

                    overflowEl.addEventListener('click', (e) => {
                        let cartTarget = e.target;

                        if (!cartTarget.closest('#cart') || cartTarget.closest('.cart_close')) {
                            cartEl.classList.remove('active');
                            overflowEl.classList.remove('active');
                            document.body.style.overflow = null;
                            target.closest('.open_cart_btn').style.display = null;
                        }

                    })
                } else {
                    target.closest('.open_cart_btn').querySelector('.open_cart_btn-message').classList.add('active');
                    // target.closest('.open_cart_btn').style.pointerEvent = 'none';

                    setTimeout(() => {
                        target.closest('.open_cart_btn').querySelector('.open_cart_btn-message').classList.remove('active');
                        target.closest('.open_cart_btn').style.pointerEvent = null;
                    }, 2000);

                }
            }

        }

    });

};

export default cartOpen;