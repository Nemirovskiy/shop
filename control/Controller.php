<?
session_start();
include "control/autoload.php";

Controller::init();

// создаем экземпляры классов
$user = new User;
$page = new Page;
$catalog = new Catalog;

// запускаем обработку пользователя
$user->userInit();

// применяем нужную модель



//$catalog->listCatalog(10);

try {
  // указывает где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('view');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('v_'.Controller::$template.'.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
    'isLogin' => $user->isLogin(),
    'name' => $user->userName(),
    'title' => Controller::$title,
    'isAdmin' => $user->isAdmin(),
    'content' => $catalog->listCatalog(6)
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

//print_r($catalog->listCatalog(5));