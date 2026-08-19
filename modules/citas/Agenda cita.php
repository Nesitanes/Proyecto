<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICATEC - Agendar Cita como Invitado</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/agenda citas.css">
    <style>
        .appointment-section {
            min-height: 100vh;
            background: linear-gradient(rgba(220, 240, 250, 0.6), rgba(220, 240, 250, 0.6)), 
                        url('../../img/doctores-fondo.png') no-repeat center center;
            background-size: cover;
        }

        .appointment-card {
            width: 100%;
            max-width: 520px;
            background: #ffffff;
            border-radius: 24px;
            padding: 40px 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .appointment-title {
            font-family: 'Arial', sans-serif;
            font-weight: 800;
            font-size: 32px;
            color: #111111;
            text-align: center;
            line-height: 1.2;
            margin-bottom: 35px;
        }

        .appointment-form .form-label {
            font-weight: 700;
            color: #111111;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .appointment-form .form-control, 
        .appointment-form .form-select {
            background-color: #e5e7eb !important;
            border: none !important;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            color: #6b7280;
            box-shadow: none !important;
        }

        .appointment-form .form-control::placeholder {
            color: #9ca3af;
        }

        .btn-agendar-invitado {
            background-color: #00b4d8;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            width: 100%;
            transition: background 0.2s;
            margin-top: 15px;
        }

        .btn-agendar-invitado:hover {
            background-color: #0096b4;
        }
    </style>
</head>
<body>

    <!-- CONTENEDOR DE PANTALLA COMPLETA -->
    <main class="appointment-section d-flex justify-content-center align-items-center p-4">
        
        <div class="appointment-card">
            <h1 class="appointment-title">Agenda tu cita<br>como invitado</h1>
            
            <form class="appointment-form">
                <!-- Nombre completo -->
                <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" placeholder="">
                </div>

                <!-- Área -->
                <div class="mb-3">
                    <label class="form-label">Área</label>
                    <select class="form-select">
                        <option selected disabled>Elige la especialidad para tu cita</option>
                        <option value="1">Medicina General</option>
                        <option value="2">Pediatría</option>
                        <option value="3">Odontología</option>
                    </select>
                </div>

                <!-- Día -->
                <div class="mb-3">
                    <label class="form-label">Día</label>
                    <div class="position-relative">
                        <input type="text" class="form-control pe-5" placeholder="Elige un día para tu cita">
                        <i class="fa-regular fa-calendar position-absolute top-50 translate-middle-y end-0 me-3 text-secondary"></i>
                    </div>
                </div>

                <!-- Horas Disponibles -->
                <div class="mb-4">
                    <label class="form-label">Horas Disponibles</label>
                    <select class="form-select">
                        <option selected>00:00</option>
                        <option value="1">09:00 am</option>
                        <option value="2">10:30 am</option>
                        <option value="3">03:00 pm</option>
                    </select>
                </div>

                <!-- Botón Agendar -->
                <div>
                    <button type="submit" class="btn-agendar-invitado">Agendar cita</button>
                </div>
            </form>
        </div>

    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>