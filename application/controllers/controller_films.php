<?php 

	include_once ROOT . '/application/models/Films.php';
	include_once ROOT . '/application/models/comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class FilmsController{

		public function actionIndex(){ // Выпрашивает у модели список
			
			if(!empty($_POST)){

				if($_POST['name'] == 'Все'){
					$List = Films::getFilmsList();
		        	exit(json_encode($List, JSON_UNESCAPED_UNICODE));
				}else{
					$List = Films::getArtisticList($_POST['name']);
		        	exit(json_encode($List, JSON_UNESCAPED_UNICODE));
				}   
			}

			$filmsList = Films::getFilmsList();

			require_once(ROOT . '/application/views/films/index.php');

			return true;
		}

		public function actionView($id){  // Выпрашивает у модели один
			
			$filmsItem = Films::getFilmsItemById($id);

			$comments = Comments::getCommentsListById('@bvlad', $id, 'film');

			require_once(ROOT . '/application/views/films/indexId.php');

			return true;
		}
	}

?>
