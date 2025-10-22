-- Crear la base de datos (opcional)
CREATE DATABASE IF NOT EXISTS tienda;

USE tienda;

-- Crear la tabla de productos
CREATE TABLE if not exists productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    categoria VARCHAR(50),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    url_img VARCHAR(255)
);

-- Insertar algunos registros de ejemplo
INSERT INTO
    productos (
        nombre,
        descripcion,
        precio,
        stock,
        categoria,
        url_img
    )
VALUES (
        'Portátil Lenovo',
        'Portátil 15" con 8GB RAM y 512GB SSD',
        750.00,
        10,
        'Informática',
        'img/portatil.jpeg'
    ),
    (
        'Ratón inalámbrico',
        'Ratón óptico inalámbrico USB',
        20.50,
        50,
        'Accesorios',
        'img/raton.jpeg'
    ),
    (
        'Auriculares Bluetooth',
        'Auriculares con micrófono integrado',
        35.99,
        30,
        'Audio',
        'img/auriculares.jpg'
    ),
    (
        'Teclado mecánico',
        'Teclado mecánico retroiluminado',
        80.00,
        15,
        'Accesorios',
        'img/teclado.jpeg'
    ),
    (
        'Monitor Samsung 24"',
        'Monitor Full HD 24 pulgadas',
        120.00,
        12,
        'Informática',
        'img/monitor.jpeg'
    );

TRUNCATE TABLE productos;

UPDATE productos
SET
    url_img = 'Views/img/portatil.jpeg'
WHERE
    nombre = 'Portátil Lenovo';

UPDATE productos
SET
    url_img = 'Views/img/raton.jpeg'
WHERE
    nombre = 'Ratón inalámbrico';

UPDATE productos
SET
    url_img = 'Views/img/auriculares.jpg'
WHERE
    nombre = 'Auriculares Bluetooth';

UPDATE productos
SET
    url_img = 'Views/img/teclado.jpeg'
WHERE
    nombre = 'Teclado mecánico';

UPDATE productos
SET
    url_img = 'Views/img/monitor.jpeg'
WHERE
    nombre = 'Monitor Samsung 24"';