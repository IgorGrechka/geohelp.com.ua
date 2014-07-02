<h2>Вход на сайт</h2>
<form name="auth" action="" method="post">
	<table>
		<tr>
			<td>Логин</td>
			<td>
				<input type="text" name="login">
			</td>
		</tr>
		<tr>
			<td>Пароль</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="submit" name="auth" value="Войти"/>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<a href="/registration">Зарегистрироваться</a>
			</td>
		</tr>
		<tr align="center" style="color: red">
			<td colspan="2">
				<?echo $auth_err;?>
			</td>
		</tr>
	</table>
</form>