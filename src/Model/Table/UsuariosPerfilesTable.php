<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuariosPerfilesTable extends Table
{   
    public function initialize(array $config){
        parent::initialize($config);
        $this->setTable('usuarios_perfiles');
        $this->displayField('perfil');
    }

    public function validationDefault(Validator $validator){
        
        return $validator
            ->notEmpty('perfil', 'Valor Requerido')
        ;

    }

}
