<?if ($data) {
	echo <<<TEXT
<h1>Инструменты администратора</h1>
	<div>
	<li><a href="/admin/add_znak">Добавить данные</a></li>
	<li><a href="/">На главную</a></li>
	</div>
TEXT;
}else{
	echo <<<TEXT
<h2>Вы не авторизованы!</h2>
<h2>Пожалуйста авторизируйтесь под учётной записью администратора</h2>
TEXT;
}