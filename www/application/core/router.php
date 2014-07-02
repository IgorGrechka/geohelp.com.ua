<?php
class Router {
		
	static function start() {
	session_start();
	
	// контроллер и действие по умолчанию
	$controller_name = 'main';
	$action_name = 'default';
	$routes = explode('/', $_SERVER['REQUEST_URI']);
	
	// получаем имя контроллера
	if (!empty($routes[1])) {	
		$controller_name = $routes[1];
	}
		
	// получаем имя экшена
	if (!empty($routes[2])) {
		$action_name = $routes[2];
	}

	// добавляем префиксы
	$model_name = 'Model_'.$controller_name;
	$controller_name = 'Controller_'.$controller_name;
	$action_name = 'method_'.$action_name;

	// подцепляем файл с классом модели (файла модели может и не быть)

	$model_file = strtolower($model_name).'.php';
	$model_path = "application/models/".$model_file;

//echo "<b>Файл модели: </b>".$model_file."<br>";
//echo "<b>Путь к файлу модели: </b>".$model_path."<br>";

	if(file_exists($model_path)) {
		include "application/models/".$model_file;
//echo "<b>Подключено:</b> application/models/".$model_file."<br><hr>";
	}

	// подцепляем файл с классом контроллера
	$controller_file = strtolower($controller_name).'.php';
	$controller_path = "application/controllers/".$controller_file;
		
//echo "<b>Файл контроллера: </b>".$controller_file."<br>";
//echo "<b>Путь к файлу контроллера: </b>".$controller_path."<br>";
		
	if(file_exists($controller_path)) {
		include "application/controllers/".$controller_file;
//echo "<b>Подключено:</b> application/controllers/".$controller_file."<br><hr>";
	}
		/*else
		{
			Route::ErrorPage404();
		} */
		
		// создаем контроллер
//echo "<b>Имя контроллера: </b>".$controller_name."<br>";
		
	$controller = new $controller_name;
	$action = $action_name;
		
//echo "<b>Вызываемый метод: </b>".$action."<br>";
		
	if(method_exists($controller, $action)) {
		// вызываем действие контроллера
		$controller->$action();
	}
		/*else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}*/
	}

	/*function ErrorPage404()
	{
      $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
      header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }*/
}