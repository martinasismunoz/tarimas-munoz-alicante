 //PARA EL FORMULARIO//
 document.addEventListener('DOMContentLoaded', function() {
     // Seleccionamos el formulario por su ID
     var formulario = document.getElementById('miFormulario');

     // Agregamos un event listener para el evento submit del formulario
     formulario.addEventListener('submit', function(event) {
         // Prevenimos el envío del formulario por defecto
         event.preventDefault();

         // Creamos un objeto FormData para obtener los datos del formulario
         var formData = new FormData(formulario);

         // Creamos una instancia de XMLHttpRequest para hacer la solicitud AJAX
         var xhr = new XMLHttpRequest();

         // Configuramos la solicitud
         xhr.open('POST', 'procesar_formulario.php', true);

        // Definimos la función que se ejecutará cuando la solicitud se complete
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Aquí puedes manejar la respuesta del servidor si es necesario
                alert('¡Formulario enviado correctamente!');
                // Limpia los campos del formulario después de enviarlo
                formulario.reset();
            } else {
                // Maneja cualquier error que pueda ocurrir durante el envío del formulario
                alert('Error al enviar el formulario');
            }
        };

        // Enviamos la solicitud con los datos del formulario
        xhr.send(formData);
    });
});




function scrollToDiv() {
    var div = document.getElementById('miDiv');
    div.scrollIntoView({ behavior: 'smooth' });
}

function scrollToEmpresa() {
    var div = document.getElementById('miEmpresa');
    div.scrollIntoView({ behavior: 'smooth' });
}

function scrollToServicios() {
    var div = document.getElementById('miServicios');
    div.scrollIntoView({ behavior: 'smooth' });
}