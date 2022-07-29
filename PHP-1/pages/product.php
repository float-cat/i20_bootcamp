<?php
 include 'classes/Product.php';
 $product = new Product();
 $product->loadProduct($_GET['id']);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>
   <?=$product->getCaption()?>
  </title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/product.css" />
  <script src="js/jquery.min.js" language="JavaScript">
  </script>
  <script src="js/notify.js" language="JavaScript">
  </script>
  <script src="js/product.js" language="JavaScript">
  </script>
 </head>
 <body>
  <main>
   <div class="main-container">
    <div class="photos">
     <div class="photo-container">
     <?php
        foreach($product->getPictures() as $pic)
        {
     ?>
      <div class="photo-container__item">
       <img class="photo-container__image" alt="<?=$pic['alt']?>" src="<?=$pic['url']?>" />
      </div>
     <?php
        }
     ?>
     </div>
     <div class="photo-zoom">
      <img id="zoom-image" src="<?=$product->getPictures()[$product->getPictureId()]['url']?>" 
        alt="<?=$product->getPictures()[$product->getPictureId()]['alt']?>" />
     </div>
    </div>
    <div class="space">
    </div>
    <div class="infos">
     <div class="info-container">
      <p class="info-container__caption"><?=$product->getCaption()?></p>
     </div>
     <div class="info-links">
        <?php
            foreach($product->getCategoryes() as $item)
            {
        ?>
      <a href="products.php?cat_id=<?=$item['id']?>" class="info-links__link"><?=$item['caption']?></a>
        <?php
            }
        ?>
     </div>
     <div class="info-price">
      <div class="info-price__real"><del><?=$product->getPrice()?></del></div>
      <div class="info-price__discount"><?=$product->getPriceWithDiscount()?></div>
      <div class="info-price__promocode"><?=$product->getPriceWIthPromoCode()?></div>
      <div class="info-price__promocode-title">&nbsp; &#8212; &nbsp;с&nbsp;&nbsp; п р о м о к о д о м</div>
     </div>
     <div class="info-stock">
      <div class="info-stock__in-stock">В наличии в магазине <a href="#" class="info-stock__link">Lamoda</a></div>
      <div class="info-stock__deliver">Бесплатная доставка</div>
     </div>
     <form class="info-form" name="ctrl-btns">
      <div class="counter">
       <button type="button" name="dec" class="counter__button">-</button>
       <input type="text" name="counter" value="1" class="counter__input" readonly />
       <button type="button" name="inc" class="counter__button">+</button>
      </div>
      <button name="in_shop" type="button" class="info-form__button info-form__button_blue">Купить</button>
      <button name="in_fave" type="button" class="info-form__button">В избранное</button>
     </form>
     <div class="info-description">
     <?=$product->getDescription()?>
     </div>
     <div class="info-repost">
      <div class="info-repost__title">
       Поделиться:
      </div>
      <div class="info-repost__picture">
       <a href="#" target="_blank"><img src="img/vk.png" /></a>
      </div>
      <div class="info-repost__picture">
       <a href="#" target="_blank"><img src="img/gplus.png" /></a>
      </div>
      <div class="info-repost__picture">
       <a href="#" target="_blank"><img src="img/fb.png" /></a>
      </div>
      <div class="info-repost__picture">
       <a href="#" target="_blank"><img src="img/tw.png" /></a>
      </div>
      <div class="info-repost__count">
       <center>123</center>
      </div>
     </div>
    </div>
   </div>
  </main>
 </body>
</html>
