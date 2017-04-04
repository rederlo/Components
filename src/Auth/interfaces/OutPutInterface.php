<?php

namespace rederlo\Auth\interfaces;
use rederlo\Auth\Entity\People;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:49
 */
interface OutPutInterface
{
    public function load(People $people);
}