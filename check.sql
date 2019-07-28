-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 28 2019 г., 16:24
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `check`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_07_25_164926_create_posts_table', 1),
(7, '2019_07_27_084605_add_cover_image_to_posts', 2),
(8, '2019_07_27_112120_add_video_to_posts', 3),
(9, '2019_07_27_114446_add_video_to_posts', 4),
(10, '2019_07_28_123616_add_user_id_to_posts', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `rating`, `created_at`, `updated_at`, `cover_image`, `video`, `user_id`) VALUES
(9, 'Post One', '<p>body one</p>', 3, '2019-07-27 12:33:02', '2019-07-27 12:33:02', '739829_1564252382.jpg', 'ImagineDragon_1564252382.mp4', 1),
(10, 'Post two', '<p>body two</p>', 5, '2019-07-27 12:52:35', '2019-07-27 12:52:35', 'av_1564253555.jpg', 'ImagineDragon_1564253555.mp4', 1),
(11, 'Post three', '<p>body three</p>', 5, '2019-07-27 12:53:15', '2019-07-27 12:53:15', '1_1564253595.jpg', 'ImagineDragon_1564253595.mp4', 1),
(12, 'Post Four', '<p>body four</p>', 3, '2019-07-27 12:53:36', '2019-07-27 12:53:36', '6_1564253616.jpg', 'ImagineDragon_1564253616.mp4', 1),
(13, 'Post Five', '<p>body five</p>', 2, '2019-07-27 12:54:04', '2019-07-27 12:54:04', '7_1564253644.jpg', 'ImagineDragon_1564253644.mp4', 1),
(14, 'Post Six', '<p>body six</p>', 5, '2019-07-27 12:54:31', '2019-07-27 12:54:31', '8_1564253671.jpg', 'ImagineDragon_1564253671.mp4', 1),
(15, 'Post seven', '<p>body seven</p>', 3, '2019-07-27 12:54:58', '2019-07-27 12:54:58', 'blog_1_400x300_1564253698.jpg', 'ImagineDragon_1564253698.mp4', 1),
(16, 'Post eight', '<p>body eight</p>', 3, '2019-07-27 12:55:16', '2019-07-27 12:55:16', 'hot_news_2_300x150_1564253716.jpg', 'ImagineDragon_1564253716.mp4', 1),
(17, 'Post nine', '<p>body nine</p>', 3, '2019-07-27 12:55:35', '2019-07-27 12:55:35', 'hot_news_3_300x150_1564253735.jpg', 'ImagineDragon_1564253735.mp4', 1),
(18, 'Post ten', '<p>body ten</p>', 3, '2019-07-27 12:55:54', '2019-07-27 12:55:54', 'latest_articles_1_400x500_1564253754.jpg', 'ImagineDragon_1564253754.mp4', 1),
(19, 'Post eleven', '<p>body eleven</p>', 4, '2019-07-27 12:56:15', '2019-07-28 03:51:42', 'supreme-inferno-exhibit_1564253775.jpg', 'ImagineDragon_1564253775.mp4', 1),
(20, 'post twelve', '<p>body twelve</p>', 3, '2019-07-27 12:57:22', '2019-07-27 12:57:22', 'trending_1_400X500_1564253842.jpg', 'ImagineDragon_1564253842.mp4', 1),
(21, 'another one post', '<p>another one body</p>', 4, '2019-07-27 12:57:54', '2019-07-27 12:57:54', '739829_1564253874.jpg', 'ImagineDragon_1564253874.mp4', 1),
(22, 'Finaly', 'test', 5, '2019-07-28 08:17:31', '2019-07-28 08:17:31', 'latest_articles_1_400x500_1564323450.jpg', 'ImagineDragon_1564323450.mp4', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rizabek', 'rizabekiitu@gmail.com', NULL, '$2y$10$9uCOP6zCzGUuTqn6LenGsen8YCFaPJTid2L5rq6qTC3Z7rP6/5RGW', NULL, '2019-07-28 06:31:41', '2019-07-28 06:31:41'),
(2, 'Joshua', 'test@test.com', NULL, '$2y$10$vwmSvDxkzKzfaUaUtZ7p6OT2OkG83zb1hZxV/dCdOhSao/Dq/rSqG', NULL, '2019-07-28 07:16:23', '2019-07-28 07:16:23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
