<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>
<?php  require 'clases/Conexion.php'; 
       require 'clases/Marca.php'; ?>

<main class="container">
    <h1>Formulario de alta de un nuevo Producto</h1>

    <form action="agregarProducto.php" method="post" enctype="multipart/form-data">
        Nombre: <br>
        <input type="text" name="prdNombre" class="form-control" required>
        <br>
        Precio: <br>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$</div>
            </div>
            <input type="text" name="prdPrecio" class="form-control" required>
        </div>
        <br>
        Marca: <br>
        <select name="idMarca" class="form-control" required>
            <option value="">Seleccione una marca</option>
            <option value="1"> marca </option>
        </select>
        <br>
        Categoría: <br>
        <select name="idCategoria" class="form-control" required>
            <option value="">Seleccione una Categoría</option>
            <option value="1"> categoria </option>
        </select>
        <br>
        Presentacion: <br>
        <textarea name="prdPresentacion" class="form-control"></textarea>
        <br>
        Stock: <br>
        <input type="number" name="prdStock" class="form-control">
        <br>
        Imagen: <br>
        <input type="file" name="prdImagen" class="form-control">
        <br>
        <input type="submit" value="Agregar Producto" class="btn btn-success mb-3">
        <a href="adminProductos.php" class="btn btn-light mb-3">Volver al panel de Productos</a>
    </form>

</main>

<?php  include 'includes/footer.php';  ?>