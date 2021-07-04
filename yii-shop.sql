-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2021 г., 03:47
-- Версия сервера: 5.6.47
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `keywords` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `url_telegram` text CHARACTER SET utf8 NOT NULL,
  `url_facebook` text CHARACTER SET utf8 NOT NULL,
  `url_instagram` text CHARACTER SET utf8 NOT NULL,
  `url_whatsapp` text CHARACTER SET utf8 NOT NULL,
  `phone_num` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `logo_img` text CHARACTER SET utf8 NOT NULL,
  `favicon` text CHARACTER SET utf8 NOT NULL,
  `buyer_protection` text CHARACTER SET utf8 NOT NULL,
  `about` text CHARACTER SET utf8 NOT NULL,
  `contacts` text CHARACTER SET utf8 NOT NULL,
  `location` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `app_settings`
--

INSERT INTO `app_settings` (`id`, `title`, `keywords`, `description`, `url_telegram`, `url_facebook`, `url_instagram`, `url_whatsapp`, `phone_num`, `email`, `address`, `logo_img`, `favicon`, `buyer_protection`, `about`, `contacts`, `location`) VALUES
(1, 'O`rikzor - Marketplace', 'magazine, shop, market', 'Multiplayer marketplace', 'https://web.telegram.org', 'https://fb.com', 'https://instagram.com', 'https://wa.me/998997960152', '+998997960152', 'info@gmart.su', 'Uzbekistan, Tashkent', '/upload/mr.anvar/2021-03-01/603c73194745e_logo_big.png', '/upload/mr.anvar/2021-03-01/603c74df0f729_favicon.png', '<p>null3</p>\r\n', '<p>null1</p>\r\n', '<p>null2</p>\r\n', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A635c7f39786cd9675c1175e6e3885b94fb685e95efb41309ae8329601d885929&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true\"></script>');

-- --------------------------------------------------------

--
-- Структура таблицы `atribute`
--

CREATE TABLE `atribute` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_value` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `atribute`
--

INSERT INTO `atribute` (`id`, `title`, `custom_value`) VALUES
(1, 'Color', 0),
(2, 'Height', 1),
(3, 'Width', 1),
(4, 'Size', 1),
(5, 'Weight', 1),
(7, 'Space', 1),
(8, 'Memory', 1),
(9, 'Diameter', 1),
(10, 'Capacity', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `atribute_value`
--

CREATE TABLE `atribute_value` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `atribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `atribute_value`
--

INSERT INTO `atribute_value` (`id`, `name`, `atribute_id`) VALUES
(19, 'gray', 1),
(20, 'red', 1),
(21, 'blue', 1),
(22, 'green', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(255) NOT NULL DEFAULT '1',
  `title` text CHARACTER SET utf8 NOT NULL,
  `imgUrl` text CHARACTER SET utf8 NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `price`, `count`, `product_id`, `user_id`, `seller_id`, `title`, `imgUrl`, `total`) VALUES
(1, '48.00', 1, 12, 12, 2, 'Sweetheart Strawberry', '/products/seller/2020-11-13/5fadbe04d9061_324-480x480.jpg', '48.00'),
(2, '2400.00', 1, 14, 12, 2, 'Apple MacBook Pro 13 Core i5/8/512Gb (2020)', '/products/no-image.png', '2400.00'),
(3, '1.50', 4, 29, 12, 12, 'Новые китайские и английские двуязычные 10 книг для чтения От 2 до 8 лет детских книг для раннего образования', '/products/no-image.png', '15.00'),
(4, '785.00', 1, 11, 12, 2, 'iPhone XS', '/products/mr.anvar/2020-11-26/5fbf4777eca16_green-apple-vector-701692.jpg', '785.00');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `main_category` int(11) NOT NULL,
  `img` text NOT NULL,
  `baner_img` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `description`, `keywords`, `main_category`, `img`, `baner_img`, `url`) VALUES
