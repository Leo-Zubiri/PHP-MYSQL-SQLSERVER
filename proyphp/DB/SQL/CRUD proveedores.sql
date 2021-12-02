---    MYSQL
---CREATE
DELIMITER $$ 
CREATE PROCEDURE crearProveedor(
    IN nomP varchar(50),
    IN RUC varchar(11),
    IN direc varchar(70),
    IN tel varchar(10),
    IN fecha date,
    IN estado tinyint(1)
) 
BEGIN
INSERT INTO `dbo.Proveedor`(
    nombreProveedor,
    RUCProveedor,
    direccionProveedor,
    TelefonoProveedor,
    FechaRegistro,
    EstadoProveedor
)
VALUES (nomP,RUC,direc,tel,fecha,estado);
END$$ 

CALL crearProveedor("Hedson Zubiri","1111111","Altamira","8332321226","2021-11-24",1);


--READ
DELIMITER $$
CREATE PROCEDURE getProveedores()
BEGIN
    SELECT * FROM `dbo.proveedor`;
END $$

CALL getProveedores();

DELIMITER $$
CREATE PROCEDURE getProveedorByID(IN id int)
BEGIN
    SELECT * FROM `dbo.proveedor` where idProveedor = id;
END $$

CALL getProveedorByID(11);


--UPDATE
DELIMITER $$ 
CREATE PROCEDURE updateProveedor(
    IN id int,
    IN nomP varchar(50),
    IN RUC varchar(11),
    IN direc varchar(70),
    IN tel varchar(10),
    IN fecha date,
    IN estado tinyint(1)
) 
BEGIN
UPDATE `dbo.Proveedor`
SET
    nombreProveedor=nomP,
    RUCProveedor = RUC,
    direccionProveedor= direc ,
    TelefonoProveedor = tel,
    FechaRegistro = fecha,
    EstadoProveedor = estado
WHERE idProveedor = id;
END $$ 

CALL updateProveedor(11,"Hedson Zubiri","1","Altamira","8332321226","2021-11-24",0);


--DELETE
DELIMITER $$
CREATE PROCEDURE delProveedorByID(IN id int)
BEGIN
    DELETE FROM `dbo.proveedor` WHERE idProveedor=id;
END $$

CALL delProveedorByID(11);






---     SQL SERVER
---CREATE
GO
CREATE PROCEDURE crearProveedor(
	@nomP varchar(50),
    @RUC varchar(11),
    @direc varchar(70),
    @tel varchar(10),
    @fecha date,
    @estado bit
)
AS
INSERT INTO Proveedor(
    nombreProveedor,
    RUCProveedor,
    direccionProveedor,
    TelefonoProveedor,
    FechaRegistro,
    EstadoProveedor
)
VALUES (@nomP,@RUC,@direc,@tel,@fecha,@estado);

GO
EXEC crearProveedor "Hedson Zubiri","1111111","Altamira","8332321226","2021-11-24",1;


---READ
GO
CREATE PROCEDURE getProveedores
AS
SELECT * FROM Proveedor;

GO
EXEC getProveedores;


GO
CREATE PROCEDURE getProveedorByID(@id int)
AS
SELECT * FROM Proveedor
WHERE idProveedor=@id;

GO
EXEC getProveedorByID 11;


--UPDATE
GO
CREATE PROCEDURE updateProveedor(
	@id int,
	@nomP varchar(50),
    @RUC varchar(11),
    @direc varchar(70),
    @tel varchar(10),
    @fecha date,
    @estado bit
)
AS
UPDATE Proveedor
SET
    nombreProveedor = @nomP,
    RUCProveedor = @RUC,
    direccionProveedor = @direc,
    TelefonoProveedor = @tel,
    FechaRegistro = @fecha,
    EstadoProveedor = @estado
WHERE idProveedor = @id;

GO
EXEC updateProveedor 11,"Leo Zubiri","1111111","Altamira","8332321226","2021-11-24",1;


---DELETE
GO
CREATE PROCEDURE delProveedorByID(@id int)
AS
DELETE FROM Proveedor
WHERE idProveedor = @id;

GO

EXEC delProveedorByID 11