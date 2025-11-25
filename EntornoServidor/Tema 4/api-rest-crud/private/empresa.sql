-- Active: 1729623565698@@127.0.0.1@3306@empresa
CREATE DATABASE IF NOT EXISTS empresa
	DEFAULT CHARACTER SET utf8mb4
	COLLATE utf8mb4_unicode_ci;
USE empresa;

CREATE TABLE IF NOT EXISTS departamento (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS empleado (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(30) NOT NULL,
	apellidos VARCHAR(50) NOT NULL,
	edad INT,
	fecha_alta DATE,
	activo TINYINT(1) DEFAULT 1,
	id_departamento INT,
	id_responsable INT,
	PRIMARY KEY (id),
	CONSTRAINT fk_empleado_departamento FOREIGN KEY (id_departamento) REFERENCES departamento(id) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_empleado_responsable FOREIGN KEY (id_responsable) REFERENCES empleado(id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS skill (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS empleado_skill (
	id_empleado INT NOT NULL,
	id_skill INT NOT NULL,
	PRIMARY KEY (id_empleado, id_skill),
	CONSTRAINT fk_es_empleado FOREIGN KEY (id_empleado) REFERENCES empleado(id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_es_skill FOREIGN KEY (id_skill) REFERENCES skill(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;