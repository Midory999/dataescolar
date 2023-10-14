CREATE TABLE IF NOT EXISTS usuarios (
	id VARCHAR(255) PRIMARY KEY,
	nombre TEXT NOT NULL,
	apellido TEXT NOT NULL,
	cedula INT UNIQUE NOT NULL,
	clave TEXT NOT NULL,
	rol ENUM('Administrador', 'Director', 'Secretario', 'Profesor') NOT NULL,
	pregunta TEXT NOT NULL,
	respuesta TEXT NOT NULL
);
