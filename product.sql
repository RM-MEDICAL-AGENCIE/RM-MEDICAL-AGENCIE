-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 04:17 PM
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
-- Database: `cart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(13) NOT NULL,
  `product name` varchar(100) NOT NULL,
  `product price` varchar(50) NOT NULL,
  `product image` varchar(255) NOT NULL,
  `product code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product name`, `product price`, `product image`, `product code`) VALUES
(1, 'AMBRODRYL-LS', '148', 'shopping_cart/images/ambrodryl-ls.jpeg', 'p111'),
(2, 'BENZYDAMINE', '320', 'images/Benzydamine.jpeg', 'p118'),
(3, 'BLEOMYCIN-INJECTION-USP-15-IU', '550', 'images/bleomycin-injection-usp-15-iu.jpg', 'p119'),
(4, 'PARAVAL\r\n500.jpeg', '45', 'shopping_cart/images/PARAVAL%20-500.jpeg', 'p112'),
(5, 'AZITHRO-250 MG', '70', 'shopping_cart/images/AZITHRO-250%20MG.jpeg', 'p113'),
(6, 'Surgical Glubs', '700', 'shopping_cart/images/SURGICAL%20GLUBS.jpeg', 'p114'),
(7, 'ACECLOFENAC&PARACETAMOL', '8', 'IMAGE/ACECLOFENAC%20&%20PARACETAMOL.jpg', 'p115'),
(8, 'Alendronate tab. 5mg,35mg', '125', 'IMAGE/Alendronate%20tab.%205mg,35mg.jpeg', 'p116'),
(9, 'AMPRICILLIN-TABLETS-1000-MG', '555', 'shopping_cart/images/Ampicillin-tablets-1000-mg.jpeg', 'p117'),
(10, 'BLOOD-PRESSURE-MONITER', '1,100', 'images/Blood-Pressure-Monitor.jpeg', 'p120'),
(11, 'BRUFEN 200 MG', '120', 'images/BRUFEN%20200%20MG.jpg', 'p121'),
(12, 'CANESTEM CREAM', '94.20', 'images/CANESTEM%20CREAM.jpeg', 'P122'),
(13, 'cefixime 200mg', '1000', 'images/CEFIXIME%20200%20MG.jpeg', 'p123'),
(14, 'cipmox 250', '410', 'images/CIPMOX%20250.jpeg', 'p124'),
(15, 'CLINIP M-50 TABLET', '113', 'IMAGE/CLINIP%20M-50%20TABLET.jpeg', 'p125'),
(16, 'Dextran-colloid\r\n', '180', 'IMAGE/Dextran-colloid.jpeg', 'p126'),
(17, 'During-peritoneal\r\n', '90', 'IMAGE/During-peritoneal.jpeg\r\n', 'p127'),
(18, 'Ear Thermometer\r\n', '1499', 'IMAGE/Ear%20Thermometer.jpeg\r\n', 'p128'),
(19, 'Elastocrepe bandage 7.5 cm\r\n', '285', 'IMAGE/Elastocrepe%20bandage%207.5%20cm.jpeg\r\n', 'p128'),
(20, 'First-Aid-Kit\r\n', '1899', 'IMAGE/First-Aid-Kit.jpeg\r\n', 'p129'),
(21, 'GAUZE PADS\r\n', '4500', 'IMAGE/GAUZE%20PADS.jpeg\r\n', 'p130'),
(22, 'henylephrine+CPM+PCM\r\n', '158', 'IMAGE/henylephrine+CPM+PCM.jpeg\r\n', 'p131'),
(23, 'hydralazine-tablets-25MG\r\n', '200', 'IMAGE/hydralazine-tablets-25MG.jpg\r\n', 'p132'),
(24, 'Hydrocortisone ointment 1%\r\n', '115', 'IMAGE/Hydrocortisone%20ointment%201%25.jpeg\r\n', 'p133'),
(25, 'KETOVAG SOAP\r\n', '125', 'IMAGE/KETOVAG%20SOAP.jpeg\r\n', 'p134'),
(26, 'KIT-KAT\r\n', '800', 'IMAGE/KIT-KAT.jpeg\r\n', 'p135'),
(27, 'Lamivudine tablet\r\n', '610', 'IMAGE/Lamivudine%20tablet.jpeg\r\n', 'p136'),
(28, 'LEVOCEF M\r\n', '102', 'IMAGE/LEVOCEF%20M.jpeg\r\n', 'p137'),
(29, 'magnesium sulphate Inj 50%\r\n', '6.00', 'IMAGE/magnesium%20sulphate%20Inj%2050%25.jpeg\r\n', 'p138'),
(30, 'Meropenem-injection-1GM\r\n', '1089', 'IMAGE/Meropenem-injection-1GM.jpeg\r\n', 'p138'),
(31, 'METFORM-500\r\n', '45', 'IMAGE/METFORM-500.jpeg\r\n', 'p138'),
(32, 'multivitamin\r\n', '90', 'IMAGE/multivitamin.jpg\r\n', 'p139'),
(33, 'Mycophenolate mofetil\r\n', '785', 'IMAGE/Mycophenolate%20mofetil.jpeg\r\n', 'p140'),
(34, 'Nifedipine tablet 5mg\r\n', '120', 'IMAGE/Nifedipine%20tablet%205mg.jpeg\r\n', 'p141'),
(35, 'Omeprazole capsule 40 mg\r\n', '13', 'IMAGE/Omeprazole%20capsule%2040%20mg.jpeg\r\n', 'p142'),
(36, 'PANTAFOL-40 MG\r\n', '68', 'IMAGE/PANTAFOL-40%20MG.jpeg\r\n', 'p143'),
(37, 'PANTAPROZOLE 40 MG\r\n', '80', 'IMAGE/PANTAPROZOLE%2040%20MG.jpeg\r\n', 'p144'),
(38, 'PANTAPROZOLE DSR\r\n', '110', 'IMAGE/PANTAPROZOLE%20DSR.jpg\r\n', 'p145'),
(39, 'RABICIP 20 MG\r\n', '192', 'IMAGE/RABICIP%2020%20MG.jpeg\r\n', 'p146'),
(40, 'romsons-oximeter-oxee-check\r\n', '1699', 'IMAGE/romsons-oximeter-oxee-check.jpg\r\n', 'p147'),
(41, 'Salbutamol theophylline tablet\r\n', '20', 'IMAGE/Salbutamol%20theophylline%20tablet.jpeg\r\n', 'p148'),
(42, 'STETHOSCOPE\r\n', '299', 'IMAGE/STETHOSCOPE.jpeg\r\n', '149'),
(43, 'TORSIVAC 5 TABLET\r\n', '85', 'IMAGE/TORSIVAC%205%20TABLET.jpeg\r\n', 'p150'),
(44, 'TRUGUT\r\n', '1650', 'IMAGE/TRUGUT.jpeg\r\n', 'p151'),
(45, 'vitamin-A-capsules-25000\r\n', '800', 'IMAGE/vitamin-A-capsules-25000.jpeg\r\n', 'p152');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
