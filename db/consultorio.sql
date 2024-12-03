CREATE DATABASE IF NOT EXISTS consultorio;

USE consultorio;

CREATE TABLE t_usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellidoPaterno VARCHAR(50) NOT NULL,
    apellidoMaterno VARCHAR(50),
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE t_citas (
    id INT NOT NULL AUTO_INCREMENT,        
    nombre VARCHAR(100),            
    direccion VARCHAR(255),         
    telefono VARCHAR(15),           
    fecha DATE NOT NULL,                    
    departamento VARCHAR(100),      
    doctor VARCHAR(100),           
    motivo TEXT NOT NULL,                   
    PRIMARY KEY (id)                        
); 

