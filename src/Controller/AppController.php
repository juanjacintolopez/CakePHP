<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;


class AppController extends Controller
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('Global');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
            'authorize'=>['Controller'],
            'authenticate'=>[
                'Form'=>[
                    'userModel'=>'Usuarios',
                    'fields'=>[
                        'username'=>'email',
                        'password'=>'password',
                    ]
                ]
            ],
            'loginRedirect'=>[
                'controller'=>'Principal',
                'action'=>'index'
            ],
            'logoutRedirect'=>[
                'controller'=>'Usuarios',
                'action'=>'login'
            ],
            'loginAction'=>[
                'controller'=>'Usuarios',
                'action'=>'login',
            ],
            'authError'=>false,
            ]
        );

        if(isset($this->Auth->user()['id'])){
            $this->session=null;
            $this->loadModel('UsuariosPerfiles');
            #Utilizado para controladores
            $this->session['Usuario']=$this->Auth->user();
            $this->session['Perfil'] = $this->UsuariosPerfiles->get($this->Auth->user()['perfil_id'])->toarray();
            #Utilizado para templates
            $session=$this->session;
            $this->set(compact('session'));
        }
    }

    public function beforeRender(Event $event){
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user){
        return true;
    }

    public function beforeFilter(Event $event){
        #Habilitadas para Generar Usuario    
        // $this->Auth->allow("index");
        // $this->Auth->allow("registrar");
        #Habilitadas para Generar Usuario
    }







}
