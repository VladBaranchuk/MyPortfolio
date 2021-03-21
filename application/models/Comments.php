<?php 

	class Comments{
													//Пользователь, ид для фильма или картины, какя бд, для картины или фильма
		public static function getCommentsListById($login, $extension_id, $area){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT date, text ' . 
			 	' FROM ' . $area . '_comments, comment ' . 
			 	' WHERE ' . $area . '_comments.comment_id = comment.comment_id AND ' . $area . '_comments.login = "' . $login . '" AND film_comments.film_id = ' . $extension_id);

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['date'] = $row['date'];
				$newList[$i]['text'] = $row['text'];
				$i++;
			}

			return $newList;
		}

	}

 ?>