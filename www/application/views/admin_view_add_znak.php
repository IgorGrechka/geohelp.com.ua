<h1>Добавление условного знака</h1>
<table>
	<form action="" method="post">
		<tr>
			<td colspan="2" align="center" style="color: red">
			<?echo $data["status"];?>
			</td>
		<tr>
			<td>Номер в каталоге</td>
			<td>
				<input type="text" name="id_order">
			</td>
		</tr>
		<tr>
			<td>Имя каталога</td>
			<td>
				<input type="text" name="cat_name">
			</td>
		</tr>
		<tr>
			<td>Имя знака</td>
			<td>
				<input type="text" name="zn_name">
			</td>
		</tr>
		<tr>
			<td>Описание</td>
			<td>
				<textarea colls="200" rows="5" name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td>Масштаб</td>
			<td>
				<select name="scale">
					<option value="500">1:500</option>
					<option value="1000">1:1000</option>
					<option value="2000">1:2000</option>
					<option value="5000">1:5000</option>
				</select>
			</td>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Добавить">
			</td>
		</tr>
		</tr>
	</form>
	<form action="" method="post">
		<tr>
			<td>Номер дополнения</td>
			<td>
				<input type="text" name="add_num">
			</td>
		</tr>
		<tr>
			<td>К условному знаку</td>
			<td>
				<input type="text" name="add_zn_num">
			</td>
		</tr>
		<tr>
			<td>Дополнение</td>
			<td>
				<textarea colls="200" rows="5" name="add_text"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Добавить">
			</td>
		</tr>
	</form>
	
</table>
<a href="/admin">Назад</a>