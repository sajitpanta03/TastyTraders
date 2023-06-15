// ===============================
//    Add, Get and Remove Class
// ===============================

// add class
function addClass(elem, classArr) {
    for (let i = 0; i < classArr.length; i++) {
        elem.classList.add(`${classArr[i]}`);
    }
}

// remove class
function removeClass(elem, classArr) {
    for (let i = 0; i < classArr.length; i++) {
        elem.classList.remove(`${classArr[i]}`);
    }
}

// get class name
function getClassName(elem, classPos) {
    let classString = elem.getAttribute('class');
    let className = classString.split(' ')[classPos];

    return className;
}

// ===================================
//    Add, Get and Remove Class End
// ===================================





// ============================
//    Navbar Animation Start
// ============================

// selecting navbar elements
let header = document.querySelector('header');
let sectionContent = document.querySelector('.section-content');

// actions while scroll up or down
window.onscroll = () => {
    let scrollTop = document.documentElement.scrollTop;

    if (scrollTop > header.offsetHeight) {
        header.classList.add('active');
        sectionContent.style.marginTop = header.offsetHeight + 'px';
    } else {
        header.classList.remove('active');
        sectionContent.style.marginTop = 0 + 'px';
    }
}

// selecting navbar elements
let navItems = document.querySelectorAll('.menu-items li');

// selecting elements for menu toggle
let toggleBar = document.querySelector('#toggle-bar');
let navigationArea = document.querySelector('.menu-items');

// slelecting elements for search bar
let searchBtn = document.querySelector('#search-btn');
let searchBox = document.querySelector('.search-box');

// selecting support center card elements
let iconPhone = document.querySelector('#customer-center');
let supportCenter = document.querySelector('.support-center');

// actions while toggle button click
toggleBar.addEventListener('click', function () {
    toggleBar.classList.toggle('active-toggler');
    navigationArea.classList.toggle('active-navbar');
    searchBox.classList.remove('active-search-box');
    supportCenter.classList.remove('active-support-center');

    for (let i = 0; i < navItems.length; i++) {
        navItems[i].addEventListener('click', function () {
            toggleBar.classList.remove('active-toggler');
            navigationArea.classList.remove('active-navbar');
        });
    }
});

// actions while search button click
searchBtn.addEventListener('click', function () {
    searchBox.classList.toggle('active-search-box');
    toggleBar.classList.remove('active-toggler');
    navigationArea.classList.remove('active-navbar');
    supportCenter.classList.remove('active-support-center');
});

// actions while phone button click
iconPhone.onclick = () => {
    searchBox.classList.remove('active-search-box');
    toggleBar.classList.remove('active-toggler');
    navigationArea.classList.remove('active-navbar');

    let isSupportCenterCardActive = getClassName(supportCenter, 1) === 'active-support-center';

    if (!isSupportCenterCardActive) {
        addClass(supportCenter, ['animate__animated', 'animate__bounceInRight', 'active-support-center']);

        setTimeout(() => {
            removeClass(supportCenter, ['animate__animated', 'animate__bounceInRight']);
        }, 1000);
    } else {
        supportCenter.classList.remove('active-support-center');
    }

}

// selecting support center card close button
let supportCenterCardCloseBtn = document.querySelector('.close-support-center-card');

// close support center card
supportCenterCardCloseBtn.onclick = () => {
    supportCenter.classList.remove('active-support-center');
}

// ==========================
//    Navbar Animation End
// ==========================





// =================================
//    Hero Slider Animation Start
// =================================

// selecting hero slider elements
let heroImg = document.querySelector('.hero-image');
let heroDescription = document.querySelector('.hero-description');

// update hero image
function updateHeroImage(imgIndex) {
    let imgSrc = ['01.png', '02.png', '03.png', '04.png', '05.png', '06.png'];
    let oldImg = document.querySelector('.hero-image img');
    heroImg.removeChild(oldImg);

    let newImg = document.createElement('img');
    newImg.setAttribute('class', 'animate__animated animate__bounceInDown');
    newImg.src = `img/hero/${imgSrc[imgIndex]}`;

    heroImg.appendChild(newImg);
}

// update hero title
function updateHeroTitle(titleIndex) {
    let txt1 = `The best dried fruits for your family health`;
    let txt2 = `Get your daily needs easy and instant`;
    let txt3 = `Try fresh fruits for better healthy lifestyle`;
    let txt4 = `Get upto 50% discount on every products`;
    let txt5 = `Hot deals available with amazing products`;
    let txt6 = `Fresh vegetables with a big discount`;

    let textAra = [txt1, txt2, txt3, txt4, txt5, txt6];

    let oldText = document.querySelector('.hero-title');
    heroDescription.removeChild(oldText);

    let newTitle = document.createElement('h1');
    newTitle.setAttribute('class', 'animate__animated animate__bounceInRight hero-title');
    newTitle.textContent = `${textAra[titleIndex]}`;

    heroDescription.appendChild(newTitle);
}

// update hero button
function updateHeroButton() {
    let oldButton = document.querySelector('.hero-button');
    heroDescription.removeChild(oldButton);

    let newButton = document.createElement('button');
    newButton.textContent = `Explore`;
    newButton.setAttribute('class', 'animate__animated animate__bounceInUp hero-button');

    heroDescription.appendChild(newButton);
}

// initiate slide position
let heroIndex = 0;

// slide right
function heroSlideRight() {
    heroIndex++;

    if (heroIndex === 6) {
        heroIndex = heroIndex % 6;
    }

    updateHeroImage(heroIndex);
    updateHeroTitle(heroIndex);
    updateHeroButton();
}

// slide left
function heroSlideLeft() {
    heroIndex--;

    if (heroIndex < 0) {
        heroIndex = 5;
    }

    updateHeroImage(heroIndex);
    updateHeroTitle(heroIndex);
    updateHeroButton();
}

// auto slide
let heroSlide = setInterval(() => {

    heroSlideRight();

}, 10000);

// slider button
let heroSlideLeftBtn = document.querySelector('.hero-slide-left');
let heroSlideRightBtn = document.querySelector('.hero-slide-right');

// actions while click left arrow button
heroSlideLeftBtn.onclick = () => {
    heroSlideLeft();
}

// actions while click right arrow button
heroSlideRightBtn.onclick = () => {
    heroSlideRight();
}

// ===============================
//    Hero Slider Animation End
// ===============================





// ====================================
//    Call to Action Animation Start
// ====================================

// selecting card elements
let arrivalCard = document.querySelectorAll('.new-arrival-card');

// three cards width including each of their margin right
let move = (arrivalCard[0].offsetWidth + 20) * 3;

// slide three cards in every 3 seconds
let newArrival = setInterval(() => {
    if (move >= ((arrivalCard[0].offsetWidth + 20) * (arrivalCard.length / 2))) {
        move = 0;
    }

    for (let i = 0; i < arrivalCard.length; i++) {
        arrivalCard[i].style.transform = `translateX(-${move}px)`;
    }

    move += (arrivalCard[0].offsetWidth + 20) * 3;

}, 3000);

// ==================================
//    Call to Action Animation End
// ==================================





// =====================================
//    Product Cart Control Area Start
// =====================================

// selecting featured products and product cart elements
let shoppingCartBtn = document.querySelector('#icon-shopping-cart');
let cartIconProductCounter = document.querySelector('#item-counter');
let productCartArea = document.querySelector('#product-cart-area');

let favoriteIcon = document.querySelectorAll('.add-to-favorite > span');
let cartWishlistArea = document.querySelector('.cart-wishlist-area');

let itemDeleteConfirmationBox = document.querySelector('.remove-confirmation-message');
let itemDeleteConfirmationBoxTitle = document.querySelector('.remove-message-title h2');
let popupShadow = document.querySelector('.popup-shadow');
let removeCancelBtn = document.querySelector('#remove-cancel-btn');
let removeConfirmBtn = document.querySelector('#remove-confirm-btn');

let shoppingCart = document.querySelector('.shopping-cart-area');
let cartContentMenu = document.querySelectorAll('.cart-menu-items h2');
let cartCloseButton = document.querySelector('.cart-close-btn button');
let shoppingCartContentsArea = document.querySelectorAll('.shopping-cart-contents-area');

