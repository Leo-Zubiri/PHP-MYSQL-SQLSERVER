<?php
    include "encabezado.php";
    include "left.php";
    include_once "DB/CRUD.php";

    if(isset($_GET["server"])){
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
        $opcDB = $_GET["server"];
        $productos = getProductosDisp($opcDB);
    }else{
    }
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <h2>Compra</h2>
            <div class="row">
                
                    <div class="col-md-5">
                        
                        <select class="browser-default custom-select" name="producto" id="producto">
                            <?php foreach($productos as $prod) {?>
                                <option value=<?php echo $prod->IdProducto?> ><?php echo $prod->NombreProducto." ".$prod->MarcaProducto ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-7">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">+</a>
                    </div>

    
                
            </div> 

            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
                
            </div>  
            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>  
            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>  
            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>  
            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>  
            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>  
            <div class="row">
                <label for=""></label>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>  
            <div class="row">
                <label for=""></label>
                
            </div>  
            <div class="row">
                <label for=""></label>
            </div>  
            <div class="row">
                <label for=""></label>
            </div>  
            <div class="row">
                <label for=""></label>
            </div>  

            <div class="row">
                <a name="" id="" class="btn btn-primary" href="#" role="button">Confirmar compra</a>
            </div>     
        </div>

<?php
include "foot.php";
?>

