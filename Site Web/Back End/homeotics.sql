-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 10 nov. 2022 à 08:27
-- Version du serveur :  8.0.31
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `homeotics`
--

-- --------------------------------------------------------

--
-- Structure de la table `Clients`
--

CREATE TABLE `Clients` (
  `idClient` int NOT NULL COMMENT 'Identifiant client',
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nom client',
  `prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Prénom client',
  `nomUtilisateur` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nom d''utilisateur du opte client.',
  `motDePasse` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Mot de passe du compte client.',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Adresse email du client.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Clients`
--

INSERT INTO `Clients` (`idClient`, `nom`, `prenom`, `nomUtilisateur`, `motDePasse`, `email`) VALUES
(1, 'Bonhomme', 'Patrice', 'PB', '$2y$10$1pAcvFJFnbSETrTwI5BCO.gfu7bgos6cIpb3PldOKcm45HkfLkE.6', 'INSA CVL Blois (41)'),
(2, 'Reglade', 'Stéphanie', '', '', 'Appart\'City'),
(4, 'Gates', 'Bill', 'BillGates', '$2y$10$Rc3U/5ujue7UkhNQUCgdy.u5WJPyVh2TF.4zC71v26h8r7LieQMru', 'Seatle');

-- --------------------------------------------------------

--
-- Structure de la table `LogsProduit`
--

CREATE TABLE `LogsProduit` (
  `idLog` int NOT NULL COMMENT 'Identifiant log',
  `refProduit` int NOT NULL COMMENT 'Référence vers produit emetteur',
  `action` enum('UP','DOWN') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'État vers lequel le produit vient de basculer.',
  `dateTime` datetime NOT NULL COMMENT 'Date et heure d''émission du log.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `LogsProduit`
--

INSERT INTO `LogsProduit` (`idLog`, `refProduit`, `action`, `dateTime`) VALUES
(1, 1, 'UP', '2022-10-01 12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Produits`
--

CREATE TABLE `Produits` (
  `idProduit` int NOT NULL COMMENT 'Identifiant produit',
  `refClient` int NOT NULL COMMENT 'Référence vers client propriétaire',
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nom produit',
  `piece` enum('CUISINE','CHAMBRE','SALLE DE BAIN','SALON') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Pièce associée au produit.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Produits`
--

INSERT INTO `Produits` (`idProduit`, `refClient`, `nom`, `piece`) VALUES
(1, 1, 'Reveil Connecté', 'CHAMBRE'),
(2, 2, 'Machine à laver', 'SALLE DE BAIN'),
(3, 4, 'Cafetière', 'CUISINE'),
(4, 4, 'Frigo', 'CUISINE'),
(5, 4, 'Oreiller connecté', 'CHAMBRE'),
(6, 4, 'Batteur connecté', 'CUISINE'),
(7, 4, 'Couette connectée', 'CHAMBRE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `LogsProduit`
--
ALTER TABLE `LogsProduit`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `appartenance Log/Produit` (`refProduit`);

--
-- Index pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `appartenance Produit/Client` (`refClient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `idClient` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant client', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `LogsProduit`
--
ALTER TABLE `LogsProduit`
  MODIFY `idLog` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant log', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `idProduit` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant produit', AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `LogsProduit`
--
ALTER TABLE `LogsProduit`
  ADD CONSTRAINT `appartenance Log/Produit` FOREIGN KEY (`refProduit`) REFERENCES `Produits` (`idProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD CONSTRAINT `appartenance Produit/Client` FOREIGN KEY (`refClient`) REFERENCES `Clients` (`idClient`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
