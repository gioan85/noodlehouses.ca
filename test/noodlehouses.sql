-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2015 at 10:51 AM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `noodlehouses`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `ID` int(1) NOT NULL AUTO_INCREMENT,
  `USER` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `USER`, `PASSWORD`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUSTOMER` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PHONE` text COLLATE utf8_bin NOT NULL,
  `ADDRESS` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FOODS` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PRICE` float NOT NULL,
  `DATE` datetime DEFAULT NULL,
  `STATUS` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=89 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID`, `CUSTOMER`, `PHONE`, `ADDRESS`, `FOODS`, `DESCRIPTION`, `PRICE`, `DATE`, `STATUS`) VALUES
(67, 'tri', '1231231231', '', '                                                <div>1. GOAT HOT POT</div><div>15.50</div><div>2. CRAP SOUP</div><div>3.50</div><div>3. LEMONGRASS CLAM</div><div>6.00</div>', 'pick up after 30 minutes<br>Note: asodjia siodj<br>Note 2:', 28.25, '2014-11-25 12:57:21', 3),
(68, 'uppal', '6472480949', '', '                                                <div>T3. SPICY GOLDEN CURRY (Com xao lan)<br>D) Tiger Shrimp</div><div>11.50</div><div>G9. Grilled Beef and Grilled Chicken<br>Com Suon va Ga nuong</div><div>8.50</div>', 'pick up at 18:30<br>Note: coupon code 39-3022-3339<br>Note 2:coupon code 39-3022-3339', 22.6, '2014-11-27 17:09:07', 1),
(69, 'cuti', '53425368172', '123ia phu pho tang 16', '                                                <div>4. BEEF PASTA</div><div>9.50</div><div>4. BEEF PASTA</div><div>9.50</div><div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>B) Chicken</div><div>10.00</div><div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>A) Tofu and Vegetable</div><div>9.50</div>', 'delivery M8W<br>Note: <br>Note 2:', 43.5, '2014-11-27 18:15:56', 3),
(70, 'Slavek', '4164710023', '', '                                                <div>Zz4. *Sizzling Seafood with Vegetables (Hai san xao tren dia nong) </div><div>12.50</div><div>F7. *CANTONESE CHOW MEIN (Mi xao don hoac mem)<br>E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab </div><div>12.50</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:For pick up', 28.25, '2014-11-28 19:04:17', 1),
(71, 'Alex', '4166663691', '64 FORTY FIRST STREET', '                                                <div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>B) Chicken</div><div>10.00</div>', 'delivery M8W<br>Note: HOUSE<br>Note 2:RED CURRY', 14.3, '2014-11-30 17:29:49', 1),
(72, 'Alex Pham', '4166663691', '64 Forty First Street TOronto ON', '                                                <div>F4. *THAI FRIED RICE (Com chien Thai)<br>C) Beef</div><div>10.00</div><div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>B) Chicken</div><div>10.00</div><div>F9. SHANGHAI NOODLES (Thuong Hai xao)<br>B) Chicken</div><div>10.50</div>', 'delivery M8W<br>Note: Delivery is to a house.<br>Note 2:Thai red curry for T2.', 34.47, '2014-11-30 17:34:42', 1),
(73, 'hieru', '64752145212', '', '                                                <div>G1. Grilled Beef<br>Com Bo</div><div>8.50</div><div>G6. *Grilled Chicken and Fried Egg<br>Com Ga va Op La</div><div>8.00</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:', 21.65, '2014-12-03 14:18:29', 1),
(74, 'ryan thomson', '6472684756', '928 queen st west', '                                                <div>P5. *Rare Beef Rice Noodle Soup<br>Pho tai</div><div>7.50</div><div>P5. *Rare Beef Rice Noodle Soup<br>Pho tai</div><div>7.50</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:', 19.95, '2014-12-26 13:52:06', 1),
(75, 'Alex', '4166663691', '64 FORTY FIRST STREET', '                                                <div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>B) Chicken</div><div>10.00</div><div>F4. *THAI FRIED RICE (Com chien Thai)<br>C) Beef</div><div>10.00</div><div>F11. PAD SEW (Hu tieu xao kieu Thai)<br>B) Chicken</div><div>10.00</div>', 'delivery M8W<br>Note: HOUSE. SOUTH OF LAKESHORE AND EAST OF DIXIE<br>Note 2:RED CURRY', 33.9, '2015-01-12 17:53:37', 1),
(76, 'martin', '4165563604', '', '                                                <div>T1. PAD THAI<br>B) Chicken</div><div>10.00</div><div>A3. *CRISPY CHICKEN SPRING ROLLS (2) (Cha gio ga)</div><div>4.00</div><div>P4. Chicken and Well Done Beef Rice Noodle Soup<br>Pho ga,nam</div><div>7.50</div><div>T4. *BASIL THAI SPICY NOODLE (Hu tieu xao hung que)<br>C) Beef</div><div>10.00</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:', 35.6, '2015-01-13 17:35:23', 1),
(77, 'jhtfjybutfht', '6476080418', '', '                                                ', 'pick up after 30 minutes<br>Note: <br>Note 2:', 0, '2015-01-13 17:51:01', 3),
(78, 'test', '6476081428', '', '                                                <div>A1.  *SIGNATURE  PLATTER  (Äáº·c biá»‡t)</div><div>11.00</div><div>G7. Grilled Pork Chop and Fried Egg<br>Com Suon va Op La</div><div>8.00</div><div>S4. *VEGGIE MANGO SALAD</div><div>6.00</div><div>T1. PAD THAI<br>E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab </div><div>12.50</div><div>T4. *BASIL THAI SPICY NOODLE (Hu tieu xao hung que)<br>A) Tofu and Vegetable</div><div>9.50</div>', 'pick up after 30 minutes<br>Note: No nut for all<br>Note 2:', 53.11, '2015-01-18 17:07:58', 3),
(79, 'kari', '4164769115', '80 port street east suite 408', '                                                <div>A7. TOFU </div><div>4.00</div><div>P5. *Rare Beef Rice Noodle Soup<br>Pho tai</div><div>7.50</div><div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>B) Chicken</div><div>10.00</div><div>F7. *CANTONESE CHOW MEIN (Mi xao don hoac mem)<br>A) Tofu </div><div>9.50</div><div>T1. PAD THAI<br>A) Tofu and Vegetable</div><div>9.50</div>', 'delivery L5G<br>Note: buzz 80390<br>Note 2:- want red chicken curry for T2 -for cantonese chow mein want crispy noodles', 45.77, '2015-01-19 20:07:55', 1),
(80, 'David Thompson', '6472924866', '', '                                                <div>A4. CRISPY VEGETABLE SPRING ROLLS (2) (Cha gio chay)</div><div>4.00</div><div>V2. *Grilled Chicken and Spring Roll<br>Bun Ga va cha gio</div><div>8.50</div><div>V7. Stir Fried Lemon Grass with Beef or Chicken and Spicy Chili<br>Bun bo hoac ga xao xa ot </div><div>9.50</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:For immediate pickup', 24.86, '2015-01-25 19:02:04', 1),
(81, 'Steve', '4164333141', '', '                                                <div>G8. Grilled Pork Chop and Grilled Chicken<br>Com Suon va Ga nuong</div><div>8.50</div><div>SO2. TOM YUM SOUP<br>A) Tofu Vegetable</div><div>6.00</div><div>A3. *CRISPY CHICKEN SPRING ROLLS (2) (Cha gio ga)</div><div>4.00</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:Please add a fried egg to G8', 20.9, '2015-02-06 18:36:17', 1),
(82, 'Kim Montgomery ', '4166664105', '663 Montbeck Cresent', '                                                <div>V3. *Grilled Pork and Spring Roll<br>Bun Thit nuong va cha gio</div><div>8.50</div><div>G1. Grilled Beef<br>Com Bo</div><div>8.50</div><div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>A) Tofu and Vegetable</div><div>9.50</div><div>A4. CRISPY VEGETABLE SPRING ROLLS (2) (Cha gio chay)</div><div>4.00</div>', 'delivery L5G<br>Note: <br>Note 2:', 34.46, '2015-02-08 18:17:31', 1),
(83, 'Paul van camp', '4164769671', 'Suite 408-80 port street east', '                                                <div>A4. CRISPY VEGETABLE SPRING ROLLS (2) (Cha gio chay)</div><div>4.00</div><div>A12. CRISPY TOFU(Tau hu chien)</div><div>6.00</div><div>T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)<br>B) Chicken</div><div>10.00</div><div>F11. PAD SEW (Hu tieu xao kieu Thai)<br>A) Tofu </div><div>9.50</div><div>SO3. COCONUT TOM YUM SOUP<br>C) Shrimp</div><div>7.00</div>', 'delivery L5G<br>Note: Buzz code is 80390Visa  4514 0116 0680 3441Exp 11/16<br>Note 2:Red curry please for t2', 41.25, '2015-02-09 19:48:14', 1),
(84, 'K Montgomery ', '4166664105', '663 Montbeck Cres', '                                                <div>T1. PAD THAI<br>A) Tofu and Vegetable</div><div>9.50</div><div>T1. PAD THAI<br>E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab </div><div>12.50</div><div>F5. â€œNOODLE HOUSEâ€ FRIED RICE (Com chien dac biet)<br>B) Chicken</div><div>10.00</div>', 'delivery L5E<br>Note: Would like to pay by MasterCard. Pls call for number. For the F5 noodle house fried rice. Pls make this item will no egg. Thank you. :)<br>Note 2:Pls make the F5 with no egg. Thanks', 36.16, '2015-02-16 20:23:40', 1),
(85, 'Kim Montgomery', '4166664105', '663 Montbeck Cres', '                                                <div>F2. SPICY BASIL FRIED RICE (Com chien hung que)<br>A) Tofu </div><div>9.50</div><div>F5. â€œNOODLE HOUSEâ€ FRIED RICE (Com chien dac biet)<br>B) Chicken</div><div>10.00</div><div>T1. PAD THAI<br>D) Tiger Shrimp</div><div>11.50</div>', 'delivery L5G<br>Note: Would like to pay by credit card. <br>Note 2:Pls make F5 with no egg. Pls also send extra limes with the Pad Thai.Thank you', 35.03, '2015-03-03 17:58:37', 1),
(86, 'mike', '4162776064', '1257 Lakeshore Road East', '                                                <div>F11. PAD SEW (Hu tieu xao kieu Thai)<br>F12. * SWEET AND SOUR CHICKEN (Ga xao chua ngot)</div><div>10.00</div><div>A8. *CHICKEN SATAY SKEWERS (2)( Ga sa-te)</div><div>5.50</div><div>D3. Mango Sticky Rice</div><div>5.00</div>', 'delivery L5E<br>Note: apartment 1604 buzz number 279<br>Note 2:', 26.17, '2015-03-10 19:38:17', 1),
(87, 'K Montgomery', '4166664105', '663 Montbeck Cres', '                                                <div>F2. SPICY BASIL FRIED RICE (Com chien hung que)<br>A) Tofu </div><div>9.50</div><div>V3. *Grilled Pork and Spring Roll<br>Bun Thit nuong va cha gio</div><div>8.50</div><div>SO3. COCONUT TOM YUM SOUP<br>C) Shrimp</div><div>7.00</div>', 'delivery L5G<br>Note: Would like to pay by MasterCard. Pls call for number. <br>Note 2:If possible, pls make the soup not spicy. Very mild. Thanks.', 31.25, '2015-03-13 16:02:03', 1),
(88, 'hieu', '6476081428', '', '                                                <div>A1.  *SIGNATURE  PLATTER  (Äáº·c biá»‡t)</div><div>11.00</div><div>A2. *CRISPY SHRIMP SPRING ROLLS (2) (Cháº£ giÃ² tÃ´m)</div><div>4.25</div><div>A4. CRISPY VEGETABLE SPRING ROLLS (2) (Cha gio chay)</div><div>4.00</div>', 'pick up after 30 minutes<br>Note: <br>Note 2:', 21.75, '2015-03-16 13:32:56', 3);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MENU` int(11) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`,`MENU`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=255 ;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`ID`, `MENU`, `PRICE`, `NAME`, `DESCRIPTION`) VALUES
(31, 2, '7.50', 'S1. HOUSE MANGO SALAD', '-Shrimp, chicken, fresh shredded mango mixed w/ onions, red/ green peppers and cashews tossed with tamarind vinaigrette\n'),
(30, 2, '7.50', 'S2. SHRIMP MANGO SALAD', '-Shrimp, fresh shredded mango mixed w/ onions, red/ green peppers and cashews tossed with tamarind vinaigrette\n'),
(29, 2, '6.50', 'S3. CHICKEN MANGO SALAD', '-Chicken, fresh shredded mango mixed w/ onions, red/ green peppers and cashews tossed with tamarind vinaigrette\n'),
(32, 2, '6.00', 'S4. *VEGGIE MANGO SALAD', '-Fresh shredded mango mixed w/ onions, red/ green peppers and cashews tossed with tamarind vinaigrette\n'),
(34, 3, '6.00', 'SO1. *WONTON SOUP', '-Chicken and shrimp wontons in chicken broth'),
(35, 3, '0.00', 'SO2. TOM YUM SOUP', ''),
(36, 3, '6.00', 'A) Tofu Vegetable', ''),
(37, 3, '6.50', 'B) Chicken', ''),
(38, 3, '7.00', 'C) Shrimp', ''),
(41, 3, '7.50', 'D) Shrimp and Chicken', ''),
(42, 3, '0.00', 'SO3. COCONUT TOM YUM SOUP', ''),
(43, 3, '6.00', 'A) Tofu Vegetable', ''),
(44, 3, '6.50', 'B) Chicken', ''),
(45, 3, '7.00', 'C) Shrimp', ''),
(46, 3, '7.50', 'D) Shrimp and Chicken', ''),
(48, 3, '8.50', 'SO4. SEAFOOD EGG NOODLE SOUP (Mi hai san)', '-Mixed seafood, egg noodle in chicken broth'),
(49, 3, '7.50', 'SO5. WONTON EGG NOODLE SOUP (Wonton Mi)	', '-Egg noodle, chicken and shrimp wontons in chicken broth'),
(50, 3, '8.50', 'SO6. *THAI STYLE SEAFOOD RICE NOODLE SOUP (Pho Thai)', '-Rice noodle w/ shrimp, calamari, mussels, crab and fish ball'),
(68, 4, '8.50', 'V1. Grilled Beef and Spring Roll<br>Bun Bo va cha gio', ''),
(53, 1, '11.00', 'A1.  *SIGNATURE  PLATTER  (Äáº·c biá»‡t)', '- Crispy shrimp spring roll (1),<br>- Crispy chicken spring roll (1),<br>- Crispy Calamari (4),<br>- Crispy wonton (4), Fresh rolls (2)'),
(54, 1, '4.25', 'A2. *CRISPY SHRIMP SPRING ROLLS (2) (Cháº£ giÃ² tÃ´m)', '-Marinated tiger shrimp and mixed vegetables'),
(55, 1, '4.00', 'A3. *CRISPY CHICKEN SPRING ROLLS (2) (Cha gio ga)', '-Ground chicken and mixed vegetables '),
(56, 1, '4.00', 'A4. CRISPY VEGETABLE SPRING ROLLS (2) (Cha gio chay)', '- Mixed vegetables'),
(57, 1, '4.00', 'A5. *FRESH ROLLS (2) (Goi cuon nem nuong)', '-Rice paper with BBQ grilled pork sausage and vermicelli'),
(58, 1, '4.25', 'A6. SHRIMP ', '-Rice paper with shrimp, pork, vegetables and vermicelli'),
(59, 1, '4.00', 'A7. TOFU ', '-Rice paper with crispy tofu, vegetables and vermicelli'),
(60, 1, '5.50', 'A8. *CHICKEN SATAY SKEWERS (2)( Ga sa-te)', '-Marinated with Thai spices and grilled, served with peanut sauce'),
(61, 1, '6.00', 'A9. SHRIMP SATAY SKEWERS (2) (Tom sa-te)', '-Marinated with Thai spices and grilled, served with peanut sauce'),
(62, 1, '6.00', 'A10. CRISPY TIGER SHRIMPS (5) (Tom chien gion)', '-Crispy breaded tiger shrimps'),
(63, 1, '7.00', 'A11. CRISPY CALAMARI (10) (Muc chien gion)', '-Lightly seasoned crispy calamari'),
(221, 1, '8.50', 'A14. CLAMS WITH BLACK BEAN SAUCE', '-Stir-fried and marinated with house spices'),
(65, 1, '6.00', 'A12. CRISPY TOFU(Tau hu chien)', '-Crispy marinated tofu'),
(220, 1, '6.00', 'A13. CRISPY WONTON', '-Crispy marinated, stuffed chicken/shrimp wontons'),
(69, 8, '0.00', 'T1. PAD THAI', 'Rice noodles in lime juice, tamarind and tomato sauce, eggs, bean sprouts and peanuts'),
(70, 8, '9.50', 'A) Tofu and Vegetable', ''),
(71, 4, '8.50', 'V2. *Grilled Chicken and Spring Roll<br>Bun Ga va cha gio', ''),
(72, 4, '8.50', 'V3. *Grilled Pork and Spring Roll<br>Bun Thit nuong va cha gio', ''),
(73, 4, '8.50', 'V4. Grilled Beef<br>Bun Bo	', ''),
(74, 4, '8.50', 'V5. Grilled Chicken<br>Bun Ga', ''),
(75, 4, '8.50', 'V6. Grilled Pork<br>Bun thit nuong	', ''),
(76, 4, '9.50', 'V7. Stir Fried Lemon Grass with Beef or Chicken and Spicy Chili<br>Bun bo hoac ga xao xa ot ', ''),
(78, 5, '8.50', 'G1. Grilled Beef<br>Com Bo', ''),
(79, 5, '8.50', 'G2. Grilled Chicken<br>Com Ga', ''),
(80, 5, '8.50', 'G3. Grilled Pork Chop<br>Com Suon', ''),
(230, 8, '9.50', 'A) Tofu and Vegetable', ''),
(82, 5, '8.00', 'G4. *Grilled Beef and Fried Egg<br>Com Bo va Op la', ''),
(83, 5, '8.00', 'G5. *Grilled Chicken and Fried Egg<br>Com Ga va Op La', ''),
(84, 5, '8.00', 'G6. Grilled Pork Chop and Fried Egg<br>Com Suon va Op La', ''),
(85, 5, '8.50', 'G7. Grilled Pork Chop and Grilled Chicken<br>Com Suon va Ga nuong', ''),
(86, 5, '8.50', 'G8. Grilled Beef and Grilled Chicken<br>Com Suon va Ga nuong', ''),
(229, 8, '0.00', 'T5. PEANUT CURRY', 'Roasted peanuts, lime leaves and mixed vegetable in Thai spicy curry'),
(89, 6, '7.50', 'P1. *House Special Rice Noodle Soup<br>Pho dac biet', ''),
(90, 6, '7.50', 'P2. House Special Satay Rice Noodle Soup<br>Pho sa-te dac biet', ''),
(91, 6, '7.50', 'P3. *Chicken Rice Noodle Soup<br>Pho ga', ''),
(92, 6, '7.50', 'P4. Chicken and Well Done Beef Rice Noodle Soup<br>Pho ga,nam', ''),
(93, 6, '7.50', 'P5. *Rare Beef Rice Noodle Soup<br>Pho tai', ''),
(94, 6, '7.50', 'P6. Rare Beef and Well Done Beef Rice Noodle Soup<br>Pho tai,nam', ''),
(95, 6, '7.50', 'P7. Rare Beef and Tripe Rice Noodle Soup<br> Pho tai, xach', ''),
(96, 6, '7.50', 'P8. Rare Beef and Beef Balls Rice Noodle Soup<br>Pho tai, bo vien', ''),
(97, 6, '7.50', 'P9. Well Done Beef Rice Noodle Soup<br>Pho nam', ''),
(98, 6, '7.50', 'P10. *Well Done Beef and Tripe Rice Noodle Soup<br>Pho nam, xach', ''),
(99, 6, '7.50', 'P11. Well Done Beef and Beef Balls Rice Noodle Soup<br>Pho nam, bo vien', ''),
(100, 6, '7.50', 'P12. Rare Beef, Well Done Beef and Tripe Rice Noodle Soup<br>Pho tai, nam, xach', ''),
(101, 6, '7.50', 'P13. Rare Beef, Well Done Beef and Beef Balls Rice Noodle Soup<br>Pho tai, nam, bo vien', ''),
(102, 6, '7.50', 'P14. Beef Balls Rice Noodle Soup<br>Pho bo vien', ''),
(103, 6, '7.50', 'P15. Vegetable Rice Noodle Soup (Chicken Broth)<br>Pho rau cai', ''),
(104, 9, '6.50', 'D1. *Fried Bananas W/ Honey,  Sesame Seeds and Vanilla Ice Cream', ''),
(105, 9, '4.50', 'D2. Tropical Ice Cream<br>(2 Scoops- Green Tea or Mango Or Chocolate) ', ''),
(212, 10, '3.50', 'B9. Coco Tango', ''),
(107, 10, '3.00', 'B1. *Filtered Vietnamese Coffee with Condensed Milk and Ice', ''),
(108, 10, '3.00', 'B2. Filtered Vietnamese Hot Coffee with Condensed Milk', ''),
(149, 11, '0.00', 'F2. SPICY BASIL FRIED RICE (Com chien hung que)', 'Fried rice with Thai basil leaf in spicy soya sauce'),
(110, 10, '2.50', 'B3. Orange, Apple, Cranberry, Mango Juice', ''),
(111, 10, '2.50', 'B4. Perrier Spakling Bottle Water', ''),
(112, 10, '1.00', 'B5. Spring Water (Bottle)', ''),
(113, 10, '1.50', 'B6. Soft Drinks<br> (Coke, Diet Coke, Sprite, Ginger Ale, Nestea, Orange C- Plus)', ''),
(114, 10, '4.00', 'B7. Fresh Fruit Shakes<br>(Avocado, Strawberry, Mango) ', ''),
(115, 10, '4.00', 'B8. Mint Lemonade', ''),
(116, 7, '10.75', 'Zz1. *Sizzling Chicken with Vegetables (Ga xao tren dia nong)', '(Your choice of: Satay sauce or black bean sauce)'),
(117, 7, '10.75', 'Zz2. *Sizzling Beef with Vegetables (Bo xao tren dia nong)', '(Your choice of: Satay sauce or black bean sauce)'),
(118, 7, '12.50', 'Zz3. Sizzling Tiger Shrimp with Vegetables (Tom xao tren dia nong) ', '(Your choice of: Satay sauce or black bean sauce)'),
(119, 7, '12.50', 'Zz4. *Sizzling Seafood with Vegetables (Hai san xao tren dia nong) ', '(Your choice of: Satay sauce or black bean sauce)'),
(120, 11, '0.00', 'F1. STIR FRIED BASIL EGGPLANT (Com ca tim xao rau cai)', 'Stir fried spicy basil eggplant w/ mixed vegetables'),
(121, 11, '9.50', 'A) Tofu ', ''),
(122, 11, '10.00', 'B) Chicken', ''),
(123, 11, '10.00', 'C) Beef', ''),
(124, 11, '11.50', 'D) Tiger Shrimp', ''),
(125, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(126, 8, '10.00', 'B) Chicken', ''),
(127, 8, '10.00', 'C) Beef', ''),
(128, 8, '11.50', 'D) Tiger Shrimp', ''),
(129, 8, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(130, 8, '0.00', 'T2. *THAI RED OR GREEN CURRY (Com ca-ri thai)', 'Red chili curry Eggplant, tofu '),
(131, 8, '9.50', 'A) Tofu and Vegetable', ''),
(132, 8, '10.00', 'B) Chicken', ''),
(133, 8, '10.00', 'C) Beef', ''),
(134, 8, '11.50', 'D) Tiger Shrimp', ''),
(135, 8, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(136, 8, '0.00', 'T3. SPICY GOLDEN CURRY (Com xao lan)', 'Mixed peppers and onions, lemongrass, red chili in Thai curry'),
(137, 8, '9.50', 'A) Tofu and Vegetable', ''),
(138, 8, '10.00', 'B) Chicken', ''),
(139, 8, '10.00', 'C) Beef', ''),
(140, 8, '11.50', 'D) Tiger Shrimp', ''),
(141, 8, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(142, 8, '0.00', 'T4. *BASIL THAI SPICY NOODLE (Hu tieu xao hung que)', 'Rice noodle, egg, onions, carrots '),
(143, 8, '9.50', 'A) Tofu and Vegetable', ''),
(144, 8, '10.00', 'B) Chicken', ''),
(145, 8, '10.00', 'C) Beef', ''),
(213, 12, '15.50', '1. GOAT HOT POT', ''),
(147, 8, '11.50', 'D) Tiger Shrimp', ''),
(148, 8, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(150, 11, '9.50', 'A) Tofu ', ''),
(151, 11, '10.00', 'B) Chicken', ''),
(152, 11, '10.00', 'C) Beef', ''),
(153, 11, '11.50', 'D) Tiger Shrimp', ''),
(154, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari,Scallops, Crab ', ''),
(155, 11, '0.00', 'F3. PHUKET MANGO (Com xao xoai)', 'Stir fried fresh mango with ginger, soya sauce, roasted garlic '),
(156, 11, '9.50', 'A) Tofu ', ''),
(157, 11, '10.00', 'B) Chicken', ''),
(158, 11, '10.00', 'C) Beef', ''),
(159, 11, '11.50', 'D) Tiger Shrimp', ''),
(160, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari,Scallops, Crab ', ''),
(161, 11, '0.00', 'F4. *THAI FRIED RICE (Com chien Thai)', 'Thai fried rice w/ pineapples, cashew nuts, green bean '),
(162, 11, '9.50', 'A) Tofu ', ''),
(163, 11, '10.00', 'B) Chicken', ''),
(164, 11, '10.00', 'C) Beef', ''),
(165, 11, '11.50', 'D) Tiger Shrimp', ''),
(166, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari,Scallops, Crab ', ''),
(167, 11, '0.00', 'F5. â€œNOODLE HOUSEâ€ FRIED RICE (Com chien dac biet)', 'Stir fried with eggs, mixed beans '),
(168, 11, '9.50', 'A) Tofu ', ''),
(169, 11, '10.00', 'B) Chicken', ''),
(170, 11, '10.00', 'C) Beef', ''),
(171, 11, '11.50', 'D) Tiger Shrimp', ''),
(172, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(173, 11, '0.00', 'F6. *STIR FRIED CASHEWS NUTS (Com rau cai xao hot dieu)', 'Served with vegetables '),
(174, 11, '9.50', 'A) Tofu ', ''),
(175, 11, '10.00', 'B) Chicken', ''),
(176, 11, '10.00', 'C) Beef', ''),
(177, 11, '11.50', 'D) Tiger Shrimp', ''),
(178, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(179, 11, '0.00', 'F7. *CANTONESE CHOW MEIN (Mi xao don hoac mem)', 'Crispy or soft egg noodles with vegetables in garlic sauce'),
(180, 11, '9.50', 'A) Tofu ', ''),
(181, 11, '10.00', 'B) Chicken', ''),
(182, 11, '10.00', 'C) Beef', ''),
(183, 11, '11.50', 'D) Tiger Shrimp', ''),
(184, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(185, 11, '0.00', 'F8. *STIR FRY HO FUN (Hu tieu xao)', 'Thick rice noodles in a dry style mushroom soya sauce (egg)'),
(186, 11, '9.50', 'A) Tofu ', ''),
(187, 11, '10.00', 'B) Chicken', ''),
(188, 11, '10.00', 'C) Beef', ''),
(189, 11, '11.50', 'D) Tiger Shrimp', ''),
(190, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(191, 11, '0.00', 'F9. SHANGHAI NOODLES (Thuong Hai xao)', 'Thick wheat noodles stir-fried in a mushroom soya sauce (egg)'),
(192, 11, '9.50', 'A) Tofu ', ''),
(193, 11, '10.00', 'B) Chicken', ''),
(194, 11, '10.00', 'C) Beef', ''),
(195, 11, '11.50', 'D) Tiger Shrimp', ''),
(196, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(197, 11, '0.00', 'F10. *SINGAPORE VEMICELLI (Bun Singapore)', 'Thin rice noodles stir- fried in a curry paste (egg)'),
(198, 11, '9.50', 'A) Tofu ', ''),
(199, 11, '10.00', 'B) Chicken', ''),
(200, 11, '10.00', 'C) Beef', ''),
(201, 11, '11.50', 'D) Tiger Shrimp', ''),
(202, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(203, 11, '0.00', 'F11. PAD SEW (Hu tieu xao kieu Thai)', 'Stir fried thick rice noodle w/ mixed vegetable in mushroom soya sauce'),
(204, 11, '9.50', 'A) Tofu ', ''),
(205, 11, '10.00', 'B) Chicken', ''),
(206, 11, '10.00', 'C) Beef', ''),
(207, 11, '11.50', 'D) Tiger Shrimp', ''),
(208, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(209, 11, '10.00', 'F12. * SWEET AND SOUR CHICKEN (Ga xao chua ngot)', 'Fresh pineapple, onions, green and red peppers glazed with sweet and sour sauce '),
(210, 11, '10.00', 'F13. CRISPY ORANGE BEEF OR CHICKEN(Bo/ Ga xao sot cam)', 'Fresh onions, green and red peppers glazed with a sweet honey house sauce '),
(211, 11, '9.75', 'F14. STIR FRIED LEMON GRASS WITH BEEF (Com Bo/ Ga xao xa  ot) OR CHICKEN', 'Stir fried mixed peppers with onions, lemongrass and hot chili'),
(223, 2, '6.50', 'S5. GLASS NOODLE SALAD', '-Glass noodle tossed with seaweed, carrot, and cucumber topped with roasted sesame'),
(214, 12, '3.50', '2. CRAP SOUP', ''),
(215, 12, '6.00', '3. LEMONGRASS CLAM', ''),
(216, 12, '9.50', '4. BEEF PASTA', ''),
(217, 12, '9.50', '5. GOAT CURRY', ''),
(218, 12, '9.50', '6. WATCHOUT BEEF', ''),
(222, 1, '9.00', 'A15. CHICKEN WINGS', 'Deep-fried chicken wings served with sticky rice'),
(224, 2, '6.50', 'S6. VIETNAMESE CABBAGE SALAD', '-Fresh chicken breast, cabbages, carrots, and green onion topped with our home-made sauce, garnish with peanuts and dry shallots'),
(225, 2, '6.50', 'S7. CHILLI LEMON BEEF SALAD', '-Our home-made spicy dressing tossed with fresh mixed green, fried shallots, basil leaves, and topped with sliced beef'),
(226, 3, '5.00', 'SO7. HOT AND SOUR SOUP', '-Bamboo shoots and mushrooms in mild eggs drop soup'),
(227, 3, '5.50', 'SO8. COCONUT CLAM SOUP', '-Clams in Thai coconut green curry'),
(228, 3, '5.50', 'SO9. PURPLE YAM SOUP', '-Baby tiger shrimp and lotus seed in thick purple yam soup'),
(231, 8, '10.00', 'B) Chicken', ''),
(232, 8, '10.00', 'C) Beef', ''),
(233, 8, '11.50', 'D) Tiger shrimp', ''),
(234, 8, '12.50', 'E) Seafood (Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(235, 8, '0.00', 'T6. PINEAPPLE CURRY', '-Fresh pineapple, lime leaves, red/ green peppers cooked in Thai red curry'),
(236, 8, '9.50', 'A) Tofu and Vegetable', ''),
(237, 8, '10.00', 'B) Chicken', ''),
(238, 8, '10.00', 'C) Beef', ''),
(239, 8, '11.50', 'D) Tiger shrimp', ''),
(240, 8, '12.50', 'E) E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab and Mussels', ''),
(241, 11, '0.00', 'F15. HOUSE SAUCY NOODLE', '- Flat or Udon noodles mixed with mushroom, vegetable topped  with mushroom soya sauce'),
(242, 11, '9.50', 'A) Tofu and Vegetable', ''),
(243, 11, '10.00', 'B) Chicken', ''),
(244, 11, '10.00', 'C) Beef ', ''),
(245, 11, '11.50', 'D) Tiger shrimp', ''),
(246, 11, '12.50', 'E) Seafood ( Tiger Shrimps, Calamari, Scallops, Crab ', ''),
(247, 11, '11.50', 'F16. COCONUT SHRIMP UDON', 'Udon noodle, mixed salad topped with tiger shrimp in house special onion coconut cream'),
(248, 11, '12.50', 'F17. *SIGNATURE FILET-O-FISH', 'Breaded fish filet topped with vegetable and tiger shrimps in house special sauces'),
(249, 11, '0.00', 'A) Sweet tomato sauce', ''),
(250, 11, '0.00', 'B) Thai spicy sauce', ''),
(251, 9, '5.00', 'D3. Mango Sticky Rice', ''),
(252, 9, '5.00', 'D4. Banana Sticky Rice', '-Pan fried  sticky rice and banana serve with sweet coconut cream and roasted peanut'),
(253, 9, '8.00', 'D5. Fruit Platter (seasonal)', '-Mixed fresh fruit and crushed ice topped with condensed milk and strawberry syrup'),
(254, 10, '4.00', 'B10. Bubble tea ( Strawberry, Mango, Honeydew, Taro, Watermelon, Lychee)', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RATE` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `NAME`, `RATE`, `STATUS`) VALUES
(1, 'APPETIZERS', 2, 1),
(2, 'SALADS', 3, 1),
(3, 'SOUPS', 4, 1),
(4, 'VERMICELLI', 5, 1),
(5, 'FROM THE GRILL', 6, 1),
(6, 'PHO', 7, 1),
(7, 'SIZZLING PLATES', 8, 1),
(8, 'THAI DISHES', 9, 1),
(9, 'DESSERTS', 11, 1),
(10, 'BEVERAGES', 12, 1),
(11, 'STIR FRY DISHES', 10, 1),
(12, 'NEW DISHES', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
