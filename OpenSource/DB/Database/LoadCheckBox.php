<?php
/**
 * Created by PhpStorm.
 * User: elisson
 * Date: 30/10/16
 * Time: 13:47
 */

namespace DB\Database;

use DB\Database;

class LoadCheckBox
{
    private $database;

    public function __construct()

    {

        $database = new Database\Conection();

        $this->database = $database->Open();

    }
    public function loadcheck($tabela1,$tabela2,$campo1,$campo2){
        $query = "SELECT * FROM $tabela1,$tabela2 WHERE $campo1 = $campo2";

        try

        {

            $result = $this->database->query($query);



            foreach($result as $option) {

               echo '<div class="checkbox checkbox-list"><input type="checkbox" name="turma[]" value="'.$option->idTurma.'"/><span class="check-span">'.$option->Codigo.' - '.$option->Nome.'</span><br></div>';

            }



        }catch (\PDOException $e)

        {

            dump($e->getMessage());

        }
    }
}