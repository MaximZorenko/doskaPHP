<div id="menu">
			<ul>
				<li><a href="?controller=add_mess">Добавить объявление</a></li>	
				<!-- <li><a href="?controller=p_mess">Ваши объявления</a></li> -->
				<li><a href="?controller=main">Все объявления</a></li>

		<?php foreach($razd->raz as $row): ?>
				<li><a href="?controller=main&amp;id_r=<?=$row['id'] ?>"><?=$row['name_razd'];?></a></li>
		<?php endforeach; ?>
			
			</ul>
			<div style="clear:both"></div>	
		</div>