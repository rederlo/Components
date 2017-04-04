<?php

namespace AuthJwt\Auth\factory;

use Cake\I18n\Time;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use AuthJwt\Auth\Entity\People;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:32
 */
class AuthFactory
{
    private $obj;

    public function create(People $people)
    {
        $people->token = JWT::encode([
            'sub' => $people->id,
            'exp' => Time::now()->addDay(3)->getTimestamp(),
        ], Security::salt());
        $this->obj = $people;
    }

    /**
     * @return People
     */
    public function build()
    {
        return $this->obj;
    }
}