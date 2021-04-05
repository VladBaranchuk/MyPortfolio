<?php 

	include_once ROOT . '/application/models/Films.php';
	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/Comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class MainController{

		public function actionIndex(){ // Выпрашивает у модели список

			if(!empty($_POST['id'])){
					$result = Gallery::setUpLikesByArts($_POST['id'], '@mariaolhtz');
		        	exit($result);
			}

			$artsList = Gallery::getArtsListLimit(7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser('@mariaolhtz');

			$artsComments = Gallery::getСommentsByArts();
			
			$filmsList = Films::getFilmsListLimit(4);

			require_once(ROOT . '/application/views/main/index.php');

			return true;
		}
	}

?>