let featuredProducts = document.querySelectorAll('.product-wrap');
let productImage = document.querySelectorAll('.product-img img');
let productPrice = document.querySelectorAll('.f-product-price');
let productDiscount = document.querySelectorAll('.discount');
let productName = document.querySelectorAll('.product-name');
let currentPrice = document.querySelectorAll('.f-cur-price');
let productUnit = document.querySelectorAll('.f-product-unit');
let addToCartBtn = document.querySelectorAll('.add-to-cart-btn p');
let cartContentArea = document.querySelector('.cart-contents-area');
let shoppingCartArea = document.querySelector('.shopping-cart-wrap');
let buyingProductContent = document.querySelector('.buying-product-title');
let buyingDetailsFooter = document.querySelector('.buying-details-footer');
let totalBuyingItems = document.querySelector('.calculate-total-items p span');
let shoppingDetailsContent = document.querySelector('.shopping-details-content');
let totalBuyingItemsQuantity = document.querySelector('.calculate-total-quantity p');
let totalBuyingItemsAmount = document.querySelector('.calculate-total-amount p span');

let totalSelectedProduct = document.querySelector('#total-selected');
let totalFavoriteProduct = document.querySelector('#total-favorite');
let totalSelectedCounter = document.querySelector('#total-selected span');
let totalFavoriteCounter = document.querySelector('#total-favorite span');
let totalAddToBuyCounter = document.querySelector('#total-buying-item-counter');

let controllScrolling = document.querySelector('html');

// item counter
let countSelectedItem = 0;
let countFavoriteItem = 0;
let countAddToBuyItem = 0;
let countBuyProductSl = 0;
let countTotalWeight = 0;
let countTotalPieces = 0;
let countTotalAmount = 0;
let countTotalDozen = 0;

// store event data
let addedToCart = [];
let addedForBuy = [];
let newCartContent = [];
let addedToFavorite = [];
let newfavoriteItem = [];
let shoppingCartItem = [];
let storeShopItemsIndex = [];

let isSelectedItemActive = true;

// calculate and update current price
(function () {
    for (let i = 0; i < featuredProducts.length; i++) {
        let oldPrice = productPrice[i].textContent;
        let discount = productDiscount[i].textContent;

        let newPrice = oldPrice - Math.round((oldPrice * (discount / 100)));

        currentPrice[i].textContent = newPrice;
    }
})();

// show cart area
shoppingCartBtn.onclick = () => {
    toggleBar.classList.remove('active-toggler');
    navigationArea.classList.remove('active-navbar');
    searchBox.classList.remove('active-search-box');
    supportCenter.classList.remove('active-support-center');
    productCartArea.classList.add('active-cart');
    controllScrolling.style.overflowY = 'hidden';
}

// remove cart area
cartCloseButton.onclick = () => {
    productCartArea.classList.remove('active-cart');
    controllScrolling.style.overflowY = 'auto';
}

// display cart buying header
function displayBuyingHeader(countValue) {
    let totalShopItems = shoppingDetailsContent.children.length;
    if (countValue > 0 && isSelectedItemActive === true) {
        buyingProductContent.classList.add('acvie-buying-title');
    } else if (totalShopItems > 0 && isSelectedItemActive === true) {
        buyingProductContent.classList.add('acvie-buying-title');
    } else {
        buyingProductContent.classList.remove('acvie-buying-title');
    }
}

// cart header menu switch and show/hide total items counter
(function () {
    for (let i = 0; i < cartContentMenu.length; i++) {
        cartContentMenu[i].addEventListener('click', function () {
            for (let j = 0; j < cartContentMenu.length; j++) {
                cartContentMenu[j].classList.remove('active-cart-menu');
                shoppingCartContentsArea[j].classList.remove('active-cart-content');
                totalSelectedProduct.classList.remove('active-product-counter');
                totalFavoriteProduct.classList.remove('active-product-counter');
            }
            cartContentMenu[i].classList.add('active-cart-menu');
            shoppingCartContentsArea[i].classList.add('active-cart-content');
            if (cartContentMenu[i].getAttribute('id') === 'selected-products') {
                totalSelectedProduct.classList.add('active-product-counter');
                if (countSelectedItem > 0) {
                    buyingProductContent.classList.add('acvie-buying-title');
                    totalSelectedCounter.innerHTML = countSelectedItem;
                } else {
                    totalSelectedCounter.innerHTML = 'No item found';
                }
                isSelectedItemActive = true;
            } else {
                totalFavoriteProduct.classList.add('active-product-counter');
                buyingProductContent.classList.remove('acvie-buying-title');
                if (countFavoriteItem > 0) {
                    totalFavoriteCounter.innerHTML = countFavoriteItem;
                } else {
                    totalFavoriteCounter.innerHTML = 'No item found';
                }

                isSelectedItemActive = false;
            }

            displayBuyingHeader(countSelectedItem);

        });
    }
})();

// set event data false
(function () {
    for (let i = 0; i < addToCartBtn.length; i++) {
        addedToCart[i] = false;
        addedForBuy[i] = false;
        addedToFavorite[i] = false;
    }
})();

// create elements for selected product content
function createSelectedProductsContent(image, name, price, unit, discount, preservative, time) {
    let newCartContent = document.createElement('div');
    newCartContent.setAttribute('class', 'cart-content');

    let newCartImageArea = document.createElement('div');
    newCartImageArea.setAttribute('class', 'cart-image-area');

    let newCartDetails = document.createElement('div');
    newCartDetails.setAttribute('class', 'cart-details');

    //children of newCartImageArea
    let newImage = document.createElement('img');
    newImage.src = image;

    newCartImageArea.appendChild(newImage);

    // childrens of newCartDetails
    let newHeading2 = document.createElement('h2');
    newHeading2.textContent = 'Product Details';

    let newPara = [];
    let newStrong = [];
    for (let i = 0; i < 6; i++) {
        newPara[i] = document.createElement('p');
        newStrong[i] = document.createElement('strong');
    }

    newStrong[0].textContent = 'Product name: ';
    newStrong[1].textContent = 'Price: ';
    newStrong[2].textContent = 'Discount: ';
    newStrong[3].textContent = 'Quantity: ';
    newStrong[4].textContent = 'Preservatives: ';
    newStrong[5].textContent = 'Added Time: ';

    for (let i = 0; i < 6; i++) {
        newPara[i].appendChild(newStrong[i]);
    }

    let newInput = document.createElement('input');
    newInput.setAttribute('type', 'number');
    newPara[3].appendChild(newInput);

    let newQuantitySpan = document.createElement('span');
    newQuantitySpan.innerHTML = `${unit}`;
    newQuantitySpan.style.paddingLeft = '0.4rem';
    newPara[3].appendChild(newQuantitySpan);

    let newSpan = [];
    for (let i = 0; i < 3; i++) {
        newSpan[i] = document.createElement('span');
    }

    newSpan[0].textContent = name;
    newSpan[1].textContent = price + `Tk/${unit}`;
    newSpan[2].textContent = discount + '%';

    for (let i = 0; i < 3; i++) {
        newPara[i].appendChild(newSpan[i]);
    }

    let preservativeSpan = document.createElement('span');
    preservativeSpan.textContent = preservative;

    let timeSpan = document.createElement('span');
    timeSpan.textContent = time;

    newPara[4].appendChild(preservativeSpan);
    newPara[5].appendChild(timeSpan);

    let newShoppingButton = [];

    for (let i = 0; i < 2; i++) {
        newShoppingButton[i] = document.createElement('button');
    }

    newShoppingButton[0].textContent = 'Add to Buy';
    newShoppingButton[1].textContent = 'Remove Item';

    newShoppingButton[0].setAttribute('class', 'add-to-buy-btn');
    newShoppingButton[1].setAttribute('class', 'remove-item-btn');

    // adding children to parent element
    newCartDetails.appendChild(newHeading2);

    for (let i = 0; i < 6; i++) {
        newCartDetails.appendChild(newPara[i]);
    }

    for (let i = 0; i < 2; i++) {
        newCartDetails.appendChild(newShoppingButton[i]);
    }

    newCartContent.appendChild(newCartImageArea);
    newCartContent.appendChild(newCartDetails);

    return newCartContent;
}

// get product added time
function getAddedTime() {
    let dt = new Date();

    let dd = dt.getDate();
    let mm = dt.getMonth() + 1;
    let yyyy = dt.getFullYear();

    let HH = dt.getHours();
    let MM = dt.getMinutes();
    let XM = null;

    (HH >= 12) ? XM = 'PM': XM = 'AM';

    if (HH > 12) {
        HH -= 12;
    }

    if (HH == 0) {
        HH = 12;
    }

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    if (HH < 10) {
        HH = '0' + HH;
    }

    if (MM < 10) {
        MM = '0' + MM;
    }

    let format = `${dd}/${mm}/${yyyy}  ${HH}:${MM} ${XM}`;

    return format;
}

