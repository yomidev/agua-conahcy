document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('./json/objetivo.json');
        const images = await response.json();
        const carouselInner = document.querySelector('.carousel-inner');

        carouselInner.innerHTML = '';

        images.forEach((image, index) => {
            const isActive = index === 0 ? 'active' : ''; // La primera imagen debe ser activa
            const carouselItem = `
                <div class="carousel-item ${isActive}">
                    <img src="${image.src}" class="d-block w-100 rounded" alt="Imagen ${index + 1}" style="max-height: 300px;">
                </div>
            `;
            carouselInner.innerHTML += carouselItem;
        });
    } catch (error) {
        console.error("Error cargando la galería:", error);
    }
});
