<?php
    require 'clases/Conexion.php';
    require 'clases/Marca.php';
    require 'clases/Categoria.php';
    require 'clases/Producto.php';
    $objMarca = new Marca;
    $listadoMarcas = $objMarca->listarMarcas();
    $objCategoria = new Categoria;
    $listadoCategorias = $objCategoria->listarCategorias();
    $objProducto = new Producto;
    $idProducto = $_GET['idProducto'];
    $detalleProducto = $objProducto->verProductoPorId($idProducto);
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario de modificación de un Producto</h1>

    <form action="editarProducto.php" method="post" enctype="multipart/form-data">
        Nombre: <br>
        <input type="text" name="prdNombre" value="<?php echo $detalleProducto['prdNombre'] ?>" class="form-control" required>
        <br>
        Precio: <br>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$</div>
            </div>
            <input type="text" name="prdPrecio" value="<?php echo $detalleProducto['prdPrecio'] ?>" class="form-control" required>
        </div>
        <br>
        Marca: <br>
        <select name="idMarca" class="form-control" required>
            <option value="<?php echo $detalleProducto['idMarca'] ?>"><?php echo $detalleProducto['mkNombre'] ?></option>
<?php
            foreach ($listadoMarcas as $marca) {             
?>            
            <option value="<?php echo $marca['idMarca'] ?>"> <?php echo $marca['mkNombre'] ?> </option>
<?php
            }
?>
        </select>
        <br>
        Categoría: <br>
        <select name="idCategoria" class="form-control" required>

<?php   foreach ($listadoCategorias as $categoria){  ?>

            <option <?php
                        if($categoria['idCategoria']==$detalleProducto['idCategoria']){
                            echo 'selected';
                        }
                    ?> value="<?php echo $categoria['idCategoria'] ?>"> <?php echo $categoria['catNombre'] ?> </option>
<?php   }    ?>
        </select>
        <br>
        Presentacion: <br>
        <textarea name="prdPresentacion" class="form-control"><?php echo $detalleProducto['prdPresentacion'] ?></textarea>
        <br>
        Stock: <br>
        <input type="number" name="prdStock" value="<?php echo $detalleProducto['prdStock'] ?>" class="form-control">
        <br>
        Imagen acctual:
        <img src="images/productos/<?php echo $detalleProducto['prdImagen'] ?>">
        <br>
        Imagen: <br>
        <input type="file" name="prdImagen" class="form-control">
        <br>
        <input type="submit" value="Modificar Producto" class="btn btn-warning mb-3">
        <a href="adminProductos.php" class="btn btn-light mb-3">Volver al panel de Productos</a>
    </form>

</main>

<?php  include 'includes/footer.php';  ?>