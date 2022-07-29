<?php
/*******************************************
  Класс загружает данные категорий
*******************************************/

class Categoryes
{
    private $categoryes = [];

    function __construct()
    {
    }

    public function loadCategoryes()
    {
        $this->categoryes = [];
        global $mysqli;
        /* Забираем из базы данные о категориях */
        $query = "SELECT c.id, c.caption, COUNT(cp.productid) AS amount
                  FROM Chapters AS c
                  JOIN ChapterProduct AS cp
                      ON c.id = cp.chapterId
                  JOIN Products AS p
                      ON p.id = cp.productId
                  WHERE p.isActive = True
                  GROUP BY cp.chapterId
                  ORDER BY amount DESC;";
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
            $tmpcategory['count'] = $row[2];
            $this->categoryes[] = $tmpcategory;
        }
    }

    public function getCategoryes()
    {
        return $this->categoryes;
    }
}
