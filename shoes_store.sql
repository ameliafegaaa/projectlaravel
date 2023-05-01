-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 08:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `total` int(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `user_id`, `shoes_id`, `address`, `postal_code`, `total`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 'jl.disana', '12345', 2279000, 'Bank Transfer', '2023-04-26 02:44:50', '2023-04-26 02:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoes_id` int(11) NOT NULL,
  `shoes_name` varchar(255) NOT NULL,
  `shoes_brand` varchar(255) NOT NULL,
  `shoes_price` int(20) NOT NULL,
  `shoes_image` varchar(255) NOT NULL,
  `shoes_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoes_id`, `shoes_name`, `shoes_brand`, `shoes_price`, `shoes_image`, `shoes_description`, `created_at`, `updated_at`) VALUES
(1, 'Air Jordan 1 Retro High OG', 'Nike', 2200000, 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/1c2dfd0c-cd48-46c4-829a-4b5d93f27f83/air-jordan-1-retro-high-og-shoes-Pz6fZ9.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 11:26:32'),
(2, 'Ultraboost 21', 'Adidas', 2500000, 'https://assets.adidas.com/images/w_940,f_auto,q_auto/8ae387dad29445f7a635aca601118310_9366/FY0402_01_standard.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(3, 'Classic Slip-On', 'Vans', 500000, 'https://www.footlocker.id/media/catalog/product/cache/e81e4f913a1cad058ef66fea8e95c839/0/1/01-VANS-FFSSBVAS5-VAS000EYEBWW-Black.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(4, 'Chuck Taylor All Star High Top', 'Converse', 800000, 'https://www.converse.id/media/catalog/product/cache/e81e4f913a1cad058ef66fea8e95c839/C/O/CONM9160C-1.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(5, 'Superstar', 'Adidas', 1500000, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7ed0855435194229a525aad6009a0497_9366/Superstar_Shoes_White_EG4958_01_standard.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(6, 'Old Skool', 'Vans', 700000, 'https://i8.amplience.net/i/jpl/jd_061773_a?qlt=92', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(7, 'Air Force 1 Low', 'Nike', 1800000, 'https://cdn.shopify.com/s/files/1/0259/7021/2909/products/DM0576-100-PHSLH000-2000_1360x.jpg?v=1662450918', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(8, 'Gazelle', 'Adidas', 1200000, 'https://assets.adidas.com/images/w_600,f_auto,q_auto/61f87dec481e4512823ea7fb0080ba1a_9366/Gazelle_Shoes_Black_BB5476_01_standard.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(17, 'One Star', 'Converse', 900000, 'https://unionjackboots.com/media/catalog/product/cache/1dc7939e5468ffaf3953636f40cfaeaa/c/o/converse_160597c_main_0.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00'),
(18, 'Air Max 90', 'Nike', 2200000, 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/08f113fb-396f-4445-a89b-f82752a7cb82/air-max-90-g-golf-shoe-qlD3wL.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, nam deserunt dolores molestias at reiciendis quibusdam, quidem facilis numquam explicabo officiis voluptas repellat natus veniam, rem accusamus. Odit, exercitationem consequatur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim ad eveniet officiis odit necessitatibus adipisci tempora, aliquam quas natus recusandae provident, accusantium quasi hic voluptas similique facilis eaque aspernatur minus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur voluptate voluptatum veniam neque? Alias debitis nam quo cumque, voluptatem, numquam officiis impedit velit doloribus, aspernatur rem. Rem, dolorum. Rem, commodi.', '2023-04-26 02:00:00', '2023-04-26 02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone_number`, `role`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe@mail.com', '$2a$12$xYmiIlxQ8D0WTEotTC40t.Lm3qV9bjCP/Uve7G7TLIfgByTbkl4bq', '089876543210', 'customer', NULL, NULL),
(3, 'test', 'test@gmail.com', '$2y$10$8n7zCzM9U2Krh4sPFM0oFeZwBMwYp7OUqSOOp7miCu07USIhkgvoa', '089123456789', 'admin', '2023-04-26 21:27:04', '2023-04-26 21:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sales.user` (`user_id`),
  ADD KEY `sales.shoes` (`shoes_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales.shoes` FOREIGN KEY (`shoes_id`) REFERENCES `shoes` (`shoes_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales.user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
