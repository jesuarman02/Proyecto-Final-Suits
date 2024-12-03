<?php 
    if(isset($_REQUEST['view'])){
        $vista = $_REQUEST['view'];
        } else {
            $vista = "inicio";
        }
    switch ($vista) {
        case "inicio":{
            require_once './views/inicio.php';       
            break;
        }
        case "contacto":{
            require_once './views/contacto.php';       
            break;
        }
        case "servicios":{
            require_once './views/servicios.php';       
            break;
        }
        case "login":{
            require_once './views/login.php';       
            break;
        }
        case "registro":{
            require_once './views/registro.php';       
            break;
        }
        case "citas":{
            require_once './views/citas.php';       
            break;
        }
        case "usuario_citas":{
            require_once './views/usuario_citas.php';       
            break;
        }
        case "administrador":{
            require_once './views/administrador.php';       
            break;
        }
        default:{
            require_once './views/error404.php';
            break;
        }
    }
    ?>