<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 04/04/17
 * Time: 10:32
 */

namespace AuthJwt\Routing\Filter;

use Cake\Core\App;
use Cake\Routing\DispatcherFactory as Factory;
use Cake\Routing\Exception\MissingDispatcherFilterException;


class DispatcherFactory extends Factory
{
    public static function add($filter, array $options = [])
    {
        if (is_string($filter)) {
            $filter = static::_createFilter($filter, $options);
        }
        static::$_stack[] = $filter;

        return $filter;
    }

    protected static function _createFilter($name, $options)
    {
        $className = "AuthJwt\\Routing\\Filter\\RestFilter";

        if (!class_exists($className)) {
            $msg = sprintf('Cannot locate dispatcher filter named "%s".', $name);
            throw new MissingDispatcherFilterException($msg);
        }
        return new $className($options);
    }
}