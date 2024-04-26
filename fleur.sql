-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 12:54 AM
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
-- Database: `fleur`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `mp`) VALUES
(4, 'Kefi', 'Oussama', 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `image`, `createur`, `date_creation`, `date_modification`) VALUES
(22, 'Seasonal Blooms    ', '  Flowers that are in season, offering a variety of options throughout the year.  ', '2.png    ', 4, '2024-04-25', '2024-04-27'),
(21, 'Rose Collection', 'Different varieties and colors of roses, symbolizing love, passion, and beauty.', 'Rose Collection.png', 4, '2024-04-25', '0000-00-00'),
(23, 'Mixed Bouquets', 'Arrangements featuring a mix of different flowers for diverse occasions.', 'Mixed.webp', 4, '2024-04-26', '0000-00-00'),
(24, 'Artisanal Arrangements', 'Handcrafted and unique arrangements showcasing the florist\'s creativity and skill.', '8fe4f8fc-1573-4a6c-901b-1db11cbbef73.webp', 4, '2024-04-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` float NOT NULL,
  `panier` int(11) NOT NULL,
  `date_modification` date NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `produit`, `quantite`, `total`, `panier`, `date_modification`, `date_creation`) VALUES
(8, 1, 2, 2462, 2, '0000-00-00', '2024-04-19'),
(9, 4, 3, 21000, 3, '0000-00-00', '2024-04-19'),
(10, 1, 1, 1231, 4, '0000-00-00', '2024-04-21'),
(11, 1, 1, 1231, 5, '0000-00-00', '2024-04-21'),
(12, 25, 2, 24, 6, '0000-00-00', '2024-04-26'),
(13, 17, 1, 28, 7, '0000-00-00', '2024-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `visiteur` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'En cours',
  `date_creation` date NOT NULL,
  `date_modificatiion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `visiteur`, `total`, `etat`, `date_creation`, `date_modificatiion`) VALUES
(6, 21, 24, 'livraison terminer', '2024-04-26', '2024-04-26'),
(7, 21, 28, 'En cours', '2024-04-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `categorie` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `description`, `image`, `categorie`, `stock`, `date_creation`, `date_modification`) VALUES
(17, 'Autumn Harvest Arrangement  ', 28, ' Rich hues of orange, red, and yellow with roses, dahlias, and autumn leaves. ', '3b65a9dd-d61a-49cb-a1c5-201f67059bd9.png  ', 22, 6, '2024-04-26', '2024-04-27'),
(15, 'Spring Blossom Bouquet', 30, 'Featuring tulips, daffodils, and hyacinths in vibrant spring colors.', 'e2373050-9558-489a-a284-41cd1e54cd27.png', 22, 12, '2024-04-26', '0000-00-00'),
(16, 'Summer Garden Delight', 25, 'A mix of sunflowers, daisies, and zinnias, capturing the essence of a summer garden.', 'bouquet-sunflowers-260nw-411412912.webp', 22, 10, '2024-04-26', '0000-00-00'),
(18, 'Winter Wonderland Bouquet', 18, 'White roses, pinecones, and evergreen sprigs, reminiscent of a snowy landscape.', '7d319355-0a38-415e-8967-a851e1d83174.webp', 22, 10, '2024-04-26', '0000-00-00'),
(19, 'Classic Red Roses', 12, 'A dozen long-stemmed red roses, symbolizing love and passion.', 'Rose Collection.png', 21, 10, '2024-04-26', '0000-00-00'),
(22, 'Rainbow Rose Bouquet', 12, 'Multicolored roses in vibrant hues, adding a playful and cheerful touch.', '09e1092c-c006-44f8-9753-95868d711052.webp', 21, 10, '2024-04-26', '0000-00-00'),
(21, 'White Elegance Arrangement', 12, 'White roses accented with lush greenery for a timeless and sophisticated feel.', '7d319355-0a38-415e-8967-a851e1d83174.webp', 21, 10, '2024-04-26', '0000-00-00'),
(23, 'Pink Perfection Bouquet    ', 12, ' Pink roses ', '3a66ae2e-0e5a-41a2-add1-42c8e3f766f6.webp      ', 21, 10, '2024-04-26', '2024-04-26'),
(24, 'Enchanted Garden Bouquet', 25, 'A mix of roses, lilies, and wildflowers for a whimsical and natural look.', 'FYF-141.webp', 23, 5, '2024-04-26', '0000-00-00'),
(25, 'Country Charm Bouquet', 12, 'Rustic mix of sunflowers, daisies, and lavender, perfect for a farmhouse aesthetic.', 'T52-3.webp', 23, 10, '2024-04-26', '0000-00-00'),
(26, 'Bohemian Bliss Bouquet', 16, 'A free-spirited mix of wildflowers, feathers, and dried grasses, perfect for boho-themed events.', 'TEV68-3.webp', 24, 3, '2024-04-26', '0000-00-00'),
(27, 'Bohemian Bliss Bouquet', 18, 'A free-spirited mix of wildflowers, feathers, and dried grasses, perfect for boho-themed events.', 'F-669.webp', 24, 0, '2024-04-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `etat` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `prenom`, `mp`, `email`, `telephone`, `etat`) VALUES
(21, 'Kefi', 'Oussama', '25d55ad283aa400af464c76d713c07ad', 'kefioussama85@gmail.com', '29220545', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
