document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('./json/gallery.json');
        const images = await response.json();
        const carouselInner = document.querySelector('.carousel-inner-2');

        // Dividir las imágenes en grupos de dos
        for (let i = 0; i < images.length; i += 2) {
            let div = document.createElement('div');
            div.classList.add('carousel-item');
            if (i === 0) div.classList.add('active'); // El primer grupo debe ser activo

            // Crear un contenedor para las dos imágenes
            let imgContainer = document.createElement('div');
            imgContainer.classList.add('d-flex', 'justify-content-between', 'gap-3'); // Agregar separación con gap

            // Primera imagen
            let imgElement1 = document.createElement('img');
            imgElement1.src = images[i].src;
            imgElement1.classList.add('img-fluid', 'w-50', 'rounded', 'carousel-image'); // Clase común para las imágenes
            imgElement1.alt = `Imagen ${i + 1}`;
            imgContainer.appendChild(imgElement1);

            // Segunda imagen (si existe)
            if (images[i + 1]) {
                let imgElement2 = document.createElement('img');
                imgElement2.src = images[i + 1].src;
                imgElement2.classList.add('img-fluid', 'w-50', 'rounded', 'carousel-image'); // Clase común para las imágenes
                imgElement2.alt = `Imagen ${i + 2}`;
                imgContainer.appendChild(imgElement2);
            }

            div.appendChild(imgContainer);
            carouselInner.appendChild(div);
        }

    } catch (error) {
        console.error("Error cargando la galería:", error);
    }
});
