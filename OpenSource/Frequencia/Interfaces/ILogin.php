<?php
/**
 * Created by PhpStorm.
 * User: Elisson-pc
 * Date: 06/05/2016
 * Time: 11:03
 */

namespace Frequencia\Interfaces;


interface ILogin
{
    public function validationUsuario($usuario,$senha);
    public function validationRA($usuario,$senha);
    public function UpdatePassword($senhaPadrao,$novasenha);
}