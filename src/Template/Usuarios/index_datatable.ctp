<?php echo $this->element('plugins_datatable') ?>

<h3>Usuarios Datatable</h3>
<br><?php echo $this->Html->link('<i class="fa fa-plus"> </i> Registrar',['controller' => 'Usuarios', 'action' => 'registrar'],['class'=>'btn btn-success','escape'=>false]); ?><br><br>

<div class="card">
  <div class="card-body">
  	<h4>Información</h4>
	<table id="example" class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Email</th>
				<th>Perfil</th>
				<th>Estatus</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($usuarios)): ?>
				<?php foreach ($usuarios as $key => $value): ?>
					<tr>
						<td><?php echo @$value['id'] ?></td>
						<td><?php echo @$value['nombre'] ?></td>
						<td><?php echo @$value['apellido_paterno'] ?></td>
						<td><?php echo @$value['apellido_materno'] ?></td>
						<td><?php echo @$value['email'] ?></td>
						<td><?php echo @$value->UsuariosPerfiles->perfil ?></td>
						<td>
							<?php if (@$value['activo']==1): ?>
								Activo	
							<?php else: ?>
								Inactivo	
							<?php endif ?>
						</td>
						<td>
						<?php if ($session['Perfil']['perfil']=="admin"): ?>
							<?php echo $this->Html->link('<i class="fa fa-pencil"> </i> Editar',['controller' => 'Usuarios', 'action' => 'editar',@$value['id']],['class'=>'btn btn-warning','escape'=>false]); ?>
							<?php echo $this->Html->link('<i class="fa fa-trash"> </i> Cancelar',['controller' => 'Usuarios', 'action' => 'eliminar',@$value['id']],['class'=>'btn btn-danger','escape'=>false]); ?>
							<?php echo $this->Html->link('<i class="fa fa-thumbs-down"> </i> Desactivar',['controller' => 'Usuarios', 'action' => 'desactivar',@$value['id']],['class'=>'btn btn-dark','escape'=>false]); ?>
						<?php endif ?>
							<?php echo $this->Html->link('<i class="fa fa-eye"> </i> Detalle',['controller' => 'Usuarios', 'action' => 'detalle',@$value['id']],['class'=>'btn btn-primary','escape'=>false]); ?>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
	<br><br><br>
	</div>	
</div>
