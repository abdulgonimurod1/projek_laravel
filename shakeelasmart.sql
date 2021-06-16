-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 06.03
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shakeelasmart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `about_us`
--

INSERT INTO `about_us` (`id`, `deskripsi`, `gambar`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi magni consequatur, architecto eos quisquam corporis hic laboriosam dignissimos amet accusamus expedita quo vitae minus tempore ab, vel ipsam aliquam quis!', 'about.png', '1', '2020-09-09 18:50:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_pembayarans`
--

CREATE TABLE `cara_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `langkah1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `langkah2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah7` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah8` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah9` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langkah10` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cara_pembayarans`
--

INSERT INTO `cara_pembayarans` (`id`, `gambar`, `judul`, `langkah1`, `langkah2`, `langkah3`, `langkah4`, `langkah5`, `langkah6`, `langkah7`, `langkah8`, `langkah9`, `langkah10`, `created_at`, `updated_at`) VALUES
(1, 'shopee.png', 'Cara Pembayaran Di Shopee', 'Cras justo odio', 'Dapibus ac facilisis in', 'Morbi leo risus', 'Porta ac consectetur ac', 'Vestibulum at eros', NULL, NULL, NULL, NULL, NULL, '2020-08-07 19:13:03', NULL),
(2, 'lazada.png', 'Cara Pembayaran Di Lazada', 'Cras justo odio', 'Dapibus ac facilisis in', 'Morbi leo risus', 'Porta ac consectetur ac', 'Vestibulum at eros', NULL, NULL, NULL, NULL, NULL, '2020-08-07 19:13:03', NULL),
(3, 'tokopedia.png', 'Cara Pembayaran Di Tokopedia', 'Cras justo odio', 'Dapibus ac facilisis in', 'Morbi leo risus', 'Porta ac consectetur ac', 'Vestibulum at eros', NULL, NULL, NULL, NULL, NULL, '2020-08-07 19:13:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_Pesanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `kode_Pesanan`, `user_id`, `tanggal`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ORD-595379', '1', '2020-09-13', 150000, '1', '2020-09-13 01:08:39', '2020-09-13 01:09:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `jumlah_harga` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart_details`
--

INSERT INTO `cart_details` (`id`, `product_id`, `cart_id`, `jumlah`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 1, '150000.00', '2020-09-13 01:08:39', '2020-09-13 01:08:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Baju', 'baju.png', 'BAJU', '2020-08-03 18:06:16', NULL),
(2, 'Celana', 'celana.png', 'CELANA', '2020-08-03 18:06:27', NULL),
(3, 'jam', 'jam.png', 'JAM', '2020-09-06 04:50:08', NULL),
(4, 'tas', 'tas.png', 'TAS', '2020-09-06 04:50:27', NULL),
(5, 'sepatu', 'sepatu.png', 'SEPATU', '2020-09-06 04:50:44', NULL),
(6, 'sepatu sport', 'sepatu2.png', 'SEPATU SPORT', '2020-09-06 04:52:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contents`
--

CREATE TABLE `contents` (
  `id_konten` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `link_tokopedia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_lazada` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_shopee` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_12_035224_create_categories_table', 1),
(5, '2020_07_12_035412_create_products_table', 1),
(6, '2020_07_12_035451_create_customers_table', 1),
(7, '2020_07_12_035554_create_orders_table', 1),
(8, '2020_07_12_035615_create_order_details_table', 1),
(9, '2020_07_12_140540_create_contents_table', 1),
(10, '2020_07_21_081630_create_categories_table', 2),
(12, '2020_07_21_082113_create_contents_table', 4),
(13, '2020_07_23_103551_create_sub_categories_table', 4),
(14, '2020_07_23_164518_create_about_us_table', 4),
(15, '2020_07_28_145238_create_orders_table', 5),
(16, '2020_07_28_165904_create_order_details_table', 6),
(19, '2020_08_05_141329_create_cara_pembayaran_table', 7),
(20, '2020_07_21_081825_create_products_table', 8),
(24, '2020_08_15_181509_create_cart_table', 9),
(25, '2020_08_30_053556_cart_detail', 10),
(26, '2020_09_09_185822_create_owners', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_harga` double(18,2) NOT NULL,
  `tanggal` date NOT NULL,
  `status_pemesanan` set('Menunggu Pembayaran','Pembayaran Diterima') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `invoice`, `user_id`, `total_harga`, `tanggal`, `status_pemesanan`, `created_at`, `updated_at`) VALUES
(1, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:16:44', '2020-09-04 21:16:44'),
(2, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:16:51', '2020-09-04 21:16:51'),
(3, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:22:12', '2020-09-04 21:22:12'),
(4, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:23:00', '2020-09-04 21:23:00'),
(5, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:25:18', '2020-09-04 21:25:18'),
(6, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:28:40', '2020-09-04 21:28:40'),
(7, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:28:54', '2020-09-04 21:28:54'),
(8, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:29:50', '2020-09-04 21:29:50'),
(9, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:30:15', '2020-09-04 21:30:15'),
(10, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:30:24', '2020-09-04 21:30:24'),
(11, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:31:07', '2020-09-04 21:31:07'),
(12, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:31:17', '2020-09-04 21:31:17'),
(13, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:31:23', '2020-09-04 21:31:23'),
(14, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:31:36', '2020-09-04 21:31:36'),
(15, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:31:40', '2020-09-04 21:31:40'),
(16, '0', 1, 750000.00, '2020-09-05', 'Menunggu Pembayaran', '2020-09-04 21:31:49', '2020-09-04 21:31:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `owners`
--

INSERT INTO `owners` (`id`, `nama`, `deskripsi`, `gambar`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Razip Ahmad N', 'I\'m Soooo Handsome', 'owner.png', '1', '2020-09-09 19:00:00', NULL),
(2, 'Abdul', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi magni consequatur, architecto eos quisquam corporis hic laboriosam dignissimos amet accusamus expedita quo vitae minus tempore ab, vel ipsam aliquam quis!', 'owner.png', '1', '2020-09-09 19:07:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('razipahmad0@gmail.com', '$2y$10$xMBDnwJC0F.sBEiAZakx0.TlS.6EWB9wFplzxD6hg2b4UHz4nwLFi', '2020-07-22 08:34:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(18,2) NOT NULL DEFAULT 0.00,
  `harga_promo` decimal(18,2) NOT NULL DEFAULT 0.00,
  `gambar1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `short_deskripsi`, `long_deskripsi`, `stok`, `harga`, `harga_promo`, `gambar1`, `gambar2`, `gambar3`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 'CELANA 1', 'INI CONTOH PRODUK 1', 'INI CONTOH PRODUK 1', '15', '150000.00', '100000.00', '1.png', '1.png', '1.png', 2, NULL, '2020-09-12 23:42:22'),
(2, 'BAJU 1', 'INI CONTOH PRODUK 2', 'INI CONTOH PRODUK 2', '9', '150000.00', '0.00', '2.png', '2.png', '2.png', 1, NULL, '2020-09-13 01:09:29'),
(3, 'CELANA 2', 'INI CONTOH PRODUK 3', 'INI CONTOH PRODUK 3', '15', '150000.00', '0.00', '3.png', '3.png', '3.png', 2, NULL, '2020-09-13 00:55:12'),
(4, 'BAJU 2', 'INI CONTOH PRODUK 4', 'INI CONTOH PRODUK 4', '16', '150000.00', '0.00', '4.png', '4.png', '4.png', 1, NULL, NULL),
(5, 'CELANA 3', 'INI CONTOH PRODUK 5', 'INI CONTOH PRODUK 5', '16', '150000.00', '0.00', '5.png', '5.png', '5.png', 2, NULL, NULL),
(6, 'BAJU 3', 'INI CONTOH PRODUK 6', 'INI CONTOH PRODUK 6', '16', '150000.00', '0.00', '6.png', '6.png', '6.png', 1, NULL, NULL),
(7, 'CELANA 4', 'INI CONTOH PRODUK 7', 'INI CONTOH PRODUK 7', '16', '150000.00', '0.00', '7.png', '7.png', '7.png', 2, NULL, NULL),
(8, 'BAJU 4', 'INI CONTOH PRODUK 8', 'INI CONTOH PRODUK 8', '15', '150000.00', '0.00', '8.png', '8.png', '8.png', 1, NULL, '2020-09-13 00:55:12'),
(9, 'CELANA 5', 'INI CONTOH PRODUK 9', 'INI CONTOH PRODUK 9', '16', '150000.00', '0.00', '9.png', '9.png', '9.png', 2, NULL, NULL),
(10, 'BAJU 5', 'INI CONTOH PRODUK 10', 'INI CONTOH PRODUK 10', '16', '150000.00', '0.00', '10.png', '10.png', '10.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id_sub_kategori` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Razip', 'razipahmad0@gmail.com', NULL, '$2y$10$1.OnYmdT/Qk0vdBl4CSzBeX0IbsQOf.FV2caEzlnAjpV0vZtyYxaO', 'iWkLRzDKdZMey5YhcoVatXaO5YlqmwRakOxqC4zUc3ACmWDLzRJAyqV4ZYUT', '2020-07-22 08:25:50', '2020-07-22 08:25:50'),
(2, 'Ahmad', 'razip@trimagnus.com', NULL, '$2y$10$Wr8acpIeUux2AeM3GIrYyeXGn2GUHJUIbZD50eba/SOTvXxcZQAXq', NULL, '2020-07-24 00:35:50', '2020-07-24 00:35:50'),
(3, 'razip', 'razipahmad9@gmail.com', NULL, '$2y$10$NhLLAFlwCkGKikrEAU6z8OwIVPzSKh70QKViBTFs7URtWM1dlDPG.', NULL, '2020-08-05 07:30:27', '2020-08-05 07:30:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cara_pembayarans`
--
ALTER TABLE `cara_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indeks untuk tabel `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id_sub_kategori`);

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
-- AUTO_INCREMENT untuk tabel `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cara_pembayarans`
--
ALTER TABLE `cara_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `contents`
--
ALTER TABLE `contents`
  MODIFY `id_konten` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id_sub_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
