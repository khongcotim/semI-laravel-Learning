-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 06:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team9.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `avatar`, `password`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Tien Bui', 'bt2892002@gmail.com', '0335826918', 'team9.jpg', '$2y$10$vEC7ywv5rgwYn54TVMGMmeJJ.uTvddRcz8KnjPvV4Luq4pb1SIilu', 'Hải Phòng', 'admin', '2021-09-26 09:25:14', '2021-09-26 09:25:14'),
(2, 'Luận NV', 'luannv@bachkhoa-aptech.edu.vn', '0373584339', 'chi_hang.jpg', '$2y$10$xOG5hhQi41DxcKM6O/rQm.Bcxci08HX4ywjDxu5LKWswb3A72L1Xe', 'Ngã 3 Hoàng Khương Thanh Ba Phú Thọ', 'staff', '2021-09-27 00:20:21', '2021-09-27 00:20:21'),
(3, 'sonacb123', 'lephungson1911@gmail.com', '0869097150', 'son.jpg', '$2y$10$PqhvG98fL1mxqPzRfOBkHur5cPeYoZpmPXmbcQVRPAJLfE/5G1dqK', 'Thái Nguyên', 'admin', '2021-10-07 15:16:42', '2021-10-07 15:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `links` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tour` bigint(20) UNSIGNED DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `links`, `image`, `page`, `title`, `id_tour`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1632648737lock_screen.jpg', 'hajdajd', 'Hàng chính hãng chất lượng cao', NULL, 1, '2021-09-26 09:32:17', '2021-09-26 09:32:17'),
(2, NULL, '1633335122airline-img7.png', 'home.ajdjkadahd', 'adadadhhahdad', NULL, 1, '2021-10-04 08:12:02', '2021-10-04 08:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `who_accept` bigint(20) UNSIGNED DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `image`, `contents`, `admin_id`, `customer_id`, `who_accept`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hàng chính hãng chất lượng cao cao cao cao', 'hang-chinh-hang-chat-luong-cao-LMs3wI0b9yXbD5QUwyNP-HFcKrDxSCh9FtnxpAjWl', '1633337969browser.png', '<p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>aabdbwdgwjdgwdgwdwdwdwdg</p><p>&nbsp;</p>', NULL, 1, 1, 1, '2021-09-26 09:27:06', '2021-09-26 09:27:06'),
(3, 'Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng', 'ghe-dep-chuan-thiet-ke-hang-chat-luong-cao-bao-hanh-12-thang-L1xHzmL1xEJTu3IqMvuN', '1632648573chi_hang.jpg', '<p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 thángGhế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>Ghế đẹp chuẩn thiết kế, hàng chất lượng cao, bảo hành 12 tháng</p><p>v</p><p>v</p><p>v</p>', NULL, 3, 1, 1, '2021-09-26 09:29:33', '2021-09-26 09:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `price` double(10,2) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date DEFAULT NULL,
  `count_adults` tinyint(4) NOT NULL,
  `count_children` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_customer`, `price`, `address`, `country`, `city`, `time`, `count_adults`, `count_children`, `created_at`, `updated_at`) VALUES
(15, 4, 15600000.00, 'Hải Phòng', 'Hải Phòng', 'Hải Phòng', '2021-10-08', 5, 4, '2021-10-07 17:22:07', '2021-10-07 17:22:07'),
(16, 1, 2000000.00, 'Hải Phòng', 'Hải Phòng', 'Hải Phòng', '2021-10-09', 1, 1, '2021-10-08 15:46:52', '2021-10-08 15:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tour` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_payment` bigint(20) UNSIGNED NOT NULL,
  `id_discount` bigint(20) UNSIGNED DEFAULT NULL,
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `id_vehicle` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tour_guild` bigint(20) UNSIGNED DEFAULT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 'ha-noi', 0, '2021-09-26 23:27:14', '2021-09-26 23:27:14'),
(2, 'Quảng Ninh', 'quang-ninh', 1, '2021-09-26 23:29:24', '2021-09-26 23:29:24'),
(3, 'Đà Nẵng', 'da-nang', 1, '2021-09-26 23:29:41', '2021-09-26 23:29:41'),
(7, 'Nha Trang', 'nha-trang', 1, '2021-09-26 23:27:14', '2021-09-26 23:27:14'),
(8, 'Lào Cai', 'lao-cai', 0, '2021-09-26 23:29:24', '2021-09-26 23:29:24'),
(9, 'Hải Phòng', 'hai-phong', 1, '2021-09-26 23:29:41', '2021-09-26 23:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_tour` bigint(20) UNSIGNED DEFAULT NULL,
  `id_blog` bigint(20) UNSIGNED DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team9.jpg',
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `avatar`, `email`, `phone`, `password`, `address`, `id_card`, `bank_card`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Công Tiến1', 'team9.jpg', 'bt2892002@gmail.com', '0335826918', '$2y$10$H3j.VQCEmhkIAC1hrRVCrumUG2H3aWyWkvR4IMCVLL32DFKdHj3uy', 'éc', '12222', NULL, 1, '2021-09-26 09:35:18', '2021-09-26 09:35:18'),
(3, 'Bùi Công Tiến', 'team9.jpg', '1', '03358269', '1', 'éc', NULL, NULL, 0, '2021-09-27 16:31:21', '2021-09-27 16:31:21'),
(4, 'Lê Phùng Sơn', 'son.jpg', 'lephungson1911@gmail.com', '0869097150', '$2y$10$OzxhRjTP.p85nxQ1ScP0G.nSSsDvuASByEzWTk8lc2qx.X7F3TaTm', 'tổ 15 phường Trung Thành _ TP Thái Nguyên', '1234567890', NULL, 1, '2021-10-07 17:13:52', '2021-10-07 17:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `discount_code`
--

CREATE TABLE `discount_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_reduce` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `who` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tour` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_tour` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `solution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `who_except` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `solution`, `answer`, `image`, `customer_id`, `admin_id`, `who_except`, `created_at`, `updated_at`) VALUES
(1, 'Giải pháp đặt tour không bị cướp mã giảm giá', 'k ăn chặn tiền tour là k bị cướp mã', NULL, NULL, 1, NULL, '2021-09-26 17:18:50', '2021-09-26 17:18:50'),
(2, 'gì', 'sao', NULL, 1, 1, 2, '2021-09-27 07:14:14', '2021-09-27 07:14:14'),
(3, 'bmadbhjadad', NULL, NULL, 1, NULL, NULL, '2021-10-03 04:48:00', '2021-10-03 04:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `price`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 2500000, 'Khách Sạn  Đà Nẵng 5 sao', 'Thành phố Đà Nẵng - Tỉnh Đà Nẵng - Việt Nam', '2021-09-26 23:31:18', '2021-09-26 23:31:18'),
(2, 2000000, 'Khách sạn Hạ Long 5 sao', 'Hạ Long, Quảng Ninh - Việt Nam', '2021-09-26 23:31:37', '2021-09-26 23:31:37'),
(3, 2800000, 'Khách Sạn Nha Trang 5 sao', 'Thành Phố Nha Trang  - Việt Nam', '2021-09-26 23:32:05', '2021-09-26 23:32:05'),
(4, 1800000, 'Khách Sạn SaPa 5 sao', 'Thành Phố Lào Cai - Lào Cai - Việt Nam', '2021-10-07 09:36:49', '2021-10-07 09:36:49'),
(5, 2500000, 'Khách sạn Cô Tô 5 sao', 'Thành Phố Cô Tô - Quảng Ninh - Việt Nam', '2021-10-07 09:37:34', '2021-10-07 09:37:34'),
(6, 3800000, 'Khách Sạn Tuần Châu 5 sao', 'Thành Phố Tuần Châu - Quảng Ninh - Việt Nam', '2021-10-07 09:38:20', '2021-10-07 09:38:20'),
(7, 1800000, 'Khách Sạn Đồ Sơn 5 sao', 'Thành Phố Đồ Sơn - Hải Phòng - Việt Nam', '2021-10-07 09:56:22', '2021-10-07 09:56:22'),
(8, 2800000, 'Khách Sạn  Bạch Long Vỹ 4 sao', 'Thành Phố Long Vỹ - Hải Phòng - Việt Nam', '2021-10-07 10:10:08', '2021-10-07 10:10:08'),
(9, 2300000, 'Khách Sạn  Cát Bà 4 sao', 'Thành Phố Cát Bà - Hải Phòng - Việt Nam', '2021-10-07 10:11:06', '2021-10-07 10:11:06'),
(10, 400000, 'Khách sạn Hải Phòng 3 sao', 'Thành Phố Hải Phòng - Việt Nam', '2021-10-07 10:23:25', '2021-10-07 10:23:25'),
(11, 400000, 'Khách sạn Hải Phòng 4 sao', 'Thành Phố Hải Phòng  - Tỉnh Hải Phòng', '2021-10-07 10:24:12', '2021-10-07 10:24:12'),
(12, 2500000, 'Khách sạn Bãi Cháy 5 sao', 'Thành Phố Bãi Cháy - Quảng Ninh - Việt Nam', '2021-10-07 10:58:24', '2021-10-07 10:58:24'),
(13, 1800000, 'Khách sạn Quảng Ninh 4 sao', 'Thành Phố Quảng Ninh - Việt Nam', '2021-10-07 10:59:26', '2021-10-07 10:59:26'),
(14, 2400000, 'Khách sạn Đà Nẵng 4 sao', 'Thành Phố Đà Nẵng - Việt Nam', '2021-10-07 11:00:22', '2021-10-07 11:00:22'),
(15, 300000, 'Khách sạn Bà Nà Hills', 'Bà Nà Hills - Đà Nẵng - Việt Nam', '2021-10-07 15:33:25', '2021-10-07 15:33:25'),
(16, 4500000, 'Khách sạn Asian Park Đà Nẵng', 'Thành phố Đà Nẵng - Tỉnh Đà Nẵng - Việt Nam 2', '2021-10-07 15:34:40', '2021-10-07 15:34:40'),
(17, 3000000, 'Khách sạn VinWonders Nha Trang', 'Thành Phố Nha Trang  -  Nha Trang - Việt Nam', '2021-10-07 16:16:01', '2021-10-07 16:16:01'),
(18, 35000000, 'Khách sạn Sao Biển Nha Trang', 'Sao Biển - Tỉnh Nha Trang', '2021-10-07 16:17:00', '2021-10-07 16:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(3, 'logo1.png1633626422-.png', 1, '2021-10-07 10:06:26', '2021-10-07 10:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_08_31_115608_create_categories_table', 1),
(5, '2021_08_31_120243_create_vehicles_table', 1),
(6, '2021_08_31_121231_create_hotels_table', 1),
(7, '2021_08_31_132416_create_customers_table', 1),
(8, '2021_08_31_133514_create_admins_table', 1),
(9, '2021_08_31_134911_create_payments_table', 1),
(10, '2021_08_31_135956_create_blogs_table', 1),
(11, '2021_08_31_151019_create_orders_table', 1),
(12, '2021_08_31_152722_create_slides_table', 1),
(13, '2021_08_31_152749_create_feedback_table', 1),
(14, '2021_09_17_142528_create_service', 1),
(15, '2021_09_17_143427_create_tour_guide', 1),
(16, '2021_09_17_145400_create_logo', 1),
(17, '2021_09_26_084702_create_tour', 1),
(18, '2021_09_26_084821_create_discount', 1),
(19, '2021_09_26_084903_create_comments', 1),
(20, '2021_09_26_084929_create_ratings', 1),
(21, '2021_09_26_085027_create_order_detail', 1),
(22, '2021_09_26_085217_create_favorites', 1),
(23, '2021_09_26_085242_create_banner', 1),
(24, '2021_09_26_085548_create_reply', 1),
(25, '2021_10_01_004337_create_cart_table', 2),
(26, '2021_10_01_004916_create_cart_detail_table', 3),
(27, '2021_10_01_013834_create_carts_table', 4),
(28, '2021_10_01_013927_create_carts_detail_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date DEFAULT NULL,
  `count_adults` tinyint(4) NOT NULL,
  `count_children` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `price`, `address`, `country`, `city`, `time`, `count_adults`, `count_children`, `status`, `created_at`, `updated_at`) VALUES
(9, 4, 1200000, 'Hà Nội Hải Phòng', 'Việt Nam', 'Việt Nam', '2021-10-15', 3, 2, 0, '2021-09-01 15:08:17', '2021-10-08 15:09:21'),
(12, 1, 2000000, 'Hải Phòng', 'Hải Phòng', 'Hải Phòng', '2021-10-09', 1, 1, 3, '2021-10-08 15:50:50', '2021-10-08 15:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tour` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_payment` bigint(20) UNSIGNED NOT NULL,
  `id_discount` bigint(20) UNSIGNED DEFAULT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_vehicle` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tour_guild` bigint(20) UNSIGNED DEFAULT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_tour`, `id_customer`, `id_payment`, `id_discount`, `id_order`, `id_vehicle`, `id_tour_guild`, `hotel_id`, `id_service`, `total_price`, `created_at`, `updated_at`) VALUES
(7, 19, 1, 1, NULL, 9, NULL, NULL, NULL, NULL, 12000000, '2021-11-04 15:11:29', '2021-10-08 15:12:05'),
(8, 5, 1, 1, NULL, 12, 1, 1, 8, '[\"4\",\"5\",\"7\",\"8\",\"9\"]', 246000000, '2021-10-08 15:50:50', '2021-10-08 15:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `who_except` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `method`, `amount`, `id_customer`, `who_except`, `created_at`, `updated_at`) VALUES
(1, 'MoMo', 1200.00, 1, 1, '2021-09-27 00:15:34', '2021-09-27 00:15:34'),
(2, 'Paypal', 130000.00, 1, 1, '2021-09-27 00:15:53', '2021-09-27 00:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_tour` bigint(20) UNSIGNED NOT NULL,
  `id_tour_guide` bigint(20) UNSIGNED DEFAULT NULL,
  `rating_star` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_to` bigint(20) UNSIGNED NOT NULL,
  `customer_reply` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_reply` bigint(20) UNSIGNED DEFAULT NULL,
  `who_eccept` bigint(20) UNSIGNED DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tour',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(4, 'Dịch vụ vận chuyển', 500000, '2021-10-07 09:43:19', '2021-10-07 09:43:19'),
(5, 'Dịch vụ ăn uống', 250000, '2021-10-07 09:43:47', '2021-10-07 09:43:47'),
(6, 'Dịch vụ Spa', 1000000, '2021-10-07 09:44:13', '2021-10-07 09:44:13'),
(7, 'Dịch vụ tham quan, giải trí', 600000, '2021-10-07 09:44:47', '2021-10-07 09:44:47'),
(8, 'Dịch vụ hồ bơi', 100000, '2021-10-07 09:45:35', '2021-10-07 09:45:35'),
(9, 'Dịch vụ quầy Bar', 2000000, '2021-10-07 09:46:04', '2021-10-07 09:46:04'),
(10, 'Dịch vụ sân golf', 800000, '2021-10-07 09:46:47', '2021-10-07 09:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `max` int(11) NOT NULL DEFAULT 6,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distant` tinyint(4) NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_photos` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(2) NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` int(11) NOT NULL,
  `ordered` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `name`, `slug`, `distant`, `image`, `des_photos`, `from`, `to`, `map`, `time`, `address`, `tour_code`, `price`, `description`, `limit`, `ordered`, `status`, `category_id`, `service`, `vehicle_id`, `hotel_id`, `created_at`, `updated_at`) VALUES
(5, 'Du lịch Biển Đồ Sơn', 'du-lich-bien-do-son-hAj5EcsbCHBIB4UWppoY', 100, 'bai-bien-Do-Son.jpg', '[\"bai-bien-Do-Son.jpg\"]', 'Thái Nguyên', 'Hải Phòng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14930.257305719746!2d106.78672452199213!3d20.687296603189658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a6c608b8feabd%3A0x5bf0cbf27e7679c2!2zQsOjaSBiaeG7g24gxJDhu5MgU8ahbg!5e0!3m2!1svi!2s!4v1633598475189!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'tổ 15 phường Trung Thành _ TP Thái Nguyên', '183878', 2000000.00, '<p>oke</p>', 3, 0, 1, 1, '[\"4\",\"5\",\"7\",\"8\",\"9\"]', '[\"1\",\"2\"]', 7, '2021-10-07 09:22:59', '2021-10-07 09:22:59'),
(6, 'Du lịch  Đảo Bạch Long Vỹ', 'du-lich-dao-bach-long-vy-iwDGZ3G3y5JBmMaDUmQa', 100, 'tour-du-lich-bach-long-vi-3n2d-vietintravel.jpg', '[\"tour-du-lich-bach-long-vi-3n2d-vietintravel.jpg\"]', 'Nghệ An', 'Hải Phòng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14983.89824380154!2d107.71931597185363!3d20.13510888019004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31495f03831b0d03%3A0x38858c51605760d7!2zxJDhuqNvIELhuqFjaCBMb25nIFbEqQ!5e0!3m2!1svi!2s!4v1633600952412!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Tỉnh Nghệ An', '249609', 3000000.00, '<p>tho&aacute;ng m&aacute;t, m&aacute;t mẻ, view đẹp</p>', 3, 0, 1, 9, '[\"4\",\"5\",\"7\",\"8\"]', '[\"1\",\"4\"]', 8, '2021-10-07 10:08:52', '2021-10-07 10:08:52'),
(7, 'Du lịch Đảo Cát Bà', 'du-lich-dao-cat-ba-vjpSxOmpZfzbuyXqSDUH', 100, 'kinh-nghiem-du-lich-cat-ba.jpg', '[\"kinh-nghiem-du-lich-cat-ba.jpg\"]', 'Lào Cai', 'Hải Phòng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119356.59787457362!2d106.93795039212209!3d20.795588626176972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a434696fb12d3%3A0xf486763dd4c03f3b!2zUXXhuqduIMSR4bqjbyBDw6F0IELDoA!5e0!3m2!1svi!2s!4v1633601935373!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'Tình Lào Cai', '394118', 2400000.00, '<p>Dịch vụ tốt, cảnh đẹp</p>', 3, 0, 1, 9, '[\"4\",\"5\",\"7\"]', '[\"1\",\"4\"]', 9, '2021-10-07 10:20:08', '2021-10-07 10:20:08'),
(8, 'Di Tích Tràng Kềnh', 'di-tich-trang-kenh-GNzzeAwlp4Qyuu73XAMk', 100, 'trang-kenh.jpg', '[\"trang-kenh.jpg\"]', 'Thái Nguyên', 'Hải Phòng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119356.59787457362!2d106.93795039212209!3d20.795588626176972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a434696fb12d3%3A0xf486763dd4c03f3b!2zUXXhuqduIMSR4bqjbyBDw6F0IELDoA!5e0!3m2!1svi!2s!4v1633601935373!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 24, 'tổ 15 phường Trung Thành _ TP Thái Nguyên', '879925', 1000000.00, '<p>rất đẹp&nbsp;</p>', 3, 0, 1, 9, '[\"5\",\"7\"]', '[\"1\",\"4\"]', 10, '2021-10-07 10:26:35', '2021-10-07 10:26:35'),
(9, 'Tháp Tường Long', 'thap-tuong-long-SwSAk0mD01qosDe9LYvT', 100, 'thap-tuong-long.jpeg', '[\"thap-tuong-long.jpeg\"]', 'Ninh Bình', 'Hải Phòng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.904873651515!2d106.7679987144589!3d20.714087103823026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a6dcb360f0825%3A0x7162fdfe7b4ebdca!2zQ2jDuWEgVGjDoXAgVMaw4budbmcgTG9uZw!5e0!3m2!1svi!2s!4v1633602918373!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 24, 'Thành Phố Ninh Bình', '581527', 1500000.00, '<p>Th&aacute;p đẹp</p>', 3, 0, 1, 9, '[\"5\",\"7\"]', '[\"1\",\"4\"]', 11, '2021-10-07 10:36:07', '2021-10-07 10:36:07'),
(10, 'Tuyệt Tình Cốc', 'tuyet-tinh-coc-Ksw6pH748rPXILNzALRi', 100, 'tuyet-tinh-coc.jpg', '[\"tuyet-tinh-coc.jpg\"]', 'Lạng Sơn', 'Hải Phòng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8255026510137!2d106.56904011446335!3d20.999630794149002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7fb0bde961f7%3A0x638eeb7a364a0a1d!2zVHV54buHdCBUw6xuaCBD4buRYywgSOG6o2kgUGjDsm5n!5e0!3m2!1svi!2s!4v1633603273132!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 42, 'Thành Phố Lạng Sơn', '925378', 2600000.00, '<p>tuyệt đẹp, phong cảnh hữu t&igrave;nh</p>', 3, 0, 1, 9, '[\"4\",\"5\",\"7\"]', '[\"1\",\"4\"]', 11, '2021-10-07 10:43:02', '2021-10-07 10:43:02'),
(11, 'Du lịch Vịnh Hạ Long', 'du-lich-vinh-ha-long-jlbwsFZ8zKWLkhr8Y2xN', 100, 'gioi-thieu-ve-vinh-ha-long.jpg', '[\"gioi-thieu-ve-vinh-ha-long.jpg\"]', 'Hải Phòng', 'Quảng Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238636.93987982254!2d107.0095401110017!3d20.843729233575495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5796518cee87%3A0x55c6b0bcc85478db!2zVuG7i25oIEjhuqEgTG9uZw!5e0!3m2!1svi!2s!4v1633603496287!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Hải Phòng - Việt Nam', '991618', 4500000.00, '<p>Vịnh Hạ Long l&agrave; một điểm đến tuyệt vời !</p>', 4, 0, 1, 2, '[\"4\",\"5\",\"7\",\"8\",\"9\"]', '[\"1\",\"4\"]', 2, '2021-10-07 10:45:54', '2021-10-07 10:45:54'),
(12, 'Du lịch Đảo Cô Tô', 'du-lich-dao-co-to-PlS2ygwhrcN5NHJmKRv8', 100, 'dao-co-to-dia-diem-du-lich-ly-tuong.jpg', '[\"dao-co-to-dia-diem-du-lich-ly-tuong.jpg\"]', 'Lai Châu', 'Quảng Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59603.610512950305!2d107.72405296475648!3d20.983589712117737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314b741c16138269%3A0xe232acc58a8c4a03!2zxJDhuqNvIEPDtCBUw7Q!5e0!3m2!1svi!2s!4v1633603628161!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Lai Châu', '294058', 4000000.00, '<p>Cảnh đẹp</p>', 4, 0, 1, 2, '[\"4\",\"5\",\"6\",\"7\",\"8\"]', '[\"1\",\"4\"]', 5, '2021-10-07 10:48:01', '2021-10-07 10:48:01'),
(13, 'Du lịch Đảo Tuần Châu', 'du-lich-dao-tuan-chau-H9C3AiLiWYgiHI1VAE0x', 80, 'dao-tuan-chau.jpg', '[\"dao-tuan-chau.jpg\"]', 'Thái Nguyên', 'Quảng Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29812.845352684064!2d106.96789444857872!3d20.928178791981498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5ec2bff2b109%3A0x5612e1db2b191630!2zxJBhzIlvIFR1w6LMgG4gQ2jDonU!5e0!3m2!1svi!2s!4v1633603969992!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'tổ 15 phường Trung Thành _ TP Thái Nguyên', '798686', 4200000.00, '<p>Tuần ch&acirc;u l&agrave; một điểm đến của c&aacute;c t&igrave;nh y&ecirc;u hihi</p>', 5, 0, 1, 2, '[\"4\",\"5\",\"7\",\"8\",\"9\"]', '[\"1\",\"4\"]', 6, '2021-10-07 10:54:19', '2021-10-07 10:54:19'),
(14, 'Du lịch Biển Bãi Cháy', 'du-lich-bien-bai-chay-9f39fwsMuwSfexTY0qUI', 100, '4bai-chay-vntrip-e1536311795163.jpg', '[\"4bai-chay-vntrip-e1536311795163.jpg\"]', 'Bắc Giang', 'Quảng Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29805.295779737156!2d107.01915239861812!3d20.966085680513064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5896bfde7551%3A0xa242a0cf37455a5a!2zQsOjaSBDaMOheSwgVHAuIEjhuqEgTG9uZywgUXXhuqNuZyBOaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1633604144702!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Bắc GIang', '764297', 4000000.00, '<p>đẹp qu&aacute;</p>', 4, 0, 1, 2, '[\"4\",\"5\",\"7\",\"8\"]', '[\"1\",\"4\"]', 12, '2021-10-07 10:57:42', '2021-10-07 10:57:42'),
(15, 'Chùa Yên Tử', 'chua-yen-tu-jitEHDn8nmTD2YAiFRUr', 100, 'chua-yen-tu.jpg', '[\"chua-yen-tu.jpg\"]', 'Nha Trang', 'Quảng Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14883.141253042086!2d106.70625952211445!3d21.160940385721467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a857bda1fbea1%3A0x3607af13c396bdad!2zTsO6aSBZw6puIFThu60!5e0!3m2!1svi!2s!4v1633605015054!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'Thành Phố Nha Trang  - Việt Nam', '471950', 2000000.00, '<p>Ch&ugrave;a rất đẹp</p>', 3, 0, 1, 2, '[\"5\",\"7\"]', '[\"1\",\"3\"]', 13, '2021-10-07 11:11:28', '2021-10-07 11:11:28'),
(16, 'Chùa Ba Vàng', 'chua-ba-vang-pvy0GA82lNvkmZLx8Rpl', 100, 'chua-ba-vang.jpg', '[\"chua-ba-vang.jpg\"]', 'Hưng Yên', 'Quảng Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.1106605105315!2d106.76226471446454!3d21.068241991806218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a88e4abefa2e9%3A0xc77de06980444f13!2zQ2jDuWEgQmEgVsOgbmc!5e0!3m2!1svi!2s!4v1633619573703!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'Thành Phố Hưng Yên - Việt Nam', '865972', 2800000.00, '<p>tuyệt vời !</p>', 5, 0, 1, 2, '[\"5\",\"7\"]', '[\"7\"]', 13, '2021-10-07 15:24:35', '2021-10-07 15:24:35'),
(17, 'Du lịch Bà Nà Hills', 'du-lich-ba-na-hills-AQCqypuHt4krwbhFoJkm', 100, 'ba-na-mo-cua-tro-lai-10-16005678342571877068250.jpg', '[\"ba-na-mo-cua-tro-lai-10-16005678342571877068250.jpg\"]', 'Quảng Ninh', 'Đà Nẵng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.3539740130145!2d107.99417751439411!3d15.995078545670529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141f7f503abc03b%3A0x9d023df40751a196!2zQ-G6p3UgVsOgbmcgLSBCw6AgTsOgIEhpbGxz!5e0!3m2!1svi!2s!4v1633620431615!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Hạ Long - Việt Nam', '660792', 5500000.00, '<p>cảnh quan tuyệt đẹp</p>', 4, 0, 1, 3, '[\"4\",\"5\",\"6\",\"7\",\"9\"]', '[\"3\",\"4\"]', 15, '2021-10-07 15:29:18', '2021-10-07 15:29:18'),
(18, 'Du lịch Asian Park', 'du-lich-asian-park-UITqf6M2TJIRTj0VuPnb', 110, 'asiapark6_zbqq.jpg', '[\"asiapark6_zbqq.jpg\"]', 'Thái Nguyên', 'Đà Nẵng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.521656226146!2d108.22448641439459!3d16.03839754452461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219e7a191cc17%3A0xe60f91d4055e3074!2zQXNpYSBQYXJrIC0gQ8O0bmcgdmnDqm4gQ2jDonUgw4E!5e0!3m2!1svi!2s!4v1633621006384!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Thái Nguyên', '980708', 6000000.00, '<p>ok</p>', 4, 0, 1, 3, '[\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\"]', '[\"3\",\"6\"]', 16, '2021-10-07 15:37:37', '2021-10-07 15:37:37'),
(19, 'Bán Đảo Sơn Trà', 'ban-dao-son-tra-vdAbW6jVYvjCshgl96X0', 110, 'ban-dao-son-tra-1.jpg', '[\"ban-dao-son-tra-1.jpg\"]', 'Huế', 'Đà Nẵng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61325.08093631519!2d108.24067589714164!3d16.126735899376623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31423d72d1be522d%3A0x1e7339a6534e4e7!2zQsOhbiDEkeG6o28gU8ahbiBUcsOg!5e0!3m2!1svi!2s!4v1633621499458!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'Thừa Thiên Huế', '733782', 3600000.00, '<p>ahihi tuyệt đẹp</p>', 4, 0, 1, 3, '[\"4\",\"5\",\"7\",\"10\"]', '[\"1\",\"6\"]', 1, '2021-10-07 15:47:17', '2021-10-07 15:47:17'),
(21, 'Bãi Tắm Non Nước', 'bai-tam-non-nuoc-xH7YeBxNxPM6xCE7incZ', 120, 'bai-tam-non-nuoc.jpg', '[\"bai-tam-non-nuoc.jpg\"]', 'Hà Nội', 'Đà Nẵng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15341.379429596185!2d108.26511002095857!3d15.995553649834479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314210dcc92cfa5f%3A0x6426dff2323ae607!2zQsOjaSBiaeG7g24gTm9uIE7GsOG7m2M!5e0!3m2!1svi!2s!4v1633621970305!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Hoàng Mai - Hà Nội', '933966', 5500000.00, '<p>biển tuyệt đẹp</p>', 5, 0, 1, 3, '[\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]', '[\"3\",\"6\"]', 1, '2021-10-07 16:00:23', '2021-10-07 16:00:23'),
(22, 'Ghềnh Bàng Đá', 'ghenh-bang-da-eYG9hD0AbIJWxqKF47XV', 120, 'ghenh-bang-da-nang_1.jpg', '[\"ghenh-bang-da-nang_1.jpg\"]', 'Hải Phòng', 'Đà Nẵng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.0939769777165!2d108.30944351439535!3d16.112438742559313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31423df2819c425b%3A0xfac92c3b7e0f9926!2zR2jhu4FuaCBCw6BuZw!5e0!3m2!1svi!2s!4v1633622628700!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Hải Phòng - Việt Nam', '316036', 4800000.00, '<p>cảnh quan phong ph&uacute;</p>', 4, 0, 1, 3, '[\"4\",\"5\",\"7\"]', '[\"1\",\"4\"]', 1, '2021-10-07 16:05:24', '2021-10-07 16:05:24'),
(23, 'Thánh Địa Mỹ Sơn', 'thanh-dia-my-son-WFcuXRTWvQazMZ3sTLvD', 120, 'thanh-dia-my-son.jpg', '[\"thanh-dia-my-son.jpg\"]', 'Quảng Trị', 'Đà Nẵng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3839.7514598473363!2d108.12229321439145!3d15.764281951726186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314200815555551f%3A0x8baa2869b9f687b!2zRGkgc-G6o24gVsSDbiBow7NhIFRo4bq_IEdp4bubaSBN4bu5IFPGoW4!5e0!3m2!1svi!2s!4v1633622941932!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'Thành Phố Quảng Trị', '351302', 3000000.00, '<p>b&igrave;nh dị của đời cổ</p>', 4, 0, 1, 3, '[\"5\",\"7\"]', '[\"7\"]', 1, '2021-10-07 16:10:04', '2021-10-07 16:10:04'),
(24, 'VinWonders Nha Trang', 'vinwonders-nha-trang-gohaRG4I3P35srbZL6Tm', 110, 'vinpearlland-nha-trang.jpg', '[\"vinpearlland-nha-trang.jpg\"]', 'Thái Nguyên', 'Nha Trang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.43566870059!2d109.23831781435703!3d12.218753034256386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067c7c4267451%3A0x826b650efe77e523!2sVinWonders%20Nha%20Trang!5e0!3m2!1svi!2s!4v1633623287045!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'tổ 28 phường Trung Thành _ TP Thái Nguyên', '606247', 6500000.00, '<p>10 điểm cho chuyến đi n&agrave;y</p>', 4, 0, 1, 7, '[\"4\",\"5\",\"6\",\"7\",\"8\"]', '[\"3\",\"6\"]', 17, '2021-10-07 16:22:05', '2021-10-07 16:22:05'),
(25, 'Khu Sinh Thái Sao Biển', 'khu-sinh-thai-sao-bien-xuKlc7OrR1xlmRMPRdg8', 110, 'sao-bien.jpg', '[\"sao-bien.jpg\"]', 'Lào Cai', 'Nha Trang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.6980279525146!2d109.16753311435424!3d11.856398241573187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170eca0b739b9d7%3A0x79a0aeae687fa286!2sDu%20l%E1%BB%8Bch%20sinh%20th%C3%A1i%20Sao%20Bi%E1%BB%83n%20Cam%20Ranh%20(Official)!5e0!3m2!1svi!2s!4v1633624043930!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Lào Cai - Lào Cai - Việt Nam', '201459', 5000000.00, '<p>tuyệt đẹp</p>', 4, 0, 1, 7, '[\"4\",\"5\",\"7\"]', '[\"3\",\"6\"]', 3, '2021-10-07 16:28:30', '2021-10-07 16:28:30'),
(26, 'Vịnh Vân Phong', 'vinh-van-phong-PVyFZy3ssGMOCpbCL9oT', 110, 'vinh-van-phong.jpg', '[\"vinh-van-phong.jpg\"]', 'Bà Rịa Vũng Tàu', 'Nha Trang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249116.8894610498!2d109.14168211898243!3d12.683934039382006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31701c7833b70923%3A0xf9bd0d782a161771!2zVuG7i25oIFbDom4gUGhvbmc!5e0!3m2!1svi!2s!4v1633624699620!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Bà Rịa Vũng Tàu', '740729', 6000000.00, '<p>thật tuyệt</p>', 4, 0, 1, 7, '[\"4\",\"5\",\"7\",\"8\"]', '[\"7\"]', 3, '2021-10-07 16:40:01', '2021-10-07 16:40:01'),
(27, 'Thủy cung Trí Nguyên', 'thuy-cung-tri-nguyen-74Rp0P3HX87zPLY2V0VI', 110, 'thuy-cung.jpg', '[\"thuy-cung.jpg\"]', 'Thanh Hóa', 'Nha Trang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.785570980983!2d109.22367451435686!3d12.194988734742667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317060d22e09b6fb%3A0x3171af26c9326eaa!2zQuG6v24gVMOgdSBUcsOtIE5ndXnDqm4!5e0!3m2!1svi!2s!4v1633625030248!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Vinh - Thanh Hóa', '611236', 3000000.00, '<p>ok</p>', 4, 0, 1, 7, '[\"4\",\"5\",\"7\"]', '[\"3\",\"4\"]', 3, '2021-10-07 16:45:44', '2021-10-07 16:45:44'),
(28, 'Tháp bà Ponagar', 'thap-ba-ponagar-dIxHLn14wKytSYVnIlVV', 110, 'thap-ba5.jpg', '[\"thap-ba5.jpg\"]', 'Vĩnh Phúc', 'Nha Trang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.7469931594505!2d109.19320581435744!3d12.26539333329949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170678c61b8f251%3A0x115f6f97f1af1d7c!2zVGjDoXAgQsOgIFBvbmFnYXI!5e0!3m2!1svi!2s!4v1633625521019!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 48, 'Thành Phố Vĩnh Yên - Vĩnh Phúc', '273215', 2500000.00, '<p>ch&ugrave;a rất đẹp</p>', 3, 0, 1, 7, '[\"4\",\"5\",\"7\"]', '[\"3\",\"6\"]', 3, '2021-10-07 16:53:17', '2021-10-07 16:53:17'),
(29, 'Hòn Tằm', 'hon-tam-usQRo7wFT9shSDbYTLFo', 110, 'tour-hon-tam-resort-7.jpg', '[\"tour-hon-tam-resort-7.jpg\"]', 'Trà Vinh', 'Nha Trang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7800.165136089829!2d109.23873337253737!3d12.174781753089771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31706118e16df895%3A0x49b3cce0b199f054!2zSMOybiBU4bqxbQ!5e0!3m2!1svi!2s!4v1633625917764!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Trà Vinh - Việt Nam', '134075', 5000000.00, '<p>biển to&agrave;n g&aacute;i xinh</p>', 4, 0, 1, 7, '[\"4\",\"5\",\"6\",\"7\"]', '[\"7\"]', 3, '2021-10-07 16:58:47', '2021-10-07 16:58:47'),
(30, 'Bãi biển Nha Trang', 'bai-bien-nha-trang-mPevTuZp07HTb6sxHe9v', 110, 'hinh-anh-nha-trang-7.jpg', '[\"hinh-anh-nha-trang-7.jpg\"]', 'Sóc Trăng', 'Nh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31193.24084607588!2d109.18400389179797!3d12.237775186392549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31706770f4958433%3A0xf09b18bfbf27bde7!2zQsOjaSBiaeG7g24gTmhhIFRyYW5n!5e0!3m2!1svi!2s!4v1633625990811!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 72, 'Thành Phố Sóc Trăng', '327109', 7000000.00, '<p>tuyệt vời</p>', 5, 0, 1, 7, '[\"4\",\"5\",\"6\",\"7\",\"9\"]', '[\"1\",\"7\"]', 3, '2021-10-07 17:00:31', '2021-10-07 17:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

CREATE TABLE `tour_guide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'team7.jpg',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`id`, `name`, `phone`, `price`, `avatar`, `email`, `address`, `description`, `status`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Tiến Bùi', '0335826918', 1200000, 'chi_hang.jpg1632699241-.jpg', 'bt2892002@gmail.com', 'Tân Viên An Lão HP', 'hadjahdadhakajkajakahjkcac', '0', '0', '2021-09-26 16:34:01', '2021-09-26 16:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xe giường nằm', 1200000, 1, '2021-09-26 23:29:54', '2021-09-26 23:29:54'),
(2, 'Xe máy', 100000, 1, '2021-09-26 23:30:09', '2021-09-26 23:30:09'),
(3, 'Máy Bay', 1200000, 1, '2021-09-26 23:30:32', '2021-09-26 23:30:32'),
(4, 'Xe taxi', 600000, 0, '2021-09-26 23:30:56', '2021-09-26 23:30:56'),
(5, 'Đi Tàu', 400000, 1, '2021-10-07 09:33:30', '2021-10-07 09:33:30'),
(6, 'Xe 7 chỗ', 10000, 1, '2021-10-07 15:22:03', '2021-10-07 15:22:03'),
(7, 'Xe 16 chỗ', 15000, 1, '2021-10-07 15:22:31', '2021-10-07 15:22:31'),
(8, 'Xe 24 chỗ', 20000, 1, '2021-10-07 15:22:56', '2021-10-07 15:22:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_phone_unique` (`phone`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_id_tour_foreign` (`id_tour`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_customer_id_foreign` (`customer_id`),
  ADD KEY `blog_status_foreign` (`status`),
  ADD KEY `blog_admin_id_foreign` (`admin_id`),
  ADD KEY `blog_who_accept_foreign` (`who_accept`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_detail_id_tour_foreign` (`id_tour`),
  ADD KEY `cart_detail_id_payment_foreign` (`id_payment`),
  ADD KEY `cart_detail_id_customer_foreign` (`id_customer`),
  ADD KEY `cart_detail_id_discount_foreign` (`id_discount`),
  ADD KEY `cart_detail_id_cart_foreign` (`id_cart`),
  ADD KEY `cart_detail_id_vehicle_foreign` (`id_vehicle`),
  ADD KEY `cart_detail_id_tour_guild_foreign` (`id_tour_guild`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`),
  ADD UNIQUE KEY `category_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id_customer_foreign` (`id_customer`),
  ADD KEY `comments_id_tour_foreign` (`id_tour`),
  ADD KEY `comments_id_blog_foreign` (`id_blog`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`),
  ADD UNIQUE KEY `customer_phone_unique` (`phone`);

--
-- Indexes for table `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_code_id_tour_foreign` (`id_tour`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_id_customer_foreign` (`id_customer`),
  ADD KEY `favorites_id_tour_foreign` (`id_tour`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_customer_id_foreign` (`customer_id`),
  ADD KEY `feedback_admin_id_foreign` (`admin_id`),
  ADD KEY `feedback_who_except_foreign` (`who_except`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_name_unique` (`name`),
  ADD UNIQUE KEY `hotel_address_unique` (`address`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_id_tour_foreign` (`id_tour`),
  ADD KEY `order_detail_id_payment_foreign` (`id_payment`),
  ADD KEY `order_detail_id_customer_foreign` (`id_customer`),
  ADD KEY `order_detail_id_discount_foreign` (`id_discount`),
  ADD KEY `order_detail_id_order_foreign` (`id_order`),
  ADD KEY `order_detail_id_vehicle_foreign` (`id_vehicle`),
  ADD KEY `order_detail_hotel_id_foreign` (`hotel_id`),
  ADD KEY `order_detail_id_tour_guild_foreign` (`id_tour_guild`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_id_customer_foreign` (`id_customer`),
  ADD KEY `payments_who_except_foreign` (`who_except`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_id_customer_foreign` (`id_customer`),
  ADD KEY `ratings_id_tour_foreign` (`id_tour`),
  ADD KEY `ratings_id_tour_guide_foreign` (`id_tour_guide`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_reply_to_foreign` (`reply_to`),
  ADD KEY `reply_customer_reply_foreign` (`customer_reply`),
  ADD KEY `reply_admin_reply_foreign` (`admin_reply`),
  ADD KEY `reply_who_eccept_foreign` (`who_eccept`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_name_unique` (`name`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_name_unique` (`name`),
  ADD KEY `tour_category_id_foreign` (`category_id`),
  ADD KEY `tour_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_guide_name_unique` (`name`),
  ADD UNIQUE KEY `tour_guide_email_unique` (`email`),
  ADD UNIQUE KEY `tour_guide_phone_unique` (`phone`),
  ADD UNIQUE KEY `tour_guide_address_unique` (`address`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`);

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `blog_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `blog_status_foreign` FOREIGN KEY (`status`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `blog_who_accept_foreign` FOREIGN KEY (`who_accept`) REFERENCES `admin` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_id_cart_foreign` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_detail_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `cart_detail_id_discount_foreign` FOREIGN KEY (`id_discount`) REFERENCES `discount_code` (`id`),
  ADD CONSTRAINT `cart_detail_id_payment_foreign` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `cart_detail_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `cart_detail_id_tour_guild_foreign` FOREIGN KEY (`id_tour_guild`) REFERENCES `tour_guide` (`id`),
  ADD CONSTRAINT `cart_detail_id_vehicle_foreign` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_id_blog_foreign` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comments_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `comments_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`);

--
-- Constraints for table `discount_code`
--
ALTER TABLE `discount_code`
  ADD CONSTRAINT `discount_code_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `favorites_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `feedback_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `feedback_who_except_foreign` FOREIGN KEY (`who_except`) REFERENCES `admin` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `order_detail_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_detail_id_discount_foreign` FOREIGN KEY (`id_discount`) REFERENCES `discount_code` (`id`),
  ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_id_payment_foreign` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `order_detail_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `order_detail_id_tour_guild_foreign` FOREIGN KEY (`id_tour_guild`) REFERENCES `tour_guide` (`id`),
  ADD CONSTRAINT `order_detail_id_vehicle_foreign` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `payments_who_except_foreign` FOREIGN KEY (`who_except`) REFERENCES `admin` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `ratings_id_tour_foreign` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `ratings_id_tour_guide_foreign` FOREIGN KEY (`id_tour_guide`) REFERENCES `tour_guide` (`id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_admin_reply_foreign` FOREIGN KEY (`admin_reply`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `reply_customer_reply_foreign` FOREIGN KEY (`customer_reply`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `reply_reply_to_foreign` FOREIGN KEY (`reply_to`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `reply_who_eccept_foreign` FOREIGN KEY (`who_eccept`) REFERENCES `admin` (`id`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `tour_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
