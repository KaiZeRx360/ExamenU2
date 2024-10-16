$(document).ready(function() {
    $('#registroForm').on('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe normalmente

        $.ajax({
            url: 'app/controller/registro_usuarios.php', // Cambia esto si es necesario
            type: 'POST',
            data: $(this).serialize(), // Serializa los datos del formulario
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.message,
                    }).then(() => {
                        window.location.href = 'login.php'; // Redirigir al login
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error en el servidor.',
                });
            }
        });
    });
});