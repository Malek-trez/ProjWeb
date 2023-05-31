-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 mai 2023 à 19:31
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Structure de la table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `buy`
--

INSERT INTO `buy` (`id`, `u_id`, `c_id`) VALUES
(1, 3, 7),
(2, 3, 6),
(3, 3, 6),
(4, 3, 22);

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `license_plate` varchar(15) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `rental_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`car_id`, `brand`, `model`, `license_plate`, `purchase_price`, `rental_price`) VALUES
(1, 'Porsche', '718 Boxter 2024', '223TN2108', 72000.00, 600.00),
(2, 'Porsche', '718 Cayman 2024', '224TN3409', 69950.00, 600.00),
(3, 'Porsche', '911 GT3 RS 2023', '232TN948', 171150.00, 1500.00),
(4, 'Porsche', '911 Turbo 2023', '223TN8472', 184350.00, 1700.00),
(5, 'Porsche', 'Cayenne 2023', '223TN47', 80850.00, 600.00),
(6, 'Aston Martin', 'DB11 2023', '252TN134', 220000.00, 2000.00),
(7, 'Aston Martin', 'DBS 2023', '219TN1345', 333686.00, 2300.00),
(8, 'Aston Martin', 'Valhalla 2024', '242TN7834', 800000.00, 2800.00),
(9, 'Aston Martin', 'Valkyrie 2022', '248TN1840', 3500000.00, 8000.00),
(10, 'Aston Martin', 'One-77 2011', '236TN1764', 1850000.00, 4000.00),
(11, 'Aston Martin', 'Vanquish 2025', '258TN9864', 300000.00, 2300.00),
(12, 'Porsche ', '911 2023 ', '231TN1742', 107550.00, 1000.00),
(13, 'Koenigsegg', 'CC850 2024', '252TN6328', 3650000.00, 8000.00),
(14, 'Koenigsegg', 'Gemera 2024', '221TN9423', 1700000.00, 4000.00),
(15, 'Koenigsegg', 'Jesko 2024', '226TN8117', 3000000.00, 7500.00),
(16, 'Koenigsegg', 'Regera 2016', '234TN6974', 1900000.00, 4000.00),
(17, 'Koenigsegg', 'Agera 2010', '231TN7258', 1500000.00, 3500.00),
(18, 'Koenigsegg', 'CCX 2006', '227TN5430', 700000.00, 2500.00),
(19, 'Rolls-Royce', 'Ghost 2023', '228TN6485', 400000.00, 1500.00),
(20, 'Rolls-Royce', 'Phantom 2023', '233TN9042', 460000.00, 1700.00),
(21, 'Rolls-Royce', 'Spectre 2024', '247TN4426', 400000.00, 1500.00),
(22, 'Rolls-Royce', 'Dawn 2021', '223TN7793', 359250.00, 1500.00),
(23, 'Bugatti', 'Veyron', '253TN9372', 1900000.00, 6000.00),
(24, 'Bugatti', 'Chiron', '250TN1709', 2900000.00, 7500.00),
(25, 'Bugatti', 'Mistral Roadster', '225TN2986', 5000000.00, 9000.00),
(26, 'Bugatti', 'Divo', '232TN6114', 5400000.00, 9500.00),
(27, 'Bugatti', 'Centodieci', '222TN8741', 8600000.00, 10000.00),
(28, 'Bugatti', 'La Voiture Noire', '240TN7210', 12000000.00, 15000.00),
(29, 'Lamborghini', 'Aventador 2022', '237TN8917', 507353.00, 2500.00),
(30, 'Lamborghini', 'Countach 2022', '238TN5429', 2640000.00, 7000.00),
(31, 'Lamborghini', 'Huracan 2023', '235TN4261', 248295.00, 1500.00),
(32, 'Lamborghini', 'Revuelto 2024', '251TN7435', 890000.00, 3500.00),
(33, 'Lamborghini', 'Urus 2024', '246TN9564', 235000.00, 700.00),
(34, 'Lamborghini', 'Sian 2024', '242TN3190', 3000000.00, 7500.00);

-- --------------------------------------------------------

--
-- Structure de la table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `Date_Déb` date NOT NULL,
  `Date_Fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rent`
--

INSERT INTO `rent` (`id`, `u_id`, `c_id`, `Date_Déb`, `Date_Fin`) VALUES
(1, 3, 6, '2023-05-01', '2023-05-06'),
(2, 3, 6, '2023-05-07', '2023-05-09'),
(3, 3, 33, '2023-05-09', '2023-05-10'),
(4, 3, 6, '2023-05-28', '2023-05-31'),
(5, 3, 6, '2023-03-09', '2023-03-21'),
(6, 3, 6, '2023-03-01', '2023-03-05'),
(7, 3, 22, '2023-05-22', '2023-07-14');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `Password` text NOT NULL,
  `Sexe` char(1) NOT NULL,
  `Credits` int(11) NOT NULL DEFAULT 150000 COMMENT 'en DT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`User_ID`, `First_name`, `Last_name`, `email`, `Password`, `Sexe`, `Credits`) VALUES
(3, 'melek', 'gharbi', 'aq635039@gmail.com', 'AAZZEERR', 'H', 49331250),
(4, 'mlele', 'azez', 'anfnhazytkuokvlxut@bvhrk.com', 'aqzsedrftg', 'F', 50000),
(5, 'houaida', 'mangour', 'houaidamangour12@gmail.com', 'houaidamangour', 'F', 50000),
(6, 'Malek', 'Lahouimel', 'sdfdssdf@DFD.com', 'AZERTYUIOP', 'H', 50000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Index pour la table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `cars` (`car_id`);

--
-- Contraintes pour la table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
