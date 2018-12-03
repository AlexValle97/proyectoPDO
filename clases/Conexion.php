<?php 

	class Conexion
	{	
		static $server = 'localhost';
    	static $base = 'catalogo';
    	static $usuario = 'root';
    	static $clave = '';

		private function __construct()
		{}

		static function conectar()
		{
			$charset = 'utf8mb4';

        $dsn = 'mysql:host='.self::$server.';dbname='.self::$base.';charset='.$charset;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $link = new PDO($dsn, self::$usuario, self::$clave, $options);
            return $link;
        } catch ( PDOException $e) {
            throw new  PDOException( $e->getMessage(), (int)$e->getCode());			
		}
	}
}	