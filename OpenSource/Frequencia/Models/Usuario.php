<?php
/**
 * Created by PhpStorm.
 * User: elisson
 * Date: 18/10/16
 * Time: 11:04
 */

namespace Frequencia\Models;


use DB\Database\DBLogin;

class Usuario extends DBLogin
{
    protected $table = "Usuario";
}