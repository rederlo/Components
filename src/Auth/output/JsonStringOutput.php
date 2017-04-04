<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:55
 */

namespace AuthJwt\Auth\output;


use rederlo\Auth\Entity\People;
use rederlo\Auth\interfaces\OutPutInterface;

class JsonStringOutput implements OutPutInterface
{
    public function load(People $people)
    {
       return json_encode($people);
    }

}