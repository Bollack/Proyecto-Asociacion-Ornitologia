
#Estadísticas y procedimientos de Admin


Delimiter °°

CREATE FUNCTION getNumberUsers() #CREADA Y PROBADA
RETURNS INT
BEGIN
	DECLARE numero INT;
    SELECT Count(1)
    INTO numero
    FROM Persona;
	RETURN numer;
END #CREADA

°°
Delimiter °°
°°
CREATE FUNCTION getNumberAvesByPersona(pIDUsuario INT)    #CREADA Y PROBADA
RETURNS INT
BEGIN 
	DECLARE numeroAves INT;
	SELECT Count(1)
    INTO numeroAves
    FROM Ave
    WHERE Persona_idPersona=pIDUsuario;
    RETURN numeroAves;
END;
°°

Delimiter °°
°°
CREATE FUNCTION getTamanoFromID(pIdTamano INT) #CREADA Y PROBADA
RETURNS VARCHAR(30)
BEGIN
	DECLARE tamanoR VARCHAR(30);
    SELECT Tamano
    INTO tamanoR
    FROM tamano
    Where idTamano=pIdTamano;
    RETURN tamanoR;
END;
°°
DROP FUNCTION getTamanoFromID;

SELECT idTamano, getTamanoFromID(idTamano)
FROM tamano
ORDER BY idTamano;

Delimiter °°
°°
CREATE FUNCTION getNumberAvesByEspecie(pIdEspecie INT) #CREADO Y TESTEADO
RETURNS INT
BEGIN
	DECLARE numeroAves INT;
    SELECT Count(1)
    INTO numeroAves
    FROM Ave
    WHERE Especie_idEspecie=pIdEspecie;
    RETURN numeroAves;
END;
°°
SELECT idEspecie, getNumberAvesByEspecie(idEspecie)
FROM especie;


Delimiter °°
°°
CREATE FUNCTION getNumberAvesByZonaVida(pZonaVida INT) #CREADA Y PROBADA
RETURNS INT
BEGIN
	DECLARE avesNum INT;
    SELECT COALESCE(Sum(a.cantidad),0)
    INTO avesNum
    FROM (SELECT getNumberAvesByEspecie(idEspecie) AS cantidad
		  FROM especie 
          Where ZonaVida_idZonaVida=pZonaVida)a;
	RETURN avesNum;
END;
°°
DROP FUNCTION getNumberAvesByZonaVida;

SELECT getZonaVidaFromID(idZonaVida), getNumberAvesByZonaVida(idZonaVida)
FROM zonavida
ORDER BY getNumberAvesByZonaVida(idZonaVida) DESC;

Delimiter °°
°°
CREATE FUNCTION getNumberAvesByTamano(pTamanoID INT) #CREADA Y PROBADA
RETURNS INT
BEGIN
	DECLARE avesNum INT;
    SELECT COALESCE(Sum(a.cantidad),0)
    INTO avesNum
    FROM (SELECT getNumberAvesByEspecie(idEspecie) AS cantidad
		  FROM especie 
          Where Tamano_idTamano=PTamanoID)a;
	RETURN avesNum;
END;
°°
DROP FUNCTION getNumberAvesByTamano;

SELECT getTamanoFromID(idTamano), getNumberAvesByTamano(idTamano)
FROM Tamano
ORDER BY getNumberAvesByTamano(idTamano) DESC;



SELECT Nombre, getNumberAvesByPersona(idPersona) #Script 
FROM PERSONA
ORDER BY getNumberAvesByPersona(idPersona) desc;

insert_ave_album  (IN pUserID INT, IN pNombre VARCHAR(120), IN pDescripcion VARCHAR(200), IN especie VARCHAR(100), IN Canton VARCHAR(75), IN Color VARCHAR(40))
CALL insert_ave_album(1, 'Ave que me encontré','Good Night','Incertae Sedis', 'Curridabat', 'Azul');



Delimiter °°
°°
CREATE PROCEDURE insert_Especie(IN pNombreCientifico VARCHAR(70), IN pGenero INT, IN pFormaPico INT, IN pTipoHuevos INT, IN pTipoIncubacion INT, pCantHuevos INT,  #Creado
								pTipoNido INT, pTiempoIncubacion INT, IN pTamano INT, pZonaVida INT)
BEGIN 
	INSERT INTO especie (Nombre_cientifico, Genero_idGenero, Forma_Pico_idForma_Pico, Tipo_Huevos_idTipo_Huevos, Tipo_iincubacion_idTipo_incubacion,
						numero_huevos_idnumero_huevos, Tipo_Nido_idTipo_Nido, Tiempo_incubacion_idTiempo_incubacion, Tamano_idTamano, ZonaVida_idZonaVida)
				VALUES (pNombreCientifico, pGenero, pFormaPico, pTipoHuevos, pTipoIncubacion, pCantHuevos, pTipoNido, pTiempoIncubacion, pTamano, pZonaVida);
END;
°°

