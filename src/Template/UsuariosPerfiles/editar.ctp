<h3>Editar Perfil</h3>
<?= $this->Form->create($perfil,array('class'=>'form-horizontal')); ?>    
  <div class="mb-3">
    <?= $this->Form->input('perfil',array('type'=>'text','class'=>'form-control','required'=>true)); ?>
  </div>
  <button type="submit" class="btn btn-primary">Guardar Registro</button>
<?= $this->Form->end(); ?>


