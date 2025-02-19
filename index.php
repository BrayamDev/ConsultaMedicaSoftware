<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Login Consulta Médica</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-3.2.6.min.css">
    <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Incluir Notiflix -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-3.2.6.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.6/dist/notiflix-3.2.6.min.js"></script>
    <!-- Css -->
    <link rel="stylesheet" href="css/estilos.css"> 
</head>

<body class="login-bg">
    <div class="container">
        <div class="auth-wrapper">
            <form action="login/login.php" method="POST">
                <div class="auth-box">
                    <header>
                        <img src="imagenes/logo.png" alt="Logo Consulta Médica" class="logo">
                    </header>

                    <h4 class="mb-4">Inicie sesión</h4>

                    <div class="mb-3">
                        <label class="form-label" for="email">Nombre de Usuario <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nombre_user" placeholder="Ingrese su usuario" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="pwd">Contraseña <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="contrasena_user" placeholder="Ingrese contraseña" required>
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="ri-eye-line text-primary"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="Login/Olvide_contrasena.php" class="text-decoration-underline">¿Olvidó su contraseña?</a>
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="login">Iniciar Sesión</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    <?php if (isset($_GET['success'])) { ?>
        Notiflix.Notify.init({
            position: 'right-top',
            timeout: 4000,
            width: '500px',
            fontSize: '20px', 
            borderRadius: '12px',
            cssAnimationStyle: 'zoom', 
            success: {
                background: '#008000', // Color de fondo para éxito
                textColor: '#FFFFFF', // Color del texto
            },
        });

        Notiflix.Notify.success('<?php echo $_GET['success']; ?>');
    <?php } ?>

    <?php if (isset($_GET['error'])) { ?>
        Notiflix.Notify.init({
            position: 'right-top',
            timeout: 4000,
            width: '500px', 
            fontSize: '20px', 
            borderRadius: '12px',
            cssAnimationStyle: 'zoom',
            failure: {
                background: '#ab2e46', // Color de fondo para error
                textColor: '#FFFFFF', // Color del texto
            },
        });

        Notiflix.Notify.failure('<?php echo $_GET['error']; ?>');
    <?php } ?>
</script>
</body>

</html>
