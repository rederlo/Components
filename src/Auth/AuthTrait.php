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
     * AuthTrait constructor.
     * @param array $_dataResponse
     */
    public function __construct(array $_dataResponse)
    {
        $this->_dataResponse = [
            'message' => null,
            'code' => null,
            'data' => [],
            'status' => false
        ];
    }

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