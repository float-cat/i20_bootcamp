<?php
 include 'classes/Categoryes.php';
 $ctgr = new Categoryes();
 $ctgr->loadCategoryes();
?>
<html>
 <head>
  <title>Список категорий</title>
  <style>
   .break
   {
       flex-basis: 100%;
       height: 0;
   }

   .container
   {
       background-color: #eeeeee;
       width: 1175px;
       height: 490px;
       display: flex;
       flex-wrap: wrap;
   }

   .card
   {
       margin: 17px;
       width: 350;
       height: 457;
       font-size: 163px;
       text-align: center;
       font-family: sans-serif;
   }

   .title
   {
       margin-top: 80px;
   }

   .card-caption
   {
       font-size: 26px;
       color: #292929;
       background-color: #ffffff;
       margin: 0px;
       margin-top: -80px;
       height: 107px;
       text-align: left;
       box-shadow: 0 2px 5px;
       position: relative;
       display: flex;
   }

   .card-caption img
   {
       position: absolute;
       left: 270px;
       top: -30px;
       display: none;
   }

   .card:hover .card-caption img
   {
       display: block;
   }

   .card-caption p
   {
       margin: 10px;
       margin-top: 40px;
   }

   .card1
   {
       color: #333333;
       background-color: #7dd8f1;
   }

   .card2
   {
       color: #ffffff;
       background-color: #eebc40;
   }

   .card0
   {
       color: #ffffff;
       background-color: #43cc81;
   }
  </style>
 </head>
 <body>
  <a href="feedback.php">Обратная связь</a>
  <div class="container">
<?php
    $i = 1;
    foreach($ctgr->getCategoryes() as $card)
    {
?>
   <div class="card card<?=($i-1)%3?>"><p class="title"><?=$card['count']?></p><div class="card-caption">
     <img src="strelka.png" />
     <a href="?cat_id=<?=$card['id']?>"><p><?=$card['caption']?></p></a>
    </div>
   </div>
<?php
        if($i%3==0)
            echo '<div class="break"></div>';
        $i++;
    }
?>
  </div>
 </body>
</html>
