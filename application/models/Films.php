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

	}

 ?>