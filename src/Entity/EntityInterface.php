<?php

namespace AuthJwt\Entity;

use Cake\ORM\Entity;
use AuthJwt\Auth\interfaces\OutPutInterface;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 03/04/17
 * Time: 11:50
 */
abstract class EntityInterface extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected $output;

    /**
     * @param OutPutInterface $out
     */
    abstract public function setOutPut(OutPutInterface $out);

    /**
     * @return mixed
     */
    abstract public function loadOutPut();

}