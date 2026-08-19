<?php

// Datos de sesión simulados para el header y sidebar
$usuario = [
    "nombre" => "Dr. Eduardo Alemán",
    "especialidad" => "Medicina General",
    "rol" => "Doctor",
    "avatar" => "EA"
];

// Módulo activo por defecto (vía GET o 'panel' si no se especifica)
$modulo = isset($_GET['mod']) ? $_GET['mod'] : 'panel';

// Definición de módulos permitidos para seguridad
$modulos_permitidos = [
    'panel'     => '../modules/panel/panel_doctor.php',
    'pacientes' => '../modules/pacientes/doctor_pacientes.php',
    'citas'     => '../modules/citas/citas_doc.php',
    'avisos'     => '../modules/avisos/avisos.php'
];

// Determinar qué archivo cargar
$archivo_modulo = isset($modulos_permitidos[$modulo]) 
    ? $modulos_permitidos[$modulo] 
    : '../modules/panel/panel_doctor.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Médico - Medicatec</title>
    
    <!-- Boxicons CDN para los íconos globales -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Estilo Base del Layout Dashboard -->
    <link rel="stylesheet" href="../css/doctor_dashboard.css">
   
    <link rel="stylesheet" href="../css/panel_doctor.css">
    <link rel="stylesheet" href="../../css/citas.css">
    <link rel="stylesheet" href="../css/reportes_menus.css">
    <link rel="stylesheet" href="../css/avisos.css">
    
</head>
<!-- Nueva Barra Superior Horizontal -->
<header class="topbar-navbar">
    <nav class="nav-links">
        <a href="doctor.php?mod=panel">INICIO</a>
        <a href="#">SERVICIOS</a>
        <a href="#">NOSOTROS</a>
        <a href="#">CONTACTO</a>
    </nav>

    <div class="user-profile-section">
        <span class="user-name"><?= htmlspecialchars($usuario['nombre']) ?></span>
        <div class="user-avatar-circle">
            <?= htmlspecialchars($usuario['avatar']) ?>
        </div>
    </div>
</header>
<body>

    <div class="dashboard-wrapper">

        <!--BARRA LATERAL / SIDEBAR MENU-->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand-logo">
                    <i class='bx bx-clinic logo-icon'></i>
                    <h2>Medicatec</h2>
                </div>
            </div>

            

            <!-- Navegación de Módulos -->
            <nav class="sidebar-menu">
                <span class="menu-label">Menú Principal</span>
                
                <ul>
                    <li>
                        <a href="doctor.php?mod=panel" class="<?= ($modulo === 'panel') ? 'active' : '' ?>">
                            <i class='bx bx-grid-alt'></i>
                            <span>Panel Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="doctor.php?mod=citas" class="<?= ($modulo === 'citas') ? 'active' : '' ?>">
                            <i class='bx bx-calendar'></i>
                            <span>Mis Citas</span>
                        </a>
                    </li>
                    <li>
                        <a href="doctor.php?mod=pacientes" class="<?= ($modulo === 'pacientes') ? 'active' : '' ?>">
                            <i class='bx bx-group'></i>
                            <span>Pacientes</span>
                        </a>
                    </li>
                     <li>
                        <a href="doctor.php?mod=avisos" class="<?= ($modulo === 'avisos') ? 'active' : '' ?>">
                            <i class='bx bx-bell'></i>
                            <span>Avisos</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logout Bottom -->
            <div class="sidebar-footer">
                <a href="../logout.php" class="btn-logout">
                    <i class='bx bx-log-out'></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </aside>

        <!--CONTENEDOR PRINCIPAL-->
        <main class="main-content">
            
           

            <!-- ÁREA DINÁMICA: Carga el módulo correspondiente -->
            <section class="module-viewport">
                <?php 
                if (file_exists($archivo_modulo)) {
                    include($archivo_modulo);
                } else {
                    echo "<div class='error-container'><h2>Error 404</h2><p>El módulo solicitado no existe.</p></div>";
                }
                ?>
            </section>

        </main>

    </div>

</body>
</html>