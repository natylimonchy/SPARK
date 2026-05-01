/*
Natalia Amaya, Gerson Paredes, Abril Graña
5/12/2025
Se crea la base de datos Spark con tres tablas. Usuario almacena la información de cada usuario y permite identificar su organizador mediante una relación consigo misma. 
Evento guarda los datos de cada evento y Asisten actúa como tabla intermedia registrando qué usuarios participan en cada evento.
 */

CREATE DATABASE spark;
USE spark;

-- Primero creamos perfiles porque Usuario depende de ella
CREATE TABLE perfiles (
    id_perfil INT PRIMARY KEY AUTO_INCREMENT,
    nombre_perfil VARCHAR(50)
);

-- Ahora sí podemos crear Usuario
CREATE TABLE Usuario (
    Nombre_Usuario VARCHAR(50) PRIMARY KEY,
    Telefono INT UNIQUE,
    Contraseña VARCHAR(20),
    Nombre_Apellido VARCHAR(50),
    Correo VARCHAR(100) UNIQUE,
    Direccion VARCHAR(50),
    Id_organizador VARCHAR(50),
    id_perfil INT,

    CONSTRAINT fk_organizador 
    FOREIGN KEY (Id_organizador) 
    REFERENCES Usuario(Nombre_Usuario),

    CONSTRAINT fk_usuario_perfil
    FOREIGN KEY (id_perfil)
    REFERENCES perfiles(id_perfil)
);

CREATE TABLE Evento (
    Id_Evento INT AUTO_INCREMENT PRIMARY KEY,
    Descripcion VARCHAR(100),
    Fecha_evento DATE,
    Ubicacion VARCHAR(50)
);

CREATE TABLE Asisten (
    Id_Asistencia INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Usuario VARCHAR(50),
    Id_Evento INT,

    CONSTRAINT fk_asisten_usuario
    FOREIGN KEY (Nombre_Usuario) REFERENCES Usuario(Nombre_Usuario),

    CONSTRAINT fk_asisten_evento
    FOREIGN KEY (Id_Evento) REFERENCES Evento(Id_Evento)
);

-- Correcciones con ALTER TABLE
ALTER TABLE Usuario MODIFY Contraseña VARCHAR(255);
ALTER TABLE Usuario MODIFY Telefono VARCHAR(15);
ALTER TABLE Usuario ADD COLUMN Imagen VARCHAR(255);

-- Insert de los tipos de perfiles 
INSERT INTO perfiles (id_perfil, nombre_perfil) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Gerente');




/* */