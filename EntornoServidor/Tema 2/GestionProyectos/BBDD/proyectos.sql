-- Active: 1729623565698@@127.0.0.1@3306
CREATE DATABASE IF NOT EXISTS Proyectos;

USE Proyectos;

CREATE TABLE proyectos (
    Nombre VARCHAR(100) PRIMARY KEY,
    Descripcion TEXT,
    Tipo VARCHAR(50),
    Tecnologias TEXT,
    Estado VARCHAR(50)
);

INSERT INTO proyectos (Nombre, Descripcion, Tipo, Tecnologias, Estado) VALUES
('Intranet Corporativa', 
 'Desarrollo de una intranet para centralizar documentos internos, comunicados y herramientas de gestión del personal', 
 'Proyecto interno', 
 '["PHP", "Laravel", "MySQL", "Bootstrap"]', 
 'En progreso'),

('Portal del Cliente - Consultoría Alfa', 
 'Plataforma web personalizada para la gestión de incidencias y seguimiento de proyectos para un cliente externo', 
 'Consultoría', 
 '["PHP", "Symfony", "MariaDB", "Tailwind CSS"]', 
 'En progreso'),

('Gestor de Formación Continua', 
 'Aplicación para el departamento de RRHH que permite planificar, inscribir y evaluar cursos de formación interna', 
 'Proyecto interno', 
 '["PHP", "Laravel", "PostgreSQL", "Vue.js"]', 
 'Bloqueado'),

('Evaluación del Desempeño', 
 'Aplicación web para gestionar las evaluaciones anuales del personal, con informes automáticos y exportación de resultados', 
 'Iniciativa RRHH', 
 '["PHP", "Laravel", "MySQL", "Chart.js"]', 
 'Finalizado'),

('Sistema de Control de Accesos', 
 'Herramienta web para registrar y monitorizar accesos físicos y digitales de empleados, integrada con la base de datos corporativa', 
 'Proyecto interno', 
 '["PHP", "CodeIgniter", "MySQL", "JQuery"]', 
 'Pendiente');