// add items to selected products
function addItemsToSelectedProducts(productIndex) {
    addToCartBtn[productIndex].style.background = 'orangered';
    addToCartBtn[productIndex].innerHTML = '<span class="icon-cart-arrow-down"></span> Added';
    let productCartImage = productImage[productIndex].src;
    let productCartName = productName[productIndex].textContent;
    let productCartPrice = productPrice[productIndex].textContent;
    let productCartUnit = productUnit[productIndex].textContent;
    let productCartDiscount = productDiscount[productIndex].textContent;
    let preservativeName = 'No';
    let addedTime = getAddedTime();
    newCartContent[productIndex] = createSelectedProductsContent(productCartImage, productCartName, productCartPrice, productCartUnit, productCartDiscount, preservativeName, addedTime);
    cartContentArea.insertBefore(newCartContent[productIndex], cartContentArea.firstChild);
}

// remove Items to selected products
function removeItemsToSelectedProducts(productIndex) {
    addToCartBtn[productIndex].style.background = '#459122';
    addToCartBtn[productIndex].innerHTML = '<span class="icon-cart-plus"></span> Add to Cart';
    cartContentArea.removeChild(newCartContent[productIndex]);
}

// active add to cart button of favorite item
function activeFavoriteItemAddToCartBtn(productIndex) {
    let favoriteItemAddToCartBtn = newfavoriteItem[productIndex].children[2].children[2].children[0];
    favoriteItemAddToCartBtn.style.background = 'orangered';
    favoriteItemAddToCartBtn.innerHTML = '<span class="icon-cart-arrow-down"></span> Added';
}

// deactive add to cart button of favorite item
function deactiveFavoriteItemAddToCartBtn(productIndex) {
    let favoriteItemAddToCartBtn = newfavoriteItem[productIndex].children[2].children[2].children[0];
    favoriteItemAddToCartBtn.style.background = '#459122';
    favoriteItemAddToCartBtn.innerHTML = '<span class="icon-cart-plus"></span> Add to Cart';
}

// create favorite content wrapper
function favoriteContentWrapper() {
    let newProductWrapper = document.createElement('div');
    newProductWrapper.setAttribute('class', 'product-wrap');

    return newProductWrapper;
}

// add items to favorite products
function addItemsToFavoriteProducts(productIndex) {
    favoriteIcon[productIndex].style.background = 'orangered';
    let clone = featuredProducts[productIndex].cloneNode(true);
    let favoriteContentWrap = favoriteContentWrapper();
    newfavoriteItem[productIndex] = favoriteContentWrap.appendChild(clone);
    cartWishlistArea.appendChild(newfavoriteItem[productIndex]);
}

// remove items to favorite products
function removeItemsToFavoriteProducts(productIndex) {
    favoriteIcon[productIndex].style.background = '#61790a';
    cartWishlistArea.removeChild(newfavoriteItem[productIndex]);
}

// show confirmation box
function activeConfirmationBox(confirmMessage) {
    itemDeleteConfirmationBox.classList.add('active-confirmation-box');
    itemDeleteConfirmationBoxTitle.innerHTML = confirmMessage;
    popupShadow.classList.add('active-popup-shadow');
    shoppingCart.style.overflow = 'hidden';
}

// remove confirmation box
function removeConfirmationBox() {
    itemDeleteConfirmationBox.classList.remove('active-confirmation-box');
    popupShadow.classList.remove('active-popup-shadow');
    shoppingCart.style.overflow = 'auto';
}

// display cart item counter
function displayCartCounter(countValue) {
    if (countValue > 0) {
        cartIconProductCounter.classList.add('active-item-counter');
    } else {
        cartIconProductCounter.classList.remove('active-item-counter');
    }
}

// create shopping cart item
function createShoppingCartItem(itemName, itemPrice, itemUnit, itemDiscount, presentPrice, itemQuantity) {
    let newParentDiv = document.createElement('div');
    newParentDiv.setAttribute('class', 'shopping-details');

    let newChildDiv = [];

    for (let i = 0; i < 8; i++) {
        newChildDiv[i] = document.createElement('div');
    }

    newChildDiv[0].setAttribute('class', 'product-sl');
    newChildDiv[1].setAttribute('class', 'product-name');
    newChildDiv[2].setAttribute('class', 'regular-price');
    newChildDiv[3].setAttribute('class', 'discount');
    newChildDiv[4].setAttribute('class', 'present-price');
    newChildDiv[5].setAttribute('class', 'product-quantity');
    newChildDiv[6].setAttribute('class', 'total-amount');
    newChildDiv[7].setAttribute('class', 'remove-item-btn');

    let newChildPara = [];

    for (let i = 0; i < 7; i++) {
        newChildPara[i] = document.createElement('p');
    }

    let removeBtn = document.createElement('button');
    removeBtn.innerHTML = 'Remove';
    removeBtn.setAttribute('class', 'remove-shop-item');

    let totalPrice = itemQuantity * presentPrice;
    totalPrice = totalPrice.toFixed(2);

    newChildPara[1].innerHTML = itemName;
    newChildPara[2].innerHTML = itemPrice + `Tk/${itemUnit}`;
    newChildPara[3].innerHTML = itemDiscount + `%`;
    newChildPara[4].innerHTML = presentPrice + `Tk/${itemUnit}`;
    newChildPara[5].innerHTML = itemQuantity + ` ${itemUnit}`;
    newChildPara[6].innerHTML = totalPrice + ` Tk`;

    for (let i = 0; i < 7; i++) {
        newChildDiv[i].appendChild(newChildPara[i]);
    }

    newChildDiv[7].appendChild(removeBtn);

    for (let i = 0; i < 8; i++) {
        newParentDiv.appendChild(newChildDiv[i]);
    }

    return newParentDiv;
}

// add items to shopping cart area
function addItemsToShoppingCartArea(itemIndex, buyBtn, itemQuantity) {
    totalAddToBuyCounter.innerHTML = ++countAddToBuyItem;
    buyBtn.style.background = 'crimson';
    buyBtn.innerHTML = 'Added';

    let getQuantity = Number(itemQuantity.value);
    let getItemName = productName[itemIndex].textContent;
    let getItemPrice = productPrice[itemIndex].textContent;
    let getItemUnit = productUnit[itemIndex].textContent;
    let getItemDiscount = productDiscount[itemIndex].textContent;
    let getPresentPrice = getItemPrice - ((getItemDiscount / 100) * getItemPrice);

    getPresentPrice = getPresentPrice.toFixed(2);
    shoppingCartItem[itemIndex] = createShoppingCartItem(getItemName, getItemPrice, getItemUnit, getItemDiscount, getPresentPrice, getQuantity);
    shoppingDetailsContent.appendChild(shoppingCartItem[itemIndex]);

    if (getItemUnit === 'kg') {
        countTotalWeight += getQuantity;
    } else if (getItemUnit === 'dzn') {
        countTotalDozen += getQuantity;
    } else if (getItemUnit === 'pcs') {
        countTotalPieces += getQuantity;
    }

    countTotalAmount += getPresentPrice * getQuantity;
}

// remove items to shopping cart area
function removeItemsToShoppingCartArea(itemIndex, buyBtn, itemQuantity) {
    totalAddToBuyCounter.innerHTML = --countAddToBuyItem;
    buyBtn.style.background = '#267247';
    buyBtn.innerHTML = 'Add to Buy';

    let getQuantity = Number(itemQuantity.value);
    let getItemPrice = productPrice[itemIndex].textContent;
    let getItemUnit = productUnit[itemIndex].textContent;
    let getItemDiscount = productDiscount[itemIndex].textContent;
    let getPresentPrice = getItemPrice - ((getItemDiscount / 100) * getItemPrice);

    shoppingDetailsContent.removeChild(shoppingCartItem[itemIndex]);

    if (getItemUnit === 'kg') {
        countTotalWeight -= getQuantity;
    } else if (getItemUnit === 'dzn') {
        countTotalDozen -= getQuantity;
    } else if (getItemUnit === 'pcs') {
        countTotalPieces -= getQuantity;
    }

    countTotalAmount -= getPresentPrice * getQuantity;
    itemQuantity.value = '';
}

