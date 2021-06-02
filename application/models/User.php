<?php 

	class User{

		public static function rewriteLegend($legend, $login){

			$db = DB::getConnection();

			$result = $db->prepare("UPDATE users SET legend = :legend WHERE login = :login");

			$result->bindParam(':login', $login);
			$result->bindParam(':legend', $legend);

			if($result->execute()){

				$stmt = $db->prepare("SELECT legend FROM users WHERE login = :login");

				$stmt->bindParam(':login', $login);

				$stmt->execute();

				$row = $stmt->fetch();

				$_SESSION["legend"] = $row["legend"];

				return $row;
					
			}
		}

		public static function setAvatar($avatar, $login){
			
			debug($avatar);
			#return $_FILES[$avatar];
			
		}

	}

 ?>