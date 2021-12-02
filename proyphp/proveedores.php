<?php
    include "encabezado.php";
    include "left.php";
    include_once "DB/CRUD.php";

    if(isset($_GET["server"])){
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
        $opcDB = $_GET["server"];
        $proveedor = getData($opcDB);
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
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>RUC</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Editar | Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--
                                Atención aquí, sólo esto cambiará
                                Pd: no ignores las llaves de inicio y cierre {}
                                -->
                                <?php foreach($proveedor as $prov){ ?>
                                    <tr>
                                        <td><?php echo $prov->idProveedor ?></td>
                                        <td><?php echo $prov->nombreProveedor ?></td>
                                        <td><?php echo $prov->RUCProveedor ?></td>
                                        <td><?php echo $prov->direccionProveedor ?></td>
                                        <td><?php echo $prov->TelefonoProveedor ?></td>
                                        <td><?php echo $prov->FechaRegistro ?></td>
                                        <td><?php echo $prov->EstadoProveedor ?></td>
                                        <td>
                                        <a class="btn table-active text-white" href="<?php echo "editProveedor.php?server=".$opcDB."&id=" . $prov->idProveedor?>" >📝
                                        </a> | <a class="btn table-danger text-white" href="<?php echo "DB/action.php?action=DEL&server=".$opcDB."&id=" . $prov->idProveedor?>">🗑️</a></td>
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

