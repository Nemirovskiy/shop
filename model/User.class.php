<?
/**
*** Класс для работы с пользователями
***/
class User{
	public static $name = '';
	public static $isLogin = false;
	public static $isAdmin = false;

	public static function userAuth()
	{
		$login = strip_tags($_POST['login']);
    $password = md5(strip_tags($_POST['password']).DB_SALT);
	  try{
        $result = DBase::base()->Select("SELECT * FROM users WHERE login=? AND password=?",
          array($login,$password));
      }
      catch(Esception $e){
        echo $e->getMessage();
      }
      if(!empty($result)){
        $_SESSION['user']['id'] = $result[0]['id'];
        self::$name = $_SESSION['user']['name'] = $result[0]['name'];
        $_SESSION['user']['login'] = $result[0]['login'];
        $_SESSION['user']['email'] = $result[0]['email'];
        $_SESSION['user']['role'] = $result[0]['role'];
        return true;
      }
	}
	public static function userLogout(){
		session_destroy();
    header('location: '.$_SERVER['HTTP_REFERER']);
	}
	public static function setUser(){
		if($_SESSION['user']['role'] === '0') self::$isAdmin = true;
    if(isset($_SESSION['user']['login'])) self::$isLogin = true;
    if(!empty($_SESSION['user']['name'])) self::$name = $_SESSION['user']['name'];
	}
	/*
	// метод проверки авторизованный ли пользователь
	public function isLogin()
	{
		return isset($_SESSION['user']['login']);
	}
	// метод проверки на права администратора
	public function isAdmin()
	{
		return $_SESSION['user']['role'] === '0';
	}
	public function userName(){
		if(!empty($_SESSION['user']['name']))
		return $this->name = $_SESSION['user']['name']; 
	}
	// метод авторизации пользователя по введенному логину и паролю
	private static function userAuth()
	{
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$login = strip_tags($_POST['login']);
			$password = md5(strip_tags($_POST['password']).DB_SALT);
			try{
				$result = DBase::base()->Select("SELECT * FROM users WHERE login=? AND password=?",
					array($login,$password));
			}
			catch(Esception $e){
				echo $e->getMessage();
			}
			if(!empty($result)){
				$_SESSION['user']['id'] = $result[0]['id'];
				$this->name = $_SESSION['user']['name'] = $result[0]['name'];
				$_SESSION['user']['login'] = $result[0]['login'];
				$_SESSION['user']['email'] = $result[0]['email'];
				$_SESSION['user']['role'] = $result[0]['role'];
				return true;
			}
			elseif(!empty($_GET['logout'])){
				session_destroy();
				header('location: '.$_SERVER['HTTP_REFERER']);
			}
			if($_SESSION['user']['role'] === '0') self::$isAdmin = true;
			if(isset($_SESSION['user']['login'])) self::$isLogin = true;
			if(isset($_SESSION['user']['login'])) self::$isLogin = true;
			if(!empty($_SESSION['user']['name'])) self::$userName = $_SESSION['user']['name'];
		}
	}
	private static function userOut(){
		
	}
	public function userInit(){
		$this->userAuth();
		$this->userOut();
	}*/
}