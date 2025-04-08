-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 août 2022 à 09:55
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aeek_kassere`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `date_admin` datetime DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `nom` varchar(225) NOT NULL,
  `prenom` varchar(225) NOT NULL,
  `email_valid` int(1) NOT NULL DEFAULT 0,
  `mot_de_passe` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `iso_phone` varchar(225) DEFAULT NULL,
  `dial_phone` varchar(225) DEFAULT NULL,
  `fonction` varchar(225) DEFAULT NULL,
  `niveau` varchar(225) DEFAULT NULL,
  `biographie` varchar(225) DEFAULT NULL,
  `facebook` varchar(225) DEFAULT NULL,
  `twitter` varchar(225) DEFAULT NULL,
  `linkedin` varchar(225) DEFAULT NULL,
  `instagram` varchar(225) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `role` int(1) DEFAULT 0,
  `bloquer` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `date_admin`, `email`, `nom`, `prenom`, `email_valid`, `mot_de_passe`, `slug`, `phone`, `iso_phone`, `dial_phone`, `fonction`, `niveau`, `biographie`, `facebook`, `twitter`, `linkedin`, `instagram`, `photo`, `role`, `bloquer`) VALUES
(1, '2022-05-30 11:14:40', 'zie.nanien@gmail.com', 'Ouattara', 'Gnelezie', 1, '$2y$12$pOGTVYKlboX25jpPsGfnbO5swWhVQW05ejZ9U0sUjw9NhmYVjYzH.', 'ouattara', '0546859936', 'ci', '225', 'D&eacute;veloppeur web', '', 'e lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu\\\'il est p', '', '', '', '', '62948daa2bc12.jpg', 1, 1),
(2, '2022-06-05 19:00:00', 'octavie@gmail.com', 'Gnelezie Arouna', 'Ouattara', 0, NULL, 'gnelezie-arouna', '000000000', 'ci', '225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `date_article` datetime NOT NULL,
  `titre` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `tags_id` varchar(50) DEFAULT NULL,
  `categorie` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `couverture` varchar(225) DEFAULT NULL,
  `statut` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `date_article`, `titre`, `slug`, `categorie_id`, `tags_id`, `categorie`, `user_id`, `description`, `couverture`, `statut`) VALUES
(1, '2022-05-30 09:32:00', '&Eacute;liminatoires CAN 2023/1er entra&icirc;nement de Gasset avec les &Eacute;l&eacute;phants mercredi', 'eliminatoires-can-20231er-entrainement-de-gasset-avec-les-elephants-mercredi', 4, NULL, NULL, 1, '<p>Abidjan- Le nouveau sélectionneur des Éléphants footballeurs, Jean-Louis Gasset, effectue son premier entraînement avec les pachydermes, mercredi, en vue du match Côte d\'Ivoire-Zambie comptant pour la 1ère journée des éliminatoires de la CAN 2023. Le technicien français aura son premier contact avec les Eléphants le 1er juin à Sol Béni, à Abidjan, et son second entraînement, le lendemain au stade de Yamoussoukro avant le match Côte d\'Ivoire-Zambie, le 3 juin 2022. Le nouveau sélectionneur des Éléphants footballeurs, le Français Jean-Louis Gasset, a convoqué 25 joueurs pour les matchs de la première et de la deuxième journée des éliminatoires de la CAN 2023. Arrivé mercredi à Abidjan, cinq jours après sa nomination pour prendre fonction, Gasset rentre en scène avec son staff en dévoilant la liste des pachydermes, pour la première journée des éliminatoires de la CAN 2023 face aux Chipolopolo de la Zambie, le 3 juin 2022 à Yamoussoukro. Pour la deuxième journée des éliminatoires de la CAN 2023, le 9 juin 2022, les Éléphants seront en déplacement en Afrique du Sud pour affronter les Crocodiles du Lesotho. M. Gasset a été nommé le 20 mai 2022 à la suite d\'un appel à candidature qui a mis aux prises 22 entraîneurs.<br></p>', '62948f38b7450.jpg', 0),
(2, '2022-05-30 09:34:00', 'C&ocirc;te d&rsquo;ivoire /Paix et coh&eacute;sion sociale: le ministre KKB re&ccedil;oit une d&eacute;l&eacute;gation des mouvements politiques', 'cote-divoire-paix-et-cohesion-sociale-le-ministre-kkb-recoit-une-delegation-des-mouvements-politiques', 2, NULL, NULL, 1, '<p>Le ministre de la Réconciliation nationale Kouadio Konan Bertin a reçu en audience ce lundi 23 mai 2022, le président de l’Alliance des Ivoiriens pour la Démocratie (AID), Zadi Djédjé et une délégation des mouvements politiques (PACI et UMPP) qui ont pris part au dialogue politique. Au menu de cette rencontre, le suivi des recommandations du dialogue politique. « Nous sommes venus ce matin, pour dire au ministre de la Réconciliation, que nous sommes à sa disposition pour le suivi des recommandations dans l’intérêt de notre pays, la Côte d’Ivoire », a indiqué Zadi Djédjé. Aux dires de Zadi Djédjé, le ministre Kouadio Konan Bertin a rassuré qu’il mettra un comité sur pied afin que son ministère et les différents partis politiques essaient de voir ce qu’ils peuvent faire ensemble pour ces recommandations. Ce fut l’occasion pour Zadi Djédjé et ces mouvements politiques, de féliciter le ministre de la Réconciliation, Kouadio Konan Bertin pour son travail, à veiller à ce que les fils de ce pays soient réconciliés. Aussi, a-t-il invité les acteurs du pays à louer et accompagner les actions du ministre de la Réconciliation pour que le pays retrouve la joie de vivre comme au temps du fondateur Félix Houphouët Boigny. « Un ministre qui travaille, un ministre qui apporte son expérience pour que notre pays se réconcilie parce que la Côte d’Ivoire a besoin de se réconcilier. On ne peut pas rester dans un cycle de violence », soutient-il. Le ministre KKB a pour sa part salué et encouragé le président de l’AID et sa délégation pour leurs engagements à vouloir œuvrer pour le changement des choses afin que l’union des Ivoiriens soit palpable. « Ce matin, ils sont venus nous rendre visite, habités par le souci de voir les choses avancer. Ils sont venus prendre toute leur part dans le processus de réconciliation que je conduis », a confié le ministre, avant d\'ajouter qu’il verrait ensemble comment conduire les sujets qui relèvent de son ministère.<br></p>', '62948f9f0e4ae.jpg', 0),
(3, '2022-05-30 09:39:00', 'Le VP Meyliet Kon&eacute; invite ses &laquo; parents &raquo; &agrave; un &laquo; soutien ind&eacute;fectible &raquo; aux actions de d&eacute;veloppement du pr&eacute;sident Ouattara', 'le-vp-meyliet-kone-invite-ses-parents-a-un-soutien-indefectible-aux-actions-de-developpement-du-president-ouattara', 2, NULL, NULL, 1, '<p>Tafiré, Le vice-président de la République de Côte d’Ivoire, Tiémoko Meyliet Koné, invite ses « parents » des sous-préfectures de Tafiré, Badikaha et Niédiékaha (Centre-nord, région du Hambol) à un « soutien indéfectible » aux actions de développement du pays du Président Alassane Ouattara. « Des chantiers sont en cours. D’autres s’ouvriront bientôt car les défis sont encore nombreux. Les responsabilités qui nous attendent sont de plus en plus lourdes. Notre engagement commun de transformer radicalement la Côte d’Ivoire en une nation qui compte, qui s’inscrit définitivement et durablement vers le succès et la gloire, ne saurait aboutir sans votre adhésion et votre soutien indéfectible », a déclaré M. Meyliet Koné, lors d’une rencontre le samedi 21 mai 2022 à Tafiré, avec les populations locales. « Je vous prie de bien vouloir vous inscrire avec nous dans cette vision en partageant avec le gouvernement, le président de la République et moi-même, vos meilleures ondes positives, vos vœux ardents, vos belles évocation et invocation afin que le Maître du destin, l’Omnipotent et l’Omniscient nous comble des forces et outils nécessaires pour réussir cette mission », a poursuivi le vice-président qui effectuait une « visite familiale à Tafiré, sa ville natale. Cette première visite sur ses terres d’origine depuis sa nomination au poste de vice-président de la République vise, pour Tiémoko Koné, à « solliciter (les) prières et bénédictions (des parents) pour être à la hauteur des attentes légitimes du Président et des populations ». « Merci pour ce que vous avez fait hier. Merci pour ce que vous faites aujourd’hui. Et merci pour ce que vous ferez demain pour aider le Président Alassane Ouattara et son gouvernement à mener à bon port le vaisseau ivoirien », a-t-il lancé à l’adresse de l’assistance, en présence du ministre d’Etat, ministre de la Défense Téné Birahima Ouattara. Le vice-président a par ailleurs procédé, le même jour en fin d\'après-midi, à la pose de la première pierre de la seconde phase d\'une promotion immobilière à Tafiré. Précédemment gouverneur de la Banque centrale des Etat de l’Afrique de l’Ouest (BCEAO), Tiémoko Meyliet Koné, 73 ans, fut également ministre de la Construction, de l’Urbanisme et de l’Habitat de Côte d’Ivoire de 2010 à 2011.<br></p>', '629490e3937c4.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `article_tags`
--

CREATE TABLE `article_tags` (
  `id_article_tags` int(11) NOT NULL,
  `date_article_tags` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_tags`
