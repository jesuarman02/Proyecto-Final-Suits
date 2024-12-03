<?php
    if(!isset($_SESSION['usuario'])){
        header("location:login");
        exit();
    }
?>
<style>
    h2.title-header {
    color: #4A90E2;
    text-align: center;
    font-weight: bold;
}

table.table-styled {
    width: 100%;
    border-collapse: collapse;
}

table.table-styled th, table.table-styled td {
    border: 1px solid #ccc;
    padding: 10px;
}

button.btn-primary-custom {
    background-color: #007BFF;
    border-color: #007BFF;
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
}

button.btn-primary-custom:hover {
    background-color: #0056b3;
}

.modal-header-custom {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
    color: #495057;
}

</style>
<div class="container mt-5">
    <div class="row justify-content-center bg-card">
        <div class="col-10 text-center mt-3">
            <h2>Lista de Citas</h2>
        </div>
        <div class="col-10 text-end mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">Añadir Cita</button>
            <table id="myTable" class="display table text-black">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="contenido_citas">
                </tbody>
            </table>
        </div>
        <div class="col-10 text-end">
            <hr class="text-primary">
            <p class="lead">By: Armando</p>
        </div>
    </div>
</div>

<!-- Modal para Actualizar Cita -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" hidden id="id_cita_act">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_nombre" name="edit_nombre" type="text" placeholder="Nombre">
                            <label class="text-primary" for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_telefono" name="edit_telefono" type="text" placeholder="Teléfono">
                            <label class="text-primary" for="telefono">Teléfono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_fecha" name="edit_fecha" type="date" placeholder="Fecha">
                            <label class="text-primary" for="fecha">Fecha</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_departamento" name="edit_departamento" type="text" placeholder="Departamento">
                            <label class="text-primary" for="departamento">Departamento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_doctor" name="edit_doctor" type="text" placeholder="Doctor">
                            <label class="text-primary" for="doctor">Doctor</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_motivo" name="edit_motivo" type="text" placeholder="Motivo">
                            <label class="text-primary" for="motivo">Motivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Agregar Cita -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre">
                            <label class="text-primary" for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Teléfono">
                            <label class="text-primary" for="telefono">Teléfono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="fecha" name="fecha" type="date" placeholder="Fecha">
                            <label class="text-primary" for="fecha">Fecha</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="departamento" name="departamento" type="text" placeholder="Departamento">
                            <label class="text-primary" for="departamento">Departamento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="doctor" name="doctor" type="text" placeholder="Doctor">
                            <label class="text-primary" for="doctor">Doctor</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="motivo" name="motivo" type="text" placeholder="Motivo">
                            <label class="text-primary" for="motivo">Motivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_agregar">Añadir</button>
            </div>
        </div>
    </div>
</div>
