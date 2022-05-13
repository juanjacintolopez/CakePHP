<?php
namespace App\Controller;


class UsuariosEstatusController extends AppController
{   
    public function isAuthorized($user){
        /*Log */  $this->Global->LogAcceso(@$this->session['Usuario']['nombre_completo'],@$this->request->params['controller'], (@$this->request->getParam('action')) );

        if (  $this->session['Perfil']['perfil'] =="admin"  ) {
              return true;
        } else {
          $metodos_array=array('index');
          if ( in_array($this->request->getParam('action'), $metodos_array)  ){
               return true;
          }else{
               $this->Flash->error(__('Error! No cuentas con privilegios de accesar a este modulo.'));
               return false;
          }
        }
    }
    public function index(){
       $estatus = $this->UsuariosEstatus->find('all', [
       ])->toarray();
       $this->set(compact('estatus'));
    }

}
