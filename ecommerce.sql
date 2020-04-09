-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2020 at 09:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `ID` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `checkoutStatus` int(11) NOT NULL DEFAULT 0,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`ID`, `order_date`, `checkoutStatus`, `userID`) VALUES
(4, '2020-04-08', 0, 4),
(5, '2020-04-08', 0, 5),
(6, '2020-04-08', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Orderrows`
--

CREATE TABLE `Orderrows` (
  `ID` int(11) NOT NULL,
  `productAmount` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orderrows`
--

INSERT INTO `Orderrows` (`ID`, `productAmount`, `totalPrice`, `productID`, `cartID`) VALUES
(6, 1, 100, 1, 4),
(7, 4, 400, 1, 5),
(9, 3, 360, 2, 6),
(10, 3, 450, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stockAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ID`, `productName`, `price`, `stockAmount`) VALUES
(1, 'product1', 100, 20),
(2, 'nyttnamn', 120, 20),
(3, 'produkt', 150, 20),
(4, 'produkt3', 150, 20),
(5, 'produktny', 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Tokens`
--

CREATE TABLE `Tokens` (
  `ID` int(11) NOT NULL,
  `date_updated` int(10) NOT NULL,
  `token` text NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tokens`
--

INSERT INTO `Tokens` (`ID`, `date_updated`, `token`, `userID`) VALUES
(1, 1585163881, '650060ab2213c0d6a8b796b405044a18', 2),
(2, 1585214366, '81ae15f916c43b9fed34f76f6c9e5c9d', 2),
(3, 1585215585, 'd22b1b7008753121c50c22fc1e7fee60', 2),
(4, 1585658665, '976198fa7d2fc0895787c0558104e6f1', 2),
(5, 1585751281, '819f2a6ef4be4ae0389a9b4e1171a1fb', 2),
(6, 1585752001, '763a4f8fc7bad26567c36bd13c54ab6f', 2),
(7, 1585752080, 'be974d2dc9b9dcfc8dc808b0c2ec2632', 2),
(8, 1585761097, '404648047b4304906c44c933cd7ddb5e', 2),
(9, 1585817170, 'c7c3bea54729cc459f862cb58811439f', 2),
(10, 1585817215, '97c4750ba7bc6a29d805efac0ce1e59a', 2),
(11, 1585817428, '3a5c5c5061200f138ddb109749eeb09e', 2),
(12, 1585817519, '824835cea61860ecc8692fe2ff3b4f51', 2),
(13, 1585817786, '5ff8da6a80e20eb4dab9655fbd872f36', 2),
(14, 1585817936, '6eb04979f363d159eeef1f8608575c8b', 2),
(15, 1585818315, '83bda42cac27f1c4c65ee390f5c4411a', 2),
(16, 1585818667, '7deee3597b43094f6c8e43ef6c90a2e4', 2),
(17, 1585818965, 'f2fef2b9003686aa960638364742e151', 2),
(18, 1585819383, '2a8a0149cb35a16a0c2851c4f0bca13e', 2),
(19, 1585820652, '58b96f1aed4028566278c4c12125c2eb', 2),
(20, 1585821694, 'e788aee28d995b3c6af53262da1e28d1', 2),
(21, 1585822836, '386052f991f69242c82a0c1b30348ff6', 2),
(22, 1585914236, 'd2468f99ec354396a27722b6b256b315', 2),
(23, 1585914417, 'ffca8af47dfbb4859e56bc13baf546c5', 2),
(24, 1585916605, 'd09cf881d9350abf695e3d63147fc8b3', 2),
(25, 1586020523, 'a5d2c3ba65992849ac4c04878853c21a', 2),
(26, 1586020583, '3986673e46ace75f204e4b6be5f95d07', 2),
(27, 1586022059, '9832bc1bcf207cc6fb51aaf4ba5c5609', 2),
(28, 1586022477, '3bc39a2ca0bbe74cc5eb5ef32c049676', 2),
(29, 1586022656, '6b08b1a74100d52b7edc47b68118feb7', 2),
(30, 1586022985, '5016f39cd8cd23b9e9b05d0d5b399bf9', 2),
(31, 1586023230, '5588188ae3a5499e85fb248984586bc0', 2),
(32, 1586031574, 'cdcb6c77b67a035df0d42709cd228c97', 2),
(33, 1586031632, '942f77a6ff92aad570885c7974a954a4', 2),
(34, 1586031833, '7beace36292db4707b380155c6c3d8a5', 2),
(35, 1586032800, '76461361791c3af6ee902d2f61ecf44d', 2),
(36, 1586158244, '441bb45b415e9c35e7fcb048b133f5ce', 2),
(37, 1586158267, 'c1b848e10311f5e5750b68813c14ce7e', 2),
(38, 1586158417, '6313b23976c2e379d71591b621c7e997', 2),
(39, 1586159231, '45d9e5789baac656ac5c7a45eb615eed', 2),
(40, 1586159736, '2dfb1185a43cfe6d0748f5479ef1989b', 2),
(41, 1586160584, 'd5ee9df0a7b3c6dac8110094321414ca', 2),
(42, 1586160774, 'd91035e288e3f2244ac0ef49524c3d4f', 2),
(43, 1586161429, '90b370cabffa4015affa470716401faa', 2),
(44, 1586161749, 'dec4c640bf39bf760904d9294c21cfdd', 2),
(45, 1586162169, 'db63d926d03703b95715ca3984d37708', 2),
(46, 1586162290, '73cc6ba5c4d694c98cd5dbbd31733101', 2),
(47, 1586162565, '1429956a94aa5d7b97f7d0e889655cad', 2),
(48, 1586163069, 'a2fa72d954e937a48d17962d62348952', 2),
(49, 1586164158, '4b5abf5fe6b90ed4cc3d99e7b926f8f7', 2),
(50, 1586164475, 'b8d02de0576928639cce8a922ace5810', 2),
(51, 1586164632, 'dc1181b2a085ac51d0cc4557df92964e', 2),
(52, 1586164966, 'df36b28974db02599e07bb51d562d1c3', 2),
(53, 1586165780, 'f4c0eff0e7b70cf8e2665e1a59ba8b87', 2),
(54, 1586166296, '2fcf79501a3c6c923a2fb43f75d688fb', 2),
(55, 1586166967, '87ae46c7a63d1de87522b3b0de38c6eb', 2),
(56, 1586167441, 'd059810a35113a00c6ecc4cf0b85f2d8', 2),
(57, 1586167750, 'e18db3ec87eb6a46c5c5c7418c8cb493', 2),
(58, 1586167818, 'a2e367f4a11c5939436e8a6f26fc1979', 2),
(59, 1586167958, '5e9419b75ef7f55ae4be4ff9e4a3b04e', 2),
(60, 1586168724, '6cfd736dfe1c0f03c70493d6ec32121b', 2),
(61, 1586169183, '866e3aee53c4b5d4430f987f8aebd3e7', 4),
(62, 1586169385, '1ee096a997b4718e600e1225a0fb86b2', 4),
(63, 1586169434, '169a95963fa37e6a0f05de296cb055d1', 4),
(64, 1586169510, 'a7a201f7d764c08db05a4048806c4810', 4),
(65, 1586169982, 'f29776e0e777166ee9bfbc005cc7acc7', 2),
(66, 1586249486, '0c81900310f68520988f44ff067a2d5c', 2),
(67, 1586251768, 'e4ca66f52f1f2eda0b607b8afb4f1db4', 2),
(68, 1586255032, '9b6dff474f982c51a193a1f1c16dfd7e', 2),
(69, 1586255189, '63489918935fe6475cc0eb6794acbe54', 2),
(70, 1586256404, '61777d432c72939335d00636b556422a', 2),
(71, 1586256623, '0848d3b6ad4d581fdf9217315c27bb08', 2),
(72, 1586256873, '2578f0901cf240052e3b3f76e271cc5b', 2),
(73, 1586256936, '976a9d8e00bdbc8a0d3eaecb448b9e1f', 2),
(74, 1586257102, 'c702aea32fb9a50571349ba5b4d82d82', 2),
(75, 1586257239, '51ec57e31f1a50e4f8dcd9d565e28e0a', 2),
(76, 1586259197, '78b3f2073e5db1aeed3cc5bfa9b3bbc9', 2),
(77, 1586264338, 'b00d010a79327bccca5b97fb69c2bbbd', 2),
(78, 1586264655, '9e60e1621f8f3ec84c0beadcaa3c4a01', 2),
(79, 1586265347, '621d8379f43917fdbde5074cb66a7048', 2),
(80, 1586272686, 'a258e40a2e2ccddc69c463cdc215d5d9', 2),
(81, 1586325434, '58c061abafdafcb0f78524349b7d47ce', 2),
(82, 1586325895, 'a02b8c05f3c42a06ed82a9084b790d03', 2),
(83, 1586327115, 'df443b34364855511588aa16ffcaca3b', 2),
(84, 1586327593, '90b3c6e2b79719f7e93d2e1fc0a93c20', 2),
(85, 1586328336, 'bfb21c1d1384a3d82a646efeb75a5337', 4),
(86, 1586328558, 'd4337cab13320ca4dd86e3e61a4bd70b', 4),
(87, 1586328754, '5d0615274f9da1f434a7a43deac0545b', 4),
(88, 1586328887, '8ad17f037c9bc2af12d5f5027bd56130', 4),
(89, 1586329351, 'b8ce953183e5ba072e403d6b6b919365', 5),
(90, 1586329959, '1167abeecd9165d5a22cc9a7b847ea89', 5),
(91, 1586330523, '609594f88a42919f23d2bbef14ac2a77', 2),
(92, 1586330840, '1f6e661511b9d0d4710294babb26ef74', 2),
(93, 1586333687, '9e22d5206e9c525aaca91f2fd4e3aa1f', 2),
(94, 1586352475, '369ce1cd5ab39dc4a053d02c53da6031', 2),
(95, 1586355234, '21b69296816ef9d48a248643c2d9c823', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `email`, `username`, `password`, `role`) VALUES
(2, 'jake@jakes.se', 'jake', '1200cf8ad328a60559cf5e7c5f46ee6d', 1),
(4, 'pelle@gmail.com', 'pelle', '5574331fd0ffcb0a268e59f8c5a0cc5d', 0),
(5, 'kristin@gmail.com', 'kristin', '4be7b6b03d32793f43bca05e6ba0c4f6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Orderrows`
--
ALTER TABLE `Orderrows`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`cartID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Tokens`
--
ALTER TABLE `Tokens`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Orderrows`
--
ALTER TABLE `Orderrows`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Tokens`
--
ALTER TABLE `Tokens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `Orderrows`
--
ALTER TABLE `Orderrows`
  ADD CONSTRAINT `Orderrows_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `Products` (`ID`),
  ADD CONSTRAINT `Orderrows_ibfk_2` FOREIGN KEY (`cartID`) REFERENCES `Cart` (`ID`);

--
-- Constraints for table `Tokens`
--
ALTER TABLE `Tokens`
  ADD CONSTRAINT `Tokens_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
