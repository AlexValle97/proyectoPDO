<?php  require 'config/config.php';
       require 'autenticar.php';              
       include 'includes/header.html';    
       include 'includes/nav.php';   
	   
	 $objCategoria = new Categoria;
	 $listadoCategorias=$objCategoria->listarCategorias();
?>

<main class="container">
    <h1>Panel de administracion de Categorias</h1>
    <table class="table table-stripped table-hover table-border">
    	<thead class="thead-dark">
    		<tr>
    			<th>id</th>
    			<th>Categoria</th>
    			<th colspan"2">
					<a href="formAgregarMarca.php" class="btn btn-dark">agregar</a>
    			</th>
                <th></th>
    		</tr>
    	</thead>
    	<tbody>
    		 <?php
             foreach ($listadoCategorias as $categoria){
                ?>
                <tr>
    			<td><?php echo $categoria['idCategoria']; ?></td>
    			<td><?php echo $categoria['catNombre'];?></td>
    			<td>
    				<a href="formEditarMarca.php?idMarca=<?php echo $marca['idMarca']?>" class="btn btn-light">modificar</a>
    			<td>
    				<a href="formEliminarMarca.php" class="btn btn-light">eliminar</a>
    			</td>
                </tr>
             <?php
                } 
                 ?>
    	</tbody>
    </table>
</main>

<?php  include 'includes/footer.php';  ?>