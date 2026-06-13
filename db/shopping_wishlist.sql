-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2026 at 06:40 AM
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
-- Database: `shopping_wishlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `email`, `password`) VALUES
(1, 'yasmin', 'yasmin@gmail.com', '$2y$10$9k/irj3H6MhmI/ZJJNkrD.s0VO5XsuXDpl0HpyIkl2ADmbYFy..Te'),
(2, 'aina', 'aina@gmail.com', '$2y$10$6g0k7NEePcr05WperzK5nemD3U3v..fM6Bj9FB6GbW7C2T4AFVMxm');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `product_link` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Not Purchased',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistId`, `userId`, `item_name`, `price`, `category`, `product_link`, `status`, `image`, `created_at`) VALUES
(1, 1, 'PATRICK TA Major Headlines Double-Take Creme & Powder Blush', 190.00, 'Beauty', 'https://www.sephora.my/products/patrick-ta-major-headlines-double-take-creme-and-powder-blush/v/she-goes-to-the-gym', 'Purchased', '1778439895_Screenshot 2026-05-11 030430.png', '2026-04-24 06:44:40'),
(2, 1, 'Charlotte Tilbury Pillow Talk Lip Duo Mini', 110.00, 'Beauty', 'https://www.sephora.my/products/charlotte-tilbury-pillow-talk-lip-duo-mini/v/fair', 'Purchased', '1778426866_Screenshot 2026-05-10 232733.png', '2026-04-24 06:53:00'),
(3, 1, 'Uniqlo Girls Dry Sweat Curved Pants', 80.00, 'Fashion', 'https://www.uniqlo.com/my/en/products/E480343-000/00?colorDisplayCode=10&sizeDisplayCode=140', 'Not Purchased', '1778426894_Screenshot 2026-05-10 232803.png', '2026-05-10 14:48:50'),
(4, 1, 'Covered In Roses Eau De Parfum', 219.00, 'Beauty', 'https://www.bathandbodyworks.com.my/p/covered-in-roses-eau-de-parfum-28024937.html?cat=all-fragrance', 'Purchased', '1778426749_Screenshot 2026-05-10 232535.png', '2026-05-10 14:49:32'),
(6, 1, 'Uniqlo Cotton Dobby V Neck Blousee', 79.90, 'Fashion', 'https://www.uniqlo.com/my/en/products/E483881-000/00?colorDisplayCode=60&sizeDisplayCode=004', 'Purchased', '1778426831_Screenshot 2026-05-10 232702.png', '2026-05-10 14:53:07'),
(7, 1, 'JOY.RIA AMBER CHARM FRAGRANCE MIST 236ML', 58.90, 'Beauty', 'http://sasa.com.my/amber-charm-fragrance-mist-236ml', 'Not Purchased', '1778426648_Screenshot 2026-05-10 231404.png', '2026-05-10 14:57:54'),
(8, 1, 'Samsung Front-load Washer Ecobubble™ 17kg', 3199.00, 'Electronics', 'https://www.samsung.com/my/washers-and-dryers/washing-machines/wf6000rwf21t6500gvsp-17kg-white-wf17t6000gw-fq/', 'Not Purchased', '1778426613_Screenshot 2026-05-10 232321.png', '2026-05-10 14:59:54'),
(9, 1, 'DIOR Addict Lip Glow Oil 6ml', 185.00, 'Beauty', 'https://www.sephora.my/products/dior-addict-lip-glow-oil/v/104-black-cherry', 'Purchased', '1778426166_Screenshot 2026-05-10 231551.png', '2026-05-10 15:16:06'),
(10, 1, 'GALS Cherie (Latte)', 259.00, 'Fashion', 'https://gals.com.my/products/cherie-latte', 'Not Purchased', '1778441153_Screenshot 2026-05-11 032524.png', '2026-05-10 19:25:53'),
(11, 1, 'GALS  Etoile Heels (Pink)', 149.00, 'Fashion', 'https://gals.com.my/products/etoile-heels-pink', 'Not Purchased', '1778441389_Screenshot 2026-05-11 032909.png', '2026-05-10 19:29:49'),
(12, 2, '(Women) Saint Laurent Opyum Black Gold Heel', 8605.00, 'Fashion', 'https://novelship.com/women-saint-laurent-opyum-black-gold-heel-4841600-npkk-1000?size=US%207&country=MY&utm_source=google&utm_medium=cpc&utm_campaign=google_shopping&tmsrc=googlead&tmcid=22956813782&tmsid=187123661960&tmid=771605462529&tmkw=&tw_source=google&tw_adid=771605462529&tw_campaign=22956813782&gad_source=1&gad_campaignid=22956813782&gbraid=0AAAAADQOBb-b3LtHm68Vdj-KAA5NzX35O&gclid=Cj0KCQjw_IXQBhCkARIsADqELbLeq2xQoqICkdnrc0S5vzBNjdZzaBi2yoVKnOsADR9vi-JKBAQnGhgaArrxEALw_wcB', 'Not Purchased', '1778485206_Screenshot 2026-05-11 153846.png', '2026-05-11 07:40:06'),
(13, 2, 'Mini Lady Dior Bag with Chain', 26500.00, 'Fashion', 'https://www.dior.com/en_my/fashion/products/M0505OUQA_M19N', 'Not Purchased', '1778485434_Screenshot 2026-05-11 154254.png', '2026-05-11 07:43:54'),
(14, 2, 'Sephora Collection Addict Lip Maximizer Plumping Gloss ', 185.00, 'Beauty', 'https://www.sephora.my/products/dior-addict-lip-maximizer-plumping-gloss/v/212-tutu', 'Not Purchased', '1778485718_Screenshot 2026-05-11 154741.png', '2026-05-11 07:48:38'),
(15, 2, 'Charlotte Tilbury Luxury Eyeshadow Palette', 285.00, 'Beauty', 'https://www.sephora.my/products/charlotte-tilbury-luxury-eyeshadow-palette/v/pillow-talk', 'Not Purchased', '1778485908_Screenshot 2026-05-11 155132.png', '2026-05-11 07:51:05'),
(16, 2, 'HEMNES Dressing table', 999.00, 'Home', 'https://www.ikea.com/my/en/p/hemnes-dressing-table-white-10355670/', 'Not Purchased', '1778486253_Screenshot 2026-05-11 155647.png', '2026-05-11 07:57:33'),
(17, 2, 'VIMLE Corner sofa, 5-seat, with chaise longue/Gunnared beige', 6390.00, 'Home', 'https://www.ikea.com/my/en/p/vimle-corner-sofa-5-seat-with-chaise-longue-gunnared-beige-s79399582/', 'Not Purchased', '1778486443_Screenshot 2026-05-11 155951.png', '2026-05-11 08:00:43'),
(18, 2, 'Dyson Airstrait™ dryer and straightener ', 2599.00, 'Electronics', 'https://www.dyson.my/products/hair-care/wet-to-dry-straighteners/airstrait-hair-straightener-pink-gold', 'Not Purchased', '1778486803_Screenshot 2026-05-11 160618.png', '2026-05-11 08:05:00'),
(19, 2, 'iPhone 17 Pro', 5499.00, 'Electronics', 'https://www.apple.com/my/shop/buy-iphone/iphone-17-pro', 'Not Purchased', '1778487251_Screenshot 2026-05-11 161127.png', '2026-05-11 08:14:11'),
(20, 2, ' iPad Air', 4099.00, 'Electronics', 'https://www.apple.com/my/shop/buy-ipad/ipad-air', 'Not Purchased', '1778487507_Screenshot 2026-05-11 161701.png', '2026-05-11 08:18:27'),
(21, 1, 'Colleney Peach Bunny Plushie', 79.00, 'Others', 'https://bloomthis.co/collections/plushies/products/colleney-plushie-peach-bunny?variant=', 'Not Purchased', '1778487745_Screenshot 2026-05-11 162153.png', '2026-05-11 08:22:25'),
(22, 1, 'Miffy Daily Ace Bottle Medium', 105.90, 'Others', 'http://shopmontigo.com/products/miffy-daily-ace-bottle-medium', 'Not Purchased', '1778487810_Screenshot 2026-05-11 162302.png', '2026-05-11 08:23:30'),
(25, 1, '3CE Multi Eye Color Palette Smoother (Mood Recipe)', 200.00, 'Beauty', 'https://www.watsons.com.my/3ce-multi-eye-color-palette-smoother-mood-recipe/p/BP_1016516', 'Not Purchased', '1781157140_Screenshot 2026-06-11 134252.png', '2026-06-11 05:52:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
