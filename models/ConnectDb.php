<?php
/**  CONNECTED with DB "message_wall" (mySQL)
 *   Use PDO Driver
 */

class ConnectDb
{
	protected $_db;

	const DB_HOST = 'localhost'; //Host
	const DB_LOGIN = 'message_wall'; //Login to DB
	const DB_PASSWORD = '55555'; //Password Login to DB
	const DB_NAME = 'message_wall'; //Name of DB

	//construct
	function __construct() {
	//$this->_db = new mysqli( self::DB_HOST, self::DB_LOGIN, self::DB_PASSWORD,self::DB_NAME ); // подкл.к БД
	//if (mysqli_connect_errno()) { printf("Нет соединения с БД '".DB_NAME."': %s\n", mysqli_connect_error()); }

		$dsn = 'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.'';
		$option_pdo = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  //PDO::FETCH_OBJ //PDO::FETCH_NUM //PDO::FETCH_ASSOC
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',  //PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"
	);

		try {
			$this->_db = new PDO($dsn, self::DB_LOGIN, self::DB_PASSWORD, $option_pdo);
		}
		catch(PDOException $e) {
			echo '<p style="text-align: center;color: red;"> CONNECT ERROR: ' . $e->getMessage().'</p>'; exit();
		}

	} //__/construct


	//destruct
	function __destruct() {
		$this->_db = NULL;  //unset($this->_db);
	} //__/destruct



} //__/ConnectDb


//try {
//	$this->_db = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset='.$this->_charset.'', self::DB_LOGIN, self::DB_PASSWORD);
//	$this->_db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//}
//catch(PDOException $e) { echo '<p style="text-align: center;color: red;">CONNECT ERROR: ' . $e->getMessage().'</p>';  exit(); }


?>