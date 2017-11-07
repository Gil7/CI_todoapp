<h1>Tarea</h1>


<?= form_open('todos/update/'.$todo->id) ?>
	<label for="">Titulo</label>
	<input type="text" value="<?php echo $todo->content ?>" name="content">
	<br>
	<label for="isDone">Realizada?</label>
	<input type="checkbox" name="isDone"	>
	<br>
	<input type="submit" value="Actualizar">
</form>
<form action=""></form>

<a href="">Eliminar</a><br>
