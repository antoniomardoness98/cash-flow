CREATE DATABASE IF NOT EXISTS cashflow_db COLLATE utf8_spanish_ci;

USE cashflow_db;

CREATE TABLE usuarios (
    usuario_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    usuario_rol INT NOT NULL,
    usuario_is_admin TINYINT(1),  /* 1: afirmación, 0:normal */
    usuario_nombre VARCHAR(255) NOT NULL,
    usuario_apellido VARCHAR(255) NOT NULL,
    usuario_email VARCHAR(255) NOT NULL,
    usuario_contrasena VARCHAR(255) NOT NULL,
    PRIMARY KEY(usuario_id)
);

CREATE TABLE negocios (
    negocio_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    negocio_nombre VARCHAR(255) NOT NULL,
    negocio_creacion TIMESTAMP NOT NULL,
    PRIMARY KEY(negocio_id)
);

CREATE TABLE registros_usuarios (
    registro_usuario_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    registro_usuario_descripcion VARCHAR(255) NOT NULL,
    registro_usuario_creacion TIMESTAMP NOT NULL,
    usuario_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(registro_usuario_id),
    CONSTRAINT fk_registros_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(usuario_id)
);

CREATE TABLE transacciones (
    transaccion_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    transaccion_fecha DATE NOT NULL,
    transaccion_creacion TIMESTAMP NOT NULL,
    transaccion_descripcion VARCHAR(255) NOT NULL,
    transaccion_monto INT NOT NULL,
    transaccion_tipo TINYINT(1) NOT NULL, /* GASTO: 0, INGRESO: 1 */
    negocio_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(transaccion_id),
    CONSTRAINT fk_transacciones_negocio FOREIGN KEY(negocio_id) REFERENCES negocios(negocio_id)
);

CREATE TABLE acceso_usuarios (
    acceso_usuarios_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    negocio_id INT UNSIGNED NOT NULL,
    usuario_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(acceso_usuarios_id),
    CONSTRAINT fk_acceso_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(usuario_id),
    CONSTRAINT fk_acceso_negocios FOREIGN KEY(negocio_id) REFERENCES negocios(negocio_id)
);