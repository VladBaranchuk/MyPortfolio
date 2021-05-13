<?php 

	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/Comments.php';

	class CabinetController{

		public function actionIndex(){

			if(!empty($_POST['more'])){

				$List = [Gallery::getArtsListLogin($_SESSION["login"], 7, $_POST['more']), Gallery::getLikesByArts(), Gallery::getСommentsByArts(), Gallery::getLikesListByArtsFromUser($_SESSION["login"])];
				$_POST['more'] = null;
	        	exit(json_encode($List, JSON_UNESCAPED_UNICODE));
			}
			
			if(!empty($_POST['id'])){
				$result = Gallery::setUpLikesByArts($_POST['id'], $_SESSION["login"]);
	        	exit($result);
			}
			
			$artsList = Gallery::getArtsListLogin($_SESSION["login"], 7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser($_SESSION["login"]);

			$artsComments = Gallery::getСommentsByArts();

			require_once(ROOT . '/application/views/cabinet/index.php');

			return true;
		}
	}

 ?>