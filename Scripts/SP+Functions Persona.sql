Delimiter °°
°°
CREATE PROCEDURE Insert_Persona(IN pNombre VARCHAR(50), IN pApellido VARCHAR(60), IN pCorreo VARCHAR(100), IN pTelefono VARCHAR(20), 
								IN fechaNacimiento DATE, IN pDireccion VARCHAR(100), In pSexo VARCHAR(40), IN tipoUser INT, 
                                IN pUsername VARCHAR(45), IN pPassword VARCHAR(100)) 
	BEGIN
		INSERT INTO persona (username, Password, Nombre, Apellido, Direccion,  Sexo, Fecha_Nacimiento, Tipo_Usuario
    END

°°

Delimiter °°


CREATE PROCEDURE AddTelToUser

	BEGIN
    
    END

°°

Delimiter °°


CREATE PROCEDURE AddCorreoToUser

	BEGIN
    
    END

°°
Delimiter °°


CREATE PROCEDURE DeleteTelFromUser
	BEGIN
    
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
WHERE idPersona=idUser;
RETURN edad;
END; #CREADA
°°
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
DROP FUNCTION getUsernameFromID;




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