<?php

namespace AuthJwt\Auth;

use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 10:32
 */
class AuthFactory
{
    private $obj;

    public function create(Entity $people, $options = [])
    {
        $people->token = JWT::encode([
            'sub' => $people->id,
            'exp' => Time::now()->addDay(3)->getTimestamp(),
            'params' => $options
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