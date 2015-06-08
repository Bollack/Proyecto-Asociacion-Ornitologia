
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

°°

Delimiter °°
°°

°°
CREATE PROCEDURE ChangeBodyEmail (IN pCuerpo VARCHAR(300))
BEGIN
	UPDATE 

END

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
