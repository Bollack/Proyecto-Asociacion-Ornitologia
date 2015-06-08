Delimiter °°

USE `Hidden_bird` °°
CREATE PROCEDURE Insert_Persona(IN pNombre VARCHAR(50), IN pApellido VARCHAR(60), 
								IN fechaNacimiento DATE, IN pDireccion VARCHAR(100), In pSexo VARCHAR(40), IN tipoUser INT, 
                                IN pUsername VARCHAR(45), IN pPassword VARCHAR(100)) 
	BEGIN
		DECLARE EXIT HANDLER  FOR SQLEXCEPTION  ROLLBACK;
		START TRANSACTION;
		INSERT INTO Persona (username, Password, Nombre, Apellido, Direccion,  Sexo, Fecha_Nacimiento, Tipo_Usuario)
							VALUES (pUsername, pNombre, pApellido, pDireccion, pSexo, pFechaNacimiento, ptipoUser);

        COMMIT;
    END;  #CREADO

°°


Delimiter °°


CREATE PROCEDURE AddTelToUser(IN pIDUser INT, IN pTelefono VARCHAR(20))
	BEGIN
		INSERT INTO Telefono(telefono, propietario_linea, usuario_creacion, usuario_modificacion)
					VALUES(pTelefono, pIDUser, getUsernameFromID(pIDUser), getUsernameFromID(pIDUser));
    END; #CREADO

°°
Delimiter °°
°°
CREATE PROCEDURE AddCorreoToUser(IN pIDUser INT, IN pCorreo VARCHAR(100))

	BEGIN
		INSERT INTO Correo(correo, Persona_idPersona, usuario_creacion, usuario_modificacion)
					VALUES(pCorreo, pIDUser, getUsernameFromID(pIDUser), getUsernameFromID(pIDUser));
    END; #CREADO

°°

Delimiter °° 
°°
CREATE FUNCTION getIDfromCorreo(pCorreo VARCHAR(100)) 
RETURNS INT
	BEGIN
		DECLARE idEncontrado INT;
        DECLARE EXIT HANDLER  FOR SQLEXCEPTION
        SELECT idCorreo
        INTO idEncontrado
        FROM correo
        WHERE correo=pCorreo;
        RETURN idEncontrado;
    END;   #CREADA
°°

Delimiter °°
°°
CREATE FUNCTION getIDfromTel()
RETURNS INT
	BEGIN
		DECLARE idEncontrado INT;
        DECLARE EXIT HANDLER  FOR SQLEXCEPTION
        SELECT idTelefono
        INTO idEncontrado
        FROM Telefono
        WHERE telefono=telefono;
        RETURN idEncontrado;
    END;   #CREADA
°°

Delimiter °°
°°    
    
    CREATE PROCEDURE DeleteTelFromUser(IN pTelefono VARCHAR(20))
	BEGIN
		DECLARE idEncontrado INT;
        idEncontrado = CALL getIDfromTel(VARCHAR)
    
    END
°°

Delimiter °°

CREATE PROCEDURE DeleteCorreoFromUser
	BEGIN
    
    END


°°
Delimiter °°

CREATE PROCEDURE UpdateCorreoFromUser
	BEGIN
    
    END


°°
Delimiter °°

CREATE PROCEDURE UpdateTelFromUser
	BEGIN
    
    END

°°
Delimiter °°
°°
CREATE FUNCTION getEdadFromUserId(idUser INT)
RETURNS INT
BEGIN
DECLARE edad INT;
SELECT  TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) 
INTO edad
FROM Persona
WHERE idPersona=idpersonaUser;
RETURN edad;
END; #CREADA
°°
Delimiter °°
°°
SELECT Nombre, getIDFromUsername(username)
FROM PERSONA;
°°
 SHOW PROCESSLIST;
 SET GLOBAL event_scheduler = ON;

CREATE EVENT 'envio_correo'


#ALTER TABLE tablename AUTO_INCREMENT = 1

Delimiter °°
°°
CREATE FUNCTION getIDFromUsername(pUsername VARCHAR(45))
RETURNS INT
BEGIN
DECLARE id INT;
DECLARE CONTINUE HANDLER  FOR SQLEXCEPTION  SET id=NULL;
SELECT  idPersona
INTO id
FROM Persona
WHERE username=pUsername;
RETURN id; #CREADA
END
°°

Delimiter °°
°°
CREATE FUNCTION getUsernameFromID(pID INT)
RETURNS VARCHAR(45)
BEGIN
DECLARE usernamea VARCHAR(45);
SELECT  username
INTO usernamea
FROM Persona
WHERE  idPersona=pID;
RETURN usernamea; #CREADA
END
°°

DROP  FUNCTION getUsernameFromID;

Delimiter °°
°°
CREATE FUNCTION doesUserExists (pID INT)
RETURNS INT
BEGIN 
	DECLARE result INT;
    SELECT count(username)
		INTO result
		FROM Persona
		Where idPersona=pID;
	IF result=1 THEN
		SET result=1;
        RETURN result;
	ELSE
		SET result=0;
        RETURN result;
	END IF; #CREADA
END
°°