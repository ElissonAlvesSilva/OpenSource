<?php

namespace DB\Database;


class AttributesUpdate
{
    private function combineFieldsUpdate($attributes)
    {
        $keys = array_keys($attributes);

        $separatedtoTwoPoints = ':'.implode('=:',$keys);
        $combine = array_combine($keys,explode('=',$separatedtoTwoPoints));

        return $combine;
    }

    public function updateFields($attributes)
    {
        $combine = $this->combineFieldsUpdate($attributes);
        $query  = null;
        foreach ($combine as $key => $value)
        {
            $query .=$key.'='.$value.',';
        }
        $newQuery = rtrim($query,',');
        return $newQuery;
    }

    public function bindUpdateParameters($attributes)
    {
        $keys = array_keys($attributes);

        $separatedtoTwoPoints = ':'.implode(',:',$keys);
        $combineupdate = array_combine(explode(',',$separatedtoTwoPoints), array_values($attributes));

        return $combineupdate;
    }

}