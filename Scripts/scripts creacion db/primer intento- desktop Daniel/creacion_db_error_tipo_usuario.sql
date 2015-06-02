-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Hidden_bird
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Hidden_bird
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Hidden_bird` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Hidden_bird` ;

-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_usuario` (
  `idTipo_usuario` INT NOT NULL,
  `Tipo` VARCHAR(45) NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_usuario`),
  UNIQUE INDEX `Tipo_UNIQUE` (`Tipo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NULL,
  `Sexo` VARCHAR(45) BINARY NOT NULL,
  `Fecha_Nacimiento` VARCHAR(45) NULL,
  `Direccion` VARCHAR(45) NULL,
  `Tipo_usuario_idTipo_usuario` INT NOT NULL,
  `admin` INT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idPersona`, `Tipo_usuario_idTipo_usuario`),
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC),
  INDEX `fk_Persona_Tipo_usuario1_idx` (`Tipo_usuario_idTipo_usuario` ASC),
  CONSTRAINT `fk_Persona_Tipo_usuario1`
    FOREIGN KEY (`Tipo_usuario_idTipo_usuario`)
    REFERENCES `Hidden_bird`.`Tipo_usuario` (`idTipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Clase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Clase` (
  `idClase` INT NOT NULL,
  `Clase` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idClase`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Orden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Orden` (
  `idOrden` INT NOT NULL,
  `Orden` VARCHAR(45) NULL,
  `Clase_idClase` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idOrden`, `Clase_idClase`),
  INDEX `fk_Orden_Clase1_idx` (`Clase_idClase` ASC),
  CONSTRAINT `fk_Orden_Clase1`
    FOREIGN KEY (`Clase_idClase`)
    REFERENCES `Hidden_bird`.`Clase` (`idClase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Suborden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Suborden` (
  `idSuborden` INT NOT NULL,
  `Suborden` VARCHAR(60) NOT NULL,
  `Orden_idOrden` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idSuborden`, `Orden_idOrden`),
  UNIQUE INDEX `Suborden_UNIQUE` (`Suborden` ASC),
  INDEX `fk_Suborden_Orden1_idx` (`Orden_idOrden` ASC),
  CONSTRAINT `fk_Suborden_Orden1`
    FOREIGN KEY (`Orden_idOrden`)
    REFERENCES `Hidden_bird`.`Orden` (`idOrden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Familia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Familia` (
  `idFamilia` INT NULL,
  `Familia` VARCHAR(45) NOT NULL,
  `Suborden_idSuborden` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idFamilia`, `Suborden_idSuborden`),
  UNIQUE INDEX `Familia_UNIQUE` (`Familia` ASC),
  INDEX `fk_Familia_Suborden1_idx` (`Suborden_idSuborden` ASC),
  CONSTRAINT `fk_Familia_Suborden1`
    FOREIGN KEY (`Suborden_idSuborden`)
    REFERENCES `Hidden_bird`.`Suborden` (`idSuborden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Genero` (
  `idGenero` INT NOT NULL AUTO_INCREMENT,
  `Genero` VARCHAR(45) NOT NULL,
  `Familia_idFamilia` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idGenero`, `Familia_idFamilia`),
  UNIQUE INDEX `Genero_UNIQUE` (`Genero` ASC),
  INDEX `fk_Genero_Familia1_idx` (`Familia_idFamilia` ASC),
  CONSTRAINT `fk_Genero_Familia1`
    FOREIGN KEY (`Familia_idFamilia`)
    REFERENCES `Hidden_bird`.`Familia` (`idFamilia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Forma_Pico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Forma_Pico` (
  `idForma_Pico` INT NOT NULL,
  `Forma_Pico` VARCHAR(60) NOT NULL,
  `Descripcion` VARCHAR(100) NULL,
  `ImAgen` BLOB NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idForma_Pico`),
  UNIQUE INDEX `Forma_Pico_UNIQUE` (`Forma_Pico` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_Huevos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_Huevos` (
  `idTipo_Huevos` INT NOT NULL,
  `tipo_cascara` VARCHAR(60) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_Huevos`),
  UNIQUE INDEX `Tipo_Huevoscol_UNIQUE` (`tipo_cascara` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_iincubacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_iincubacion` (
  `idTipo_incubacion` INT NOT NULL,
  `Tipo_incubacion` VARCHAR(60) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_incubacion`),
  UNIQUE INDEX `Tipo_incubacion_UNIQUE` (`Tipo_incubacion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`numero_huevos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`numero_huevos` (
  `idnumero_huevos` INT NOT NULL,
  `numero_huevoscol` VARCHAR(45) NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idnumero_huevos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_Nido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_Nido` (
  `idTipo_Nido` INT NOT NULL,
  `Tipo` VARCHAR(45) NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_Nido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tiempo_incubacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tiempo_incubacion` (
  `idTiempo_incubacion` INT NOT NULL AUTO_INCREMENT,
  `Tiempo_incubacion` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTiempo_incubacion`),
  UNIQUE INDEX `Tiempo_incubacion_UNIQUE` (`Tiempo_incubacion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tamano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tamano` (
  `idTamano` INT NOT NULL,
  `Tamano` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTamano`),
  UNIQUE INDEX `Tamano_UNIQUE` (`Tamano` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`ZonaVida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`ZonaVida` (
  `idZonaVida` INT NOT NULL AUTO_INCREMENT,
  `Zona` VARCHAR(100) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idZonaVida`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Especie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Especie` (
  `idEspecie` INT NOT NULL AUTO_INCREMENT,
  `Nombre_cientifico` VARCHAR(60) NOT NULL,
  `Genero_idGenero` INT NOT NULL,
  `Forma_Pico_idForma_Pico` INT NOT NULL,
  `Tipo_Huevos_idTipo_Huevos` INT NOT NULL,
  `Tipo_iincubacion_idTipo_incubacion` INT NOT NULL,
  `numero_huevos_idnumero_huevos` INT NOT NULL,
  `Tipo_Nido_idTipo_Nido` INT NOT NULL,
  `Tiempo_incubacion_idTiempo_incubacion` INT NOT NULL,
  `Tamano_idTamano` INT NOT NULL,
  `nombre_comun` VARCHAR(45) NOT NULL,
  `nombre_ingles` VARCHAR(45) NOT NULL,
  `ZonaVida_idZonaVida` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idEspecie`, `Genero_idGenero`, `Forma_Pico_idForma_Pico`, `Tipo_Huevos_idTipo_Huevos`, `Tipo_iincubacion_idTipo_incubacion`, `numero_huevos_idnumero_huevos`, `Tipo_Nido_idTipo_Nido`, `Tiempo_incubacion_idTiempo_incubacion`, `Tamano_idTamano`, `ZonaVida_idZonaVida`),
  INDEX `fk_Tipo_Ave_Genero1_idx` (`Genero_idGenero` ASC),
  INDEX `fk_Tipo_Ave_Forma_Pico1_idx` (`Forma_Pico_idForma_Pico` ASC),
  INDEX `fk_Tipo_Ave_Tipo_Huevos1_idx` (`Tipo_Huevos_idTipo_Huevos` ASC),
  INDEX `fk_Especie_Tipo_iincubacion1_idx` (`Tipo_iincubacion_idTipo_incubacion` ASC),
  INDEX `fk_Especie_numero_huevos1_idx` (`numero_huevos_idnumero_huevos` ASC),
  INDEX `fk_Especie_Tipo_Nido1_idx` (`Tipo_Nido_idTipo_Nido` ASC),
  INDEX `fk_Especie_Tiempo_incubacion1_idx` (`Tiempo_incubacion_idTiempo_incubacion` ASC),
  INDEX `fk_Especie_Tamano1_idx` (`Tamano_idTamano` ASC),
  INDEX `fk_Especie_ZonaVida1_idx` (`ZonaVida_idZonaVida` ASC),
  CONSTRAINT `fk_Tipo_Ave_Genero1`
    FOREIGN KEY (`Genero_idGenero`)
    REFERENCES `Hidden_bird`.`Genero` (`idGenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tipo_Ave_Forma_Pico1`
    FOREIGN KEY (`Forma_Pico_idForma_Pico`)
    REFERENCES `Hidden_bird`.`Forma_Pico` (`idForma_Pico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tipo_Ave_Tipo_Huevos1`
    FOREIGN KEY (`Tipo_Huevos_idTipo_Huevos`)
    REFERENCES `Hidden_bird`.`Tipo_Huevos` (`idTipo_Huevos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_Tipo_iincubacion1`
    FOREIGN KEY (`Tipo_iincubacion_idTipo_incubacion`)
    REFERENCES `Hidden_bird`.`Tipo_iincubacion` (`idTipo_incubacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_numero_huevos1`
    FOREIGN KEY (`numero_huevos_idnumero_huevos`)
    REFERENCES `Hidden_bird`.`numero_huevos` (`idnumero_huevos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_Tipo_Nido1`
    FOREIGN KEY (`Tipo_Nido_idTipo_Nido`)
    REFERENCES `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_Tiempo_incubacion1`
    FOREIGN KEY (`Tiempo_incubacion_idTiempo_incubacion`)
    REFERENCES `Hidden_bird`.`Tiempo_incubacion` (`idTiempo_incubacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_Tamano1`
    FOREIGN KEY (`Tamano_idTamano`)
    REFERENCES `Hidden_bird`.`Tamano` (`idTamano`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_ZonaVida1`
    FOREIGN KEY (`ZonaVida_idZonaVida`)
    REFERENCES `Hidden_bird`.`ZonaVida` (`idZonaVida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Ave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Ave` (
  `idAve` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(200) NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  `Especie_idEspecie` INT NOT NULL,
  PRIMARY KEY (`idAve`, `Especie_idEspecie`),
  INDEX `fk_Ave_Especie1_idx` (`Especie_idEspecie` ASC),
  CONSTRAINT `fk_Ave_Especie1`
    FOREIGN KEY (`Especie_idEspecie`)
    REFERENCES `Hidden_bird`.`Especie` (`idEspecie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Telefono` (
  `idTelefono` INT NOT NULL AUTO_INCREMENT,
  `telefono` VARCHAR(20) NULL,
  `propietario_linea` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTelefono`, `propietario_linea`),
  INDEX `fk_Telefono_Persona_idx` (`propietario_linea` ASC),
  CONSTRAINT `fk_Telefono_Persona`
    FOREIGN KEY (`propietario_linea`)
    REFERENCES `Hidden_bird`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Color`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Color` (
  `Color_id` INT NOT NULL,
  `Color` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`Color_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`ColorAve`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`ColorAve` (
  `idColorAve` INT NOT NULL,
  `Foto_Ave_idAve` INT NOT NULL,
  `Color_Color_id` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idColorAve`, `Foto_Ave_idAve`, `Color_Color_id`),
  INDEX `fk_ColorAve_Foto_Ave1_idx` (`Foto_Ave_idAve` ASC),
  INDEX `fk_ColorAve_Color1_idx` (`Color_Color_id` ASC),
  CONSTRAINT `fk_ColorAve_Foto_Ave1`
    FOREIGN KEY (`Foto_Ave_idAve`)
    REFERENCES `Hidden_bird`.`Ave` (`idAve`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ColorAve_Color1`
    FOREIGN KEY (`Color_Color_id`)
    REFERENCES `Hidden_bird`.`Color` (`Color_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`FotosxPersona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`FotosxPersona` (
  `idFotosxPersona` INT NOT NULL AUTO_INCREMENT,
  `Foto_Ave_idAve` INT NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idFotosxPersona`, `Foto_Ave_idAve`, `Persona_idPersona`),
  INDEX `fk_FotosxPersona_Foto_Ave1_idx` (`Foto_Ave_idAve` ASC),
  INDEX `fk_FotosxPersona_Persona1_idx` (`Persona_idPersona` ASC),
  CONSTRAINT `fk_FotosxPersona_Foto_Ave1`
    FOREIGN KEY (`Foto_Ave_idAve`)
    REFERENCES `Hidden_bird`.`Ave` (`idAve`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FotosxPersona_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `Hidden_bird`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Nombre_ingles_ave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Nombre_ingles_ave` (
  `idNombre_ingles_ave` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `Especie_idEspecie` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_modificacion` DATE NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idNombre_ingles_ave`, `Especie_idEspecie`),
  INDEX `fk_Nombre_ingles_ave_Especie1_idx` (`Especie_idEspecie` ASC),
  CONSTRAINT `fk_Nombre_ingles_ave_Especie1`
    FOREIGN KEY (`Especie_idEspecie`)
    REFERENCES `Hidden_bird`.`Especie` (`idEspecie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Correo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Correo` (
  `idCorreo` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(75) NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idCorreo`, `Persona_idPersona`),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC),
  INDEX `fk_Correo_Persona1_idx` (`Persona_idPersona` ASC),
  CONSTRAINT `fk_Correo_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `Hidden_bird`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'Administrador' IDENTIFIED BY 'Admin13';
/*Compilado hasta aquí*/
GRANT SELECT, INSERT, TRIGGER ON TABLE `Hidden_bird`.* TO 'Administrador';
GRANT SELECT ON TABLE `Hidden_bird`.* TO 'Administrador';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `Hidden_bird`.* TO 'Administrador';
GRANT ALL ON `Hidden_bird`.* TO 'Administrador';
/*Compilado hasta aquí*/
GRANT EXECUTE ON ROUTINE `Hidden_bird`.* TO 'Administrador';
CREATE USER 'Usuario' IDENTIFIED BY 'user123E';

GRANT SELECT, INSERT, TRIGGER ON TABLE `Hidden_bird`.* TO 'Usuario';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `Hidden_bird`.* TO 'Usuario';
GRANT EXECUTE ON ROUTINE `Hidden_bird`.* TO 'Usuario';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;