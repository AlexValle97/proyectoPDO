<?php  include 'includes/header.html';    
	   include 'includes/nav.php';
	   $objMarca = new Marca;
	   $chequeo=$objMarca -> agrgarMarca();
	   require 'clases/Conexion.php'; 
       require 'clases/Marca.php';
      ?>

<main class="container">
	<h1>Alta de una Nueva Marca</h1>
<?php 
	if($chequeo){
 ?>
 			<div class="alert alert-success">
                Marca <span class="badge badge-pill badge-success">
                        <?php echo $objMarca->getMkNombre() ?>
                </span> con el id <span class="badge badge-pill badge-success">
                        <?php echo $objMarca->getIdMarca() ?>
                </span> agregada con éxito.
                <br>
                Volver a Admin marcas - Agregar otra Marca - Modificar esta Marca
            </div>
<?php            
        }
?>

</main>

<?php  include 'includes/footer.php';  ?>