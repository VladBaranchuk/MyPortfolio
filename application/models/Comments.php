<?php 

	class Comments{
													//Пользователь, ид для фильма или картины, какя бд, для картины или фильма
		public static function getCommentsListById($id, $area){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('SELECT * ' . 
			 	' FROM ' . $area . '_comments, comment ' . 
			 	' WHERE ' . $area . '_comments.comment_id = comment.comment_id AND ' . $area . '_comments.' . $area . '_id = ' . $id . 
			 	' ORDER BY ' . $area . '_comments.comment_id DESC');

			$i = 0;
			while($row = $result->fetch()) {
				$newList[$i]['comment_id'] = $row['comment_id'];
				$newList[$i]['login'] = $row['login'];
				$newList[$i]['date'] = $row['date'];
				$newList[$i]['text'] = $row['text'];
				$i++;
			}

			return $newList;
		}

		public static function setComment($login, $id, $area, $message){

			$db = DB::getConnection();
			$newList = array();

			$result = $db->query('INSERT INTO comment (date, text) VALUES ("' . date('Y-m-d') . '", "' . $message . '")');

			if($result){

				$result = $db->query('SELECT comment_id FROM comment ORDER BY comment_id DESC LIMIT 1');

				$result->setFetchMode(PDO::FETCH_ASSOC);

				$newList = $result->fetch();

				$db->query('INSERT INTO ' . $area . '_comments (' . $area . '_id, comment_id, login) '
					.	'VALUES (' . $id . ', ' . $newList['comment_id'] . ', "' . $login . '")');	

				return ['id' => $newList['comment_id'], 
						'date' => date('d.m.Y'),
						'message' => $message,
						'login' => $login];
			}
		}
	}
 ?>