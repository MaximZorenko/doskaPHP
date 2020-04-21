<h4 class="title_page">Результаты поиска</h4>
<?=$_SESSION['msg'];?>
<?php unset($_SESSION['msg']); ?>
<?php foreach($params1 as $row){ ?>
		<div class="t_mess">
			<h4 class="title_p_mess"><a href="http://localhost/doska/?action=view_mess&amp;id=<?=$row['id']?>"><?=$row['title'];?>|<?=$row['id']?></a></h4>
			<p class="p_mess_cat">
				<strong>Категория:</strong> <?=$row['name_categories']?>				|
				<strong>Тип объявления:</strong> <?=$row['name_razd'];?>				|
				<strong>Город:</strong> <?=$row['town'];?>			
			</p>
			<p class="p_mess_cat">
				<strong>Дата добавления объявления:</strong><?=$row['date'];?>				|
				<strong>Цена:</strong> <?=$row['price']?>				|
				<strong>Автор</strong> <a href="mailto:meits@mail.ru">Viktor</a>
			</p>
			<p>
					<?=$row['text'];?>
			</p>
<?php } ?>