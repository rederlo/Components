<?php

namespace rederlo\Controller;

use Cake\Controller\Controller as baseControle;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 13:51
 */
class Controller extends baseControle
{

    protected $_dataResponse = [];

    protected $_table_auth;

    protected $_scope_auth_form;

    protected $_scope_auth_token;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->_dataResponse = [
            'message' => null,
            'code' => null,
            'data' => [],
            'state' => false
        ];

        $type_auth = array_merge($this->Form(), $this->Api());

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authorize' => ['Controller'],
            'authenticate' => $type_auth,
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize',
            'loginAction' => false
        ]);
    }

    private function Form()
    {
        return ['Form' => [
            'userModel' => "{$this->_table_auth}",
            'fields' => $this->_scope_auth_form
        ]];
    }

    private function Api()
    {
        if (Configure::consume("API"))
            return ['ADmad/JwtAuth.Jwt' => [
                'header' => 'authorization',
                'userModel' => "{$this->_table_auth}",
                'fields' => $this->_scope_auth_form,
                'parameter' => 'token',
                'queryDatasource' => true,
            ]];
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user)
    {
        return true;
    }
}