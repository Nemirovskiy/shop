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
		//$this->getUrlPath();
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