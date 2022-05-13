<h3>Estatus</h3>
<br>
<div class="card">
  <div class="card-body">
  	<h3>Información</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Estatus</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($estatus)): ?>
				<?php foreach ($estatus as $key => $value): ?>
					<tr>
						<td><?php echo @$value['id'] ?></td>
						<td><?php echo @$value['estatus'] ?></td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
	</div>
</div>
