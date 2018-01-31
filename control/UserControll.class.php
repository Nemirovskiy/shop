<?
/**
* контроллер работы с пользователем
*/
class UserControll extends Controller
{
  public static function userInit(){
    if(!empty($_POST['login']) && !empty($_POST['password'])){
      User::userAuth();
    }
    elseif(!empty($_GET['logout'])){
      User::userLogout();
    }
    User::setUser();
  }
}