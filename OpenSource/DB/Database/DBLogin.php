<?php

namespace DB\Database;


use Frequencia\Interfaces\ILogin;
use \PDOException;

class DBLogin implements ILogin
{
    private $database;

    public function __construct()
    {
        $database = new Conection;
        $this->database = $database->Open();

    }

    public function validationUsuario($usuario, $senha)
    {

        $query = "SELECT * FROM $this->table WHERE Usuario=:usuario";
        $pdo = $this->database->prepare($query);
        $pdo->bindParam(':usuario', $usuario);
        try {

            $pdo->execute();
            $result = $pdo->fetch();

            //$nomeUsuario = $result->Nome;

            if ((($senha == $result->Senha) && ($usuario == $result->Usuario))) {
              //  $_SESSION['nomeUsuario'] = $nomeUsuario;
                $_SESSION['Usuario'] = $usuario;
                $_SESSION['idUsuario'] = $result->idUsuario;
                $_SESSION['Nivel'] = $result->Nivel;
                $_SESSION['idRA'] = $result->RA;
                if ($result->Status == 1) {
                    return 1;
                } else if ($result->Status == 2) {
                    return 2;
                } else if ($result->Status == 3) {
                    return 3;
                }

            } else {
                unset($_SESSION['idUsuario']);

                unset($_SESSION['Usuario']);

                unset($_SESSION['Nivel']);
                unset($_SESSION['idRA']);
                return 4;


            }
        } catch (PDOException $e) {
            dump($e->getMessage());
        }
    }
    public function validationRA($ra, $senha)
    {

        $query = "SELECT * FROM $this->table WHERE RA = :ra";
        $pdo = $this->database->prepare($query);
        $pdo->bindParam(':ra', $ra);
        try {

            $pdo->execute();
            $result = $pdo->fetch();

            //$nomeUsuario = $result->Nome;

            if ((($senha == $result->Senha) && ($ra == $result->RA))) {
                //  $_SESSION['nomeUsuario'] = $nomeUsuario;
                $_SESSION['Usuario'] = $result->Usuario;
                $_SESSION['idUsuario'] = $result->idUsuario;
                $_SESSION['Nivel'] = $result->Nivel;
                $_SESSION['idRA'] = $result->RA;
                if ($result->Status == 1) {
                    return 1;
                } else if ($result->Status == 2) {
                    return 2;
                } else if ($result->Status == 3) {
                    return 3;
                }

            } else {
                unset($_SESSION['idUsuario']);

                unset($_SESSION['Usuario']);

                unset($_SESSION['Nivel']);
                unset($_SESSION['idRA']);

                return 4;


            }
        } catch (PDOException $e) {
            dump($e->getMessage());
        }
    }

    public function UpdatePassword($senhaPadrao, $novasenha)
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $antiga = isset($_POST['antiga']) ? $_POST['antiga'] : "";
        $nova = isset($_POST['nova']) ? $_POST['nova'] : "";
        $status = 1;
        if ($antiga != "123456") {
            return 2;
        } else {

            try {
                $query = $this->database->prepare('UPDATE Usuario SET Senha=?,Status=? WHERE IdUsuario=?');
                $query->bindParam(1, $nova);
                $query->bindParam(2, $status);
                $query->bindParam(3, $id);
                $query->execute();
                return 1;
            } catch (PDOException $e) {
                dump($e->getMessage());
            }
        }


    }

    public function findNivel($usuario)
    {
        $query = "SELECT * FROM $this->table WHERE Usuario=:usuario";
        $pdo = $this->database->prepare($query);

        $pdo->bindParam(':usuario', $usuario);
        try {
            $pdo->execute();
            $result = $pdo->fetch();

            if($result->Nivel == 1)
                return 1;
            else if($result->Nivel == 2)
                return 2;
            else if($result->Nivel == 3)
                return 3;

        } catch (PDOException $e) {
            dump($e->getMessage());
        }
    }


}
