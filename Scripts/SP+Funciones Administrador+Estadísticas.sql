
#Estadísticas y procedimientos de Admin


Delimiter °°

CREATE FUNCTION getNumberUsers()
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
CREATE FUNCTION getNumberAvesByPersona(pIDUsuario INT)     #creada
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
CREATE FUNCTION avesPorZonaVida(pID INT)
°°


Delimiter °°
°°

°°

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
