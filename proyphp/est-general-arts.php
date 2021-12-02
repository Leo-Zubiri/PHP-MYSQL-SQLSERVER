<?php
    include "encabezado.php";
    include "left.php";
    include_once "DB/CRUD.php";

    if(isset($_GET["server"])){
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
        $opcDB = $_GET["server"];
        $stats= getEstGeneralArts($opcDB);
        print_r(array_values($stats));
    }else{
    }
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="form-group row">
                                
                                <div class="col-sm-1">
                               
                                <a href="<?php echo "crearProveedor.php?server=".$opcDB ?>" class="btn btn-success btn-sm">Agregar Nuevo Proveedor</a>
                                </div> 
                    
                            </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-success">
                                <tr>
                                    <th>Artículo</th>
                                    <th>Stock</th>
                                    <th>Vendido</th>
                                    <th>Comprado</th>
                                    <th>Existencia</th>
                                    <th>PrecioMaximo</th>
                                    <th>PerdidaGanancia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--
                                Atención aquí, sólo esto cambiará
                                Pd: no ignores las llaves de inicio y cierre {}
                                -->
                                <?php foreach($stats as $s){ ?>
                                    <tr>
                                        <td><?php echo $s->Articulo ?></td>
                                        <td><?php echo $s->Stock ?></td>
                                        <td><?php echo $s->Vendido ?></td>
                                        <td><?php echo $s->Comprado ?></td>
                                        <td><?php echo $s->Existencia ?></td>
                                        <td><?php echo $s->PrecioMaximo ?></td>
                                        <td><?php echo $s->PerdidaGanancia ?></td>
                                        <td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>      
        </div>
           


<?php
include "foot.php";
?>
