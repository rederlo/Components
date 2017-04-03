<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:55
 */

namespace Personaliza\Auth\output;


use Personaliza\Auth\Entity\People;
use Personaliza\Auth\interfaces\OutPutInterface;

class JsonStringOutput implements OutPutInterface
{
    public function load(People $people)
    {
       return json_encode($people);
    }

}