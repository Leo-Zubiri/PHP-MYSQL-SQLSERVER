<?php
    include_once "encabezado.php";
    include_once "left.php";
    include_once "DB/CRUD.php";

    if(isset($_GET["server"])){
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
        $opcDB = $_GET["server"];
        $clientes = getEstClientes($opcDB);
        
        $cols = getNombreProductos($opcDB);
    }else{
    }
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <h2>Estadística de Cliente-Artículos</h2>

            <div class="row">
            <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-success">
                                <tr>
                                    <th>Nombre Cliente</th>
                                <?php foreach($cols as $col){ ?>
                                    <th><?php echo $col->NombreProducto ?></th>
                                <?php } ?>
                                <tr>
                                    
                                </tr>
                            </thead>
                            <tbody>     
                                <?php foreach($clientes as $cl){ ?>
                                    <tr>
                                        <td><?php echo $cl->NombreCliente ?></td>
                                        <?php foreach($cols as $col){ ?>
                                        <th><?php 
                                            $nombre = $col->NombreProducto;
                                            echo $cl->$nombre; ?></th>
                                        <?php } ?>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            </div>
              
        </div>
<?php
    include_once "foot.php";
?>