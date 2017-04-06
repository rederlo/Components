Installation
------------

```php
composer require rederlo/cake-auth-jwt
```
Config
------

```php
// src/AppController.php

use AuthTrait;

public function initialize()
{
  parent::initialize();
  Auth::create($this, [
      'model' => 'Users',
      'scope_auth' => ['username' => 'email'],
      'scope_jwt' => ['username' => 'id'],
  ]);
}

```
#cross-origin HTTP request use https://github.com/rederlo/cakephp-cors
 
New User
--------

```php
public function add()
{
    $users = $this->Users->newEntity();
    if($this->request->is('post')){
        $users = $this->Users->patchEntity($users, $this->request->data());
        if ($this->Users->save($users)) {
            $auth = new AuthFactory();
            //Expected Type Entity
            $auth->create($users);
            $token = $auth->build();
        }
    }
    $this->set(compact('token'));
    $this->set('_serialize', ['token']);
}
```

Login 
-----

```php
public function login()
{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Usernamme or password ínvalid, try again.'));
    }
}
    
```

Params token
------------

```php
$auth = new AuthFactory();
$auth->create($users, ['group_id' => $group_id]);
```

GetParamsToken
--------------

```php
/**
* @return Array
*/
$this->getParamsHeader();
```
