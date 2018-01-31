<?
/**
*** Класс для работы с каталогом
***/
class Catalog extends DBase
{
	private $name;
	private $price;
	private $text;
	private $img;
	public $content;

	// функция вывода товаров
	// 
	public function __construct(){
		//echo " +-+ ";
	}
	public function listCatalog($count)
	{
		return $this->content = self::base()->Select("SELECT id,name,price,img FROM product ORDER BY id DESC LIMIT $count");
		//print_r($this->content);
		//echo "вывод каталога";
	}
}