// display buying details footer
function displayBuyingDetailsFooter(countValue) {

    if (countValue > 0) {
        buyingDetailsFooter.classList.add('active-buying-details-footer');
    } else {
        buyingDetailsFooter.classList.remove('active-buying-details-footer');
    }

    totalBuyingItems.innerHTML = shoppingDetailsContent.children.length;

    let quantityResult = ``;

    let quantityList = [countTotalWeight, countTotalDozen, countTotalPieces];

    for (let i = 0; i < quantityList.length; i++) {
        if (quantityList[i] !== 0) {
            if (quantityResult !== ``) {
                quantityResult += ` + `;
            }

            if (i === 0) {
                if (countTotalWeight % 1 === 0) {
                    quantityResult += `${countTotalWeight} kg`;
                } else {
                    quantityResult += `${countTotalWeight.toFixed(2)} kg`;
                }
            } else if (i === 1) {
                if (countTotalDozen % 1 === 0) {
                    quantityResult += `${countTotalDozen} dzn`;
                } else {
                    quantityResult += `${countTotalDozen.toFixed(2)} dzn`;
                }
            } else {
                if (countTotalPieces % 1 === 0) {
                    quantityResult += `${countTotalPieces} pcs`;
                } else {
                    quantityResult += `${countTotalPieces.toFixed(2)} pcs`;
                }
            }
        }
    }

    totalBuyingItemsQuantity.innerHTML = quantityResult;
    totalBuyingItemsAmount.innerHTML = countTotalAmount.toFixed(1);
}

// controll product serial number
function setProductSl() {
    let sl = 0;
    let shopItems = shoppingDetailsContent.children;
    for (let i = 0; i < shopItems.length; i++) {
        shopItems[i].children[0].children[0].innerHTML = ++sl;
    }
}

// remove shop itmes index from array
function removeShopItemsIndex(index) {
    for (let i = 0; i < storeShopItemsIndex.length; i++) {
        if (storeShopItemsIndex[i] === index) {
            for (let j = i; j < storeShopItemsIndex.length; j++) {
                storeShopItemsIndex[j] = storeShopItemsIndex[j + 1];
            }
        }
    }
    storeShopItemsIndex.length--;
}

// remove selected product item
function removeSelectedProduct(productIndex) {
    removeItemsToSelectedProducts(productIndex);
    if (newfavoriteItem[productIndex] !== undefined) {
        deactiveFavoriteItemAddToCartBtn(productIndex);
    }
    --countSelectedItem;
    totalSelectedCounter.innerHTML = countSelectedItem;
    cartIconProductCounter.innerHTML = countSelectedItem;
    displayBuyingHeader(countSelectedItem);
    displayCartCounter(countSelectedItem);
    addedToCart[productIndex] = false;
}

// remove shopping cart product
function removeShoppingCartProduct(productIndex) {
    let addToBuyBtn = newCartContent[productIndex].children[1].children[7];
    let itemQuantity = newCartContent[productIndex].children[1].children[4].children[1];
    removeItemsToShoppingCartArea(productIndex, addToBuyBtn, itemQuantity);
    displayBuyingDetailsFooter(countAddToBuyItem);
    displayBuyingHeader(countSelectedItem);
    itemQuantity.removeAttribute('disabled');
    removeShopItemsIndex(productIndex);
    setProductSl();
    addedForBuy[productIndex] = false;
}

// add product to shopping cart area
function addProductToShoppingCart(productIndex) {
    let addToBuyBtn = newCartContent[productIndex].children[1].children[7];
    let itemQuantity = newCartContent[productIndex].children[1].children[4].children[1];
    addItemsToShoppingCartArea(productIndex, addToBuyBtn, itemQuantity);
    displayBuyingDetailsFooter(countAddToBuyItem);
    itemQuantity.setAttribute('disabled', 'true');
    storeShopItemsIndex.push(productIndex);
    setProductSl();
}

// shopping items controll area
function controlShoppingProductItems(itemIndex) {
    let itemQuantity = newCartContent[itemIndex].children[1].children[4].children[1];
    if (addedForBuy[itemIndex] === false && itemQuantity.value !== '' && itemQuantity.value > 0) {
        addProductToShoppingCart(itemIndex);
        let shopItemRemoveBtn = shoppingCartItem[itemIndex].children[7].children[0];
        shopItemRemoveBtn.addEventListener('click', function () {
            removeShoppingCartProduct(itemIndex);
        });
        addedForBuy[itemIndex] = true;
    } else if (addedForBuy[itemIndex] === true && itemQuantity.value !== '' && itemQuantity.value > 0) {
        removeShoppingCartProduct(itemIndex);
    } else {
        if (itemQuantity.value === '') {
            alert('Please fill the quantity of your item');
        } else {
            alert('Please enter a valid quantity of your item');
        }
    }
}

// control selected product items
function controlSelectedProductItems(itemIndex) {
    if (addedToCart[itemIndex] === false) {
        addItemsToSelectedProducts(itemIndex);
        if (newfavoriteItem[itemIndex] !== undefined) {
            activeFavoriteItemAddToCartBtn(itemIndex);
        }

        let selectedProductRemoveBtn = newCartContent[itemIndex].children[1].children[8];

        selectedProductRemoveBtn.onclick = () => {
                removeSelectedProduct(itemIndex);

                // remove shopping cart item
                if (addedForBuy[itemIndex] === true) {
                    removeShoppingCartProduct(itemIndex);
                }

            }
            ++countSelectedItem;
        totalSelectedCounter.innerHTML = countSelectedItem;
        cartIconProductCounter.innerHTML = countSelectedItem;
        addedToCart[itemIndex] = true;
    } else {
        removeSelectedProduct(itemIndex);

        // remove shopping cart item
        if (addedForBuy[itemIndex] === true) {
            removeShoppingCartProduct(itemIndex);
        }
    }

    let addToBuyBtn = newCartContent[itemIndex].children[1].children[7];

    addToBuyBtn.onclick = () => {
        controlShoppingProductItems(itemIndex);
    }

    displayBuyingHeader(countSelectedItem);
    displayCartCounter(countSelectedItem);
}

// control favorite product items
function controlFavoriteProductItems(itemIndex) {
    if (addedToFavorite[itemIndex] === false) {
        addItemsToFavoriteProducts(itemIndex);
        totalFavoriteCounter.innerHTML = ++countFavoriteItem;
        addedToFavorite[itemIndex] = true;
    } else {
        removeItemsToFavoriteProducts(itemIndex);
        totalFavoriteCounter.innerHTML = --countFavoriteItem;
        addedToFavorite[itemIndex] = false;
    }

    let favoriteContent = newfavoriteItem[itemIndex].children[1].children[0];

    favoriteContent.addEventListener('click', function () {
        activeConfirmationBox('Remove item from wishlist?');
        removeConfirmBtn.onclick = () => {
            removeItemsToFavoriteProducts(itemIndex);
            totalFavoriteCounter.innerHTML = --countFavoriteItem;
            addedToFavorite[itemIndex] = false;
            removeConfirmationBox();
        }

        removeCancelBtn.onclick = () => {
            removeConfirmationBox();
        }

    });

    // select 'Add to Cart' button of favorite item
    let favoriteItemAddToCartBtn = newfavoriteItem[itemIndex].children[2].children[2].children[0];

    // actions while click 'Add to Cart' button of favorite item 
    favoriteItemAddToCartBtn.addEventListener('click', function () {
        controlSelectedProductItems(itemIndex);
    });
}

// controll product items and product cart area
(function () {
    for (let i = 0; i < addToCartBtn.length; i++) {

        // actions while click 'Add to Cart' button
        addToCartBtn[i].addEventListener('click', function () {
            controlSelectedProductItems(i);
        });

        // actions while click favorite icon 
        favoriteIcon[i].addEventListener('click', function () {
            controlFavoriteProductItems(i);
        });
    }
})();

// product cart 'Buy Items' button
let buyNowBtn = document.querySelector('#buy-items');
let buyingDetailsArea = document.querySelector('.buying-details-area');
let closeBuyingDetailsArea = document.querySelector('.close-buy-area');

// show shopping cart area
buyNowBtn.onclick = () => {
    buyingDetailsArea.classList.add('active-buying-details');
}

// remove shopping cart area
closeBuyingDetailsArea.onclick = () => {
    buyingDetailsArea.classList.remove('active-buying-details');
}

// select 'Remove all' button of shopping cart area
let removeAllShopItems = document.querySelector('#remove-all-items');

