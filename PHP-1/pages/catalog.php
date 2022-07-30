<?php
 include 'classes/Catalog.php';
 include 'classes/Counters.php';
 $catalog = new Catalog();
 $counter = new CatalogCounter($_GET['cat_id'] ?? 1);
 include 'modules/pages.php';
 $catalog->loadProducts($_GET['cat_id'] ?? 1, $pages->getSizeOfPages(), $pageindex);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>
    <?=$catalog->getCaption()?>
  </title>
<style>
.break {
  flex-basis: 100%;
  height: 0;
}

.catalog-box
{
    display: flex;
    flex-wrap: wrap;
}

.catalog-item
{
    min-width: 200;
    height: 200;
}

.catalog-item img
{
    width: 90;
    height: 130;
}
</style>
 </head>
 <body>
 <a href="products.php"><button>Назад</button></a>
<h2><?=$catalog->getCaption()?></h2>
<br />
<?=$catalog->getDescription()?>
<div class="catalog-box">
 <?php
  $i = 1;
  foreach($catalog->getProducts() as $product)
  {
 ?>
    <div class="catalog-item">
     <a href="product.php?id=<?=$product['id']?>">
      <?=$product['caption']?>
     </a>
     <br />
     <a href="products.php?cat_id=<?=$product['categoryId']?>">
      <?=$product['category']?>
     </a>
     <br />
     <img src="<?=$product['picUrl']?>" alt="<?=$product['picAlt']?>" />
    </div>
 <?php
      if($i % 6 == 0)
        echo '<div class="break"></div>';
      $i++;
  }
 ?>
</div>
 </body>
</html>
