-- Tener en cuenta los esquemas de bases de datos para crear la base de datos
-- Entidades y atributos: 
-- Propietario 
-- o id_propietario (INT, PK) 
-- o nombre (VARCHAR) 
-- o apellido (VARCHAR) 
-- o dni (VARCHAR) 
-- o direccion (VARCHAR) 
-- o telefono (VARCHAR) 


--  Auto 
-- o id_auto (INT, PK) 
-- o patente (VARCHAR) 
-- o marca (VARCHAR) 
-- o modelo (VARCHAR) 
-- o año (YEAR) 
-- o color (VARCHAR) 
-- o id_propietario (INT, FK) 


-- ==========================================
-- ELIMINAR BASE DE DATOS SI YA EXISTE
-- ==========================================
DROP DATABASE IF EXISTS concesionaria;

-- ==========================================
-- CREAR BASE DE DATOS
-- ==========================================
CREATE DATABASE concesionaria CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- USAR BASE DE DATOS
USE concesionaria;

-- ==========================================
-- TABLA: Propietario
-- ==========================================
CREATE TABLE Propietario (
    id_propietario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dni VARCHAR(20) NOT NULL UNIQUE,
    direccion VARCHAR(150),
    telefono VARCHAR(50)
) ENGINE=InnoDB;

-- ==========================================
-- TABLA: Auto
-- ==========================================
CREATE TABLE Auto (
    id_auto INT PRIMARY KEY AUTO_INCREMENT,
    patente VARCHAR(20) NOT NULL UNIQUE,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    año YEAR NOT NULL,
    color VARCHAR(30),
    id_propietario INT,
    FOREIGN KEY (id_propietario) REFERENCES Propietario(id_propietario)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ==========================================
-- INSERTAR DATOS EN Propietario
-- ==========================================
INSERT INTO Propietario (nombre, apellido, dni, direccion, telefono)
VALUES
('Luis', 'Gómez', '30111222', 'Av. Libertad 123', '341-555-1111'),
('María', 'López', '28999888', 'Calle Mitre 456', '341-555-2222'),
('Carlos', 'Fernández', '31123456', 'San Martín 789', '341-555-3333'),
('Ana', 'Martínez', '27654321', 'Belgrano 321', '341-555-4444'),
('Sofía', 'Ruiz', '32123456', 'Rivadavia 654', '341-555-5555'),
('Pedro', 'Sánchez', '34567890', 'Italia 789', '341-555-6666'),
('Lucía', 'Castro', '33221100', 'España 210', '341-555-7777'),
('Javier', 'Morales', '29887766', 'Colón 98', '341-555-8888'),
('Elena', 'Ramírez', '31223344', 'San Juan 456', '341-555-9999'),
('Miguel', 'Torres', '30001122', 'Catamarca 100', '341-555-0000');

-- ==========================================
-- INSERTAR DATOS EN Auto
-- ==========================================
INSERT INTO Auto (patente, marca, modelo, año, color, id_propietario)
VALUES
('AB123CD', 'Toyota', 'Corolla', 2020, 'Blanco', 1),
('BC234DE', 'Ford', 'Fiesta', 2019, 'Rojo', 2),
('CD345EF', 'Chevrolet', 'Onix', 2021, 'Negro', 3),
('DE456FG', 'Renault', 'Kangoo', 2018, 'Gris', 4),
('EF567GH', 'Volkswagen', 'Gol', 2020, 'Azul', 5),
('FG678HI', 'Peugeot', '208', 2022, 'Negro', 6),
('GH789IJ', 'Honda', 'Civic', 2017, 'Plateado', 7),
('HI890JK', 'Nissan', 'Sentra', 2019, 'Blanco', 8),
('IJ901KL', 'Fiat', 'Cronos', 2023, 'Rojo', 9),
('JK012LM', 'Hyundai', 'Tucson', 2021, 'Gris', 10);

-- ==========================================
-- CONSULTAS DE VERIFICACIÓN
-- ==========================================
SELECT * FROM Propietario;
SELECT * FROM Auto;
