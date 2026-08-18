<?php


$paciente = [
    "nombre" => "Andrés Fuentes",
    "codigo" => "PAC-001",
    "fecha_nacimiento" => "15/06/2002",
    "tipo_sangre" => "O+"
];

$reportes = [
    [
        "id" => "REP-001",
        "fecha" => "15/08/2026",
        "tipo" => "Consulta médica",
        "doctor" => "Dr. Eduardo Alemán",
        "especialidad" => "Medicina General",
        "estado" => "Disponible"
    ],
    [
        "id" => "REP-002",
        "fecha" => "08/08/2026",
        "tipo" => "Examen de laboratorio",
        "doctor" => "Dra. Marbella Romero",
        "especialidad" => "Medicina General",
        "estado" => "Disponible"
    ],
    [
        "id" => "REP-003",
        "fecha" => "25/07/2026",
        "tipo" => "Consulta médica",
        "doctor" => "Dr. Álvaro Díaz",
        "especialidad" => "Medicina General",
        "estado" => "Disponible"
    ]
];
?>

<link rel="stylesheet" href="../../css/reportes.css">

<div class="reportes-container">

   

    <div class="reportes-header">

        <div>
            <h1>Reportes médicos</h1>
            <p>Consulta tus reportes y expediente médico</p>
        </div>

        <button class="btn-expediente"
                onclick="verExpediente()">

            📁 Ver expediente

        </button>

    </div>


  

    <div class="paciente-card">

        <div class="paciente-avatar">
            AF
        </div>

        <div class="paciente-info">

            <h2>
                <?= htmlspecialchars($paciente["nombre"]) ?>
            </h2>

            <div class="paciente-datos">

                <span>
                    <strong>Código:</strong>
                    <?= htmlspecialchars($paciente["codigo"]) ?>
                </span>

                <span>
                    <strong>Fecha de nacimiento:</strong>
                    <?= htmlspecialchars($paciente["fecha_nacimiento"]) ?>
                </span>

                <span>
                    <strong>Tipo de sangre:</strong>
                    <?= htmlspecialchars($paciente["tipo_sangre"]) ?>
                </span>

            </div>

        </div>

    </div>


   

    <div class="resumen-grid">

        <div class="resumen-card">

            <div class="resumen-icon">
                📄
            </div>

            <div>
                <span class="resumen-numero">
                    <?= count($reportes) ?>
                </span>

                <span class="resumen-titulo">
                    Reportes
                </span>
            </div>

        </div>


        <div class="resumen-card">

            <div class="resumen-icon">
                🩺
            </div>

            <div>
                <span class="resumen-numero">
                    3
                </span>

                <span class="resumen-titulo">
                    Consultas
                </span>
            </div>

        </div>


        <div class="resumen-card">

            <div class="resumen-icon">
                📅
            </div>

            <div>
                <span class="resumen-numero">
                    2026
                </span>

                <span class="resumen-titulo">
                    Año actual
                </span>
            </div>

        </div>

    </div>




    <div class="panel-reportes">

        <div class="panel-header">

            <div>
                <h2>Mis reportes</h2>
                <p>
                    Historial de reportes médicos disponibles
                </p>
            </div>

            <select id="filtroReportes"
                    onchange="filtrarReportes()">

                <option value="todos">
                    Todos los reportes
                </option>

                <option value="consulta">
                    Consultas médicas
                </option>

                <option value="laboratorio">
                    Exámenes
                </option>

            </select>

        </div>


        <div class="reportes-lista">

            <?php foreach ($reportes as $reporte): ?>

                <div class="reporte-item"
                     data-tipo="<?= strtolower($reporte["tipo"]) ?>">

                    <!-- ICONO -->

                    <div class="reporte-icon">
                        📄
                    </div>


                    <!-- INFORMACIÓN -->

                    <div class="reporte-info">

                        <div class="reporte-titulo">

                            <h3>
                                <?= htmlspecialchars($reporte["tipo"]) ?>
                            </h3>

                            <span class="estado">
                                <?= htmlspecialchars($reporte["estado"]) ?>
                            </span>

                        </div>

                        <p class="reporte-doctor">

                            <?= htmlspecialchars($reporte["doctor"]) ?>

                        </p>

                        <div class="reporte-detalles">

                            <span>
                                📅 <?= htmlspecialchars($reporte["fecha"]) ?>
                            </span>

                            <span>
                                🩺 <?= htmlspecialchars($reporte["especialidad"]) ?>
                            </span>

                            <span>
                                ID:
                                <?= htmlspecialchars($reporte["id"]) ?>
                            </span>

                        </div>

                    </div>


                    <!-- BOTÓN -->

                    <div class="reporte-accion">

                        <button
                            onclick="verReporte(
                                '<?= htmlspecialchars($reporte["id"]) ?>'
                            )">

                            Ver reporte

                        </button>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>


   

    <div class="expediente-info">

        <div class="expediente-icon">
            📁
        </div>

        <div>

            <h3>Expediente médico</h3>

            <p>
                Consulta tu información médica,
                antecedentes y registros clínicos.
            </p>

        </div>

        <button onclick="verExpediente()">
            Ver expediente
        </button>

    </div>

</div>


<script>



function verReporte(idReporte) {

    alert(
        "Aquí se abrirá el reporte médico: " +
        idReporte
    );

}




function verExpediente() {

    alert(
        "Aquí se abrirá el expediente médico de " +
        "<?= htmlspecialchars($paciente["nombre"]) ?>"
    );

}




function filtrarReportes() {

    const filtro =
        document.getElementById("filtroReportes").value;

    const reportes =
        document.querySelectorAll(".reporte-item");


    reportes.forEach(function(reporte) {

        const tipo =
            reporte.getAttribute("data-tipo");

        if (filtro === "todos") {

            reporte.style.display = "flex";

        } else if (
            filtro === "consulta" &&
            tipo.includes("consulta")
        ) {

            reporte.style.display = "flex";

        } else if (
            filtro === "laboratorio" &&
            tipo.includes("laboratorio")
        ) {

            reporte.style.display = "flex";

        } else {

            reporte.style.display = "none";

        }

    });

}

</script>