<?php
 /* Подключаем средства отображения ошибок */
 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 include 'modules/connectdb.php';
?>

<?php
 if(isset($_GET['id']))
     include 'pages/product.php';
/* else
     TODO: Редирект на 404; */
?>

<?php
 include 'modules/disconnectdb.php';
?>
