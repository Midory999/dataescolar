CREATE TABLE IF NOT EXISTS usuarios (
	id VARCHAR(255) PRIMARY KEY,
	nombre TEXT NOT NULL,
	apellido TEXT NOT NULL,
	cedula INTEGER UNIQUE NOT NULL,
	clave TEXT NOT NULL,
	rol TEXT NOT NULL CHECK (rol IN ('Administrador', 'Director', 'Secretario', 'Profesor')),
	pregunta TEXT NOT NULL,
	respuesta TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Representantes(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nombres VARCHAR(30) NOT NULL,
	apellidos VARCHAR(30) NOT NULL,
	cedula INT UNIQUE NOT NULL,
	genero TEXT NOT NULL,
	direccion TEXT NOT NULL,
	correo VARCHAR(50) NOT NULL UNIQUE,
	telefono VARCHAR(15) NOT NULL UNIQUE,
	estudio_socioeconomico TEXT NOT NULL,
	tipo_sangre VARCHAR(2) NOT NULL,
	ocupacion TEXT NOT NULL,
	lugar_trabajo TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Niveles(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	codigo VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS Areas (
	codigo INTEGER PRIMARY KEY AUTOINCREMENT,
	nombre TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Periodos (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	inicio INTEGER UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Lapsos (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nombre TEXT NOT NULL,
	inicio DATE NOT NULL UNIQUE,
	fin DATE NOT NULL UNIQUE,
	id_periodo INTEGER NOT NULL,
	FOREIGN KEY (id_periodo) REFERENCES Periodos(id)
);

CREATE TABLE IF NOT EXISTS Estudiantes(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nombres VARCHAR(20) NOT NULL,
	apellidos VARCHAR(30) NOT NULL,
	cedula INT UNIQUE NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	lugar_nacimiento DATE NOT NULL,
	edad INTEGER NOT NULL,
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
	id_Representante INTEGER NOT NULL,
	FOREIGN KEY (id_Representante) REFERENCES Representantes(id)
);

CREATE TABLE IF NOT EXISTS Profesores(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nombres VARCHAR(25) NOT NULL,
	apellidos VARCHAR(30) NOT NULL,
	cedula INT UNIQUE NOT NULL,
	estatus VARCHAR(10) NOT NULL,
	especialidad text NOT NULL,
	direccion text NOT NULL UNIQUE,
	correo VARCHAR(50) NOT NULL UNIQUE,
	telefono VARCHAR(15) NOT NULL UNIQUE,
	fecha_ingreso date NOT NULL,
	fecha_nacimiento date NOT NULL,
	edad VARCHAR(2) NOT NULL,
	genero TEXT NOT NULL,
	vacunas TEXT NOT NULL,
	carga_horaria VARCHAR(20) NOT NULL,
	codigo_idependencia VARCHAR(20) NOT NULL,
	codigo_Area INTEGER NOT NULL,
	FOREIGN KEY (codigo_Area) REFERENCES Areas(codigo)
);

CREATE TABLE IF NOT EXISTS Aulas(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nombre TEXT NOT NULL,
	id_Profesor INTEGER NOT NULL,
	id_Estudiante INTEGER NOT NULL,
	FOREIGN KEY (id_Profesor) REFERENCES Profesores(id),
	FOREIGN KEY (id_Estudiante) REFERENCES Estudiantes(id)
);

CREATE TABLE IF NOT EXISTS Informes (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	diagnostico TEXT NOT NULL,
	lapso1 TEXT NOT NULL,
	lapso2 TEXT NOT NULL,
	lapso3 TEXT NOT NULL,
	informes_final TEXT NOT NULL,
	id_Estudiante INTEGER NOT NULL,
	id_Profesor INTEGER NOT NULL,
	codigo_Area INTEGER NOT NULL,
	id_Nivel INTEGER NOT NULL,
	FOREIGN KEY (id_Estudiante) REFERENCES Estudiantes(id),
	FOREIGN KEY (id_Profesor) REFERENCES Profesores(id),
	FOREIGN KEY (codigo_Area) REFERENCES Areas(codigo),
	FOREIGN KEY (id_Nivel) REFERENCES Niveles(id)
);

CREATE TABLE IF NOT EXISTS Inscripciones (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_estudiante INTEGER NOT NULL,
	id_periodo INTEGER NOT NULL,
	id_nivel INTEGER NOT NULL,
	FOREIGN KEY (id_estudiante) REFERENCES Estudiantes(id),
	FOREIGN KEY (id_periodo) REFERENCES Periodos(id),
	FOREIGN KEY (id_nivel) REFERENCES Niveles(id)
);

-- REGISTROS
INSERT INTO Areas(codigo, nombre) VALUES (1, 'Lenguaje'), (2, 'Cognitiva'),
(3, 'Motora'), (4, 'Moral y Espiritual'), (6, 'Comunicación'), (5, 'Afectiva');
