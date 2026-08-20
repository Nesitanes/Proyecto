-- **************************************************
-- Base de datos: Medicatec
-- Sistema de gestión de clínica médica
-- **************************************************

CREATE DATABASE IF NOT EXISTS medicatec;
USE medicatec;

-- **************************************************
-- Tabla: Usuarios
-- Contiene a todas las personas registradas en el sistema
-- Divide los registros según 4 roles
-- Todo usuario debe crear una cuenta
-- **************************************************

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    nombres VARCHAR(100) NOT NULL, 
    apellidos VARCHAR(100) NOT NULL,  
    documento VARCHAR(20) NOT NULL UNIQUE, -- DUI
    fecha_nacimiento DATE NOT NULL, 
    telefono VARCHAR(20), 
    direccion varchar(255), 
    contacto_emergencia_nombre VARCHAR(100), 
    contacto_emergencia_telefono VARCHAR(20), 
    genero ENUM ('masculino', 'femenino', 'otro', 'prefiero no decirlo'), -- opcional
    correo VARCHAR(100) NOT NULL UNIQUE, 
    contrasena VARCHAR(255) NOT NULL, -- se guardará como hash
    rol ENUM ('administrador', 'recepcionista', 'medico', 'paciente') NOT NULL DEFAULT 'paciente', -- Por defecto sera Paciente
    activo BOOLEAN NOT NULL DEFAULT TRUE, -- los registros no se eliminaran por completo, solo se desactivarán
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP -- guarda fecha y hora 2026-08-18 14:32:07
);


-- **************************************************
-- Tabla: Pacientes
-- Extiende la tabla usuarios con datos más específicos de los pacientes
-- **************************************************

CREATE TABLE pacientes (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    usuario_id INT NOT NULL UNIQUE, 
    altura DECIMAL(5,2), -- en cm, ejemplo 170.05 cm
    peso DECIMAL(5,2), -- en kg, ejemplo 70.50 kg
    tipo_sangre ENUM ('O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'), 
    CONSTRAINT fk_paciente_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- **************************************************
-- Tabla: Médicos
-- Extiende la tabla usuarios con datos más específicos de los médicos
-- **************************************************
CREATE TABLE medicos (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    usuario_id INT NOT NULL UNIQUE,
    especialidad VARCHAR(100) NOT NULL,
    CONSTRAINT fk_medico_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- **************************************************
-- Tabla: Horarios Disponibles
-- **************************************************

CREATE TABLE horario_disponible (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    medico_id INT NOT NULL, 
    dia_semana ENUM ('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo') NOT NULL,
    hora_inicio TIME NOT NULL, 
    hora_fin TIME NOT NULL, 
    CONSTRAINT fk_horario_medico FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

-- Esta tabla podría contener multiples registros por médico según en qué días y horarios está disponible

-- **************************************************
-- Tabla: Citas
-- **************************************************

CREATE TABLE citas (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    paciente_id INT NOT NULL, 
    medico_id INT NOT NULL, 
    registrada_por INT NOT NULL, -- Indica quién creo la cita (si fue un recepcionista o el propio paciente)
    fecha DATE NOT NULL, 
    hora TIME NOT NULL, 
    estado ENUM('pendiente', 'confirmada', 'cancelada', 'atendida') NOT NULL DEFAULT 'pendiente', -- Por defecto estará pendiente
    CONSTRAINT fk_cita_paciente FOREIGN KEY (paciente_id) REFERENCES pacientes(id), 
    CONSTRAINT fk_cita_medico FOREIGN KEY (medico_id) REFERENCES medicos(id), 
    CONSTRAINT fk_cita_usuario FOREIGN KEY (registrada_por) REFERENCES usuarios(id),
    UNIQUE KEY uq_medico_horario (medico_id, fecha, hora) -- Evitamos que haya una doble reserva del mismo medico en el mismo horario
);


-- **************************************************
-- Tabla: Historial Clínico
-- Conecta con tabla citas porque esa ya tiene los id de médicos y pacientes y la fecha de la cita
-- **************************************************

CREATE TABLE historial_clínico (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    cita_id INT NOT NULL, 
    motivo_consulta TEXT, 
    diagnostico TEXT, 
    medicado BOOLEAN NOT NULL DEFAULT FALSE, 
    tratamiento TEXT, 
    CONSTRAINT fk_historial_cita FOREIGN KEY (cita_id) REFERENCES citas(id)
);


-- **************************************************
-- Tabla: Avisos
-- Los pacientes no tendrán acceso
-- **************************************************

CREATE TABLE avisos (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    titulo VARCHAR(150) NOT NULL, 
    contenido TEXT NOT NULL, 
    fecha_publicacion DATE NOT NULL DEFAULT (CURRENT_DATE), -- guarda solo fecha 2026-08-18
    publicado_por INT NOT NULL, 
    CONSTRAINT fk_aviso_usuario FOREIGN KEY (publicado_por) REFERENCES usuarios(id)
);

-- **************************************************
-- Tabla: Mensajes
-- Para un chat interno entre el personal
-- **************************************************

CREATE TABLE mensajes (
	id INT AUTO_INCREMENT PRIMARY KEY, 
    emisor_id INT NOT NULL,
    receptor_id INT NOT NULL, 
    contenido TEXT NOT NULL, 
    fecha_envio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    leido BOOLEAN NOT NULL DEFAULT FALSE, 
    CONSTRAINT fk_mensaje_emisor FOREIGN KEY (emisor_id) REFERENCES usuarios(id), 
    CONSTRAINT fk_mensaje_receptor FOREIGN KEY (receptor_id) REFERENCES usuarios(id)
);



