<?php
 include 'classes/PagesSelector.php';
 /* Создаем объект, который разбивает индексы на блоки */
 $pages = new PagesSelector($counter->getCount(), 12);
 /* Забираем текущий индекс из GET-запроса */
 if(isset($_GET['index']))
     $pageindex = (int)$_GET['index'];
 else
     /* Если GET-запрос не содержит индекс - значит он 0 */
     $pageindex = 0;
 /* Формируем GET-запрос для ссылок на страницы по индексу */
 if(isset($_GET['cat_id']))
     $urlget = '?cat_id='.$_GET['cat_id'].'&index=';
 if($counter->getCount() > 0)
 {
?>
     <div>
      <a href="<?php echo $urlget . 0; ?>">&laquo;</a> 
<?php
     foreach($pages->getLineIndex($pageindex) as $page => $index)
     {
?>
      <a href="<?php echo $urlget . $index; ?>"><?php echo $page+1; ?></a> 
<?php
     }
?>
      <a href="<?php echo $urlget . $pages->getLastIndex(); ?>">&raquo;</a>
     </div>
<?php
 }
?>
