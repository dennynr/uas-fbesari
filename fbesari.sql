-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2023 pada 16.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbesari`
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
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_item` varchar(255) NOT NULL,
  `name_item` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `code_item`, `name_item`, `price`, `type_id`, `qty`, `image`, `created_at`, `updated_at`) VALUES
(19, 'ITEM000', 'Nasi Goreng', 12000.00, 1, 0, 'items/Lu9IUOmJtwWMOrk1x4Htahqb7RrHeDm6i3z45qGc.png', '2023-07-26 04:33:25', '2023-07-26 05:18:23'),
(20, 'ITEM001', 'Ayam goreng', 12000.00, 1, 3, 'items/OpDESO6j9HcDwmqKps9TWX6O7TknuycpoFk7zIcI.png', '2023-07-26 04:33:58', '2023-07-26 07:16:48'),
(21, 'ITEM002', 'Es Teh', 2000.00, 2, 4, 'items/eZz6DystyaP4NbolF2EX49g1I2SpecEWtAhjep02.png', '2023-07-26 05:04:34', '2023-07-26 07:16:48'),
(22, 'ITEM003', 'Rokok Surya', 3000.00, 3, 6, 'items/tgPqsYVJWWpoX0SPjIcoXTW0oZWO55f6PpIIWoEN.jpg', '2023-07-26 08:20:39', '2023-07-26 18:56:13'),
(23, 'ITEM004', 'Indomie', 3000.00, 1, 16, 'items/uwMk3lgeKIyqvEXnZNH2o2yoZe7lyjtBZCtdtv7E.png', '2023-07-26 20:09:05', '2023-07-27 05:01:13');

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
(5, '2023_07_20_080809_create_types_table', 1),
(6, '2023_07_20_080836_create_items_table', 1),
(7, '2023_07_20_080953_create_transactions_table', 1),
(8, '2023_07_23_123852_create_sold_table', 1);

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
-- Struktur dari tabel `sold`
--

CREATE TABLE `sold` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sold`
--

INSERT INTO `sold` (`id`, `name`, `stock`, `purchase_price`, `selling_price`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Indomie', 10, 20000.00, 4000.00, '2023-07-25', '2023-07-25 05:46:10', '2023-07-25 05:46:10'),
(2, 'sad', 43, 213.00, 23323.00, '2023-07-25', '2023-07-25 05:49:52', '2023-07-25 05:49:52'),
(3, 'asdsad', 23, 123123.00, 123213.00, '2023-07-25', '2023-07-25 06:06:11', '2023-07-25 06:06:11'),
(4, 'sad', 3, 21212.00, 232.00, '2023-07-25', '2023-07-25 06:07:17', '2023-07-25 06:07:17'),
(5, 'Test', 30, 2000.00, 4000.00, '2023-07-25', '2023-07-25 06:26:32', '2023-07-25 06:26:32'),
(6, 'asd', 2, 13221.00, 21323.00, '2023-07-25', '2023-07-25 06:27:29', '2023-07-25 06:27:29'),
(7, 'Denny', 30, 2000.00, 3000.00, '2023-07-25', '2023-07-25 06:44:03', '2023-07-25 06:44:03'),
(8, 'Bintang', 30, 1000.00, 2000.00, '2023-07-25', '2023-07-25 06:48:04', '2023-07-25 06:48:04'),
(9, 'asdsa', 23, 21321.00, 12123.00, '2023-07-25', '2023-07-25 06:49:16', '2023-07-25 06:49:16'),
(10, 'Rendy', 20, 4000.00, 1000.00, '2023-07-26', '2023-07-25 23:39:29', '2023-07-25 23:39:29'),
(11, 'Nasi Goreng', 50, 100000.00, 12000.00, '2023-07-26', '2023-07-26 04:33:25', '2023-07-26 04:33:25'),
(12, 'Ayam goreng', 20, 150000.00, 12000.00, '2023-07-26', '2023-07-26 04:33:58', '2023-07-26 04:33:58'),
(13, 'Es Teh', 15, 20000.00, 2000.00, '2023-07-26', '2023-07-26 05:04:34', '2023-07-26 05:04:34'),
(14, 'Rokok Surya', 10, 40000.00, 3000.00, '2023-07-26', '2023-07-26 08:20:39', '2023-07-26 08:20:39'),
(15, 'Indomie', 40, 100000.00, 3000.00, '2023-07-27', '2023-07-26 20:09:05', '2023-07-26 20:09:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `prices` decimal(10,2) NOT NULL,
  `method` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_code`, `items`, `prices`, `method`, `date`, `created_at`, `updated_at`) VALUES
