document.addEventListener("DOMContentLoaded", function () {
    const productCards = document.querySelectorAll(".product-list-card");

    productCards.forEach((card) => {
        const image = card.querySelector(".product-image");
        const images = JSON.parse(image.getAttribute("data-images"));
        let currentIndex = 0;
        let intervalId = null;

        const preloadImage = (url) => {
            return new Promise((resolve) => {
                const img = new Image();
                img.src = url;
                img.onload = () => resolve();
            });
        };

        const changeImage = async () => {
            currentIndex = (currentIndex + 1) % images.length;
            const nextImage = images[currentIndex];
            await preloadImage(nextImage);
            image.style.opacity = 0;
            setTimeout(() => {
                image.src = nextImage;
                image.style.opacity = 1;
            }, 400);
        };

        card.addEventListener("mouseenter", () => {
            if (images.length > 1) {
                intervalId = setInterval(() => {
                    changeImage();
                }, 1500);
            }
        });

        card.addEventListener("mouseleave", () => {
            if (intervalId) {
                clearInterval(intervalId);
                intervalId = null;
                image.src = images[0];
                image.style.opacity = 1;
            }
        });
    });
});
