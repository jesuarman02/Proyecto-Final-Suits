<?php
    require_once '../config/conexion.php';
    class citas extends Conexion{
        public function obtener_datos(){
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_citas");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $this->cerrar_conexion();
            echo json_encode($datos);
        }
        public function obtener_cita_usuario() {
            session_start();
            $id_usuario = $_SESSION['usuario']['id']; 
    
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_citas WHERE id = :id ORDER BY fecha DESC LIMIT 1");
            $consulta->bindParam(':id', $id_usuario);
            $consulta->execute();
            $cita = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->cerrar_conexion();
    
            if ($cita) {
                echo json_encode([1, $cita]); 
            } else {
                echo json_encode([0, "No hay citas programadas"]);
            }
        }
    
        public function insertar_datos(){
            $insercion = $this->obtener_conexion()->prepare("INSERT INTO t_citas(nombre, direccion, telefono, fecha, departamento, doctor, motivo) VALUES(:nombre, :direccion, :telefono, :fecha, :departamento, :doctor, :motivo)");
            $nombre = $_POST['nombre'];	
            $direccion = $_POST['direccion'];	
            $telefono = $_POST['telefono'];
            $fecha = $_POST['fecha'];
            $departamento = $_POST['departamento'];
            $doctor = $_POST['doctor'];
            $motivo = $_POST['motivo'];
            $insercion->bindParam(':nombre',$nombre);
            $insercion->bindParam(':direccion',$direccion);
            $insercion->bindParam(':telefono',$telefono);
            $insercion->bindParam(':fecha',$fecha);
            $insercion->bindParam(':departamento',$departamento);
            $insercion->bindParam(':doctor',$doctor);
            $insercion->bindParam(':motivo',$motivo);
            $insercion->execute();
            if($insercion){
                echo json_encode([1,"Insercion correcta"]);
            }else{
                echo json_encode([0,"insercion no realizada"]);
            }
        }
        
        public function actualizar_datos(){
            $actualizacion = $this->obtener_conexion()->prepare("UPDATE t_citas SET nombre = :nombre, direccion = :direccion, telefono = :telefono, fecha = :fecha, departamento = :departamento, doctor = :doctor, motivo = :motivo WHERE id = :id");
            
            $nombre = $_POST['nombre'];	
            $direccion = $_POST['direccion'];	
            $telefono = $_POST['telefono'];
            $fecha = $_POST['fecha'];
            $departamento = $_POST['departamento'];
            $doctor = $_POST['doctor'];
            $motivo = $_POST['motivo'];
            $id = $_POST['id'];
            
            $actualizacion->bindParam(':nombre', $nombre);
            $actualizacion->bindParam(':direccion', $direccion);
            $actualizacion->bindParam(':telefono', $telefono);
            $actualizacion->bindParam(':fecha', $fecha);
            $actualizacion->bindParam(':departamento', $departamento);
            $actualizacion->bindParam(':doctor', $doctor);
            $actualizacion->bindParam(':motivo', $motivo);
            $actualizacion->bindParam(':id', $id);
            
            if($actualizacion->execute()){
                echo json_encode([1, "Actualización correcta", $id]);
            } else {
                echo json_encode([0, "Actualización no realizada"]);
            }
        }
        

        public function eliminar_datos(){
            $eliminar = $this->obtener_conexion()->prepare("DELETE FROM t_citas WHERE id = :id");
            $id = $_POST['id'];
            
            $eliminar->bindParam(':id', $id);
            $eliminar->execute();
            
            if($eliminar){
                echo json_encode([1, "Eliminación correcta"]);
            } else {
                echo json_encode([0, "Eliminación no realizada"]);
            }
        }
        
        public function precargar_datos(){
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_citas WHERE id = :id");
            $id = $_POST['id'];
            
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            echo json_encode($datos);
        }
        
    }

    $consulta = new citas();
    $metodo = $_POST['metodo'];
    $consulta->$metodo();
    
    ?>