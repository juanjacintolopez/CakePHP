<h3>Perfiles</h3>
<br>
<div class="card">
  <div class="card-body">
  	<h3>Información</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Perfil</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($perfiles)): ?>
				<?php foreach ($perfiles as $key => $value): ?>
					<tr>
						<td><?php echo @$value['id'] ?></td>
						<td><?php echo @$value['perfil'] ?></td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
	</div>
</div>