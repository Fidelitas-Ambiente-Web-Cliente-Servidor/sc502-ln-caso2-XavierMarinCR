/* Aplicación Sistema de Inscripción de Talleres    
Autor de BD: Xavier Antonio Marín Araya
Curso Ambiente Web Cliente Seridor SC-502
*/

DROP DATABASE IF EXISTS sistema_inscripcion_talleres;

-- Creación de la base de datos
CREATE DATABASE sistema_inscripcion_talleres;

-- Selección de la BD sistema_inscripcion_talleres
USE sistema_inscripcion_talleres;


CREATE TABLE roles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

-- creación de tablas
CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    id_rol INT NOT NULL,

    CONSTRAINT usuarios_roles_fk FOREIGN KEY (id_rol) REFERENCES roles(id)
);

CREATE TABLE talleres(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cupo INT NOT NULL
);

CREATE TABLE solicitudes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_taller INT NOT NULL,
    estado ENUM('pendiente', 'aprobada', 'rechazada') NOT NULL DEFAULT 'pendiente',

    CONSTRAINT solicitudes_usuarios_fk FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    CONSTRAINT solicitudes_talleres_fk FOREIGN KEY (id_taller) REFERENCES talleres(id),
    CONSTRAINT solicitudes_unicas UNIQUE (id_usuario, id_taller)
);

INSERT INTO roles (nombre)
VALUES
('Administrador'),
('Usuario');

INSERT INTO usuarios (nombre, correo, password, id_rol)
VALUES
('Administrador', 'admin@correo.com', '$2y$10$xB6vJF2SyYftWVjMTn07AuminWi/mZK7bbgDGm2U9YXSjSddbNcGe', 1);

INSERT INTO talleres (nombre, cupo)
VALUES
('Angular', 3),
('PHP', 2),
('Laravel', 1);

