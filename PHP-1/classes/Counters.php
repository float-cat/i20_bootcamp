<?php
/*******************************************
  Классы считывают и возвращают количество
  записей в таблице по параметрам указанным
  в конструкторах
  Все классы должны иметь функцию getCount
  как реализацию обязательного интерфейса
*******************************************/

/* Класс для количества товаров в каталоге */
class CatalogCounter
{
    private $count;

    function __construct($categoryId)
    {
        /* Объявляем объект соединения с БД глобальным */
        global $mysqli;
        /* Защита от SQL-иньекций */
        $categoryId = (int)$categoryId;
        $sqlquery = "SELECT COUNT(*)
                     FROM Products AS p
                     JOIN Chapters AS c
                         ON p.chapterId = c.id
                     JOIN Pictures AS pic
                         ON p.pictureId = pic.id
                     WHERE p.id IN (
                         SELECT productId
                         FROM ChapterProduct
                         WHERE chapterId = $categoryId
                     ) AND p.isActive = True;";
        /* Считаем товары по указанным параметрам */
        $result = $mysqli->query($sqlquery);
        if(!$result)
            die('Сбой в работе базы данных!');
        /* Получаем первую строку */
        $row = mysqli_fetch_row($result);
        /* Если она есть, то все окей! */
        if($row)
            if($row[0] != '')
                $this->count = (int)$row[0];
            else
                $this->count = 0;
        else
            /* Ошибка! Так быть не должно, так как у нас
                агрегатная функция! Но все равно помечаем NULL */
            $this->count = NULL;
    }

    /* Методы для получения данных приватных полей */
    public function getCount()
    {
        return $this->count;
    }
}
