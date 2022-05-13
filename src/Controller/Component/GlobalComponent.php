<?php 
namespace App\Controller\Component;

use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

class GlobalComponent extends Component
{   

	public function LogAcceso($nombre_usuario=null,$controlador=null,$accion=null){
	    
	    $this->LogAcceso = TableRegistry::get('LogAcceso');
	    $log_datos=array(
	        'fecha'=>date('c'),
	        'usuario'=>@$nombre_usuario,
	        'controlador'=>@$controlador,
	        'accion'=>@$accion
	    );
	    $log = $this->LogAcceso->newEntity();
	    $log = $this->LogAcceso->patchEntity($log, $log_datos);
	    $this->LogAcceso->save($log);
	    return true;
	}

}

