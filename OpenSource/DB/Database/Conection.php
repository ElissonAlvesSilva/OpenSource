<?php
/**
 * Created by PhpStorm.
 * User: Elisson-pc
 * Date: 06/05/2016
 * Time: 10:17
 */

namespace DB\Database;

use \PDO;

class Conection
{
    const INIFILE = './config/database.ini';
     private $iniData;

    public function __construct()
    {
        $this->iniData = parse_ini_file(self::INIFILE);
    }

    public function Open()
    {
        $pdo = new PDO($this->iniData['driver'].':host='.$this->iniData['host'].';dbname='.$this->iniData['database'],
                        $this->iniData['username'],$this->iniData['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        return $pdo;
    }


}