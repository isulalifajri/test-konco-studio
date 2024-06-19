-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 11.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_konco_studio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_18_133623_create_products_table', 1),
(6, '2024_06_19_043113_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_order` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` enum('Unpaid','Paid','Canceled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `kode_order`, `user_id`, `product_id`, `quantity`, `unit_price`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KS-0281121', 11, 21, 100, 200, 20000, 'Paid', '2024-06-19 09:31:14', '2024-06-19 09:31:56'),
(2, 'KS-0841121', 11, 21, 5, 200, 1000, 'Canceled', '2024-06-19 09:32:16', '2024-06-19 09:32:21'),
(3, 'KS-000125', 12, 5, 3, 997, 2991, 'Unpaid', '2024-06-19 09:33:17', '2024-06-19 09:33:17'),
(4, 'KS-046126', 12, 6, 2, 808, 1616, 'Paid', '2024-06-19 09:34:23', '2024-06-19 09:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `stok` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `isActive`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'quis', 'Quibusdam officia velit sed. Dolorem iste sit rerum accusantium est. Consequatur voluptatem rerum impedit mollitia.', 'https://via.placeholder.com/640x480.png/0077ee?text=quae', '554', 1, 0, '2024-06-19 09:25:34', '2024-06-19 09:29:58'),
(3, 'assumenda', 'Et eaque incidunt hic consequuntur atque deleniti veritatis. Quis molestiae qui suscipit vel. Dolor dolorem autem eum soluta. Suscipit natus omnis quo qui nihil. Neque vel minima deserunt voluptatem ut excepturi.', 'https://via.placeholder.com/640x480.png/009955?text=nihil', '11', 0, 73, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(4, 'dolor', 'Enim consequatur quaerat recusandae qui est. Ratione reprehenderit iure quo est est nihil. Suscipit atque eaque illum quia eius. Eos vitae possimus optio ut.', 'https://via.placeholder.com/640x480.png/00aa11?text=excepturi', '496', 0, 41, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(5, 'consequatur', 'Ab eaque aut maxime esse. Rem consectetur accusamus in aperiam qui hic. Velit omnis error aliquam molestiae illum ut. Quas omnis harum quam harum laboriosam.', 'https://via.placeholder.com/640x480.png/00cc33?text=reprehenderit', '997', 1, 4, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(6, 'laudantium', 'Dolores tempora ut consequatur laudantium tempora quo. Quia nobis vel aliquam id. Ea optio dolores ut soluta voluptas odio reprehenderit voluptate.', 'https://via.placeholder.com/640x480.png/0033ee?text=provident', '808', 1, 50, '2024-06-19 09:25:34', '2024-06-19 09:34:56'),
(7, 'placeat', 'Accusamus ut quia distinctio ratione. Nemo tempora vitae placeat consequatur facilis ipsum. Nisi non incidunt saepe veritatis aliquid dolorem aspernatur. Omnis incidunt odit quo voluptatibus qui. Occaecati dolorem voluptatem quaerat nostrum consectetur est.', 'https://via.placeholder.com/640x480.png/00aa22?text=accusantium', '604', 1, 42, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(8, 'eaque', 'Consequatur sunt libero vero facilis dolores quod commodi. Sint ut numquam aut nihil quasi nam maxime. Iure et recusandae eaque ratione. Dolores et dolorum minus qui veritatis laborum ad.', 'https://via.placeholder.com/640x480.png/007799?text=laudantium', '939', 0, 16, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(9, 'repellat', 'Quos vel qui explicabo qui quis. Dolores non repellat facilis qui tenetur ipsam minima. Qui explicabo et vero. Velit praesentium iusto facere ut reprehenderit odit sed perspiciatis.', 'https://via.placeholder.com/640x480.png/001111?text=quos', '907', 0, 19, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(10, 'eaque', 'Facilis et incidunt fugit quod consequuntur dolor impedit. Porro omnis error ducimus ullam est dignissimos tenetur et. Assumenda dolore voluptas aut natus porro.', 'https://via.placeholder.com/640x480.png/00ddaa?text=eos', '374', 0, 2, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(11, 'autem', 'Qui veniam nostrum quae eos magnam et. Consequatur enim commodi occaecati totam omnis et. Maxime id provident repellendus officiis possimus consequuntur consequatur inventore.', 'https://via.placeholder.com/640x480.png/0022bb?text=perferendis', '263', 1, 48, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(12, 'et', 'Commodi non aut assumenda. Et nostrum consequuntur ratione reprehenderit odio suscipit. Fuga doloribus in dolor ducimus.', 'https://via.placeholder.com/640x480.png/00ff44?text=mollitia', '323', 0, 40, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(13, 'vel', 'Consequatur optio ducimus optio dolores sit laborum. Deleniti sed rerum suscipit omnis autem a quia impedit. Accusamus omnis autem totam aspernatur dolor. Nam autem quia aut enim.', 'https://via.placeholder.com/640x480.png/0099ff?text=molestiae', '760', 0, 60, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(14, 'magnam', 'Voluptate ea voluptas veniam magnam cum amet. Autem fugiat provident quod eos labore praesentium beatae. Nesciunt ut quia aut beatae est.', 'https://via.placeholder.com/640x480.png/006699?text=ea', '634', 0, 63, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(15, 'deleniti', 'Dolores pariatur maxime eum ut eos. Numquam qui dolorem ut necessitatibus ratione sed et ratione. Suscipit voluptatibus voluptates voluptates quam qui sunt sint.', 'https://via.placeholder.com/640x480.png/004499?text=quia', '700', 0, 0, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(16, 'cum', 'Aliquam tempore qui minima veritatis vel natus. Eum adipisci autem rerum eligendi consequatur quo. Qui porro quas ipsa iusto assumenda consectetur.', 'https://via.placeholder.com/640x480.png/00ff22?text=modi', '728', 0, 43, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(17, 'aut', 'Dignissimos necessitatibus quisquam accusamus enim praesentium. Sed voluptatem ut est ut. Vel rerum cupiditate recusandae facilis omnis voluptatem.', 'https://via.placeholder.com/640x480.png/0099ee?text=sint', '253', 1, 11, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(18, 'sit', 'Amet repellat dolores iure soluta. Voluptatem saepe eum tempore et.', 'https://via.placeholder.com/640x480.png/005588?text=veritatis', '35', 0, 68, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(19, 'at', 'Optio saepe eveniet veritatis fugiat. Natus voluptatem enim doloremque voluptate nihil voluptate consequatur natus. Tempore ullam impedit non qui dolor quibusdam.', 'https://via.placeholder.com/640x480.png/001100?text=dolor', '873', 0, 12, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(20, 'voluptas', 'Distinctio minima debitis quia velit. Et veritatis in eaque in cumque qui eaque. Quisquam ducimus corporis qui ut ducimus nobis ipsam. Molestiae qui impedit est nesciunt et.', 'https://via.placeholder.com/640x480.png/00bbcc?text=eum', '757', 0, 98, '2024-06-19 09:25:34', '2024-06-19 09:25:34'),
(21, 'tes livewire', '<p>teesssss</p>', 'tes_2024-06-19_162748_pm.png', '200', 1, 100, '2024-06-19 09:27:48', '2024-06-19 09:31:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kayley Wiza', 'sasha30', 'chester.jacobs@example.net', '2024-06-19 09:25:32', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '362 Moore Circles\nLake Bernard, WI 67390-5799', 'customer', 'vK3aOmKt6j', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(2, 'Sister Wuckert', 'jaycee33', 'jarrod.hayes@example.net', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '51287 Bahringer Row Apt. 811\nPort Hazle, NC 84849', 'customer', 'Ha0fbrb47a', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(3, 'Lynn Abernathy', 'bergstrom.melyna', 'sydnee07@example.net', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '81155 Murray Shore\nGradyton, SD 62550-0175', 'customer', 'hCo3nGu9MC', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(4, 'Dorian Koelpin', 'katelynn.willms', 'daniel.estel@example.net', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '38690 Lionel Port\nNorth Rafaelaburgh, KY 36649', 'customer', 'YOWRdL3bn5', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(5, 'Ms. Isabell Sauer', 'leonor.bins', 'cierra69@example.com', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '73216 Lera Estate\nLittleton, RI 03733-1407', 'customer', 'Xq63gVnPTQ', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(6, 'Zakary Dickinson', 'auer.arnold', 'douglas.xzavier@example.org', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '3544 Kuhn Lights\nPort Darlene, SC 09501-4666', 'customer', 'agsW8rXz8Y', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(7, 'Saige Little', 'lacy28', 'sarai.reynolds@example.org', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '23965 Sawayn Gateway Suite 723\nMargaretemouth, CA 15753', 'customer', 'TNp3mB9xoE', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(8, 'Milford Hessel', 'turner.kendra', 'sheridan.pagac@example.net', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '94616 Barrows Bridge Suite 736\nNorth Braulio, KY 65287', 'customer', 'OKhQKkwE8c', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(9, 'Mckenzie Gusikowski', 'kuvalis.brooklyn', 'gerard56@example.net', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '41822 McCullough Ways\nAmbroseton, MS 20193', 'customer', '98u6bVtXrp', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(10, 'Prof. Branson Luettgen', 'jordy.ratke', 'titus59@example.com', '2024-06-19 09:25:33', '$2y$12$0H8Rf5B59spIoLinrpBB/exJDAr9oA9cL9.o7y2yU/Eomsocc6FbG', '968 Yoshiko Extensions\nPort Fabian, MO 82787-5491', 'customer', 's5txZNCneE', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(11, 'Test User', 'customer', 'test@example.com', '2024-06-19 09:25:33', '$2y$12$8uxhGsto0dXd9YQDJvNcYO4IZ6E/RqGxY8H1hA0r/mIUCEP1DSGAi', 'address customer', 'customer', 'gwOL1Wk8xoOiivK43zUaA7FdjV8LdKNn6pZFzFbIBilTFoc9LEg8IWNiNjMB', '2024-06-19 09:25:33', '2024-06-19 09:25:33'),
(12, 'Test admin', 'admin', 'admin@example.com', '2024-06-19 09:25:33', '$2y$12$34lZCh5TL5iqJbm6VUD.f.KugiTeSSLQG.H1ZSjKgH8uU9GBkYjXq', 'address admin', 'admin', 'yEy6ZK2sRWXDjLmGiHVBdcuwV0Jr0s8HuZvRxqlm6OmKfPURn55WC70LiBSP', '2024-06-19 09:25:33', '2024-06-19 09:25:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
