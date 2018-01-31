<?
/**
* 
*/
class Controller
{
  public static $title = 'Заголовок страницы';
  private $name = 'index';
  public static $template = 'index';
  private static $value= '';
  private static $action= '';

  public static function init(){
    self::getUrlPath();
    echo 'self::$template = '.self::$template;
    echo 'self::$value = '.self::$value;
    echo 'self::$action = '.self::$action;
  }


  // получение параметров строки адреса
  // адрес будет такого типа: site.com?user site.com?detail=123
  // -- страницы 
  // detail  - карточка товара, значение номер элемента
  // user    - кабинет пользователя
  // basket  - корзина
  // edit    - редактор администратора
  // catalog - каталог товаров, значение - номер страницы
  // прочее  - главная
  public static function getUrlPath()
  {
    //var_dump(isset(array_keys($_GET)[1]));
    if(!empty($_GET)){
      // берем первый ключ адресной строки
      self::$template = strip_tags(array_keys($_GET)[0]);
      // если ключу не соответствует файл представления - устанавливаем предстваление главной
      if(!is_file(DIR_VIEW.'/'.'v_'.self::$template.'.tmpl')) self::$template = 'index';
      if(!empty($_GET[self::$template])) self::$value = strip_tags($_GET[self::$template]);
      // если есть второй параметр адресной строки - забираем его ключ в действие
      if(isset(array_keys($_GET)[1])) self::$action = strip_tags(array_keys($_GET)[1]);
      return $result;
    }
  }
}
