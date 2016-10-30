<?php
/**
 * Created by PhpStorm.
 * User: Elisson-pc
 * Date: 06/05/2016
 * Time: 10:50
 */

namespace DB\Database;


class Attributes
{
    public function createFields($attributes)
    {
        return implode(',',array_keys($attributes));
    }

    public function  createValues($attributes)
    {
        return ':'.implode(',:',array_keys($attributes));
    }

    public function bindCreateParameters($attributes)
    {
        $values = $this->createValues($attributes);
        $bindParameters = array_combine(explode(',',$values),array_values($attributes));
        return $bindParameters;
    }
}