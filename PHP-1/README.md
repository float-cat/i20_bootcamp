# Сайт

## Цель
Сделать сайт, используя нативный PHP и наработки прошлых заданий

## Задачи
* Список категорий
* Страница категории
* Страница товара
* Форма обратной связи (Дополнительно)

## Безопасность
При выполнении основной работы потребовалось защищать только числовые данные,
с этим отлично справляется приведение типов (int)$_POST['id'],
При выполнении дополнительного задания потребовалось защищать текстовые поля,
были использованы strip_tags, trim и mysqli->real_escape_string, кроме того был
использован подготовленный запрос от SQL-иньекций. 

## Скриншоты
![Скриншот](https://sun9-57.userapi.com/impg/WN4wMS9e_BMB-demXEmUaWY842-qr-X4nTNFtQ/De_ZBrLJ0ZE.jpg?size=1366x768&quality=95&sign=eec3437054b5441045ad25ddca50ccaa&type=album)
![Скриншот](https://sun9-21.userapi.com/impg/Xp1a-sQ8dFgvhXDrJs4qJG4x0E8V7qkImY7z2w/yngort6cfTs.jpg?size=1366x768&quality=95&sign=86c185d21396f27d754ae69408bfa337&type=album)
![Скриншот](https://sun9-80.userapi.com/impg/-36GDEovkUPuz-9nBwNzac9fjxJebfTRW-itCQ/4zQ5rjCUArI.jpg?size=1366x768&quality=95&sign=8c8c6fecadcb557ceefb8537fa9caa3d&type=album)

## Cтруктура проекта
```markdown
.
├── classes
│   ├── Catalog.php
│   ├── Categoryes.php
│   ├── Counters.php
│   ├── PagesSelector.php
│   └── Product.php
├── css
│   └── product.css
├── feedback.php
├── fonts
│   ├── circe_300.woff2
│   ├── circe_600.woff2
│   └── circe_700.woff2
├── img
│   ├── car.png
│   ├── check-blue.png
│   ├── fb.png
│   ├── gplus.png
│   ├── repost_count.png
│   ├── rybashka-1.png
│   ├── rybashka-2.png
│   ├── rybashka-3.png
│   ├── tw.png
│   └── vk.png
├── js
│   ├── jquery.min.js
│   ├── notify.js
│   └── product.js
├── modules
│   ├── connectdb.php
│   ├── disconnectdb.php
│   └── pages.php
├── page404.html
├── pages
│   ├── catalog.php
│   ├── categoryes.php
│   └── product.php
├── product.php
├── products.php
└── strelka.png
```

