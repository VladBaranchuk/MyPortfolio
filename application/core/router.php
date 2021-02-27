<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Router
{

	private $routes;

	public function __construct(){

		$routesPath = ROOT . "/application/config/routes.php";
		$this->routes = include($routesPath);
	}

	// Получить строку запроса
	// return string
	private function getURI(){

		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run(){
		
		// Получить строку запроса
		$uri = $this->getURI();

		// Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {
			
			if(preg_match("~$uriPattern~", $uri)){

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$segments = explode('/', $internalRoute);

				$controller = array_shift($segments);

				$controllerName = 'controller_' . $controller;
				$actionName = 'action' . ucfirst(array_shift($segments));
				$className = ucfirst($controller) . 'Controller';

				$parameters = $segments;

				// Подключить файл класса-контроллера

				$controllerFile = ROOT . '/application/controllers/' . $controllerName . '.php';

				if(file_exists($controllerFile)){
					include_once($controllerFile);
				}

				// Создать объект, вызвать метод action

				$controllerObject = new $className;
				$result = call_user_func_array([$controllerObject, $actionName], $parameters); //вызывает пользовательскую функцию с переменным числом параметров ( точнее кидает массив, а не одну переменную)

				if($result != null){
					break;
				}
			}

		}

	}

}
