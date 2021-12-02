USE ProyFinal
DECLARE @vendido INT
SET @VENDIDO = (SELECT count(CantidadVenta) FROM Detalle WHERE IdProducto = 2);
SELECT @Vendido




SELECT p.NombreProducto [Articulo],
p.StockProducto [Stock],
(SELECT count(CantidadVenta) FROM Detalle WHERE Detalle.IdProducto = p.IdProducto)[Vendido],
(p.StockProducto + (SELECT count(CantidadVenta) FROM Detalle WHERE Detalle.IdProducto = p.IdProducto))[Comprado],
p.EstadoProducto [Existencia],
p.PCProducto [Costo],
p.PVProducto [Precio Maximo]
-- p.PVProducto > p.PCProducto ? GANANCIA : Perdida [Perdida/Ganancia]
FROM Producto p




/* SQL SERVER*/

GO
CREATE PROCEDURE estGeneralArts
AS

DROP TABLE IF EXISTS #TempProducto
CREATE TABLE #TempProducto(
	Articulo varchar(30),
	Stock int,
	Vendido int,
	Comprado int,
	Existencia bit,
	Costo decimal(9,1),
	PrecioMaximo decimal(9,1),
	PerdidaGanancia varchar(30)
)

DECLARE @nom varchar(30), 
@stock int, 
@vend int,
@comp int,
@exis bit,
@costo decimal(9,2),
@precio decimal(9,2),
@perd_gan decimal(9,2),
@txt_perd_gan varchar(30);

DECLARE miCursor CURSOR FOR
SELECT p.NombreProducto,p.StockProducto,
(SELECT count(CantidadVenta) 
	FROM Detalle 
	WHERE Detalle.IdProducto = p.IdProducto
),
0,
p.EstadoProducto,p.PCProducto,p.PVProducto,p.PVProducto
FROM Producto p;

OPEN miCursor
FETCH NEXT FROM miCursor 
	INTO @nom, @stock, @vend, @comp, @exis, @costo, @precio, @perd_gan
WHILE @@FETCH_STATUS = 0 BEGIN
FETCH NEXT FROM miCursor 
	INTO @nom, @stock, @vend, @comp, @exis, @costo, @precio, @perd_gan
	SET @comp = @stock + @vend
	IF @perd_gan > @costo
	SET @txt_perd_gan = 'GANANCIA'
	ELSE
	SET @txt_perd_gan = 'PERDIDA'

	INSERT INTO #TempProducto VALUES(
		@nom, @stock, @vend, @comp, @exis, @costo, @precio, @txt_perd_gan
	)

END 
SELECT * FROM #TempProducto
CLOSE miCursor
DEALLOCATE miCursor
GO

EXEC estGeneralArts