Delimiter °°
°°
CREATE PROCEDURE modifyEspecie(IN pidEspecie INT, IN pNombreCientifico VARCHAR(70), IN pGenero INT, IN pFormaPico INT, IN pTipoHuevos INT, IN pTipoIncubacion INT, pCantHuevos INT,  #Creado
								pTipoNido INT, pTiempoIncubacion INT, IN pTamano INT, pZonaVida INT)
BEGIN
	UPDATE especie
    SET Nombre_cientifico = pNombreCientifico,
		Genero_idGenero=pGenero, 
		Forma_Pico_idForma_Pico=pFormaPico, 
		Tipo_Huevos_idTipo_Huevos=pTipoHuevos, 
		Tipo_iincubacion_idTipo_incubacion=pTipoIncubacion,
		numero_huevos_idnumero_huevos=pCantHuevos, 
		Tipo_Nido_idTipo_Nido=pTipoNido, 
		Tiempo_incubacion_idTiempo_incubacion=pTiempoIncubacion, 
		Tamano_idTamano=pTamano, 
		ZonaVida_idZonaVida=pZonaVida
	WHERE idEspecie=pidEspecie;
END;	
°°


Delimiter °°
°°
CREATE FUNCTION getNombreCientificoFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Nombre_cientifico
    INTO nombre
    FROM especie
    WHERE idEspecie=pidEspecie;
    RETURN nombre;
END;
°°

Delimiter °°
°°
CREATE FUNCTION getTamanoFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Tamano
    INTO nombre
    FROM tamano a
    INNER JOIN especie b
    ON a.idTamano=b.Tamano_idTamano
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°
Select getTamanoFromEspecieID(idEspecie)
FROM especie;

Delimiter °°
°°
CREATE FUNCTION getGeneroFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT genero
    INTO nombre
    FROM genero a
    INNER JOIN especie b
    ON a.idGenero=b.Genero_idGenero
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°


Delimiter °°
°°
CREATE FUNCTION getFormaPicoFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Tamano
    INTO nombre
    FROM forma_pico a
    INNER JOIN especie b
    ON a.idForma_Pico=b.Forma_Pico_idForma_Pico
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°


Delimiter °°
°°
CREATE FUNCTION getTipoHuevosFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT tipo_cascara
    INTO nombre
    FROM tipo_huevos a
    INNER JOIN especie b
    ON a.idTipo_Huevos=b.Tipo_Huevos_idTipo_Huevos
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°


Delimiter °°
°°
CREATE FUNCTION getTipoIncubacionFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Tipo_incubacion
    INTO nombre
    FROM tipo_incubacion a
    INNER JOIN especie b
    ON a.idTipo_incubacion=b.Tipo_iincubacion_idTipo_incubacion
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°


Delimiter °°
°°
CREATE FUNCTION getCantidadHuevosFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT numero_huevos
    INTO nombre
    FROM cantidad_huevos a
    INNER JOIN especie b
    ON a.idcantidad_huevos=b.numero_huevos_idnumero_huevos
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°

Delimiter °°
°°
CREATE FUNCTION getTipoNidoFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Tipo
    INTO nombre
    FROM tipo_nido a
    INNER JOIN especie b
    ON a.idTipo_Nido=b.Tipo_Nido_idTipo_Nido
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°

Delimiter °°
°°
CREATE FUNCTION getTiempoIncubacionFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Tiempo_incubacion
    INTO nombre
    FROM tiempo_incubacion a
    INNER JOIN especie b
    ON a.idTiempo_incubacion=b.Tiempo_incubacion_idTiempo_incubacion
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°

Delimiter °°
°°
CREATE FUNCTION getZonaVidaFromEspecieID(pidEspecie INT) #CREADA
RETURNS VARCHAR(75)
BEGIN
	DECLARE nombre VARCHAR(75);
    SELECT Zona
    INTO nombre
    FROM zonavida a
    INNER JOIN especie b
    ON a.idZonaVida=b.ZonaVida_idZonaVida
    WHERE b.idEspecie=pidEspecie;
    RETURN nombre;
END;
°°




DROP FUNCTION getNombreCientificoFromEspecieID;

Select getNombreCientificoFromEspecieID(idEspecie)
FROM especie;


Delimiter °°
°°
CREATE PROCEDURE ChangeBodyEmail (IN pCuerpo VARCHAR(300))
BEGIN
	

END;

°°
Delimiter °°

CREATE PROCEDURE ChangeSubjectEmail(IN pAsunto VARCHAR(100))
BEGIN

END

°°
Delimiter °°

CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°

Delimiter °°
°°
CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°
°°
CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°
°°
CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°
°°
CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°

Delimiter °°
°°
CREATE EVENT IF NOT EXISTS envio_correo_evento
ON SCHEDULE EVERY 2 HOUR STARTS CURRENT_TIMESTAMP + INTERVAL 60 MINUTE ENDS CURRENT_TIMESTAMP + INTERVAL 6 DAY 
COMMENT 'Evento que activa el proceso de evaluar las personas que insertaron aves INCERTAE SEDIS y envía el correo a un admin'
