<?php

/**

 * Created by PhpStorm.

 * User: Elisson-pc

 * Date: 18/03/2016

 * Time: 11:04

 */



namespace DB\Database;

use DB\Database;



class LoadSelect

{

    private $database;

    public function __construct()

    {

        $database = new Database\Conection;

        $this->database = $database->Open();

    }



    public function loadMateria()

        {

                $query = "SELECT * FROM Materia ORDER BY Nome";

                try

                {

                    $result = $this->database->query($query);

                    echo ('<select class="form-control" name="materia" required>');
		    echo "<option>---- SELECIONE ----</option>";	

                    foreach($result as $option) {

                        echo('<option value="' . $option->idMateria . '">' . $option->Nome . '</option>');

                    }

                    echo('</select>');

                }catch (\PDOException $e)

                {

                    dump($e->getMessage());

                }



    }
    public function loadProfessor()

    {

        $query = "SELECT * FROM Professor WHERE Situacao <> 2 ORDER BY Nome";

        try

        {

            $result = $this->database->query($query);

            echo ('<select class="form-control" name="professor" required>');
            echo "<option>---- SELECIONE ----</option>";

            foreach($result as $option) {

                echo('<option value="' . $option->idProfessor . '">' . $option->Nome . '</option>');

            }

            echo('</select>');

        }catch (\PDOException $e)

        {

            dump($e->getMessage());

        }



    }
    public function loadTurma()
    {

        $query = "SELECT * FROM Turma ORDER BY Codigo";

        try

        {

            $result = $this->database->query($query);

            echo ('<select class="form-control" name="turma" required>');
            echo "<option>---- SELECIONE ----</option>";

            foreach($result as $option) {

                echo('<option value="' . $option->idTurma . '">' . $option->Codigo . '</option>');

            }

            echo('</select>');

        }catch (\PDOException $e)

        {

            dump($e->getMessage());

        }



    }

    public function loadMateriaSelected($id)

    {

        $query = "SELECT * FROM Materia ORDER BY Nome";

        try

        {

            $result = $this->database->query($query);

            echo ('<select class="form-control" name="materia" required>');


            foreach($result as $option) {

                if($id == $option->idMateria)
                    echo('<option value="' . $option->idMateria . '" selected>' . $option->Nome . '</option>');
                else
                    echo('<option value="' . $option->idMateria . '">' . $option->Nome . '</option>');


            }

            echo('</select>');

        }catch (\PDOException $e)

        {

            dump($e->getMessage());

        }



    }
    public function loadProfessorSelected($id)

    {

        $query = "SELECT * FROM Professor WHERE Situacao <> 2 ORDER BY Nome";

        try

        {

            $result = $this->database->query($query);

            echo ('<select class="form-control" name="professor" required>');


            foreach($result as $option) {

                if($id == $option->idProfessor)
                    echo('<option value="' . $option->idProfessor . '" selected>' . $option->Nome . '</option>');
                else
                    echo('<option value="' . $option->idProfessor . '">' . $option->Nome . '</option>');


            }

            echo('</select>');

        }catch (\PDOException $e)

        {

            dump($e->getMessage());

        }



    }

}