<?php
include_once "encabezado.php";
include_once "left.php";
include_once "DB/CRUD.php";

if(isset($_GET["server"])){
        $opcDB = $_GET["server"]; 
        echo '<script type="text/javascript"> setDBimages('.$opcDB.'); </script> ';  
}else{
        echo '<script type="text/javascript">
        window.location = "http://localhost/proyphp/index.php?server=1"
        </script>';
}
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                    <h2 class="pageheader-title">Base de Datos Avanzada Corporativa </h2>                       
                        <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Base de Datos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Base de Datos Corporativa</li>
                        </ol>
                        </nav>
                    </div>
                </div>      
            </div>
        </div>
                   
    <div class="ecommerce-widget">
        <div class="row">
		    <div class="m-r-10"><img src="assets/images/logo.jpg" ></div>
                <div> 
                    <div> 
                    <a href="index.php?server=1" onclick="setDB(1);" class="btn btn-rounded btn-success">Enlazar a Mysql</a>
                    <a href="index.php?server=2" onclick="setDB(2);" class="btn btn-rounded btn-primary">Enlazar a SQL</a>                
                    </div>               
                </div>    	
            </div>
        </div>
    </div>
</div>

<?php
include "foot.php";
?>