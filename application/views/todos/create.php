<h1>Crear nueva tarea</h1>
<?= validation_errors(); ?>
<?= form_open('todos/store') ?>
	<div class="form-group">
		<label for="content">Tarea</label>
		<input type="text" name="content" class="form-control">
	</div>
	<input type="submit" value="Guardar" class="btn btn-success">
	<a href=" <?php echo site_url('todos') ?> " class="btn btn-warning">Cancelar</a>
</form>
