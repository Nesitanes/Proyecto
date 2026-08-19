<?php

// Datos de sesión simulados para el header y sidebar
$usuario = [
    "nombre" => "Lic. Carlos Mendoza",
    "rol" => "Administrador",
    "avatar" => "CM"
];

// Módulo activo por defecto (vía GET)
$modulo = isset($_GET['mod']) ? $_GET['mod'] : 'panel';

// Módulos permitidos para el perfil de Administrador
$modulos_permitidos = [
    'panel'     => '../modules/panel/panel_recepcion.php',
    'citas'     => '../modules/citas/citas_rep.php',
    'pacientes' => '../modules/pacientes/recepcion_pacientes.php',
    'avisos'    => '../modules/avisos/avisos.php',
    'reportes'  => '../modules/reportes/reportes.php'
];

// Determinar qué archivo cargar dinámicamente
$archivo_modulo = isset($modulos_permitidos[$modulo]) 
    ? $modulos_permitidos[$modulo] 
    : '../modules/panel/panel_recepcion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Medicatec</title>
    
    <!-- Boxicons CDN para íconos globales -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    
    <!-- Hojas de Estilo Globals y Módulos -->
    <link rel="stylesheet" href="../css/doctor_dashboard.css">
    <link rel="stylesheet" href="../css/panel_recepcion.css">
    <link rel="stylesheet" href="../css/citas_rep.css">
    <link rel="stylesheet" href="../css/reportes_menus.css">
    <link rel="stylesheet" href="../css/avisos.css">
    <link rel="stylesheet" href="../css/reportes.css">
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

            

            <!-- Navegación de Módulos de Administración -->
            <nav class="sidebar-menu">
                <span class="menu-label">Administración Global</span>
                
                <ul>
                    <li>
                        <a href="recepcion.php?mod=panel" class="<?= ($modulo === 'panel') ? 'active' : '' ?>">
                            <i class='bx bx-grid-alt'></i>
                            <span>Panel Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="recepcion.php?mod=citas" class="<?= ($modulo === 'citas') ? 'active' : '' ?>">
                            <i class='bx bx-calendar'></i>
                            <span>Gestión de Citas</span>
                        </a>
                    </li>
                    <li>
                        <a href="recepcion.php?mod=pacientes" class="<?= ($modulo === 'pacientes') ? 'active' : '' ?>">
                            <i class='bx bx-user'></i>
                            <span>Pacientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="recepcion.php?mod=avisos" class="<?= ($modulo === 'avisos') ? 'active' : '' ?>">
                            <i class='bx bx-bell'></i>
                            <span>Avisos e Informes</span>
                        </a>
                    </li>
                    <li>
                        <a href="recepcion.php?mod=reportes" class="<?= ($modulo === 'reportes') ? 'active' : '' ?>">
                            <i class='bx bx-group'></i>
                            <span>Personal</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logout -->
            <div class="sidebar-footer">
                <a href="../logout.php" class="btn-logout">
                    <i class='bx bx-log-out'></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </aside>

        <!--CONTENEDOR PRINCIPAL-->
        <main class="main-content">
            
            

            <!-- ÁREA DINÁMICA DE MÓDULOS -->
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