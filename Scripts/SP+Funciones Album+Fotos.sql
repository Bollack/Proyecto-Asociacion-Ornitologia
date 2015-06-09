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
CREATE PROCEDURE insertEspecie(IN ScientificName VARCHAR(100), )

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
CREATE FUNCTION getCantonID(pCanton VARCHAR(100))   #CREADA Y TESTEADO
RETURNS INT
BEGIN
	DECLARE id INT;
    SELECT idCanton
    INTO id
    FROM canton
    WHERE canton=pCanton;
	RETURN id;
END;
°°

SELECT canton, getCantonID(canton)
FROM canton;


Delimiter °°
°°
CREATE FUNCTION getEspecieID(pEspecie VARCHAR(120))    #CREADA Y TESTEADO
RETURNS INT
BEGIN
	DECLARE id INT;
    SELECT idEspecie
    INTO id
    FROM especie
    WHERE Nombre_cientifico=pEspecie;
	RETURN id;
END;

°°
Select Nombre_cientifico, getEspecieID(Nombre_cientifico)
FROM especie;

Delimiter °°
°°
CREATE FUNCTION getIdFromColor(pColor VARCHAR(40)) #CREADA Y TESTEADO
RETURNS INT
BEGIN 
	DECLARE id INT;
    SELECT color_id
    INTO id
    FROM color
    WHERE color=pColor
    LIMIT 1;
    RETURN id;
END;
°°
DROP FUNCTION getIdFromColor;

SELECT color, getIdFromColor(color)
FROM color;

Delimiter °°
°°
CREATE PROCEDURE insert_ave_album  (IN username VARCHAR(45), IN pNombre VARCHAR(120), IN pDescripcion VARCHAR(200), IN especie VARCHAR(100), IN Canton VARCHAR(75), IN Color VARCHAR(40))
BEGIN
	DECLARE idUsername INT;
    DECLARE cantonID INT;
    DECLARE especieID INT;
    DECLARE colorID INT;
    SET cantonID = getCantonID(Canton);
    SET especieID= getEspecieID(especie);
    SET idUsername =  getIDFromUsername(username);
    SET colorID = getIdFromColor(color);
	INSERT INTO ave (Descripcion, nombre_album, color, usuario_creacion, usuario_modificacion, Especie_idEspecie, Persona_idPersona, Canton_idCanton)
			VALUES(pDescripcion, pNombre, colorID, username, username, especieID, idUsername, cantonID);
END;
°°


Delimiter °°
°°

CREATE PROCEDURE  add_photo_album(IN username VARCHAR(45),IN pDescripcion VARCHAR(300), IN imagen VARCHAR(200), IN pAlbumAve INT)
BEGIN
	DECLARE idUsername INT;
	SET idUsername =  getIDFromUsername(username);
    
    INSERT INTO FOTO (descripcion, usuario_creacion, usuario_modificacion, url, Ave_idAve)
					VALUES (pDescripcion, username, username, imagen, pAlbumAve);
END;
°°

Delimiter °°
°°
CREATE FUNCTION   (IN, IN, IN, IN)
BEGIN

END

°°
Delimiter °°
°°

CREATE PROCEDURE  (IN, IN, IN, IN)
BEGIN

END

°°

SELECT 


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