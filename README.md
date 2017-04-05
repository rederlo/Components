Installation
------------

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

Params token
------------

```php
$auth = new AuthFactory();
$auth->create($people, ['group_id' => $group_id]);
```

GetParamsToken
--------------

```php
/**
* @return Array
*/
$this->getParamsHeader();
```
