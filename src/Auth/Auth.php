<?php

namespace AuthJwt\Auth;

use Cake\Controller\Controller;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 13:51
 */
class Auth
{
    /**
     * Auth constructor.
     * @param Controller $controller
     * @param array $config
     */
    public static function create(Controller $controller, $config = [])
    {
        $controller->loadComponent('RequestHandler');
        $controller->loadComponent('Auth', [
            'storage' => 'Memory',
            'authorize' => ['Auth'],
            'authenticate' => [
                'Form' => [
                    'userModel' => $config['model'],
                    'fields' => $config['scope_auth']
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'header' => 'authorization',
                    'userModel' => $config['model'],
                    'fields' => $config['scope_jwt'],
                    'parameter' => 'token',
                    'queryDatasource' => true,
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Auth.initialize',
            'loginAction' => false
        ]);
    }
}