<?php
//require_once "InterfaceGuestBook.php";

class GuestBook extends ConnectDb //implements InterfaceGuestBook
{
/** **********************
		PROPERTIES:
 ************************/
//
/** **********************
		METHODS:
 ************************/

	/** FILTER of DATA comes from GET/POST
	 * @param (int/string) $data - data from GET/POST
	 * @param (string) $type - flag for the function, by what criterion to filter the data
	 * @return int/string
	*/
	public function f_clearData($data,$type){
		switch($type){
			case 'integer': return trim(htmlspecialchars(strip_tags(abs((integer)$data)))); break;
			case 'string_to_db_mysqli': return $this->_db->real_escape_string(trim(htmlspecialchars(strip_tags($data)))); break;
			case 'string_to_db_prepare': return trim(htmlspecialchars(strip_tags($data))); break;
			case 'string_to_lower': return strtolower(trim(addslashes(htmlspecialchars(strip_tags($data))))); break;
		}
	} //__/f_clearData()


	/** CONVERTER OBJECT FROM DB(sql-query) into ARRAY
	 * @param (object) $result - object from DB (sql-query)
	 * @return array
	*/
	public function f_dbArray($result) {
		$arr_db = array();

		while($myrow = $result->fetch_array(MYSQLI_ASSOC)) {
			$arr_db[] = $myrow;
		}
		return $arr_db;

	}  //__/f_dbArray()


	/** GET the POSTS from DB
	 * @return array/object (depending by constant in PDO fetchAll()-function:
	 						PDO::FETCH_OBJ /PDO::FETCH_NUM /PDO::FETCH_ASSOC /PDO::FETCH_KEY_PAIR /PDO::FETCH_UNIQUE /PDO::FETCH_COLUMN )
	*/
	public function f_GetPosts() {
		$stmt = $this->_db->query('SELECT * FROM posts ORDER BY id DESC');  //$stmt - special object PDO - PDO statement. return PDO statement/false
		//$stmt->setFetchMode(PDO::FETCH_CLASS, 'GuestBook');

		return $stmt->fetchAll(PDO::FETCH_ASSOC);  //return $stmt;
	} //__/f_GetPosts


	/** INSERT the POST from User to DB
	 * @param (string): $id_user,$name_user,$gender_user,$email_user,$avatar_user,$link_user,$title,$text - from $_POST
	 * @param (integer): $time_create - from $_POST
	 * @return special PDO object/boolean (PDO statement/false)
	*/
	public function f_SavePosts($id_user, $name_user, $gender_user, $email_user, $avatar_user, $link_user, $title, $text, $time_create) {

		$sql= "INSERT INTO posts (id_user, name_user, gender_user, email_user, avatar_user, link_user, title, text, time_create)
				VALUES (:id_user, :name_user, :gender_user, :email_user, :avatar_user, :link_user, :title, :text, :time_create)";

		$stmt= $this->_db->prepare($sql);
		$stmt->bindValue(':id_user', $id_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':name_user', $name_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':gender_user', $gender_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':email_user', $email_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':avatar_user', $avatar_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':link_user', $link_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':time_create', $time_create, PDO::PARAM_INT); //bindParam
		$stmt->execute();  //$stmt - special object PDO - PDO statement.

	} //__/f_SavePosts()


	/** GET the COMMENTS from DB
	 * @return array/object (depending by constant in PDO fetchAll()-function:
	*/
	public function f_GetComments() {

		$stmt = $this->_db->query('SELECT * FROM comments ORDER BY time_create');  //$stmt - special object PDO - PDO statement. return PDO statement/false
		//$stmt->setFetchMode(PDO::FETCH_CLASS, 'GuestBook');

		return $stmt->fetchAll(PDO::FETCH_ASSOC);  //return $stmt;
	} //__/f_GetComments


	/** INSERT the COMMENT from User to DB
	 * @param (string): $id_user,$name_user,$gender_user,$email_user,$avatar_user,$link_user,$text - from $_POST
	 * @param (integer): $id_post, $time_create, $indicator - from $_POST
	 * @return special PDO object/boolean (PDO statement/false)
	*/
	public function f_SaveComments($id_post, $id_user, $name_user, $gender_user, $email_user, $avatar_user, $link_user, $text, $time_create, $indicator) {
		$sql= "INSERT INTO comments (id_parent, id_user, name_user, gender_user, email_user, avatar_user, link_user, text, time_create, indicator)
				VALUES (:id_post, :id_user, :name_user, :gender_user, :email_user, :avatar_user, :link_user, :text, :time_create, :indicator)";

		$stmt= $this->_db->prepare($sql);
		$stmt->bindValue(':id_post', $id_post, PDO::PARAM_INT);  //bindParam
		$stmt->bindValue(':id_user', $id_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':name_user', $name_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':gender_user', $gender_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':email_user', $email_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':avatar_user', $avatar_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':link_user', $link_user, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //bindParam
		$stmt->bindValue(':time_create', $time_create, PDO::PARAM_INT); //bindParam
		$stmt->bindValue(':indicator', $indicator, PDO::PARAM_INT); //bindParam
		$stmt->execute();  //$stmt - special object PDO - PDO statement.

	} //__/f_GetPosts



	/** UPDATE the Post of User in DB
	 * @param (integer): id_post - from $_POST
	 * @param (string): text - from $_POST
	 * @return special PDO object/boolean (PDO statement/false)
	*/
	public function f_updatePost($id_post, $text) {

		$sql= "UPDATE posts SET text = :text WHERE id = :id_post";
		$stmt= $this->_db->prepare($sql);
		$stmt->bindValue(':id_post', $id_post, PDO::PARAM_INT);  //bindParam
		$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //bindParam
		$stmt->execute();  //$stmt - special object PDO - PDO statement.

		/* _____________________or this:
			$stmt = $this->_db->prepare('UPDATE posts SET text = :text WHERE id = :id_post');
			$stmt->execute(array(
				':id_post'   => $id_post,
				':text' => $text
			));  //$stmt - special object PDO - PDO statement.
		*/

	}  //__/f_updatePost()


	//--------------------------------------------------------------------



	/** UPDATE the Comment of User in DB
	 * @param (integer): id_post - from $_POST
	 * @param (string): text - from $_POST
	 * @return special PDO object/boolean (PDO statement/false)
	 */
	public function f_updateComment($id_post, $text) {

		$sql= "UPDATE comments SET text = :text WHERE id = :id_post";
		$stmt= $this->_db->prepare($sql);
		$stmt->bindValue(':id_post', $id_post, PDO::PARAM_INT);  //bindParam
		$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //bindParam
		$stmt->execute();  //$stmt - special object PDO - PDO statement.

		/* _____________________or this:
			$stmt = $this->_db->prepare('UPDATE posts SET text = :text WHERE id = :id_post');
			$stmt->execute(array(
				':id_post'   => $id_post,
				':text' => $text
			));  //$stmt - special object PDO - PDO statement.
		*/

	}  //__/f_updatePost()





} //__/GuestBook

?>