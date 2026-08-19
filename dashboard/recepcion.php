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
    'pacientes' => '../modules/pacientes/pacientes.php',
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
    <link rel="stylesheet" href="../css/pacientes.css">
    <link rel="stylesheet" href="../css/avisos.css">
    <link rel="stylesheet" href="../css/reportes.css">
</head>
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

            <!-- Perfil del Administrador -->
            <div class="sidebar-user-profile">
                <div class="user-avatar" style="background-color: #7c3aed;"><?= $usuario['avatar'] ?></div>
                <div class="user-details">
                    <strong><?= htmlspecialchars($usuario['nombre']) ?></strong>
                    <small><?= htmlspecialchars($usuario['rol']) ?></small>
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
                            <i class='bx bx-group'></i>
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
                            <i class='bx bx-bar-chart-alt-2'></i>
                            <span>Reportes</span>
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
            
            <!-- Barra Superior (Top Header) -->
            <header class="topbar">
                <div class="topbar-left">
                    <span class="current-date">
                        <i class='bx bx-time-five'></i> <?= date('d/m/Y') ?>
                    </span>
                </div>

                <div class="topbar-right">
                    <button class="topbar-icon-btn" title="Notificaciones del Sistema">
                        <i class='bx bx-bell'></i>
                        <span class="notification-dot"></span>
                    </button>
                    <div class="topbar-divider"></div>
                    <div class="user-badge">
                        <span class="role-tag"><?= htmlspecialchars($usuario['rol']) ?>
                        </span>
                    </div>
                </div>
            </header>

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