(1, 'TRX-1690289133', '[\"Test\"]', 120000.00, 'Cash', '2023-07-25', '2023-07-25 05:45:33', '2023-07-25 05:45:33'),
(2, 'TRX-1690292901', '[\"Bintang\"]', 2000.00, 'Cash', '2023-07-25', '2023-07-25 06:48:21', '2023-07-25 06:48:21'),
(3, 'TRX-1690353611', '[\"Rendy\"]', 3000.00, 'Cash', '2023-07-26', '2023-07-25 23:40:11', '2023-07-25 23:40:11'),
(4, 'TRX-1690370735', '[\"Rendy\"]', 2000.00, 'Cash', '2023-07-26', '2023-07-26 04:25:35', '2023-07-26 04:25:35'),
(5, 'TRX-1690370756', '[\"Rendy\"]', 2000.00, 'Cash', '2023-07-26', '2023-07-26 04:25:56', '2023-07-26 04:25:56'),
(6, 'TRX-1690370970', '[]', 0.00, 'Cash', '2023-07-26', '2023-07-26 04:29:30', '2023-07-26 04:29:30'),
(7, 'TRX-1690370973', '[\"Rendy\"]', 1000.00, 'Cash', '2023-07-26', '2023-07-26 04:29:33', '2023-07-26 04:29:33'),
(8, 'TRX-1690371062', '[\"Rendy\"]', 2000.00, 'Cash', '2023-07-26', '2023-07-26 04:31:02', '2023-07-26 04:31:02'),
(9, 'TRX-1690373903', '[\"Nasi Goreng\"]', 600000.00, 'Cash', '2023-07-26', '2023-07-26 05:18:23', '2023-07-26 05:18:23'),
(10, 'TRX-1690380627', '[\"Ayam goreng\"]', 48000.00, 'Cash', '2023-07-26', '2023-07-26 07:10:27', '2023-07-26 07:10:27'),
(11, 'TRX-1690380655', '[\"Ayam goreng,Es Teh\"]', 54000.00, 'Cash', '2023-07-26', '2023-07-26 07:10:55', '2023-07-26 07:10:55'),
(12, 'TRX-1690381008', 'Ayam goreng 3x,Es Teh 2x', 40000.00, 'Cash', '2023-07-26', '2023-07-26 07:16:48', '2023-07-26 07:16:48'),
(13, 'TRX-1690422973', 'Rokok Surya 4x', 12000.00, 'Cash', '2023-07-27', '2023-07-26 18:56:13', '2023-07-26 18:56:13'),
(14, 'TRX-1690427356', 'Indomie 20x', 60000.00, 'Cash', '2023-07-27', '2023-07-26 20:09:16', '2023-07-26 20:09:16'),
(15, 'TRX-1690459273', 'Indomie 4x', 12000.00, 'Cash', '2023-07-27', '2023-07-27 05:01:13', '2023-07-27 05:01:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'makanan', NULL, NULL),
(2, 'minuman', NULL, NULL),
(3, 'lainnya', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2023-07-24 08:27:34', '$2y$10$OwxWGNwHCyqH6MM.2YKWV.mwmRecaypA6A2AVRYrw/1zBKZrmCslu', 'l5UW3z2Vr3pLhyP2yXKhr7VEJ9EdLYixVQWac4oTOlVxyj4t5gT2mMRAt8V2', '2023-07-24 08:27:34', '2023-07-24 08:27:34');

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
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_type_id_foreign` (`type_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sold`
--
ALTER TABLE `sold`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
