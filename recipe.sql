-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 28 mars 2023 à 12:37
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recipe`
--

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `idRecipe` int(10) NOT NULL,
  `titleRecipe` text NOT NULL,
  `authorRecipe` text NOT NULL,
  `descRecipe` text NOT NULL,
  `datePubRecipe` date NOT NULL DEFAULT current_timestamp(),
  `idUsers` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`idRecipe`, `titleRecipe`, `authorRecipe`, `descRecipe`, `datePubRecipe`, `idUsers`) VALUES
(5, 'Spaghetti au mirtille chinoise', 'boni jean', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 1),
(6, 'caviar au vain italien', 'boni jean', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 1),
(7, 'Pate noire au poisson', 'boni jean', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 1),
(8, 'Salade de fruit', 'boni jean', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 1),
(9, 'Gbomiwo à la dinde', 'boni jean', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 1),
(10, 'Gbomiwo à la dinde', 'boni jean', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 1),
(11, 'Igname Pilé', 'Bérénice', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 3),
(12, 'Salade de fruit', 'Bérénice', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 3),
(13, 'Grillade ', 'Bérénice', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 3),
(14, 'Sauce Tomate', 'Bérénice', 'Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien. Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien Melanger le spagheti au mirtille avec du chinchard indien', '2023-02-26', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int(10) NOT NULL,
  `nameUsers` text NOT NULL,
  `mailUsers` text NOT NULL,
  `mdpUsers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `nameUsers`, `mailUsers`, `mdpUsers`) VALUES
(1, 'boni jean', 'boni@gmail.com', 'boni@@'),
(2, 'jean', 'jean@gmail.com', 'jean@@'),
(3, 'Bérénice', 'berenice@gmail.com', 'berenice@@'),
(4, 'DJOGBE Hermès', 'hermes@gmail.com', 'hermes@@');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`idRecipe`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `idRecipe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
