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
	    $base="id19686397_transport";
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
    public function Consultacma($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM camiones WHERE Id_camion Like ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function Consultasta($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM status WHERE Id_camion Like ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function Consultastatus()
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM 'status'");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Consultaruta($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT Longitud,Latitud FROM rutas WHERE Id_ruta like ?");
            $query->bindParam(1, $id);
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
            $query = $this->dbh->prepare("INSERT INTO camiones VALUES (NULL,?,?,?,?)");
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
    public function insertaalerta($tip,$camion,$fecha)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO alertas VALUES (NULL,?,?,?)");
            $query->bindParam(1, $tip);
            $query->bindParam(2, $camion);
            $query->bindParam(3, $fecha);
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
    public function insertarstatu($camion,$ruta,$latitud,$longitud,$velocidad,$combustible,$fecha)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO status VALUES (NULL,?,?,?,?,?,?,?)");
            $query->bindParam(1, $camion);
            $query->bindParam(2, $ruta);
            $query->bindParam(3, $latitud);
            $query->bindParam(4, $longitud);
            $query->bindParam(5, $velocidad);
            $query->bindParam(6, $combustible);
            $query->bindParam(7, $fecha);
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
            $query = $this->dbh->prepare("UPDATE camiones SET Id_ruta=? WHERE Id_camion LIKE ?");
            $query->bindParam(1, $ruta);
            $query->bindParam(2, $camion);
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