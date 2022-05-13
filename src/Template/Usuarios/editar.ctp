<?php echo $this->element('plugins_parsley') ?>

<h3>Editar Usuario</h3>
<?= $this->Form->create($usuario,array('id'=>'formulario','role'=>'form',"data-parsley-validate"=>"")); ?>    
  <div class="mb-3">
    <?= $this->Form->input('nombre',array('type'=>'text','class'=>'form-control','required'=>true)); ?>
  </div>
  <div class="mb-3">
    <?= $this->Form->input('apellido_paterno',array('type'=>'text','class'=>'form-control','required'=>true)); ?>
  </div>
  <div class="mb-3">
    <?= $this->Form->input('apellido_materno',array('type'=>'text','class'=>'form-control','required'=>true)); ?>
  </div>
  <div class="mb-3">
    <?= $this->Form->input('email',array('type'=>'email','class'=>'form-control','required'=>true)); ?>
  </div>
  <div class="mb-3">
    <?= $this->Form->input('password',array('type'=>'password','class'=>'form-control','value'=>'')); ?>
  </div>
  <div class="mb-3">
    <?= $this->Form->input('perfil_id',array('type'=>'select','class'=>'form-control','options'=>$perfiles,'empty'=>'Seleccione una Opción','required'=>true)); ?>
  </div>
  <button type="submit" class="btn btn-primary">Guardar Registro</button>
<?= $this->Form->end(); ?>


