<div class="add_mess">
	<?=$_SESSION['msg']; ?>
	<?php unset($_SESSION['msg']); ?>
	<form method="POST">
	<h4>Тема</h4>
	<input type="text" name="title">

	<h4>Teкст</h4>
	<textarea name="text" id="" cols="30" rows="10"></textarea>

	<h4>Категории</h4>
	<select name="id_categories" id="">		
		<?=$params1; ?>  
	</select>

	<h4>Разделы</h4>
		<?php foreach($params2->raz as $rowi): ?>
			<input type="radio" value="<?=$rowi['id']; ?>" name="id_razd">
			<?=$rowi['name_razd'];?>
		<?php endforeach; ?>

	<h4>Город</h4>
	<input type="text" name="town">

	<h4>Основное изображение</h4>
	<input type="file" name="img">

	<h4>Период актульности</h4>
	<select name="time" id="">
		<option value="10">10 дней</option>
		<option value="20">20 дней</option>
		<option value="30">30 дней</option>
	</select>

	<h4>Цена</h4>
	<input type="text" name="price"><br>

	<input type="submit" value="Добавить" name='add_mess'>
</form>
</div>