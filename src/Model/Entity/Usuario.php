<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class Usuario extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected $_hidden = [
        'password'
    ];

    protected $_virtual = ['nombre_completo'];

    protected function _getNombreCompleto() {
       return $this->_properties['nombre'] . ' ' . $this->_properties['apellido_paterno']. ' ' . $this->_properties['apellido_materno'];

    }

    protected function _setPassword($password){
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }


}
