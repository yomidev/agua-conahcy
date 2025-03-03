
    fetch('./json/investigador.json')
        .then(response => response.json())
        .then(data => {
            const researchers = data.researchers;

            // Captura el evento de clic en los botones
            document.querySelectorAll('[data-researcher]').forEach(button => {
                button.addEventListener('click', function() {
                    const researcherId = this.getAttribute('data-researcher');
                    const researcher = researchers.find(r => r.name.replace(/\s+/g, '_').toLowerCase() === researcherId);

                    if (researcher) {
                        // Carga la información en el modal
                        const modalBody = document.getElementById('researcher-info');
                        modalBody.innerHTML = `
                            <h3>${researcher.name}</h3>
                            <p><strong>Título:</strong> ${researcher.title}</p>
                            <p><strong>Institución:</strong> ${researcher.institution}</p>
                            <h4>Educación:</h4>
                            <ul>
                                ${researcher.education.map(edu => `
                                    <li>
                                        <strong>${edu.degree}</strong> en ${edu.field}<br>
                                        ${edu.institution}, ${edu.year}
                                    </li>
                                `).join('')}
                            </ul>
                            <h4>Premios y Reconocimientos:</h4>
                            <ul>
                                ${researcher.awards.map(award => `
                                    <li>
                                        <strong>${award.name}</strong> (${award.year})
                                    </li>
                                `).join('')}
                            </ul>
                            <h4>Publicaciones Seleccionadas:</h4>
                            <ul>
                                ${researcher.selected_publications.map(pub => `
                                    <li>
                                        <strong>${pub.title}</strong><br>
                                        Autores: ${pub.authors.join(', ')}<br>
                                        Revista: ${pub.journal}, ${pub.year}, Vol. ${pub.volume}, Páginas: ${pub.pages}
                                    </li>
                                `).join('')}
                            </ul>
                            <!-- Más información... -->
                        `;
                    }
                });
            });
        })
        .catch(error => console.error('Error al cargar el JSON:', error));
