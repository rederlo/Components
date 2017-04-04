<?php

namespace AuthJwt\Auth\Entity;

use AuthJwt\Auth\interfaces\OutPutInterface;
use AuthJwt\Entity\EntityInterface;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:39
 */
class People extends EntityInterface
{
    /**
     * @param OutPutInterface $out
     */
    public function setOutPut(OutPutInterface $out)
    {
        $this->output = $out;
    }

    /**
     * @return mixed
     */
    public function loadOutPut()
    {
        return $this->output->load($this);
    }
}