<?php 
	require 'clases/Conexion.php'; 
    require 'clases/Producto.php';
    $objProducto=new Producto;
    $chequeo=$objProducto->editarProducto();
 ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

	<main class='container'>
		<h1>Modificacion de un producto</h1>
		<?php 
	if($chequeo==1){
 ?>
 			<div class="alert alert-success">
                Producto <span class="badge badge-pill badge-success">
                        <?php echo $objProducto->getPrdNombre() ?>
                </span> con el id <span class="badge badge-pill badge-success">
                        <?php echo $objProducto->getIdProducto() ?>
                </span> Modificacion con éxito.
                <br>
                <a href="adminProductos.php" class="btn btn-light">Volver Admin Producto</a>
                <a href="agregarProductos.php" class="btn btn-light">Agregar otro Producto</a>
                <a href="modificarProductos.php" class="btn btn-light">Modificar Producto</a>
            </div>
<?php            
        }
?>
	</main>

<?php  include 'includes/footer.php';  ?>