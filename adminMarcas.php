<?php  require 'config/config.php';
       require 'autenticar.php';              
       include 'includes/header.html';    
       include 'includes/nav.php';   
	   
	 $objMarca = new Marca;
	 $listadoMarcas=$objMarca->listarMarcas();
?>

<main class="container">
    <h1>Panel de administracion de Marcas</h1>
    <table class="table table-stripped table-hover table-border">
    	<thead class="thead-dark">
    		<tr>
    			<th>id</th>
    			<th>marca</th>
    			<th colspan"2">
					<a href="formAgregarMarca.php" class="btn btn-dark">agregar</a>
    			</th>
                <th></th>
    		</tr>
    	</thead>
    	<tbody>
    		 <?php
             foreach ($listadoMarcas as $marca){
                ?>
                <tr>
    			<td><?php echo $marca['idMarca']; ?></td>
    			<td><?php echo $marca['mkNombre'];?></td>
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