<?php
    include_once "encabezado.php";
    include_once "left.php";
    include_once "DB/CRUD.php";

    if(isset($_GET["server"])){
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
        $opcDB = $_GET["server"];
        $Ventas = getDataArtsCliente($opcDB,'Perez Castillo');
    }else{
    }
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <h2>Consultar Compras de Cliente</h2>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Nombre Cliente">
                    <small id="helpId" class="form-text text-muted">Nombre y/o apellidos</small>
                    </div>
                </div>
            </div>    

            <div class="col">
                <div class="form-group">
                    <label for=""></label>
                    <a name="" id="" class="btn btn-primary" href="" role="button">Consultar</a>
                </div>
            </div>

            <div class="row">
            <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-success">
                                <tr>
                                    <th>ID Cliente</th>
                                    <th>Nombre</th>
                                    <th>ID Producto</th>
                                    <th>Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Ventas as $venta){ ?>
                                    <tr>
                                        <td><?php echo $venta->IdCliente ?></td>
                                        <td><?php echo $venta->NombreCliente ?></td>
                                        <td><?php echo $venta->IdProducto ?></td>
                                        <td><?php echo $venta->NombreProducto ?></td>
                                        <td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            </div>
              
        </div>
<?php
    include_once "foot.php";
?>