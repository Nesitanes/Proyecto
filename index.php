<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICATEC - Inicio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <header class="main-navbar">
        <a href="index.php" class="brand-title">MEDICATEC</a>
        <nav class="nav-links">
            <a href="index.php" class="nav-link-item">INICIO</a>
            <a href="#" class="nav-link-item">SERVICIOS</a>
            <a href="#" class="nav-link-item">NOSOTROS</a>
            <a href="#" class="nav-link-item">CONTACTO</a>
            <a href="modules/auth/login.php" class="btn-nav-login">INICIO SESION</a>
        </nav>
    </header>

    <section class="hero-banner">
        <div class="hero-image-wrapper">
            <img src="img/doctores.png" alt="Equipo Médico" class="hero-doctors-img">
        </div>
        <div class="hero-content">
            <h1 class="hero-title-main">CUIDADO INTEGRAL<br>PARA TU SALUD</h1>
            <div class="hero-buttons">
                <a href="modules/auth/login.php" class="btn-hero-login">Iniciar Sesión</a>
                <a href="#" class="btn-hero-cita">Solicitar Cita</a>
            </div>
        </div>
    </section>

    <section class="cards-container">
        <div class="info-card">
            <i class="fa-solid fa-stethoscope"></i>
            <h4>Medicina General</h4>
        </div>
        <div class="info-card">
            <i class="fa-solid fa-user-nurse"></i>
            <h4>Pediatría</h4>
        </div>
        <div class="info-card">
            <i class="fa-solid fa-comments"></i>
            <h4>Soportes</h4>
        </div>
        <div class="info-card">
            <i class="fa-solid fa-hospital"></i>
            <h4>Información Clinica</h4>
        </div>
    </section>

</body>
</html>