<?php


$reuniones = [
    [
        "hora" => "9:00 am",
        "area" => "Pediatría",
        "lugar" => "Edificio 1, segundo piso"
    ],
    [
        "hora" => "10:30 am",
        "area" => "Odontología",
        "lugar" => "Edificio 3, primer piso"
    ],
    [
        "hora" => "10:30 am",
        "area" => "General",
        "lugar" => "Edificio 3, primer piso"
    ]
];

$anuncios = [
    [
        "anunciante" => "Dr. Hernández",
        "anuncio" => "Odontalgia, en revisión"
    ],
    [
        "anunciante" => "Dra. Orellana",
        "anuncio" => "Revisión general de equipo, día lunes 25"
    ]
];

$mensajes = [
    [
        "fecha" => "Lunes",
        "remitente" => "Dra. Marbella Romero",
        "mensaje" => "Está listo el equipo",
        "area" => "Medicina General"
    ],
    [
        "fecha" => "Sábado",
        "remitente" => "Dr. Álvaro Díaz",
        "mensaje" => "Reunión confirmada",
        "area" => "Medicina General"
    ]
];
?>

<link rel="stylesheet" href="../../css/avisos.css">

<div class="avisos-container">



    <div class="avisos-header">

        <div>
            <h1>Avisos</h1>
            <p>Información y comunicaciones importantes</p>
        </div>

        <button class="btn-nuevo">
            + Nuevo aviso
        </button>

    </div>




    <div class="resumen-grid">

        <button class="resumen-card"
                onclick="mostrarSeccion('reuniones')">

            <div class="card-icon reuniones-icon">
                📅
            </div>

            <div class="card-info">
                <span class="card-number">4</span>
                <span class="card-title">Reuniones</span>
                <span class="card-description">
                    programadas
                </span>
            </div>

        </button>


        <button class="resumen-card"
                onclick="mostrarSeccion('usuarios')">

            <div class="card-icon usuarios-icon">
                👥
            </div>

            <div class="card-info">
                <span class="card-number">4</span>
                <span class="card-title">Usuarios</span>
                <span class="card-description">
                    registrados
                </span>
            </div>

        </button>


        <button class="resumen-card"
                onclick="mostrarSeccion('mensajes')">

            <div class="card-icon mensajes-icon">
                💬
            </div>

            <div class="card-info">
                <span class="card-number">12</span>
                <span class="card-title">Mensajes</span>
                <span class="card-description">
                    recientes
                </span>
            </div>

        </button>

    </div>



    <div class="avisos-grid">


        <section class="panel avisos-reuniones" id="reuniones">

            <div class="panel-header">

                <div>
                    <h2>Reuniones programadas</h2>
                    <p>Próximas reuniones de la clínica</p>
                </div>

                <button class="btn-ver-todas">
                    Ver todas
                </button>

            </div>


            <div class="tabla-container">

                <table>

                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Área</th>
                            <th>Lugar</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($reuniones as $reunion): ?>

                        <tr>

                            <td>
                                <span class="hora">
                                    <?= htmlspecialchars($reunion["hora"]) ?>
                                </span>
                            </td>

                            <td>
                                <?= htmlspecialchars($reunion["area"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($reunion["lugar"]) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </section>


        

        <section class="panel anuncios-panel">

            <div class="panel-header">

                <div>
                    <h2>Anuncios</h2>
                    <p>Comunicados importantes</p>
                </div>

                <button class="btn-ver-todas">
                    Ver todos
                </button>

            </div>


            <div class="anuncios-lista">

                <?php foreach ($anuncios as $anuncio): ?>

                    <div class="anuncio">

                        <div class="anuncio-icon">
                            📢
                        </div>

                        <div class="anuncio-info">

                            <span class="anunciante">
                                <?= htmlspecialchars($anuncio["anunciante"]) ?>
                            </span>

                            <p>
                                <?= htmlspecialchars($anuncio["anuncio"]) ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>


       

        <section class="panel mensajes-panel">

            <div class="panel-header">

                <div>
                    <h2>Mensajes recientes</h2>
                    <p>Últimas comunicaciones</p>
                </div>

                <button class="btn-ver-todas">
                    Ver todos
                </button>

            </div>


            <div class="mensajes-lista">

                <?php foreach ($mensajes as $mensaje): ?>

                    <div class="mensaje">

                        <div class="mensaje-avatar">
                            <?= strtoupper(substr($mensaje["remitente"], 0, 1)) ?>
                        </div>

                        <div class="mensaje-info">

                            <div class="mensaje-superior">

                                <strong>
                                    <?= htmlspecialchars($mensaje["remitente"]) ?>
                                </strong>

                                <span>
                                    <?= htmlspecialchars($mensaje["fecha"]) ?>
                                </span>

                            </div>

                            <p>
                                <?= htmlspecialchars($mensaje["mensaje"]) ?>
                            </p>

                            <small>
                                <?= htmlspecialchars($mensaje["area"]) ?>
                            </small>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

    </div>

</div>


<script>



function mostrarSeccion(seccion) {

    const elemento = document.getElementById(seccion);

    if (elemento) {

        elemento.scrollIntoView({
            behavior: "smooth"
        });

    } else {

        alert(
            "El módulo de " + seccion +
            " se desarrollará posteriormente."
        );

    }
}

</script>