(16, 0, 'Одежда и мода', '', '', 1, '/upload/mr.anvar/2020-11-26/5fbed8b57c175_5faf3c590c22a_fashion-bg.png', '', 'odezhda-i-moda'),
(17, 17, 'Аксессуары', '', '', 0, '', '', 'aksessuary-2'),
(18, 0, 'Телефоны и телекоммуникации', '', '', 1, '/upload/mr.anvar/2021-01-02/5ff04b5d3741b_blue-ribbon-d4a867e8d7809b164ba2a78d96a526f6.png', '', 'telefony-i-telekommunikacii'),
(20, 0, 'Компьютеры и офис', '', '', 1, '/upload/mr.anvar/2021-01-02/5ff04b6dd9f10_imgbin_blue-png.png', '', 'komp-yutery-i-ofis'),
(21, 0, 'Электроника', '', '', 1, '', '', 'elektronika'),
(22, 0, 'Украшения и часы', '', '', 1, '', '', 'ukrasheniya-i-chasy'),
(23, 0, 'Дом и мебель', '', '', 1, '', '', 'dom-i-mebel'),
(24, 0, 'Хобби, оттдых, спорт', '', '', 1, '', '', 'hobbi-ottdyh-sport'),
(25, 0, 'Красота и здоровье', '', '', 1, '', '', 'krasota-i-zdorov-e'),
(26, 0, 'Автотовары', '', '', 1, '', '', 'avtotovary'),
(27, 0, 'Домашняя техника', '', '', 1, '/upload/mr.anvar/2020-11-14/5faf31c20e120_tv-bg.jpg', '', 'domashnyaya-tehnika'),
(28, 16, 'Женская одежда', '', '', 0, '', '/upload/mr.anvar/2021-02-06/601ecffa29847_manage-marketplace-banner.jpg', 'zhenskaya-odezhda'),
(29, 16, 'Мужская одежда', '', '', 0, '', '', 'muzhskaya-odezhda'),
(30, 29, 'Обувь', '', '', 0, '', '', 'obuv-2'),
(31, 29, 'Брюки', '', '', 0, '', '', 'bryuki'),
(32, 29, 'Аксессуары', '', '', 0, '', '', 'aksessuary-2'),
(33, 28, 'Платья', '', '', 0, '', '', 'plat-ya'),
(34, 28, 'Обувь', '', '', 0, '', '', 'obuv-2'),
(35, 20, 'Ноутбуки', '', '', 0, '', '', 'noutbuki');

-- --------------------------------------------------------

--
-- Структура таблицы `category_atributes`
--

