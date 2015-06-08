#Cambios a hacer tras crear tablas y triggers del script de creacion

ALTER TABLE `hidden_bird`.`especie` 
DROP FOREIGN KEY `fk_Especie_Tamano1`,
DROP FOREIGN KEY `fk_Especie_Tiempo_incubacion1`,
DROP FOREIGN KEY `fk_Especie_Tipo_Nido1`,
DROP FOREIGN KEY `fk_Especie_Tipo_iincubacion1`,
DROP FOREIGN KEY `fk_Especie_ZonaVida1`,
DROP FOREIGN KEY `fk_Especie_numero_huevos1`,
DROP FOREIGN KEY `fk_Tipo_Ave_Forma_Pico1`,
DROP FOREIGN KEY `fk_Tipo_Ave_Tipo_Huevos1`;
ALTER TABLE `hidden_bird`.`especie` 
CHANGE COLUMN `Forma_Pico_idForma_Pico` `Forma_Pico_idForma_Pico` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `Tipo_Huevos_idTipo_Huevos` `Tipo_Huevos_idTipo_Huevos` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `Tipo_iincubacion_idTipo_incubacion` `Tipo_iincubacion_idTipo_incubacion` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `numero_huevos_idnumero_huevos` `numero_huevos_idnumero_huevos` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `Tipo_Nido_idTipo_Nido` `Tipo_Nido_idTipo_Nido` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `Tiempo_incubacion_idTiempo_incubacion` `Tiempo_incubacion_idTiempo_incubacion` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `Tamano_idTamano` `Tamano_idTamano` INT(11) NULL DEFAULT '0' ,
CHANGE COLUMN `ZonaVida_idZonaVida` `ZonaVida_idZonaVida` INT(11) NULL DEFAULT '0' ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idEspecie`),
ADD UNIQUE INDEX `Nombre_cientifico_UNIQUE` (`Nombre_cientifico` ASC);
ALTER TABLE `hidden_bird`.`especie` 
ADD CONSTRAINT `fk_Especie_Tamano1`
  FOREIGN KEY (`Tamano_idTamano`)
  REFERENCES `hidden_bird`.`tamano` (`idTamano`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Especie_Tiempo_incubacion1`
  FOREIGN KEY (`Tiempo_incubacion_idTiempo_incubacion`)
  REFERENCES `hidden_bird`.`tiempo_incubacion` (`idTiempo_incubacion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Especie_Tipo_Nido1`
  FOREIGN KEY (`Tipo_Nido_idTipo_Nido`)
  REFERENCES `hidden_bird`.`tipo_nido` (`idTipo_Nido`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Especie_Tipo_iincubacion1`
  FOREIGN KEY (`Tipo_iincubacion_idTipo_incubacion`)
  REFERENCES `hidden_bird`.`tipo_incubacion` (`idTipo_incubacion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Especie_ZonaVida1`
  FOREIGN KEY (`ZonaVida_idZonaVida`)
  REFERENCES `hidden_bird`.`zonavida` (`idZonaVida`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Especie_numero_huevos1`
  FOREIGN KEY (`numero_huevos_idnumero_huevos`)
  REFERENCES `hidden_bird`.`cantidad_huevos` (`idcantidad_huevos`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Tipo_Ave_Forma_Pico1`
  FOREIGN KEY (`Forma_Pico_idForma_Pico`)
  REFERENCES `hidden_bird`.`forma_pico` (`idForma_Pico`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Tipo_Ave_Tipo_Huevos1`
  FOREIGN KEY (`Tipo_Huevos_idTipo_Huevos`)
  REFERENCES `hidden_bird`.`tipo_huevos` (`idTipo_Huevos`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
ALTER TABLE `hidden_bird`.`ave` 
ADD COLUMN `color` INT NOT NULL AFTER `nombre_album`,
ADD INDEX `fk_Ave_Color1_idx` (`color` ASC);
ALTER TABLE `hidden_bird`.`ave` 
ADD CONSTRAINT `fk_Ave_Color1`
  FOREIGN KEY (`color`)
  REFERENCES `hidden_bird`.`color` (`Color_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
