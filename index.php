<?php
require_once("./app/config/dependencias.php");

session_start();
require_once("./app/config/rutas.php");
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once("./views/components/navbar.php") ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/offline-dependences/b5.css">
    <link rel="stylesheet" href="./public/css/navbar.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="./public/css/registro.css">
    <link rel="stylesheet" href="./public/css/inicio.css">
    <link rel="stylesheet" href="./public/css/contacto.css">
    <link rel="stylesheet" href="./public/css/servicios.css">
    <link rel="stylesheet" href="./public/css/citas.css">
    <link rel="stylesheet" href="./public/css/usuario.css">
    <link rel="stylesheet" href="./public/css/dt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/sweetAlert.js"></script>
    <script src="./public/js/dt.js"></script>
    <script src="./public/offline-dependences/b5.js"></script>
    <title>Clinica St. María</title>
</head>
<body>
    <?php require_once("./app/config/router.php") ?>
    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/cerrar_sesion.js"></script>
    <script src="./public/js/insertar_citas.js"></script>
    <?php if (basename($_SERVER['REQUEST_URI']) !== 'login' && basename($_SERVER['REQUEST_URI']) !== 'registro') : ?>
        <?php require_once("./views/components/footer.php") ?>
    <?php endif; ?>
</html>