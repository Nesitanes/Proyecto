<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reportes Paciente | MEDICATEC</title>
<link rel="stylesheet" href="../../css/reportes_menus.css">
</head>
<body>

<div class="panel-main-container">
<div class="avisos-header">

         <button class="btn-nuevo">
            Registro Medico
        </button>

    </div>
<main class="main">
    <div class="custom-card">
    <div class="table-panel">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="check-col"></th>
                        <th>Fecha</th>
                        <th>Diagnostico</th>
                        <th>Medicado</th>
                        <th>Registro</th>
                    </tr>
                </thead>

               
            </table>

            <div id="noResults" class="no-results" hidden>
                No se encontraron pacientes.
            </div>
        </div>
    </div>

    <div class="table-footer">
        <span id="resultCount"><?= count($pacientes) ?> pacientes</span>
        <span>Selecciona un paciente para consultar sus reportes.</span>
    </div>
</div>
</main>
</div>


<div id="toast" class="toast"></div>
<script src="../../js/reportes.js"></script>
</body>
</html>