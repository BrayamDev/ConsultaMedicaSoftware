<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión completamente, borra también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no solo los datos de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), // Nombre de la cookie de sesión
        '', // Valor vacío
        time() - 42000, // Tiempo en el pasado para que expire
        $params["path"], // Ruta de la cookie
        $params["domain"], // Dominio de la cookie
        $params["secure"], // Segura (HTTPS)
        $params["httponly"] // Solo HTTP
    );
}

// Finalmente, destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión o a la página principal
header("Location: ../index.php"); 
exit(); // Asegúrate de que el script se detenga después de la redirección
?>