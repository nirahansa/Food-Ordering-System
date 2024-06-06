-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 07:35 PM
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
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `email`, `password`) VALUES
(16, 'hansani', 'jayamannanirasha7@gmail.com', '567'),
(17, 'hansani', 'jayamananirasha8@gmail.com', 'nira'),
(18, 'Jayami', 'jayami6@gmail.com', 'jayami'),
(19, 'Admin', 'jayamannanirasha8@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `itemID` int(5) NOT NULL,
  `itemName` varchar(40) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `Price` varchar(20) DEFAULT NULL,
  `imageURL` varchar(40) DEFAULT NULL,
  `featured` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`itemID`, `itemName`, `description`, `Price`, `imageURL`, `featured`) VALUES
(6, 'Fish Kottu', 'Fish kottu is a variation of the popular Sri Lankan street food dish kottu roti, where fish is used as the main protein source. The dish combines <br>\r\n                                        chopped roti (a type of flatbread) with stir-fried fish, vegetables, eggs, and a variety of spices and sauces. Fish kottu is a flavorful and hearty<br> \r\n                                        dish that is often enjoyed as a main course for lunch or dinner.', '300', 'fish-kottu.jpg', 'yes'),
(8, 'Vegitable Kottu', 'A spicy one-dish vegetarian dinner with curry flavors.\r\n                                      Vegetable kottu roti is traditional Sri Lankan street food.<br><br>\r\n                                      Prep Time:- 45 mins<br>\r\n                                      Cook Time:- 20 mins<br>\r\n                                      Total Time:-1 hr 5 mins<br>\r\n                                      Servings:- 4<br>\r\n                                      Yield:-4 servings\r\n                                     ', '300', 'Food_name2310.jpg', 'yes'),
(9, 'Chiken Kottu', 'Chicken kottu is a popular Sri Lankan street food dish. It is a savory, flavorful dish that combines\r\n                                        chopped roti (a type of flatbread similar to Indian paratha) with stir-fried chicken, vegetables, eggs,<br>\r\n                                        and a variety of spices and sauces. It is a hearty and filling dish often enjoyed as a main course for \r\n                                        lunch or dinner.<br><br>\r\n                                        Prep Time:- 45 mins<br>\r\n                                        Cook Time:- 20 mins<br>\r\n                                        Total Time:-1 hr 5 mins<br>\r\n                                        Servings:- 4<br>\r\n                                        Yield:-4 servings', '400', 'photo0jpg.jpg', 'yes'),
(10, 'Egg Kottu', 'Koththu is made with egg and spices with parata, which \r\n                                        is cut into small pieces and mixed with carrot and spring onion.<br><br>\r\n                                        Allergic advice: Our food may contain common allergens such as nuts,\r\n                                        dairy, gluten, shellfish, and more. To ensure your safety, always verify<br>\r\n                                        the ingredients in each dish and inform the restaurant staff about your \r\n                                        specific allergies or dietary restrictions. Taking these precautions will<br> \r\n                                        help you enjoy your meal without any adverse reactions.Speak to a staff member\r\n                                        from our restaurant to know more about allergen-safe options.<br><br>\r\n                                        Prep Time:- 45 mins<br>\r\n                                        Cook Time:- 20 mins<br>\r\n                                        Total Time:-1 hr 5 mins<br>\r\n                                        Servings:- 4<br>\r\n                                        Yield:-4 servings', '300', 'egg-kottu.jpeg', 'yes'),
(11, 'Dolphin Kottu', 'Dolphin kottu is not related to the marine mammal, dolphin; instead, the name refers to a type of meat used in the dish. In Sri Lanka, \"dolphin\"<br> \r\n                                        is a colloquial term for cuttlefish, a type of seafood similar to squid. Dolphin kottu combines cuttlefish with kottu roti, vegetables, spices, and\r\n                                         sauces to create a flavorful and hearty dish.', '450', 'dolphin_kottu.jpeg', 'yes'),
(12, 'Chess Kottu', 'Chess kottu is a unique twist on the traditional Sri Lankan kottu roti dish. In this variation, instead of using a flatbread\r\n                                        such as roti or rice flour noodles<br> such as string hoppers, the dish features fried potatoes as the base ingredient. <br><br>\r\n                                        Prep Time:- 1 hr<br>\r\n                                        Cook Time:- 20 mins<br>\r\n                                        Total Time:-1 hr 20 mins<br>\r\n                                        Servings:- 4 <br>\r\n                                        Yield:-4 servings', '450', 'images1.jpeg', 'yes'),
(13, 'Sea Food Kottu', 'Seafood kottu is a variation of the popular Sri Lankan street food dish kottu roti, featuring a mix of seafood such as shrimp, <br>\r\n                                        fish, cuttlefish, or squid, combined with chopped roti (a type of flatbread), vegetables, eggs, and a variety of spices and sauces.<br> \r\n                                        This dish offers a rich, savory, and satisfying meal with a variety of flavors and textures.<br><br>', '500', 'maxresdefault.jpg', 'yes'),
(14, 'Roasted Chicken Kottu', 'Roasted chicken kottu is a Sri Lankan street food dish that combines chopped roti (a type of flatbread) with roasted chicken,<br>\r\n                                        vegetables, eggs, and various spices and sauces. This variation of kottu roti uses roasted chicken as the main protein, adding <br>\r\n                                        depth and flavor to the dish.', '500', 'Rosted-chicken-kottu.png', 'yes'),
(15, 'Kos Kottu', 'Kos kottu\" seems to be a Sri Lankan dish, which is a variation of the popular Sri Lankan street food called \"kottu roti.\" Kottu roti is made from chopped roti (a type of flatbread), mixed with vegetables, eggs, and/or meat, along with spices and sauces, all chopped and mixed together on a griddle. \"Kos\" typically refers to cabbage in Sinhala, so \"kos kottu\" likely includes cabbage as a primary ingredient. .', '250', 'kos_kottu.jpg', 'yes'),
(16, 'String Hoppers Kottu', 'String hoppers kottu, also known as \"Idiyappam kottu,\" is a Sri Lankan dish that combines string hoppers \r\n                                        (thin rice flour noodles) with other ingredients such as vegetables, eggs, and sometimes meat<br> (chicken, beef,\r\n                                         or seafood). It is a variation of the popular street food dish kottu roti but uses string hoppers instead of \r\n                                         roti. ', '350', 'photo0jpg.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(5) NOT NULL,
  `u_name` varchar(40) NOT NULL,
  `u_number` varchar(20) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_address` varchar(50) NOT NULL,
  `total` varchar(10) NOT NULL,
  `method` varchar(20) NOT NULL,
  `time` varchar(40) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `u_name`, `u_number`, `u_email`, `u_address`, `total`, `method`, `time`, `status`) VALUES
(15, 'Jayami ', '0352231124', 'jayami6@gmail.com', 'Galigamuva', '400', 'paypal', '2024-05-07 14:23:08', 'Pending'),
(16, 'Jayami ', '0352231124', 'jayami6@gmail.com', 'Matara', '400', 'paypal', '2024-05-07 14:25:25', 'Pending'),
(17, 'nirasha', '0713122345', 'jayamannanirasha8@gmail.com', 'kegalle', '2700', 'cash on delivery', '2024-05-08 09:26:23', 'Pending'),
(18, 'hiru', '0710441728', 'hirujayamanna@gmail.com', 'Malabe', '1450', 'cash on delivery', '2024-05-08 09:32:53', 'Ordered'),
(19, 'hansani', '0763423421', 'nirashajyamanna311@gmail.com', 'Nelundeniya', '500', 'paypal', '2024-05-10 08:10:53', 'Pending'),
(20, 'nirasha', '0716353164', 'jayamannanirasha8@gmail.com', 'kegalle', '1000', 'cash on delivery', '2024-05-12 08:46:42', 'Pending'),
(21, 'hiru', '0712234556', 'jayamannanirasha@gmail.com', 'Galigamuva', '500', 'credit card', '2024-05-17 09:48:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `userID`) VALUES
('Nirasha', 'Jayamanna', 'jayamannanirasha8@gmail.com', '123', 2),
('Malsha', 'Edirisinha', 'malshaediri@gmail.com', 'mal', 3),
('Nirasha', 'Jayamanna', 'jayamananirasha@gmail.com', '34', 4),
('Nirasha', 'Jayamanna', 'jayamananirasha@gmail.com', '34', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `itemID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
