<?php


$doctor = [
    "nombre" => "Dr. Eduardo Alemán",
    "citas_hoy" => 10,
    "mensajes_nuevos" => 4
];

$citas_hoy = [
    [
        "hora" => "9:00 am",
        "paciente" => "Marta García",
        "especialidad" => "Medicina General"
    ],
    [
        "hora" => "10:30 am",
        "paciente" => "Lois López",
        "especialidad" => "Medicina General"
    ]
];

$citas_recientes = [
    [
        "dia" => "Lunes",
        "paciente" => "Marbella Romero",
        "especialidad" => "Medicina General"
    ],
    [
        "dia" => "Sábado",
        "paciente" => "Carolina Suria",
        "especialidad" => "Medicina General"
    ]
];

// Datos ficticios para simular la gráfica de barras semanal
$citas_semanales = [
    "Lunes" => 40,
    "Martes" => 25,
    "Miércoles" => 35,
    "Jueves" => 50,
    "Viernes" => 30,
    "Sábado" => 15,
    "Domingo" => 5
];
$max_citas = 50; // Límite superior para cálculo de altura en %
?>

<link rel="stylesheet" href="../../css/panel.css">

<div class="panel-main-container">

    <!--  ENCABEZADO / BIENVENIDA-->
    <div class="panel-welcome-header">
        <div class="welcome-text">
            <h1>Bienvenido</h1>
            <p>Bienvenido a tu página principal <?= htmlspecialchars($doctor["nombre"]) ?></p>
        </div>
        <button class="btn-agendar-header" onclick="agendarCitaModal()">
            + Agendar cita
        </button>
    </div>

    <!-- TARJETAS DE MÉTRICAS (METRICS GRID) -->
    <div class="metrics-grid">
        <div class="metric-card">
            <div class="metric-icon citas-icon">
                <i class='bx bx-calendar'></i>
            </div>
            <div class="metric-info">
                <span class="metric-value"><?= htmlspecialchars($doctor["citas_hoy"]) ?></span>
                <span class="metric-label">Citas Hoy</span>
            </div>
        </div>

        <div class="metric-card">
            <div class="metric-icon mensajes-icon">
                <i class='bx bx-chat'></i>
            </div>
            <div class="metric-info">
                <span class="metric-value"><?= htmlspecialchars($doctor["mensajes_nuevos"]) ?></span>
                <span class="metric-label">Mensajes</span>
            </div>
        </div>
    </div>

    

    <!-- SECCIONES DE CITAS (GRID 2 COLUMNAS) -->
    <div class="citas-tables-grid">

        <!-- CITAS RECIENTES -->
        <div class="citas-box">
            <div class="box-header">
                <h2>Citas Recientes</h2>
                <button class="btn-link" onclick="verModuloCitas()">Ver todas</button>
            </div>

            <div class="citas-list">
                <?php foreach ($citas_recientes as $cita): ?>
                    <div class="cita-card-item">
                        <div class="cita-badge-day">
                            <?= htmlspecialchars($cita["dia"]) ?>
                        </div>
                        <div class="cita-details">
                            <strong><?= htmlspecialchars($cita["paciente"]) ?></strong>
                            <small><?= htmlspecialchars($cita["especialidad"]) ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- CITAS DE HOY -->
        <div class="citas-box">
            <div class="box-header">
                <h2>Citas de Hoy</h2>
                <span class="today-badge">Hoy</span>
            </div>

            <div class="citas-list">
                <?php foreach ($citas_hoy as $cita): ?>
                    <div class="cita-card-item today-item">
                        <div class="cita-badge-time">
                            <?= htmlspecialchars($cita["hora"]) ?>
                        </div>
                        <div class="cita-details">
                            <strong><?= htmlspecialchars($cita["paciente"]) ?></strong>
                            <small><?= htmlspecialchars($cita["especialidad"]) ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


    <!-- GRÁFICA SEMANAL DE CITAS-->
    <div class="chart-panel">
        <div class="chart-header">
            <h2>Citas Semanales</h2>
            <p>Registro de volumen de atención por día</p>
        </div>

        <div class="chart-container">
            <!-- Eje Y (Escala) -->
            <div class="chart-y-axis">
                <span>50</span>
                <span>40</span>
                <span>30</span>
                <span>20</span>
                <span>10</span>
                <span>0</span>
            </div>

            <!-- Área de Barras -->
            <div class="chart-bars">
                <?php foreach ($citas_semanales as $dia => $cantidad): 
                    $altura_porcentaje = ($cantidad / $max_citas) * 100;
                ?>
                    <div class="bar-col">
                        <div class="bar-wrapper">
                            <div class="bar-fill" style="height: <?= $altura_porcentaje ?>%;" title="<?= $cantidad ?> citas">
                                <span class="bar-tooltip"><?= $cantidad ?></span>
                            </div>
                        </div>
                        <span class="bar-label"><?= $dia ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

<script>
function agendarCitaModal() {
    alert("Redirigiendo o abriendo modal para Agendar Cita...");
}

function verModuloCitas() {
    alert("Navegando al módulo general de Citas...");
}
</script>