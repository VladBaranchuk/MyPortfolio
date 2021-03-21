<?php 

	class RegistrationController{

		public function actionIndex(){ // Выпрашивает у модели список

			require_once(ROOT . '/application/views/registration/index.php');

			return true;
		}
	}

?>
