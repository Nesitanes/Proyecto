<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICATEC - Citas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/citas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="d-flex" style="height: 100vh; overflow: hidden;">
   <!-- SIDEBAR -->
        <aside class="sidebar bg-white border-end" style="width: 240px; flex-shrink: 0;">
            <div class="sidebar-logo p-4 fw-bold fs-4">MEDICATEC</div>
            <ul class="nav flex-column px-2">
                <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Panel</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold active-link" href="#">Citas</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold" href="../../modules/avisos/avisos.php">Avisos</a></li>
            </ul>
        </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 overflow-auto bg-light">
        <!-- TOPBAR -->
        <header class="topbar bg-primary text-white d-flex justify-content-between align-items-center px-4 py-3">
            <nav class="d-flex gap-4">
                <a class="text-white text-decoration-none fw-bold" href="#">INICIO</a>
                <a class="text-white text-decoration-none fw-bold" href="#">SERVICIOS</a>
                <a class="text-white text-decoration-none fw-bold" href="#">NOSOTROS</a>
                <a class="text-white text-decoration-none fw-bold" href="#">CONTACTO</a>
            </nav>
            <div class="d-flex align-items-center gap-3 border-start ps-3">
                <span class="fw-bold">Dr. Eduardo Alemán</span>
                <div class="rounded-circle bg-secondary" style="width:40px; height:40px;"></div>
            </div>
        </header>

        <section class="p-4">
            <!-- DASHBOARD ENVOLVENTE GENERAL -->
            <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
                
                <!-- ACCIONES -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="position-relative w-25">
                        <i class="fa-solid fa-magnifying-glass position-absolute" style="top: 12px; left: 15px; color: #9ca3af;"></i>
                        <input type="text" class="form-control ps-5" placeholder="Buscar paciente...">
                    </div>
                    
                </div>

                <!-- TABLA Y SU ENCABEZADO INTERNO -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
                        <h2 class="fs-4 fw-bold m-0">Citas</h2>
                        <select class="form-select w-auto">
                            <option>Recientes</option>
                            <option>Antiguas</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4" style="width: 50px;"></th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Las filas irán aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>