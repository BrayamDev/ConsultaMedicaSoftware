<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar Contraseña</title>
    <!-- Incluir Notiflix -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-3.2.6.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-3.2.6.min.js"></script>
    <!-- Incluir CSS -->
    <link rel="stylesheet" href="../assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="../assets/css/main.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body class="login-bg">
    <div class="container">
        <div class="auth-wrapper">
            <form action="recuperar.php" method="POST">
                <div class="auth-box">
                    <!-- Header de la tarjeta con la imagen del logo -->
                    <header>
                        <img src="../imagenes/logo.png" alt="Logo Consulta Médica" class="logo">
                    </header>

                    <h4 class="mb-4">Recuperar Contraseña</h4>
                    <p class="text-muted">Ingrese su correo electrónico y le enviaremos un enlace para restablecer su contraseña.</p>

                    <div class="mb-3">
                        <label class="form-label" for="email">Correo Electrónico <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="Ingrese su correo" required>
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-success">Enviar Enlace</button>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="../index.php" class="text-decoration-underline">Volver al login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para manejar notificaciones con Notiflix -->
    <script>
        <?php if (isset($_GET['success'])) { ?>
            Notiflix.Notify.success('<?php echo $_GET['success']; ?>', {
                position: 'right-top',
                timeout: 4000,
                width: '500px',
                fontSize: '20px',
                borderRadius: '12px',
                cssAnimationStyle: 'zoom',
                textColor: '#FFFFFF',
            });
        <?php } ?>

        <?php if (isset($_GET['error'])) { ?>
            Notiflix.Notify.failure('<?php echo $_GET['error']; ?>', {
                position: 'right-top',
                timeout: 4000,
                width: '500px',
                fontSize: '20px',
                borderRadius: '12px',
                cssAnimationStyle: 'zoom',
                textColor: '#FFFFFF',
            });
        <?php } ?>
    </script>
</body>

</html>