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
  `idTipo_usuario` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `idClase` INT NOT NULL AUTO_INCREMENT,
  `Clase` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idClase`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Orden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Orden` (
  `idOrden` INT NOT NULL AUTO_INCREMENT,
  `Orden` VARCHAR(45) NULL,
  `Clase_idClase` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `idSuborden` INT NOT NULL AUTO_INCREMENT,
  `Suborden` VARCHAR(60) NOT NULL,
  `Orden_idOrden` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `idFamilia` INT NULL AUTO_INCREMENT,
  `Familia` VARCHAR(45) NOT NULL,
  `Suborden_idSuborden` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `idForma_Pico` INT NOT NULL AUTO_INCREMENT,
  `Forma_Pico` VARCHAR(60) NOT NULL,
  `Descripcion` VARCHAR(300) NOT NULL,
  `imagen_url` VARCHAR(250) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idForma_Pico`),
  UNIQUE INDEX `Forma_Pico_UNIQUE` (`Forma_Pico` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_Huevos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_Huevos` (
  `idTipo_Huevos` INT NOT NULL AUTO_INCREMENT,
  `tipo_cascara` VARCHAR(60) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_Huevos`),
  UNIQUE INDEX `Tipo_Huevoscol_UNIQUE` (`tipo_cascara` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_incubacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_incubacion` (
  `idTipo_incubacion` INT NOT NULL AUTO_INCREMENT,
  `Tipo_incubacion` VARCHAR(60) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_incubacion`),
  UNIQUE INDEX `Tipo_incubacion_UNIQUE` (`Tipo_incubacion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`cantidad_huevos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`cantidad_huevos` (
  `idcantidad_huevos` INT NOT NULL AUTO_INCREMENT,
  `numero_huevos` VARCHAR(45) NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idcantidad_huevos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tipo_Nido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tipo_Nido` (
  `idTipo_Nido` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTiempo_incubacion`),
  UNIQUE INDEX `Tiempo_incubacion_UNIQUE` (`Tiempo_incubacion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Tamano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Tamano` (
  `idTamano` INT NOT NULL AUTO_INCREMENT,
  `Tamano` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `Forma_Pico_idForma_Pico` INT NULL,
  `Tipo_Huevos_idTipo_Huevos` INT NULL,
  `Tipo_iincubacion_idTipo_incubacion` INT NULL,
  `numero_huevos_idnumero_huevos` INT NULL,
  `Tipo_Nido_idTipo_Nido` INT NULL,
  `Tiempo_incubacion_idTiempo_incubacion` INT NULL,
  `Tamano_idTamano` INT NULL,
  `ZonaVida_idZonaVida` INT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
    REFERENCES `Hidden_bird`.`Tipo_incubacion` (`idTipo_incubacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especie_numero_huevos1`
    FOREIGN KEY (`numero_huevos_idnumero_huevos`)
    REFERENCES `Hidden_bird`.`cantidad_huevos` (`idcantidad_huevos`)
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
-- Table `Hidden_bird`.`Provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Provincia` (
  `idProvincia` INT NOT NULL AUTO_INCREMENT,
  `Provincia` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idProvincia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Canton`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Canton` (
  `idCanton` INT NOT NULL AUTO_INCREMENT,
  `Canton` VARCHAR(100) NULL,
  `Provincia_idProvincia` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idCanton`, `Provincia_idProvincia`),
  INDEX `fk_Canton_Provincia1_idx` (`Provincia_idProvincia` ASC),
  CONSTRAINT `fk_Canton_Provincia1`
    FOREIGN KEY (`Provincia_idProvincia`)
    REFERENCES `Hidden_bird`.`Provincia` (`idProvincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Ave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Ave` (
  `idAve` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(200) NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL COMMENT 'Esta tabla será similar a álbum. Sólo que el álbum pertenece a UN ave, por lo que será llamado ave. El ave contendrá fotos de dicha ave.\n',
  `usuario_modificacion` VARCHAR(45) NULL,
  `Especie_idEspecie` INT NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  `Canton_idCanton` INT NOT NULL,
  `nombre_album` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`idAve`, `Especie_idEspecie`, `Persona_idPersona`, `Canton_idCanton`),
  INDEX `fk_Ave_Especie1_idx` (`Especie_idEspecie` ASC),
  INDEX `fk_Ave_Persona1_idx` (`Persona_idPersona` ASC),
  INDEX `fk_Ave_Canton1_idx` (`Canton_idCanton` ASC),
  UNIQUE INDEX `Avecol_UNIQUE` (`nombre_album` ASC),
  CONSTRAINT `fk_Ave_Especie1`
    FOREIGN KEY (`Especie_idEspecie`)
    REFERENCES `Hidden_bird`.`Especie` (`idEspecie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ave_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `Hidden_bird`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ave_Canton1`
    FOREIGN KEY (`Canton_idCanton`)
    REFERENCES `Hidden_bird`.`Canton` (`idCanton`)
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
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTelefono`),
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
  `Color_id` INT NOT NULL AUTO_INCREMENT,
  `Color` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`Color_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`ColorAve`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`ColorAve` (
  `idColorAve` INT NOT NULL AUTO_INCREMENT,
  `Foto_Ave_idAve` INT NOT NULL,
  `Color_Color_id` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
-- Table `Hidden_bird`.`Nombre_ingles_ave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Nombre_ingles_ave` (
  `idNombre_ingles_ave` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `Especie_idEspecie` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
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
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
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


-- -----------------------------------------------------
-- Table `Hidden_bird`.`data_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`data_log` (
  `idData_Log` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `accion` VARCHAR(70) NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idData_Log`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Foto` (
  `idFoto` INT NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  `url` VARCHAR(250) NOT NULL,
  `Ave_idAve` INT NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idFoto`, `Ave_idAve`),
  INDEX `fk_Foto_Ave1_idx` (`Ave_idAve` ASC),
  CONSTRAINT `fk_Foto_Ave1`
    FOREIGN KEY (`Ave_idAve`)
    REFERENCES `Hidden_bird`.`Ave` (`idAve`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Nombre_comun`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Nombre_comun` (
  `idNombre_comun` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(80) NOT NULL,
  `Especie_idEspecie` INT NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idNombre_comun`, `Especie_idEspecie`),
  INDEX `fk_Nombre_comun_Especie1_idx` (`Especie_idEspecie` ASC),
  CONSTRAINT `fk_Nombre_comun_Especie1`
    FOREIGN KEY (`Especie_idEspecie`)
    REFERENCES `Hidden_bird`.`Especie` (`idEspecie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hidden_bird`.`Correo_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hidden_bird`.`Correo_admin` (
  `idCorreo_Admin` INT NOT NULL AUTO_INCREMENT,
  `Asunto` VARCHAR(200) NOT NULL,
  `Subject` VARCHAR(100) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `usuario_creacion` VARCHAR(45) NULL,
  `usuario_modificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idCorreo_Admin`))
ENGINE = InnoDB
COMMENT = 'Tabla que mantiene los valores que se enviarán en el correo, permitiendo así a la DB obtener y alterar dichos valores cuando sea necesario. ';

USE `Hidden_bird`;

DELIMITER $$;
USE `Hidden_bird`
$$
CREATE TRIGGER `Hidden_bird`.`Tipo_usuario_BEFORE_INSERT` 
BEFORE INSERT ON `Tipo_usuario` 
FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END;
$$


Use `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tipo_usuario_AFTER_INSERT` 
AFTER INSERT ON `Tipo_usuario` 
FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usaurio,accion,fecha)
	VALUES(NEW.usuario_creacion,"Inserción tipo_usuario",NOW());
END;
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tipo_usuario_BEFORE_UPDATE` BEFORE UPDATE ON `Tipo_usuario` FOR EACH ROW
BEGIN
    SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion= User();
END;
$$



USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tipo_usuario_AFTER_UPDATE` AFTER UPDATE ON `Tipo_usuario` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación tipo_usuario", NOW());
END
$$
#Creados 
DELIMITER $$;

USE `Hidden_bird`;
 
CREATE  TRIGGER `Hidden_bird`.`Persona_BEFORE_INSERT` BEFORE INSERT ON `Persona` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=Current_user();
    SET New.usuario_modificacion=User()
END
$$

DROP TRIGGER  `Hidden_bird`.`Persona_BEFORE_INSERT`;

USE `Hidden_bird`$$
CREATE DEFINER = User TRIGGER `Hidden_bird`.`Persona_AFTER_INSERT` AFTER INSERT ON `Persona` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_creacion, "Inserción persona", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Persona_BEFORE_UPDATE` BEFORE UPDATE ON `Persona` FOR EACH ROW
BEGIN
		SET New.fecha_modificacion=NOW();
        SET New.usuario_modificacion=username;
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Persona_AFTER_UPDATE` AFTER UPDATE ON `Persona` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(username, "Modificación persona", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Clase_BEFORE_INSERT` BEFORE INSERT ON `Clase` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Clase_AFTER_INSERT` AFTER INSERT ON `Clase` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción clase", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Clase_BEFORE_UPDATE` BEFORE UPDATE ON `Clase` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();

END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Clase_AFTER_UPDATE` AFTER UPDATE ON `Clase` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación clase", NOW());
END
$$


USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Orden_BEFORE_INSERT` BEFORE INSERT ON `Orden` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END; $$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Orden_AFTER_INSERT` AFTER INSERT ON `Orden` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción orden", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Orden_BEFORE_UPDATE` BEFORE UPDATE ON `Orden` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();

END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Orden_AFTER_UPDATE` AFTER UPDATE ON `Orden` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación orden", NOW());
	
END
$$



USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Suborden_BEFORE_INSERT` BEFORE INSERT ON `Suborden` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Suborden_AFTER_INSERT` AFTER INSERT ON `Suborden` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción suborden", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Suborden_BEFORE_UPDATE` BEFORE UPDATE ON `Suborden` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Suborden_AFTER_UPDATE` AFTER UPDATE ON `Suborden` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación suborden", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Familia_BEFORE_INSERT` BEFORE INSERT ON `Familia` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Familia_AFTER_INSERT` AFTER INSERT ON `Familia` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción familia", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Familia_BEFORE_UPDATE` BEFORE UPDATE ON `Familia` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Familia_AFTER_UPDATE` AFTER UPDATE ON `Familia` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación familia", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Genero_BEFORE_INSERT` BEFORE INSERT ON `Genero` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion=User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Genero_AFTER_INSERT` AFTER INSERT ON `Genero` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción género", NOW());
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Genero_BEFORE_UPDATE` BEFORE UPDATE ON `Genero` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Genero_AFTER_UPDATE` AFTER UPDATE ON `Genero` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación género", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Forma_Pico_BEFORE_INSERT` BEFORE INSERT ON `Forma_Pico` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Forma_Pico_AFTER_INSERT` AFTER INSERT ON `Forma_Pico` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción forma_pico", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Forma_Pico_BEFORE_UPDATE` BEFORE UPDATE ON `Forma_Pico` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Forma_Pico_AFTER_UPDATE` AFTER UPDATE ON `Forma_Pico` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación forma_pico", NOW());
END
$$

USE `Hidden_bird`$$
CREATE DEFINER = CURRENT_USER TRIGGER `Hidden_bird`.`Tipo_Huevos_BEFORE_INSERT` BEFORE INSERT ON `Tipo_Huevos` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tipo_Huevos_AFTER_INSERT` AFTER INSERT ON `Tipo_Huevos` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción tipo_huevos", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_Huevos_BEFORE_UPDATE` BEFORE UPDATE ON `Tipo_Huevos` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_Huevos_AFTER_UPDATE` AFTER UPDATE ON `Tipo_Huevos` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación tipo_huevos", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_iincubacion_BEFORE_INSERT` BEFORE INSERT ON `Tipo_incubacion` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion=User();
END;
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tipo_incubacion_AFTER_INSERT` AFTER INSERT ON `Tipo_incubacion` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción tipo_incubacion", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_incubacion_BEFORE_UPDATE` BEFORE UPDATE ON `Tipo_incubacion` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_incubacion_AFTER_UPDATE` AFTER UPDATE ON `Tipo_incubacion` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación tipo_incubacion", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`cantidad_huevos_BEFORE_INSERT` BEFORE INSERT ON `cantidad_huevos` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`cantidad_huevos_AFTER_INSERT` AFTER INSERT ON `cantidad_huevos` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción cantidad_huevos", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`cantidad_huevos_BEFORE_UPDATE` BEFORE UPDATE ON `cantidad_huevos` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`cantidad_huevos_AFTER_UPDATE` AFTER UPDATE ON `cantidad_huevos` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación cantidad_huevos", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_Nido_BEFORE_INSERT` BEFORE INSERT ON `Tipo_Nido` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_Nido_AFTER_INSERT` AFTER INSERT ON `Tipo_Nido` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción tipo_nido", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_Nido_BEFORE_UPDATE` BEFORE UPDATE ON `Tipo_Nido` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tipo_Nido_AFTER_UPDATE` AFTER UPDATE ON `Tipo_Nido` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación tipo_nido", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tiempo_incubacion_BEFORE_INSERT` BEFORE INSERT ON `Tiempo_incubacion` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion=User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tiempo_incubacion_AFTER_INSERT` AFTER INSERT ON `Tiempo_incubacion` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción tiempo_incubacion", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tiempo_incubacion_BEFORE_UPDATE` BEFORE UPDATE ON `Tiempo_incubacion` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tiempo_incubacion_AFTER_UPDATE` AFTER UPDATE ON `Tiempo_incubacion` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_modificacion, "Modificación tiempo_incubación ", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tamano_BEFORE_INSERT` BEFORE INSERT ON `Tamano` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tamano_AFTER_INSERT` AFTER INSERT ON `Tamano` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción tamaño", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Tamano_BEFORE_UPDATE` BEFORE UPDATE ON `Tamano` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=Current_User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Tamano_AFTER_UPDATE` AFTER UPDATE ON `Tamano` FOR EACH ROW
BEGIN

END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`ZonaVida_BEFORE_INSERT` BEFORE INSERT ON `ZonaVida` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`ZonaVida_AFTER_INSERT` AFTER INSERT ON `ZonaVida` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción zona_vida", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`ZonaVida_BEFORE_UPDATE` BEFORE UPDATE ON `ZonaVida` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`ZonaVida_AFTER_UPDATE` AFTER UPDATE ON `ZonaVida` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación zona_vida", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Especie_BEFORE_INSERT` BEFORE INSERT ON `Especie` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END;
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Especie_AFTER_INSERT` AFTER INSERT ON `Especie` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción especie", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Especie_BEFORE_UPDATE` BEFORE UPDATE ON `Especie` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Especie_AFTER_UPDATE` AFTER UPDATE ON `Especie` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación especie", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Provincia_BEFORE_INSERT` BEFORE INSERT ON `Provincia` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Provincia_BEFORE_UPDATE` BEFORE UPDATE ON `Provincia` FOR EACH ROW
BEGIN

    SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Canton_BEFORE_INSERT` BEFORE INSERT ON `Canton` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Canton_AFTER_INSERT` AFTER INSERT ON `Canton` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción canton", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Canton_BEFORE_UPDATE` BEFORE UPDATE ON `Canton` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Canton_AFTER_UPDATE` AFTER UPDATE ON `Canton` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_modificacion, "Modificación cantón", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Ave_BEFORE_INSERT` BEFORE INSERT ON `Ave` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Ave_AFTER_INSERT` AFTER INSERT ON `Ave` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción ave", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Ave_BEFORE_UPDATE` BEFORE UPDATE ON `Ave` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Ave_AFTER_UPDATE` AFTER UPDATE ON `Ave` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_modificacion, "Modificación ave", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Telefono_BEFORE_INSERT` BEFORE INSERT ON `Telefono` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
END;
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Telefono_AFTER_INSERT` AFTER INSERT ON `Telefono` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_creacion, "Inserción teléfono", NOW());
END;
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Telefono_BEFORE_UPDATE` BEFORE UPDATE ON `Telefono` FOR EACH ROW
BEGIN
		SET New.fecha_modificacion=NOW();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Telefono_AFTER_UPDATE` AFTER UPDATE ON `Telefono` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_modificacion, "Modificación teléfono", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Color_BEFORE_INSERT` BEFORE INSERT ON `Color` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Color_AFTER_INSERT` AFTER INSERT ON `Color` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción color", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Color_BEFORE_UPDATE` BEFORE UPDATE ON `Color` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Color_AFTER_UPDATE` AFTER UPDATE ON `Color` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación color", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`ColorAve_BEFORE_INSERT` BEFORE INSERT ON `ColorAve` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`ColorAve_AFTER_INSERT` AFTER INSERT ON `ColorAve` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción colorAve", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`ColorAve_BEFORE_UPDATE` BEFORE UPDATE ON `ColorAve` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`ColorAve_AFTER_UPDATE` AFTER UPDATE ON `ColorAve` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación colorAve", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Nombre_ingles_ave_BEFORE_INSERT` BEFORE INSERT ON `Nombre_ingles_ave` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=Current_User();
    SET New.usuario_modificacion= Current_User();
END;
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Nombre_ingles_ave_AFTER_INSERT` AFTER INSERT ON `Nombre_ingles_ave` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción nombre_ingles_ave", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Nombre_ingles_ave_BEFORE_UPDATE` BEFORE UPDATE ON `Nombre_ingles_ave` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=Current_User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Nombre_ingles_ave_AFTER_UPDATE` AFTER UPDATE ON `Nombre_ingles_ave` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación nombre_ingles_ave", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Correo_BEFORE_INSERT` BEFORE INSERT ON `Correo` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Correo_AFTER_INSERT` AFTER INSERT ON `Correo` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_creacion, "Inserción correo", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Correo_BEFORE_UPDATE` BEFORE UPDATE ON `Correo` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Correo_AFTER_UPDATE` AFTER UPDATE ON `Correo` FOR EACH ROW
BEGIN
	    INSERT INTO data_log
				(usuario,accion, fecha)
			VALUES(NEW.usuario_modificacion, "Modificación correo", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Foto_BEFORE_INSERT` BEFORE INSERT ON `Foto` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Foto_AFTER_INSERT` AFTER INSERT ON `Foto` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción foto", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Foto_BEFORE_UPDATE` BEFORE UPDATE ON `Foto` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Foto_AFTER_UPDATE` AFTER UPDATE ON `Foto` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación correo", NOW());
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Nombre_comun_BEFORE_INSERT` BEFORE INSERT ON `Nombre_comun` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion= User();
    SET New.usuario_modificacion= User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Nombre_comun_AFTER_INSERT` AFTER INSERT ON `Nombre_comun` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción nombre_comun", NOW());
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Nombre_comun_BEFORE_UPDATE` BEFORE UPDATE ON `Nombre_comun` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END;
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Nombre_comun_AFTER_UPDATE` AFTER UPDATE ON `Nombre_comun` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación nombre_comun", NOW());
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Correo_admin_BEFORE_INSERT` BEFORE INSERT ON `Correo_admin` FOR EACH ROW
BEGIN
	SET New.fecha_creacion=NOW();
    SET New.fecha_modificacion=NOW();
    SET New.usuario_creacion=User();
    SET New.usuario_modificacion= User();
END
$$

USE `Hidden_bird`$$
CREATE  TRIGGER `Hidden_bird`.`Correo_admin_AFTER_INSERT` AFTER INSERT ON `Correo_admin` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_creacion, "Inserción correo_Admin", NOW());
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Correo_admin_BEFORE_UPDATE` BEFORE UPDATE ON `Correo_admin` FOR EACH ROW
BEGIN
	SET New.fecha_modificacion=NOW();
    SET New.usuario_modificacion=User();
END
$$

USE `Hidden_bird`$$
CREATE TRIGGER `Hidden_bird`.`Correo_admin_AFTER_UPDATE` AFTER UPDATE ON `Correo_admin` FOR EACH ROW
BEGIN
	INSERT INTO data_log
				(usuario,accion, fecha)
	VALUES(NEW.usuario_modificacion, "Modificación correo_admin", NOW());
END
$$


DELIMITER ;
CREATE USER 'Administrador' IDENTIFIED BY 'Admin13';

GRANT SELECT, INSERT, TRIGGER ON TABLE `Hidden_bird`.* TO 'Administrador';
GRANT SELECT ON TABLE `Hidden_bird`.* TO 'Administrador';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `Hidden_bird`.* TO 'Administrador';
GRANT ALL ON `Hidden_bird`.* TO 'Administrador';
GRANT EXECUTE ON  `Hidden_bird`.* TO 'Administrador';
CREATE USER 'Usuario' IDENTIFIED BY 'user123E';

GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `Hidden_bird`.Foto TO 'Usuario';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE   ON TABLE `Hidden_bird`.ColorAve TO 'Usuario';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `Hidden_bird`.Ave TO 'Usuario';
GRANT SELECT, INSERT, TRIGGER ON TABLE `Hidden_bird`.Correo TO 'Usuario';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE  ON TABLE `Hidden_bird`.Telefono TO 'Usuario';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `Hidden_bird`.Persona TO 'Usuario';
GRANT EXECUTE ON  `Hidden_bird`.* TO 'Usuario';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Tipo_usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Tipo_usuario` (`idTipo_usuario`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (1, 'Aficionado', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_usuario` (`idTipo_usuario`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (2, 'Ornitocólogo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_usuario` (`idTipo_usuario`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Administrador', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Clase`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Clase` (`idClase`, `Clase`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Ave', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Orden`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Orden` (`idOrden`, `Orden`, `Clase_idClase`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Incertae Sedis', 1, NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Orden` (`idOrden`, `Orden`, `Clase_idClase`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, '', DEFAULT, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Suborden`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Suborden` (`idSuborden`, `Suborden`, `Orden_idOrden`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Incertae Sedis', 1, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Familia`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Familia` (`idFamilia`, `Familia`, `Suborden_idSuborden`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (NULL, 'Incertae Sedis', 1, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Genero`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Genero` (`idGenero`, `Genero`, `Familia_idFamilia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Incertae Sedis', 1, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Forma_Pico`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Frugívoros', 'La fruta es el alimento principal de este tipo de aves. \nEl pico esta adaptado a esta dieta y es bastante fuerte y \nmás o menos largo como es el caso de los tucanes, o provistos de un \npequeño gancho terminal que sirve para perforar la piel de las frutas \ncomo ocurre en los tangaras.', 'http://www.temaiken.org.ar/files/items/imagenes/Tucan_pico_Dentellado_02.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Generalista', 'Las aves que tienen una alimentación mixta, han \ndesarrollado una forma particular de pico el cual es puntiagudo para \npermitirles coger semillas o frutos y a la vez es lo suficientemente \nlargo para facilitarles el acceso a gusanos o insectos. ', 'http://www.montesdevalsain.es/images/aves_lasaves_p13.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Granívoro', 'Las aves granívoras, a diferencia de las frugívoras \nestrictas, se alimentan de semillas, las cuales tienen cubiertas muy \nduras, por lo que el grado de especialización de estas aves es mayor. \nEn las aves granívoras se pueden encontrar varias estrategias \nadaptativas en el pico con doble función, es decir la parte superior\ngeneralmente muy curvada que les sirve para extraer la parte carnosa \nde los frutos o para sujetarlos y la parte inferior del pico, muy \nfuerte u corta, junto con la base de la parte superior del pico, les \nsirve para partir la cáscara de las semillas.', 'https://sites.google.com/site/granivoras/_/rsrc/1361971484596/home/GRANVO~1.JPG', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Comedor de semillas', 'El pico de las aves comedoras de semillas presenta\ncaracterísticas que le permiten romper con facilidad la cáscara de la \nsemilla y poder obtener el contenido de la misma.  Pico corto, fuerte y\nen forma de cuña.', 'http://www.jmarcano.com/bosques/notas/20130531_thrush_ls.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Nectarívoro', 'Pico largo y fino. Permite introducirlo en los nectarios para conseguir\nel néctar de grandes flores tropicales.', 'http://arrived.galeon.com/colibri.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Limícola', 'Las aves limícolas están generalmente asociadas a zonas húmedas y \nesencialmente a zónas húmedas costeras, como los estuarios y lagunas.', 'http://farm3.static.flickr.com/2680/4054507259_409509ee2c.jpg', NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Filtrador', 'Este es un pico curvo con la parte superior plana, esto le \npermite al ave pegarlo contra el fondo en el cual se esta alimentando, \nluego aspira el agua barrosa donde es posible encontrar microfauna y flora \nacuática, las cuales son bombeadas hasta que pasen por n sistema de laminillas\nen la mandíbula superior en donde es filtrada el agua y retenido el alimento, \nel pato tiene un sistema similar pero más simple y que además puede utilizar \npara alimentarse de otras formas. ', 'http://www.educa.madrid.org/web/cc.nsdelasabiduria.madrid/Ejercicios/1ESO/T2/picos/filtrador.JPG', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Pescador', 'Las aves con este tipo de pico se valen del mismo para atrapar \npeces. Puede aparece una bolsa que permite asegurar la captura. ', 'http://3.bp.blogspot.com/-gQT1tobpMaY/UGh0oQVRagI/AAAAAAAACNY/1f883yWTDew/s400/pico-cormoran-peces.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Buceador', 'Se valen de dicho pico para capturar peces bajo agua, por lo que \nla forma generalmente de espátula del pico les permite capturar al pez con\nfacilidad.', 'http://www.armandocapachon.com/asturias/aves/Imagenes/Porron_comun.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Carpintero', 'No muy largos, delgados y realmente fuertes. Sirven para hacer \nagujeros en los troncos, además de alimentarse de pequeños insectos.', 'http://3.bp.blogspot.com/-fkxJ9jr8EW4/UGh0tDzXPsI/AAAAAAAACOM/QQF1RMWitdE/s1600/pico-picapinos-madera.JPG', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Forma_Pico` (`idForma_Pico`, `Forma_Pico`, `Descripcion`, `imagen_url`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Carnívora', 'Pico adaptado para desgarrar o perforar carne. Fuerte y en forma\nde gancho.', 'http://3.bp.blogspot.com/-GWNqCc36Br0/UGh0nnTKBmI/AAAAAAAACNM/Ng83BGzjxUY/s1600/pico-cernicalo-carne.JPG', NULL, NULL, NULL, NULL);

COMMIT;

Forma_Pico_BEFORE_INSERT
-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Tipo_Huevos`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Tipo_Huevos` (`idTipo_Huevos`, `tipo_cascara`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Cáscara dura', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Huevos` (`idTipo_Huevos`, `tipo_cascara`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Cáscara suave', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Tipo_Nido`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Escarbado', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Madriguera', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Montículo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Colgante', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Cavidad', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Copa', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Salsera o Plato', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tipo_Nido` (`idTipo_Nido`, `Tipo`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Esférico ', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Tiempo_incubacion`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`tipo_incubacion` (`idTipo_incubacion`, `Tipo_incubacion`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Calor de su cuerpo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`tipo_incubacion` (`idTipo_incubacion`, `Tipo_incubacion`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Otro nido', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`tipo_incubacion` (`idTipo_incubacion`, `Tipo_incubacion`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Calor del Sol', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`tipo_incubacion` (`idTipo_incubacion`, `Tipo_incubacion`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Calor de volcán', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`tipo_incubacion` (`idTipo_incubacion`, `Tipo_incubacion`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Calor de fermentación', NULL, NULL, NULL, NULL);

COMMIT;

START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `hidden_bird`.`tiempo_incubacion` (`Tiempo_incubacion`) VALUES ('De 2 a 6 días.');
INSERT INTO `hidden_bird`.`tiempo_incubacion` (`Tiempo_incubacion`) VALUES ('De 6 a10 días.');
INSERT INTO `hidden_bird`.`tiempo_incubacion` (`Tiempo_incubacion`) VALUES ('De 10 a 15 días.');
INSERT INTO `hidden_bird`.`tiempo_incubacion` (`Tiempo_incubacion`) VALUES ('De 15 a 30 días.');
INSERT INTO `hidden_bird`.`tiempo_incubacion` (`Tiempo_incubacion`) VALUES ('De 30 a 50 días.');
INSERT INTO `hidden_bird`.`tiempo_incubacion` (`Tiempo_incubacion`) VALUES ('Más de 50 días.');
COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Tamano`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Tamano` (`idTamano`, `Tamano`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (1, 'Muy pequeño (4-8 cm)', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tamano` (`idTamano`, `Tamano`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (2, 'Pequeño (8-15cm)', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tamano` (`idTamano`, `Tamano`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (3, 'Mediano(15-30cm)', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tamano` (`idTamano`, `Tamano`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (4, 'Grande(30-90cm)', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Tamano` (`idTamano`, `Tamano`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (5, 'Muy Grande(1 metro+)', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`ZonaVida`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Seco Tropical', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Húmedo Tropical', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Muy Húmedo Tropical', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Húmedo Premontano', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Muy Húmedo Premontano', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Pluvial Premontano', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Húmedo Montano Bajo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Muy Húmedo Montano Bajo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Pluvial Montano Bajo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Muy  Húmedo Montano', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Bosque Pluvial Montano', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`ZonaVida` (`idZonaVida`, `Zona`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Páramo Pluvial Subalpino', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Especie`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Especie` (`idEspecie`, `Nombre_cientifico`, `Genero_idGenero`, `Forma_Pico_idForma_Pico`, `Tipo_Huevos_idTipo_Huevos`, `Tipo_iincubacion_idTipo_incubacion`, `numero_huevos_idnumero_huevos`, `Tipo_Nido_idTipo_Nido`, `Tiempo_incubacion_idTiempo_incubacion`, `Tamano_idTamano`, `ZonaVida_idZonaVida`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Incertae Sedis', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Provincia`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'San José', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Cartago', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Alajuela', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Heredia', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Puntarenas', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Limón', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Provincia` (`idProvincia`, `Provincia`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Guanacaste', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Hidden_bird`.`Color`
-- -----------------------------------------------------
START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Blanco', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Gris', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Negro', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Rojo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Azul', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Café', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Dorado', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Amarillo', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Anaranjado', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Celeste', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Vino', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Rosado', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Morado', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Púrpura', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Cian', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`Color` (`Color_id`, `Color`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'Violeta', NULL, NULL, NULL, NULL);

COMMIT;

START TRANSACTION;
USE `Hidden_bird`;
INSERT INTO `Hidden_bird`.`cantidad_huevos` (`idcantidad_huevos`, `numero_huevos`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'De 1 a 3 huevos.', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`cantidad_huevos` (`idcantidad_huevos`, `numero_huevos`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'De 4 a 6 huevos.', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`cantidad_huevos` (`idcantidad_huevos`, `numero_huevos`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, 'De 6 a 12 huevos.', NULL, NULL, NULL, NULL);
INSERT INTO `Hidden_bird`.`cantidad_huevos` (`idcantidad_huevos`, `numero_huevos`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacion`) VALUES (DEFAULT, '13 o más huevos.', NULL, NULL, NULL, NULL);

COMMIT;