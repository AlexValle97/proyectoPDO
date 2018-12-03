<?php

    class Categoria
    {
        private $idCategoria;
        private $catNombre;

        public function listarCategorias()
        {
            $link = Conexion::conectar();
            $sql = "SELECT idCategoria, catNombre FROM categorias";
            $resultado = $link->query($sql);
            $listadoCategorias = $resultado->fetchAll();
            return $listadoCategorias;
        }

        public function verCategoriaPorId($id)
        {
            $link = Conexion::conectar();
            $sql = "SELECT idCategoria, catNombre 
                        FROM categorias
                        WHERE idCategoria = ".$id;
            $resultado = $link->query($sql);
            $detalleCategoria = $resultado->fetch();
            return $detalleCategoria;
        }

        public function getIdCategoria()
        {
            return $this->idCategoria;
        }
        public function setIdCategoria($idCategoria)
        {
            $this->idCategoria = $idCategoria;
        }

        public function getCatNombre()
        {
            return $this->catNombre;
        }
        public function setCatNombre($catNombre)
        {
            $this->catNombre = $catNombre;
        }

    }
