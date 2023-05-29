// Утилиты
function toNum(str) {
    const num = Number(str.replace(/[^0-9.-]+/g, ""));
    return num;
}

function toCurrency(num) {
    const format = new Intl.NumberFormat("ru-RU", {
        style: "currency",
        currency: "UAH",
        minimumFractionDigits: 0,
    }).format(num);
    return format;
}

// Корзина
const cartNum = document.querySelector("#cart_num");
const cart = document.querySelector("#cart");

class Cart {
    products;
    constructor() {
        this.products = [];
    }
    get count() {
        return this.products.reduce(
            (total, product) => total + product.quantity,
            0
        );
    }
    addProduct(product) {
        const existingProduct = this.products.find(
            (p) => p.name === product.name
        );
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            product.quantity = 1;
            this.products.push(product);
        }
        updateCartCount();
    }
    increaseProductQuantity(product) {
        const existingProduct = this.products.find(
            (p) => p.name === product.name
        );
        if (existingProduct) {
            existingProduct.quantity++;
            localStorage.setItem("cart", JSON.stringify(myCart));
            updateCartCount();
        }
    }

    decreaseProductQuantity(product) {
        const existingProduct = this.products.find(
            (p) => p.name === product.name
        );
        if (existingProduct && existingProduct.quantity > 1) {
            existingProduct.quantity--;
        } else if (existingProduct && existingProduct.quantity === 1) {
            this.removeProduct(this.products.indexOf(product));
        }
        localStorage.setItem("cart", JSON.stringify(myCart));
        updateCartCount();
    }

    removeProduct(index) {
        this.products.splice(index, 1);
        updateCartCount();
        showEmptyCartMessage();
    }
    get cost() {
        const sum = this.products.reduce((total, product) => {
            return total + toNum(product.price) * product.quantity;
        }, 0);
        return sum;
    }
}

class Product {
    imageSrc;
    name;
    price;
    constructor(data) {
        this.imageSrc = data.imageSrc;
        this.name = data.name;
        this.price = data.price;
    }
}

function updateCartCount() {
    cartNum.textContent = myCart.count;
    if (myCart.count == 0) {
        cart.style.display = "none"; // Скрываем значок корзины
    } else {
        cart.style.display = ""; // Показываем значок корзины
    }
}

const myCart = new Cart();

if (localStorage.getItem("cart") == null) {
    localStorage.setItem("cart", JSON.stringify(myCart));
}

const savedCart = JSON.parse(localStorage.getItem("cart"));
myCart.products = savedCart.products;
cartNum.textContent = myCart.count;

updateCartCount();

// Добавление продукта из карточки (store.html)
const productCards = Array.from(document.querySelectorAll(".product-card"));

productCards.forEach((productCard) => {
    const cartIcon = productCard.querySelector(".cart-icon");
    cartIcon.addEventListener("click", (e) => {
        e.preventDefault();
        const card = e.target.closest(".product-card");
        const product = new Product({
            imageSrc: card.querySelector(".product-card-img img").src,
            name: card.querySelector(".product-card-title").textContent,
            price: card.querySelector(".product-card-price").textContent,
        });
        myCart.addProduct(product);
        localStorage.setItem("cart", JSON.stringify(myCart));
        updateCartCount();
    });
});

$(document).ready(function () {
    $(".cp").on("click", function () {
        const selectedColor = $(this).attr("data-color"); // Получаем значение атрибута 'data-color'
        $(this).toggleClass("active"); // Переключаем класс '.active' у выбранного цвета
        $(this).siblings().removeClass("active"); // Удаляем класс '.active' у других цветов

        // Сохраняем выбранный цвет в атрибуте 'data-color' элемента '.product-buy-button'
        $(".product-buy-button").attr("data-color", selectedColor);
        console.log($(".product-buy-button").attr("data-color"));
    });
});

// Добавление продукта из раздела product-info (product.html)
const addToCartButton = document.querySelector(".product-buy-button");

