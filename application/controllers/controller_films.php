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

			if(!empty($_POST['message'])){
					$result = Comments::setComment($_SESSION["login"], $_POST['id'], 'film', $_POST['message']);
		        	exit(json_encode($result, JSON_UNESCAPED_UNICODE));
			}
			if(!empty($_POST['id'])){
					$result = Films::setUpLikesByFilms($_POST['id'], $_SESSION["login"]);
		        	exit($result);
			}
			
			$filmsItem = Films::getFilmsItemById($id);

			$comments = Comments::getCommentsListById($id, 'film');

			$filmsLike = Films::getLikesByFilms();

			$userLikes = Films::getLikesListByFilmsFromUser($_SESSION["login"]);

			$filmsComments = Films::getСommentsByFilms();

			require_once(ROOT . '/application/views/films/indexId.php');

			return true;
		}
	}

?>
