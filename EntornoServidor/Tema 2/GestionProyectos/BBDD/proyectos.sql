-- Active: 1729623565698@@127.0.0.1@3306
CREATE DATABASE IF NOT EXISTS Proyectos;

CREATE TABLE proyectos (
    Nombre VARCHAR(100) PRIMARY KEY,
    Descripcion TEXT,
    Tipo VARCHAR(50),
    Tecnologias TEXT,
    Estado VARCHAR(50)
);