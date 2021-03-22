<?php 

	class Gallery{

		public static function getArtsItemById($id){

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

			$result = $db->query('SELECT art_id, login, type, name, year, month, date '
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

		public static function getСommentsByArts(){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT art.art_id AS art_id, COUNT(comments_art.art_id) AS comments '
							.	'FROM art '
							.	'LEFT JOIN comments_art ON art.art_id = comments_art.art_id '
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
	}

 ?>