// remove all shopping cart items
removeAllShopItems.onclick = () => {
    if (countAddToBuyItem > 0) {
        activeConfirmationBox('Remove all items from cart?');
        removeConfirmBtn.onclick = () => {
            for (let i = 0; i < storeShopItemsIndex.length; i++) {
                let itemIndex = storeShopItemsIndex[i];
                let buyBtn = newCartContent[itemIndex].children[1].children[7];
                let itemQuantity = newCartContent[itemIndex].children[1].children[4].children[1];
                removeItemsToShoppingCartArea(itemIndex, buyBtn, itemQuantity);
                itemQuantity.removeAttribute('disabled');
                addedForBuy[itemIndex] = false;
            }
            storeShopItemsIndex = [];
            displayBuyingDetailsFooter(countAddToBuyItem);
            displayBuyingHeader(countSelectedItem);
            removeConfirmationBox();
        }
        removeCancelBtn.onclick = () => {
            removeConfirmationBox();
        }
    } else {
        alert('No items found in shopping cart');
    }
}

// ===================================
//    Product Cart Control Area End
// ===================================





// ================================
//    Hot Deals Timer Area Start
// ================================

// big deals countdown timer
const bigDealsDay = document.getElementById('day');
const bigDealsHour = document.getElementById('hour');
const bigDealsMinute = document.getElementById('minute');
const bigDealsSecond = document.getElementById('second');

// initialize date, month, year
let date = new Date();
let monthIndex = date.getMonth();
let year = date.getFullYear();

let dayConst = 86400;
let hourConst = 3600;
let minuteConst = 60;

let month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// display countdown timer
function updateCountDownTimer(time, dest) {
    dest[0].textContent = time[0];
    dest[1].textContent = time[1];
    dest[2].textContent = time[2];
    dest[3].textContent = time[3];
}

// big deals timer --> Infinite Countdown
let timeCount = setInterval((date, time) => {
    let timerValues, updateDest;

    let curntTime = Date.now();
    let eventTime = new Date(`${month[monthIndex]} ${date}, ${year} ${time}`).getTime();

    let totalSeconds = (eventTime - curntTime) / 1000;

    if (totalSeconds < 0) {
        monthIndex = (monthIndex + 1) % 12;

        console.log(`Hello`);

        if (monthIndex === 0) {
            year = year + 1;
        }

        let eventTime = new Date(`${month[monthIndex]} ${date}, ${year} ${time}`).getTime();
        totalSeconds = (eventTime - curntTime) / 1000;
    }

    let days = Math.floor(totalSeconds / dayConst);
    totalSeconds = totalSeconds % dayConst;

    let hours = Math.floor(totalSeconds / hourConst);
    totalSeconds = totalSeconds % hourConst;

    let minutes = Math.floor(totalSeconds / minuteConst);
    totalSeconds = totalSeconds % minuteConst;

    let seconds = Math.floor(totalSeconds);

    if (days < 10) {
        days = '0' + days;
    }

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    // createCountdown = createInfiniteCountdown('18', '20:00:00');
    updateDest = [bigDealsDay, bigDealsHour, bigDealsMinute, bigDealsSecond];
    timerValues = [days, hours, minutes, seconds];

    updateCountDownTimer(timerValues, updateDest);

}, 1000, '26', '20:00:00');

// ===============================
//     Hot Deals Timer Area End
// ===============================





// ============================
//    Great Deals Area Start
// ============================

// selecting great deals product elements
let greatDealsProducts = document.querySelectorAll('.great-deals-product-wrap');
let greatDealsProductImage = document.querySelectorAll('.great-deals-image img');
let greatDealsProductName = document.querySelectorAll('.gd-product-name');
let greatDealsProductDiscount = document.querySelectorAll('.gd-discount');
let greatDealsProductPrice = document.querySelectorAll('.gd-price');
let greatDealsProductUnit = document.querySelectorAll('.gd-unit');
let greatDealsProductPrevPrice = document.querySelectorAll('.gd-price-del');
let greatDealsProductPrevUnit = document.querySelectorAll('.gd-unit-del');
let greatDealsProductRating = document.querySelectorAll('.gd-rating-avg strong');
let greatDealsProductReviewCount = document.querySelectorAll('.gd-review-count');
let greatDealsProductOfferEndsDate = document.querySelectorAll('.offer-ends-date');

// selecting great deals timer elements
const greatDealsDay = document.querySelectorAll('.gd-timer-days');
const greatDealsHour = document.querySelectorAll('.gd-timer-hours');
const greatDealsMinute = document.querySelectorAll('.gd-timer-minutes');
const greatDealsSecond = document.querySelectorAll('.gd-timer-seconds');

// Initialize month and year index
let monthIndex1 = date.getMonth();
let year1 = date.getFullYear();

let monthIndex2 = date.getMonth();
let year2 = date.getFullYear();

let monthIndex3 = date.getMonth();
let year3 = date.getFullYear();

// set timer values
let date1 = `18`,
    time1 = `22:20:05`;
let date2 = `20`,
    time2 = `18:40:15`;
let date3 = `22`,
    time3 = `16:20:30`;

// timer 01 --> Infinite Countdown
let timeCount1 = setInterval((date, time) => {
    let timerValues, updateDest;

    let curntTime = Date.now();
    let eventTime = new Date(`${month[monthIndex1]} ${date}, ${year1} ${time}`).getTime();

    let totalSeconds = (eventTime - curntTime) / 1000;

    if (totalSeconds < 0) {
        monthIndex1 = (monthIndex1 + 1) % 12;

        if (monthIndex1 === 0) {
            year1 = year1 + 1;
        }

        let eventTime = new Date(`${month[monthIndex1]} ${date}, ${year1} ${time}`).getTime();
        totalSeconds = (eventTime - curntTime) / 1000;
    }

    greatDealsProductOfferEndsDate[0].textContent = `${date} ${month[monthIndex1]} ${year1}`;

    let days = Math.floor(totalSeconds / dayConst);
    totalSeconds = totalSeconds % dayConst;

    let hours = Math.floor(totalSeconds / hourConst);
    totalSeconds = totalSeconds % hourConst;

    let minutes = Math.floor(totalSeconds / minuteConst);
    totalSeconds = totalSeconds % minuteConst;

    let seconds = Math.floor(totalSeconds);

    if (days < 10) {
        days = '0' + days;
    }

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    updateDest = [greatDealsDay[0], greatDealsHour[0], greatDealsMinute[0], greatDealsSecond[0]];
    timerValues = [days, hours, minutes, seconds];

    updateCountDownTimer(timerValues, updateDest);

}, 1000, date1, time1);

// timer 02 --> Infinite Countdown
let timeCount2 = setInterval((date, time) => {
    let timerValues, updateDest;

    let curntTime = Date.now();
    let eventTime = new Date(`${month[monthIndex2]} ${date}, ${year2} ${time}`).getTime();

    let totalSeconds = (eventTime - curntTime) / 1000;

    if (totalSeconds < 0) {
        monthIndex2 = (monthIndex2 + 1) % 12;

        if (monthIndex2 === 0) {
            year2 = year2 + 1;
        }

        let eventTime = new Date(`${month[monthIndex2]} ${date}, ${year2} ${time}`).getTime();
        totalSeconds = (eventTime - curntTime) / 1000;
    }

    greatDealsProductOfferEndsDate[1].textContent = `${date} ${month[monthIndex2]} ${year2}`;

    let days = Math.floor(totalSeconds / dayConst);
    totalSeconds = totalSeconds % dayConst;

    let hours = Math.floor(totalSeconds / hourConst);
    totalSeconds = totalSeconds % hourConst;

    let minutes = Math.floor(totalSeconds / minuteConst);
    totalSeconds = totalSeconds % minuteConst;

    let seconds = Math.floor(totalSeconds);

    if (days < 10) {
        days = '0' + days;
    }

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    updateDest = [greatDealsDay[1], greatDealsHour[1], greatDealsMinute[1], greatDealsSecond[1]];
    timerValues = [days, hours, minutes, seconds];

    updateCountDownTimer(timerValues, updateDest);

}, 1000, date2, time2);

// timer 03 --> Infinite Countdown
let timeCount3 = setInterval((date, time) => {
    let timerValues, updateDest;

    let curntTime = Date.now();
    let eventTime = new Date(`${month[monthIndex3]} ${date}, ${year3} ${time}`).getTime();

    let totalSeconds = (eventTime - curntTime) / 1000;

    if (totalSeconds < 0) {
        monthIndex3 = (monthIndex3 + 1) % 12;

        if (monthIndex3 === 0) {
            year3 = year3 + 1;
        }

        let eventTime = new Date(`${month[monthIndex3]} ${date}, ${year3} ${time}`).getTime();
        totalSeconds = (eventTime - curntTime) / 1000;
    }

    greatDealsProductOfferEndsDate[2].textContent = `${date} ${month[monthIndex3]} ${year3}`;

    let days = Math.floor(totalSeconds / dayConst);
    totalSeconds = totalSeconds % dayConst;

    let hours = Math.floor(totalSeconds / hourConst);
    totalSeconds = totalSeconds % hourConst;

    let minutes = Math.floor(totalSeconds / minuteConst);
    totalSeconds = totalSeconds % minuteConst;

    let seconds = Math.floor(totalSeconds);

    if (days < 10) {
        days = '0' + days;
    }

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    updateDest = [greatDealsDay[2], greatDealsHour[2], greatDealsMinute[2], greatDealsSecond[2]];
    timerValues = [days, hours, minutes, seconds];

    updateCountDownTimer(timerValues, updateDest);

}, 1000, date3, time3);

