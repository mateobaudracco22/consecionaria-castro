-- Eliminar base de datos si existe
-- Eliminar la base de datos si ya existe
DROP DATABASE IF EXISTS centromedico;

-- Crear la base de datos
CREATE DATABASE centromedico CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Usar la base de datos
USE centromedico;

-- Crear tabla Paciente
CREATE TABLE Paciente (
    id_paciente INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dni VARCHAR(20) NOT NULL UNIQUE,
    telefono VARCHAR(50),
    direccion VARCHAR(200),
    obra_social VARCHAR(100)
) ENGINE=InnoDB;

-- Crear tabla Turno
CREATE TABLE Turno (
    id_turno INT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    medico VARCHAR(100) NOT NULL,
    id_paciente INT,
    FOREIGN KEY (id_paciente) REFERENCES Paciente(id_paciente)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Insertar datos ficticios en Paciente
INSERT INTO Paciente (id_paciente, nombre, apellido, dni, telefono, direccion, obra_social) VALUES
(1, 'Ana', 'Pérez', '30111222', '341-555-1234', 'Calle Falsa 123', 'OSDE'),
(2, 'Juan', 'Gómez', '28999888', '341-555-5678', 'Av. Libertad 456', 'Swiss Medical'),
(3, 'Lucía', 'Martínez', '31123456', '341-555-9012', 'San Martín 789', 'IOMA'),
(4, 'Carlos', 'Rodríguez', '27654321', '341-555-3456', 'Mitre 321', 'OSDE'),
(5, 'María', 'López', '32123456', '341-555-7890', 'Belgrano 654', 'PAMI');

-- Insertar datos ficticios en Turno
INSERT INTO Turno (id_turno, fecha, hora, especialidad, medico, id_paciente) VALUES
(1001, '2025-11-05', '09:00:00', 'Clínica Médica', 'Dr. Fernández', 1),
(1002, '2025-11-05', '10:30:00', 'Cardiología', 'Dra. Suárez', 2),
(1003, '2025-11-06', '11:00:00', 'Pediatría', 'Dr. Gómez', 3),
(1004, '2025-11-06', '14:30:00', 'Dermatología', 'Dra. Ruiz', 4),
(1005, '2025-11-07', '16:00:00', 'Oftalmología', 'Dr. Morales', 5);

-- Verificar los datos insertados
SELECT * FROM Paciente;
SELECT * FROM Turno;
