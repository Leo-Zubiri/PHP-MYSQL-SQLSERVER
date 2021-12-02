<?php
include_once "encabezado.php";
include_once "left.php";
include_once "DB/CRUD.php";

$prov=null;

if(isset($_GET["server"]) && isset($_GET["id"])){
    $opcDB = $_GET["server"];
    echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
    $id = $_GET["id"];
    $proveedor = getProveedorByID($id,$opcDB);
    
}

if (!$proveedor) {
    #No existe
    echo "¡No existe proveedor con ese ID!";
    exit();
}


#Si proveedor existe, se ejecuta esta parte del código
?>


<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <?php foreach($proveedor as $prov){ ?>

                    <div class="row">
                        <div class="col-12">
                            <h2>Editar Proveedor</h2>
                            
        
                            <form action="DB/action.php?action=PUT" method="POST">

                            <div class="form-group ">
                                <div class="col-sm-10">
                                    <input type="hidden" name="server" readonly class="form-control" id="id" value="<?php echo $opcDB ?>" >
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" name="id" readonly class="form-control" id="id" value="<?php echo $prov->idProveedor ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nombreProveedor" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" id="nombreProveedor" value="<?php echo $prov->nombreProveedor ?>" >
                                    <!-- <input class="form-control" type="text" placeholder="Default input"> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="RUC" class="col-sm-2 col-form-label">RUC</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ruc"  class="form-control" id="RUC" value="<?php echo $prov->RUCProveedor ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dir" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="col-sm-10">
                                    <input type="text" name="direc" class="form-control" id="dir" value="<?php echo $prov->direccionProveedor ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="tel" class="col-sm-2 col-form-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="tel" class="form-control" id="tel" value="<?php echo $prov->TelefonoProveedor ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="datetime" class="col-sm-2 col-form-label">Fecha Registro</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fecha" placeholder="AAAA-MM-DD" class="form-control" id="datetime" value="<?php echo $prov->FechaRegistro ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="estado" id="estado">
                                    <option value=1 >Activo</option>
                                    <option value=0 >Inactivo</option>
                                </select>
                                </div>
                            </div>
                            

                            
                            <div class="form-group row">
                                
                                <div class="col-sm-1">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                </div> 
                                
                                <div class="col-sm-10">
                                <a href="javascript: history.go(-1)" class="btn btn-warning">Volver</a>
                                </div>          
                            </div>

                            </form>
                                            
                        </div>
                    </div>

                <?php } ?>
				

                </div>
            </div>      
        </div>


<?php
include "foot.php";
?>
