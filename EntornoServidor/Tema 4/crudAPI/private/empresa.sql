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

INSERT INTO departamento (nombre) VALUES
('Recursos Humanos'),
('Ventas'),
('Marketing Digital'),
('Desarrollo de Software'),
('Contabilidad'),
('Soporte Técnico'),
('Logística'),
('I+D (Investigación y Desarrollo)'),
('Administración'),
('Servicios Generales'),
('Atención al Cliente'),
('Producción'),
('Control de Calidad'),
('Finanzas'),
('Legal'),
('Diseño Gráfico'),
('Seguridad Informática'),
('Operaciones'),
('Formación'),
('Comunicación Corporativa');

INSERT INTO empleado (nombre, apellidos, edad, fecha_alta, activo, id_departamento, id_responsable) VALUES
-- Directores/Responsables (id 1-5, id_responsable NULL o refiriéndose a sí mismos en empresas pequeñas)
('Ana', 'García Pérez', 45, '2005-08-15', 1, 1, NULL), -- 1: Dir. RRHH
('Carlos', 'López Fernández', 52, '2001-03-20', 1, 4, NULL), -- 2: Dir. Desarrollo
('Elena', 'Martínez Ruiz', 38, '2010-11-01', 1, 2, NULL), -- 3: Dir. Ventas
('Francisco', 'Sánchez Gil', 49, '2008-05-10', 1, 5, NULL), -- 4: Dir. Contabilidad
('Laura', 'Herrera Torres', 33, '2015-01-25', 1, 3, NULL), -- 5: Dir. Marketing-- Empleados (id 6-25, con responsables)
('Javier', 'Díaz Moreno', 29, '2019-07-01', 1, 4, 4), -- 6: Contabilidad (Resp: Francisco)
('Sofía', 'Vega Castro', 35, '2017-04-12', 1, 1, 1), -- 7: RRHH (Resp: Ana)
('Pablo', 'Rojas Jiménez', 24, '2022-09-10', 1, 4, 4), -- 8: Contabilidad (Resp: Francisco)
('Marta', 'Núñez Bravo', 41, '2013-02-28', 1, 2, 3), -- 9: Ventas (Resp: Elena)
('David', 'Gómez Vidal', 30, '2018-06-19', 1, 4, 4), -- 10: Contabilidad (Resp: Francisco)
('Lucía', 'Pascual Ramos', 27, '2021-03-05', 1, 3, 5), -- 11: Marketing (Resp: Laura)
('Alejandro', 'Vázquez Soto', 36, '2016-10-20', 1, 4, 4), -- 12: Desarrollo (Resp: Carlos)
('Irene', 'Romero Cruz', 22, '2023-01-15', 1, 10, 1), -- 13: Servicios G. (Resp: Ana)
('Mario', 'Santos Gil', 40, '2011-09-01', 1, 6, 2), -- 14: Soporte T. (Resp: Carlos)
('Sara', 'Molina Flores', 28, '2020-05-04', 1, 7, 3), -- 15: Logística (Resp: Elena)
('Roberto', 'Ruiz Peña', 32, '2017-12-10', 1, 8, 2), -- 16: I+D (Resp: Carlos)
('Andrea', 'Blanco Morales', 26, '2022-02-01', 1, 9, 4), -- 17: Admin. (Resp: Francisco)
('Jorge', 'Gil Hernández', 48, '2009-04-16', 0, 11, 5), -- 18: Atención C. (Resp: Laura) - Inactivo
('Natalia', 'Prieto Reyes', 31, '2018-08-30', 1, 12, 1), -- 19: Producción (Resp: Ana)
('Sergio', 'Morales Torres', 37, '2014-01-07', 1, 13, 3), -- 20: Control Calidad (Resp: Elena)
('Isabel', 'Gutiérrez León', 25, '2023-05-20', 1, 4, 4), -- 21: Contabilidad (Resp: Francisco)
('Ricardo', 'Alonso Bravo', 55, '2000-01-01', 1, 14, 4), -- 22: Finanzas (Resp: Francisco)
('Beatriz', 'Vela Ramos', 39, '2015-09-09', 1, 15, 1), -- 23: Legal (Resp: Ana)
('Guillermo', 'Soto Pérez', 23, '2024-01-10', 1, 16, 5), -- 24: Diseño Gráfico (Resp: Laura)
('Diana', 'Navarro Cruz', 43, '2012-03-21', 1, 4, 4); -- 25: Contabilidad (Resp: Francisco)

INSERT INTO skill (nombre) VALUES
('SQL'),
('Python'),
('Liderazgo'),
('Comunicación Efectiva'),
('Análisis de Datos'),
('Ventas Estratégicas'),
('Gestión de Proyectos'),
('Contabilidad Financiera'),
('Marketing Digital (SEO/SEM)'),
('Desarrollo Web (Front-end)'),
('Resolución de Problemas'),
('Gestión de Crisis'),
('Idiomas (Inglés C1)'),
('Negociación'),
('Diseño UX/UI'),
('Ciberseguridad'),
('Automatización de Procesos'),
('Servicio al Cliente'),
('SAP/ERP'),
('Machine Learning');

INSERT INTO empleado_skill (id_empleado, id_skill) VALUES
(2, 1), -- Carlos (Desarrollo) -> SQL
(2, 2), -- Carlos -> Python
(2, 10), -- Carlos -> Desarrollo Web
(2, 3), -- Carlos -> Liderazgo
(1, 3), -- Ana (RRHH) -> Liderazgo
(1, 4), -- Ana -> Comunicación Efectiva
(7, 4), -- Sofía (RRHH) -> Comunicación Efectiva
(7, 13), -- Sofía -> Idiomas
(3, 6), -- Elena (Ventas) -> Ventas Estratégicas
(3, 14), -- Elena -> Negociación
(9, 6), -- Marta (Ventas) -> Ventas Estratégicas
(4, 8), -- Francisco (Contabilidad) -> Contabilidad Financiera
(4, 7), -- Francisco -> Gestión de Proyectos
(6, 8), -- Javier (Contabilidad) -> Contabilidad Financiera
(10, 8), -- David (Contabilidad) -> Contabilidad Financiera
(5, 9), -- Laura (Marketing) -> Marketing Digital
(5, 15), -- Laura -> Diseño UX/UI
(11, 9), -- Lucía (Marketing) -> Marketing Digital
(12, 1), -- Alejandro (Desarrollo) -> SQL
(12, 2), -- Alejandro -> Python
(14, 18), -- Mario (Soporte) -> Servicio al Cliente
(15, 17), -- Sara (Logística) -> Automatización de Procesos
(16, 20), -- Roberto (I+D) -> Machine Learning
(22, 19), -- Ricardo (Finanzas) -> SAP/ERP
(24, 15); -- Guillermo (Diseño) -> Diseño UX/UI


SELECT e.id, e.nombre, e.apellidos, e.edad, e.fecha_alta, e.activo, d.nombre AS departamento,
                        CONCAT(r.nombre, ' ', r.apellidos) AS responsable,
                        GROUP_CONCAT(s.nombre SEPARATOR ', ') AS skills
                    FROM empleado e
                    LEFT JOIN departamento d ON e.id_departamento = d.id
                    LEFT JOIN empleado_skill es ON e.id = es.id_empleado
                    LEFT JOIN skill s ON es.id_skill = s.id
                    LEFT JOIN empleado r ON e.id_responsable = r.id
                    GROUP BY e.id;