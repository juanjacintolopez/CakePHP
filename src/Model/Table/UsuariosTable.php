<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuariosTable extends Table
{   
    public function initialize(array $config){
        parent::initialize($config);
        $this->setTable('usuarios');

        $this->belongsTo('UsuariosPerfiles', [
            'className'=>'UsuariosPerfiles',
            'propertyName'=>'UsuariosPerfiles',
            'foreignKey' => 'perfil_id'
        ]);

        $this->belongsTo('UsuariosEstatus', [
            'className'=>'UsuariosEstatus',
            'propertyName'=>'UsuariosEstatus',
            'foreignKey' => 'estatus_id'
        ]);
    }

    public function validationDefault(Validator $validator){
        
        return $validator
            ->notEmpty('nombre', 'Valor Requerido')
            ->notEmpty('apellido_paterno', 'Valor Requerido')
            ->notEmpty('apellido_materno', 'Valor Requerido')
            ;

    }

}
