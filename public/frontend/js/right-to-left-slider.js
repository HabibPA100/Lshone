// Slider Script (unchanged)
    document.addEventListener("DOMContentLoaded", function () {
        const track = document.querySelector('.slide-track');
        const items = document.querySelectorAll('.slide-item');

        if (track && items.length > 0) {
            let currentIndex = 0;
            const itemsPerView = 5;
            const totalItems = items.length;
            const maxIndex = Math.max(0, totalItems - itemsPerView);

            function updateSlider() {
                const itemWidth = items[0].offsetWidth;
                const newTransform = -currentIndex * itemWidth;
                track.style.transform = `translateX(${newTransform}px)`;
            }

            setInterval(() => {
                currentIndex++;
                if (currentIndex > maxIndex) {
                    currentIndex = 0;
                }
                updateSlider();
            }, 2500);
        }
    });