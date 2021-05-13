<?php

	include_once ROOT . '/application/models/Gallery.php';

	class Registration{

		public static function Reg($name, $surname, $middlename, $login, $email, $password){

			date_default_timezone_set('Europe/Minsk');
			$date = date('Y-m-d', time());

			$db = DB::getConnection();

			$stmt = $db->prepare("INSERT INTO users (name, surname, middle_name, login, password, email, date) VALUES (:name, :surname, :middle_name, :login, :password, :email, :date)");

			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':surname', $surname);
			$stmt->bindParam(':middle_name', $middlename);
			$stmt->bindParam(':login', $login);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':date', $date);

			if($stmt->execute()){
				return true;
			}

			return false;
		}

		public static function Autorization($login){

			$db = DB::getConnection();

			$stmt = $db->prepare("SELECT * FROM users WHERE login = :login");

			$stmt->bindParam(':login', $login);

			$stmt->execute();

			while($row = $stmt->fetch()){
				$_SESSION["name"] = $row['name'] . " " . $row['surname'] . " " . $row['middle_name'];
				$_SESSION["login"] = $row['login'];
			}

			$_SESSION["pictures"] = Gallery::getNumberByArts($login, 'picture');
			$_SESSION["sculptures"] = Gallery::getNumberByArts($login, 'sculpture');
		}
	}

 ?>