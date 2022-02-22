import mobMenu from '../modules/mobMenu';
import {addToCart, updateToCart, removeToCart} from '../modules/cartRequst';
import cartOpen from "../modules/cartOpen";
import smoothLinks from "../modules/smoothLinks";
import IMask from 'imask';
import beforeLeave from "../modules/beforeLeave";
import workTime from "../modules/workTime";

document.addEventListener('DOMContentLoaded', () => {
    "use strict"

    workTime();

    mobMenu();

    addToCart('.products', '.add_to_cart');

    updateToCart('#cart', '.update_cart_item');

    removeToCart('#cart', '.remove_cart_item');

    cartOpen();

    smoothLinks();
    
    document.querySelector('#page').addEventListener('click', (e) => {
        let target = e.target;
        let link = target.nodeName.toLowerCase() === 'a' ? target : target.closest('a');

        if (link) {
            if (link.href.includes("https://www.instagram.com/")) {
                dataLayer.push({'event': 'instagram'});
            }
        }
    });

    let telInputEls = document.querySelectorAll('.phone_mask');
    let numInputEls = document.querySelectorAll('.num_mask');
    let maskOptions = {
        mask: '+{38} (000) 000-00-00'
    };

    document.querySelector('#cart').addEventListener('click', (e) => {
        let el = e.target.closest('.phone_mask');
        if (el) {
            if (el.nodeName !== 'INPUT') {
                IMask(el.querySelector('input'), maskOptions);
            } else {
                IMask(el, maskOptions);
            }
        }
    })


    if (telInputEls) {
        telInputEls.forEach(el => {
            if (el.nodeName !== 'INPUT') {
                IMask(el.querySelector('input'), maskOptions);
            } else {
                IMask(el, maskOptions);
            }
        })
    }

    if (numInputEls) {
        numInputEls.forEach(el => {
            if (el.nodeName !== 'INPUT') {
                IMask(el.querySelector('input'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: '',
                            min: 0,
                            max: 10000000000,
                        }
                    }
                });
            } else {
                IMask(el, {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: '',
                            min: 0,
                            max: 10000000000,
                        }
                    }
                });
            }
        })
    }

    beforeLeave();

    let requiredInputs = document.querySelectorAll('.validate-required input');
    let requiredInputsRadio = document.querySelectorAll('.payment_method_cod [type="radio"]');

    if (requiredInputs) {
        requiredInputs.forEach(el => {
            el.setAttribute('required', 'true');
        });
    }

    if (requiredInputsRadio) {
        requiredInputsRadio.forEach(el => {
            el.setAttribute('required', 'true');
        });
    }

});