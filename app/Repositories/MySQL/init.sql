CREATE DATABASE IF NOT EXISTS dataescolar;
USE dataescolar;

CREATE TABLE IF NOT EXISTS usuarios(
	id VARCHAR(255) PRIMARY KEY,
	nombre TEXT NOT NULL,
	apellido TEXT NOT NULL,
	cedula INT UNIQUE NOT NULL,
	clave TEXT NOT NULL,
	rol ENUM('Administrador', 'Director', 'Secretario', 'Profesor') NOT NULL,
	pregunta TEXT NOT NULL,
	respuesta TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Representantes(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombres VARCHAR(30) NOT NULL,
	apellidos VARCHAR(30) NOT NULL,
	cedula INT UNIQUE NOT NULL,
	genero TEXT NOT NULL,
	direccion TEXT NOT NULL,
	correo VARCHAR(50) NOT NULL UNIQUE,
	telefono VARCHAR(15)NOT NULL UNIQUE,
	estudio_socioeconomico TEXT NOT NULL,
	tipo_sangre VARCHAR(2) NOT NULL,
	ocupacion TEXT NOT NULL,
	lugar_trabajo TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Niveles(
	id INT PRIMARY KEY AUTO_INCREMENT,
	codigo VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS Areas(
	codigo INT PRIMARY KEY AUTO_INCREMENT,
	nombre text(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS Periodos(
	id INT PRIMARY KEY AUTO_INCREMENT,
	inicio INT UNIQUE NOT NULL,
	fin INT UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Lapsos(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL,
	inicio DATE NOT NULL,
	fin DATE NOT NULL,
	id_Periodo INT NOT NULL,
	FOREIGN KEY (id_Periodo) REFERENCES Periodos(id)
);

CREATE TABLE IF NOT EXISTS Estudiantes(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombres VARCHAR(20) NOT NULL,
	apellidos VARCHAR(30) NOT NULL,
	cedula INT UNIQUE NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	lugar_nacimiento DATE NOT NULL,
	edad INT(2) NOT NULL,
	genero VARCHAR(1) NOT NULL,
	tipo_parto TEXT NOT NULL,
	compromisos TEXT NOT NULL,
	medicamentos TEXT NOT NULL,
	tipo_sangre VARCHAR(2) NOT NULL,
	direccion TEXT NOT NULL,
	medidas TEXT NOT NULL,
	vacunas TEXT NOT NULL,
	programas_sociales TEXT NOT NULL,
	ingreso DATE NOT NULL,
	estatus VARCHAR(10) NOT NULL,
	descripcion TEXT NOT NULL,
	id_Representante INT NOT NULL,
	FOREIGN KEY (id_Representante) REFERENCES Representantes(id)
);

CREATE TABLE IF NOT EXISTS Profesores(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombres VARCHAR(25) NOT NULL,
	apellidos VARCHAR(30) NOT NULL,
	cedula INT UNIQUE NOT NULL,
	estatus VARCHAR(10) NOT NULL,
	especialidad text(100) NOT NULL,
	direccion text(80) NOT NULL,
	correo VARCHAR(50) NOT NULL UNIQUE,
	telefono VARCHAR(15) NOT NULL UNIQUE,
	fecha_ingreso date NOT NULL,
	fecha_nacimiento date NOT NULL,
	edad VARCHAR(2) NOT NULL,
	genero TEXT(1) NOT NULL,
	vacunas TEXT(100) NOT NULL,
	carga_horaria VARCHAR(20) NOT NULL,
	codigo_idependencia VARCHAR(20) NOT NULL,
	codigo_Area INT NOT NULL,
	FOREIGN KEY (codigo_Area) REFERENCES Areas(codigo)
);

CREATE TABLE IF NOT EXISTS Aulas(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL,
	id_Profesor INT NOT NULL,
	id_Estudiante INT NOT NULL,
	FOREIGN KEY (id_Profesor) REFERENCES Profesores(id),
	FOREIGN KEY (id_Estudiante) REFERENCES Estudiantes(id)
);

CREATE TABLE IF NOT EXISTS Informes(
	id INT PRIMARY KEY AUTO_INCREMENT,
	diagnostico TEXT NOT NULL,
	lapso1 TEXT NOT NULL,
	lapso2 TEXT NOT NULL,
	lapso3 TEXT NOT NULL,
	informes_final TEXT NOT NULL,
	id_Estudiante INT NOT NULL,
	id_Profesor INT NOT NULL,
	codigo_Area INT NOT NULL,
	id_Nivel INT NOT NULL,
	FOREIGN KEY (id_Estudiante) REFERENCES Estudiantes(id),
	FOREIGN KEY (id_Profesor) REFERENCES Profesores(id),
	FOREIGN KEY (codigo_Area) REFERENCES Areas(codigo),
	FOREIGN KEY (id_Nivel) REFERENCES Niveles(id)
);

CREATE TABLE IF NOT EXISTS Inscripciones(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_Estudiante INT NOT NULL,
	id_Periodo INT NOT NULL,
	id_Nivel INT NOT NULL,
	FOREIGN KEY (id_Estudiante) REFERENCES Estudiantes(id),
	FOREIGN KEY (id_Periodo) REFERENCES Periodos(id),
	FOREIGN KEY (id_Nivel) REFERENCES Niveles(id)
);
