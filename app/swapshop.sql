-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 04:55 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swapshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `catagory` varchar(32) NOT NULL,
  `price` double NOT NULL,
  `iname` varchar(32) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`catagory`, `price`, `iname`, `img`, `descr`, `contact`, `id`) VALUES
('Animal', 0, 'Brownie', 'https://vetstreet.brightspotcdn.com/dims4/default/d742db0/2147483647/thumbnail/645x380/quality/90/?url=https%3A%2F%2Fvetstreet-brightspot.s3.amazonaws.com%2F98%2Fd98250a0d311e0a2380050568d634f%2Ffile%2FGolden-Retriever-3-645mk062411.jpg', 'Brownie is a golden retriever dog. brownie is female.', 'yazan@ksu.com', 1),
('Car', 70508, 'Used 2016 Audi A7', 'http://2-photos7.motorcar.com/used-2016-audi-a7-4drhatchbackquattro30prestige-10007-16576197-6-1024.jpg', 'Slightly Used. Email me for a meet up.', 'eidan@ksu.com', 2),
('Furniture', 266.99, 'Vintage Dresser', 'https://www.galleryfurniture.com/media/wysiwyg/Category-Images/Media_Chests.jpg', 'New Vintage Bedroom Dresser.', 'saad@ksu.com', 3),
('Plant', 79.95, 'Oak Bonsai', 'https://www.bonsaiempire.com/images/advanced/thor/oak-03.jpg', 'Oak Bonsai That Reflects One\'s age.', 'moba@ksu.com', 4),
('Animal', 0, 'Fofo', 'https://imgix.ranker.com/user_node_img/3386/67703891/original/siberian-freestyle-list-photo-u1?w=650&q=50&fm=jpg&fit=crop&crop=faces', 'I\'m sad to see Fofo goo. He is the cuddliest kitten ever :(', 'moba@ksu.com', 5),
('Car', 249.99, '1983 Volvo 240', 'https://assets.volvocars.com/intl/~/media/shared-assets/images/galleries/inside/our-company/heritage/heritage-models/33_volvo_240_thumb.jpg?w=800', 'This right here station wagon is a family jewel. I had to sell it so I can move in.', 'saad@ksu.com', 6),
('Car', 69999.99, '2017 Tesla Model S 60', 'http://i.ebayimg.com/00/s/MTIwMFgxNjAw/z/FaoAAOSwo41ZeAPe/$_57.JPG?set_id=8800005007', 'Refurbished. Email me for further details.', 'yazan@ksu.com', 7),
('Plant', 135, 'Yin Yang Ginseng Trees', 'http://www.ikea.com/PIAimages/0213705_PE369263_S5.JPG', 'Japanese Ginseng trees in the image of the Yin Yang Symbolism', 'yazan@ksu.com', 8),
('Animal', 0, 'Bernard', 'https://i.pinimg.com/736x/75/e9/7d/75e97d377a40ff05f16eace1cf68b478--quokka-page.jpg', 'Bernard is a Quokka. Quokkas are native to Australia. He was in a shelter but he was rescued and now he is up for adoption.', 'saad@ksu.com', 9),
('Furniture', 449.99, 'White Modern Bookshelf', 'https://i.pinimg.com/736x/6a/1a/8e/6a1a8e215346df47e7e3f44c7b3c4603--modern-bookcase-large-bookcase.jpg', 'White Modern Bookshelf with wooden inner lining', 'yazan@ksu.com', 10),
('Plant', 24.99, 'Potted Cactus', 'https://images-na.ssl-images-amazon.com/images/I/41R2KDMRrXL.jpg', 'Potted Cactus from the local flower shop.', 'eidan@ksu.com', 11),
('Car', 49999, '2017 Tesla Model X', 'http://www.trbimg.com/img-58ac5d5e/turbine/sc-tesla-model-x-autoreview-0202', 'Tesla Model X that was rejected from export. Resell.', 'moba@ksu.com', 12),
('Furniture', 0, 'TARVA single bed', 'http://www.ikea.com/gb/en/images/products/tarva-bed-frame-pine-lur%C3%B6y__0448696_pe598331_s5.jpg', 'Ikea TARVA single been wooden pre installed', 'eidan@ksu.com', 13),
('Animal', 0, 'Peach', 'https://i.pinimg.com/736x/ce/63/03/ce6303943802d729b46ac2889ca927e6--turtle-baby-pet-turtle.jpg', 'Peach is a pet sea turtle for adoption', 'eidan@ksu.com', 14),
('Plant', 15, 'Potted Aloe Vera', 'https://images.homedepot-static.com/productImages/a3406ed8-0d2a-427d-b7ea-80cdc5502454/svn/delray-plants-house-plants-90408-64_1000.jpg', 'Cheap Potted Aloe Vera', 'moba@ksu.com', 15);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(9) NOT NULL,
  `iname` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `iname`, `email`) VALUES
(1, 'qoukka', 'yazan@ksu.com'),
(2, 'audi', 'yazan@ksu.com'),
(3, 'bonsai', 'yazan@ksu.com'),
(4, 'ginseng', 'moba@ksu.com'),
(5, 'volvo', 'moba@ksu.com'),
(6, 'bed', 'moba@ksu.com'),
(7, 'kitten', 'saad@ksu.com'),
(8, 'tesla', 'saad@ksu.com'),
(9, 'cactus', 'saad@ksu.com\r\n'),
(10, 'bookshelf', 'eidan@ksu.com'),
(11, 'aloe', 'eidan@ksu.com'),
(12, 'dog', 'eidan@ksu.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fName` varchar(32) NOT NULL,
  `lName` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Pass` varchar(16) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fName`, `lName`, `Email`, `Pass`, `Username`, `id`) VALUES
('Yazan', 'AL-Baiz', 'yazan@ksu.com', 'yazan', 'yaz97', 1),
('Mohammed', 'Bahamdain', 'moba@ksu.com', 'mohammed', 'mo436', 2),
('Saad', 'AL-Dawsari', 'saad@ksu.com', 'saad', 'McRide', 3),
('Mohammed', 'AL-Eidan', 'eidan@ksu.com', 'eidan', 'MoEid', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
