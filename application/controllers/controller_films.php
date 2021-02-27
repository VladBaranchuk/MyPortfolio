<?php 

	include_once ROOT . '/application/models/Films.php';

	class FilmsController{

		public function actionIndex(){ // Выпрашивает у модели список
			
			$filmsList = Films::getFilmsList();

			require_once(ROOT . '/application/views/films/index.php');

			return true;
		}

		public function actionView($id){  // Выпрашивает у модели один
			
			$filmsItem = Films::getFilmsItemById($id);

			echo '<pre>';
			print_r($filmsItem);
			echo '</pre>';

			return true;
		}
	}

?>
