<?php $this->layout="default_login"; ?>

<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <h3 class="h4 font-weight-bold text-theme">Login</h3>                                
                                <h6 class="h5 mb-0">Bienvenido al Portal!</h6>
                                <p class="text-muted mt-2 mb-5">Favor de introducir tus credenciales de acceso</p>
                                <?= $this->Form->create('usuario',array('role'=>'form')) ?>
                                    <div class="form-group">
                                        <?= $this->Form->input('email',array('label'=>'Correo Electrónico','type'=>'text','class'=>'form-control','placeholder'=>'Correo Electrónico','required'=>true)); ?>
                                    </div>
                                    <div class="form-group mb-5">
                                        <?= $this->Form->input('password',array('label'=>'Password','type'=>'password','class'=>'form-control','placeholder'=>'Password','required'=>true)); ?>
                                    </div>
                                    <?= $this->Form->button('Acceder',array('class'=>'btn btn-theme','type'=>'submit')) ?>
                                <?= $this->Form->end(); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This  beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>

                                    <?= $this->Html->link('Registrarse',array('controller'=>'Usuarios','action'=>'registrar')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
