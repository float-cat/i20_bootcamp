USE Catalog;

INSERT INTO Chapters (caption, description) VALUES
    ('Рубашки', 'Красивые рубашки со всего света'),
    ('Свитеры', 'Вязанные свитеры для любителей потеплее'),
    ('Брюки', 'Брюки для тех, кому надоели шорты'),
    ('Пиджаки', 'Стильные пиджаки всех размеров');

INSERT INTO Pictures (alt, url) VALUES
('Рубашка', 'example.com/not-exist-pict-1.png'),
('Рубашечка', 'example.com/not-exist-pict-2.png'),
('Свитер', 'example.com/not-exist-pict-3.png'),
('Брюки', 'example.com/not-exist-pict-4.png'),
('Пиджак', 'example.com/not-exist-pict-5.png');

INSERT INTO Products (caption, price, priceWithDiscount, priceWithPromoCode, description, chapterId, pictureId)
    VALUES ('Рубашка Medicine', 2699, 2499, 2227, 'Рубашка Medicine выполнена из вискозной ткани с клетчатым узором.<br />Детали: прямой крой, отложной воротник, планка и манжеты на<br /> пуговицах, карман на груди.',
            (SELECT id FROM Chapters WHERE caption = 'Рубашки'),
            (SELECT id FROM Pictures WHERE alt = 'Рубашка')),
           ('Рубашка Паутина', 2341, 2000, 1900, 'Рубашка Паутина сделана из обычной паутины',
            (SELECT id FROM Chapters WHERE caption = 'Рубашки'),
            (SELECT id FROM Pictures WHERE alt = 'Рубашка')),
           ('Свитер Мяу-мяу', 2949, 2400, 2200, 'Свитарок из кошачьей шерсти',
            (SELECT id FROM Chapters WHERE caption = 'Свитеры'),
            (SELECT id FROM Pictures WHERE alt = 'Свитер')),
           ('Свитер TX-3000', 10000, 9800, 9200, 'Свитер с аппаратной поддержкой нагрева',
            (SELECT id FROM Chapters WHERE caption = 'Свитеры'),
            (SELECT id FROM Pictures WHERE alt = 'Свитер')),
           ('Брюки DuoType', 2000, 1800, 1700, 'Брюки, которые надеваются обычно и через голову',
            (SELECT id FROM Chapters WHERE caption = 'Брюки'),
            (SELECT id FROM Pictures WHERE alt = 'Брюки')),
           ('Брюки Кролика', 2300, 2200, 2100, 'Брюки с дырками как у джинс',
            (SELECT id FROM Chapters WHERE caption = 'Брюки'),
            (SELECT id FROM Pictures WHERE alt = 'Брюки')),
           ('Пиджак от Артура', 9000, 8700, 8220, 'Пиджак от Артура, что еще тут сказать',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджачок с кулачок', 100, 80, 67, 'Специальная модель для мальчиков-с-пальчиков',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 1', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 2', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 3', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 4', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 5', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 6', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 7', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 8', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 9', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 10', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 11', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 12', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 13', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 14', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак')),
           ('Пиджак 15', 3300, 3100, 2800, 'Нумерованная модель',
            (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
            (SELECT id FROM Pictures WHERE alt = 'Пиджак'));

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
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 1')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 2')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 3')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 4')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 5')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 6')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 7')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 8')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 9')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 10')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 11')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 12')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 13')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 14')
),
(
    (SELECT id FROM Chapters WHERE caption = 'Пиджаки'),
    (SELECT id FROM Products WHERE caption = 'Пиджак 15')
);

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
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 1'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 2'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 3'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 4'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 5'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 6'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 7'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 8'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 9'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 10'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 11'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 12'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 13'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 14'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
),
(
    (SELECT id FROM Products WHERE caption = 'Пиджак 15'),
    (SELECT id FROM Pictures WHERE alt = 'Пиджак')
);
