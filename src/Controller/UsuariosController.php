<?php
namespace App\Controller;


class UsuariosController extends AppController
{   

    public function isAuthorized($user){
        /*Log */  $this->Global->LogAcceso(@$this->session['Usuario']['nombre_completo'],@$this->request->params['controller'], (@$this->request->getParam('action')) );

        if (  $this->session['Perfil']['perfil'] =="admin"  ) {
              return true;
        } else {
          $metodos_array=array('index','indexDatatable','indexReact','detalle','perfil','login','logout' );
          if ( in_array($this->request->getParam('action'), $metodos_array)  ){
               return true;
          }else{
               $this->Flash->error(__('Error! No cuentas con privilegios de accesar a este modulo.'));
               return false;
          }
        }
    }
    
    public function index(){

        $condiciones=array();
        if ($this->request->is('post')) {
          $data=$this->request['data'];
          foreach ($data as $key => $value) {
            if(strlen(trim($value)) > 0){
                if(strpos($key,'id') !== false){
                    $condiciones[] = array($key=>$value);
                }else{
                    $condiciones[] = array($key . ' like '.'"%'.$value.'%"');
                }
            }
          }
        }        

        $this->loadModel('UsuariosPerfiles');
        $perfiles=$this->UsuariosPerfiles->find('list')->toarray();

        $this->loadModel('UsuariosEstatus');
        $estatus=$this->UsuariosEstatus->find('list')->toarray();

        $this->paginate = array(
          'contain'=> array('UsuariosPerfiles','UsuariosEstatus'),
          'conditions'=> $condiciones
        );     
        $usuarios =  $this->paginate($this->Usuarios);
        $this->set(compact('usuarios','perfiles','estatus'));
        $this->set('_serialize', ['usuarios']);
    }

    public function indexDatatable(){
       $usuarios = $this->Usuarios->find('all', [
           'contain' => ['UsuariosPerfiles']
       ])->toarray();
       $this->set(compact('usuarios'));
    }

    public function registrar(){
        $this->loadModel('UsuariosPerfiles');
        $perfiles=$this->UsuariosPerfiles->find('list')->toarray();
        if ($this->request->is('post')) {
            $data=$this->request->data;
            $usuario = $this->Usuarios->newEntity();
            $this->Usuarios->patchEntity($usuario, $data);
            
            if ($this->Usuarios->save($usuario)) {
                return $this->redirect(['action' => 'index']);
                $this->Flash->success(__('Registro Guardado Correctamente.'));
            } else {
                $this->Flash->error(__('Error! Surgio un Problema al Guardar el Registro, Intente Nuevamente.'));
            }
        }
        $this->set(compact('perfiles'));  
    }
    public function editar($id=null){
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['UsuariosPerfiles']
        ]);
        $this->loadModel('UsuariosPerfiles');
        $perfiles=$this->UsuariosPerfiles->find('list')->toarray();
        if ($this->request->is(['patch', 'post', 'put'])) {

            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            if($usuario['password']==""){
                unset($usuario['password']);
            }

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Registro Guardado Correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error! Surgio un Problema al Guardar el Registro, Intente Nuevamente.'));
        }
        $this->set(compact('usuario','perfiles'));     
    }
    public function detalle($id=null){
       $usuario = $this->Usuarios->get($id, [
           'contain' => ['UsuariosPerfiles']
       ]);
       $this->set(compact('usuario'));
    }
    public function eliminar($id=null){
       $perfil = $this->Usuarios->get($id);
       if($this->Usuarios->delete($perfil)){
          $this->Flash->success(__('Registro Eliminado Correctamente.'));
          return $this->redirect(['action' => 'index']);
       }else{
          $this->Flash->error(__('Error! Surgio un Problema al Eliminar el Registro, Intente Nuevamente.'));
          return $this->redirect(['action' => 'index']);
       }
    }

    public function desactivar($id=null){
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['UsuariosPerfiles']
        ]);
        $data['estatus_id']=0;
        $usuario = $this->Usuarios->patchEntity($usuario,$data);
        if ($this->Usuarios->save($usuario)) {
            $this->Flash->success(__('Usuario Desactivado Correctamente.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Error! Surgio un Problema al Desactivar Usuario, Intente Nuevamente.'));
  
        $this->set(compact('usuario','perfiles'));     
    }

    public function login(){
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $user=$this->Auth->identify();
            if ($user && $user['estatus_id']==1) {
               $this->Auth->setUser($user);
               return $this->redirect($this->Auth->redirectUrl());
            } else {
               $this->Flash->error(__('Los datos introducidos son invalidos o tu usuario esta inactivo, por favor intente nuevamente o verifica tu contraseña.'));
            }

        }

    }
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

}
