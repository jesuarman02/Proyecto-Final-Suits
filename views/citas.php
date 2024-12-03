<?php

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<div class="container" id="container-citas">
    <h2 class="text-center" id="h2-citas">Agenda tu cita ahora</h2>
    <form id="cita-form" class="mt-4">
        <div class="mb-3">
            <label for="nombre" class="form-label-titulo" id="label-nombre">Nombre completo</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-nombre"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="input-nombre" name="nombre" value="<?= $usuario['nombre'] . ' ' . $usuario['apellidoPaterno'] . ' ' . $usuario['apellidoMaterno'] ?>" readonly>
            </div>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label-titulo" id="label-direccion">Dirección</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-direccion"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" class="form-control" id="input-direccion" name="direccion" value="<?= $usuario['direccion'] ?>" readonly>
            </div>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label-titulo" id="label-telefono">Teléfono</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-telefono"><i class="fas fa-phone-alt"></i></span>
                <input type="tel" class="form-control" id="input-telefono" name="telefono" value="<?= $usuario['telefono'] ?>" readonly>
            </div>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label-titulo" id="label-fecha">Fecha</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-fecha"><i class="fas fa-calendar-alt"></i></span>
                <input type="date" class="form-control" id="input-fecha" name="fecha" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="departamento" class="form-label-titulo" id="label-departamento">Departamento</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-departamento"><i class="fas fa-hospital"></i></span>
                <select class="form-select" id="select-departamento" name="departamento">
                    <option value="cardiologia">Cardiología</option>
                    <option value="pediatria">Pediatría</option>
                    <option value="neurologia">Neurología</option>
                    <option value="odontologia">Odontología</option>
                    <option value="rehabilitacion">Rehabilitación y Fisioterapia</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="doctor" class="form-label-titulo" id="label-doctor">Doctor</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-doctor"><i class="fas fa-user-md"></i></span>
                <select class="form-select" id="select-doctor" name="doctor">
                    <option value="Dr. Luis Martinez">Dr. Luis Martínez</option>
                    <option value="Dr. Ana Garcia">Dr. Ana García</option>
                    <option value="Dr. Carlos Ramirez">Dr. Carlos Ramírez</option>
                    <option value="Dr. Sofia Hernandez">Dr. Sofía Hernández</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="motivo" class="form-label-titulo" id="label-motivo">Motivo</label>
            <div class="input-group">
                <span class="input-group-text" id="icon-motivo"><i class="fas fa-comment-dots"></i></span>
                <textarea class="form-control" id="input-motivo" name="motivo" rows="4" placeholder="Escribe el motivo de la cita aquí..."></textarea>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="btn-enviar-cita">Enviar Cita</button>
    </form>
</div>