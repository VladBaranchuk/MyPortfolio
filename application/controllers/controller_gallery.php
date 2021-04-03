<?php 

	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/Comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class GalleryController{

		public function actionIndex(){ // Выпрашивает у модели список

			if(!empty($_POST['more'])){

					$List = [Gallery::getArtsListLimit(6, $_POST['more']), Gallery::getLikesByArts(), Gallery::getСommentsByArts(), Gallery::getLikesListByArtsFromUser('@mariaolhtz')];
					$_POST['more'] = null;
		        	exit(json_encode($List, JSON_UNESCAPED_UNICODE));
			}
			if(!empty($_POST['id'])){
					$result = Gallery::setUpLikesByArts($_POST['id'], '@mariaolhtz');
		        	exit($result);
			}
			
			$artsList = Gallery::getArtsListLimit(7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser('@mariaolhtz');

			$artsComments = Gallery::getСommentsByArts();

			require_once(ROOT . '/application/views/gallery/index.php');

			return true;
		}

		public function actionView($id){  // Выпрашивает у модели один
			
			$artsItem = Gallery::getArtsItemById($id);

			$comments = Comments::getCommentsListById('@mariaolhtz', $id, 'art');

			require_once(ROOT . '/application/views/gallery/indexId.php');

			return true;
		}
	}

?>
