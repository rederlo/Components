<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 05/04/17
 * Time: 09:17
 */

namespace AuthJwt\Auth;


use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Class AuthTrait
 * @package AuthJwt\Auth
 */
trait AuthTrait
{
    /**
     * @var array
     */
    public $_dataResponse = [];

    /**
     * @return array|null
     */
    public function getParamsHeader()
    {
        $token = str_ireplace('Bearer ','',$this->request->header('authorization'));
        $token = (array)(JWT::decode($token, Security::salt(), ['HS256']));
        return isset($token['params']) ? (array)$token['params'] : null;
    }
}