--

INSERT INTO `article_tags` (`id_article_tags`, `date_article_tags`, `article_id`, `tag_id`) VALUES
(1, '2022-05-30 09:32:00', 1, 9),
(2, '2022-05-30 09:32:00', 1, 8),
(3, '2022-05-30 09:32:00', 2, 7),
(4, '2022-05-30 09:34:00', 2, 9),
(5, '2022-05-30 09:34:00', 4, 7),
(6, '2022-05-30 09:34:00', 5, 6),
(7, '2022-05-30 09:34:00', 6, 5),
(8, '2022-05-30 09:39:00', 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `banniere`
--

CREATE TABLE `banniere` (
  `id_banniere` int(11) NOT NULL,
  `date_banniere` datetime NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `sous_titre` varchar(100) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `banniere`
--

INSERT INTO `banniere` (`id_banniere`, `date_banniere`, `titre`, `sous_titre`, `photo`, `statut`) VALUES
(1, '2022-05-30 09:18:00', 'Bienvenue sur la plateforme', 'Une plateforme qui vous donne toutes les informations sur l\\\'AEEK', '62948bef30452.jpg', 0),
(2, '2022-05-30 09:21:00', 'La plateforme d\\\'autoformation des &eacute;l&egrave;ves', 'Une plateforme qui propose des exercices auto-formation', '62948ca9e1d5f.jpg', 0),
(3, '2022-05-30 09:23:00', 'Une famille uni pour le d&eacute;veloppement de Kass&eacute;r&eacute;', 'Une plateforme qui fait la promotion la coh&eacute;sion social', '62948d0a9e20f.jpg', 0),
(4, '2022-05-30 09:23:00', 'Une famille uni pour le d&eacute;veloppement de Kass&eacute;r&eacute;', 'Une plateforme qui fait la promotion la coh&eacute;sion social', '62948d0aae97b.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `date_categorie` datetime DEFAULT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `date_categorie`, `nom`, `slug`) VALUES
(1, '2022-05-02 21:40:00', 'Soci&eacute;t&eacute;', 'societe'),
(2, '2022-05-02 21:40:00', 'Politique', 'politique'),
(3, '2022-05-02 21:40:00', 'Informatique', 'informatique'),
(4, '2022-05-10 08:16:00', 'Sport', 'sport'),
(5, '2022-05-10 08:16:00', 'Sant&eacute;', 'sante'),
(6, '2022-05-10 08:16:00', 'Economie', 'economie'),
(8, '2022-05-22 10:13:00', 'Culture', 'culture'),
(9, '2022-05-24 10:00:00', 'Soci&eacute;t&eacute;', 'societe-1'),
(10, '2022-05-24 10:00:00', 'Soci&eacute;t&eacute;', 'societe-2');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `date_comment`, `article_id`, `nom`, `email`, `message`, `statut`) VALUES
(1, '2022-06-05 15:35:00', 3, 'yougone', 'wordpress@cinnove.com', 'Etat de l&rsquo;Afrique de l&rsquo;Ouest (BCEAO), Ti&eacute;moko Meyliet Kon&eacute;, 73 ans, fut &eacute;galement ministre de la Construction, de l&rsquo;Urbanisme et de l&rsquo;Habitat de', 0);

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

CREATE TABLE `emplois` (
  `id_emplois` int(11) NOT NULL,
  `date_emplois` datetime NOT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `lien_detail` varchar(225) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `type_offre` int(11) NOT NULL,
  `logo` varchar(225) DEFAULT NULL,
  `ville` varchar(225) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id_emplois`, `date_emplois`, `nom`, `slug`, `lien_detail`, `date_debut`, `date_fin`, `description`, `type_offre`, `logo`, `ville`, `statut`) VALUES
(1, '2022-06-05 14:32:00', 'Stagiaire secr&eacute;taire', 'stagiaire-secretaire', 'https://agenceemploijeunes.ci/site/offres-emplois/20904', '2022-06-03', '2022-06-06', 'Place et r&eacute;dige les courriers Archivage des documents Gestion des fournitures du service et mat&eacute;riels de bureau', 1, '629cbe6e6819e.png', 'Seguelon', 0),
(2, '2022-06-05 14:34:00', 'Stagiaire technicien en b&acirc;timent', 'stagiaire-technicien-en-batiment', 'https://agenceemploijeunes.ci/site/offres-emplois/20905', '2022-06-03', '2022-06-06', '&Eacute;pauler le responsable technique de la Mairie Savoir tenir le registre du domaine tenir le registre de suivi des man&oelig;uvres', 1, '629cbe6e6819e.png', 'Madinani', 0);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_events` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `date_events` date NOT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id_events`, `created_date`, `date_events`, `nom`, `slug`) VALUES
(1, '2022-06-05 15:28:00', '2021-08-25', 'AEEK 2021', 'aeek-2021');

-- --------------------------------------------------------

--
-- Structure de la table `gallerie`
--

CREATE TABLE `gallerie` (
  `id_gallerie` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `date_gallerie` datetime DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallerie`
--

INSERT INTO `gallerie` (`id_gallerie`, `event_id`, `date_gallerie`, `photo`) VALUES
(1, 1, '2022-06-05 15:29:00', '629ccbc553480.jpeg'),
(2, 1, '2022-06-05 15:29:00', '629ccbc95d45b.jpeg'),
(3, 1, '2022-06-05 15:29:00', '629ccbce6529e.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `date_membre` datetime DEFAULT NULL,
  `email` text DEFAULT NULL,
  `email_valid` int(11) DEFAULT 0,
  `slug` text DEFAULT NULL,
  `mot_de_passe` varchar(225) DEFAULT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `prenom` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `date_membre`, `email`, `email_valid`, `slug`, `mot_de_passe`, `nom`, `prenom`) VALUES
(1, '2022-08-08 09:48:00', 'zie.nanien@gmail.com', 0, 'ouattara', '$2y$12$RzFZSyUrGAbOe9wXcVd7NudvxfnaodhPu4MIP2IvfeXm25sqqr2G6', 'Gnelezie Arouna', 'Ouattara');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` int(11) NOT NULL,
  `date_reponse` datetime DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stats_visite`
--

CREATE TABLE `stats_visite` (
  `ip` varchar(30) NOT NULL,
  `date_visite` date NOT NULL,
  `navigateur` varchar(55) DEFAULT NULL,
  `devices` varchar(55) DEFAULT NULL,
  `pages_vues` smallint(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stats_visite`
--

INSERT INTO `stats_visite` (`ip`, `date_visite`, `navigateur`, `devices`, `pages_vues`) VALUES
('::1', '2022-05-21', 'Chrome', 'pc', 17),
('127.0.0.1', '2022-05-21', 'Firefox', 'pc', 2),
('::1', '2022-05-22', 'Chrome', 'pc', 59),
('::1', '2022-05-24', 'Chrome', 'pc', 7),
('::1', '2022-05-25', 'Chrome', 'pc', 8),
('::1', '2022-05-27', 'Chrome', 'pc', 7),
('::1', '2022-05-28', 'Chrome', 'pc', 29),
('::1', '2022-05-30', 'Chrome', 'pc', 20),
('::1', '2022-05-31', 'Chrome', 'pc', 35),
('127.0.0.1', '2022-05-31', 'Firefox', 'pc', 9),
('::1', '2022-06-02', 'Chrome', 'pc', 2),
('::1', '2022-06-05', 'Chrome', 'pc', 26),
('::1', '2022-06-06', 'Chrome', 'pc', 51),
('::1', '2022-08-03', 'Chrome', 'pc', 3),
('::1', '2022-08-04', 'Chrome', 'pc', 3),
('::1', '2022-08-08', 'Chrome', 'pc', 16);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `date_tag` datetime NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  `slug` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id_tag`, `date_tag`, `nom`, `slug`) VALUES
(1, '2022-05-22 06:48:00', 'Politique', 'politique'),
(2, '2022-05-22 06:48:00', 'Association', 'association'),
(3, '2022-05-22 06:48:00', 'Paix', 'paix'),
(4, '2022-05-22 06:48:00', 'Soci&eacute;t&eacute;', 'societe'),
(5, '2022-05-22 06:49:00', 'Ecole', 'ecole'),
(6, '2022-05-22 06:49:00', '&eacute;ducation', 'education'),
(7, '2022-05-22 06:49:00', 'Solidarit&eacute;', 'solidarite'),
(8, '2022-05-22 06:50:00', 'Finance', 'finance'),
(9, '2022-05-22 06:50:00', 'Argent', 'argent'),
(10, '2022-05-22 06:51:00', 'D&eacute;veloppement', 'developpement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id_article_tags`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `banniere`
--
ALTER TABLE `banniere`
  ADD PRIMARY KEY (`id_banniere`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `article_id` (`article_id`);

--
-- Index pour la table `emplois`
--
ALTER TABLE `emplois`
  ADD PRIMARY KEY (`id_emplois`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_events`);

--
-- Index pour la table `gallerie`
--
ALTER TABLE `gallerie`
  ADD PRIMARY KEY (`id_gallerie`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `email` (`email`(768)),
  ADD KEY `slug` (`slug`(768));

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Index pour la table `stats_visite`
--
ALTER TABLE `stats_visite`
  ADD PRIMARY KEY (`ip`,`date_visite`),
  ADD KEY `date_visite` (`date_visite`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `article_tags`
--
ALTER TABLE `article_tags`
  MODIFY `id_article_tags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `banniere`
--
ALTER TABLE `banniere`
  MODIFY `id_banniere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `emplois`
--
ALTER TABLE `emplois`
  MODIFY `id_emplois` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `gallerie`
--
ALTER TABLE `gallerie`
  MODIFY `id_gallerie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
