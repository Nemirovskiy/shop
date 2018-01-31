<?
/**
*** Класс для работы с Базой
***/
class DBase
{
	private static $connect = null;
	private $bd;
	private function __construct(){
		$this->bd = new PDO("mysql:host=localhost;dbname=".DB_NAME,DB_LOGIN,DB_PASS);
	}

	public static function base(){
		if(self::$connect == null){
			self::$connect = new DBase;
			//self::$connect->bd = new PDO("mysql:host=localhost;dbname=".DB_NAME,DB_LOGIN,DB_PASS);
		}
		return self::$connect;
	}
	// запрос к БД
	public function Query($query,$params = array()){
		$result = $this->bd->prepare($query);
		$result->execute($params);
		return $result;
	}
	// запрос с выборкой
	public function Select($query,$params = array()){
		$result = $this->Query($query,$params);
		if($result){
			return $result->fetchAll();
		}
		return false;
	}
	// подключение к БД
	public function connect($name,$login,$pass){
	//	$this->bd = new PDO("mysql:host=localhost;dbname=".$name,$login,$pass);
	}
}