const favoriteNum = document.querySelector("#favorite_num");
const favorite = document.querySelector("#favorite");
const favoriteIcon = document.querySelector("#favorite");

class Favorite {
    products;
    constructor() {
        this.products = [];
    }
    addProduct(product) {
        const existingProduct = this.products.find(
            (p) => p.name === product.name
        );
        if (!existingProduct) {
            this.products.push(product);
        }
    }
    removeProduct(index) {
        this.products.splice(index, 1);
        showEmptyFavoriteMessage();
    }
}

const myFavorite = new Favorite();

if (localStorage.getItem("favorite") == null) {
    localStorage.setItem("favorite", JSON.stringify(myFavorite));
}

const savedFavorite = JSON.parse(localStorage.getItem("favorite"));
myFavorite.products = savedFavorite.products;

// Добавление продукта в Избранное
const favoriteProductCards = Array.from(
    document.querySelectorAll(".product-card")
);

favoriteProductCards.forEach((productCard) => {
    const heartIcon = productCard.querySelector(".heart-icon");
    heartIcon.addEventListener("click", (e) => {
        e.preventDefault();
        const card = e.target.closest(".product-card");
        const product = {
            id: card.getAttribute("data-product-id"),
            imageSrc: card.querySelector(".product-card-img img").src,
            name: card.querySelector(".product-card-title").textContent,
            price: card.querySelector(".product-card-price").textContent,
        };
        myFavorite.addProduct(product);
        localStorage.setItem("favorite", JSON.stringify(myFavorite));
        updateFavoriteCount();
    });
});

// Добавление продукта в Избранное на странице продукта
const addToFavoriteButton = document.querySelector(".product-favorite-button");
if (addToFavoriteButton) {
    addToFavoriteButton.addEventListener("click", (e) => {
        e.preventDefault();
        const productInfo = document.querySelector(".product-info");
        const productId = productInfo.getAttribute("data-product-id");
        const productImage = productInfo.querySelector(
            ".product-info-photo img"
        ).src;
        const productName =
            productInfo.querySelector(".product-info-name").textContent;
        const productPrice = productInfo.querySelector(
            ".product-info-price"
        ).textContent;

        const product = {
            id: productId, // добавляем id продукта
            imageSrc: productImage,
            name: productName,
            price: productPrice,
        };

        myFavorite.addProduct(product);
        localStorage.setItem("favorite", JSON.stringify(myFavorite));
        updateFavoriteCount();
    });
}

// Попап Избранного
const favoritePopup = document.querySelector(".popup_favorite");
const favoritePopupClose = document.querySelector("#popup_favorite_close");
const favoritePopupContainer = document.querySelector(
    "#popup_favorite_container"
);
const favoriteProductList = document.querySelector(
    "#popup_favorite_product_list"
);

favorite.addEventListener("click", (e) => {
    e.preventDefault();
    favoritePopup.classList.add("popup_favorite--open");
    body.classList.add("lock");
    favoritePopupContainerFill();
});

function showEmptyFavoriteMessage() {
    const favoriteProductList = document.querySelector(
        "#popup_favorite_product_list"
    );
    if (myFavorite.products.length === 0) {
        favoriteProductList.innerHTML = "<p>Наразі тут нічого немає</p>";
    }
}

function favoritePopupContainerFill() {
    favoriteProductList.innerHTML = "";
    if (myFavorite.products.length === 0) {
        showEmptyFavoriteMessage();
    } else {
        myFavorite.products.forEach((product) => {
            const productItem = document.createElement("div");
            productItem.classList.add("popup__product");

            const productWrap1 = document.createElement("div");
            productWrap1.classList.add("popup__product-wrap");

            const productImageLink = document.createElement("a");
            productImageLink.href = "/product/" + product.id;

            const productImage = document.createElement("img");
            productImage.classList.add("popup__product-image");
            productImage.setAttribute("src", product.imageSrc);

            productImageLink.appendChild(productImage);
            productWrap1.appendChild(productImageLink);

            const productName = document.createElement("a");
            productName.classList.add("popup__product-title");
            productName.href = "/product/" + product.id;
            productName.innerHTML = product.name;
            productWrap1.appendChild(productName);

            const productWrap2 = document.createElement("div");
            productWrap2.classList.add("popup__product-wrap");

            const productPrice = document.createElement("div");
            productPrice.classList.add("popup__product-price");
            productPrice.innerHTML = product.price;
            productWrap2.appendChild(productPrice);

            const productDelete = document.createElement("button");
            productDelete.classList.add("popup__product-delete");
            productDelete.innerHTML = "&#10006;";

            productDelete.addEventListener("click", () => {
                const index = myFavorite.products.indexOf(product);
                myFavorite.removeProduct(index);
                localStorage.setItem("favorite", JSON.stringify(myFavorite));
                favoritePopupContainerFill();
                updateFavoriteCount();
            });

            productWrap2.appendChild(productDelete);

            productItem.appendChild(productWrap1);
            productItem.appendChild(productWrap2);

            favoriteProductList.appendChild(productItem);
        });
    }
}

function updateFavoriteCount() {
    favoriteNum.textContent = myFavorite.products.length;
    if (myFavorite.products.length === 0) {
        favoriteIcon.style.display = "none";
    } else {
        favoriteIcon.style.display = "block";
    }
}

favoritePopupClose.addEventListener("click", (e) => {
    e.preventDefault();
    favoritePopup.classList.remove("popup_favorite--open");
    body.classList.remove("lock");
});

document.addEventListener("DOMContentLoaded", (event) => {
    updateFavoriteCount();
});