CREATE TABLE `category_atributes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `atribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_atributes`
--

INSERT INTO `category_atributes` (`id`, `category_id`, `atribute_id`) VALUES
(6, 16, 2),
(7, 16, 1),
(8, 16, 3),
(9, 23, 7),
(10, 23, 10),
(11, 17, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `main_slider`
--

CREATE TABLE `main_slider` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `subtitle` text CHARACTER SET utf8 NOT NULL,
  `img` text CHARACTER SET utf8 NOT NULL,
  `btn_text` text CHARACTER SET utf8 NOT NULL,
  `btn_url` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `main_slider`
--

INSERT INTO `main_slider` (`id`, `title`, `subtitle`, `img`, `btn_text`, `btn_url`) VALUES
(2, 'Slide 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', '/upload/slider/5fac8a3937986_VurlnNn.jpg', 'More >', 'google.com'),
(3, 'Slide 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', '/upload/slider/5fac8a4d9acdf_HQ-Background-Images-031.jpg', 'More >', 'slide3/');

-- --------------------------------------------------------

--
-- Структура таблицы `offer_product`
--

CREATE TABLE `offer_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offer_product`
--

INSERT INTO `offer_product` (`id`, `product_id`) VALUES
(1, 14),
(2, 15),
(3, 17),
(4, 34),
(9, 58),
(10, 31);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `created_at` text NOT NULL,
  `total` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `total` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_category_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `keywords` text CHARACTER SET utf8 NOT NULL,
  `img` text CHARACTER SET utf8 NOT NULL,
  `adt_imgs` text CHARACTER SET utf8 NOT NULL,
  `is_offer` tinyint(4) NOT NULL,
  `atributes` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `rating` float NOT NULL,
  `created_date` text CHARACTER SET utf8 NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `seller_id`, `category_id`, `store_category_id`, `title`, `content`, `price`, `old_price`, `description`, `keywords`, `img`, `adt_imgs`, `is_offer`, `atributes`, `quantity`, `rating`, `created_date`, `brand_id`) VALUES
(11, 2, 23, 1, 'iPhone XS', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.<img alt=\"\" src=\"/upload/seller/apple.png\" style=\"height:289px; width:300px\" /></p>\r\n', '785.00', '0.00', '', '', '/products/mr.anvar/2020-11-26/5fbf4777eca16_green-apple-vector-701692.jpg', '/products/mr.anvar/2021-02-13/6027b50434487_Front Side.jpg;/products/mr.anvar/2021-02-13/6027b50434505_Back Side.jpg;', 1, 'Color=gold;Space=4;Memory=128', 12, 5, '', 0),
(12, 2, 16, 2, 'Sweetheart Strawberry', '<p>0</p>\r\n', '48.00', '0.00', '', '', '/products/seller/2020-11-13/5fadbe04d9061_324-480x480.jpg', '/products/mr.anvar/2021-02-06/601ef09770439_;', 1, 'Color=red;Size=38', 123, 0, '', 0),
(13, 12, 16, 0, 'Laamei Женская ', '<p>0</p>\r\n', '48.00', '50.00', '', '', '/products/mr.anvar/2020-11-15/5fb181a169b5f_product.jpg', '/products/mr.anvar/2021-03-14/604dc2a875cb3_;', 1, 'Color=red;Size=34', 200, 0, '', 0),
(14, 2, 16, 2, 'Apple MacBook Pro 13 Core i5/8/512Gb (2020)', '<p>0</p>\r\n', '2400.00', '0.00', '', '', '/products/no-image.png', '/products/mr.anvar/2021-02-06/601ef54e6495b_;', 1, 'Height=gray', 102, 0, '', 0),
(15, 12, 17, 0, 'Диски VOSSEN VFS1 в Москве', '0', '350.00', '375.00', '', '', '/products/no-image.png', '', 1, '', 400, 0, '', 0),
(16, 12, 16, 0, 'latest 2020 nike shoes 41 size', '<p>0</p>\r\n', '350.00', '0.00', '', '', '/products/mr.anvar/2020-11-15/5fb181d5607cd_1.jpg', '', 0, 'Color=black;Size=41', 700, 0, '', 0),
(17, 12, 17, 0, 'New BIke Tuning', '0', '2200.00', '0.00', '', '', '/products/no-image.png', '', 1, 'Color=gray', 3, 0, '', 0),
(24, 12, 17, 0, '4 Гб 256 бит GDDR5, настольные ПК, игровые видеокарты, видеокарты, не Майнинг 580 4G', '0', '105.00', '120.00', '', '', '/products/no-image.png', '', 1, 'Height=0', 105, 0, '', 0),
(25, 12, 18, 0, 'Blackview A60 4080 мАч Android 8,1 смартфон 13MP Камера 16 Гб MT6580 Quad core телефон 6,1 \"в виде капли воды, Экран 3G мобильный телефон', '0', '56.00', '0.00', '', '', '/products/no-image.png', '', 0, 'Color=black;Space=16;Memory=2', 78, 0, '', 0),
(29, 12, 18, 0, 'Новые китайские и английские двуязычные 10 книг для чтения От 2 до 8 лет детских книг для раннего образования', '<p>0</p>\r\n', '1.50', '0.00', '', '', '/products/no-image.png', '', 1, '', 15, 0, '', 0),
(31, 12, 18, 0, 'REDAMIGO USB 3,0 Mini 1000 Гб 2,5 \"SATA Full HD 1080p MKV 2,5\" HDD HDMI медиаплеер центр USB OTG SD AV TV AVI RMVB RM HDD2506R', '<p>0</p>\r\n', '30.60', '35.00', '', '', '/products/no-image.png', '', 1, '', 3526, 0, '', 0),
(32, 12, 18, 0, 'WK Beauty мультиузорная мультяшная Детская Наклейка на ногти водная переводная татуировка для ногтей Временная переводка для ногтей', '<p>0</p>\r\n', '1.02', '0.00', '', '', '/products/no-image.png', '', 0, '', 555, 0, '', 0),
(33, 2, 28, 5, 'Мужская футболка из 100% хлопка, с принтом Юрского периода, большие размеры', '<p>0</p>\r\n', '8.72', '15.00', '', '', '/products/no-image.png', '', 1, 'Color=white;Size=43', 4562, 0, '', 0),
(34, 2, 28, 5, 'CleanShot X', '<p>0</p>\r\n', '29.00', '0.00', '', '', '/products/no-image.png', '', 1, '', 1000, 0, '', 0),
(58, 12, 17, 0, 'Test', '<p>Test</p>\r\n', '1.00', '2.00', 'Test', 'Test', '/products/seller/2020-11-11/5fac472b87897_green-apple-vector-701692.jpg', '', 0, 'Test', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product_atribute`
--

CREATE TABLE `product_atribute` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `atribute_id` int(11) NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_atribute`
--

INSERT INTO `product_atribute` (`id`, `product_id`, `atribute_id`, `value`) VALUES
(12, 12, 2, '10'),
(13, 12, 1, 'gray'),
(14, 14, 1, 'gray'),
(15, 14, 3, '50'),
(17, 11, 7, '123'),
(18, 11, 10, '123'),
(20, 13, 1, 'red');

-- --------------------------------------------------------

--
-- Структура таблицы `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `index_content` text CHARACTER SET utf8 NOT NULL,
  `subtitle` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `keywords` text CHARACTER SET utf8 NOT NULL,
  `img_480` text CHARACTER SET utf8 NOT NULL,
  `logo` text CHARACTER SET utf8 NOT NULL,
  `banner` text CHARACTER SET utf8 NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `store`
--