// ==========================
//    Great Deals Area End
// ==========================





// =================================
//    Outer Products Control Area 
// =================================

// selecting notification box elements
let notificationBox = document.querySelector('.notification-box');
let notificationMessage = document.querySelector('.notification-message');
let notificationBoxConfirmBtn = document.querySelector('#not-confirm-btn');
let notificationBoxRemoveBtn = document.querySelector('#not-calcel-btn');

// add outer product to selected products area
function addOuterProductToShoppingCartArea(productClass) {

    for (let i = 0; i < featuredProducts.length; i++) {
        let freaturedProductClass = getClassName(featuredProducts[i], 1);

        if (productClass === freaturedProductClass) {
            if (addedToCart[i] === false) {
                notificationMessage.textContent = `Are you sure to add this product to product cart?`;
                notificationBoxConfirmBtn.textContent = `Ok`;

                addClass(notificationBox, ['animate__animated', 'animate__bounceInRight', 'active-notification-box']);

                setTimeout(() => {
                    removeClass(notificationBox, ['animate__animated', 'animate__bounceInRight']);
                }, 1200);

                notificationBoxConfirmBtn.onclick = () => {
                    controlSelectedProductItems(i);
                    notificationBox.classList.remove('active-notification-box');
                }

                notificationBoxRemoveBtn.onclick = () => {
                    notificationBox.classList.remove('active-notification-box');
                }

            } else {
                notificationMessage.textContent = `This item is already exist on cart! Want to remove?`;
                notificationBoxConfirmBtn.textContent = `Remove`;

                addClass(notificationBox, ['animate__animated', 'animate__bounceInRight', 'active-notification-box']);

                setTimeout(() => {
                    removeClass(notificationBox, ['animate__animated', 'animate__bounceInRight']);
                }, 1200);

                notificationBoxConfirmBtn.onclick = () => {

                    removeSelectedProduct(i);

                    // remove shopping cart item
                    if (addedForBuy[i] === true) {
                        removeShoppingCartProduct(i);
                    }

                    notificationBox.classList.remove('active-notification-box');
                }

                notificationBoxRemoveBtn.onclick = () => {
                    notificationBox.classList.remove('active-notification-box');
                }
            }

            break;
        }
    }
}

// add outer product to favorite products area
function addOuterProductToFavoriteProductArea(productClass) {

    for (let i = 0; i < featuredProducts.length; i++) {
        let freaturedProductClass = getClassName(featuredProducts[i], 1);

        if (productClass === freaturedProductClass) {
            if (addedToFavorite[i] === false) {
                notificationMessage.textContent = `Are you sure to add this product to favorite?`;
                notificationBoxConfirmBtn.textContent = `Ok`;

                addClass(notificationBox, ['animate__animated', 'animate__bounceInRight', 'active-notification-box']);

                setTimeout(() => {
                    removeClass(notificationBox, ['animate__animated', 'animate__bounceInRight']);
                }, 1200);

                notificationBoxConfirmBtn.onclick = () => {
                    controlFavoriteProductItems(i);
                    notificationBox.classList.remove('active-notification-box');
                }

                notificationBoxRemoveBtn.onclick = () => {
                    notificationBox.classList.remove('active-notification-box');
                }

            } else {
                notificationMessage.textContent = `This item is already exist on favorite! Want to remove?`;
                notificationBoxConfirmBtn.textContent = `Remove`;

                addClass(notificationBox, ['animate__animated', 'animate__bounceInRight', 'active-notification-box']);

                setTimeout(() => {
                    removeClass(notificationBox, ['animate__animated', 'animate__bounceInRight']);
                }, 1200);

                notificationBoxConfirmBtn.onclick = () => {
                    controlFavoriteProductItems(i);
                    notificationBox.classList.remove('active-notification-box');
                }

                notificationBoxRemoveBtn.onclick = () => {
                    notificationBox.classList.remove('active-notification-box');
                }
            }

            break;
        }
    }
}

// =====================================
//    Outer Products Control Area End 
// =====================================





// =================================
//    Product Overview Area Start 
// =================================

// selecting product overview elements
let overviewProducts = document.querySelectorAll('.overview-product');
let overviewProductName = document.querySelectorAll('.op-name');
let overviewProductPrice = document.querySelectorAll('.op-price');
let overviewProductToggleBtn = document.querySelectorAll('.op-toggle-btn');
let overviewProductMenuItems = document.querySelectorAll('.op-toggle-menu-item');
let overviewProductAddToCartBtn = document.querySelectorAll('.op-add-to-cart-btn');
let overviewProductDiscountPrice = document.querySelectorAll('.op-discount-price');
let overviewProductAddToFavoriteBtn = document.querySelectorAll('.op-add-to-favorite-btn');

let overviewProductPrevIndex = null;

// control overview products
(function () {
    for (let i = 0; i < overviewProductToggleBtn.length; i++) {
        let overviewProductClassName = getClassName(overviewProducts[i], 1);

        for (let j = 0; j < featuredProducts.length; j++) {
            let featuredProductClassName = getClassName(featuredProducts[j], 1);

            if (overviewProductClassName === featuredProductClassName) {
                overviewProductName[i].textContent = `${productName[j].textContent}`;
                overviewProductPrice[i].textContent = `${productPrice[j].textContent}Tk/${productUnit[j].textContent}`;
                overviewProductDiscountPrice[i].textContent = `${currentPrice[j].textContent}Tk/${productUnit[j].textContent}`;
                break;
            }
        }

        overviewProductToggleBtn[i].addEventListener('click', function () {
            for (let j = 0; j < overviewProductToggleBtn.length; j++) {
                overviewProductMenuItems[j].classList.remove('active-op-menu');
            }

            if (overviewProductPrevIndex === i) {
                overviewProductPrevIndex = null;
            } else {
                overviewProductMenuItems[i].classList.add('active-op-menu');
                overviewProductPrevIndex = i;
            }

            overviewProductAddToCartBtn[i].onclick = () => {
                addOuterProductToShoppingCartArea(getClassName(overviewProducts[i], 1));
                overviewProductMenuItems[i].classList.remove('active-op-menu');
                overviewProductPrevIndex = null;
            }

            overviewProductAddToFavoriteBtn[i].onclick = () => {
                addOuterProductToFavoriteProductArea(getClassName(overviewProducts[i], 1));
                overviewProductMenuItems[i].classList.remove('active-op-menu');
                overviewProductPrevIndex = null;
            }

        });
    }
})();

// ===============================
//    Product Overview Area End 
// ===============================





// =======================
//    FAQ Section Start
// =======================

let faqTitle = document.querySelectorAll('.faq-title');
let faqText = document.querySelectorAll('.faq-text');
let faqIcon = document.querySelectorAll('.faq-icon');

let faqPrevIndex = null;

for (let i = 0; i < faqTitle.length; i++) {
    faqTitle[i].addEventListener('click', () => {
        for (let j = 0; j < faqText.length; j++) {
            faqText[j].classList.remove('active-faq-text');
            faqIcon[j].classList.remove('active-faq-icon');
        }

        if (faqPrevIndex === i) {
            faqPrevIndex = null;
        } else {
            faqText[i].classList.add('active-faq-text');
            faqIcon[i].classList.add('active-faq-icon');
            faqPrevIndex = i;
        }

    });
}

// =====================
//    FAQ Section End
// =====================





// ================================
//    Customer Review Area Start
// ================================

let reviewContents = document.querySelectorAll('.review-content');
let prevElemIndex = null;

for (let i = 0; i < reviewContents.length; i++) {
    reviewContents[i].classList.add('close-review');
    reviewContents[i].onclick = () => {
        for (let j = 0; j < reviewContents.length; j++) {
            reviewContents[j].classList.toggle('close-review');
        }
    }
}

