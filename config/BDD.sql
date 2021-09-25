-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 02:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competence`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `activite_id_activite` int(11) NOT NULL,
  `activite_drawID` int(11) NOT NULL,
  `activite_nom` text DEFAULT NULL,
  `activite_id_bloc` int(11) NOT NULL,
  `activite_filliere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`activite_id_activite`, `activite_drawID`, `activite_nom`, `activite_id_bloc`, `activite_filliere`) VALUES
(1, 1, 'Gérer le patrimoine informatique', 1, 'Toute'),
(2, 2, 'Répondre aux incidents et aux demandes d’assistance et d’évolution', 1, 'Toute'),
(3, 3, 'Développer la présence en ligne de l’organisation', 1, 'Toute'),
(4, 4, 'Travailler en mode projet', 1, 'Toute'),
(5, 5, 'Mettre à disposition des utilisateurs un service informatique', 1, 'Toute'),
(6, 6, 'Organiser son développement professionnel', 1, 'Toute'),
(13, 1, 'Concevoir et développer une solution applicative (SLAM)', 2, 'SLAM'),
(14, 2, 'Assurer la maintenance corrective ou évolutive d’une solution applicative\r\n (SLAM)', 2, 'SLAM'),
(15, 3, 'Gérer les données (SLAM)\r\n', 2, 'SLAM'),
(16, 1, 'Protéger les données à caractère personnel', 3, 'Toute'),
(17, 2, 'Préserver l\'identité numérique de l’organisation', 3, 'Toute'),
(18, 3, 'Sécuriser les équipements et les usages des utilisateurs', 3, 'Toute'),
(19, 4, 'Garantir la disponibilité, l’intégrité et la confidentialité des services informatiques et des données de l’organisation face à des cyberattaques', 3, 'Toute'),
(20, 5, 'Assurer la cybersécurité d’une solution applicative et de son développement\r\n (SLAM)', 3, 'SLAM'),
(21, 1, 'Concevoir une solution d’infrastructure réseau (SISR)', 2, 'SISR'),
(22, 2, 'Installer, tester et déployer une solution d’infrastructure réseau (SISR)', 2, 'SISR'),
(23, 3, 'Exploiter, dépanner et superviser une solution d’infrastructure réseau (SISR)', 2, 'SISR'),
(24, 1, 'Assurer la cybersécurité d’une infrastructure réseau, d’un système, d’un service (SISR)', 3, 'SISR');

-- --------------------------------------------------------

--
-- Table structure for table `bloc`
--

