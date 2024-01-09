-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 jan. 2024 à 09:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(11) NOT NULL,
  `categorie` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('Auteur','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wiki`
--

CREATE TABLE `wiki` (
  `wiki_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `date_wiki` int(11) NOT NULL,
  `picture` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wikitag`
--

CREATE TABLE `wikitag` (
  `wiki_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`wiki_id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `wikitag`
--
ALTER TABLE `wikitag`
  ADD KEY `wiki_id` (`wiki_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `wiki_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`categorie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wikitag`
--
ALTER TABLE `wikitag`
  ADD CONSTRAINT `wikitag_ibfk_1` FOREIGN KEY (`wiki_id`) REFERENCES `wiki` (`wiki_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikitag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
