<?php 

	class Usuario
	{
			private $idUsuario;
			private $usuNombre;
			private $usuApellido;
			private $usuEmail;
			private $usuPass;

		public function login()
		{
			$usuEmail = $_POST['usuEmail'];
			$usuPass = $_POST['usuPass'];
			$link = Conexion::conectar();
			$sql = "SELECT usuNombre, usuApellido FROM usuarios
						WHERE usuEmail = :usuEmail
						AND usuPass = :usuPass";
			$stmt = $link->prepare($sql);
			$stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
			$stmt->bindParam(':usuPass', $usuPass, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()==0){
				header('location: formLogin.php?error=1');
			}
			else{
				$_SESSION['login']=1;
				$datosUsuario = $stmt->fetch();
				$_SESSION['usuNombre'] = $datosUsuario['usuNombre'];
				$_SESSION['usuApellido'] = $datosUsuario['usuApellido'];
				header('location: admin.php');
			}
		}
		public function logOut()
		{
			session_unset();
			session_destroy();
			header('refresh: 3; url=formLogin.php');
		}
		public function agregarUsuario()
		{
        $usuNombre = $_POST['usuNombre'];
        $usuApellido = $_POST['usuApellido'];
        $usuEmail = $_POST['usuEmail'];
        $usuPass = $_POST['usuPass'];
        $link = Conexion::conectar();
        $sql = "INSERT INTO usuarios 
                        ( usuNombre ), (usuApellido), (usuEmail), (usuPass)
                      VALUES 
                        ( :$usuNombre )
                        ( :$usuApellido )
                        ( :$usuEmail )
                        ( :$usuPass )";
        $stmt=$link->prepare($sql);
        $usuNombre=$this->getUsuNombre();
        $stmt->bindParam(':usuNombre', $usuNombre, PDO::PARAM_STR);
        $usuApellido=$this->getUsuApellido();
        $stmt->bindParam(':usuApellido', $usuApellido, PDO::PARAM_STR);
        $usuEmail=$this->getUsuEmail();
        $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
        $usuPass=$this->getUsuPass();
        $stmt->bindParam(':usuPass', $usuPass, PDO::PARAM_STR);
        if($stmt->execute()){
            $this->setUsuNombre($link->lastInertId());
            $this->setUsuApellido($link->lastInertId());
            $this->setUsuEmail($link->lastInertId());
            $this->setUsuPass($link->lastInertId());
            return true;
        }
        return false;
		}

    public function getUsuNombre()
    {
        return $this->usuNombre;
    }
    public function setUsuNombre($usuNombre)
    {
        $this->usuNombre = $usuNombre;

        return $this;
    }
    public function getUsuApellido()
    {
        return $this->usuApellido;
    }
    public function setUsuApellido($usuApellido)
    {
        $this->usuApellido = $usuApellido;

        return $this;
    }
    public function getUsuEmail()
    {
        return $this->usuEmail;
    }
    public function setUsuEmail($usuEmail)
    {
        $this->usuEmail = $usuEmail;

        return $this;
    }
    public function getUsuPass()
    {
        return $this->usuPass;
    }
    public function setUsuPass($usuPass)
    {
        $this->usuPass = $usuPass;

        return $this;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }
}