CREATE TABLE `bloc` (
  `bloc_id_bloc` int(11) NOT NULL,
  `bloc_nom` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloc`
--

INSERT INTO `bloc` (`bloc_id_bloc`, `bloc_nom`) VALUES
(1, '(Bloc 1 - Commun)Support et mise à disposition de services informatiques'),
(2, 'Conception et développement d’applications / Administration des systèmes et des réseaux'),
(3, 'Cybersécurité des services informatiques');

-- --------------------------------------------------------

--
-- Table structure for table `competences`
--

CREATE TABLE `competences` (
  `competence_id_competence` int(11) NOT NULL,
  `competence_drawID` int(11) NOT NULL,
  `competence_nom` text DEFAULT NULL,
  `competence_id_activite` int(11) NOT NULL,
  `competence_filliere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competences`
--

INSERT INTO `competences` (`competence_id_competence`, `competence_drawID`, `competence_nom`, `competence_id_activite`, `competence_filliere`) VALUES
(1, 1, 'Recenser et identifier les ressources numériques', 1, 'Toute'),
(2, 2, 'Exploiter des référentiels, normes et standards adoptés par le prestataire informatique', 1, 'Toute'),
(3, 3, 'Mettre en place et vérifier les niveaux d’habilitation associés à un service', 1, 'Toute'),
(4, 4, 'Vérifier les conditions de la continuité d’un service informatique', 1, 'Toute'),
(5, 5, 'Gérer des sauvegardes', 1, 'Toute'),
(6, 6, 'Vérifier le respect des règles d’utilisation des ressources numériques', 1, 'Toute'),
(7, 1, 'Collecter, suivre et orienter des demandes', 2, 'Toute'),
(8, 2, 'Traiter des demandes concernant les services réseau et système, applicatifs', 2, 'Toute'),
(9, 3, 'Traiter des demandes concernant les applications', 2, 'Toute'),
(10, 1, 'Participer à la valorisation de l’image de l’organisation sur les médias numériques en tenant compte du cadre juridique et des enjeux économiques', 3, 'Toute'),
(11, 2, 'Référencer les services en ligne de l’organisation et mesurer leur visibilité.', 3, 'Toute'),
(12, 3, 'Participer à l’évolution d’un site Web exploitant les données de l’organisation.', 3, 'Toute'),
(13, 1, 'Analyser les objectifs et les modalités d’organisation d’un projet', 4, 'Toute'),
(14, 2, 'Planifier les activités', 4, 'Toute'),
(15, 3, 'Évaluer les indicateurs de suivi d’un projet et analyser les écarts', 4, 'Toute'),
(16, 1, 'Réaliser les tests d’intégration et d’acceptation d’un service', 5, 'Toute'),
(17, 2, 'Déployer un service', 5, 'Toute'),
(18, 3, 'Accompagner les utilisateurs dans la mise en place d’un service', 5, 'Toute'),
(19, 1, 'Mettre en place son environnement d’apprentissage personnel', 6, 'Toute'),
(20, 2, 'Mettre en œuvre des outils et stratégies de veille informationnelle', 6, 'Toute'),
(21, 3, 'Gérer son identité professionnelle', 6, 'Toute'),
(22, 4, 'Développer son projet professionnel', 6, 'Toute'),
(23, 1, 'Analyser un besoin exprimé et son contexte juridique', 13, 'SLAM'),
(24, 2, 'Participer à la conception de l’architecture d’une solution applicative', 13, 'SLAM'),
(25, 3, 'Modéliser une solution applicative', 13, 'SLAM'),
(26, 4, 'Exploiter les ressources du cadre applicatif (framework)', 13, 'SLAM'),
(27, 5, 'Identifier, développer, utiliser ou adapter des composants logiciels', 13, 'SLAM'),
(28, 6, 'Exploiter les technologies Web pour mettre en œuvre les échanges entre applications, y compris de mobilité', 13, 'SLAM'),
(29, 7, 'Utiliser des composants d’accès aux données', 13, 'SLAM'),
(30, 8, 'Intégrer en continu les versions d’une solution applicative', 13, 'SLAM'),
(31, 9, 'Réaliser les tests nécessaires à la validation ou à la mise en production d’éléments adaptés ou développés', 13, 'SLAM'),
(32, 10, 'Rédiger des documentations technique et d’utilisation d’une solution applicative', 13, 'SLAM'),
(33, 11, 'Exploiter les fonctionnalités d’un environnement de développement et de tests', 13, 'SLAM'),
(34, 1, 'Recueillir, analyser et mettre à jour les informations sur une version d’une solution applicative', 14, 'SLAM'),
(35, 2, 'Évaluer la qualité d’une solution applicative', 14, 'SLAM'),
(36, 3, 'Analyser et corriger un dysfonctionnement', 14, 'SLAM'),
(37, 4, 'Mettre à jour des documentations technique et d’utilisation d’une solution applicative', 14, 'SLAM'),
(38, 5, 'Élaborer et réaliser les tests des éléments mis à jour', 14, 'SLAM'),
(39, 1, 'Exploiter des données à l’aide d’un langage de requêtes', 15, 'SLAM'),
(40, 2, 'Développer des fonctionnalités applicatives au sein d’un système de gestion de base de données (relationnel ou non)', 15, 'SLAM'),
(41, 3, 'Concevoir ou adapter une base de données', 15, 'SLAM'),
(42, 4, 'Administrer et déployer une base de données', 15, 'SLAM'),
(43, 1, 'Recenser les traitements sur les données à caractère personnel au sein de l’organisation', 16, 'SLAM'),
(44, 2, 'Identifier les risques liés à la collecte, au traitement, au stockage et à la diffusion des données à caractère personnel', 16, 'SLAM'),
(45, 3, 'Appliquer la réglementation en matière de collecte, de traitement et de conservation des données à caractère personnel', 16, 'SLAM'),
(46, 4, 'Sensibiliser les utilisateurs à la protection des données à caractère personnel', 16, 'SLAM'),
(47, 1, 'Protéger l’identité numérique d’une organisation', 17, 'SLAM'),
(48, 2, 'Déployer les moyens appropriés de preuve électronique', 17, 'SLAM'),
(49, 1, 'Informer les utilisateurs sur les risques associés à l’utilisation d’une ressource numérique et promouvoir les bons usages à adopter', 18, 'SLAM'),
(50, 2, 'Identifier les menaces et mettre en œuvre les défenses appropriées', 18, 'SLAM'),
(51, 3, 'Gérer les accès et les privilèges appropriés', 18, 'SLAM'),
(52, 4, 'Vérifier l’efficacité de la protection', 18, 'SLAM'),
(53, 1, 'Caractériser les risques liés à l’utilisation malveillante d’un service informatique', 19, 'SLAM'),
(54, 2, 'Recenser les conséquences d’une perte de disponibilité, d’intégrité ou de confidentialité', 19, 'SLAM'),
(55, 3, 'Identifier les obligations légales qui s’imposent en matière d’archivage et de protection des données de l’organisation', 19, 'SLAM'),
(56, 4, 'Organiser la collecte et la conservation des preuves numériques', 19, 'SLAM'),
(57, 5, 'Appliquer les procédures garantissant le respect des obligations légales', 19, 'SLAM'),
(58, 1, 'Participer à la vérification des éléments contribuant à la qualité d’un développement informatique', 20, 'SLAM'),
(59, 2, 'Prendre en compte la sécurité dans un projet de développement d’une solution applicative', 20, 'SLAM'),
(60, 3, 'Mettre en œuvre et vérifier la conformité d’une solution applicative et de son développement à un référentiel, une norme ou un standard de sécurité', 20, 'SLAM'),
(61, 4, 'Prévenir les attaques', 20, 'SLAM'),
(62, 5, 'Analyser les connexions (logs)', 20, 'SLAM'),
(63, 6, 'Analyser des incidents de sécurité, proposer et mettre en œuvre des contre-mesures', 20, 'SLAM'),
(64, 1, 'Analyser un besoin exprimé et son contexte juridique ', 21, 'SISR'),
(65, 2, 'Étudier l’impact d’une évolution d’un élément d’infrastructure sur le système informatique', 21, 'SISR'),
(66, 3, 'Élaborer un dossier de choix d’une solution d’infrastructure et rédiger les spécifications techniques  ', 21, 'SISR'),
(67, 4, 'Choisir les éléments nécessaires pour assurer la qualité et la disponibilité d’un service', 21, 'SISR'),
(68, 5, 'Maquetter et prototyper une solution d’infrastructure permettant d’atteindre la qualité de service attendue ', 21, 'SISR'),
(69, 6, 'Déterminer et préparer les tests nécessaires à la validation de la solution d’infrastructure retenue', 21, 'SISR'),
(70, 1, 'Installer et configurer des éléments d’infrastructure ', 22, 'SISR'),
(71, 2, 'Installer et configurer des éléments nécessaires pour assurer la continuité des services ', 22, 'SISR'),
(72, 3, 'Installer et configurer des éléments nécessaires pour assurer la qualité de service ', 22, 'SISR'),
(73, 4, 'Rédiger ou mettre à jour la documentation technique et utilisateur d’une solution d’infrastructure ', 22, 'SISR'),
(74, 5, 'Tester l intégration et l acceptation d une solution d infrastructure ', 22, 'SISR'),
(75, 6, 'Déployer une solution d’infrastructure ', 22, 'SISR'),
(76, 1, 'Administrer sur site et à distance des éléments d’une infrastructure', 23, 'SISR'),
(77, 0, 'Automatiser des tâches d’administration', 23, 'SISR'),
(79, 3, 'Gérer des indicateurs et des fichiers d’activité des éléments d’une infrastructure', 23, 'SISR'),
(80, 4, 'Identifier, qualifier, évaluer et réagir face à un incident ou à un problème', 23, 'SISR'),
(81, 5, 'Évaluer, maintenir et améliorer la qualité d’un service', 23, 'SISR'),
(82, 1, 'Participer à la vérification des éléments contribuant à la sûreté d’une infrastructure informatique', 24, 'SISR'),
(83, 2, 'Prendre en compte la sécurité dans un projet de mise en œuvre d’une solution d’infrastructure', 24, 'SISR'),
(84, 3, 'Mettre en œuvre et vérifier la conformité d’une infrastructure à un référentiel, une norme ou un standard de sécurité', 24, 'SISR'),
(85, 4, 'Prévenir les attaques', 24, 'SISR'),
(86, 5, 'Détecter les actions malveillantes', 24, 'SISR'),
(87, 6, 'Analyser les incidents de sécurité, proposer et mettre en œuvre des contre-mesures', 24, 'SISR');

-- --------------------------------------------------------

--
-- Table structure for table `contexte`
--

CREATE TABLE `contexte` (
  `contexte_id_contexte` int(11) NOT NULL,
  `contexte_contexte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contexte`
--

INSERT INTO `contexte` (`contexte_id_contexte`, `contexte_contexte`) VALUES
(1, 'Atelier'),
(2, 'TP'),
(3, 'Stage 1'),
(4, 'Stage 2'),
(5, 'Personnel');

-- --------------------------------------------------------

--
-- Table structure for table `liens`
--

CREATE TABLE `liens` (
  `lien_id_liens` int(11) NOT NULL,
  `lien_URI` varchar(50) DEFAULT NULL,
  `lien_details` varchar(50) DEFAULT NULL,
  `lien_id_situation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `situation`
--

CREATE TABLE `situation` (
  `situation_id_situation` int(11) NOT NULL,
  `situation_nom` varchar(50) DEFAULT NULL,
  `situation_date_debut` date DEFAULT NULL,
  `situation_details` varchar(500) DEFAULT NULL,
  `situation_date_creation` date DEFAULT NULL,
  `situation_duree` int(11) DEFAULT NULL,
  `situation_type_duree` varchar(50) DEFAULT NULL,
  `situation_etat` tinyint(1) NOT NULL,
  `situation_id_contexte` int(11) DEFAULT NULL,
  `situation_id_user` int(11) NOT NULL,
  `situation_filliere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `id_EGNOM` varchar(255) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `type_de_compte` varchar(50) DEFAULT NULL,
  `filliere` varchar(50) NOT NULL DEFAULT 'Toute'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `id_EGNOM`, `nom`, `prenom`, `mdp`, `type_de_compte`, `filliere`) VALUES
(1, 'admin', 'ETTOUIL2', 'Adel2', 'student', 'administrateur_rh', 'administrateur_RH'),
(2, 'collab', 'ETTOUIL', 'Adel', 'student', 'collaborateur', 'Toute');

-- --------------------------------------------------------

--
-- Table structure for table `viser`
--

CREATE TABLE `viser` (
  `viser_id_situation` int(11) NOT NULL,
  `viser_id_competence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`activite_id_activite`),
  ADD KEY `id_bloc` (`activite_id_bloc`);

--
-- Indexes for table `bloc`
--
ALTER TABLE `bloc`
  ADD PRIMARY KEY (`bloc_id_bloc`);

--
-- Indexes for table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`competence_id_competence`),
  ADD KEY `id_activite` (`competence_id_activite`);

