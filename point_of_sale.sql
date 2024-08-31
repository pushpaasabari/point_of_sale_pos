-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 06:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_of_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_sno` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(120) NOT NULL,
  `customer_mobile` varchar(120) NOT NULL,
  `customer_email` varchar(120) DEFAULT NULL,
  `customer_gstin` varchar(120) DEFAULT NULL,
  `customer_address` varchar(420) DEFAULT NULL,
  `customer_created_on` varchar(50) NOT NULL,
  `customer_updated_on` varchar(50) NOT NULL,
  `customer_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_sno`, `customer_name`, `customer_mobile`, `customer_email`, `customer_gstin`, `customer_address`, `customer_created_on`, `customer_updated_on`, `customer_status`) VALUES
(2, 'Sabarinathan R', '9629291034', 'sabari@gmail.com', '33GQYPS6377Z0', 'DPI', '2024-08-12 11:32:52', '2024-08-12 12:18:34', 1),
(3, 'Madhunisha S', '9952521819', 'madhu@madhu.com', '3246578358796', 'PPT', '2024-08-22 11:13:13', '2024-08-22 11:13:13', 1),
(4, 'Pavithra', '9597313779', 'pavithra@gmail.com', '33MNFJKUS32D', 'Palacode', '2024-08-31 08:36:36', '2024-08-31 08:36:36', 1),
(5, 'Gokul', '9944119211', 'gokul@gmail.com', '33MNFJSYHNB9', 'Kanapatti', '2024-08-31 08:40:38', '2024-08-31 08:40:38', 1),
(6, 'Pushparani', '9944317418', NULL, NULL, NULL, '2024-08-31 08:47:56', '2024-08-31 08:47:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_sno` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(120) NOT NULL,
  `item_hsn` int(11) DEFAULT NULL,
  `item_category` varchar(120) NOT NULL,
  `item_code` int(11) DEFAULT NULL,
  `item_base_unit` varchar(120) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_secondary_unit` varchar(120) NOT NULL,
  `item_tax` int(11) NOT NULL,
  `item_purchase_price` varchar(120) NOT NULL,
  `item_purchase_tax` varchar(120) NOT NULL,
  `item_mrp` int(11) NOT NULL,
  `item_sale_price` varchar(120) NOT NULL,
  `item_sale_tax` varchar(120) NOT NULL,
  `item_stock` int(15) NOT NULL,
  `item_image` varchar(120) NOT NULL,
  `item_created_on` varchar(50) NOT NULL,
  `item_updated_on` varchar(50) NOT NULL,
  `item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_sno`, `item_name`, `item_hsn`, `item_category`, `item_code`, `item_base_unit`, `item_desc`, `item_secondary_unit`, `item_tax`, `item_purchase_price`, `item_purchase_tax`, `item_mrp`, `item_sale_price`, `item_sale_tax`, `item_stock`, `item_image`, `item_created_on`, `item_updated_on`, `item_status`) VALUES
(1, '2 MP PLASTIC BULLET 12MM', 8582, 'Camera', 8582, 'Nos', 'Bullet cameras are long and cylindrical in shape and are ideal for outdoor use.', 'None', 18, '2100', 'with tax', 2715, '2700', 'with tax', 0, 'uploads/item/1723360465_download (1).jpeg', '2024-08-11 12:44:25', '2024-08-31 08:06:27', 1),
(3, 'TP-Link C200 360° 2MP 1080p Full HD', 8582, 'Camera', 8582, 'Nos', 'TP-Link C200 360° 2MP 1080p Full HD Pan/Tilt Home Security Wi-Fi Smart Camera', 'None', 28, '1799', 'with tax', 2499, '2399', 'with tax', 0, 'uploads/item/1724406594_download (1).jpeg', '2024-08-23 15:19:54', '2024-08-31 08:06:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, 'suadmin_basic', 1),
(2, 'su_otp', 2),
(3, 'su_user', 3),
(4, 'products', 4),
(5, 'item', 5),
(6, 'Customer', 6),
(7, 'Vendor', 7),
(8, 's', 8),
(9, 'purchase', 9),
(10, 'purchase_item', 10),
(11, 'sale', 11),
(12, 'sale_item', 12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_sno` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(120) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_desc` varchar(120) NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `product_purchase_price` int(11) NOT NULL,
  `product_sale_price` int(11) NOT NULL,
  `product_price` varchar(120) NOT NULL,
  `product_qty` varchar(120) NOT NULL,
  `product_tax` varchar(120) NOT NULL,
  `product_image` varchar(120) NOT NULL,
  `product_created_on` varchar(50) NOT NULL,
  `product_updated_on` varchar(50) NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` varchar(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `vendor_mobile` varchar(15) NOT NULL,
  `vendor_gstin` varchar(15) NOT NULL,
  `purchase_bill` varchar(50) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `item_totalDiscountAmount` int(15) DEFAULT NULL,
  `totalQty` int(15) NOT NULL,
  `item_totalTaxAmount` int(15) NOT NULL,
  `item_totalPaid` int(15) DEFAULT NULL,
  `item_totalBalance` int(15) NOT NULL,
  `purchase_created_at` varchar(120) NOT NULL,
  `purchase_updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `item_totalDiscountAmount`, `totalQty`, `item_totalTaxAmount`, `item_totalPaid`, `item_totalBalance`, `purchase_created_at`, `purchase_updated_at`) VALUES
(1, '1', 'vendor1', 'Sabari', '9638527410', '32165498785', 'BVJDGF334', '2024-08-28', 19950.00, 1050, 0, 3591, 19950, 0, '2024-08-28 10:57:06', '2024-08-28 10:57:06'),
(2, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', 'DSGFFSDG/1234', '2024-08-28', 20725.25, 870, 11, 4585, 20000, 725, '2024-08-28 11:37:29', '2024-08-28 11:37:29'),
(3, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', '23456', '2024-08-28', 21000.00, 0, 10, 3780, NULL, 21000, '2024-08-28 16:26:11', '2024-08-28 16:26:11'),
(4, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', '23456', '2024-08-28', 21000.00, 0, 10, 3780, NULL, 21000, '2024-08-28 16:26:56', '2024-08-28 16:26:56'),
(5, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', '23456', '2024-08-28', 21000.00, 0, 10, 3780, NULL, 21000, '2024-08-28 16:27:31', '2024-08-28 16:27:31'),
(6, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', '23456', '2024-08-28', 21000.00, 0, 10, 3780, NULL, 21000, '2024-08-28 16:28:07', '2024-08-28 16:28:07'),
(7, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', '234567', '2024-08-28', 199500.00, 10500, 100, 35910, NULL, 199500, '2024-08-28 17:10:32', '2024-08-28 17:10:32'),
(8, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', 'GFJGJ201456', '2024-08-28', 38990.00, 0, 20, 8817, NULL, 38990, '2024-08-28 20:01:28', '2024-08-28 20:01:28'),
(9, '3', 'Vendor3', 'Sabari', '7895462310', '21356487123', 'ATOZ1001', '2024-08-28', 185202.50, 9748, 100, 41882, 185000, 203, '2024-08-28 20:14:10', '2024-08-28 20:14:10'),
(10, '3', 'Vendor3', 'Sabari', '7895462310', '21356487123', 'FGHRTYR', '2024-08-30', 72131.50, 5849, 40, 16312, 50000, 22132, '2024-08-30 16:26:44', '2024-08-30 16:26:44'),
(11, '3', 'Vendor3', 'Sabari', '7895462310', '21356487123', 'MNBVFKGDSJG23456', '2024-08-30', 190076.25, 4874, 100, 42984, NULL, 190076, '2024-08-30 17:02:33', '2024-08-30 17:02:33'),
(12, '3', 'Vendor3', 'Sabari', '7895462310', '21356487123', 'DSFGGDFG', '2024-08-30', 38405.15, 585, 20, 8685, NULL, 38405, '2024-08-30 17:06:42', '2024-08-30 17:06:42'),
(13, '2', 'vendor2', 'Sabari', '7895641231', '2135648744', 'GHHGF2234', '2024-08-30', 19202.58, 292, 10, 4342, 19000, 203, '2024-08-30 17:17:01', '2024-08-30 17:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_bill` varchar(50) NOT NULL,
  `purchase_id` varchar(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `item_hsn` varchar(15) NOT NULL,
  `item_mrp` varchar(15) NOT NULL,
  `item_qty` varchar(15) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `item_purchase_price` decimal(10,2) NOT NULL,
  `item_discount_percentage` decimal(10,2) DEFAULT NULL,
  `item_discount` decimal(10,2) DEFAULT NULL,
  `item_tax_percentage` decimal(10,2) NOT NULL,
  `item_tax` decimal(10,2) NOT NULL,
  `item_amount` decimal(10,2) NOT NULL,
  `created_at` varchar(120) NOT NULL,
  `updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `purchase_bill`, `purchase_id`, `vendor_name`, `item_name`, `item_id`, `item_hsn`, `item_mrp`, `item_qty`, `purchase_date`, `item_purchase_price`, `item_discount_percentage`, `item_discount`, `item_tax_percentage`, `item_tax`, `item_amount`, `created_at`, `updated_at`) VALUES
(1, '23456', '3', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 21000.00, '2024-08-28 16:26:11', '2024-08-28 16:26:11'),
(2, '23456', '3', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 21000.00, '2024-08-28 16:26:56', '2024-08-28 16:26:56'),
(3, '23456', '3', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 21000.00, '2024-08-28 16:27:31', '2024-08-28 16:27:31'),
(4, '23456', '3', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 21000.00, '2024-08-28 16:28:07', '2024-08-28 16:28:07'),
(5, '234567', '7', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '100', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 199500.00, '2024-08-28 17:10:32', '2024-08-28 17:10:32'),
(6, 'GFJGJ201456', '8', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 21000.00, '2024-08-28 20:01:28', '2024-08-28 20:01:28'),
(7, 'GFJGJ201456', '8', 'vendor2', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-28', 1799.00, NULL, NULL, 0.00, 0.00, 17990.00, '2024-08-28 20:01:28', '2024-08-28 20:01:28'),
(8, 'ATOZ1001', '9', 'Vendor3', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '25', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 49875.00, '2024-08-28 20:14:10', '2024-08-28 20:14:10'),
(9, 'ATOZ1001', '9', 'Vendor3', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '25', '2024-08-28', 1799.00, NULL, NULL, 0.00, 0.00, 42726.25, '2024-08-28 20:14:10', '2024-08-28 20:14:10'),
(10, 'ATOZ1001', '9', 'Vendor3', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '25', '2024-08-28', 2100.00, NULL, NULL, 0.00, 0.00, 49875.00, '2024-08-28 20:14:10', '2024-08-28 20:14:10'),
(11, 'ATOZ1001', '9', 'Vendor3', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '25', '2024-08-28', 1799.00, NULL, NULL, 0.00, 0.00, 42726.25, '2024-08-28 20:14:10', '2024-08-28 20:14:10'),
(12, 'FGHRTYR', '10', 'Vendor3', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-30', 2100.00, NULL, NULL, 0.00, 0.00, 19950.00, '2024-08-30 16:26:44', '2024-08-30 16:26:44'),
(13, 'FGHRTYR', '10', 'Vendor3', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 1799.00, NULL, NULL, 0.00, 0.00, 17090.50, '2024-08-30 16:26:44', '2024-08-30 16:26:44'),
(14, 'FGHRTYR', '10', 'Vendor3', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-30', 2100.00, NULL, NULL, 0.00, 0.00, 18900.00, '2024-08-30 16:26:44', '2024-08-30 16:26:44'),
(15, 'FGHRTYR', '10', 'Vendor3', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 1799.00, NULL, NULL, 0.00, 0.00, 16191.00, '2024-08-30 16:26:44', '2024-08-30 16:26:44'),
(16, 'MNBVFKGDSJG23456', '11', 'Vendor3', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '50', '2024-08-30', 1799.00, 3.00, 2249.00, 28.00, 24556.00, 87701.25, '2024-08-30 17:02:33', '2024-08-30 17:02:33'),
(17, 'MNBVFKGDSJG23456', '11', 'Vendor3', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '50', '2024-08-30', 2100.00, 3.00, 2625.00, 18.00, 18428.00, 102375.00, '2024-08-30 17:02:33', '2024-08-30 17:02:33'),
(18, 'DSFGGDFG', '12', 'Vendor3', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 1799.00, 1.50, 269.85, 28.00, 4961.64, 17720.15, '2024-08-30 17:06:42', '2024-08-30 17:06:42'),
(19, 'DSFGGDFG', '12', 'Vendor3', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-30', 2100.00, 1.50, 315.00, 18.00, 3723.30, 20685.00, '2024-08-30 17:06:42', '2024-08-30 17:06:42'),
(20, 'GHHGF2234', '13', 'vendor2', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '5', '2024-08-30', 1799.00, 1.50, 134.93, 28.00, 2480.82, 8860.08, '2024-08-30 17:17:01', '2024-08-30 17:17:01'),
(21, 'GHHGF2234', '13', 'vendor2', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '5', '2024-08-30', 2100.00, 1.50, 157.50, 18.00, 1861.65, 10342.50, '2024-08-30 17:17:01', '2024-08-30 17:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `customer_gstin` varchar(15) DEFAULT NULL,
  `customer_address` varchar(512) NOT NULL,
  `sale_bill` varchar(50) NOT NULL,
  `sale_date` varchar(50) NOT NULL,
  `totalQty` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `item_totalDiscountAmount` decimal(10,2) NOT NULL,
  `item_totalTaxAmount` decimal(10,2) NOT NULL,
  `item_totalReceived` decimal(10,2) DEFAULT NULL,
  `item_totalBalance` decimal(10,2) NOT NULL,
  `sale_created_at` varchar(120) NOT NULL,
  `sale_updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `customer_id`, `customer_name`, `user_name`, `user_id`, `customer_mobile`, `customer_gstin`, `customer_address`, `sale_bill`, `sale_date`, `totalQty`, `total_amount`, `item_totalDiscountAmount`, `item_totalTaxAmount`, `item_totalReceived`, `item_totalBalance`, `sale_created_at`, `sale_updated_at`) VALUES
(4, '3', 'Madhunisha S', 'Sabari', '1', '9952521819', '3246578358796', 'PPT', 'SALE/24-25/002', '2024-08-30', '20', 50225.15, 764.85, 11403.54, 50000.00, 226.00, '2024-08-30 22:31:40', '2024-08-30 22:31:40'),
(5, '2', 'Sabarinathan R', 'Sabari', '1', '9629291034', '33GQYPS6377Z0', 'DPI', 'SALE/24-25/003', '2024-08-30', '20', 50990.00, 0.00, 11577.20, NULL, 50990.00, '2024-08-30 22:32:45', '2024-08-30 22:32:45'),
(6, '3', 'Madhunisha S', 'Sabari', '1', '9952521819', '3246578358796', 'PPT', 'SALE/24-25/004', '2024-08-30', '18', 43737.75, 949.25, 10930.32, 43700.00, 38.00, '2024-08-30 23:19:08', '2024-08-30 23:19:08'),
(7, '3', 'Madhunisha S', 'Sabari', '1', '9952521819', '3246578358796', 'PPT', 'SALE/24-25/005', '2024-08-30', '35', 83240.00, 8250.00, 17232.20, 83200.00, 40.00, '2024-08-30 23:21:38', '2024-08-30 23:21:38'),
(8, '3', 'Madhunisha S', 'Sabari', '1', '9952521819', '3246578358796', 'PPT', 'SALE/24-25/006', '2024-08-31', '307', 786225.03, 11972.97, 165623.26, 786225.00, 1.00, '2024-08-31 08:06:27', '2024-08-31 08:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `sale_item`
--

CREATE TABLE `sale_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_bill` varchar(50) NOT NULL,
  `sale_id` varchar(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `item_hsn` varchar(15) NOT NULL,
  `item_mrp` varchar(15) NOT NULL,
  `item_qty` varchar(15) NOT NULL,
  `sale_date` varchar(50) NOT NULL,
  `item_sale_price` decimal(10,2) NOT NULL,
  `item_discount_percentage` decimal(10,2) DEFAULT NULL,
  `item_discount` decimal(10,2) DEFAULT NULL,
  `item_tax_percentage` decimal(10,2) NOT NULL,
  `item_tax` decimal(10,2) NOT NULL,
  `item_amount` decimal(10,2) NOT NULL,
  `created_at` varchar(120) NOT NULL,
  `updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_item`
--

INSERT INTO `sale_item` (`id`, `sale_bill`, `sale_id`, `customer_name`, `item_name`, `item_id`, `item_hsn`, `item_mrp`, `item_qty`, `sale_date`, `item_sale_price`, `item_discount_percentage`, `item_discount`, `item_tax_percentage`, `item_tax`, `item_amount`, `created_at`, `updated_at`) VALUES
(3, 'SALE/24-25/002', '4', 'Madhunisha S', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 2399.00, 1.50, 359.85, 28.00, 6616.44, 23630.15, '2024-08-30 22:31:40', '2024-08-30 22:31:40'),
(4, 'SALE/24-25/002', '4', 'Madhunisha S', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-30', 2700.00, 1.50, 405.00, 18.00, 4787.10, 26595.00, '2024-08-30 22:31:40', '2024-08-30 22:31:40'),
(5, 'SALE/24-25/003', '5', 'Sabarinathan R', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '10', '2024-08-30', 2700.00, NULL, NULL, 18.00, 4860.00, 27000.00, '2024-08-30 22:32:45', '2024-08-30 22:32:45'),
(6, 'SALE/24-25/003', '5', 'Sabarinathan R', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 2399.00, NULL, NULL, 28.00, 6717.20, 23990.00, '2024-08-30 22:32:45', '2024-08-30 22:32:45'),
(7, 'SALE/24-25/004', '6', 'Madhunisha S', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 2399.00, 1.50, 359.85, 28.00, 6616.44, 23630.15, '2024-08-30 23:19:08', '2024-08-30 23:19:08'),
(8, 'SALE/24-25/004', '6', 'Madhunisha S', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '5', '2024-08-30', 2700.00, 2.50, 337.50, 18.00, 2369.25, 13162.50, '2024-08-30 23:19:08', '2024-08-30 23:19:08'),
(9, 'SALE/24-25/004', '6', 'Madhunisha S', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '3', '2024-08-30', 2399.00, 3.50, 251.90, 28.00, 1944.63, 6945.10, '2024-08-30 23:19:08', '2024-08-30 23:19:08'),
(10, 'SALE/24-25/005', '7', 'Madhunisha S', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '10', '2024-08-30', 2399.00, 6.25, 1500.00, 28.00, 6297.20, 22490.00, '2024-08-30 23:21:38', '2024-08-30 23:21:38'),
(11, 'SALE/24-25/005', '7', 'Madhunisha S', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '25', '2024-08-30', 2700.00, 10.00, 6750.00, 18.00, 10935.00, 60750.00, '2024-08-30 23:21:38', '2024-08-30 23:21:38'),
(12, 'SALE/24-25/006', '8', 'Madhunisha S', '2 MP PLASTIC BULLET 12MM', '1', '8582', '2715', '205', '2024-08-31', 2700.00, 1.50, 8302.50, 18.00, 98135.55, 545197.50, '2024-08-31 08:06:27', '2024-08-31 08:06:27'),
(13, 'SALE/24-25/006', '8', 'Madhunisha S', 'TP-Link C200 360° 2MP 1080p Full HD', '3', '8582', '2499', '102', '2024-08-31', 2399.00, 1.50, 3670.47, 28.00, 67487.71, 241027.53, '2024-08-31 08:06:27', '2024-08-31 08:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `suadmin_basic`
--

CREATE TABLE `suadmin_basic` (
  `su_id` int(10) UNSIGNED NOT NULL,
  `su_name` varchar(120) NOT NULL,
  `su_email` varchar(120) NOT NULL,
  `su_mobile` varchar(120) NOT NULL,
  `su_pwd` varchar(120) NOT NULL,
  `su_created_on` varchar(50) NOT NULL,
  `su_updated_on` varchar(50) NOT NULL,
  `su_status` int(11) NOT NULL,
  `su_otp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suadmin_basic`
--

INSERT INTO `suadmin_basic` (`su_id`, `su_name`, `su_email`, `su_mobile`, `su_pwd`, `su_created_on`, `su_updated_on`, `su_status`, `su_otp_status`) VALUES
(1, 'Sabari', 'pushpaasabari@gmail.com', '9629291034', '$2y$10$uLMjFGzHqerCnj1JdHJWseO876rE3GQb09gUjxyKgBe.PTsHAUks.', '2024-08-06 17:17:22', '2024-08-06 17:17:22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `su_otp`
--

CREATE TABLE `su_otp` (
  `su_id` int(10) UNSIGNED NOT NULL,
  `su_name` varchar(120) NOT NULL,
  `su_email` varchar(120) NOT NULL,
  `su_otp` varchar(120) NOT NULL,
  `su_created_at` varchar(50) NOT NULL,
  `su_expired_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_otp`
--

INSERT INTO `su_otp` (`su_id`, `su_name`, `su_email`, `su_otp`, `su_created_at`, `su_expired_at`) VALUES
(1, 'Sabari', 'pushpaasabari@gmail.com', '952240', '2024-08-06 17:17:22', '2024-08-06 17:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `su_user`
--

CREATE TABLE `su_user` (
  `user_sno` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(120) NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `user_id` varchar(120) NOT NULL,
  `user_pwd` varchar(120) NOT NULL,
  `user_mobile` varchar(120) NOT NULL,
  `user_email` varchar(120) NOT NULL,
  `user_address` varchar(120) NOT NULL,
  `user_id_proof` varchar(120) NOT NULL,
  `user_id_proof_image` varchar(120) NOT NULL,
  `user_created_on` varchar(50) NOT NULL,
  `user_updated_on` varchar(50) NOT NULL,
  `user_otp_status` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_user`
--

INSERT INTO `su_user` (`user_sno`, `user_type`, `user_name`, `user_id`, `user_pwd`, `user_mobile`, `user_email`, `user_address`, `user_id_proof`, `user_id_proof_image`, `user_created_on`, `user_updated_on`, `user_otp_status`, `user_status`) VALUES
(1, 'admin', 'Sabarinathan', 'POS001', '$2y$10$KFkbUdWZ6H17qoZ9epL9POC0grPM5ICnxStIQj.XfO7Z5eTPYZSta', '9629291034', 'admin@admin.com', 'DPi', '663091129183', 'uploads/1723223686_IMG_20240103_174618 (1).jpg', '2024-08-09 13:11:31', '2024-08-10 16:43:54', 0, 1),
(2, 'admin', 'Pavithra', 'POS002', '$2y$10$WvLdqMC31TFisKQ2Ul9LQew/KAfiLG1b/ASEKQAAlMBRLb0YTelDi', '9597313779', 'pavithraaperumal@gmail.com', 'DPi', '663091129180', 'uploads/1723288461_PAVITHRA.jpeg', '2024-08-09 13:41:56', '2024-08-10 16:44:21', 0, 1),
(3, 'admin', 'Madhunisha', 'POS003', '$2y$10$w8Suyk1fiYqtkHe2gRXa/uEg0yX2hIVVEYwOigjS/hJ8.CpAPhDqW', '9952521819', 'pushpaasabari@gmail.com', 'DPi', '663091129188', 'uploads/1723288412_MADHUNISHA.jpeg', '2024-08-09 13:47:19', '2024-08-10 16:43:32', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_sno` int(10) UNSIGNED NOT NULL,
  `vendor_name` varchar(120) NOT NULL,
  `vendor_mobile` varchar(120) NOT NULL,
  `vendor_email` varchar(120) NOT NULL,
  `vendor_gstin` varchar(120) NOT NULL,
  `vendor_address` varchar(420) NOT NULL,
  `vendor_created_on` varchar(50) NOT NULL,
  `vendor_updated_on` varchar(50) NOT NULL,
  `vendor_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_sno`, `vendor_name`, `vendor_mobile`, `vendor_email`, `vendor_gstin`, `vendor_address`, `vendor_created_on`, `vendor_updated_on`, `vendor_status`) VALUES
(1, 'vendor1', '9638527410', 'vendor1@gmail.com', '32165498785', 'Vendor', '2024-08-12 18:18:19', '2024-08-12 18:18:19', 1),
(2, 'vendor2', '7895641231', 'vendor2@gmail.com', '2135648744', 'Vendor', '2024-08-12 18:19:08', '2024-08-12 18:19:08', 1),
(3, 'Vendor3', '7895462310', 'vendor3@gmail.com', '21356487123', 'Vendor', '2024-08-12 18:19:37', '2024-08-12 18:19:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_sno`),
  ADD UNIQUE KEY `customer_customer_sno_unique` (`customer_sno`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_sno`),
  ADD UNIQUE KEY `item_item_sno_unique` (`item_sno`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_sno`),
  ADD UNIQUE KEY `products_product_sno_unique` (`product_sno`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_id_unique` (`id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_item_id_unique` (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_id_unique` (`id`);

--
-- Indexes for table `sale_item`
--
ALTER TABLE `sale_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_item_id_unique` (`id`);

--
-- Indexes for table `suadmin_basic`
--
ALTER TABLE `suadmin_basic`
  ADD PRIMARY KEY (`su_id`),
  ADD UNIQUE KEY `suadmin_basic_su_id_unique` (`su_id`);

--
-- Indexes for table `su_otp`
--
ALTER TABLE `su_otp`
  ADD PRIMARY KEY (`su_id`),
  ADD UNIQUE KEY `su_otp_su_id_unique` (`su_id`);

--
-- Indexes for table `su_user`
--
ALTER TABLE `su_user`
  ADD PRIMARY KEY (`user_sno`),
  ADD UNIQUE KEY `su_user_user_sno_unique` (`user_sno`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_sno`),
  ADD UNIQUE KEY `vendor_vendor_sno_unique` (`vendor_sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suadmin_basic`
--
ALTER TABLE `suadmin_basic`
  MODIFY `su_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_otp`
--
ALTER TABLE `su_otp`
  MODIFY `su_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_user`
--
ALTER TABLE `su_user`
  MODIFY `user_sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
