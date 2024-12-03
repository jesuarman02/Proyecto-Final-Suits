<?php
    
    require_once '../config/conexion.php';
    session_start();

    class Login extends Conexion{
        private function crear_sesion($datos){
            $_SESSION['email'] = $datos;            
        }
        public function cerrar_sesion(){
            session_unset();
            session_destroy();
            echo json_encode([1,"Sesion finalizada!"]);
        }
        public function iniciar_sesion(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($email == "admin@email.com" && $password == "root") {
                $_SESSION['usuario'] = [
                    'email' => $email,
                    'role' => 'admin'  // Puedes agregar un campo role o algo similar si necesitas manejar roles.
                ];
                echo json_encode([1, "Sesion iniciada! Redirigiendo a administrador."]);
                return;
            }
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_usuarios WHERE email = :email");
            $consulta->bindParam(":email",$email);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            if($datos){
                if(password_verify($password,$datos['password'])){
                   $this->crear_sesion($datos);
                   $_SESSION['usuario'] = $datos;
                    echo json_encode([1,"Sesion iniciada!"]);
                }else{
                    echo json_encode([0,"Error en credenciales de acceso!"]);
                }
            }else{
                echo json_encode([0,"Error al buscar informacion!"]);
            }
        }
    }

    $consulta = new Login();
    $metodo = $_POST['metodo'];
    $consulta->$metodo();
?>