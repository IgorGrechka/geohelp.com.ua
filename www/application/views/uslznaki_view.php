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
<table>
	<tr>
		<td>Имя каталога</td>
		<td>Имя знака</td>
		<td>Описание</td>
		<td>Изображение</td>
	</tr>
<?php
foreach ($data as $row){
  echo <<<LIST
	<tr>
	<td>{$row['cat_name']}</td>
	<td>{$row['zn_name']}</td>
	<td>{$row['description']}</td>
	<td><img src="{$row['img_sourse']}"></td>
	</tr>
	<tr>
		<td class="addon" colspan="4">
		<a class="addfx" href="">Дополнения</a>
			<div class=addon>
LIST;
	foreach ($row["addon"] as $addon){
		echo ("<p align='justify'>".$addon["add_num"].". ");
		echo (str_replace('\r\n\r\n', ' ', $addon["add_text"])."</p>");
	}		
	 echo <<<LIST
			</div>
		</td>
	</tr>
LIST;
}
?>
</table>
</div>