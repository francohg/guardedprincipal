<?php
//singleton
class Usuarios
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
	    $servidor="localhost";
	    $base="id19686397_transport.sql";
	    $usuario="root";
	    $contrasenia="";
	    $this->dbh = new PDO('mysql:host='.$servidor.';dbname='.$base, $usuario, $contrasenia);
            $this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function Consulta()
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM camiones");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insertarcam($placas,$tipo,$capacidad,$ruta)
    {

        try {
            $query = $this->dbh->prepare("INSERT INTO camiones VALUES ('',?,?,?,?)");
            $query->bindParam(1, $placas);
            $query->bindParam(2, $tipo);
            $query->bindParam(3, $capacidad);
            $query->bindParam(4, $ruta);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function insertaruta($zona,$longitud,$latitud)
    {

        try {
            $query = $this->dbh->prepare("INSERT INTO camiones VALUES ('',?,?,?)");
            $query->bindParam(1, $zona);
            $query->bindParam(2, $longitud);
            $query->bindParam(3, $latitud);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function insertarstatu($camion,$ruta,$latitud,$longitud,$velocidad,$combustible)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO camiones VALUES ('',?,?,?,?,?,?,?)");
            $query->bindParam(1, $camion);
            $query->bindParam(3, $ruta);
            $query->bindParam(4, $latitud);
            $query->bindParam(5, $longitud);
            $query->bindParam(6, $velocidad);
            $query->bindParam(7, $combustible);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function insertar($p1)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO tabla VALUES (?)");
            $query->bindParam(1, $p1);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Borrar($p1)
    {
        try {  
            $query = $this->dbh->prepare("DELETE FROM tabla WHERE campo LIKE ?");
            $query->bindParam(1, $p1);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
 
    public function Actualizar($camion,$ruta)
    {
        try {
            $query = $this->dbh->prepare("UPDATE tabla SET Id_ruta=? WHERE Id_camion LIKE ?");
            $query->bindParam(1, $camion);
            $query->bindParam(2, $ruta);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>