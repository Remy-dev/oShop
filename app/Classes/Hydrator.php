<?php
namespace Oshop\Classes;
trait Hydrator
{
    public function hydrate($array)
    {
        foreach ($array as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}