<?php

namespace DB\Database;

use Frequencia\Interfaces\IModel;
use \PDOException;

class DBModel implements IModel
{
    private $database;


    public function __construct()
    {

        $database = new Conection;
        $this->database = $database->Open();
        $this->database = $database->Open();
    }

    public function read(){
        $query = "SELECT * FROM $this->table";
        $pdo = $this->database->prepare($query);
        try{
            $pdo->execute();
            return $pdo->fetchAll();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }


    public function create($attributes)
    {

        $attributesCreate = new Attributes;

        $fields = $attributesCreate->createFields($attributes);
        $values = $attributesCreate->createValues($attributes);

        $query  = "INSERT INTO $this->table($fields) VALUES($values)";

        $pdo = $this->database->prepare($query);

        $bindParameters = $attributesCreate->bindCreateParameters($attributes);

        try{

            $pdo->execute($bindParameters);
            return $this->database->lastInsertId();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }

    }

    public function update($id,$attributes,$campo){
        $attributesUpdate = new AttributesUpdate;
        $fields = $attributesUpdate->updateFields($attributes);
        $query = "UPDATE $this->table SET $fields WHERE $campo =:id";

        $pdo = $this->database->prepare($query);
        $bindupdateParameters = $attributesUpdate->bindUpdateParameters($attributes);
        $bindupdateParameters['id'] = $id;
        try
        {
            //dump($bindupdateParameters);
            $pdo->execute($bindupdateParameters);
        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }
    public function delete($name,$value){

        $query = "DELETE FROM $this->table WHERE $name=:$name";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->bindParam(":$name",$value);
            $pdo->execute();
            return $pdo->rowCount();
        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }


    }

    public function findByType($name, $value)
    {
        $query = "SELECT * FROM $this->table WHERE $name = $value ";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetch();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }
    public function findByTypeAll($name, $value)
    {
        $query = "SELECT * FROM $this->table WHERE $name = $value";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetchAll();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }


    public function findBy($name,$value){

        $query = "SELECT * FROM $this->table WHERE $name LIKE '$value%'";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetch();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }


    }

    public function findByAll($name, $value){

        $query = "SELECT * FROM $this->table WHERE $name LIKE '$value%'";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetchAll();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }


    }

    public function findByAndAll($name1,$name2,$value1,$value2){

        $query = "SELECT * FROM $this->table WHERE $name1 LIKE '%$value1%' AND $name2 = $value2 ";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetchAll();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }
    public function findByAndTypeAll($name1,$name2,$value1,$value2){

        $query = "SELECT * FROM $this->table WHERE $name1 = $value1  AND $name2 = $value2 ";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetchAll();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }
    public function findByAnd($name1,$name2,$value1,$value2){

        $query = "SELECT * FROM $this->table WHERE $name1 = $value1  AND $name2 = $value2 ";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetch();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }

    public function findByAnds($name1,$name2,$name3,$value1,$value2,$value3){

        $query = "SELECT * FROM $this->table WHERE $name1 = $value1  AND $name2 = $value2 AND $name3 = $value3 ";
        $pdo = $this->database->prepare($query);
        try
        {
            $pdo->execute();
            return $pdo->fetch();

        }catch (PDOException $e)
        {
            dump($e->getMessage());
        }
    }

    public function findByLike($name,$value){



        $query = "SELECT * FROM $this->table WHERE $name LIKE '%$value%'";

        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->execute();

            return $pdo->fetch();

        }catch (PDOException $e)

        {
            dump($e->getMessage());
        }
    }


    public function findByLikeAll($name,$value){



        $query = "SELECT * FROM $this->table WHERE $name LIKE '%$value%'";

        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->execute();

            return $pdo->fetchAll();

        }catch (PDOException $e)

        {
            dump($e->getMessage());
        }
    }


    public function findByCount($name,$parameter)
    {
        $query = "SELECT COUNT(*) as total FROM $this->table WHERE $name = $parameter";

        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->execute();

            return $pdo->fetch();

        }catch (PDOException $e)

        {
            dump($e->getMessage());
        }
    }

    public function CountTotal()
    {
        $query = "SELECT COUNT(*) as total FROM $this->table";

        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->execute();

            return $pdo->fetch();

        }catch (PDOException $e)

        {
            dump($e->getMessage());
        }
    }


    public function verify($name,$value)
    {
        $query = "SELECT * FROM $this->table WHERE $name LIKE '%$value%'";

        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->execute();
            return $pdo->fetch();

        }catch (PDOException $e)

        {
            dump($e->getMessage());
        }
    }
    public function lastId($campo){
        $query = "SELECT * FROM $this->table ORDER BY $campo DESC LIMIT 1";

        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->execute();
            return $pdo->fetch();


        }catch (PDOException $e)

        {
            dump($e->getMessage());
        }
    }


}