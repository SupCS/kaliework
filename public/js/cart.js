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
            (p) =>
                p.name === product.name &&
                p.color === product.color &&
                p.selectedWick === product.selectedWick &&
                p.selectedAroma === product.selectedAroma
        );
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            product.quantity = 1;
            if (product.colors === null && product.colors.length > 0) {
                product.color = product.colors[0];
            }
            this.products.push(product);
        }
        updateCartCount();
    }
    increaseProductQuantity(product) {
        const existingProduct = this.products.find(
            (p) =>
                p.name === product.name &&
                p.color === product.color &&
                p.selectedWick === product.selectedWick &&
                p.selectedAroma === product.selectedAroma
        );
        if (existingProduct) {
            existingProduct.quantity++;
            localStorage.setItem("cart", JSON.stringify(myCart));
            updateCartCount();
        }
    }

    decreaseProductQuantity(product) {
        const existingProduct = this.products.find(
            (p) => p.name === product.name && p.color === product.color
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
    color;
    colors;
    wicks;
    aromas;
    selectedWick;
    selectedAroma;
    constructor(data) {
        this.imageSrc = data.imageSrc;
        this.name = data.name;
        this.price = data.price;
        this.color = null;
        this.colors = data.colors;
        this.wicks = data.wicks;
        this.aromas = data.aromas;
        if (this.colors && this.colors.length > 0) {
            this.color = this.colors[0].name;
        }
        if (this.wicks && this.wicks.length > 0) {
            this.selectedWick = this.wicks[0].name;
        }
        if (this.aromas && this.aromas.length > 0) {
            this.selectedAroma = this.aromas[0].name;
        }
    }
}

function updateCartCount() {
    cartNum.textContent = myCart.count;
    if (myCart.count === 0) {
        cart.style.display = "none"; // Скрываем значок корзины
    } else {
        cart.style.display = ""; // Показываем значок корзины
    }
}

const myCart = new Cart();

if (localStorage.getItem("cart") === null) {
    localStorage.setItem("cart", JSON.stringify(myCart));
}

const savedCart = JSON.parse(localStorage.getItem("cart"));
myCart.products = savedCart.products;
cartNum.textContent = myCart.count;

updateCartCount();

// Добавление продукта из карточки (store.blade.php)
$(document).ready(function () {
    const productCards = Array.from(document.querySelectorAll(".product-card"));

    productCards.forEach((productCard) => {
        const cartIcon = productCard.querySelector(".cart-icon");
        cartIcon.addEventListener("click", (e) => {
            e.preventDefault();
            const card = e.target.closest(".product-card");
            const colorsJson = card.getAttribute("data-colors");
            const colors = JSON.parse(colorsJson);
            const wicksJson = card.getAttribute("data-wicks");
            const wicks = JSON.parse(wicksJson);
            const aromasJson = card.getAttribute("data-aromas");
            const aromas = JSON.parse(aromasJson);

            const product = new Product({
                imageSrc: card.querySelector(".product-card-img img").src,
                name: card.querySelector(".product-card-title").textContent,
                price: card.querySelector(".product-card-price").textContent,
                colors: colors,
                wicks: wicks,
                aromas: aromas,
            });

            myCart.addProduct(product);
            localStorage.setItem("cart", JSON.stringify(myCart));
            updateCartCount();
        });
    });
});

$(document).ready(function () {
    const selectedColor = $(".cp.active").attr("data-color");
    $(".product-buy-button").attr("data-color", selectedColor);

    $(".cp").on("click", function () {
        const selectedColor = $(this).attr("data-color");
        const isActive = $(this).hasClass("active");

        if (!isActive) {
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
            $(".product-buy-button").attr("data-color", selectedColor);
        }
    });
});

// Добавление продукта из раздела product-info (product.blade.php)
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

        const selectedColor = addToCartButton.getAttribute("data-color");
        product.color = selectedColor;

        const selectedWick = document.querySelector(
            ".product-wick .dropbtn-text"
        ).textContent;
        const selectedAroma = document.querySelector(
            ".product-aroma .dropbtn-text"
        ).textContent;
        product.selectedWick = selectedWick;
        product.selectedAroma = selectedAroma;

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

        const productInfo = document.createElement("div");
        productInfo.classList.add("popup__product-info");

        const productWickAroma = document.createElement("div");
        productWickAroma.classList.add("popup__product-wickaroma");

        const productColor = document.createElement("span");
        productColor.classList.add("popup__product-color");
        productColor.style.backgroundColor = product.color;

        const selectedWickSpan = document.createElement("span");
        selectedWickSpan.classList.add("popup__selected-wick");
        selectedWickSpan.textContent = product.selectedWick;

        const selectedAromaSpan = document.createElement("span");
        selectedAromaSpan.classList.add("popup__selected-aroma");
        selectedAromaSpan.textContent = product.selectedAroma;

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

        productWickAroma.appendChild(selectedWickSpan);
        productWickAroma.appendChild(selectedAromaSpan);
        productInfo.appendChild(productTitle);
        productInfo.appendChild(productWickAroma);

        productWrap1.appendChild(productImage);
        productWrap1.appendChild(productInfo);
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
