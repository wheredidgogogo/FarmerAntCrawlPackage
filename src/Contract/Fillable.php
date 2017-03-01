<?php

namespace Farmerant\Farmerantcrawl\Contract;

trait Fillable
{
    /**
     * @param array $array
     */
    public function fill($array = [])
    {
        foreach ($array as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
