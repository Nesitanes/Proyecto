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
    'avisos' => '../modules/reportes/reportes.php'
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

            <!-- Perfil del Paciente -->
            <div class="sidebar-user-profile">
                <div class="user-avatar" style="background-color: #059669;"><?= $usuario['avatar'] ?></div>
                <div class="user-details">
                    <strong><?= htmlspecialchars($usuario['nombre']) ?></strong>
                    <small><?= htmlspecialchars($usuario['codigo']) ?></small>
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
            
            <!-- Barra Superior (Top Header) -->
            <header class="topbar">
                <div class="topbar-left">
                    <span class="current-date">
                        <i class='bx bx-time-five'></i> <?= date('d/m/Y') ?>
                    </span>
                </div>

                <div class="topbar-right">
                    <button class="topbar-icon-btn" title="Notificaciones">
                        <i class='bx bx-bell'></i>
                        <span class="notification-dot"></span>
                    </button>
                    <div class="topbar-divider"></div>
                    <div class="user-badge">
                        <span class="role-tag" style="background: #d1fae5; color: #047857;">
                            <?= htmlspecialchars($usuario['rol']) ?>
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