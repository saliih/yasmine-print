-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 12 Août 2016 à 17:29
-- Version du serveur :  5.7.12-0ubuntu1.1
-- Version de PHP :  7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `yasmine`
--

-- --------------------------------------------------------

--
-- Structure de la table `acl_classes`
--

CREATE TABLE `acl_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_entries`
--

CREATE TABLE `acl_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `object_identity_id` int(10) UNSIGNED DEFAULT NULL,
  `security_identity_id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) UNSIGNED NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_object_identities`
--

CREATE TABLE `acl_object_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_object_identity_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_object_identity_ancestors`
--

CREATE TABLE `acl_object_identity_ancestors` (
  `object_identity_id` int(10) UNSIGNED NOT NULL,
  `ancestor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_security_identities`
--

CREATE TABLE `acl_security_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  `brochure` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `banner`
--

INSERT INTO `banner` (`id`, `name`, `ord`, `brochure`) VALUES
(5, 'A', 1, 'CarteV.jpg'),
(9, '5', 5, 'Cat.jpg'),
(10, 'Emb.jpg', 3, 'Emb.jpg'),
(11, 'Plv.jpg', 4, 'Plv.jpg'),
(12, 'Prod.jpg', 5, 'Prod.jpg'),
(13, 'Sac.jpg', 6, 'Sac.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categories_plis`
--

CREATE TABLE `categories_plis` (
  `category_id` int(11) NOT NULL,
  `plis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories_plis`
--

INSERT INTO `categories_plis` (`category_id`, `plis_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `act` tinyint(1) NOT NULL,
  `color` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `costumise` tinyint(1) NOT NULL,
  `descript` longtext COLLATE utf8_unicode_ci,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `act`, `color`, `costumise`, `descript`, `picture`) VALUES
(1, 'Cartes de Visite', 1, '#ecb305', 0, 'dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg dlv,d jdeir eirfg', 'carousel-6.png'),
(2, 'Papier Entête', 1, '#d84a84', 0, '#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84#d84a84 #d84a84', 'carousel-5.png'),
(3, 'Flyer', 1, '#0879ba', 0, NULL, 'carousel-1.png'),
(4, 'dépliant', 1, '#f47032', 0, NULL, 'carousel-2.png'),
(5, 'Porte Documents', 1, '#5d75d4', 0, NULL, 'carousel-3.png'),
(6, 'plv', 1, '#50aaad', 0, NULL, 'carousel-4.png'),
(7, 'agendas', 1, '#ecb305', 0, NULL, 'carousel-5.png'),
(8, 'calendries', 1, '#d84a84', 0, NULL, 'carousel-6.png'),
(9, 'catalogues', 1, '#0879ba', 0, NULL, 'carousel-1.png'),
(10, 'enveloppes', 1, '#f47032', 0, NULL, 'carousel-2.png'),
(11, 'menu restaurants', 1, '#5d75d4', 0, NULL, 'carousel-3.png'),
(12, 'embalages cartonnés', 1, '#50aaad', 0, NULL, 'carousel-4.png');

-- --------------------------------------------------------

--
-- Structure de la table `cfgmailing`
--

CREATE TABLE `cfgmailing` (
  `id` int(11) NOT NULL,
  `waits` int(11) NOT NULL,
  `numberbywait` int(11) NOT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `replayemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cfgmailing`
--

INSERT INTO `cfgmailing` (`id`, `waits`, `numberbywait`, `sender`, `title`, `replayemail`) VALUES
(1, 1, 1, 'salah.chtioui@gmail.com', 'Yasmine Press', 'salah.chtioui@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gsm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `subject`, `body`, `email`, `name`, `gsm`) VALUES
(1, '564654', '6545', 'test@test.fr', 'test', '65464'),
(2, '564654', '6545', 'test@test.fr', 'test', '65464'),
(3, '564654', '6545', 'test@test.fr', 'test', '65464');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user_group`
--

CREATE TABLE `fos_user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user_user`
--

CREATE TABLE `fos_user_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `twitter_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `gplus_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_step_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES
(1, 'admin', 'admin', 'admin@admin', 'admin@admin', 1, '31ix9r5d4xc0osg4w8cks4scs4w0go4', '0c07ac51dddf9e1e9c75ccddebb1ff3f44c3e8f3685f0fd169f67bee3eb506f7312038f96d852d01382abdb63d1b1ff45d1bb357f31aa348d70f35fbdb3b30e6', '2016-08-12 15:56:57', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, '2016-08-08 23:05:04', '2016-08-12 15:56:57', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user_user_group`
--

CREATE TABLE `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mailinglist`
--

CREATE TABLE `mailinglist` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `act` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mailinglisttest`
--

CREATE TABLE `mailinglisttest` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modelmailing`
--

CREATE TABLE `modelmailing` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template` longtext COLLATE utf8_unicode_ci,
  `send` tinyint(1) DEFAULT NULL,
  `dcr` datetime DEFAULT NULL,
  `finshed` datetime DEFAULT NULL,
  `opened` int(11) DEFAULT NULL,
  `sended` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `name`, `alias`, `body`) VALUES
(1, 'Qui Sommes nous', 'qui-sommes-nous', 'Qui Sommes nous');

-- --------------------------------------------------------

--
-- Structure de la table `pdflist`
--

CREATE TABLE `pdflist` (
  `id` int(11) NOT NULL,
  `pdfmerge_id` int(11) DEFAULT NULL,
  `filepdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ocurrence` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pdfmerge`
--

CREATE TABLE `pdfmerge` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbpage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` double DEFAULT NULL,
  `height` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plis`
--

CREATE TABLE `plis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `plis`
--

INSERT INTO `plis` (`id`, `name`, `image`) VALUES
(1, 'Un pli 4 faces', 'wall-1.png'),
(2, 'Deux plis porte feuille 6 faces', 'wall-2.png'),
(3, 'Deux plis accordéon 6 faces', 'wall-3.png'),
(4, 'Trois plis 8 faces', 'wall-4.png'),
(5, 'Trois plis porte feuille 8 faces', 'wall-5.png'),
(6, 'Trois plis accordéon 8 faces', 'wall-6.png');

-- --------------------------------------------------------

--
-- Structure de la table `processmailing`
--

CREATE TABLE `processmailing` (
  `id` int(11) NOT NULL,
  `tpl_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prodoptions`
--

CREATE TABLE `prodoptions` (
  `id` int(11) NOT NULL,
  `ctegory_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `prodoptions`
--

INSERT INTO `prodoptions` (`id`, `ctegory_id`, `name`, `active`, `price`) VALUES
(3, 1, 'pack de 50', 1, 10),
(4, 1, 'pack de 100', 0, 50);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`) VALUES
(1, 'produit1'),
(2, 'dcdcdc');

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `civ` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaisse` date DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `besoin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` longtext COLLATE utf8_unicode_ci,
  `newsletter` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `register`
--

INSERT INTO `register` (`id`, `civ`, `name`, `pname`, `adress`, `cp`, `ville`, `Pays`, `datenaisse`, `profession`, `tel`, `email`, `sweb`, `besoin`, `msg`, `newsletter`) VALUES
(1, 'Mr.', 'Salah', 'salah', '6656', '6526', '65256', 'Tunisie', '1985-04-22', '561', '6511', '56161', '51651', '56151', '1651', 1),
(48, 'Mr.', 'Chtioui', 'Salah', 'rue Nassim Zriba Hamma', '1152', 'Zaghouan', 'Tunisie', '1985-04-22', 'developpeur web', '52085502', 'salah.chtioui@gmail.com', NULL, 'xyz', 'salah', 1),
(49, 'Mr.', 'Chtioui', 'Salah', 'rue Nassim Zriba Hamma', '1152', 'Zaghouan', 'Tunisie', '1985-04-22', 'developpeur web', '52085502', 'salah.chtioui@gmail.com', NULL, 'xyz', 'salah', 1),
(50, 'Mr.', 'Ben hamida', 'Slim', NULL, NULL, NULL, NULL, NULL, NULL, '23200718', 'yasmine-press@topnet.tn', NULL, NULL, NULL, 1),
(51, 'Mr.', 'chihi', 'hanen', 'Lafayette', '1002', 'Tunis', 'Tunisie', NULL, NULL, '29388718', 'chihihanen@gmail.com', NULL, 'carte de visite', 'ghhgj', 1),
(52, 'Mr.', 'salah', 'salah', 'test', NULL, NULL, NULL, '2016-03-09', NULL, '52085502', 'salah.chtioui@gmail.com', NULL, NULL, NULL, 1),
(53, 'Mr.', 'sd', 'd', 'c', NULL, NULL, NULL, NULL, NULL, '52085502', 'salah.chtioui@gmail.com', NULL, NULL, 'c', 1),
(54, 'Mr.', 'kk', 'kkk', 'ùù', NULL, NULL, NULL, NULL, NULL, '52085502', 'salah.chtioui@gmail.com', NULL, NULL, NULL, 1),
(55, 'Mr.', 'd', 'd', 'd', NULL, NULL, 'Tunisie', NULL, NULL, '52085502', 'salah.chtioui@gmail.com', NULL, NULL, 'd', 1),
(56, 'Mr.', 'd', 'd', NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 1),
(57, 'Mr.', 'd', 'd', NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 1),
(58, 'Mme.', NULL, NULL, NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 0),
(59, 'Mme.', NULL, NULL, NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 0),
(60, 'Mme.', NULL, NULL, NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 0),
(61, 'Mme.', 'cdsc', NULL, NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 0),
(62, 'Mme.', 'cdsc', NULL, NULL, NULL, NULL, 'Tunisie', NULL, NULL, NULL, 'salah.chtioui@gmail.com', NULL, NULL, NULL, 0),
(63, 'Mr.', 'KRAIEM', 'Zaki', 'Lac 2', '1053', 'Tunis', 'Tunisie', NULL, 'Gerant', '56138840', 'zakraiem@orange.tn', NULL, NULL, 'interessé par l\'offre cartes de visite.', 0),
(64, 'Mr.', 'briki', 'riadh', '243 rue ezzatar cite el amel', '2082', 'fouchana', 'Tunisie', '1979-12-18', 'technicien reseau informatique et securite electronique', '22650745', 'briki2006riadh@yahoo.fr', NULL, 'carte visite', 'assalam alikom\r\non est la societe DELTA-security nous voulons creer 1000 carte visite concernant notre societe d\'installation securite electronique systeme d\'alarme videophone et interphone veuillez nous donner plus d\'informations sur les prix et la livraison merci beaucoup\r\nbon travail', 1),
(65, 'Mme.', 'rim', 'kaabar khedira', NULL, '8050', 'hammamet', 'Tunisie', '1981-12-23', NULL, '23100178', 'rim.kaabar@yahoo.fr', NULL, NULL, NULL, 1),
(66, 'Mr.', 'mezza', 'mohamed helmi', '110 cite el hana bizerte', '7003', 'bizerte', 'Tunisie', '1987-10-10', 'directeur', '55000100', 'hhelzi@yahoo.fr', NULL, 'carte visite', 'je veux savoir le prix de 1000 cartes visites et si possible  la livraison a bizerte', 0),
(67, 'Mr.', 'Temimi', 'Tarek', 'La gazelle', '2083', 'ariana', 'Tunisie', NULL, 'Designer', '55267347', 'tarek.temimi@gmail.com', NULL, 'Devis', 'Bj, \r\n\r\nBesoin devis\r\n\r\n1 - Impression 200  et 250 Porte Document Recto / avec rabat collé vierge / Dim 31 cm x 42 cm / 350 g couché / Pelliculage mat .\r\n\r\n2- Impression 200 et 250 Flyer Format A4 /Recto Verso /Papier coucher \r\n\r\n3-  Impression 250 cartes visite /Grammage 350 g / Pelliculage mat. /Recto Verso  \r\n\r\nMerci', 1),
(68, 'Mr.', 'Aloui', 'KARIM', '01 rue du royaume de l\'arabie saoudite', '1002', 'tunis', 'Tunisie', '1974-09-28', 'chef d\'entreprise', '98128040', 'kal.informatique@topnet.tn', NULL, 'devis d\'impression', '100cartes de visite\r\n1000 flyer\r\n1000papier entete\r\n100 porte documents', 1),
(69, 'Mr.', 'Dridi', 'Mohamed Kamel Eddine', 'Chbedda Nassen 1135 Ben Arous', '1135', 'Nassen', 'Tunisie', NULL, NULL, '58494689', 'mked02@gmail.com', NULL, NULL, NULL, 1),
(70, 'Mr.', 'Ridha', 'Mathlouthi', '60rue ibn battouta Soliman', '8020', 'Soliman', 'Tunisie', NULL, 'Inspecteur de douane', '98473682', 'Ridha.math@hotmail.fr', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `name`) VALUES
(1, 'admin', 'admin', 'test@example.com', 'test@example.com', 1, 'g0th3znk4o8o8ocggk8kswg08wcosso', '5ZSAgxX8vTKfv2q+SFHKxOtiB669J9NJ0xopt/dgJuho5aHhM1v9LHWShobc/5SfwK8Jv4bMYsII3yrvcrpgRg==', '2016-02-01 21:27:39', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acl_classes`
--
ALTER TABLE `acl_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`);

--
-- Index pour la table `acl_entries`
--
ALTER TABLE `acl_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  ADD KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  ADD KEY `IDX_46C8B806EA000B10` (`class_id`),
  ADD KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  ADD KEY `IDX_46C8B806DF9183C9` (`security_identity_id`);

--
-- Index pour la table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  ADD KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`);

--
-- Index pour la table `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
  ADD PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  ADD KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  ADD KEY `IDX_825DE299C671CEA1` (`ancestor_id`);

--
-- Index pour la table `acl_security_identities`
--
ALTER TABLE `acl_security_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`);

--
-- Index pour la table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_plis`
--
ALTER TABLE `categories_plis`
  ADD PRIMARY KEY (`category_id`,`plis_id`),
  ADD KEY `IDX_AEB6E52A12469DE2` (`category_id`),
  ADD KEY `IDX_AEB6E52A7A9AC618` (`plis_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cfgmailing`
--
ALTER TABLE `cfgmailing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fos_user_group`
--
ALTER TABLE `fos_user_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_583D1F3E5E237E06` (`name`);

--
-- Index pour la table `fos_user_user`
--
ALTER TABLE `fos_user_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`);

--
-- Index pour la table `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_B3C77447A76ED395` (`user_id`),
  ADD KEY `IDX_B3C77447FE54D947` (`group_id`);

--
-- Index pour la table `mailinglist`
--
ALTER TABLE `mailinglist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_DB286CD3E7927C74` (`email`);

--
-- Index pour la table `mailinglisttest`
--
ALTER TABLE `mailinglisttest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E10FFFC9E7927C74` (`email`);

--
-- Index pour la table `modelmailing`
--
ALTER TABLE `modelmailing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pdflist`
--
ALTER TABLE `pdflist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_919FE7F08B07597` (`pdfmerge_id`);

--
-- Index pour la table `pdfmerge`
--
ALTER TABLE `pdfmerge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plis`
--
ALTER TABLE `plis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `processmailing`
--
ALTER TABLE `processmailing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D06487A30535A22` (`tpl_id`);

--
-- Index pour la table `prodoptions`
--
ALTER TABLE `prodoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD3B73775788647C` (`ctegory_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acl_classes`
--
ALTER TABLE `acl_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `acl_entries`
--
ALTER TABLE `acl_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `acl_security_identities`
--
ALTER TABLE `acl_security_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `cfgmailing`
--
ALTER TABLE `cfgmailing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `fos_user_group`
--
ALTER TABLE `fos_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fos_user_user`
--
ALTER TABLE `fos_user_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mailinglist`
--
ALTER TABLE `mailinglist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mailinglisttest`
--
ALTER TABLE `mailinglisttest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modelmailing`
--
ALTER TABLE `modelmailing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `pdflist`
--
ALTER TABLE `pdflist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pdfmerge`
--
ALTER TABLE `pdfmerge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `plis`
--
ALTER TABLE `plis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `processmailing`
--
ALTER TABLE `processmailing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `prodoptions`
--
ALTER TABLE `prodoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acl_entries`
--
ALTER TABLE `acl_entries`
  ADD CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  ADD CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`);

--
-- Contraintes pour la table `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
  ADD CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `categories_plis`
--
ALTER TABLE `categories_plis`
  ADD CONSTRAINT `FK_AEB6E52A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_AEB6E52A7A9AC618` FOREIGN KEY (`plis_id`) REFERENCES `plis` (`id`);

--
-- Contraintes pour la table `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
  ADD CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_user_group` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pdflist`
--
ALTER TABLE `pdflist`
  ADD CONSTRAINT `FK_919FE7F08B07597` FOREIGN KEY (`pdfmerge_id`) REFERENCES `pdfmerge` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `processmailing`
--
ALTER TABLE `processmailing`
  ADD CONSTRAINT `FK_D06487A30535A22` FOREIGN KEY (`tpl_id`) REFERENCES `modelmailing` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prodoptions`
--
ALTER TABLE `prodoptions`
  ADD CONSTRAINT `FK_FD3B73775788647C` FOREIGN KEY (`ctegory_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
