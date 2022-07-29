USE Catalog;

-- 1. Страница списка разделов
-- 1.1. Все категории с количеством товаров больше нуля
SELECT c.id, c.caption, COUNT(cp.productid) AS amount
FROM Chapters AS c
JOIN ChapterProduct AS cp
    ON c.id = cp.chapterId
JOIN Products AS p
    ON p.id = cp.productId
WHERE p.isActive = True
GROUP BY cp.chapterId
ORDER BY amount DESC;

-- 2. Детальная страница раздела
-- 2.1. Наименование и описание раздела
SELECT caption, description
FROM Chapters
WHERE id = {Айди раздела};

-- 2.2. Двенадцать товаров категории
-- Основной раздел товара, Наименование,
-- главная картинка:
SELECT p.id, c.caption, p.caption, pic.alt, pic.url
FROM Products AS p
JOIN Chapters AS c
    ON p.chapterId = c.id
JOIN Pictures AS pic
    ON p.pictureId = pic.id
JOIN ChapterProduct AS cp
    ON p.id = cp.productId
WHERE cp.chapterId = {Айди раздела} AND p.isActive = True
LIMIT 12 OFFSET 0;

-- 3. Детальная страница товара
-- 3.1. Список разделов
SELECT c.id, c.caption
FROM Chapters AS c
JOIN ChapterProduct AS cp
    ON c.id = cp.chapterId
WHERE cp.productId = {Айди товара};

-- 3.2. Список картинок
SELECT pic.id, pic.alt, pic.url
FROM Pictures AS pic
JOIN ProductPicture AS pp
    ON pic.id = pp.pictureId
WHERE pp.productId = {Айди товара};

-- 3.3. Информация о товаре
-- Заголовок, айди картинки, айди категории, цена,
-- цена со скидкой, цена по промокоду,
-- описание
SELECT *
FROM Products AS p
WHERE p.isActive = True
    AND p.id = {Айди товара};

-- 4. Задание на дополнительные баллы
-- 4.1. Выводит все категории, даже с 0 товаров
SELECT c.id, c.caption, COUNT(cp.productid) AS amount
FROM Chapters AS c
LEFT JOIN ChapterProduct AS cp
    ON c.id = cp.chapterId
JOIN Products AS p
    ON p.id = cp.productId
WHERE p.isActive = True
GROUP BY cp.chapterId
ORDER BY amount DESC;

-- 4.2. Выводит все категории с товаром больше либо равно 2
SELECT c.id, c.caption, COUNT(cp.productid) AS amount
FROM Chapters AS c
JOIN ChapterProduct AS cp
    ON c.id = cp.chapterId
JOIN Products AS p
    ON p.id = cp.productId
WHERE p.isActive = True
GROUP BY cp.chapterId
HAVING amount >= 2
ORDER BY amount DESC;
