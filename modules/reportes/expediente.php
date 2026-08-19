<?php
require_once "config.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$menu = $_GET["menu"] ?? "medico";

$urls = [
    "medico" => "menu_medico.php",
    "recepcion" => "menu_recepcion.php",
    "reportes" => "menu_reportes.php",
];

if (!isset($urls[$menu])) {
    $menu = "medico";
}

if (!$id || !isset($pacientes[$id])) {
    header("Location: " . $urls[$menu]);
    exit;
}

$paciente = $pacientes[$id];
$historial = $expedientes[$id] ?? [];

$nombreUsuario = $menu === "recepcion"
    ? $nombreRecepcion
    : $nombreDoctor;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reportes | <?= htmlspecialchars($paciente["nombre"]) ?></title>
<link rel="stylesheet" href="../../css/reportes_menus.css">
</head>
<body>

<div class="app">
<aside class="sidebar">
    <div class="brand">MEDICATEC</div>

    <nav class="side-nav">
        <?php if ($menu === "medico"): ?>
            <a href="#" data-route="Panel médico">Panel</a>
            <a href="menu_medico.php">Pacientes</a>
            <a href="#" data-route="Citas">Citas</a>
            <a href="#" data-route="Avisos">Avisos</a>
        <?php elseif ($menu === "recepcion"): ?>
            <a href="#" data-route="Panel recepción">Panel</a>
            <a href="menu_recepcion.php">Pacientes</a>
            <a href="#" data-route="Citas">Citas</a>
            <a href="#" data-route="Reportes">Reportes</a>
        <?php else: ?>
            <a href="#" data-route="Panel de reportes">Panel</a>
            <a href="#" data-route="Citas">Citas</a>
            <a href="menu_reportes.php" class="active">Reportes</a>
        <?php endif; ?>
    </nav>
</aside>

<main class="main">
<header class="topbar">
    <nav class="top-nav">
        <a href="#" data-route="Inicio">INICIO</a>
        <a href="#" data-route="Servicios">SERVICIOS</a>
        <a href="#" data-route="Nosotros" class="selected">NOSOTROS</a>
        <a href="#" data-route="Contacto">CONTACTO</a>
    </nav>

    <div class="user-area">
        <span class="user-divider"></span>
        <span class="user-name"><?= htmlspecialchars($nombreUsuario) ?></span>
        <span class="user-avatar"></span>
    </div>
</header>

<section class="workspace">
    <div class="page-title">Reportes Paciente</div>

    <div class="patient-summary">
        <div>
            <h1><?= htmlspecialchars($paciente["nombre"]) ?></h1>

            <p>
                DUI: <?= htmlspecialchars($paciente["dui"]) ?>
                <span class="separator">|</span>
                Edad: <?= htmlspecialchars($paciente["edad"]) ?>
            </p>
        </div>

        <button
            class="future-button"
            type="button"
            data-route="Expediente de Paciente"
        >
            Expediente de Paciente
        </button>
    </div>

    <div class="report-panel">
        <table class="report-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Diagnóstico</th>
                    <th>Medicado</th>
                    <th class="eye-col"></th>
                </tr>
            </thead>

            <tbody>
            <?php if (!$historial): ?>
                <tr>
                    <td colspan="4" class="empty">
                        No hay reportes registrados para este paciente.
                    </td>
                </tr>
            <?php else: ?>

                <?php foreach ($historial as $reporte): ?>
                    <tr>
                        <td><?= htmlspecialchars($reporte["fecha"]) ?></td>
                        <td><?= htmlspecialchars($reporte["diagnostico"]) ?></td>
                        <td><?= htmlspecialchars($reporte["medicado"]) ?></td>
                        <td class="eye-col">
                            <button
                                type="button"
                                class="view-report"
                                data-route="Detalle del reporte"
                            >◉</button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php for ($i = count($historial); $i < 7; $i++): ?>
                    <tr class="empty-row">
                        <td></td><td></td><td></td><td></td>
                    </tr>
                <?php endfor; ?>

            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <a
            class="back-link"
            href="<?= htmlspecialchars($urls[$menu]) ?>"
        >← Volver</a>

        <span>
            Expediente de <?= htmlspecialchars($paciente["nombre"]) ?>.
        </span>
    </div>
</section>
</main>
</div>

<div id="toast" class="toast"></div>
<script src="../../js/reportes.js"></script>
</body>
</html>