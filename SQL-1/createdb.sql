/************************************
  Скрипт создания базы данных для
  практического задания по SQL и PHP
************************************/

-- Создаем базу данных
CREATE DATABASE Catalog;

-- Переключаемся на созданную базу
USE Catalog;

-- Таблица разделов каталога
CREATE TABLE Chapters (
    -- Уникальный идентификатор раздела
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    caption NVARCHAR(60) NOT NULL
);

-- Таблица картинок
CREATE TABLE Pictures (
    -- Уникальный идентификатор картинки
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -- Альтернативный текст картинки
    alt NVARCHAR(60) NOT NULL,
    -- Адрес картинки
    url TEXT(1000) NOT NULL
);

-- Таблица товаров каталога
CREATE TABLE Products (
    -- Уникальный идентификатор каталога
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    caption NVARCHAR(60) NOT NULL,
    -- Цена
    price INT NOT NULL CHECK(price > 0),
    -- Цена со скидкой
    priceWithDiscount INT DEFAULT NULL CHECK(priceWithDiscount > 0),
    -- Цена с промокодом
    priceWithPromoCode INT DEFAULT NULL CHECK(priceWithPromoCode > 0),
    description NVARCHAR(500) DEFAULT NULL,
    -- Флаг активного/неактивного товара
    isActive BOOL NOT NULL DEFAULT TRUE,
    chapterId INT NOT NULL,
    pictureId INT NOT NULL,
    -- Зависимость к первичному ключу раздела
    FOREIGN KEY (chapterId) REFERENCES Chapters(id),
    -- Зависимость к первичному ключу картинки
    FOREIGN KEY (pictureId) REFERENCES Pictures(id)
);

-- Таблица раздел-товар (связь много-ко-многим)
CREATE TABLE ChapterProduct (
    -- Идентификатор раздела
    chapterId INT NOT NULL,
    -- Идентификатор товара
    productId INT NOT NULL,
    -- Первичный ключ - пара связанных значений
    PRIMARY KEY (chapterId, productId),
    -- Зависимость к первичному ключу раздела
    FOREIGN KEY (chapterId) REFERENCES Chapters(id),
    -- Зависимость к первичному ключу товара
    FOREIGN KEY (productId) REFERENCES Products(id)
);

-- Таблица товар-картинка (связь много-ко-многим)
CREATE TABLE ProductPicture (
    -- Идентификатор товара
    productId INT NOT NULL,
    -- Идентификатор картинки
    pictureId INT NOT NULL,
    -- Первичный ключ - пара связанных значений
    PRIMARY KEY (productId, pictureId),
    -- Зависимость к первичному ключу товара
    FOREIGN KEY (productId) REFERENCES Products(id),
    -- Зависимость к первичному ключу картинки
    FOREIGN KEY (pictureId) REFERENCES Pictures(id)
);
