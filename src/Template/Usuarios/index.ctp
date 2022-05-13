<h3>Usuarios</h3>
<br><?php echo $this->Html->link('<i class="fa fa-plus"> </i> Registrar',['controller' => 'Usuarios', 'action' => 'registrar'],['class'=>'btn btn-success','escape'=>false]); ?><br><br>

<div class="card">
  <div class="card-body">
    <h4>Filtros</h4>
    <?= $this->Form->create('usuario',array('role'=>'form')) ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">Id</th>
                <th width="6%">Nombre</th>
                <th width="13%">Apellido paterno</th>
                <th width="13%">Apellido materno</th>
                <th width="20%">Email</th>
                <th width="9%">Perfil</th>
                <th width="9%">Estatus</th>
                <th width="25%">Acciones</th>
            </tr>
            <tr>
                <th width="5%"><?= $this->Form->input('id',array('type'=>'text','class'=>'form-control','label'=>false)); ?></th>
                <th width="6%"><?= $this->Form->input('nombre',array('type'=>'text','class'=>'form-control','label'=>false)); ?></th>
                <th width="13%"><?= $this->Form->input('apellido_paterno',array('type'=>'text','class'=>'form-control','label'=>false)); ?></th>
                <th width="13%"><?= $this->Form->input('apellido_materno',array('type'=>'text','class'=>'form-control','label'=>false)); ?></th>
                <th width="20%"><?= $this->Form->input('email',array('type'=>'text','class'=>'form-control','label'=>false)); ?></th>
                <th width="9%"><?= $this->Form->input('perfil_id',array('type'=>'select','options'=>$perfiles,'empty'=>'Seleccione una Opción','class'=>'form-control','label'=>false)); ?></th>
                <th width="9%"><?= $this->Form->input('estatus_id',array('type'=>'select','options'=>$estatus,'empty'=>'Seleccione una Opción','class'=>'form-control','label'=>false)); ?></th>
                <th width="25%">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>  
                    <?php echo $this->Html->link('<i class="fa fa-trash"> </i> Limpiar Filtros',['controller' => 'Usuarios', 'action' => 'index' ],['class'=>'btn btn-primary','escape'=>false]); ?>
                </th>
            </tr>
        </thead>
    </table>
    <?= $this->Form->end(); ?>
 </div>
</div>
<br>
<div class="card">
  <div class="card-body">
    <h4>Información</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%"><?= $this->Paginator->sort('id') ?></th>
                <th width="6%"><?= $this->Paginator->sort('nombre') ?></th>
                <th width="13%"><?= $this->Paginator->sort('apellido_paterno') ?></th>
                <th width="13%"><?= $this->Paginator->sort('apellido_materno') ?></th>
                <th width="20%"><?= $this->Paginator->sort('email') ?></th>
                <th width="9%"><?= $this->Paginator->sort('perfil') ?></th>
                <th width="9%"><?= $this->Paginator->sort('estatus') ?></th>
                <th width="25%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td width="5%"><?= $this->Number->format($usuario->id) ?></td>
                <td width="6%"><?= @$usuario->nombre ?></td>
                <td width="13%"><?= @$usuario->apellido_paterno ?></td>
                <td width="13%"><?= @$usuario->apellido_materno ?></td>
                <td width="20%"><?= @$usuario->email ?></td>
                <td width="9%"><?= @$usuario->UsuariosPerfiles->perfil ?></td>
                <td width="9%"><?= @$usuario->UsuariosEstatus->estatus ?></td>
                <td width="25%">
                <?php if ($session['Perfil']['perfil']=="admin"): ?>
                    <?php echo $this->Html->link('<i class="fa fa-pencil"> </i> Editar',['controller' => 'Usuarios', 'action' => 'editar',@$usuario->id ],['class'=>'btn btn-warning','escape'=>false]); ?>
                    <?php echo $this->Html->link('<i class="fa fa-trash"> </i> Cancelar',['controller' => 'Usuarios', 'action' => 'eliminar',@$usuario->id ],['class'=>'btn btn-danger','escape'=>false]); ?>
                    <?php echo $this->Html->link('<i class="fa fa-thumbs-down"> </i> Desactivar',['controller' => 'Usuarios', 'action' => 'desactivar',@$usuario->id ],['class'=>'btn btn-dark','escape'=>false]); ?>
                <?php endif ?>
                    <?php echo $this->Html->link('<i class="fa fa-eye"> </i> Detalle',['controller' => 'Usuarios', 'action' => 'detalle',@$usuario->id ],['class'=>'btn btn-primary','escape'=>false]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeros')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registros(s) de un total de{{count}} Registros')]) ?></p>
    </div>
 </div>
</div>

