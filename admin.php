<?php  require 'config/config.php';  ?>
<?php  require 'autenticar.php';  ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>


<main class="container">


    <div class="list-group col-md-9 mx-auto">
        <h1> <i class="fas fa-home mr-2"></i> Panel de administración principal</h1>

        <a href="adminMarcas.php" class="list-group-item list-group-item-action">
            <i class="fas fa-trademark mr-3"></i>
            Panel de administración de Marcas
        </a>
        <a href="adminCategorias.php" class="list-group-item list-group-item-action">
            <i class="fas fa-list-ul mr-3"></i>
            Panel de administración de Categorías
        </a>
        <a href="adminProductos.php" class="list-group-item list-group-item-action">
            <i class="fas fa-th-list mr-3"></i>
            Panel de administración de Productos
        </a>
        <a href="adminUsuarios.php" class="list-group-item list-group-item-action">
            <i class="fas fa-users mr-3"></i>
            Panel de administración de Usuarios
        </a>

    </div>


</main>

<?php  include 'includes/footer.php';  ?>