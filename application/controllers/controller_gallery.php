<?php 

	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class GalleryController{

		public function actionIndex(){ // Выпрашивает у модели список
			
			$artsList = Gallery::getArtsListLimit(15);

			$artsLike = Gallery::getLikesByArts();

			$artsComments = Gallery::getСommentsByArts();

			require_once(ROOT . '/application/views/gallery/index.php');

			return true;
		}

		public function actionView($id){  // Выпрашивает у модели один
			
			// $filmsItem = Films::getFilmsItemById($id);

			// $comments = Comments::getCommentsListById('@bvlad', $id, 'film');

			require_once(ROOT . '/application/views/gallery/indexId.php');

			return true;
		}
	}

?>