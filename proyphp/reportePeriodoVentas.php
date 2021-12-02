<?php
    include_once "encabezado.php";
    include_once "left.php";
    include_once "DB/CRUD.php";

    if(isset($_GET["server"])){
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
        $opcDB = $_GET["server"];
        $Ventas = getDataVentasPeriodo($opcDB,'2013/01/01','2013/12/31');
    }else{
    }
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <h2>Consultar Ventas</h2>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="YYYY-MM-DD">
                    <small id="helpId" class="form-text text-muted">Periodo Inicial</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="YYYY-MM-DD">
                    <small id="helpId" class="form-text text-muted">Periodo Final</small>
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
                                    <th>ID Vendedor</th>
                                    <th>Nombre</th>
                                    <th>Nombre Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Ventas as $venta){ ?>
                                    <tr>
                                        <td><?php echo $venta->IdVendedor ?></td>
                                        <td><?php echo $venta->NombreVendedor ?></td>
                                        <td><?php echo $venta->NombreCliente ?></td>
                                        <td><?php echo $venta->Total ?></td>
                                        <td><?php echo $venta->Fecha ?></td>
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