let states = document.querySelectorAll('.estado');
      states.forEach(function(link){
         link.addEventListener('click', function(event){
            event.preventDefault();
            let id = this.getAttribute('code');
            let jsonFile = './json/mapa.json';
            fetch(jsonFile)
               .then(function(response){
                  return response.json();
               })
               .then(function(data){
                  let laboratory = null;
                  data.laboratories.forEach(function(lab){
                     if(lab.code === parseInt(id)){
                        laboratory = lab;
                     }
                  })
                  if (laboratory === null){
                     Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se encontraron datos en este estado'
                    });
                    return;
                  }
                  let message = '<h3 class="text-blue text-center">' + laboratory.nameState + '</h3>';
                  message += '<table class="table table-striped align-middle">';
                  message += '<thead><tr><th class="min-responsive"></th><th></th><th></th></tr></thead>';
                  message += '<tbody>';
                  laboratory.locations.forEach(function(location) {   
                     message += '<tr>';
                     message += '<td class="min-responsive"><img src="' + location.image + '" alt="' + location.nameLocation + '" width="150"></td>';
                     message += '<td><p class="fs-6 text-wrap" style="width: 12rem;">' + location.nameLocation + '</p></td>';
                     message += '<td><a href="' + location.link + '" target="_blank" class="btn btn-link fs-6">Ir</a></td>';
                     message += '</tr>';
                  });
                  message += '</tbody></table></div>';
               Swal.fire({
                    html: message,
                    confirmButtonText: 'Cerrar',
                    confirmButtonColor: '#9a2d4e',
                    width: '800px',
               });
         }).catch(function(error){
            console.error('Error al cargar el archivo JSON:', error);
            // Mostrar un mensaje de error en caso de que ocurra un error
            Swal.fire({
               icon: 'error',
               title: 'Error',
               text: 'Se produjo un error al cargar el archivo JSON'
            });
         });

      });
   });