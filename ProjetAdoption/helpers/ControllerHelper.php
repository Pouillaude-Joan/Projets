<?php
class ControllerHelper
{

    public static function getPostParam(string $paramX): ?string
    {
        $res = null;
        if (isset($_POST[$paramX]) && $_POST[$paramX] != null && !empty(trim($_POST[$paramX]))) {
            $res = $_POST[$paramX];
        }

        return $res;
    }

    public static function getGetParam(string $paramX): ?string
    {
        $res = null;
        if (isset($_GET[$paramX]) && $_GET[$paramX] != null && !empty(trim($_GET[$paramX]))) {
            $res = $_GET[$paramX];
        }

        return $res;
    }

    public static function isConnected()
    {
        session_start();
        if (!isset($_SESSION['connectedUser']) && $_SESSION['connectedUser'] == null) {
            header('Location: ../controllers/connexionRegistrationController.php?failed=true');
            exit();
        }
    }

    public static function disconnected()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: ./connexionRegistrationController.php');
        exit();
    }

    public static function getConnectedUtilisateur()
    {
        session_start();
        return $_SESSION['connectedUser'];
    }
}
