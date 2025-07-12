// Image preview magnifier
    document.addEventListener("DOMContentLoaded", function () {
        const img = document.getElementById("mainImage");
        const zoomResult = document.getElementById("zoomResult");

        img.addEventListener("mousemove", function (e) {
            zoomResult.classList.remove('hidden');

            const rect = img.getBoundingClientRect();
            const x = e.pageX - rect.left - window.scrollX;
            const y = e.pageY - rect.top - window.scrollY;

            const backgroundPosX = -(x * 2 - zoomResult.offsetWidth / 2);
            const backgroundPosY = -(y * 2 - zoomResult.offsetHeight / 2);

            zoomResult.style.backgroundImage = `url('${img.src}')`;
            zoomResult.style.backgroundSize = `${img.width * 2}px ${img.height * 2}px`;
            zoomResult.style.backgroundPosition = `${backgroundPosX}px ${backgroundPosY}px`;
        });

        img.addEventListener("mouseleave", function () {
            zoomResult.classList.add('hidden');
        });
    });