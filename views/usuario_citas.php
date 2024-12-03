<?php

$mysqli = new mysqli("localhost", "root", "", "consultorio");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

if (isset($_GET['action']) && $_GET['action'] === 'cancelar' && isset($_GET['id'])) {
    $citaId = $_GET['id'];
    $sql = "DELETE FROM t_citas WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $citaId); 
    if ($stmt->execute()) {
        $mensaje = "Cita cancelada con éxito.";
    } else {
        $mensaje = "Error al cancelar la cita: " . $stmt->error; 
    }

    $stmt->close();
}

if (isset($_SESSION['usuario'])) {
    $usuarioId = $_SESSION['usuario']['nombre']; 
    
    $sql = "SELECT * FROM t_citas WHERE nombre = ?"; 
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $usuarioId); 

    $stmt->execute();
    $result = $stmt->get_result();
    
    $citas = $result->fetch_all(MYSQLI_ASSOC);
    
    if (empty($citas)) {
        $mensaje = "No tienes citas registradas.";
    }
    
    $stmt->close();
}

$mysqli->close();
?>

<style>
    #usuario-citas-container {
        margin-top: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.2em;
        color: #333;
    }

    .card-text {
        margin: 5px 0;
        color: #555;
    }

    #usuario-cita-title {
        margin-bottom: 15px;
        color: #007bff;
        text-align: center;
    }
</style>

<div class="container" id="usuario-citas-container">
    <h2 id="usuario-cita-title">Mis Citas</h2>
    
    <?php if (isset($mensaje)): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <?php foreach ($citas as $cita): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Cita asignada a <?php echo htmlspecialchars($cita['doctor']); ?></h5>
                <p class="card-text"><strong>Paciente:</strong> <?php echo htmlspecialchars($cita['nombre']); ?></p>
                <p class="card-text"><strong>Departamento:</strong> <?php echo htmlspecialchars($cita['departamento']); ?></p>
                <p class="card-text"><strong>Motivo:</strong> <?php echo htmlspecialchars($cita['motivo']); ?></p>
                <a href="?action=cancelar&id=<?php echo $cita['id']; ?>" class="btn btn-danger">Cancelar Cita</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>