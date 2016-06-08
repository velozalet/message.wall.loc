<?
// InterfaceGuestBook - class contains a declaration of the basic property & methods for working application "Guest Book"

interface InterfaceGuestBook
{

	public function f_clearData($data, $type);
//	/** FILTER of DATA comes from GET/POST
//	 * @param (int/string) $data - data from GET/POST
//	 * @param (string) $type - flag for the function, by what criterion to filter the data
//	 * @return int/string
//	 */

	public function f_dbArray($result);
//	/** CONVERTER OBJECT FROM DB(sql-query) into ARRAY
//	 * @param (object) $result - object from DB (sql-query)
//	 * @return array
//	 */


	public function f_GetPosts();
//	/** GET the all POSTS from DB
//	 * @return array/object (depending by constant in PDO fetchAll()-function):
//	 	 PDO::FETCH_OBJ
//	 	 PDO::FETCH_NUM
//		 PDO::FETCH_ASSOC
//		 PDO::FETCH_KEY_PAIR
//		 PDO::FETCH_UNIQUE
//		 PDO::FETCH_COLUMN
//	 */


	public function f_SavePosts($id_user, $name_user, $gender_user, $email_user, $avatar_user, $link_user, $title, $text, $time_create);
//	/** INSERT the POST from User to DB
//	 * @param (string) - comes from $_POST:
//		 * $id_user - data logined User from Cookie
//		 * $name_user - data logined User from Cookie
//		 * $gender_user - data logined User from Cookie
//		 * $email_user - data logined User from Cookie
//		 * $avatar_user - URL from "FaceBook" by user avatar
//		 * $link_user - link to personal page User (account) in "FaceBook"
//		 * $title - title new post (topic)
//		 * $text - text new post (topic)
//	 * @param (integer) - comes from $_POST:
//	 	 * $time_create - timeStamp (current date) create Post
//	 * @return special PDO object/boolean (PDO statement/false)
//	 */


	public function f_GetComments();
//	/** GET the all COMMENTS from DB
//	 * @return array/object (depending by constant in PDO fetchAll()-function):
//		PDO::FETCH_OBJ
//		PDO::FETCH_NUM
//		PDO::FETCH_ASSOC
//		PDO::FETCH_KEY_PAIR
//		PDO::FETCH_UNIQUE
//		PDO::FETCH_COLUMN
//	 */


	public function f_SaveComments($id_post, $id_user, $name_user, $gender_user, $email_user, $avatar_user, $link_user, $text, $time_create, $indicator);
//	/** INSERT the COMMENT from User to DB
//	 * @param (string) - comes from $_POST:
//		 * $id_user - data logined User from Cookie
//		 * $name_user - data logined User from Cookie
//		 * $gender_user - data logined User from Cookie
//		 * $email_user - data logined User from Cookie
//		 * $avatar_user  URL from "FaceBook" by user avatar
//		 * $link_user - link to personal page User (account) in "FaceBook"
//		 * $text - text new post (topic)
//	 * @param (integer)- comes from $_POST:
//		 * $id_post - ID parent post
//		 * $time_create - timeStamp (current date) create Post
//		 * $indicator - flag(indicator) is comment to Post (0) or comment to comment (1)
//	 * @return special PDO object/boolean (PDO statement/false)
//	 */


	public function f_updatePost($id_post, $text);
//	/** UPDATE the Post of User in DB
//	 * @param (integer): id_post - comes from $_POST
//	 * @param (string): text - comes from $_POST:
//	 * @return special PDO object/boolean (PDO statement/false)
//	 */



} //__/InterfaceGuestBook
?>