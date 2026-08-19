
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/citas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

 

        <div class="p-4 w-10">
            <!-- DASHBOARD ENVOLVENTE GENERAL -->
            <div class="card border-0 shadow-sm p-4 bg-white rounded-4">
                
                <!-- ACCIONES -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="position-relative w-25">
                        <i class="fa-solid fa-magnifying-glass position-absolute" style="top: 12px; left: 15px; color: #9ca3af;"></i>
                        <input type="text" class="form-control ps-5" placeholder="Buscar paciente...">
                    </div>
                    <button class="btn btn-info text-white fw-bold px-4"> + Agendar cita</button>
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
        </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>