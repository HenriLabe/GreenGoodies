import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

document.addEventListener('DOMContentLoaded', () => {
    let quantityInput = document.querySelector('#qty');
    let updateQuantityBtn = document.querySelector('#updateQty');
    if (quantityInput && updateQuantityBtn) {
        if (0 === parseInt(quantityInput.value)) {
            updateQuantityBtn.innerText = 'Ajouter au panier';
        } else {
            updateQuantityBtn.innerText = 'Mettre à jour';
        }
    }
});