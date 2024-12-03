<?php
    if(isset($_SESSION['usuario'])){
        header("location:inicio");
        exit();
    }
?>
<div class="login-container">
    <div class="left-text">
        <h1><i class="fas fa-user-md"></i>Registrate Ahora</h1>
        <p>¡Únete a nuestra comunidad! Regístrate hoy mismo!</p>
        <p>Inicia sesión y descubre cómo podemos ayudarte a mejorar tu bienestar.</p>
        <div class="text-center mb-3">
        <i class="fa-regular fa-hospital" style="color: #007bff; font-size: 3rem;"></i>
        </div>
    </div>
    <div class="right-form">
        <form id="frm_login" class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-12 fondo"> 
                    <div class="py-4">
                        <h3 class="text-center" style="font-size: 2rem; color: #007bff; font-weight: bold;">Iniciar Sesión</h3>
                        <div class="d-flex align-items-center justify-content-center mb-4"> <!-- Flexbox para alinear imagen y texto -->
                            <img src="./public/img/logo.jpg" class="rounded-circle me-3" width="10%" alt="Login">
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email"
                                   placeholder="Correo" required>
                            <label class="text-primary" for="usuario"><i class="fa-solid fa-user me-2"></i>Correo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="password" name="password" type="password" class="form-control"
                                   placeholder="Password" required>
                            <label class="text-primary" for="password"><i class="fa-solid fa-key me-2"></i>Password</label>
                        </div>
                        <button class="btn btn-login w-100 mb-3" type="button" id="btn-iniciar">
                            <i class="fa-solid fa-sign-in-alt me-2"></i>Iniciar sesión
                        </button>
                        <a href="registro" class="btn btn-warning w-100 mb-3" style="background-color: #bbb;; color: #000;">
                            <i class="fa-solid fa-user-plus me-2"></i>Registro
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="./public/js/login.js"></script>