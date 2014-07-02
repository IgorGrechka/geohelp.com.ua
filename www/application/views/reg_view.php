<h1>Регистрация</h1>
<div id="reg">
	<form name="reg" action="" method="post">
		<table>
			<tr>
				<td align="right">Логин</td>
				<td>
					<input type="text" name="login" value=""/>
				</td>
			</tr>
			<tr>
				<td align="right">Пароль</td>
				<td>
					<input type="password" name="password"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<img src="application/views/captcha.php" alt="Каптча"/>
				</td>
			</tr>
			<tr>
				<td>Код с картинки</td>
				<td>
					<input type="text" name="captcha">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="reg" value="Зарегистрироваться"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<p style="color: red"><?echo $data["reg_info"]?></p>
				</td>
			</tr>
		</table>
	</form>
</div>