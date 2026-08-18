<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICATEC - Iniciar Sesión</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons para sobre, candado u ojo -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="login-card">
        <!-- Título principal MEDICATEC -->
        <div class="login-brand">MEDICATEC</div>

        <form action="#" method="POST">
            <!-- Campo Correo -->
            <label class="form-label-custom">Correo</label>
            <div class="custom-input-group">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="correo" required>
            </div>

            <!-- Campo Contraseña -->
            <label class="form-label-custom">Contraseña</label>
            <div class="custom-input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="passwordInput" required>
                <i class="fa-regular fa-eye-slash ms-auto" id="togglePassword" style="cursor: pointer;"></i>
            </div>

            <!-- Botón Iniciar Sesión -->
            <button type="submit" class="btn-login-custom">Iniciar Sesión</button>

            <!-- ¿Olvidaste tu contraseña? -->
            <a href="#" class="forgot-password-link">¿Olvidaste tu contraseña?</a>

            <!-- Registrarse -->
            <a href="#" class="register-link">Registrarse</a>
        </form>
    </div>

    <script>
        // Script opcional para alternar ver/ocultar contraseña
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#passwordInput');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>