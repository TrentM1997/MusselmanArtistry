/* Pricing Page JS */ 

const priceList = document.querySelectorAll(".question");

priceList.forEach(function (option) {
    const btn = option.querySelector(".price-btn");

    btn.addEventListener("click", function () {
        priceList.forEach(function (item) {
            if (item !== option) {
                item.classList.remove("show-text");
            }
        });
        option.classList.toggle("show-text");
    });
});



/* Merchandise Product Slider (HTML Pages) */


/*
let imgs = document.querySelectorAll('.img-item');
let imgFocus = document.getElementById('pic-slider');


imgs.forEach(function(imgClicked) {

    imgClicked.addEventListener('click', function() {

        changeImage(imgClicked.src);
    });
});



function changeImage(newSrc) {

   imgFocus.src = newSrc;
};
*/

let imgs = document.querySelectorAll('.img-item');
let imgFocus = document.getElementById('pic-slider');

imgs.forEach(function(imgClicked) {
    imgClicked.addEventListener('click', function() {
        fadeOutImage(imgClicked.src);
    });
});

function fadeOutImage(newSrc) {
    imgFocus.style.opacity = 0; // Set opacity to 0 for fade out effect
    setTimeout(function() {
        changeImage(newSrc); // Change the image source after the fade out
        fadeInImage(); // Fade in the new image
    }, 300); // Match the transition duration
}

function changeImage(newSrc) {
    imgFocus.src = newSrc;
}

function fadeInImage() {
    imgFocus.style.opacity = 1; // Set opacity back to 1 for fade in effect
}
