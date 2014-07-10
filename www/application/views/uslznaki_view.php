<div>
<h2>Поиск условных знаков</h2>
<form action="" method="post" />
	<tr>
		<td>
			<input type="text" name="zn_name" />
			</td>
		<td>
			<input type="submit" name="search" value="Искать" />
		</td>
	</tr>
</form>
</div>
<h1>Полный каталог</h1>
<div class="symbols">
<table border="1" cellpadding="5">
	<tr align="center">
		<td>Имя каталога</td>
		<td>Имя знака</td>
		<td>Описание</td>
		<td>Изображение</td>
	</tr>
<?php
foreach ($data as $row){
   echo <<<LIST
	<tr align="center">
	<td>{$row['cat_name']}</td>
	<td>{$row['zn_name']}</td>
	<td>{$row['description']}</td>
	<td><img src="{$row['img_sourse']}"></td>
	</tr>
	<tr>
		<td class="addon" colspan="4" align="right">
		<a class="addfx" href="">Дополнения</a>
			<div class=addon>
				<p>Дополнение</p>
				<p>Здесь будет текст дополнений</p>
			</div>
		</td>
	</tr>
LIST;
}
?>
</table>
</div>