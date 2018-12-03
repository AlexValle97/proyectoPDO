<?php

    class Producto
    {
        private $idProducto;
        private $prdNombre;
        private $prdPrecio;
        private $idMarca;
        private $idCategoria;
        private $prdPresentacion;
        private $prdStock;
        private $prdImagen;

        public function listarProductos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT 
                    idProducto, prdNombre, prdPrecio, mkNombre, catNombre, prdPresentacion, prdStock, prdImagen 
                  FROM 
                      productos AS p, marcas AS m, categorias AS c  
                  WHERE 
                      p.idMarca = m.idMarca 
                  AND p.idCategoria = c.idCategoria";
            $resultado = $link->query($sql);
            $listadoProductos = $resultado->fetchAll();
            return $listadoProductos;
        }

        public function verProductoPorId($id)
        {
            $link = Conexion::conectar();
            $sql = "SELECT 
                    idProducto, prdNombre, prdPrecio, mkNombre, p.idMarca, catNombre, c.idCategoria, prdPresentacion, prdStock, prdImagen 
                  FROM 
                      productos AS p, marcas AS m, categorias AS c  
                  WHERE 
                      p.idMarca = m.idMarca 
                  AND p.idCategoria = c.idCategoria
                  AND idProducto = :idProducto";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idProducto', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
        public function cargarDatosDesdeForm()
        {
            if ( isset($_POST['idProducto']) ){
                $this->setIdProducto($_POST['idProducto']);
            }
            /*
                prdNombre
                prdPrecio
                idMarca
                idCategoria
                prdPresentacion
                prdStock
             * */

            // en alta esta bien en modificación no
            $this->setPrdImagen($this->subirImagen());
        }

        public function subirImagen()
        {
            $prdImagen = 'noDisponible.jpg';
            if( isset($_POST['prdImagenOriginal']) ){
                $prdImagen = $_POST['prdImagenOriginal'];
            }
            $ruta = 'images/productos/';
            if( $_FILES['prdImagen']['error'] == 0 ){
                $prdImagenTMP = $_FILES['prdImagen']['tmp_name'];
                $prdImagen = $_FILES['prdImagen']['name'];
                move_uploaded_file($prdImagenTMP, $ruta.$prdImagen);
            }
            return $prdImagen;
        }

        public function agregarProducto()
        {

        }
        public function editarProducto()
        {
            $this->cargarDatosDesdeForm();
            $link=Conexion::conectar;
            $sql="UPDATE productos
                        SET 
                            prdNombre = :prdNombre,
                            prdPrecio = :prdPrecio,
                            idMarca = :idMarca,
                            idCategoria = :idCategoria,
                            prdPresentacion=:prdPresentacion,
                            prdStock = :prdStock,
                            prdImagen = :prdImagen
                            WHERE idProducto = :idProducto";
            $stmt=$link->prepare($sql);
            $prdNombre=$this->getPrdNombre();
            $stmt->bindParam(':prdNombre',$prdNombre);
            $prdPrecio=$this->getPrdPrecio();
            $stmt->bindParam(':prdPrecio',$prdPrecio);
            $idMarca=$this->getidMarca();
            $stmt->bindParam(':idMarca',$idMarca);
            $idCategoria=$this->getIdCategoria();
            $stmt->bindParam(':idCategoria',$idCategoria);
            $prdPresentacion=$this->getPrdPresentacion();
            $stmt->bindParam(':prdPresentacion',$prdPresentacion);
            $prdStock=$this->getPrdStock();
            $stmt->bindParam(':prdStock',$prdStock);
            $prdImagen=$this->getPrdImagen();
            $stmt->bindParam(':prdImagen',$prdImagen);
            $idProducto=$this->getIdProducto();
            $stmt->bindParam(':idProducto',$idProducto);
            $stmt->execute();
            $chequeo=$stmt->rowCount();            
        }
        public function getIdProducto()
        {
            return $this->idProducto;
        }
        public function setIdProducto($idProducto)
        {
            $this->idProducto = $idProducto;
        }

        public function getPrdNombre()
        {
            return $this->prdNombre;
        }
        public function setPrdNombre($prdNombre)
        {
            $this->prdNombre = $prdNombre;
        }

        public function getPrdPrecio()
        {
            return $this->prdPrecio;
        }
        public function setPrdPrecio($prdPrecio)
        {
            $this->prdPrecio = $prdPrecio;
        }

        public function getIdMarca()
        {
            return $this->idMarca;
        }
        public function setIdMarca($idMarca)
        {
            $this->idMarca = $idMarca;
        }

        public function getIdCategoria()
        {
            return $this->idCategoria;
        }
        public function setIdCategoria($idCategoria)
        {
            $this->idCategoria = $idCategoria;
        }

        public function getPrdPresentacion()
        {
            return $this->prdPresentacion;
        }
        public function setPrdPresentacion($prdPresentacion)
        {
            $this->prdPresentacion = $prdPresentacion;
        }

        public function getPrdStock()
        {
            return $this->prdStock;
        }

        public function setPrdStock($prdStock)
        {
            $this->prdStock = $prdStock;
        }

        public function getPrdImagen()
        {
            return $this->prdImagen;
        }
        public function setPrdImagen($prdImagen)
        {
            $this->prdImagen = $prdImagen;
        }

    }
