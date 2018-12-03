<?php require 'config/config.php' ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

	<main class="container">
	<h1>Panel de Login</h1>

		<form action="login.php" method="post">
		Usuario: <br>
		<input type="email" name="usuEmail" class="form-control" placeholder="Ingrese Email">
		<br>
		Clave: <br>
		<input type="password" name="usuPass" class="form-control" placeholder="Ingrese Contraseña">
		<br>
		<input type="submit" value="Ingresar" class="btn btn-success" >
		</form>
<?php 
		if(isset($_GET['error'])){ 
            $error = $_GET['error'];
            if($error==1){
?>
		<!--<div class="alert alert-danger">
			usuario y/o clave Incorrectos
		</div> -->
		<script>
		swal({
		  title: 'Error!',
		  text: 'Usuario y/o Clave Incorrectos',
		  type: 'error',
		  confirmButtonText: 'Continuar'
		})
		</script>
<?php
            }
            else if($error==2){
?>
		<script>
		swal({
		  title: 'Error!',
		  text: 'Debe Logearse Primero',
		  type: 'error',
		  confirmButtonText: 'Continuar'
		})
		</script>
<?php
            }
        }
?>
	</main>

<?php  include 'includes/footer.php';  ?>