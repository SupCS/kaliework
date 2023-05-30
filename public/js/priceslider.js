const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".price-slider .progress"),
  priceMinInput = document.getElementById("price-min"), // Скрытое поле для минимальной цены
  priceMaxInput = document.getElementById("price-max"), // Скрытое поле для максимальной цены
  applyButton = document.querySelector(".filters-apply-button"); // Кнопка "Застосувати"

let priceGap = 100;
let currentMinVal = parseInt(localStorage.getItem("currentMinVal") || priceMinInput.value);
let currentMaxVal = parseInt(localStorage.getItem("currentMaxVal") || priceMaxInput.value);

// Устанавливаем сохраненные значения
priceInput[0].value = currentMinVal;
priceInput[1].value = currentMaxVal;
rangeInput[0].value = currentMinVal;
rangeInput[1].value = currentMaxVal;
range.style.left = (currentMinVal / rangeInput[0].max) * 100 + "%";
range.style.right = 100 - (currentMaxVal / rangeInput[1].max) * 100 + "%";

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }

    // Обновить текущие значения
    currentMinVal = minPrice;
    currentMaxVal = maxPrice;
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);
    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }

    // Обновить текущие значения
    currentMinVal = minVal;
    currentMaxVal = maxVal;
  });
});

// При нажатии на кнопку "Застосувати", обновляем значения скрытых полей
applyButton.addEventListener('click', (e) => {
  priceMinInput.value = currentMinVal;
  priceMaxInput.value = currentMaxVal;

  // Сохраняем значения в localStorage
  localStorage.setItem("currentMinVal", currentMinVal);
  localStorage.setItem("currentMaxVal", currentMaxVal);
});
