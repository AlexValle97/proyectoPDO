<?php
    require 'clases/Conexion.php';
    require 'clases/Marca.php';
    $idMarca = $_GET['idMarca'];
    $objMarca = new Marca;
    $detalleMarca = $objMarca->verMarcaPorId($idMarca);
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario de modificaciónn de una Marca</h1>

    <form action="editarMarca.php" method="post">
        Nombre de la marca:
        <br>
        <input type="text" name="mkNombre" value = "<?php echo $detalleMarca['mkNombre']; ?>" class="form-control">
        <br>
        <input type="hidden" name="idMarca" value="<?php echo $detalleMarca['idMarca']; ?>">
        <input type="submit" value="Modificar Marca" class="btn btn-warning">
        <a href="admin.php" class="btn btn-outline-secondary">Volver a principal</a>
    </form>
</main>

<?php  include 'includes/footer.php';  ?>