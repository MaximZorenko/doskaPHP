<h3 class="title_page">Объявления</h3>
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
				<!-- <img class="mini_mess" src="files/Lighthouse.jpg"> -->
					<?=$row['text'];?>
			</p>
	<form method="POST">
		<input type="hidden" value="<?=$row['id']?>" name='id_post'>
		<input type="submit" value="DeletPost" name="deletPost">
	</form>			
		</div>
<?php } ?>
			<ul class="pager">
				<?php for($i = 1;$i <= $params3; $i++): ?>
				<li>
					<a href="?controller=main&page=<?=$i;?><?php if($params4){echo "&id_r=".$params4;}?>"><?=$i;?></a>
				</li>
				<?php endfor; ?>
				<!-- <li>
					<a href="http://localhost/doska/?action=main&amp;page=2">&gt;</a>
				</li>
				<li class="last">
					<a href="http://localhost/doska/?action=main&amp;page=2">Последняя</a>
				</li> -->
			</ul>
			