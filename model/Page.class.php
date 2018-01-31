<?
/**
* класс для работы со страницами
*/
class Page
{
	public $title = 'Заголовок страницы';
	private $name = 'index';
	public $template = 'index';
	public $content;
	private $value= '';
	private $action= '';

	public function __construct()
	{
		$this->getUrlPath();
	}

	// получение параметров строки адреса
	// адрес будет такого типа: site.com?user site.com?detail=123
	// -- страницы 
	// detail 	- карточка товара, значение номер элемента
	// user 	- кабинет пользователя
	// basket 	- корзина
	// edit 	- редактор администратора
	// catalog 	- каталог товаров, значение - номер страницы
	// прочее 	- главная
	public function getUrlPath()
	{
		if(!empty($_GET)){
			// берем первый ключ адресной строки
			$this->template = strip_tags(array_keys($_GET)[0]);
			// если ключу не соответствует файл представления - устанавливаем предстваление главной
			if(!is_file(DIR_VIEW.'/'.'v_'.$this->template.'.tmpl')) $this->template = 'index';
			$this->value = strip_tags($_GET[$this->template]);
			//echo "tmpl = $this->template, value = $this->value";
			// если есть второй параметр адресной строки - забираем его ключ в действие
			if(!isset(array_keys($_GET)[1])) $this->action = strip_tags(array_keys($_GET)[1]);
		}
	}

	public function getTwig($user)
	{

	}

	// функция сбора целой страницы
	public function building($user){
	//	$this->getUrlPath();
	//	$this->getTwig($user);	
	}
}