if (addToCartButton !== null) {
    addToCartButton.addEventListener("click", (e) => {
        e.preventDefault();

        const productInfo = document.querySelector(".product-info");
        const productImage = productInfo.querySelector(
            ".product-info-photo img"
        ).src;
        const productName =
            productInfo.querySelector(".product-info-name").textContent;
        const productPrice = productInfo.querySelector(
            ".product-info-price"
        ).textContent;

        const product = new Product({
            imageSrc: productImage,
            name: productName,
            price: productPrice,
        });

        const selectedColor = addToCartButton.getAttribute("data-color"); // Получаем выбранный цвет из атрибута 'data-color'
        product.color = selectedColor; // Добавляем выбранный цвет в свойство 'color' товара

        myCart.addProduct(product);
        localStorage.setItem("cart", JSON.stringify(myCart));
        updateCartCount();
    });
}

// Попап
const popup = document.querySelector(".popup");
const popupClose = document.querySelector("#popup_close");
const body = document.body;
const popupContainer = document.querySelector("#popup_container");
const popupProductList = document.querySelector("#popup_product_list");
const popupCost = document.querySelector("#popup_cost");

cart.addEventListener("click", (e) => {
    e.preventDefault();
    popup.classList.add("popup--open");
    body.classList.add("lock");
    popupContainerFill();
});

function showEmptyCartMessage() {
    const popupProductList = document.querySelector("#popup_product_list");
    if (myCart.products.length === 0) {
        popupProductList.innerHTML = "<p>Наразі тут нічого немає</p>";
    }
}

function popupContainerFill() {
    popupProductList.innerHTML = null;
    const productsHTML = myCart.products.map((product) => {
        const productItem = document.createElement("div");
        productItem.classList.add("popup__product");

        const productWrap1 = document.createElement("div");
        productWrap1.classList.add("popup__product-wrap");
        const productWrap2 = document.createElement("div");
        productWrap2.classList.add("popup__product-wrap");

        const productImage = document.createElement("img");
        productImage.classList.add("popup__product-image");
        productImage.setAttribute("src", product.imageSrc);

        const productTitle = document.createElement("h2");
        productTitle.classList.add("popup__product-title");
        productTitle.innerHTML = product.name;

        const productColor = document.createElement("span");
        productColor.classList.add("popup__product-color");;
        productColor.style.backgroundColor = product.color;

        const productQuantity = document.createElement("div");
        productQuantity.classList.add("popup__product-quantity");
        productQuantity.innerHTML = `Кількість: ${product.quantity}`;

        const productQuantityMinus = document.createElement("button");
        productQuantityMinus.classList.add("popup__product-quantity-minus");
        productQuantityMinus.innerHTML = "-";
        productQuantityMinus.addEventListener("click", () => {
            myCart.decreaseProductQuantity(product);
            popupContainerFill();
        });

        const productQuantityPlus = document.createElement("button");
        productQuantityPlus.classList.add("popup__product-quantity-plus");
        productQuantityPlus.innerHTML = "+";
        productQuantityPlus.addEventListener("click", () => {
            myCart.increaseProductQuantity(product);
            popupContainerFill();
        });

        productWrap2.appendChild(productQuantityMinus);
        productWrap2.appendChild(productQuantity);

        productWrap2.appendChild(productQuantityPlus);

        const productPrice = document.createElement("div");
        productPrice.classList.add("popup__product-price");
        productPrice.innerHTML = product.price;

        const productDelete = document.createElement("button");
        productDelete.classList.add("popup__product-delete");
        productDelete.innerHTML = "&#10006;";

        productDelete.addEventListener("click", () => {
            const index = myCart.products.indexOf(product);
            myCart.removeProduct(index);
            localStorage.setItem("cart", JSON.stringify(myCart));
            popupContainerFill();
            updateCartCount();
        });

        productWrap1.appendChild(productImage);
        productWrap1.appendChild(productTitle);
        productWrap1.appendChild(productColor);
        productWrap2.appendChild(productPrice);
        productWrap2.appendChild(productDelete);
        productItem.appendChild(productWrap1);
        productItem.appendChild(productWrap2);

        return productItem;
    });

    productsHTML.forEach((productHTML) => {
        popupProductList.appendChild(productHTML);
    });
    showEmptyCartMessage();

    const totalCost = myCart.cost;

    popupCost.textContent = toCurrency(totalCost);
}

popupClose.addEventListener("click", (e) => {
    e.preventDefault();
    popup.classList.remove("popup--open");
    body.classList.remove("lock");
});
