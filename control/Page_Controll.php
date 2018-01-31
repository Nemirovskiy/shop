<?
try {
  // указывает где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('view');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('v_'.$page->template.'.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
    'isLogin' => $user->isLogin(),
    'name' => $user->userName(),
    'title' => $page->title,
    'isAdmin' => $user->isAdmin(),
    'content' => $catalog->listCatalog(5)
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
