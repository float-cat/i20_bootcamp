<?php
 /* Подключаем средства отображения ошибок */
 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 include 'modules/connectdb.php';

 function clearStr($string)
 {
    global $mysqli;
    return $mysqli->real_escape_string(trim(strip_tags($string)));
 }

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $errors = [];
    if(!preg_match("/^(([a-zA-Z' -]{1,60})|([а-яА-ЯЁё' -]{1,60}))$/u",
        $_POST['name']))
        $errors['name'] = '<span style="color: red;">Используйте
            русские или латинские символы, до 60 символов</span>';
    if(!preg_match(
        "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/",
        $_POST['email']))
        $errors['email'] = '<span style="color: red;">Используйте
            латинские символы и форму user@example.com</span>';
    if(!preg_match("/^\d{4}$/", $_POST['year']))
        $errors['year'] = '<span style="color: red;">Неверный год</span>';
    if(!preg_match("/^(Male)|(Female)$/", $_POST['sex']))
        $errors['sex'] = '<span style="color: red;">Либо Male, либо Female</span>';
    if(!preg_match("/^([a-zA-Zа-яА-ЯЁё0-9' -]{1,30})$/u", $_POST['topic']))
        $errors['topic'] = '<span style="color: red;">Используйте русские
            или латинские символы и цифры, до 30 символов</span>';
    if(!preg_match("/^([a-zA-Zа-яА-ЯЁё0-9' -\.!\?]{1,400})$/u", $_POST['info']))
        $errors['info'] = '<span style="color: red;">Используйте русские
            или латинские символы и цифры, до 400 символов</span>';
    if(!preg_match("/on/", $_POST['agree']))
        $errors['agree'] = '<span style="color: red;">Нужно согласие
        пользователя</span>';
    if(count($errors) == 0)
    {
        $name = clearStr($_POST['name']);
        $email = clearStr($_POST['email']);
        $year = clearStr($_POST['year']);
        $sex = clearStr($_POST['sex']);
        $topic = clearStr($_POST['topic']);
        $info = clearStr($_POST['info']);
        /* Устанавливаем куки */
        setcookie('name', $name, time()+360000);
        setcookie('email', $email, time()+360000);
        setcookie('year', $year, time()+360000);
        setcookie('sex', $sex, time()+360000);
        /* Подготавливаем запрос */
        $stmt = $mysqli->prepare("INSERT INTO Feedback(name, email, year,
            sex, topic, info) VALUES (?, ?, ?, ?, ?, ?)");
        /* Связываем */
        $stmt->bind_param("ssssss", $name, $email, $year, $sex, $topic, $info);
        /* Выполняем */
        $stmt->execute();
        /* Сбрасываем POST запрос, сигнализируя о выполнении */
        header('Location: feedback.php?data=inserted');
        exit;
    }
 }
?>
<html>
 <head>
  <title>Обратная связь</title>
  <style>
   .error
   {
        border: 1px solid red;
   }
  </style>
 </head>
 <body>
  <a href="products.php"><button>Категории</button></a>
  <form name="feedback" method="POST">
   <?php
    if(isset($_GET['data']))
        echo 'Данные были добавлены!<br />';
   ?>
   <h2>Обратная связь</h2>
   <hr />
   Имя: <?=$errors['name'] ?? ''?><br />
   <input required <?php if(isset($errors['name'])) echo 'class="error"'?>
    name="name" placeholder="Имя"
    value="<?=$_POST['name'] ?? $_COOKIE['name'] ?? ''?>"></input>
   <br /><br />
   email: <?=$errors['email'] ?? ''?><br />
   <input required <?php if(isset($errors['email'])) echo 'class="error"'?>
    name="email" placeholder="example@example.com"
    value="<?=$_POST['email'] ?? $_COOKIE['email'] ?? ''?>"></input>
   <br /><br />
   Год рождения: <?=$errors['year'] ?? ''?><br />
   <select required name="year">
   <?php
    $year = (int)($_POST['year'] ?? $_COOKIE['year'] ?? date('Y'));
    $last = (int)date('Y') - 100;
    for($i=(int)date('Y') - 10; $i>=$last; $i--)
        if($i == $year)
            echo "<option selected value=\"$i\">$i</option>";
        else
            echo "<option value=\"$i\">$i</option>";
   ?>
   </select>
   <br /><br />
   Пол: <?=$errors['sex'] ?? ''?><br />
   <input required type="radio" name="sex" value="Male" <?php
    $tmp = 0;
    if((isset($_POST['sex']) and $_POST['sex']=='Male')
        or (isset($_COOKIE['sex']) and $_COOKIE['sex']=='Male'))
    {
        $tmp = 1;
        echo 'checked'; 
    }?>></input>
   М
   <input required type="radio" name="sex" value="Female" <?php
    if($tmp == 0)
        echo 'checked'; ?>></input>
   Ж
   <br /><br />
   Тема обращения: <?=$errors['topic'] ?? ''?><br />
   <input required <?php if(isset($errors['topic'])) echo 'class="error"'?>
    name="topic" placeholder="Тема обращения"
    value="<?=$_POST['topic'] ?? ''?>"></input>
   <br /><br />
   Суть вопроса: <?=$errors['info'] ?? ''?><br />
   <textarea required <?php if(isset($errors['info'])) echo 'class="error"'?>
    name="info"
    placeholder="Суть вопроса"><?=$_POST['info'] ?? ''?></textarea>
   <br /><br />
   <label><input required type="checkbox" name="agree"
    <?php if(isset($_POST['agree']) and $_POST['agree'] == 'on')
        echo 'checked'; ?>></input>
    С контрактом ознакомлен <?=$errors['agree'] ?? ''?></label>
   <br /><br />
   <input type="submit" value="Отправить"></input>
   <br /><br />
   <hr />
  </form>
 </body>
</html>
<?php
 include 'modules/disconnectdb.php';
?>
