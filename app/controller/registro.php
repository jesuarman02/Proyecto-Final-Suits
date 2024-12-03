<?php
    require_once '../config/conexion.php';
    class Registro extends Conexion{
        public function iniciar_registro(){
            $nombre = $_POST['nombre'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_usuarios WHERE email = :email");
            $consulta->bindParam(":email",$email);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            if(!$datos){
                $insercion = $this->obtener_conexion()->prepare("INSERT INTO t_usuarios (nombre, apellidoPaterno, apellidoMaterno, direccion, telefono, email, password) VALUES(:nombre, :apellidoPaterno, :apellidoMaterno, :direccion, :telefono, :email, :password)");
                $insercion->bindParam(":nombre",$nombre);
                $insercion->bindParam(':apellidoPaterno', $apellidoPaterno);
                $insercion->bindParam(':apellidoMaterno', $apellidoMaterno);
                $insercion->bindParam(':direccion', $direccion);
                $insercion->bindParam(':telefono', $telefono);
                $insercion->bindParam(':email', $email);
                $pass = password_hash($password,PASSWORD_BCRYPT);
                $insercion->bindParam(":password",$pass);
                if($insercion->execute()){
                    echo json_encode([1,"Usuario registrado con exito!"]);
                }else{
                    echo json_encode([0,"Error en credenciales de acceso!"]);
                }
            }else{
                echo json_encode([0,"Error usuario ya registrado!"]);
            }
        }
    }
    $consulta = new Registro();
    $metodo = $_POST['metodo'];
    $consulta->$metodo();
?>