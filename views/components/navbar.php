<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="inicio">
            <img src="./public/img/logo.jpg" alt="Logo" width="40" height="40" class="d-inline-block align-text-center">
            Clínica Santa María
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto">Contacto</a>
                </li>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="citas">Agendar Cita</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['usuario'])): ?>
                <div class="dropdown" style="margin-left: auto;">
                    <a class="btn btn-light dropdown-toggle" id="userButton" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                        <?php echo htmlspecialchars($_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidoPaterno']); ?>
                    </a>
                    <ul class="dropdown-menu" id="dropdownMenu">
                        <li>
                            <a class="dropdown-item" href="usuario_citas" id="mis_citas" style="color: blue;">
                                <i class="fas fa-calendar-alt"></i> Mis Citas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="cerrar-sesion" id="cerrar_sesion" style="color: red;">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <a class="btn btn-warning" id="nav-btn" href="login" role="button">Iniciar Sesión</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('click', function(event) {
        var dropdownMenu = document.getElementById('dropdownMenu');
        var userButton = document.getElementById('userButton');
        if (!userButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
</script>

<style>
    .dropdown-menu {
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 1000;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
    }

    .dropdown-item i {
        margin-right: 8px;
    }
</style>