// ==============================
//    Customer Review Area End
// ==============================





// ==================================
//    Product Filter Gallery Start
// ==================================

/* product filter area start */
// selecting filter elements
let filterMenu = document.querySelectorAll('.filter-menu li');
let filterContents = document.querySelectorAll('.filter-content');

// show just fruits
(function () {
    for (let i = 0; i < filterContents.length; i++) {
        if (filterContents[i].getAttribute('data-item') === 'fruits') {
            filterContents[i].classList.add('activeContents');
        } else {
            filterContents[i].classList.add('deleteContents');
        }
    }
})();

// filter product gallery
(function () {
    for (let i = 0; i < filterMenu.length; i++) {
        filterMenu[i].addEventListener('click', () => {
            for (let j = 0; j < filterMenu.length; j++) {
                filterMenu[j].classList.remove('active-menu');
            }

            filterMenu[i].classList.add('active-menu');
            let attrValue = filterMenu[i].getAttribute('data-list');

            for (let k = 0; k < filterContents.length; k++) {
                // delete all active contents
                filterContents[k].classList.add('deleteContents');
                filterContents[k].classList.remove('activeContents');

                // display filter contents
                if (filterContents[k].getAttribute('data-item') === attrValue) {
                    filterContents[k].classList.add('activeContents');
                    filterContents[k].classList.remove('deleteContents');
                }
            }
        });
    }
})();

/* product filter area end */



/* lightbox area start */
// selecting lightbox elements
let lightBox = document.querySelector('.lightbox');
let closeBtn = document.querySelector('#close-lightbox');
let imgCategory = document.querySelector('#image-category');
let lightBoxArrow = document.querySelector('.lightbox-arrow');
let lightBoxShadow = document.querySelector('.lightbox-shadow');
let lightBoxImage = document.querySelector('.image-wrapper img');
let lightboxBuyNowBtn = document.querySelector('.lightbox-buy-btn');

// slide button
let leftArrow = document.querySelector('#left-arrow');
let rightArrow = document.querySelector('#right-arrow');

// product info
let recentProductItemName = document.querySelectorAll('.rec-item-name');
let recentProductItemPrice = document.querySelectorAll('.rec-item-price');
let recentProductTotalSales = document.querySelectorAll('.rec-total-sales');
let recentProductItemUnits = document.querySelectorAll('.rec-item-unit');
let recentProductItemStatus = document.querySelectorAll('.rec-item-status');

// update destination
let recentProductName = document.querySelector('#rec-name');
let recentProductPrice = document.querySelector('#rec-price');
let recentProductSales = document.querySelector('#rec-sales');
let recentProductUnit = document.querySelector('#rec-unit');
let recentProductStatus = document.querySelector('#rec-status');

// store product info
let recentProductNameList = [];
let recentProductPriceList = [];
let recentProductUnitsList = [];
let recentProductSalesList = [];
let recentProductStatusList = [];
let recentProductClassNameList = [];

// update product info
function updatePopularProductInfo(index) {
    let getCategory = filterContents[index].getAttribute('data-item');
    let getImg = filterContents[index].querySelector('img').src;

    if (getCategory === 'fruits') {
        imgCategory.textContent = `fruits`;
    } else if (getCategory === 'vegetables') {
        imgCategory.textContent = `vegetables`;
    } else if (getCategory === 'eggs') {
        imgCategory.textContent = `eggs`;
    } else if (getCategory === 'dry-fruits') {
        imgCategory.textContent = `dry fruits`;
    } else if (getCategory === 'spices') {
        imgCategory.textContent = `spices`;
    }

    recentProductName.textContent = `${recentProductNameList[index]}`;
    recentProductPrice.textContent = `${recentProductPriceList[index]}`;
    recentProductSales.textContent = `${recentProductSalesList[index]} `;
    recentProductUnit.textContent = `${recentProductUnitsList[index]}+`;
    recentProductStatus.textContent = `${recentProductStatusList[index]}`;

    lightBoxImage.src = getImg;
}

// control product gallery lightbox
(function () {
    for (let i = 0; i < filterContents.length; i++) {

        recentProductClassNameList.push(getClassName(filterContents[i], 1));

        // search and update product price
        for (let j = 0; j < featuredProducts.length; j++) {
            let freaturedProductClassName = getClassName(featuredProducts[j], 1);
            if (recentProductClassNameList[i] === freaturedProductClassName) {
                recentProductItemName[i].textContent = `${productName[j].textContent}`;
                recentProductItemPrice[i].textContent = `${productPrice[j].textContent} Tk/${productUnit[j].textContent}`;
                recentProductItemUnits[i].textContent = `${productUnit[j].textContent}`;
            }
        }

        // store product info
        recentProductNameList.push(recentProductItemName[i].innerHTML);
        recentProductPriceList.push(recentProductItemPrice[i].innerHTML);
        recentProductUnitsList.push(recentProductItemUnits[i].innerHTML);
        recentProductSalesList.push(recentProductTotalSales[i].innerHTML);
        recentProductStatusList.push(recentProductItemStatus[i].innerHTML);

        // lightbox show, slide, close
        filterContents[i].addEventListener('click', () => {

            updatePopularProductInfo(i);

            lightBox.classList.add('show-lightbox');
            lightBoxShadow.classList.add('show-shadow');
            lightBoxArrow.classList.add('show-lightbox-arrow');
            controllScrolling.style.overflow = 'hidden';

            let slideIndex = i;

            // slide left
            function recentProductSlideLeft() {
                slideIndex--;

                if (slideIndex < 0) {
                    slideIndex = filterContents.length - 1;
                }

                updatePopularProductInfo(slideIndex);
            }

            // slide right
            function recentProductSlideRight() {
                slideIndex++;

                if (slideIndex >= filterContents.length) {
                    slideIndex = 0;
                }

                updatePopularProductInfo(slideIndex);
            }

            leftArrow.onclick = () => {
                recentProductSlideLeft();
            }

            rightArrow.onclick = () => {
                recentProductSlideRight();
            }

            // slide when arrow key down
            document.onkeydown = (event) => {
                if (event.keyCode === 37) {
                    recentProductSlideLeft();
                }

                if (event.keyCode === 39) {
                    recentProductSlideRight();
                }
            }

            // lightbox 'Buy Now' btn
            lightboxBuyNowBtn.onclick = () => {
                addOuterProductToShoppingCartArea(recentProductClassNameList[slideIndex]);
            }

            // close lightbox
            closeBtn.onclick = () => {
                lightBox.classList.remove('show-lightbox');
                lightBoxShadow.classList.remove('show-shadow');
                lightBoxArrow.classList.remove('show-lightbox-arrow');
                controllScrolling.style.overflow = 'auto';
            }
        });
    }
})();

/* lightbox area end */

// ================================
//    Product Filter Gallery End
// ================================





// =================================
//    Login and Signup Area Start
// =================================

// selecting login and signup elements
let loginForm = document.querySelector('.login-wrap');
let signupForm = document.querySelector('.signup-wrap');

let signupToggleBtn = document.querySelector('#toggle-signup');
let loginToggleBtn = document.querySelector('#toggle-login');

let userBtn = document.querySelector('#login-or-signup');
let loginCloseBtn = document.querySelector('#login-close-btn');
let signupCloseBtn = document.querySelector('#signup-close-btn');

userBtn.onclick = () => {
    toggleBar.classList.remove('active-toggler');
    navigationArea.classList.remove('active-navbar');
    searchBox.classList.remove('active-search-box');
    supportCenter.classList.remove('active-support-center');

    addClass(loginForm, ['animate__animated', 'animate__bounceInDown', 'active-ls']);

    setTimeout(() => {
        removeClass(loginForm, ['animate__animated', 'animate__bounceInDown']);
    }, 1200);

    popupShadow.classList.add("active-popup-shadow");
}

signupToggleBtn.onclick = () => {
    loginForm.classList.remove('active-ls');
    signupForm.classList.add('active-ls');
}

loginToggleBtn.onclick = () => {
    signupForm.classList.remove('active-ls');
    loginForm.classList.add('active-ls');
}

loginCloseBtn.onclick = () => {
    loginForm.classList.remove('active-ls');
    popupShadow.classList.remove("active-popup-shadow");
}

signupCloseBtn.onclick = () => {
    signupForm.classList.remove('active-ls');
    popupShadow.classList.remove("active-popup-shadow");
}

// ===============================
//    Login and Signup Area End
// ===============================





// ================================
//    Subscribe Popup Area Start
// ================================

