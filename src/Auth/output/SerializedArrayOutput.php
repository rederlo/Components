<?php

namespace AuthJwt\Auth\output;

use AuthJwt\Auth\Entity\People;
use AuthJwt\Auth\interfaces\OutPutInterface;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:53
 */
class SerializedArrayOutput implements OutputInterface
{
    /**
     * @param People $people
     * @return string
     */
    public function load(People $people)
    {
        return serialize($people);
    }
}