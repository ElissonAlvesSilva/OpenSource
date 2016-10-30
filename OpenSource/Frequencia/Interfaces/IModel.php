<?php
/**
 * Created by PhpStorm.
 * User: Elisson-pc
 * Date: 06/05/2016
 * Time: 10:31
 */

namespace Frequencia\Interfaces;


interface IModel
{
    public function create($attributes);
    public function read();
    public function update($id,$attributes,$campo);
    public function delete($name,$value);
    public function findByType($name,$value);
    public function findByTypeAll($name, $value);
    public function findBy($name,$value);
    public function findByAll($name,$value);
    public function findByAndAll($name1,$name1,$value1,$value2);
    public function findByLike($name,$value);
    public function findByLikeAll($name,$value);
    public function findByCount($name,$parameter);
}