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
<table border="1" cellpadding="5">
	<tr align="center">
		<td>Имя каталога</td>
		<td>Имя знака</td>
		<td>Описание</td>
	</tr>
<?php
foreach ($data as $row){
   echo <<<LIST
	<tr align="center">
	<td>{$row['cat_name']}</td>
	<td>{$row['zn_name']}</td>
	<td>{$row['description']}</td>
	</tr>
LIST;
	}
?>
</table>
<br />