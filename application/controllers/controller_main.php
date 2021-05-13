<?php 

	include_once ROOT . '/application/models/Films.php';
	include_once ROOT . '/application/models/Gallery.php';
	include_once ROOT . '/application/models/Comments.php';
	include_once ROOT . '/application/components/TimeHelper.php';
	include_once ROOT . '/application/models/Registration.php';

	class MainController{

		public function actionIndex(){ // Выпрашивает у модели список

			if(!empty($_POST['id'])){
					$result = Gallery::setUpLikesByArts($_POST['id'], $_SESSION["login"]);
		        	exit($result);
			}

			if(isset($_POST['type'])){

				if($_POST['type'] == "signup"){

					$name = $_POST['name'];
					$surname = $_POST['surname'];
					$middleName = $_POST['middlename'];
					$login = $_POST['login'];
					$email = $_POST['email'];
					$password = $_POST['password'];

					$reg = Registration::Reg($name, $surname, $middleName, $login, $email, $password);
					
					if($reg){
						Registration::Autorization($login);
					}

				}
				else if($_POST['type'] == "login"){

					$login = $_POST['login'];
					$password = $_POST['password'];

					// $log = Registration::Log($login, $password);
					echo 'ascasscasc';
					// if($log){
						Registration::Autorization($login);
					// }
				}

			}

			$artsList = Gallery::getArtsListLimit(7);

			$artsLike = Gallery::getLikesByArts();

			$userLikes = Gallery::getLikesListByArtsFromUser($_SESSION["login"]);

			$artsComments = Gallery::getСommentsByArts();
			
			$filmsList = Films::getFilmsListLimit(4);

			require_once(ROOT . '/application/views/main/index.php');

			return true;
		}
	}

?>
