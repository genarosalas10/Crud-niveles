
/* Creación de la base de datos */
CREATE DATABASE IF NOT EXISTS Minijuego DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE Minijuego;


/* Tabla niveles */
CREATE TABLE Niveles (
  idNivel tinyint UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descripcion varchar(200) NOT NULL,
  vida tinyint UNSIGNED NOT NULL,
  velocidad tinyint UNSIGNED NOT NULL,
  bolas tinyint UNSIGNED NOT NULL,
  audio varchar(250) NOT NULL
);
