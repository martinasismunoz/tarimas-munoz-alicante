<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "u413015468_tarimasalicant";
$password = "Mm39072530";
$dbname = "u413015468_tarimasalicant";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO contacto_cliente (nombre, telefono, email, comentario) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $telefono, $email, $comentario);

if ($stmt->execute()) {
    // Envío de correo electrónico
    $destinatario = "martinasismunoz@gmail.com";
    $asunto = "Nuevo formulario enviado desde tu sitio web";
    $cuerpo = "Se ha recibido un nuevo formulario con los siguientes datos:\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Teléfono: $telefono\n";
    $cuerpo .= "Email: $email\n";
    $cuerpo .= "Comentario: $comentario\n";

    if (mail($destinatario, $asunto, $cuerpo)) {
        echo "¡Formulario enviado correctamente! Se ha enviado una notificación por correo electrónico.";
    } else {
        echo "Formulario enviado correctamente, pero ha habido un error al enviar la notificación por correo electrónico.";
    }
} else {
    echo "Error al enviar el formulario: " . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>