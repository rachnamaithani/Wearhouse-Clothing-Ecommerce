-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 10:32 AM
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
-- Database: `wearhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `admin_gender`) VALUES
(1, 'rachna_3575', 'rachna@gmail.com', '280dd443f81c028f4472d48462953bf1', 'rachna', '9998887767', 'female'),
(2, 'rahim_7114', 'rahin@gmail.com', '9733b92d7d60ecac9ad32ff7a5c87a3c', 'rahim', '89485934', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'zara'),
(2, 'shein'),
(3, 'jimmychoo'),
(4, 'aldo'),
(5, 'pandora'),
(6, 'jackandjones'),
(7, 'kikomilano'),
(8, 'pullandbear'),
(9, 'mango'),
(10, 'zudio'),
(20, 'lifestyle'),
(24, 'peacock'),
(25, 'gucci'),
(26, 'pantloon'),
(27, 'prada');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `p_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_name`) VALUES
(1, 'womenwestern_top', 'Top'),
(2, 'womenwestern_tshirt', 'T-Shirt'),
(3, 'womenwestern_jeans', 'Jeans'),
(4, 'womenethnic_kurti', 'Kurti'),
(5, 'womenethnic_saree', 'Saree'),
(6, 'womenethnic_skirt', 'Skirt'),
(7, 'menformal_shirt', 'Shirt'),
(8, 'mencasual_tshirt', 'T-Shirt'),
(9, 'mencasual_jeans', 'Jeans'),
(10, 'girl_frock', 'Frock'),
(11, 'girl_top', 'Top'),
(12, 'girl_tshirt', 'T-Shirt'),
(13, 'girl_lehenga_choli', 'Lehenga Choli'),
(14, 'girl_jeans', 'Jeans'),
(15, 'boy_shirt', 'Shirt'),
(16, 'boy_tshirt', 'T-Shirt'),
(17, 'boy_jeans', 'Jeans'),
(18, 'boy_kurta_pajama', 'Kurta Pajama'),
(22, 'girl_ethnic_kurti', 'ethnic kurti'),
(23, 'womenwestern_shirt', 'shirt'),
(24, 'menformal_trouser', 'Trouser');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `msg`) VALUES
(1, 'priya', 'priya@gmail.com', 'hey,\r\nmera naam priya hai aur hum van me rehte hai. hamara kitchen hamare bistar ke niche hai');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_keyword`, `product_category`, `product_brand`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Preety Fancy pink and gold color girl Lehenga Choli', 'vibrant color party wear lehenga choli for girl with three quater sleeves fully stitched', 'lehenga choli, girl ,pink lehenga choli , gold, gotapatti, kid, choli,lehenga', 'girl_lehenga_choli', 'lifestyle', '../product_Images/girlethnic21.jpg', '../product_Images/girlethnic22.jpg', '../product_Images/girlethnic23.jpg', 1500, '2023-12-14 16:36:30', 'true'),
(2, 'Tinkle Classy Kids Girls Lehenga Cholis', 'Kids Girls Lehenga Choli . Net fabric . Semi Stitched', 'Lehenga Choli , girl, girl lehenga, KidLehenga, Semi Stitched Lehenga, purple color Lehenga choli', 'girl_lehenga_choli', 'peacock', '../product_Images/girl_lehangacholi11.jpeg', '../product_Images/girl_lehangacholi12.jpeg', '../product_Images/girl_ethnic.2jpg.jpg', 2100, '2023-12-14 16:40:09', 'true'),
(3, 'Kashvi Pretty Kurtis', 'Blue classy anarkali Kurti.100% soft cotton material ', 'kurti, blue, cotton, women kurti, anarkalikurti , women anarkali, cotton kurti', 'womenethnic_kurti', 'pantloon', '../product_Images/ladykurti11.webp', '../product_Images/ladykurti12.webp', '../product_Images/ladykurti13.webp', 799, '2023-12-14 16:50:57', 'true'),
(4, 'Voguish Kurti', 'Anarkali Rayon Printed Kurti(orange).The kurta is 41 inches in length.Every girl/women must have this kurta as its eye relieving prints and color makes it an all season trending set.', 'anarkali rayon fabric, printedkurti, orange, kurti, rayon kurti ,kurta, women ', 'womenethnic_kurti', 'kikomilano', '../product_Images/womenkurti31.jpeg', '../product_Images/womenkurti32.jpeg', '../product_Images/womenkurti33.jpeg', 1200, '2023-12-15 13:39:48', 'true'),
(5, 'Abhisarika Women Kurti ', 'Fayka Womens Kurti with Pant Set with Rayon Embriodery on Neck and has bordered embroidery on Pant with beautiful dupatta.Crafted from pure rayon fabric, it is light weight and soft against your skin', 'women , kurti, kurta, kurtapantset, kurta pant, rayon , embriodery, neck design kurtaset, softkurta', 'womenethnic_kurti', 'aldo', '../product_Images/womenkurti81.jpeg', '../product_Images/womenkurti82.jpeg', '../product_Images/womenkurti83.jpeg', 2500, '2023-12-15 12:57:39', 'true'),
(6, 'Banita Women Anarkali', 'Ethnic Motifs Floral Print design anarkali kurta with Pant and Dupatta.', 'floral anarkali kurta set , anarkali, women, kurti, anarkali kurti , floral anarkali kurti set', 'womenethnic_kurti', 'zudio', '../product_Images/womenkurit62.jpeg', '../product_Images/womenkurit63.jpeg', '../product_Images/womenkurti61.jpeg', 799, '2023-12-15 13:55:40', 'true'),
(7, 'Purple Anarkali Kurta Sets', 'Stylish Badhani Print Full Length Kurta Set .With Three Quarter Sleeves', 'Badhani Print Kurta Set, Kurta Set, Printed Set, purple,bottomwear', 'womenethnic_kurti', 'peacock', '../product_Images/womenkurti11.jpeg', '../product_Images/womenkurti12.jpeg', '../product_Images/womenkurti13.jpeg', 1200, '2023-12-15 13:40:29', 'true'),
(9, 'Charvi Pretty Kurta Sets', 'Charvi presents new pant kurta set with beautiful print and color. Soft Fabric . Three-Quarter Sleeves', 'cotton, charvi, kurta, kurti , women , printed, laheriya print, yellow, orange kurti, cotton, anarkali, girl', 'womenethnic_kurti', 'shein', '../product_Images/womenkurti51.jpeg', '../product_Images/womenkurti52.jpeg', '../product_Images/womenkurti53.jpeg', 699, '2023-12-15 13:02:39', 'true'),
(10, 'Festive Special Leheriya Kurta', 'Leheriya Pattern Black and White Kurta Set With White Pants.', 'kurta ,kurti, women,leheriya patter ,black, lines, black and white, kurta set, kurti set, girl', 'womenethnic_kurti', 'mango', '../product_Images/womenkurti71.jpeg', '../product_Images/womenkurti72.jpeg', '../product_Images/womenkurti73.jpeg', 600, '2023-12-15 13:56:16', 'true'),
(11, 'Women ChickenKari Kurta Set', 'Latest Collection Chickenkarti kurta with pant and dupatta set.', 'chickenkari, kurta, kurti, women, girl, kurta set, dupatta set, white kurti ', 'womenethnic_kurti', 'mango', '../product_Images/womenkurti91.jpeg', '../product_Images/womenkurti92.jpeg', '../product_Images/womenkurti93.jpeg', 1200, '2023-12-15 13:32:17', 'true'),
(12, 'Elegent Blue Party Wear Kurta Set', 'New Straight Fit Kurta Set With Pants. Three Fourth Quarter Sleeves.', 'party wearkurta set, kurta , kurti, women kurta set, women kurti , blue kurti, blue kurta set, party wear kurta set', 'womenethnic_kurti', 'zudio', '../product_Images/ladykurti21.webp', '../product_Images/ladykurti23.webp', '../product_Images/ladykurti22.webp', 699, '2023-12-15 13:43:25', 'true'),
(13, 'LadyRock Badhani Kurta', 'Badhani Print Red Kurta with Three Quater Sleeves', 'red, kurta , badhani, print, kurta ,kurti, women, red kurti', 'womenethnic_kurti', 'kikomilano', '../product_Images/ladykurti31.webp', '../product_Images/ladykurti32.webp', '../product_Images/ladykurti32.webp', 1300, '2023-12-15 13:49:47', 'true'),
(14, 'Party Wear Kurta Set', 'Elegent Party Wear Kurta with golden Pallazo .', 'pallazo, kurta, kurti, red kurti, red party wear kurta, girlish kurti, women kurti', 'womenethnic_kurti', 'aldo', '../product_Images/ladykurti41.webp', '../product_Images/ladykurti42.webp', '../product_Images/ladykurti41.webp', 1000, '2023-12-15 13:53:41', 'true'),
(15, 'Puplem funky Women Top', 'Brown Puplem funcky Women top', 'top, women, girl, puplem , brown, brown top, puplem top, party wear top', 'womenwestern_top', 'zara', '../product_Images/top11.webp', '../product_Images/top13.webp', '../product_Images/top12.webp', 649, '2023-12-15 14:18:44', 'true'),
(16, 'Fancy Women Top ', 'Women Purple Top With Shiny Embroidary Neck Design', 'women top, girl top , purple top, party wear top , neck design top, crop top', 'womenwestern_top', 'mango', '../product_Images/top21.webp', '../product_Images/top22.webp', '../product_Images/top23.webp', 540, '2023-12-15 14:19:01', 'true'),
(17, 'Classy Stripe Top', 'Black and White Stripe Top with Full Sleeves', 'top, black and white , stripe, women, girl top, black top', 'womenwestern_top', 'pantloon', '../product_Images/womentop11.jfif', '../product_Images/womentop12.webp', '../product_Images/womentop13.webp', 789, '2023-12-15 14:14:59', 'true'),
(18, 'Trendy One Shoulder Top', 'White Knitted One Full Sleeve Top', 'white top , girl top, women top, party wear top, one shoulder, preety top, women ', 'womenwestern_top', 'jackandjones', '../product_Images/womentop21.jfif', '../product_Images/womentop22.webp', '../product_Images/womentop23.webp', 990, '2023-12-15 14:19:13', 'true'),
(19, 'Black Mesh Trendy Alora Top', 'Black party wear shiny mesh top with full sleeves ', 'black top, women, top, girl, mesh top, full sleeves top', 'womenwestern_top', 'jackandjones', '../product_Images/womentop31.jfif', '../product_Images/womentop32.webp', '../product_Images/womentop33.webp', 1500, '2023-12-15 14:20:38', 'true'),
(20, 'Geoie  Puffy Sleeves Top ', 'Women Bottle Green Simple Top', 'women, girl, top, puffy sleeves, women top', 'womenwestern_top', 'jimmychoo', '../product_Images/womentop41.jpg', '../product_Images/womentop42.jpg', '../product_Images/womentop43.jpg', 400, '2023-12-15 14:23:04', 'true'),
(21, 'Neck Ruffle Top', 'Women Orange ruffle top ', 'women top, girl top, ruffle detail, ruffle top , orange top', 'womenwestern_top', 'shein', '../product_Images/womentop51.jpg', '../product_Images/womentop52.jpg', '../product_Images/womentop53.jpg', 500, '2023-12-15 14:25:15', 'true'),
(22, 'Kalki Fashion Tshirt', 'Yellow Graphic Tshirt for women or girl', 'girl tshirt, women tshirt, t-shirt, yellow tshirt', 'womenwestern_tshirt', 'zudio', '../product_Images/top41.webp', '../product_Images/top41.webp', '../product_Images/top41.webp', 280, '2023-12-15 14:28:39', 'true'),
(23, 'Fashionista Cocacola Tshirt', 'Cocacola Limited Edition Tshirt ', 'girl tshirt, women tshirt, cocacola tshirt, trendy tshirt, girlish tshirt, girl t-shirt', 'womenwestern_tshirt', 'lifestyle', '../product_Images/womentshirt21.jfif', '../product_Images/womentshirt23.webp', '../product_Images/womentshirt24.webp', 900, '2023-12-15 14:31:25', 'true'),
(24, 'Looney Tunes Tshirt', 'Yellow Baggy Tshirt ', 'yellow t-shirt, women tshirt, girl tshirt, , trendy women tshirt', 'womenwestern_tshirt', 'shein', '../product_Images/womentshirt31.jfif', '../product_Images/womentshirt32.webp', '../product_Images/womentshirt33.webp', 599, '2023-12-15 14:33:51', 'true'),
(25, 'Black Alexander max Tshirt', 'Alexander 56th edition T-shirt', 'women tshirt, girl tshirt, alexander tshirt, trendy womentshirt,', 'womenwestern_tshirt', 'pullandbear', '../product_Images/womentshirt41.jfif', '../product_Images/womentshirt42.webp', '../product_Images/womentshirt43.webp', 400, '2023-12-15 14:35:29', 'true'),
(26, 'Exo Blue Jeans', 'Women Straight Fit Blue Jeans', 'girl jeans, women jeans, trendy women jeans, straight fit women jeans', 'womenwestern_jeans', 'pullandbear', '../product_Images/womenjeans11.webp', '../product_Images/womenjeans12.webp', '../product_Images/womenjeans13.webp', 799, '2023-12-15 14:37:57', 'true'),
(27, 'Shady Blue Women Jeans', 'Trendy Women Striaghtfit  Jeans', 'women jeans, girl jeans , trendy women jeans, blue jeans', 'womenwestern_jeans', 'jackandjones', '../product_Images/womenjeans41.jpg', '../product_Images/womenjeans42.jpg', '../product_Images/womenjeans43.jpg', 600, '2023-12-15 14:47:24', 'true'),
(28, 'Levis Trendy Jeans', 'Women Blue Shaded Jeans', 'women jeans, girl jeans, trendy womenjeans, blue jeans, women jean', 'womenwestern_jeans', 'kikomilano', '../product_Images/womenjeans71.jpg', '../product_Images/womenjeans72.jpg', '../product_Images/womenjeans73.jpg', 500, '2023-12-15 14:42:45', 'true'),
(29, 'Kalki Fashion Jeans', 'Kalki Latest Deep Blue Women Jeans', 'women jeans, kalki jeans, girl jeans', 'womenwestern_jeans', 'select a brand', '../product_Images/womenjeans61.jpg', '../product_Images/womenjeans62.jpg', '../product_Images/womenjeans63.jpg', 500, '2023-12-15 14:53:46', 'true'),
(30, 'Peacock Trendy Jeans', 'Women Blue Breathable Jeans', 'women jeans, girl jeans, trendy womenjeans, blue jeans, women jean', 'womenwestern_jeans', 'lifestyle', '../product_Images/womenjeans51.jpg', '../product_Images/womenjeans52.jpg', '../product_Images/womenjeans53.jpg', 600, '2023-12-15 14:55:17', 'true'),
(31, 'Women Trendy Shirt', 'Causal Purple Button Up Shirt', 'women shirt, girl shirt, purple shirt, trendy shirt', 'womenwestern_shirt', 'mango', '../product_Images/top51.webp', '../product_Images/top52.webp', '../product_Images/top53.webp', 500, '2023-12-15 14:57:42', 'true'),
(32, 'Red Party Wear Shirt', 'Shuttle Red Button Up Shirt with ruffle detailing on the shoulder and facny sleeves design', 'women shirt, girl shirt, red shirt, trendy shirt', 'womenwestern_shirt', 'mango', '../product_Images/womenshirt21.jpg', '../product_Images/womenshirt22.jpg', '../product_Images/womenshirt23.jpg', 650, '2023-12-15 15:00:40', 'true'),
(33, 'Classy Orange Shirt', 'h&M Orange Ruffle Puffed Sleeve Crop Shirt', 'crop shirt, women shirt,girl shirt , h&m shirt, orange shirt', 'womenwestern_shirt', 'pandora', '../product_Images/womenshirt11.jpg', '../product_Images/womenshirt12.jpg', '../product_Images/womenshirt13.jpg', 400, '2023-12-15 15:27:51', 'true'),
(34, 'Facny Ribbon Shirt', 'Purple Tie Up Ribbon Shirt For Women and Girls Available in all Sizes', 'women shirt, women fancy shrit, girl shirt', 'womenwestern_shirt', 'kikomilano', '../product_Images/top31.webp', '../product_Images/top32.webp', '../product_Images/top31.webp', 500, '2023-12-15 15:30:09', 'true'),
(35, 'Log Angeles Sports tshirt', 'Women Orange Sport tshirt for women', 'women tshirt, girl tshirt, sport women tshirt, trendy women tshirt', 'womenwestern_tshirt', 'select a brand', '../product_Images/women_tshirt11.jfif', '../product_Images/women_tshirt12.webp', '../product_Images/women_tshirt13.webp', 450, '2023-12-15 15:33:20', 'true'),
(36, 'Adaya Latest Banarasi Sari', 'Women Red Banarasi Sari with gold jari detailing', 'banarasi sari, women banarasi sari, red sari', 'womenethnic_saree', 'peacock', '../product_Images/saree11.webp', '../product_Images/saree12.webp', '../product_Images/saree11.webp', 1200, '2023-12-15 15:36:57', 'true'),
(37, 'Kanika Purple Shady Sari', 'Women Purple Shady Sari ', 'sari, purple sari, women sari, girlish sari', 'womenethnic_saree', 'peacock', '../product_Images/saree21.webp', '../product_Images/sarre22.webp', '../product_Images/sarre23.webp', 600, '2023-12-15 15:40:28', 'true'),
(38, 'Adya Fashion Pleated Skirt', 'Women Pink Pleated Long Skirt ', 'women skirt, women dress, pink skirt, pleated skirt', 'womenethnic_skirt', 'lifestyle', '../product_Images/skirt12.webp', '../product_Images/skirt11.webp', '../product_Images/skirt13.webp', 700, '2023-12-15 15:42:50', 'true'),
(39, 'Indo Western Pink Skirt', 'Indo Western Pink Long Skirt', 'skirt, pink skirt, indo western pink skirt', 'womenethnic_skirt', 'pantloon', '../product_Images/skirt21.webp', '../product_Images/skirt211.webp', '../product_Images/skirt21.webp', 300, '2023-12-15 15:44:36', 'true'),
(40, 'Dasto Check Shirt', 'Dasto Check Shirt . 100% cotton breathable material', 'men shirt, men trendy shirt, shirt', 'menformal_shirt', 'select a brand', '../product_Images/bluemenshirt1.jpg', '../product_Images/bluemenshirt3.jpg', '../product_Images/bluemenshirt2.jpg', 500, '2023-12-15 15:47:24', 'true'),
(41, 'Levis Zolo 43 Shirt', 'Levis Check Man Shirt. Blue-Brown Check Shirt', 'man shirt, man check shirt, man trendy shirt', 'menformal_shirt', 'gucci', '../product_Images/menshirt21.jfif', '../product_Images/menshirt23.jfif', '../product_Images/menshirt22.jfif', 800, '2023-12-15 15:52:35', 'true'),
(42, 'Snitch Blue Polo Tshirt', 'Prenium Blue Polo Tshirt ', 'men tshirt, man tshrit , male tshirt, polo tshirt', 'mencasual_tshirt', 'pullandbear', '../product_Images/mentshirt21.jpg', '../product_Images/mentshirt23.jpg', '../product_Images/mentshirt22.jpg', 1289, '2023-12-15 15:56:29', 'true'),
(43, 'Stylish Pink Girl Frock', 'Pink Frock with belt perfect for party occasion . best quality and soft Net fabric.', 'girl frock , kid frock , party wear frock ', 'girl_frock', 'lifestyle', '../product_Images/peachgirlfrock1.webp', '../product_Images/p.webp', '../product_Images/peachgirlfrock2.webp', 600, '2023-12-15 16:11:05', 'true'),
(44, 'GAGO Party Wear Dress', 'Girl Frock Dress . Net Fabric With Soft and Shiny Texture.', 'girl frock ,frock dress, blue frock', 'girl_frock', 'kikomilano', '../product_Images/bluefrock1.webp', '../product_Images/bluefrock2.webp', '../product_Images/bluefrock2.webp', 1500, '2023-12-15 16:12:54', 'true'),
(45, 'Butterfly Pattern Frock', 'Party Wear Girl ButterFly Frock With Flower Belt', 'girl frock , butterfly , partywearfrock ', 'girl_frock', 'gucci', '../product_Images/girlfrock.webp', '../product_Images/girlfrock3.jpg', '../product_Images/girlfrock2.jpg', 2000, '2023-12-15 16:16:01', 'true'),
(46, 'Pinkish Cotton Kid Dress', 'Pink Beautiful Frock . 100% cotton material', 'skirt, girl frock, kid frock, pink kid skirt', 'girl_frock', 'pandora', '../product_Images/girl_frock21.webp', '../product_Images/girl_frock11.webp', '../product_Images/girl_frock22.webp', 780, '2023-12-15 16:19:06', 'true'),
(47, 'Regular Pure Cotton T-Shirt', '100% cotton Navy Blue T-shirt', 'girl tshrit, girl top, kid tshirt', 'girl_tshirt', 'kikomilano', '../product_Images/girltshirt21.webp', '../product_Images/girltshirt43.webp', '../product_Images/girltop41.webp', 1200, '2023-12-16 14:39:00', 'true'),
(48, 'Marks Spencer Trendy Top', 'Green and White Dotted Top for kid of age group (2y-8y)', 'green top, white top, dotted kid top, girl top', 'girl_top', 'jimmychoo', '../product_Images/girltop11.webp', '../product_Images/girltop12.webp', '../product_Images/girltop13.webp', 320, '2023-12-16 14:41:19', 'true'),
(49, 'Girls Frill-Trimmed Flannel Blouse', 'Top in soft cotton flannel with a round neckline, wood-look buttons at the back of the neck and a frill-trimmed yoke at the front that continues over the shoulders. Long sleeves with covered elastication at the cuffs.', 'girl top, cotton top, infant top, kid top, stripe top', 'girl_top', 'shein', '../product_Images/girltop31.webp', '../product_Images/girltop32.webp', '../product_Images/girltop33.webp', 600, '2023-12-16 14:46:00', 'true'),
(50, 'Girls Overlock Detail Top', 'Long-sleeved top with a wide neckline and overlocked edges around the neckline and cuffs.', 'girl top , long sleeve girl top, trendy girl top, kid girl top, pink top', 'girl_top', 'zudio', '../product_Images/girltop1.webp', '../product_Images/girltop2.jpg', '../product_Images/girltop1.webp', 400, '2023-12-16 14:47:44', 'true'),
(51, 'Girls Frill-Trimmed Top', 'Top in a cotton weave with picot-trim edges. Round neckline and a keyhole opening with a button at the back of the neck. Wide, voluminous frill trims at the front that continue over the shoulders, a gathered seam at the waist and a gently flared peplum.', 'pink top, girl top, trendy girl top, full sleeves, kid top', 'girl_top', 'zara', '../product_Images/girltop21.webp', '../product_Images/girltop22.webp', '../product_Images/girltop23.webp', 500, '2023-12-16 15:23:44', 'true'),
(52, 'Unicon Relaxed Fit T-shirt', 'Our simple styling meets some intergalactic edge with this Cosmo Girl tee, which features a relaxed fit, short length, and some out-of-this-world details.', 'girl tshit, fit girl t-shirt, girl kid tshirt', 'girl_tshirt', 'pandora', '../product_Images/girltshirt52.webp', '../product_Images/girltshirt51.webp', '../product_Images/girltshirt52.webp', 400, '2023-12-16 14:55:19', 'true'),
(53, 'Infant Girl T-shirts', 'The Classics are all about PANTLOON at its most pared-back and refined, so keep your style simple with this tee, which comes in a regular fit and with colourful PUMA touches', 'girl top , trendy girl tshirt, combo tshirt girl ', 'girl_tshirt', 'pantloon', '../product_Images/girltshirt11.jpeg', '../product_Images/girltshirt12.jpeg', '../product_Images/girltshirt13.jpeg', 900, '2023-12-16 14:57:58', 'true'),
(54, 'Girls Yellow Melange  T-shirt', 'Yellow melange  Tshirt for girls .printed Regular length Round neck Short, regular sleeves Knitted cotton fabric', 'girl tshirt, trendy girl tshirt, yellow girl tshirt', 'girl_tshirt', 'jimmychoo', '../product_Images/girltshirt61.webp', '../product_Images/girltshirt63.webp', '../product_Images/girltshirt62.webp', 600, '2023-12-16 15:00:36', 'true'),
(57, 'Girls Picot-Trimmed Ribbed Pure Cotton Top', 'op in ribbed cotton jersey with a round neckline and short sleeves. Picot trims around the neckline and cuffs.', 'girl top, brown top, round neck top, girl kid top, knitted top', 'girl_top', 'aldo', '../product_Images/girl_top3.jfif', '../product_Images/girl_top31.webp', '../product_Images/girl_top3.jfif', 700, '2023-12-16 15:09:13', 'true'),
(58, 'Girls Flared Leggings With Ribbon Detailing ', 'Denim-look leggings in soft jersey with covered elastication at the waist and legs with flared hems.', 'girl jeans, girl blue jeans, trendy blue jeans with ribbon, girl trendy jeans , kid jeans', 'girl_jeans', 'peacock', '../product_Images/girljeans1.webp', '../product_Images/girljeans2.jpg', '../product_Images/girljeans3.jpg', 699, '2023-12-16 15:11:30', 'true'),
(59, 'Girls Regular Fit Mid-Rise Jeans', 'Fit: Regular Fit Non Stretchable', 'kid jeans, girl jeans, flower pattern jeans, trendy girl jeans', 'girl_jeans', 'pullandbear', '../product_Images/girljeans21.webp', '../product_Images/girljeans22.jpg', '../product_Images/girljeans23.jpg', 600, '2023-12-16 15:14:03', 'true'),
(60, 'Girls Embroidered Nyra Cut Pure Kurta Set', 'Ethnic embroidered Anarkali shape Angrakha style V-neck, three-quarter regular sleeves Knee length with straight hem Pure cotton machine weave fabric', 'girl ethnic wear, girl kurta set, girl party wear ethnic suit', 'girl_ethnic_kurti', 'mango', '../product_Images/girl_ethnic.jpg', '../product_Images/girl_ethnic.2jpg.jpg', '../product_Images/girl_ethnic3.jpg', 1300, '2023-12-16 15:18:28', 'true'),
(61, 'Girls Ethnic Gotta Patti Kurta with Sharara', 'Solid Straight shape Regular style Round neck, three-quarter bell sleeves Gotta patti detail Knee length length with straight hem Polyester machine weave fabric', 'girl kurta sharara set, girl party wear kurta kurti set', 'girl_ethnic_kurti', 'zara', '../product_Images/girlethnic1.jpg', '../product_Images/girlethnic2.jpg', '../product_Images/girlethnic3.jpg', 1110, '2023-12-18 12:24:06', 'true'),
(62, 'Boys Bear Printed Casual Shirt with Pant', 'Beige ethnic motifs printed opaque Casual shirt ,has a mandarin collar, button placket, short regular sleeves, curved hem', 'boy shirt, boy shirt pant , boy bear, trendy shirt , brown pants', 'boy_shirt', 'lifestyle', '../product_Images/boy12.jpg', '../product_Images/boy14.jpg', '../product_Images/boy11.jpg', 599, '2023-12-16 15:29:50', 'true'),
(63, 'Boys Tartan Checked Casual Shirt', 'Tartan checked opaque Casual shirt ,has a spread collar, snap button placket, 2 patch pocket, long regular sleeves, curved hem', 'boy shirt, boy kid check shirt, black and white boy shirt ', 'boy_shirt', 'gucci', '../product_Images/boytshirt31.jpg', '../product_Images/boyshirt32.jpg', '../product_Images/boyshirt.jpg', 4000, '2023-12-16 15:31:41', 'true'),
(64, 'Boys Super Stretch Slim Fit Jeans', 'Jeans in washed, superstretch denim for maximum mobility. Slim fit with an adjustable, elasticated waist, a fake fly with a button, and front and back pockets.', 'boy jeans, trendy boy jeans, boy kid jeans, boy black jeans', 'boy_jeans', 'jackandjones', '../product_Images/boyset13.jpg', '../product_Images/boyset13.jpg', '../product_Images/boyset13.jpg', 700, '2023-12-16 15:34:05', 'true'),
(65, 'Boys Super Soft Skinny Fit Jeans', 'Jeans in supersoft, superstretch, flexible denim for maximum mobility. Skinny fit through the hip, thigh and leg, adjustable elastication at the waist and a zip fly with a press-stud. Fake front pockets and open back pockets.', 'boy jeans, trendy boy jeans, skinny fit boy jeans', 'boy_jeans', 'jimmychoo', '../product_Images/boyjeans21.jpg', '../product_Images/boyjeans22.jpg', '../product_Images/boyjeans23.jpg', 500, '2023-12-16 15:35:21', 'true'),
(66, 'Boys Mid-Rise Regular Fit Jeans', 'Dark shade, no fade blue jeans Regular fit, mid-rise Low distress Non stretchable 5 pocket Length: regular', 'boy jeans, blue jeans, regular fit jeans boy', 'boy_jeans', 'aldo', '../product_Images/boyjeans11.jpeg', '../product_Images/boyjeans12.jpeg', '../product_Images/boyjeans13.jpeg', 789, '2023-12-16 15:38:21', 'true'),
(67, 'Boys Yellow Kurta with Dhoti Pants', 'Straight shape Regular style Mandarin collar, long regular sleeves Above knee length with straight hem Pure cotton machine weave fabric', 'boy kurta pajama, boy dhoti pants, boy yellow kurta with pajama, boy ethnic wear', 'boy_kurta_pajama', 'lifestyle', '../product_Images/boykurtapajama1.jpg', '../product_Images/boykurtapajama2.jpg', '../product_Images/boykurtapajama3.jpg', 600, '2023-12-16 15:40:52', 'true'),
(70, 'Men Orange Solid Pure Cotton Henley Neck Lounge T-shirt', 'Orange solid lounge T-shirt with brand logo embroidered, has a henley neck and long sleeves', 'men tshirt, man tshirt , man trendy tshirt , men t-shirt, man ornage tshirt', 'mencasual_tshirt', 'lifestyle', '../product_Images/mentshirt41.jpg', '../product_Images/mentshirt42.jpg', '../product_Images/mentshirt43.jpg', 790, '2023-12-16 15:48:09', 'true'),
(71, 'Pure Cotton T-shirt', 'Brown T-shirt for men Solid Regular length Round neck Short, regular sleeves Woven pure cotton fabric', 'men tshirt, man tshirt, man t-shirt, man embriodary tshit', 'mencasual_tshirt', 'lifestyle', '../product_Images/mentshirt11.jpg', '../product_Images/mentshirt12.jpg', '../product_Images/mentshirt13.jpg', 730, '2023-12-16 15:49:30', 'true'),
(72, 'Men Brand Logo Printed Pure Cotton T-shirt', 'Red and green T-shirt for men Brand logo printed Regular length Round neck Short, regular sleeves Knitted pure cotton fabric', 'men tshirt, man tshit,, man t-shirt, trendy man tshirt', 'mencasual_tshirt', 'jackandjones', '../product_Images/mentshirt31.jpg', '../product_Images/mentshirt32.jpg', '../product_Images/mentshirt33.jpg', 600, '2023-12-16 15:51:03', 'true'),
(73, 'Vgyaan Men Original Formal Trousers', 'Rose gold woven trousers Regular fit Brand Fit: original Mid-rise Length: regular Pattern: solid   Flat-front Feature: plain 4 pockets', 'men trouser, man trouser, man trendy trouser ', 'menformal_trouser', 'jackandjones', '../product_Images/menpant11.jpg', '../product_Images/menpant12.jpg', '../product_Images/menpant13.jpg', 1200, '2023-12-16 15:57:51', 'true'),
(74, 'Louis Philippe Men Formal Trousers', 'Regular fit Mid-rise Length: regular Pattern: solid   Flat-front, with no pleats design Feature: plain 3 pockets', 'men formal trouser, man trouser, trendy trouser', 'menformal_trouser', 'mango', '../product_Images/menpant21.jpg', '../product_Images/menpant22.jpg', '../product_Images/menpant23.jpg', 1200, '2023-12-16 15:59:14', 'true'),
(75, 'Cantabil Men Formal Trousers', 'Woven formal Regular fit Mid-rise Length: regular Pattern: solid Flat-front, with no pleats design Feature: plain 4 pockets Comes with a belt', 'men fromal trouser, cantabil trouser, man ', 'menformal_trouser', 'pullandbear', '../product_Images/menpant31.jpg', '../product_Images/menpant33.jpg', '../product_Images/menpant33.jpg', 1400, '2023-12-16 16:01:01', 'true'),
(76, 'Men Blue Slim Fit Mid-Rise  Jeans', 'Blue light wash 4-pocket mid-rise jeans, mildly distressed, heavy fade, has a button and zip closure, and waistband with belt loops', 'man jeans, man jeans, trendy man jeans,blue jeans', 'mencasual_jeans', 'mango', '../product_Images/menjeans12.jpg', '../product_Images/menjeans11.jpg', '../product_Images/menjeans13.jpg', 1600, '2023-12-17 13:49:18', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `dateofbirth`, `phoneno`, `user_img`, `gender`, `zipcode`, `address`, `password`, `state`, `city`) VALUES
(1, 'rachna maithani_8122', 'rachna@gmail.com', '2001-06-16', '743993849', '../userimages/rachna maithani.jpg', 'female', '248121', 'shantivihar, ddun', '280dd443f81c028f4472d48462953bf1', 'maharastra', 'Dehradun');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products_ids` varchar(255) NOT NULL,
  `products_sizes` varchar(255) NOT NULL,
  `products_quantities` varchar(255) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`order_id`, `user_id`, `products_ids`, `products_sizes`, `products_quantities`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `payment_mode`, `order_status`) VALUES
(1, 1, '21 52 67 27', 'M L L XXL', '1 1 4 4', 5750, 56098, 4, '17-12-2023 21:56:07', 'offline', 'pending'),
(2, 1, '52 31 65 5 61 60 36', 'M L M M M L L', '1 4 5 1 1 1 1', 11060, 81800, 7, '28-01-2024 12:34:22', 'offline', 'pending'),
(3, 1, '23', 'M', '3', 2750, 76564, 1, '28-01-2024 22:09:58', 'offline', 'complete'),
(4, 1, '62', 'L', '5', 3045, 25389, 1, '28-01-2024 22:30:04', 'offline', 'pending'),
(5, 1, '1', 'L', '3', 4550, 53933, 1, '07-04-2024 10:52:27', 'offline', 'complete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
