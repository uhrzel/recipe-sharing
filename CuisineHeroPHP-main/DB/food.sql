-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 07:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `id` int(6) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `dispic` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `followno` int(10) NOT NULL,
  `recpno` int(10) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `firstname`, `lastname`, `email`, `pass`, `banner`, `dispic`, `bio`, `followno`, `recpno`, `role`) VALUES
(8, 'Reynaldo', 'Factor', 'factorjun0309@gmail.com', 'yeah', '1623617642.png', '1711680751.png', '', 1, 0, 'user'),
(9, 'testx', 'testx', 'testx@gmail.com', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0, 'user'),
(13, 'aa', 'a', 'a', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0, 'user'),
(14, 'Admin', ' ', 'cuisinehero@gg.com', 'admin', '1623084420.png', '1623084421.png', '', 2, 2, 'admin'),
(15, 'testx', 'a', 'a@g.com', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`) VALUES
(1, 'Zoa', 'ivanjared17@gmail.com', 'loonaverse2117');

-- --------------------------------------------------------

--
-- Table structure for table `bake`
--

CREATE TABLE `bake` (
  `id` int(100) NOT NULL,
  `bake_name` varchar(100) DEFAULT NULL,
  `bake_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `food_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `condi`
--

CREATE TABLE `condi` (
  `condi_id` int(6) NOT NULL,
  `condi_name` varchar(30) NOT NULL,
  `condi_amt` varchar(30) NOT NULL,
  `food_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `condi`
--

INSERT INTO `condi` (`condi_id`, `condi_name`, `condi_amt`, `food_id`) VALUES
(1, 'Soy Sauce', '3', 1),
(2, 'Vinegar', '2', 1),
(3, 'Salt', '3', 1),
(4, 'Salt', '3', 2),
(5, 'Fish Sauce', '2', 2),
(6, 'Vinegar', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dairy`
--

CREATE TABLE `dairy` (
  `id` int(100) NOT NULL,
  `dairy_name` varchar(100) DEFAULT NULL,
  `dairy_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

CREATE TABLE `dessert` (
  `id` int(100) NOT NULL,
  `dessert_name` varchar(100) DEFAULT NULL,
  `dessert_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `fish_id` int(100) NOT NULL,
  `fish_name` varchar(100) DEFAULT NULL,
  `fish_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_log`
--

CREATE TABLE `follow_log` (
  `id` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `follow_log`
--

INSERT INTO `follow_log` (`id`, `email`, `author`) VALUES
(41, 'factorjun0309@gmail.com', 'cuisinehero@gg.com'),
(28, 'a@g.com', 'cuisinehero@gg.com'),
(42, 'cuisinehero@gg.com', 'factorjun0309@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `cook_time` varchar(15) NOT NULL,
  `prep_time` varchar(15) NOT NULL,
  `servings` varchar(30) NOT NULL,
  `video_link` tinytext DEFAULT NULL,
  `proced` text NOT NULL,
  `nutri_info` text DEFAULT NULL,
  `likes` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_id`, `author`, `food_name`, `cook_time`, `prep_time`, `servings`, `video_link`, `proced`, `nutri_info`, `likes`, `status`, `regdate`, `price`) VALUES
(9, 3, 'factorjun0309@gmail.com', 'ok', '1 hour', 'sgaha', '4 grams', NULL, 'sge lan', '21', 0, 'pending', '2024-03-28 18:52:11', 21.00),
(10, 4, 'factorjun0309@gmail.com', 'shesh', '30 minutes', '1 hours', '50 grams', NULL, 'gege', 'awts', 0, 'pending', '2024-03-28 19:08:45', 40.00),
(11, 5, 'a@g.com', 'shocks', '1 hour', '30 minutes', '2 grams', NULL, 'okkk', 'okkk', 0, 'pending', '2024-03-28 19:10:08', 100.00),
(2, 2, 'cuisinehero@gg.com', 'Nilaga', '30 minutes', '10 minutes', '6-10', '<iframe width=\"950\" height=\"534\" src=\"https://www.youtube.com/embed/CDFsyd92ezU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'procedure ng pag gawa ng nilaga', 'nutri info ng nilaga', 2, 'pending', '2021-06-10 01:30:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fruit`
--

CREATE TABLE `fruit` (
  `id` int(100) NOT NULL,
  `fruit_name` varchar(100) DEFAULT NULL,
  `fruit_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_all`
--

CREATE TABLE `ingredients_all` (
  `id` int(6) NOT NULL,
  `ing_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ingredients_all`
--

INSERT INTO `ingredients_all` (`id`, `ing_name`) VALUES
(1, 'Petsay'),
(2, 'Kangkong'),
(3, 'Potatoes'),
(7, 'Salt'),
(6, 'Tomatoes'),
(9, 'Paprika'),
(10, 'Soy Sauce'),
(11, 'Fish Sauce'),
(12, 'Vinegar'),
(13, 'Dried Basil'),
(14, 'Garlic'),
(15, 'Onion'),
(16, 'Ginger'),
(17, 'Pepper'),
(18, 'Pork'),
(19, 'Beef'),
(20, 'Chicken'),
(21, 'Tofu'),
(22, 'Shrimp'),
(34, 'Pepper'),
(35, 'Pork'),
(36, 'Beef'),
(37, 'Chicken'),
(38, 'Tofu'),
(39, 'Shrimp'),
(40, 'Adobo');

-- --------------------------------------------------------

--
-- Table structure for table `like_log`
--

CREATE TABLE `like_log` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `likes` int(1) NOT NULL,
  `food_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `like_log`
--

INSERT INTO `like_log` (`id`, `email`, `likes`, `food_id`) VALUES
(153, 'cuisinehero@gg.com', 1, 1),
(158, 'factorjun0309@gmail.com', 1, 1),
(162, 'factorjun0309@gmail.com', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `meat`
--

CREATE TABLE `meat` (
  `meat_id` int(6) NOT NULL,
  `meat_name` varchar(30) NOT NULL,
  `meat_amt` varchar(30) NOT NULL,
  `food_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `meat`
--

INSERT INTO `meat` (`meat_id`, `meat_name`, `meat_amt`, `food_id`) VALUES
(1, 'Pork', '1', 1),
(2, 'Chicken', '2', 1),
(3, 'Pork', '2', 2),
(4, 'Duck', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nuts`
--

CREATE TABLE `nuts` (
  `id` int(100) NOT NULL,
  `nuts_name` varchar(100) DEFAULT NULL,
  `nuts_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oil`
--

CREATE TABLE `oil` (
  `id` int(100) NOT NULL,
  `oil_name` varchar(100) DEFAULT NULL,
  `oil_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_images`
--

CREATE TABLE `recipe_images` (
  `id` int(20) NOT NULL,
  `food_img` varchar(30) NOT NULL,
  `food_id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recipe_images`
--

INSERT INTO `recipe_images` (`id`, `food_img`, `food_id`, `author`) VALUES
(46, '1711694505.png', 3, 'a@g.com'),
(45, '1711694436.png', 2, 'factorjun0309@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `soup`
--

CREATE TABLE `soup` (
  `id` int(100) NOT NULL,
  `soup_name` varchar(100) DEFAULT NULL,
  `soup_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spice`
--

CREATE TABLE `spice` (
  `id` int(100) NOT NULL,
  `spice_name` varchar(100) DEFAULT NULL,
  `spice_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `veggies`
--

CREATE TABLE `veggies` (
  `veggies_id` int(6) NOT NULL,
  `veggies_name` varchar(30) NOT NULL,
  `veggies_amt` varchar(30) NOT NULL,
  `food_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `veggies`
--

INSERT INTO `veggies` (`veggies_id`, `veggies_name`, `veggies_amt`, `food_id`) VALUES
(1, 'Kangkong', '1', 1),
(2, 'Potato', '1', 1),
(3, 'Potato', '2', 2),
(4, 'Petsay', '1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bake`
--
ALTER TABLE `bake`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condi`
--
ALTER TABLE `condi`
  ADD PRIMARY KEY (`condi_id`);

--
-- Indexes for table `dairy`
--
ALTER TABLE `dairy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`fish_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `follow_log`
--
ALTER TABLE `follow_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fruit`
--
ALTER TABLE `fruit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `ingredients_all`
--
ALTER TABLE `ingredients_all`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_log`
--
ALTER TABLE `like_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat`
--
ALTER TABLE `meat`
  ADD PRIMARY KEY (`meat_id`);

--
-- Indexes for table `nuts`
--
ALTER TABLE `nuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `oil`
--
ALTER TABLE `oil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `recipe_images`
--
ALTER TABLE `recipe_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soup`
--
ALTER TABLE `soup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `spice`
--
ALTER TABLE `spice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `veggies`
--
ALTER TABLE `veggies`
  ADD PRIMARY KEY (`veggies_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bake`
--
ALTER TABLE `bake`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `condi`
--
ALTER TABLE `condi`
  MODIFY `condi_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `dairy`
--
ALTER TABLE `dairy`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `fish_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `follow_log`
--
ALTER TABLE `follow_log`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `fruit`
--
ALTER TABLE `fruit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ingredients_all`
--
ALTER TABLE `ingredients_all`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `like_log`
--
ALTER TABLE `like_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `meat`
--
ALTER TABLE `meat`
  MODIFY `meat_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `nuts`
--
ALTER TABLE `nuts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `oil`
--
ALTER TABLE `oil`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `recipe_images`
--
ALTER TABLE `recipe_images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `soup`
--
ALTER TABLE `soup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `spice`
--
ALTER TABLE `spice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `veggies`
--
ALTER TABLE `veggies`
  MODIFY `veggies_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
