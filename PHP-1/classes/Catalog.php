<?php
/*******************************************
  Класс загружает данные каталога
*******************************************/

class Catalog
{
    private $name;
    private $description;
    private $products = [];

    function __construct()
    {
    }

    public function loadProducts($categoryId, $limit, $offset)
    {
        $this->products = [];
        global $mysqli;
        /* Защищаемся от SQL-иньекций */
        $categoryId = (int)$categoryId;
        $limit = (int)$limit;
        $offset = (int)$offset;
        /* Забираем из базы название раздела и его описание */
        $query = "SELECT caption, description
                  FROM Chapters
                  WHERE id = $categoryId;";
        $result = $mysqli->query($query);
        if(!$result)
        {
            echo 'Ошибка выборки каталога';
            return;
        }
        $row = mysqli_fetch_row($result);
        if(!$row)
        {
            /* Редирект на 404 */
            header('Location: page404.html');
            exit;
        }
        $this->name = $row[0];
        $this->description = $row[1];
        /* Забираем из базы товары категории */
        $query = "SELECT p.id, c.id, c.caption, p.caption, pic.alt, pic.url
                  FROM Products AS p
                  JOIN Chapters AS c
                      ON p.chapterId = c.id
                  JOIN Pictures AS pic
                      ON p.pictureId = pic.id
                  WHERE p.id IN (
                      SELECT productId
                      FROM ChapterProduct
                      WHERE chapterId = $categoryId
                  ) AND p.isActive = True
                  LIMIT $limit OFFSET $offset;";
        $result = $mysqli->query($query);
        if(!$result)
        {
            echo 'Ошибка выборки каталога';
            return;
        }
        while($row = mysqli_fetch_row($result))
        {
            $tmpproduct['id'] = $row[0];
            $tmpproduct['categoryId'] = $row[1];
            $tmpproduct['category'] = $row[2];
            $tmpproduct['caption'] = $row[3];
            $tmpproduct['picAlt'] = $row[4];
            $tmpproduct['picUrl'] = $row[5];
            $this->products[] = $tmpproduct;
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

    public function getProducts()
    {
        return $this->products;
    }
}