--
-- Indexes for table `contexte`
--
ALTER TABLE `contexte`
  ADD PRIMARY KEY (`contexte_id_contexte`);

--
-- Indexes for table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`lien_id_liens`),
  ADD KEY `id_situation` (`lien_id_situation`);

--
-- Indexes for table `situation`
--
ALTER TABLE `situation`
  ADD PRIMARY KEY (`situation_id_situation`),
  ADD KEY `id_contexte` (`situation_id_contexte`),
  ADD KEY `situation_ibfk_2` (`situation_id_user`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viser`
--
ALTER TABLE `viser`
  ADD PRIMARY KEY (`viser_id_situation`,`viser_id_competence`),
  ADD KEY `id_competence` (`viser_id_competence`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activite`
--
ALTER TABLE `activite`
  MODIFY `activite_id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bloc`
--
ALTER TABLE `bloc`
  MODIFY `bloc_id_bloc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `competences`
--
ALTER TABLE `competences`
  MODIFY `competence_id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `contexte`
--
ALTER TABLE `contexte`
  MODIFY `contexte_id_contexte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `liens`
--
ALTER TABLE `liens`
  MODIFY `lien_id_liens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `situation`
--
ALTER TABLE `situation`
  MODIFY `situation_id_situation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`activite_id_bloc`) REFERENCES `bloc` (`bloc_id_bloc`);

--
-- Constraints for table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`competence_id_activite`) REFERENCES `activite` (`activite_id_activite`);

--
-- Constraints for table `liens`
--
ALTER TABLE `liens`
  ADD CONSTRAINT `liens_ibfk_1` FOREIGN KEY (`lien_id_situation`) REFERENCES `situation` (`situation_id_situation`);

--
-- Constraints for table `situation`
--
ALTER TABLE `situation`
  ADD CONSTRAINT `situation_ibfk_1` FOREIGN KEY (`situation_id_contexte`) REFERENCES `contexte` (`contexte_id_contexte`),
  ADD CONSTRAINT `situation_ibfk_2` FOREIGN KEY (`situation_id_user`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `viser`
--
ALTER TABLE `viser`
  ADD CONSTRAINT `viser_ibfk_1` FOREIGN KEY (`viser_id_situation`) REFERENCES `situation` (`situation_id_situation`),
  ADD CONSTRAINT `viser_ibfk_2` FOREIGN KEY (`viser_id_competence`) REFERENCES `competences` (`competence_id_competence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
