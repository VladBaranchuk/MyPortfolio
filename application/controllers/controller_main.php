<?php 

	include_once ROOT . '/application/models/Films.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class MainController{

		public function actionIndex(){ // Выпрашивает у модели список

			if(!empty($_POST)){

					$List = Films::getFilmsListLimit(4, $_POST['more']);
		        	exit(json_encode($List, JSON_UNESCAPED_UNICODE));
			}
			
			$filmsList = Films::getFilmsListLimit(4);

			require_once(ROOT . '/application/views/main/index.php');

			return true;
		}
	}

?>
