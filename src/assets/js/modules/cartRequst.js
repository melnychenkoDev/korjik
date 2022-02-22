import $ from 'jquery';

const addToCart = (parent, target) => {
    const parentEl = document.querySelectorAll(parent);

    parentToCart(parentEl, target, 'ADD_TO_CART');

}

const updateToCart = (parent, target) => {
    const parentEl = document.querySelectorAll(parent);

    parentToCart(parentEl, target, 'UPDATE_TO_CART');

}

const removeToCart = (parent, target) => {
    const parentEl = document.querySelectorAll(parent);

    parentToCart(parentEl, target, 'REMOVE_TO_CART');

}

let isCartCheckoutUpdate = false;

if (window.cartData[0].count >= 1) {
    isCartCheckoutUpdate = true;
}

const parentToCart = (parentEl, target, action) => {
    if (parentEl) {
        parentEl.forEach(itm => {
            itm.addEventListener('click', (e) => {
                let current = e.target;
                if (current.closest(target)) {
                    e.preventDefault();

                    current.closest(target).classList.add('loading');

                    let data = actionToCart(action, current.closest(target));

                    if (data.isOk) {
                        jQuery.post(window.myajax.url, data).complete(res => {
                            current.closest(target).classList.remove('loading');
                            let resData = JSON.parse(res);
                            window.cartData = {...resData};

                            updateCartData({
                                cartItems: resData['items_html'],
                                cartCount: resData['count'],
                                cartPrice: resData['total_price'],
                                checkoutHtml: resData['checkout_html'],
                            });

                            if (action === 'ADD_TO_CART') {
                                let img = current.closest(target).closest('.products_item').querySelector('.card_thumb');

                                let cartEl = '';
                                let leftAnim = 0;
                                if (window.matchMedia('(max-width: 767px)').matches) {
                                    cartEl = $(".open_cart_btn.mob");
                                    leftAnim = '50%';
                                } else {
                                    cartEl = $(".open_cart_btn:not(.mob)");
                                    leftAnim = cartEl.offset()['left'] + 6;
                                }

								if (window.matchMedia("(min-width: 768px)").matches) {
                                    $(img)
                                     .clone()
                                     .css({
                                         'position': 'absolute',
                                         'z-index': '100',
                                         top: $(img).offset().top,
                                         left: $(img).offset().left,
                                         'width': '200px',
                                     })
                                     .appendTo("body")
                                     .animate({
                                         opacity: 0.5,
                                         width: '50px',
                                         left: leftAnim,
                                         top: cartEl.offset()['top'] + 8,
                                         fadeTo: 0.6
                                     }, 1000, function () {
                                         $(this).remove();
                                     });
								} else {
                                    $(img)
                                     .clone()
                                     .css({
                                         'position': 'absolute',
                                         'z-index': '100',
                                         top: $(img).offset().top,
                                         left: $(img).offset().left,
                                         'width': '100px',
                                     })
                                     .appendTo("body")
                                     .animate({
                                         opacity: 0.5,
                                         width: '50px',
                                         left: leftAnim,
                                         top: cartEl.offset()['top'] + 8,
                                         fadeTo: 0.6
                                     }, 1000, function () {
                                         $(this).remove();
                                     });
								}
                            }

                        });
                    }

                }
            });
        })
    }
}

const actionToCart = (action, el) => {
    let data = {}

    switch (action) {
        case 'ADD_TO_CART': {
            data = {
                id: el.dataset.id,
                quantity: el.dataset.quantity,
                action: el.dataset.action,
                isOk: true,
            }

            if (!data.id || !data.action) {
                data.isOk = false;
            }

            return data;
        }
        case 'UPDATE_TO_CART': {
            data = {
                id: el.dataset.id,
                quantity: el.dataset.currentQauntity,
                num: el.dataset.qauntity,
                action: el.dataset.action,
                isOk: true,
            }

            let oldQuantity = data.quantity;

            let count = Number.parseInt(data.quantity) + Number.parseInt(data.num);

            if (count > 0) {
                data.quantity = count;
            } else {
                data.isOk = false;
                data.quantity = oldQuantity;
            }

            if (!data.id || !data.action) {
                data.isOk = false;
            }

            return data;
        }
        case 'REMOVE_TO_CART': {
            data = {
                id: el.dataset.id,
                action: el.dataset.action,
                isOk: true,
            }

            if (!data.id || !data.action) {
                data.isOk = false;
            }

            return data;
        }
    }
}

const updateCartData = ({cartItems = null, cartPrice = null, cartCount = null, checkoutHtml = null}) => {
    document.querySelectorAll('.open_cart_btn .count').forEach(el => el.textContent = cartCount);
    document.querySelector('#cart .cart__list').innerHTML = cartItems;
    document.querySelectorAll('.total_cart_price').forEach(el => el.innerHTML = cartPrice);
    document.querySelector('.checkout__section').innerHTML = checkoutHtml;
    // if (cartCount == 1 && !isCartCheckoutUpdate) {
    //     isCartCheckoutUpdate = true;
    //     document.querySelector('.checkout__section').innerHTML = checkoutHtml;
    // }

    if (cartCount == 0) {
        const cartEl = document.querySelector('#cart');
        const overflowEl = document.querySelector('.cart_overlay');
        cartEl.classList.remove('active');
        overflowEl.classList.remove('active');
        document.body.style.overflow = null;
    }
}

function css(element, style) {
    for (const property in style)
        element.style[property] = style[property];
}

export {
    addToCart,
    updateToCart,
    removeToCart
}