// selecting subscribe popup elements
let subscribePopup = document.querySelector('.subscribe-popup');
let subPopupCloseBtn = document.querySelector('.sub-popup-close-btn');

let removeSubscribePopupAnim = setTimeout(() => {
    removeClass(subscribePopup, ['animate__animated', 'animate__bounceInUp']);
}, 2200);

subPopupCloseBtn.onclick = () => {
    subscribePopup.classList.add('remove-sub-popup');
}

// ==============================
//    Subscribe Popup Area End
// ==============================





// ==================================
//    Great Deals Popup Area Start
// ==================================

// selecting great deals popup elements
let greatDealsProductPopup = document.querySelector('.gd-product-popup-wrap');
let greatDealsPopupCloseBtn = document.querySelector('.gd-popup-close-btn');

let greatDealsProductPopupImage = document.querySelector('.gd-popup-image img');
let greatDealsProductPopupName = document.querySelector('.gd-popup-product-name');
let greatDealsProductPopupDiscount = document.querySelector('.gd-popup-product-discount');
let greatDealsProductPopupPrice = document.querySelector('.gd-popup-product-price');
let greatDealsProductPopupUnit = document.querySelector('.gd-popup-product-unit');
let greatDealsProductPopupRating = document.querySelector('.rating-avg strong');
let greatDealsProductPopupReviewCount = document.querySelector('.gd-popup-review-count');
let greatDealsProductPopupAddToCartBtn = document.querySelector('.gd-popup-add-to-cart-btn');

let greatDealsPopupTimerDays = document.querySelector('.gd-popup-timer-days');
let greatDealsPopupTimerHours = document.querySelector('.gd-popup-timer-hours');
let greatDealsPopupTimerMinutes = document.querySelector('.gd-popup-timer-minutes');
let greatDealsPopupTimerSeconds = document.querySelector('.gd-popup-timer-seconds');

let timerId = null;
let greatDealsProductClassNameList = [];

let monthIndex4 = date.getMonth();
let year4 = date.getFullYear();

// popup timer --> infinite countdown
function createInfiniteCountdown(date, time) {
    let curntTime = Date.now();
    let eventTime = new Date(`${month[monthIndex4]} ${date}, ${year4} ${time}`).getTime();

    let totalSeconds = (eventTime - curntTime) / 1000;

    if (totalSeconds < 0) {
        monthIndex4 = (monthIndex4 + 1) % 12;

        if (monthIndex4 === 0) {
            year4 = year4 + 1;
        }

        let eventTime = new Date(`${month[monthIndex4]} ${date}, ${year4} ${time}`).getTime();
        totalSeconds = (eventTime - curntTime) / 1000;
    }

    let days = Math.floor(totalSeconds / dayConst);
    totalSeconds = totalSeconds % dayConst;

    let hours = Math.floor(totalSeconds / hourConst);
    totalSeconds = totalSeconds % hourConst;

    let minutes = Math.floor(totalSeconds / minuteConst);
    totalSeconds = totalSeconds % minuteConst;

    let seconds = Math.floor(totalSeconds);

    if (days < 10) {
        days = '0' + days;
    }

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    return [days, hours, minutes, seconds];
}

// update great deals product popup
function showGreatDealsProductPopup(index) {
    let getImage = greatDealsProductImage[index].src;
    let getName = greatDealsProductName[index].textContent;
    let getDiscount = greatDealsProductDiscount[index].textContent;
    let getPrice = greatDealsProductPrice[index].textContent;
    let getUnit = greatDealsProductUnit[index].textContent;
    let getRating = greatDealsProductRating[index].textContent;
    let getReview = greatDealsProductReviewCount[index].textContengreatDeals

    greatDealsProductPopupImage.src = getImage;
    greatDealsProductPopupName.textContent = getName;
    greatDealsProductPopupDiscount.textContent = getDiscount;
    greatDealsProductPopupPrice.textContent = getPrice;
    greatDealsProductPopupUnit.textContent = getUnit;
    greatDealsProductPopupRating.textContent = getRating;
    greatDealsProductPopupReviewCount.textContent = getReview;

    if (timerId) {
        clearInterval(timerId);
    }

    timerId = setInterval(() => {
        if (index === 0) {
            createCountdown = createInfiniteCountdown(date1, time1);
        } else if (index === 1) {
            createCountdown = createInfiniteCountdown(date2, time2);
        } else if (index === 2) {
            createCountdown = createInfiniteCountdown(date3, time3);
        }

        updateDest = [greatDealsPopupTimerDays, greatDealsPopupTimerHours, greatDealsPopupTimerMinutes, greatDealsPopupTimerSeconds];
        updateCountDownTimer(createCountdown, updateDest);

    }, 1000);

    addClass(greatDealsProductPopup, ['animate__animated', 'animate__bounceInDown', 'active-gd-popup']);

    setTimeout(() => {
        removeClass(greatDealsProductPopup, ['animate__animated', 'animate__bounceInDown']);
    }, 1200);

    greatDealsProductPopupAddToCartBtn.onclick = () => {
        let greatDealsProductClass = greatDealsProductClassNameList[index];
        addOuterProductToShoppingCartArea(greatDealsProductClass);
    }

    greatDealsPopupCloseBtn.onclick = () => {
        greatDealsProductPopup.classList.remove('active-gd-popup');
    }

}

// popup controll area
(function () {
    for (let i = 0; i < greatDealsProducts.length; i++) {

        greatDealsProductClassNameList.push(getClassName(greatDealsProducts[i], 1));

        // search and update product price, discount & current price
        for (let j = 0; j < featuredProducts.length; j++) {
            let freaturedProductClassName = getClassName(featuredProducts[j], 1);
            if (greatDealsProductClassNameList[i] === freaturedProductClassName) {
                let featuredProductPrice = `${productPrice[j].textContent}`;
                let featuredProductDiscount = `${productDiscount[j].textContent}% off`;
                let featuredProductCurrentPrice = `${currentPrice[j].textContent}`;
                let featuredProductUnit = `Tk/${productUnit[j].textContent}`;

                greatDealsProductPrice[i].textContent = featuredProductCurrentPrice;
                greatDealsProductPrevPrice[i].textContent = featuredProductPrice;
                greatDealsProductDiscount[i].textContent = featuredProductDiscount;
                greatDealsProductUnit[i].textContent = featuredProductUnit;
                greatDealsProductPrevUnit[i].textContent = featuredProductUnit;

                break;
            }
        }

        // actions while click a product
        greatDealsProducts[i].addEventListener('click', function () {
            showGreatDealsProductPopup(i);
        });
    }
})();

setTimeout(() => {
    showGreatDealsProductPopup(2);
}, 25000);

// ================================
//    Great Deals Popup Area End
// ================================





// ===============================
//    Call To Action Area Start
// ===============================

// selecting call to action elements
let callToActionProduct = document.querySelector('.call-to-action');
let callToActionProductImage = document.querySelector('.cta-image-content img');
let callToActionDiscountPercentage = document.querySelector('.cta-save-per');
let callToActionProductName = document.querySelector('.cta-offer-title');
let callToActionProductType = document.querySelector('.cta-product-type');
let callToActionOfferPrice = document.querySelector('.cta-offer-price');
let callToActionOfferMessage = document.querySelector('.cta-offer-msg');
let callToActionProductBtn = document.querySelector('.cta-button');

let callToActionProductClass = callToActionProduct.getAttribute('class');
let callToActionProductClassName = callToActionProductClass.split(' ')[1];

// controll call to action product
(function () {
    for (let i = 0; i < featuredProducts.length; i++) {
        let freaturedProductClass = getClassName(featuredProducts[i], 1);

        if (callToActionProductClassName === freaturedProductClass) {
            let ctaProductName = productName[i].textContent.split(' ');

            if (ctaProductName[0] === `Fresh` || ctaProductName.length > 1) {
                callToActionProductName.textContent = `${productName[i].textContent}`;
            } else {
                callToActionProductName.textContent = `Fresh ${productName[i].textContent}`;
            }

            callToActionProductImage.src = `${productImage[i].src}`;
            callToActionDiscountPercentage.textContent = `Save Upto ${productDiscount[i].textContent}%`;
            callToActionOfferPrice.textContent = `${currentPrice[i].textContent}Tk Only`;
            callToActionOfferMessage.textContent = `Offer available all ${callToActionProductType.textContent}`;
        }
    }
})();

// actions while click 'Buy Now' button
callToActionProductBtn.onclick = () => {
    addOuterProductToShoppingCartArea(callToActionProductClassName);
}

// =============================
//    Call To Action Area End
// =============================