


	<div class="row">
		<h1 class="text-center" style="margin-bottom:50px;"><button type="button" name="button" class="btn btn-warning" id="btnWithoutAjax">Sin ajax</button> | Codeigniter | <button type="button" name="button" class="btn btn-success" id="btnWithAjax">con ajax</button></h1>

		<div class="col-md-6 col-md-offset-3" id="without-ajax">
			<a href="<?= site_url('todos/create'); ?>" class="btn btn-primary">Crear tarea</a>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>Tarea</th>
						<th>Hecho?</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($todos as $todo): ?>
						<tr>
							<td><?= $todo->content ?></td>
							<td><?= $todo->isDone ? 'SI' : 'NO' ?></td>
							<td>
								<?php echo anchor('todos/show/'.$todo->id,'Editar') ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

		</div>
		<div class="col-md-6 col-md-offset-3" id="with-ajax">
			<h2>Codeigniter + Jquery + AJAX</h2>
			<p class="lead">
				<input type="text" name="name" id="txtTodo" value="" class="form-control" required="true">
				<button type="button" id="btnCreateTodo" class="btn btn-success" style="margin-top:10px">Agregar</button>
			</p>
			<div class="app">
				<ul id="list-todos">
				</ul>
			</div>
			<div id="update-todo">
				<form id="editTodo">
					<input type="hidden" name="name" id="id-edit">
					<div class="form-group">
						<label for="">Tarea</label>
						<input type="text" name="content" id="content-edit" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Hecha?</label>
						<input type="checkbox" id="isDone-edit">
					</div>
					<input type="submit" value="Actualizar" class="btn btn-primary">
					<button type="button" class="btn btn-danger" id="btnCancelEdit">Cancelar</button>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src="<?php echo base_url().'application/assets/app.js' ?>">

</script>
