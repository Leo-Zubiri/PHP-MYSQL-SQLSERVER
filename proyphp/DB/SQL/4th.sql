/*SQL Server------------------------------------------------------------------------------------------------------------------------------*/
use proyfinal
GO
CREATE PROCEDURE CantProductosClientes
AS
declare @query varchar(4000)
declare @cols varchar(2000)
declare @restrictions varchar(2000)

--Obtenemos las columnas del pivot
SET @restrictions = STUFF(
    (
        SELECT DISTINCT ',isnull(' + QUOTENAME(p.[NombreProducto])+',0) ' +  QUOTENAME(p.[NombreProducto])
        FROM [dbo].[Producto] p FOR XML
        PATH(''), TYPE 
    ).value('.','nvarchar(max)'), 1, 1, '');

SET @cols = STUFF(
    (
        SELECT DISTINCT ',' + QUOTENAME(p.[NombreProducto])
        FROM [dbo].[Producto] p FOR XML
        PATH(''), TYPE 
    ).value('.','nvarchar(max)'), 1, 1, '');

--CONCATENAR QUERY FINAL
SET @query = 'SELECT [NombreCliente], '+@restrictions+
    'from (
	select cl.[NombreCliente],p.[NombreProducto],detFac.[CantidadVenta] from [dbo].[Facturas] fac
	inner join [dbo].[Cliente] cl
	on fac.IdCliente = cl.IdCliente
	inner join [dbo].[Detalle]  detFac
	on detFac.num_fact = fac.num_fact
	inner join [dbo].[Producto]  p
	on p.IdProducto = detFac.IdProducto
	)x pivot (sum(CantidadVenta) for NombreProducto in ('+@cols+')) n'
EXECUTE(@query);

GO
EXEC CantProductosClientes; 



---Referencia del contenido Query Final:
select cl.NombreCliente,p.NombreProducto,detFac.CantidadVenta from Facturas fac
inner join Cliente cl
on fac.IdCliente = cl.IdCliente
inner join Detalle detFac
on detFac.num_fact = fac.num_fact
inner join Producto p
on p.IdProducto = detFac.IdProducto



/*MySQL-----------------------------------------------------------------------------------------------------------------------------------------*/

--- Pivote Estático 
SELECT cl.NombreCliente,
	SUM(IF(p.IdProducto=1, 1, 0))AS p1

FROM `dbo.facturas` fac
inner join `dbo.cliente` cl
on fac.IdCliente = cl.IdCliente
inner join `dbo.detalle` detFac
on detFac.num_fact = fac.num_fact
inner join `dbo.producto` p
on p.IdProducto = detFac.IdProducto
GROUP BY cl.NombreCliente;


--- Pivote Dinámico
set @cols = null;
SELECT GROUP_CONCAT(DISTINCT CONCAT( 
    ' SUM(IF(p.IdProducto=',IdProducto,', detFac.CantidadVenta, 0))AS `',NombreProducto,'`'
)) INTO @cols FROM `dbo.producto`;

SELECT(@cols);


set @SQL = CONCAT(
    'SELECT cl.NombreCliente,',@cols,
	' FROM `dbo.facturas` fac
	inner join `dbo.cliente` cl
	on fac.IdCliente = cl.IdCliente
	inner join `dbo.detalle` detFac
	on detFac.num_fact = fac.num_fact
	inner join `dbo.producto` p
	on p.IdProducto = detFac.IdProducto
	GROUP BY cl.NombreCliente;'
);
SELECT(@SQL);

PREPARE stmt FROM @SQL;
        execute stmt;
        deallocate prepare stmt;



--- Referencia MySQL
select cl.NombreCliente,p.NombreProducto,detFac.CantidadVenta from `dbo.facturas` fac
inner join `dbo.cliente` cl
on fac.IdCliente = cl.IdCliente
inner join `dbo.detalle` detFac
on detFac.num_fact = fac.num_fact
inner join `dbo.producto` p
on p.IdProducto = detFac.IdProducto;


/*    Concatenaciones de Nombres 1,2,3,4 o complejas    IF(N,1,0)
set @cols = null;
SELECT GROUP_CONCAT(DISTINCT CONCAT( 
    NombreProducto
)) INTO @cols FROM `dbo.producto`;

SELECT(@cols);

set @cols = null;
SELECT GROUP_CONCAT(DISTINCT CONCAT( 
    'ISNULL (',NombreProducto,',0) ',NombreProducto
)) INTO @cols FROM `dbo.producto`;

SELECT(@cols);

*/




DELIMITER $$
CREATE PROCEDURE CantProductosClientes()
BEGIN

set @cols = null;
SELECT GROUP_CONCAT(DISTINCT CONCAT( 
    ' SUM(IF(p.IdProducto=',IdProducto,', detFac.CantidadVenta, 0))AS `',NombreProducto,'`'
)) INTO @cols FROM `dbo.producto`;

set @SQL = CONCAT(
    'SELECT cl.NombreCliente,',@cols,
	' FROM `dbo.facturas` fac
	inner join `dbo.cliente` cl
	on fac.IdCliente = cl.IdCliente
	inner join `dbo.detalle` detFac
	on detFac.num_fact = fac.num_fact
	inner join `dbo.producto` p
	on p.IdProducto = detFac.IdProducto
	GROUP BY cl.NombreCliente;'
);

PREPARE stmt FROM @SQL;
        execute stmt;
        deallocate prepare stmt;

END$$ 

CALL CantProductosClientes();
