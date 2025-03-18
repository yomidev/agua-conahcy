import { Modal } from 'bootstrap';
document.addEventListener("DOMContentLoaded", function () {

    let topics = [];

    // Cargar el JSON desde el archivo
    fetch("./json/areas.json")
        .then(response => response.json())
        .then(data => {
            topics = data; // Guardamos los datos del JSON
        })
        .catch(error => console.error("Error cargando JSON:", error));

    // Agregar evento a cada tarjeta
    document.querySelectorAll(".topic-card").forEach(card => {
        card.addEventListener("click", function () {
            const topicId = parseInt(this.getAttribute("data-id")); // Obtener ID del data-id
            const topic = topics.find(t => t.id === topicId); // Buscar en JSON

            if (topic) {
                // Llenar el modal con la información
                document.getElementById("modalTitle").innerText = topic.name;
                document.getElementById("modalDescription").innerHTML = topic.description;

                // Mostrar el modal
                const modalElement = document.getElementById("infoModal");
                const modal = new Modal(modalElement);
                modal.show();
            }
        });
    });
});
