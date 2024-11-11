## Tablas

``` SQL
CREATE TABLE oficinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    mapa VARCHAR(500) NOT NULL,
    calle VARCHAR(255) NOT NULL,
    cod_postal VARCHAR(10) NOT NULL,
    horario VARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE cuentas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    numero_cuenta VARCHAR(20) UNIQUE NOT NULL,
    saldo DECIMAL(10, 2) DEFAULT 0.00,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
);
```

## Inserts

``` SQL
INSERT INTO clientes (nombre, contrasena) VALUES ('admin', 'admin');

INSERT INTO oficinas (nombre, mapa, calle, cod_postal, horario) 
VALUES ('Oficina de Correos', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.5185116179914!2d-3.709435611144985!3d40.419516099999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42286327dedec1%3A0x3ac1be9c235bc592!2sOficina%20de%20Correos!5e0!3m2!1ses!2ses!4v1730292494664!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 'Pl. del Callao, 2, 8ª Planta, Centro Madrid', '28013', '10:00–22:00');

INSERT INTO cuentas (cliente_id, numero_cuenta, saldo) VALUES (1, '1234567890', 500.00);
INSERT INTO cuentas (cliente_id, numero_cuenta, saldo) VALUES (1, '0987654321', 250.00);
```

## BBDD

> Host: sql7.freesqldatabase.com
> Database name: sql7744137
> Database user: sql7744137
> Database password: meKvU4kasn
> Port number: 3306