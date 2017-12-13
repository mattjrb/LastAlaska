<?php
/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 13:42
 */

namespace App;


/**
 * Trait Hydrator
 * @package App
 */
trait Hydrator
{
    /**
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

}