INSERT INTO `store` (`id`, `seller_id`, `title`, `index_content`, `subtitle`, `description`, `keywords`, `img_480`, `logo`, `banner`, `is_active`) VALUES
(1, 2, 'Store - 1', '<p>1</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Store - 1', '', '/products/seller/store/image_480.png', '/products/seller/store/logo.png', '/products/seller/store/banner_img.jpg', 1),
(2, 12, 'Store - 2', '', '', 'Store - 2', '', '/products/no-image.png', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `store_category`
--

CREATE TABLE `store_category` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `store_category`
--

INSERT INTO `store_category` (`id`, `seller_id`, `parent_id`, `title`, `keywords`, `description`, `url`) VALUES
(1, 2, 0, 'asd', 'asd', 'asd', 'asd'),
(2, 2, 0, 'menu2', 'menu1', 'menu1', 'menu1'),
(3, 2, 1, 'menu3', 'menu3', 'menu3', 'menu3'),
(4, 2, 2, 'menu4', 'menu4', 'menu4', 'menu4'),
(5, 2, 0, 'menu4', 'asd', 'asd', 'menu4-2');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'anvar0142@mail.ru'),
(2, 'anvar0142@gmail.com'),
(3, 'asd@asd'),
(4, 'abbosbekanvarov2002@gmail.com'),
(5, 'abbosbek@gmail.com'),
(6, 'abbos@gmail.com'),
(7, 'abbs@gmail.com'),
(8, 'a@gmail.com'),
(9, 'b@gmail.com'),
(10, 'c@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `top_product`
--

CREATE TABLE `top_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `top_product`
--

INSERT INTO `top_product` (`id`, `product_id`) VALUES
(1, 11),
(2, 13),
(3, 12),
(4, 13),
(5, 16),
(6, 29),
(7, 58),
(8, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `top_store`
--

CREATE TABLE `top_store` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `top_store`
--

INSERT INTO `top_store` (`id`, `store_id`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `surname` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `auth_key`, `password`, `role`, `token`, `email`, `phone_num`, `status`) VALUES
(2, 'Uktam', 'Kasimov', 'seller', 'NFCQYB5Z_bQn3lFlKqOJQMQWEem-ViiC', '$2y$13$4WGc4dwkyy0tKMFoQGqlwOgxofHF1Yw2/z4.zDoxpSPN1sOdpvm3G', 'seller', '', 'ukasimov@yandex.ru', '', 1),
(12, 'Anvar', 'Abdullajonov', 'mr.anvar', 'j4K-hmcErXGFY-mwxofvpc7Xusz2ZHZH', '$2y$13$xs5mLlv1xi/kdtb9VRu4IOk7T1keYlggfFi4DjGc8eFQZDvuZ0s9G', 'admin', '185f12a8d837e376cc5ba1d5684a14b0ce43110e', 'anvar0142@yandex.ru', '', 1),
(41, 'Abror', 'Mirzayev', 'abror', 'GwSwTbV5LMsMvjIcAaqMgtQsDRuxVIwN', '$2y$13$xs5mLlv1xi/kdtb9VRu4IOk7T1keYlggfFi4DjGc8eFQZDvuZ0s9G', 'customer', '80ded2ff226b2339d23ad48f66c3f059d8b818d8', 'acodeuz@gmail.com', '+998934155533', 1),
(46, 'Botirjon', 'Axmadaliyev', 'asdasd', '8ckua7Tb8wCueObCkdjHhQE7vQQHqxoU', '$2y$13$Mq3uHbpTdPMWpXvOZj8OD.31wy0H4NAsOBxCy5tMfGJJNQJ09M6VO', 'customer', '692a9f0e4ef7ed32760528a63a6e004fddf56692', 'anvar0142@gmail.com', '8916014333', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `atribute`
--
ALTER TABLE `atribute`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `atribute_value`
--
ALTER TABLE `atribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atribute_id` (`atribute_id`) USING BTREE;

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_atributes`
--
ALTER TABLE `category_atributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main_slider`
--
ALTER TABLE `main_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offer_product`
--
ALTER TABLE `offer_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- Индексы таблицы `product_atribute`
--
ALTER TABLE `product_atribute`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `store_category`
--
ALTER TABLE `store_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `top_product`
--
ALTER TABLE `top_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `top_store`
--
ALTER TABLE `top_store`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `atribute`
--
ALTER TABLE `atribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `atribute_value`
--
ALTER TABLE `atribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `category_atributes`
--
ALTER TABLE `category_atributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `main_slider`
--
ALTER TABLE `main_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `offer_product`
--
ALTER TABLE `offer_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `product_atribute`
--
ALTER TABLE `product_atribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `store_category`
--
ALTER TABLE `store_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `top_product`
--
ALTER TABLE `top_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `top_store`
--
ALTER TABLE `top_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `atribute_value`
--
ALTER TABLE `atribute_value`
  ADD CONSTRAINT `atribute_value_ibfk_1` FOREIGN KEY (`atribute_id`) REFERENCES `atribute` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
