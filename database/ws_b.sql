-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 10:10 AM
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
-- Database: `ws_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_telephone` varchar(20) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `is_hide` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_address`, `company_telephone`, `company_email`, `is_hide`, `created_at`, `updated_at`) VALUES
(1, 'Euro Expo', 'Boulevard de l\'Europe, 69680 Chassieu, France', '+33 1 41 56 78 00', 'mail.customerservice.hdq@example.com', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(2, 'Tech Innovators', '123 Tech Park, Silicon Valley, CA, USA', '+1 650 555 1234', 'info@techinnovators.com', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(3, 'Global Logistics', '45 Shipping Lane, Hamburg, Germany', '+49 40 555 6789', 'support@globallogistics.de', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(4, 'Eco Supplies', '89 Green Road, Stockholm, Sweden', '+46 8 555 6789', 'contact@ecosupplies.se', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(5, 'Asia Exporters', '22 Trade Ave, Singapore', '+65 6123 4567', 'sales@asiaexporters.sg', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(6, 'Med Health', '101 Wellness Blvd, London, UK', '+44 20 1234 5678', 'care@medhealth.co.uk', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(7, 'Smart Solutions', '67 Innovate Street, Sydney, Australia', '+61 2 9876 5432', 'hello@smartsolutions.com.au', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(8, 'Foodies Inc', '321 Flavor Rd, Tokyo, Japan', '+81 3 1234 5678', 'info@foodies.jp', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(9, 'Build Corp', '88 Construct Way, Dubai, UAE', '+971 4 333 4567', 'contact@buildcorp.ae', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30'),
(10, 'Fashion Forward', '78 Trend St, Paris, France', '+33 1 2222 3344', 'inquiries@fashionforward.fr', 0, '2024-11-05 08:28:30', '2024-11-05 08:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `company_id`, `name`, `mobile_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Marie Dubois', '+33 6 98 76 54 32', 'm.dubois@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(2, 2, 'Lucas Tremblay', '+33 6 87 65 43 21', 'l.tremblay@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(3, 3, 'Emma Bertrand', '+33 6 76 54 32 10', 'e.bertrand@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(4, 4, 'Louis Lefevre', '+33 6 65 43 21 09', 'l.lefevre@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(5, 5, 'Alice Fontaine', '+33 6 54 32 10 98', 'a.fontaine@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(6, 6, 'Nathan Moreau', '+33 6 43 21 09 87', 'n.moreau@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(7, 7, 'Isabella Laurent', '+33 6 32 10 98 76', 'i.laurent@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(8, 8, 'Leo Renaud', '+33 6 21 09 87 65', 'l.renaud@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(9, 9, 'Chloe Gagnon', '+33 6 10 98 76 54', 'c.gagnon@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(10, 10, 'Henry Dupont', '+33 6 09 87 65 43', 'h.dupont@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `company_id`, `name`, `mobile_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Benjamin Smith', '+33 6 12 34 56 78', 'b.smith@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(2, 2, 'Laura Martin', '+33 6 23 45 67 89', 'l.martin@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(3, 3, 'Michael Brown', '+33 6 34 56 78 90', 'm.brown@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(4, 4, 'Sophie Johnson', '+33 6 45 67 89 01', 's.johnson@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(5, 5, 'Daniel Williams', '+33 6 56 78 90 12', 'd.williams@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(6, 6, 'Emma Wilson', '+33 6 67 89 01 23', 'e.wilson@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(7, 7, 'Lucas Thomas', '+33 6 78 90 12 34', 'l.thomas@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(8, 8, 'Olivia White', '+33 6 89 01 23 45', 'o.white@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(9, 9, 'Ethan Harris', '+33 6 90 12 34 56', 'e.harris@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16'),
(10, 10, 'Mia Lewis', '+33 6 01 23 45 67', 'm.lewis@example.com', '2024-11-05 08:55:16', '2024-11-05 08:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `description_en` text DEFAULT NULL,
  `description_fr` text DEFAULT NULL,
  `gtin` varchar(14) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `country_of_origin` varchar(100) DEFAULT NULL,
  `weight_gross` decimal(5,2) DEFAULT NULL,
  `weight_net` decimal(5,2) DEFAULT NULL,
  `weight_unit` varchar(10) DEFAULT NULL,
  `is_hide` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `name_en`, `name_fr`, `description_en`, `description_fr`, `gtin`, `brand`, `country_of_origin`, `weight_gross`, `weight_net`, `weight_unit`, `is_hide`, `created_at`, `updated_at`) VALUES
(1, 1, 'Organic Apple Juice', 'Jus de pomme biologique', 'Pressed from 100% fresh organic apples.', 'Pressé à partir de pommes biologiques fraîches.', '03000123456789', 'Green Orchard', 'France', 1.10, 1.00, 'L', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(2, 2, 'Whole Wheat Bread', 'Pain complet', 'Made with 100% whole wheat.', 'Fabriqué avec du blé entier à 100 %.', '03000123456790', 'Baker\'s Best', 'Germany', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(3, 3, 'Almond Milk', 'Lait d\'amande', 'Non-dairy milk alternative.', 'Alternative au lait sans produits laitiers.', '03000123456791', 'Nutty Choice', 'USA', 1.10, 1.00, 'L', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(4, 4, 'Organic Honey', 'Miel biologique', '100% pure and organic.', '100 % pur et biologique.', '03000123456792', 'Bee Happy', 'Spain', 0.35, 0.30, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(5, 5, 'Green Tea', 'Thé vert', 'Rich in antioxidants.', 'Riche en antioxydants.', '03000123456793', 'Nature\'s Brew', 'Japan', 0.15, 0.12, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(6, 1, 'Dark Chocolate', 'Chocolat noir', '70% cocoa dark chocolate.', 'Chocolat noir à 70 % de cacao.', '03000123456794', 'Choco Delight', 'Belgium', 0.10, 0.09, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(7, 2, 'Organic Peanut Butter', 'Beurre de cacahuète biologique', 'Smooth and creamy.', 'Lisse et crémeux.', '03000123456795', 'Nut Spread', 'USA', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(8, 3, 'Extra Virgin Olive Oil', 'Huile d\'olive extra vierge', 'Cold pressed.', 'Pressée à froid.', '03000123456796', 'Oliva Gold', 'Italy', 0.75, 0.70, 'L', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(9, 4, 'Brown Rice', 'Riz brun', 'Whole grain rice.', 'Riz complet.', '03000123456797', 'Harvest Fields', 'Thailand', 1.00, 0.95, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(10, 5, 'Coconut Water', 'Eau de coco', 'Hydrating and natural.', 'Hydratant et naturel.', '03000123456798', 'Tropical Sip', 'Philippines', 1.10, 1.00, 'L', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(11, 1, 'Greek Yogurt', 'Yaourt grec', 'High in protein.', 'Riche en protéines.', '03000123456799', 'Dairy Farm', 'Greece', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(12, 2, 'Quinoa', 'Quinoa', 'Gluten-free grain.', 'Grain sans gluten.', '03000123456800', 'Grain Goodness', 'Peru', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(13, 3, 'Organic Bananas', 'Bananes biologiques', 'Rich in potassium.', 'Riche en potassium.', '03000123456801', 'Tropical Orchard', 'Ecuador', 1.20, 1.10, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(14, 4, 'Spaghetti Pasta', 'Pâtes spaghetti', 'Made with durum wheat.', 'Fabriqué avec du blé dur.', '03000123456802', 'Pasta Primo', 'Italy', 0.50, 0.45, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(15, 5, 'Natural Almonds', 'Amandes naturelles', 'Rich in healthy fats.', 'Riche en graisses saines.', '03000123456803', 'Nut Nibbles', 'USA', 0.25, 0.23, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(16, 1, 'Organic Oatmeal', 'Gruau biologique', 'High in fiber.', 'Riche en fibres.', '03000123456804', 'Oats & Co', 'Canada', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(17, 2, 'Raw Honey', 'Miel brut', 'Unfiltered raw honey.', 'Miel brut non filtré.', '03000123456805', 'Honey Haven', 'Mexico', 0.35, 0.30, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(18, 3, 'Green Peas', 'Pois verts', 'Good source of protein.', 'Bonne source de protéines.', '03000123456806', 'Farm Fresh', 'France', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(19, 4, 'Chia Seeds', 'Graines de chia', 'Rich in omega-3.', 'Riche en oméga-3.', '03000123456807', 'Super Seed', 'Bolivia', 0.20, 0.18, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(20, 5, 'Tomato Paste', 'Pâte de tomate', 'Rich tomato flavor.', 'Saveur de tomate riche.', '03000123456808', 'Red Harvest', 'Italy', 0.40, 0.35, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(21, 1, 'Organic Coconut Oil', 'Huile de coco biologique', 'Cold-pressed coconut oil.', 'Huile de coco pressée à froid.', '03000123456809', 'Coco Pure', 'Sri Lanka', 0.50, 0.45, 'L', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(22, 2, 'Black Beans', 'Haricots noirs', 'Good source of fiber.', 'Bonne source de fibres.', '03000123456810', 'Bean Brothers', 'Brazil', 1.00, 0.95, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(23, 3, 'Maple Syrup', 'Sirop d\'érable', '100% pure maple syrup.', 'Sirop d\'érable 100 % pur.', '03000123456811', 'Sweet Maple', 'Canada', 0.35, 0.30, 'L', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(24, 4, 'Organic Spinach', 'Épinards biologiques', 'Fresh organic spinach.', 'Épinards biologiques frais.', '03000123456812', 'Green Leaf', 'USA', 0.30, 0.25, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(25, 5, 'Sesame Seeds', 'Graines de sésame', 'Rich in minerals.', 'Riche en minéraux.', '03000123456813', 'Seedly', 'India', 0.20, 0.18, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(26, 1, 'Frozen Strawberries', 'Fraises surgelées', '100% fresh frozen strawberries.', '100 % fraises fraîches surgelées.', '03000123456814', 'Berry Best', 'Chile', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(27, 2, 'Brown Lentils', 'Lentilles brunes', 'Great for soups and salads.', 'Idéal pour les soupes et les salades.', '03000123456815', 'Pulse Plus', 'India', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(28, 3, 'Whole Almonds', 'Amandes entières', 'High in healthy fats.', 'Riche en graisses saines.', '03000123456816', 'Nut Harvest', 'USA', 0.25, 0.23, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(29, 4, 'Sweet Corn', 'Maïs doux', 'Crispy and sweet.', 'Croustillant et sucré.', '03000123456817', 'Golden Corn', 'Argentina', 1.00, 0.95, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(30, 5, 'Dried Apricots', 'Abricots secs', 'Rich in fiber.', 'Riche en fibres.', '03000123456818', 'Fruit Haven', 'Turkey', 0.20, 0.18, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(31, 1, 'Sunflower Seeds', 'Graines de tournesol', 'Rich in vitamins.', 'Riche en vitamines.', '03000123456819', 'Sunny Seed', 'Russia', 0.25, 0.23, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(32, 2, 'Oregano', 'Origan', 'Organic oregano leaves.', 'Feuilles d\'origan biologiques.', '03000123456820', 'Herb Haven', 'Greece', 0.05, 0.04, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(33, 3, 'Cashew Nuts', 'Noix de cajou', 'Rich and buttery.', 'Riche et beurré.', '03000123456821', 'Nut Nature', 'Vietnam', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(34, 4, 'Cumin Powder', 'Poudre de cumin', 'Ground cumin spice.', 'Épice de cumin moulu.', '03000123456822', 'Spice Rack', 'India', 0.20, 0.18, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(35, 5, 'Dried Cranberries', 'Cranberries séchées', 'Naturally sweetened.', 'Naturellement sucré.', '03000123456823', 'Berry Fields', 'USA', 0.20, 0.18, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(36, 1, 'Organic Rice Milk', 'Lait de riz biologique', 'Non-dairy milk.', 'Lait sans produits laitiers.', '03000123456824', 'Green Choice', 'USA', 1.10, 1.00, 'L', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(37, 2, 'Chickpeas', 'Pois chiches', 'Versatile and nutritious.', 'Polyvalent et nutritif.', '03000123456825', 'Pulse Pride', 'Turkey', 1.00, 0.95, 'kg', 1, '2024-11-05 09:06:38', '2024-11-05 09:06:38'),
(38, 3, 'Coconut Sugar', 'Sucre de coco', 'Low glycemic sweetener.', 'Édulcorant à faible indice glycémique.', '03000123456826', 'Sweet Life', 'Philippines', 0.50, 0.45, 'kg', 0, '2024-11-05 09:06:38', '2024-11-05 09:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gtin` (`gtin`),
  ADD KEY `fk_company_id` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
