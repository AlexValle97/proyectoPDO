<?php 

	class Marca
	{
		private $idMarca;
		private $mkNombre;

	public function listarMarcas()
	{
		$link = Conexion::conectar();
        $sql='SELECT idMarca, mkNombre
                        From marcas';
        $resultado = $link->query($sql);
        $listadoMarca = $resultado->fetchALL();
        return $listadoMarca;
	}
    public function cargarDatosDesdeForm()
    {
        if(isset($_POST['idMarca'])){
            $this->setIdMarca($_POST['idMarca']);
        };
        if(isset($_POST['mkNombre'])){
            $this->setMkNombre($_POST['mkNombre']);
        };
    }
    public function agregarMarca()
    {
        $this->cargarDatosDesdeForm();
        $link=Conexion::conectar();
        $sql="INSERT INTO marcas
                        ( mkNombre )
                        VALUES
                        (:mkNombre)";
        $stmt=$link->prepare($sql);
        $mkNombre=$this->getMkNombre();
        $stmt->bindParam(':mkNombre', $mkNombre, PDO::PARAM_STR);
        if($stmt->execute()){
            $this->setIdMarca($link->lastInertId());
            return true;
        }
        return false;
    }
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    public function getMkNombre()
    {
        return $this->mkNombre;
    }

    public function setMkNombre($mkNombre)
    {
        $this->mkNombre = $mkNombre;

        return $this;
    }
}

 ?>