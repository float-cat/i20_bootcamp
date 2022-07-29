<?php
 /* Подключаем средства отображения ошибок */
 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 include 'modules/connectdb.php';
?>

<?php
 include 'pages/catalog.php';
?>

<?php
 include 'modules/disconnectdb.php';
?>
