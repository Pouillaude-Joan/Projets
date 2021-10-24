<?php
class ConnexionSingleton
{
    public static ?PDO $connexion = null;


    public static function getConnexion(): PDO
    {
        if (static::$connexion == null) {
            //static::$connexion = static::getConnexionByDetails();
            static::$connexion = static::getConnexionByDetails();
        }
        return static::$connexion;
    }

    public static function getConnexionByDetails(
        string $host = "localhost",
        string $db = "postgres",
        string $port = "5432",
        string $username = "postgres",
        string $password = "root"
    ): PDO {
        $connStr = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";

        try {
            $conn = new PDO($connStr);
            if ($conn) {
                return $conn;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            static::$connexion = null;
        }
        return null;
    }

}
