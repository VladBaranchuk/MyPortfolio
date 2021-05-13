<?php 

	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/Comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';

	class UserController{

		// public function actionIndex(){ // Выпрашивает у модели список

		// 	if(!empty($_POST)){
		// 		mail('baranchuk050420@gmail.com', 'Тема письма',
		// 		$_POST['message'],
		// 		'From: igorcheburek618@gmail.com');
		// 		exit();
		// 	}

		// 	$artsList = Gallery::getArtsListLogin($_SESSION["login"], 7);

		// 	$artsLike = Gallery::getLikesByArts();

		// 	$userLikes = Gallery::getLikesListByArtsFromUser($_SESSION["login"]);

		// 	$artsComments = Gallery::getСommentsByArts();

		// 	require_once(ROOT . '/application/views/user/index.php');

		// 	return true;
		// }

		public function actionView($login){ 

			if(!empty($_POST)){
				mail('baranchuk050420@gmail.com', 'Тема письма',
				$_POST['message'],
				'From: igorcheburek618@gmail.com');
				exit();
			}

			$artsList = Gallery::getArtsListLogin($login, 7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser($_SESSION["login"]);

			$artsComments = Gallery::getСommentsByArts();

			require_once(ROOT . '/application/views/user/index.php');

			return true;
		}
	}

?>
