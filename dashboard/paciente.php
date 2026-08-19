<?php

// Datos de sesión simulados
$usuario = [
    "nombre" => "Andrés Fuentes",
    "codigo" => "PAC-001",
    "rol" => "Paciente",
    "avatar" => "AF"
];

// Módulo activo por defecto (vía GET)
$modulo = isset($_GET['mod']) ? $_GET['mod'] : 'citas';

// Módulos permitidos para el perfil de Paciente
$modulos_permitidos = [
    'citas'  => '../modules/citas/citas_pacient.php',
    'avisos' => '../modules/reportes/menu_reportes.php'
];

// Determinar qué archivo cargar dinámicamente
$archivo_modulo = isset($modulos_permitidos[$modulo]) 
    ? $modulos_permitidos[$modulo] 
    : '../modules/citas/paciente.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Paciente - Medicatec</title>
    
    <!-- Boxicons CDN para íconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Estilos Globals y Módulos -->
    <link rel="stylesheet" href="../css/doctor_dashboard.css">
    <link rel="stylesheet" href="../css/citas_pacient.css">
    <link rel="stylesheet" href="../css/reportes_menus.css">
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

          

            <!-- Navegación de Módulos para Pacientes -->
            <nav class="sidebar-menu">
                <span class="menu-label">Mi Portal</span>
                
                <ul>
                    <li>
                        <a href="paciente.php?mod=citas" class="<?= ($modulo === 'citas') ? 'active' : '' ?>">
                            <i class='bx bx-calendar'></i>
                            <span>Mis Citas</span>
                        </a>
                    </li>
                    <li>
                        <a href="paciente.php?mod=avisos" class="<?= ($modulo === 'avisos') ? 'active' : '' ?>">
                            <i class='bx bx-folder'></i>
                            <span>Mis Avisos</span>
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

        <!-- CONTENEDOR PRINCIPAL-->
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