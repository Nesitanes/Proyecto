<?php
require_once "config.php";
$menuActual = "medico";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pacientes Doctor | MEDICATEC</title>
<link rel="stylesheet" href="../../css/reportes_menus.css">
</head>
<body>

<div class="app">
<aside class="sidebar">
    <div class="brand">MEDICATEC</div>

    <nav class="side-nav">
        <a href="#" data-route="Panel médico">Panel</a>
        <a href="menu_medico.php" class="active">Pacientes</a>
        <a href="#" data-route="Citas">Citas</a>
        <a href="#" data-route="Avisos">Avisos</a>
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
        <span class="user-name"><?= htmlspecialchars($nombreDoctor) ?></span>
        <span class="user-avatar"></span>
    </div>
</header>

<section class="workspace">
    <div class="page-title">Pacientes Doctor</div>

    <div class="search-row">
        <div class="search-box">
            <span class="search-icon">⌕</span>
            <input id="searchInput" type="search" placeholder="Buscar paciente..." autocomplete="off">
        </div>

        <button class="sort-button" id="sortButton" type="button">
            <span id="sortLabel">Recientes</span>
            <span>⌄</span>
        </button>
    </div>

    <div class="table-panel">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="check-col"></th>
                        <th>Nombre</th>
                        <th>DUI</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="patientsBody">
                <?php foreach ($pacientes as $id => $paciente): ?>
                    <tr
                        data-name="<?= htmlspecialchars(strtolower($paciente["nombre"])) ?>"
                        data-dui="<?= htmlspecialchars(strtolower($paciente["dui"])) ?>"
                        data-patient-url="expediente.php?id=<?= $id ?>&menu=medico"
                        tabindex="0"
                    >
                        <td class="check-col">
                            <input type="checkbox" class="row-check" onclick="event.stopPropagation()">
                        </td>

                        <td>
                            <div class="patient">
                                <span class="patient-avatar"></span>
                                <span><?= htmlspecialchars($paciente["nombre"]) ?></span>
                            </div>
                        </td>

                        <td><?= htmlspecialchars($paciente["dui"]) ?></td>
                        <td><?= htmlspecialchars($paciente["edad"]) ?></td>

                        <td>
                            <div class="action-buttons">
                                <a
                                    class="edit-icon"
                                    href="expediente.php?id=<?= $id ?>&menu=medico"
                                    title="Abrir expediente"
                                >✎</a>

                                <a
                                    class="delete-icon"
                                    href="expediente.php?id=<?= $id ?>&menu=medico"
                                    title="Abrir expediente"
                                >♧</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div id="noResults" class="no-results" hidden>
                No se encontraron pacientes.
            </div>
        </div>
    </div>

    <div class="table-footer">
        <span id="resultCount"><?= count($pacientes) ?> pacientes</span>
        <span>Haz clic en un paciente para abrir su expediente.</span>
    </div>
</section>
</main>
</div>

<div id="toast" class="toast"></div>
<script src="../../js/reportes.js"></script>
</body>
</html>