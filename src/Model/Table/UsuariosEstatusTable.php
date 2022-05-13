<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuariosEstatusTable extends Table
{   
    public function initialize(array $config){
        parent::initialize($config);
        $this->setTable('usuarios_estatus');
        $this->displayField('estatus');
    }

    public function validationDefault(Validator $validator){
        
        return $validator
            ->notEmpty('estatus', 'Valor Requerido')
        ;

    }

}
