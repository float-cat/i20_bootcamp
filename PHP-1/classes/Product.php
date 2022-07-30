<?php
/*******************************************
  Класс загружает данные продукта
*******************************************/

class Product
{
    private $name;
    private $description;
    private $price;
    private $priceWithDiscount;
    private $priceWithPromoCode;
    private $chapterId;
    private $pictureId;
    private $categoryes = [];
    private $pictures = [];

    function __construct()
    {
    }

    public function loadProduct($productId)
    {
        $this->categoryes = [];
        $this->pictures = [];
        global $mysqli;
        /* Защищаемся от SQL-иньекций */
        $productId = (int)$productId;
        /* Забираем из базы названия разделов товара */
        $query = "SELECT COUNT(*)
                  FROM Products
                  WHERE id = $productId;";
        $result = $mysqli->query($query);
        if(!$result)
        {
            echo 'Ошибка выборки категорий';
            return;
        }
        $row = mysqli_fetch_row($result);
        if(!$row)
        {
            /* Редирект на 404 */
            header('Location: page404.html');
            exit;
        }
        /* Забираем из базы названия разделов товара */
        $query = "SELECT c.id, c.caption
                  FROM Chapters AS c
                  JOIN ChapterProduct AS cp
                      ON c.id = cp.chapterId
                  WHERE cp.productId = $productId;";
        $result = $mysqli->query($query);
        if(!$result)
        {
            echo 'Ошибка выборки категорий';
            return;
        }
        while($row = mysqli_fetch_row($result))
        {
            $tmpcategory['id'] = $row[0];
            $tmpcategory['caption'] = $row[1];
            $this->categoryes[(int)$tmpcategory['id']] = $tmpcategory;
        }
        /* Забираем из базы данные картинок */
        $query = "SELECT pic.id, pic.alt, pic.url
                  FROM Pictures AS pic
                  JOIN ProductPicture AS pp
                      ON pic.id = pp.pictureId
                  WHERE pp.productId = $productId;";
        $result = $mysqli->query($query);
        if(!$result)
        {
            echo 'Ошибка выборки категорий';
            return;
        }
        while($row = mysqli_fetch_row($result))
        {
            $tmppicture['id'] = $row[0];
            $tmppicture['alt'] = $row[1];
            $tmppicture['url'] = $row[2];
            $this->pictures[(int)$tmppicture['id']] = $tmppicture;
        }
        /* Забираем из базы товар */
        $query = "SELECT *
                  FROM Products AS p
                  WHERE p.isActive = True
                      AND p.id = $productId;";
        $result = $mysqli->query($query);
        if(!$result)
        {
            echo 'Ошибка выборки каталога';
            return;
        }
        if($row = mysqli_fetch_assoc($result))
        {
            $this->name = $row['caption'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->priceWithDiscount = $row['priceWithDiscount'];
            $this->priceWithPromoCode = $row['priceWithPromoCode'];
            $this->chapterId = (int)$row['chapterId'];
            $this->pictureId = (int)$row['pictureId'];
        }
        else
        {
            header('Location: page404.html');
            exit;
        }
    }

    public function getCaption()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceWithDiscount()
    {
        return $this->priceWithDiscount;
    }

    public function getPriceWithPromoCode()
    {
        return $this->priceWithPromoCode;
    }

    public function getChapterId()
    {
        return $this->chapterId;
    }

    public function getPictureId()
    {
        return $this->pictureId;
    }

    public function getCategoryes()
    {
        return $this->categoryes;
    }

    public function getPictures()
    {
        return $this->pictures;
    }
}
