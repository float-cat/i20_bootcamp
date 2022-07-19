USE Catalog;

INSERT INTO Chapters (caption) VALUES ('Рубашки'), ('Свитеры'), ('Брюки'), ('Пиджаки');

INSERT INTO Products (caption, price, priceWithDiscount, priceWithPromoCode, description)
	VALUES ('Рубашка Medicine', 2699, 2499, 2227, 'Рубашка Medicine выполнена из вискозной ткани с клетчатым узором.<br />Детали: прямой крой, отложной воротник, планка и манжеты на<br /> пуговицах, карман на груди.'),
           ('Рубашка Паутина', 2341, 2000, 1900, 'Рубашка Паутина сделана из обычной паутины'),
           ('Свитер Мяу-мяу', 2949, 2400, 2200, 'Свитарок из кошачьей шерсти'),
           ('Свитер TX-3000', 10000, 9800, 9200, 'Свитер с аппаратной поддержкой нагрева'),
           ('Брюки DuoType', 2000, 1800, 1700, 'Брюки, которые надеваются обычно и через голову'),
           ('Брюки Кролика', 2300, 2200, 2100, 'Брюки с дырками как у джинс'),
           ('Пиджак от Артура', 9000, 8700, 8220, 'Пиджак от Артура, что еще тут сказать'),
           ('Пиджачок с кулачок', 100, 80, 67, 'Специальная модель для мальчиков-с-пальчиков');

INSERT INTO ChapterProduct (chapterId, productId) VALUES
(
    (SELECT id FROM Chapters WHERE caption = 'Рубашки'),
    (SELECT id FROM Products WHERE caption = 'Рубашка Medicine')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Рубашки'),
    (SELECT id FROM Products WHERE caption = 'Рубашка Паутина')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Свитеры'),
    (SELECT id FROM Products WHERE caption = 'Рубашка Паутина')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Свитеры'),
    (SELECT id FROM Products WHERE caption = 'Свитер Мяу-мяу')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Свитеры'),
    (SELECT id FROM Products WHERE caption = 'Свитер TX-3000')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Брюки'),
    (SELECT id FROM Products WHERE caption = 'Брюки DuoType')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Брюки'),
    (SELECT id FROM Products WHERE caption = 'Брюки Кролика')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак от Артура')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджачок с кулачок')
);

INSERT INTO Pictures (alt, url) VALUES
('Рубашка', 'example.com/not-exist-pict-1.png'),
('Рубашечка', 'example.com/not-exist-pict-2.png'),
('Свитер', 'example.com/not-exist-pict-3.png'),
('Брюки', 'example.com/not-exist-pict-4.png'),
('Пиджак', 'example.com/not-exist-pict-5.png');

INSERT INTO ProductPicture (productId, pictureId) VALUES
(
    (SELECT id FROM Products WHERE caption = 'Рубашка Medicine'),
    (SELECT id FROM Pictures WHERE alt = 'Рубашка')
),
(
    (SELECT id FROM Products WHERE caption = 'Рубашка Паутина'),
    (SELECT id FROM Pictures WHERE alt = 'Рубашка')
),
(
    (SELECT id FROM Products WHERE caption = 'Рубашка Паутина'),
    (SELECT id FROM Pictures WHERE alt = 'Рубашечка')
),
(
    (SELECT id FROM Products WHERE caption = 'Свитер Мяу-мяу'),
    (SELECT id FROM Pictures WHERE alt = 'Свитер')
),
(
    (SELECT id FROM Products WHERE caption = 'Свитер TX-3000'),
    (SELECT id FROM Pictures WHERE alt = 'Свитер')
),
(
    (SELECT id FROM Products WHERE caption = 'Брюки DuoType'),
    (SELECT id FROM Pictures WHERE alt = 'Брюки')
),
(
    (SELECT id FROM Products WHERE caption = 'Брюки Кролика'),
    (SELECT id FROM Pictures WHERE alt = 'Брюки')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак от Артура'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджачок с кулачок'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
);
