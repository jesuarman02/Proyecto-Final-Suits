<?php
    if(isset($_SESSION['usuario'])){
        header("location:inicio");
        exit();
    }
?>
<div class="registro-container">
    <form id="frm_register" class="container mt-3">
        <h3 class="text-center" style="font-size: 2rem; color: #007bff; font-weight: bold;">Registro</h3>
        <br>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                    <label class="text-primary" for="nombre"><i class="fa-solid fa-user me-2"></i>Nombre</label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="apellidoPaterno" name="apellidoPaterno" type="text" placeholder="Apellido Paterno" required>
                    <label class="text-primary" for="apellidoPaterno"><i class="fa-solid fa-user me-2"></i>Apellido Paterno</label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="apellidoMaterno" name="apellidoMaterno" type="text" placeholder="Apellido Materno" required>
                    <label class="text-primary" for="apellidoMaterno"><i class="fa-solid fa-user me-2"></i>Apellido Materno</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="direccion" name="direccion" type="text" placeholder="Dirección" required>
                    <label class="text-primary" for="direccion"><i class="fa-solid fa-map-marker-alt me-2"></i>Dirección</label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="telefono" name="telefono" type="tel" placeholder="Teléfono" required pattern="[0-9]{10}">
                    <label class="text-primary" for="telefono"><i class="fa-solid fa-phone me-2"></i>Teléfono</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Correo" required>
                    <label class="text-primary" for="email"><i class="fa-solid fa-envelope me-2"></i>Correo</label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                    <label class="text-primary" for="password"><i class="fa-solid fa-lock me-2"></i>Contraseña</label>
                </div>
            </div>

        </div>

        <div class="text-center">
            <button type="button" class="btn-registrar btn-primary" id="btn-registrar" style="width: 50%;">Registrar</button>
            <p class="mt-3">
                ¿Ya tienes una cuenta?
                <a href="login" class="text-primary">Inicia sesión aquí</a>
            </p>
        </div>
    </form>
</div>
<script src="./public/js/registro.js"></script>