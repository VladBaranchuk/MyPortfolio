<?php 

	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/Comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class GalleryController{

		public function actionIndex(){ // Выпрашивает у модели список

			if(!empty($_POST['more'])){

					$List = [Gallery::getArtsListLimit(6, $_POST['more']), Gallery::getLikesByArts(), Gallery::getСommentsByArts(), Gallery::getLikesListByArtsFromUser($_SESSION["login"])];
					$_POST['more'] = null;
		        	exit(json_encode($List, JSON_UNESCAPED_UNICODE));
			}
			if(!empty($_POST['id'])){
					$result = Gallery::setUpLikesByArts($_POST['id'], $_SESSION["login"]);
		        	exit($result);
			}
			
			$artsList = Gallery::getArtsListLimit(7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser($_SESSION["login"]);

			$artsComments = Gallery::getСommentsByArts();

			require_once(ROOT . '/application/views/gallery/index.php');

			return true;
		}

		public function actionView($id){  // Выпрашивает у модели один

			$artsList = Gallery::getArtsListLimit(7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser($_SESSION["login"]);
			
			$artsItem = Gallery::getArtsItemById($id);

			$artsComments = Gallery::getСommentsByArts();

			$comments = Comments::getCommentsListById($id, 'art');

			if(!empty($_POST['message'])){
					$result = Comments::setComment($_SESSION["login"], $_POST['id'], 'art', $_POST['message']);
		        	exit(json_encode($result, JSON_UNESCAPED_UNICODE));
			}

			require_once(ROOT . '/application/views/gallery/indexId.php');

			return true;
		}
	}

?>
