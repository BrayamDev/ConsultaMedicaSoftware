<?php
session_start();
require '../global/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_user = $_POST['nombre_user'];
    $contrasena_user = $_POST['contrasena_user'];

    try {
        // Buscar el usuario en la base de datos
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre_user = :nombre_user");
        $stmt->execute(['nombre_user' => $nombre_user]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Comparar la contraseña directamente (texto plano)
            if ($contrasena_user === $user['contrasena_user']) {
                // Inicio de sesión exitoso
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nombre_user'] = $user['nombre_user'];
                $_SESSION['nombre_completo'] = $user['nombre_completo'];
                $_SESSION['email'] = $user['email']; 
                $_SESSION['telefono'] = $user['telefono']; 
                header("Location: ../home/home.php");
                exit();
            } else {
                // Contraseña incorrecta
                header("Location: ../index.php?error=Contraseña incorrecta");
                exit();
            }
        } else {
            // Usuario no encontrado
            header("Location: ../index.php?error=Usuario no encontrado");
            exit();
        }
    } catch (PDOException $e) {
        // Error en la consulta
        header("Location: ../index.php?error=Error en el servidor");
        exit();
    }
}
?>