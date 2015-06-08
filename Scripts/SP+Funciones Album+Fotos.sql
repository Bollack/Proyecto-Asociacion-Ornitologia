#Procedimientos y funciones relacionados a inserción de fotos y edición de álbumes 


Delimiter °°
°°

CREATE FUNCTION getScientificNameBirdFromID(pID INT)
RETURNS VARCHAR(100)
	BEGIN
		DECLARE name VARCHAR(100);
        DECLARE CONTINUE HANDLER  FOR SQLEXCEPTION  SET name=NULL;
        SELECT Nombre_cientifico
        INTO name
        FROM especie
        WHERE idEspecie=pID;
        RETURN name;
	END;

°°
Delimiter °°
°°
CREATE PROCEDURE insertEspecie

°°



Delimiter °°
°°
CREATE FUNCTION getZonaVidaFromID(pID INT)   #CREADA y FUNCIONAL
RETURNS VARCHAR(100)
BEGIN
	DECLARE zonaVida VARCHAR(100);
    DECLARE CONTINUE HANDLER  FOR SQLEXCEPTION SET zonaVida='SQL_Exception';
    SELECT Zona
    INTO zonaVida
    FROM zonavida
    WHERE idZonaVida=pID;
    RETURN zonaVida;
END;  #¿

°°

DROP FUNCTION getZonaVidaFromID;

SELECT idZonaVida, getZonaVidaFromID(idZonaVida)
FROM zonavida;

Delimiter °°
°°


°°
Delimiter °°
°°
CREATE PROCEDURE insert_ave_album  (IN pUserID INT, IN pNombre VARCHAR(120), IN, pDescripcion VARCHAR(200), IN especieID VARCHAR(100), IN Canton VARCHAR(75))
BEGIN

END

°°

Delimiter °°
°°

CREATE PROCEDURE  add_photo_album(IN, IN, IN, IN)
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

CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°

CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°

CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°

CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°