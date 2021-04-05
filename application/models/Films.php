<?php 

	class Films{

		public static function getFilmsItemById($id){

			$id = intval($id);

			if($id){

			$db = DB::getConnection();
			
			$result = $db->query('SELECT * '
					. 'FROM film '
					. 'WHERE film_id=' . $id);
			}

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newList = $result->fetch();

			return $newList;
		}

		public static function getFilmsList(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT film_id, name, price, genre, date, status, description, country, year, time, producer '
					. 'FROM film '
					. 'ORDER BY date DESC ');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['film_id'] = $row['film_id'];
				$newList[$i]['name'] = $row['name'];
				$newList[$i]['price'] = $row['price'];
				$newList[$i]['genre'] = $row['genre'];
				$newList[$i]['date'] = $row['date'];
				$newList[$i]['status'] = $row['status'];
				$newList[$i]['description'] = $row['description'];
				$newList[$i]['country'] = $row['country'];
				$newList[$i]['year'] = $row['year'];
				$newList[$i]['time'] = $row['time'];
				$newList[$i]['producer'] = $row['producer'];
				$i++;
			}

			return $newList;
		}

		public static function getFilmsListLimit($limit, $position = 0){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT film_id, name, price, genre, date, status, description, country, year, time, producer '
					. 'FROM film '
					. 'ORDER BY date DESC '
					. 'LIMIT ' . $position . ',' . $limit);

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['film_id'] = $row['film_id'];
				$newList[$i]['name'] = $row['name'];
				$newList[$i]['price'] = $row['price'];
				$newList[$i]['genre'] = $row['genre'];
				$newList[$i]['date'] = $row['date'];
				$newList[$i]['status'] = $row['status'];
				$newList[$i]['description'] = $row['description'];
				$newList[$i]['country'] = $row['country'];
				$newList[$i]['year'] = $row['year'];
				$newList[$i]['time'] = $row['time'];
				$newList[$i]['producer'] = $row['producer'];
				$i++;
			}

			return $newList;
		}

		public static function getArtisticList($genre){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT film_id, name, price, genre, date, status, description, country, year, time, producer '
					.	'FROM film '
					.	'WHERE genre = "' . $genre . '" '
					.	'ORDER BY date DESC');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['film_id'] = $row['film_id'];
				$newList[$i]['name'] = $row['name'];
				$newList[$i]['price'] = $row['price'];
				$newList[$i]['genre'] = $row['genre'];
				$newList[$i]['date'] = $row['date'];
				$newList[$i]['status'] = $row['status'];
				$newList[$i]['description'] = $row['description'];
				$newList[$i]['country'] = $row['country'];
				$newList[$i]['year'] = $row['year'];
				$newList[$i]['time'] = $row['time'];
				$newList[$i]['producer'] = $row['producer'];
				$i++;
			}

			return $newList;
		}

		public static Function setUpLikesByFilms($id, $login){
			

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('INSERT INTO likes_film (film_id, login) VALUES (' . $id . ', "' . $login . '")');


			if(!$result){
				$db->query('DELETE FROM likes_film WHERE film_id = ' . $id . ' and login = "' . $login . '"');

				return 'false';
			}

			return 'true';
		}

		public static function getLikesByFilms(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT film.film_id AS film_id, COUNT(likes_film.film_id) AS likes '
							.	'FROM film '
							.	'LEFT JOIN likes_film ON film.film_id = likes_film.film_id '
							.	'GROUP BY film.name '
							.	'ORDER BY film.film_id');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['film_id'] = $row['film_id'];
				$newList[$i]['likes'] = $row['likes'];
				$i++;
			}

			return $newList;
		}

		public static function getLikesListByFilmsFromUser($login){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT film_id FROM likes_film WHERE login = "' . $login . '"');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['film_id'] = $row['film_id'];
				$i++;
			}

			return $newList;
		}

		public static function getСommentsByFilms(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT film.film_id AS film_id, COUNT(film_comments.film_id) AS comments '
							.	'FROM film '
							.	'LEFT JOIN film_comments ON film.film_id = film_comments.film_id '
							.	'GROUP BY film.name '
							.	'ORDER BY film.film_id');
			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['film_id'] = $row['film_id'];
				$newList[$i]['comments'] = $row['comments'];
				$i++;
			}

			return $newList;
		}
	}

 ?>