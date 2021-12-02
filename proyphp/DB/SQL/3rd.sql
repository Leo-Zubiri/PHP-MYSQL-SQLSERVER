/*
1.	En donde usted indique la fecha inicial y la fecha final y devuelva todas las ventas que correspondan con ese rango de fechas.
*/


---SQL SERVER
USE ProyFinal

GO
CREATE PROCEDURE betweenVentaFechas(
	@fechaIni DATE,
	@fechaFin DATE
) AS
SELECT v.IdVendedor,v.NombreVendedor, c.NombreCliente,f.Total,f.Fecha	
FROM Facturas f 
INNER JOIN Cliente c 
ON c.IdCliente = f.IdCliente
INNER JOIN Vendedor v 
ON v.IdVendedor = f.IdVendedor
WHERE f.Fecha BETWEEN @fechaIni AND @fechaFin

GO

EXEC betweenVentaFechas '2013/01/01', '2013/12/31'


---MySQL
DELIMITER $$
CREATE PROCEDURE betweenVentaFechas(fechaIni DATE,fechaFin DATE)
BEGIN
SELECT v.IdVendedor,v.NombreVendedor, c.NombreCliente,f.Total,f.Fecha	
FROM `dbo.facturas` f 
INNER JOIN `dbo.cliente` c 
ON c.IdCliente = f.IdCliente
INNER JOIN `dbo.vendedor` v 
ON v.IdVendedor = f.IdVendedor
WHERE f.Fecha BETWEEN fechaIni AND fechaFin;
END$$  

CALL betweenVentaFechas('2013/01/01', '2013/12/31');




/*
2.	En donde se ingrese el nombre del cliente y devuelva los artículos que se compran por ese cliente
*/

/*SQL SERVER*/

CREATE PROCEDURE getProductosByNomCliente(@nombre varchar(50))
AS
select distinct cl.IdCliente,cl.NombreCliente,detFac.IdProducto,p.NombreProducto from Facturas fac
inner join Cliente cl
on fac.IdCliente = cl.IdCliente
inner join Detalle detFac
on detFac.num_fact = fac.num_fact
inner join Producto p
on p.IdProducto = detFac.IdProducto
where cl.NombreCliente+' '+cl.ApellidoCliente like '%'+ @nombre + '%';

GO
EXEC getProductosByNomCliente 'Juan Perez Castillo' ;
EXEC getProductosByNomCliente 'Andrea Luna Vera' ;
EXEC getProductosByNomCliente 'Roberto Lopez Castro' ;

/* MySQL */

DELIMITER $$
CREATE PROCEDURE getProductosByNomCliente(
    nombre varchar(50)
) BEGIN
SELECT DISTINCT cl.IdCliente,cl.NombreCliente,d.IdProducto,p.NombreProducto
FROM `dbo.facturas` f
INNER JOIN `dbo.cliente` cl 
ON cl.IdCliente = f.IdCliente
INNER JOIN `dbo.Detalle` d
ON d.num_fact = f.num_fact
INNER JOIN `dbo.Producto` p
ON p.IdProducto = d.IdProducto
WHERE CONCAT(cl.NombreCliente,' ',cl.ApellidoCliente) LIKE CONCAT('%',nombre,'%');
END$$ 

CALL getProductosByNomCliente('Andrea Luna');
