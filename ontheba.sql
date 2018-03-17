-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2016 at 05:21 AM
-- Server version: 5.5.28
-- PHP Version: 5.3.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `58102010822`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `mem_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `username`, `password`, `role`, `firstname`, `lastname`, `email`, `address`) VALUES
(0001, 'Aoi', 'aoispassword', 'admin', 'A', 'oi', 'aoi@admin.com', 'bkk'),
(0002, 'Bo', '11111', 'admin', 'Bo', 'Bi', 'bo@Suvarnabhumi.com', 'Lat Krabang Thailand'),
(0003, 'yuan', '21', 'admin', 'Yuan', 'Daisy', 'yuan@daisy.com', 'daisy lavender Nakornphathom');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `order_menu` text NOT NULL,
  `order_price` double NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_address` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `order_status` enum('Cooking','On the way','Paid') NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `menuDetail` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `type` enum('THE BREAKFAST','THE LUNCH','THE SALADS','THE SIDES') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `menuDetail`, `image`, `price`, `type`) VALUES
(001, 'THE BREAKFAST SANDWICH', 'Fried Egg, Bacon, Cheddar, Bacon Jam, Brioche Bun', 'breakfast01.jpg', 109, 'THE BREAKFAST'),
(002, 'THE BREAKFAST BURRITO', 'Scrambled Egg, Pulled Pork, Bacon, Avocado, Cheddar, Momma Lil’s Peppers\r\n\r\n', 'breakfast02.jpg', 85, 'THE BREAKFAST'),
(003, 'THE BREAKFAST BOWL', 'Scrambled Eggs, Pulled Pork, Chopped Bacon, Cheddar Cheese, Avocado', 'breakfast03.jpg', 159, 'THE BREAKFAST'),
(004, 'THE BREAKFAST TACO', 'Scrambled Egg, Chopped Bacon, Avocado, Banana Pepper, Cheddar Cheese, Hot Sauce, Corn Tortilla', 'breakfast04.jpg', 129, 'THE BREAKFAST'),
(005, 'THE NEW YORKER B.E.C.', 'Bacon, Egg, Cheese, Soft Kaiser Roll', 'breakfast05.jpg', 147, 'THE BREAKFAST'),
(006, 'THE ALMOST VEGGIE SANDWICH', 'Fried Egg, Broccoli Rabé, Roasted Red Peppers, Bacon, Provolone, Sriracha Aioli, Rustic Ciabatta', 'breakfast06.jpg', 89, 'THE BREAKFAST'),
(007, 'THE BACON SWISS CROISSANT', 'Bacon, Swiss', 'breakfast07.jpg', 99, 'THE BREAKFAST'),
(008, 'THE PARFAIT', 'Homemade Granola, Organic Yogurt, Fresh Fruit', 'breakfast08.jpg', 55, 'THE BREAKFAST'),
(009, 'SCONES, MUFFINS & CROISSANTS', 'House baked', 'breakfast09.jpg', 78, 'THE BREAKFAST'),
(010, 'THE  BACON DOUBLE CHEESE BURGER', 'All Natural Angus Beef, Bacon, Caramelized Onions, Secret Sauce, Cheddar, Brioche Bun', 'lunch01.jpg', 105, 'THE LUNCH'),
(011, 'THE BACON FRIED CHICKEN SANDWICH', 'Panko & Bacon Encrusted Chicken Breast, Bacon, Cole Slaw, Bacon Mayo, Brioche Bun', 'lunch02.jpg', 99, 'THE LUNCH'),
(012, 'THE BACON GRILLED CHEESE', 'Bacon, Cheddar, Bacon Jam, Texas Toast', 'lunch03.jpg', 109, 'THE LUNCH'),
(013, 'THE CUBAN', 'Pork Shoulder, Pork Belly, Bacon, Ham, Swiss Cheese, Spicy Brown Mustard, Pickled Sweet Peppers, Pickles, Rustic Ciabatta', 'lunch04.jpg', 99, 'THE LUNCH'),
(014, 'THE BAHN MI', 'Pork & Bacon Patties, Pickled Veggies, Cilantro, Spicy Mayo, Rustic Ciabatta', 'lunch05.jpg', 129, 'THE LUNCH'),
(015, 'THE CALIFORNIA BACON BBQ BURRITO', 'Pulled Pork, Crispy Belly, Bacon, French Fries, Cole Slaw, BBQ Sauce', 'lunch06.jpg', 199, 'THE LUNCH'),
(016, 'THE TUNA SALAD SANDWICH', 'Lettuce, Tomato, Bacon, Mayo, Texas Toast', 'lunch07.jpg', 109, 'THE LUNCH'),
(017, 'THE LGBT', 'Little Gem Lettuce, Goat Cheese, Bacon, Tomato, Rustic Ciabatta', 'lunch10.jpg', 229, 'THE LUNCH'),
(018, 'THE GRILLED CHICKEN SANDWICH', 'Provolone Cheese,  Bacon, Lettuce, Tomato, Bacon Mayo, Avocado, Rustic Ciabatta', 'lunch09.jpg', 89, 'THE LUNCH'),
(019, 'THE COBB SALAD', 'Mixed Greens, Belly, Bacon, Pork Shoulder, Avocado, Fried Egg, Bleu Cheese Vinaigrette', 'salad01.jpg', 125, 'THE SALADS'),
(020, 'THE ARUGULA CHICKEN SALAD', 'Grilled or Fried Chicken, Avocado, Parmesan Cheese, Homemade Bacon Bits, Citrus Dressing', 'salad02.jpg', 85, 'THE SALADS'),
(021, 'THE MIXED GREEN SALAD', 'Grilled or Fried Chicken, Carrots, Tomato, Avocado, Bacon, Hard-Boiled Egg, Tomato Vinaigrette', 'salad03.jpg', 67, 'THE SALADS'),
(022, 'THE FRIES', 'Fresh Herbs, Parmesan', 'side01.jpg', 58, 'THE SIDES'),
(023, 'THE PORKY FRIES', 'Pork Shoulder, Belly, Bacon, Mama Lil’s Peppers', 'side02.jpg', 57, 'THE SIDES'),
(024, 'MAC & CHEESE BALLS', 'Order of 5, Served with Sriracha Dipping Sauce', 'side03.jpg', 79, 'THE SIDES'),
(025, 'THE CHICHARRÓNES', 'Pork Rinds, Paprika, Chili Powder, Bacon Dust', 'side05.jpg', 87, 'THE SIDES');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
