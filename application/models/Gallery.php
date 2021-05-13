<?php 

	class Gallery{

		public static function getArtsItemById($id){

			$id = intval($id);

			if($id){

			$db = DB::getConnection();
			
			$result = $db->query('SELECT * '
					. 'FROM art '
					. 'WHERE art_id = ' . $id);
			}

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newList = $result->fetch();

			return $newList;
		}

		public static function getArtsList(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT art_id, login, type, name, year, month, date '
					. 'FROM art '
					. 'ORDER BY date DESC ');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['art_id'] = $row['art_id'];
				$newList[$i]['login'] = $row['login'];
				$newList[$i]['type'] = $row['type'];
				$newList[$i]['name'] = $row['name'];
				$newList[$i]['year'] = $row['year'];
				$newList[$i]['month'] = $row['month'];
				$newList[$i]['date'] = $row['date'];
				$i++;
			}

			return $newList;
		}

		public static function getArtsListLimit($limit, $position = 0){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT art_id, login, type, name, year, month, high_color, middle_color, low_color, date '
					. 'FROM art '
					. 'LIMIT ' . $position . ',' . $limit);

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['art_id'] = $row['art_id'];
				$newList[$i]['login'] = $row['login'];
				$newList[$i]['type'] = $row['type'];
				$newList[$i]['name'] = $row['name'];
				$newList[$i]['year'] = $row['year'];
				$newList[$i]['month'] = $row['month'];
				$newList[$i]['high_color'] = $row['high_color'];
				$newList[$i]['middle_color'] = $row['middle_color'];
				$newList[$i]['low_color'] = $row['low_color'];
				$newList[$i]['date'] = $row['date'];
				$i++;
			}

			return $newList;
		}

		public static function getArtsListLogin($login, $limit, $position = 0){

			$db = DB::getConnection();

			$newList = array();

			$result = $db->query('SELECT * FROM art WHERE login = "' . $login . '" LIMIT ' . $position . ',' . $limit);


			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['art_id'] = $row['art_id'];
				$newList[$i]['login'] = $row['login'];
				$newList[$i]['type'] = $row['type'];
				$newList[$i]['name'] = $row['name'];
				$newList[$i]['year'] = $row['year'];
				$newList[$i]['month'] = $row['month'];
				$newList[$i]['high_color'] = $row['high_color'];
				$newList[$i]['middle_color'] = $row['middle_color'];
				$newList[$i]['low_color'] = $row['low_color'];
				$newList[$i]['date'] = $row['date'];
				$i++;
			}

			return $newList;
		}

		public static function getLikesByArts(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT art.art_id AS art_id, COUNT(likes_art.art_id) AS likes '
							.	'FROM art '
							.	'LEFT JOIN likes_art ON art.art_id = likes_art.art_id '
							.	'GROUP BY art.name '
							.	'ORDER BY art.art_id');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['art_id'] = $row['art_id'];
				$newList[$i]['likes'] = $row['likes'];
				$i++;
			}

			return $newList;
		}

		public static Function setUpLikesByArts($id, $login){
			

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('INSERT INTO likes_art (art_id, login) VALUES (' . $id . ', "' . $login . '")');


			if(!$result){
				$db->query('DELETE FROM likes_art WHERE art_id = ' . $id . ' and login = "' . $login . '"');

				return 'false';
			}

			return 'true';
		}

		public static function getLikesListByArtsFromUser($login){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT art_id FROM likes_art WHERE login = "' . $login . '"');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['art_id'] = $row['art_id'];
				$i++;
			}

			return $newList;
		}

		public static function getСommentsByArts(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT art.art_id AS art_id, COUNT(art_comments.art_id) AS comments '
							.	'FROM art '
							.	'LEFT JOIN art_comments ON art.art_id = art_comments.art_id '
							.	'GROUP BY art.name '
							.	'ORDER BY art.art_id');
			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['art_id'] = $row['art_id'];
				$newList[$i]['comments'] = $row['comments'];
				$i++;
			}

			return $newList;
		}

		public static function getNumberByArts($login, $type){

			$db = DB::getConnection();

			$stmt = $db->prepare("SELECT art_id FROM art WHERE login = :login AND type = :type");

			$stmt->bindParam(':login', $login);
			$stmt->bindParam(':type', $type);

			$stmt->execute();

			$row = $stmt->rowCount();

			return $row;
		}
	}

 ?>