document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('./json/objetivo.json'); // Cargar JSON
        const images = await response.json(); // Convertir a objeto
        const carouselInner = document.querySelector('.carousel-inner');

        // Crear slides individuales para cada imagen
        images.forEach((image, index) => {
            let div = document.createElement('div');
            div.classList.add('carousel-item');
            if (index === 0) div.classList.add('active'); // Primera imagen activa

            let imgElement = document.createElement('img');
            imgElement.src = image.src;
            imgElement.classList.add('d-block', 'w-100', 'img-fluid'); // Imagen 100% ancho del contenedor
            imgElement.alt = `Imagen ${index + 1}`;

            div.appendChild(imgElement);
            carouselInner.appendChild(div);
        });

    } catch (error) {
        console.error("Error cargando la galería:", error);
    }
});
