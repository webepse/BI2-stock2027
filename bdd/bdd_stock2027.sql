-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 oct. 2026 à 06:37
-- Version du serveur : 8.4.7
-- Version de PHP : 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bi2stock2027`
--
CREATE DATABASE IF NOT EXISTS `bi2stock2027` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bi2stock2027`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `cover`, `description`) VALUES
(1, 'Sneakers & Chaussures', 'cat_sneakers.jpg', 'Modèles iconiques et collaborations exclusives : Nike, Adidas, New Balance, Asics, Salomon.'),
(2, 'Vestes & Manteaux', 'cat_vestes.jpg', 'Outerwear technique et pièces de créateurs : Arc\'teryx, The North Face, Carhartt WIP, Stüssy.'),
(3, 'Sweats & T-shirts', 'cat_sweats.jpg', 'T-shirts graphiques et hoodies premium : Supreme, Maison Margiela, Jacquemus, Ami Paris.'),
(4, 'Pantalons & Jeans', NULL, 'Denims et pantalons de référence : Levi\'s Vintage, Stone Island, Rick Owens, Dickies.'),
(5, 'Sacs & Accessoires', NULL, 'Maroquinerie et accessoires culte : Porter Yoshida, Prada, Balenciaga, Oakley.');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` int NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `date`, `description`, `category`, `introduction`, `cover`) VALUES
(1, 'Nike Air Jordan 1 Retro High OG Chicago', '2026-01-15', 'Silhouette mythique de 1985 en cuir premium aux couleurs emblématiques des Chicago Bulls, avec semelle Nike Air encapsulée.', 1, 'L\'icône intemporelle de la culture basketball et sneakers.', 'jordan1_chicago.jpg'),
(2, 'Adidas Samba OG Cloud White', '2026-01-20', 'Tige en cuir souple avec empiècement en suède en T sur l\'avant-pied, 3 bandes crantées contrastées et semelle en gomme rétro.', 1, 'Le classique indoor football devenu incontournable streetwear.', 'adidas_samba_og.jpg'),
(3, 'New Balance 990v6 Made in USA Grey', '2026-02-05', 'Empeigne associant mesh respirant et suède de porc gris, semelle intermédiaire FuelCell et amorti ENCAP pour un confort absolu.', 1, 'L\'excellence de la manufacture américaine et du running rétro.', 'newbalance_990v6.jpg'),
(4, 'Salomon XT-6 Gore-Tex Black Phantom', '2026-02-14', 'Chaussure d\'ultra-trail dotée d\'une membrane imperméable Gore-Tex, laçage Quicklace et châssis ACS pour un maintien haute stabilité.', 1, 'La passerelle parfaite entre performance trail et esthétique techwear.', 'salomon_xt6_gtx.jpg'),
(5, 'Asics Gel-Kayano 14 Metallic Silver', '2026-02-22', 'Esthétique running des années 2000 avec empiècements métallisés, mesh ouvert et amorti technologique Gel visible.', 1, 'Silhouette technique vintage au cœur de la tendance actuelle.', 'asics_gel_kayano14.jpg'),
(6, 'Arc\'teryx Beta LT Jacket Gore-Tex', '2026-03-02', 'Veste hardshell ultralégère en Gore-Tex 3 couches respirante, coupe-vent et imperméable, avec capuche StormHood compatible casque.', 2, 'La référence ultime de l\'outdoor technique adoptée par la mode.', 'arcteryx_beta_lt.jpg'),
(7, 'The North Face Nuptse 1996 Retro Jacket', '2026-03-10', 'Doudoune boxy rétro garnie de duvet d\'oie 700 cuin, tissu ripstop brillant déperlant et capuche pliable dans le col.', 2, 'Chaleur volumineuse et allure 90s emblématique.', 'tnf_nuptse_1996.jpg'),
(8, 'Carhartt WIP Michigan Chore Coat', '2026-03-18', 'Veste de travail robuste en toile canvas Dearborn de coton biologique non doublée, col en velours côtelé et boutons rivet.', 2, 'L\'authenticité du workwear américain revisité pour la rue.', 'carhartt_michigan_coat.jpg'),
(9, 'Stüssy Big Ol\' Canvas Work Jacket', '2026-03-25', 'Toile de coton délavée épaisse à coupe ample, fermeture zippée métallique et broderie signature Stüssy sur la poche poitrine.', 2, 'L\'héritage skate californien dans une coupe oversize.', 'stussy_work_jacket.jpg'),
(10, 'Barbour Beaufort Wax Jacket Sage', '2026-04-01', 'Veste en coton huilé imperméable légendaire, doublure tartan classique, col velours et grande poche carnier dorsale zippée.', 2, 'L\'élégance campagnarde britannique devenue un classique intemporel.', 'barbour_beaufort_wax.jpg'),
(11, 'Supreme Box Logo Hooded Sweatshirt Ash Grey', '2026-04-08', 'Sweat à capuche en molleton de coton lourd croisé avec le célèbre Box Logo brodé au centre de la poitrine.', 3, 'La pièce de collection la plus convoitée du streetwear mondial.', 'supreme_bogo_hoodie.jpg'),
(12, 'Maison Margiela T-Shirt Numbers Distressed', '2026-04-15', 'Jersey de coton doux blanc cassé avec logo numérique imprimé sur la poitrine et 4 points de couture signature au dos du col.', 3, 'Minimalisme conceptuel et détails haute couture avant-gardistes.', 'margiela_numbers_tee.jpg'),
(13, 'Ami Paris Sweatshirt Ami de Cœur Noir', '2026-04-22', 'Coton biologique épais à coupe décontractée, arborant le monogramme rouge Ami de Cœur brodé en point de chaînette.', 3, 'L\'insouciance chic et décontractée du vestiaire parisien.', 'ami_paris_coeur_sweat.jpg'),
(14, 'Jacquemus Chemise Jean Fleur d\'Artichaut', '2026-04-29', 'Chemise fluide en viscose imprimée à motifs peints à la main, col cubain ouvert et tombé estival aéré.', 3, 'Tonalités méditerranéennes et coupes solaires signées Simon Porte.', 'jacquemus_chemise_artichaut.jpg'),
(15, 'Acne Studios T-Shirt Face Patch Pastel Purple', '2026-05-06', 'T-shirt ample en coton moyen doux teinté en pièce avec l\'écusson Face métallique carré sur la poitrine.', 3, 'L\'esthétique scandinave épurée aux coupes impeccables.', 'acne_studios_face_tee.jpg'),
(16, 'Levi\'s Vintage Clothing 1955 501 Original Selvedge', '2026-05-12', 'Reproduction exacte du jean 501 de 1955 en denim selvedge lourd japonais Cone Mills, coupe droite jambe ample et taille haute.', 4, 'Le denim originel dans sa construction la plus pure.', 'levis_501_1955_selvedge.jpg'),
(17, 'Stone Island Cargo Pant Ghost Piece', '2026-05-19', 'Pantalon cargo monochromatique en gabardine de coton stretch avec badge boussole Stone Island ton sur ton amovible.', 4, 'Recherche textile militaire et teinture industrielle d\'exception.', 'stone_island_cargo_ghost.jpg'),
(18, 'Rick Owens Bela Pants Techo Wool Black', '2026-05-26', 'Pantalon large à taille élastique à cordon contrasté démesuré, braguette zippée apparente argentée et volume fluide tombant.', 4, 'Silhouette gothique-glamour et proportion démesurée signature.', 'rick_owens_bela_pants.jpg'),
(19, 'Dickies 874 Original Work Pant Recycled Khaki', '2026-06-02', 'Pantalon sergé infroissable en polycoton ultra-résistant, coupe droite indémodable et plis pressés permanents.', 4, 'Le basique indestructible adopté par la scène skate mondiale.', 'dickies_874_khaki.jpg'),
(20, 'Comme des Garçons Homme Plus Cropped Trouser', '2026-06-09', 'Pantalon de tailleur en laine vierge noire raccourci aux chevilles avec pinces volumineuses et finitions tailleur sur-mesure.', 4, 'Déconstruction tailleur japonaise par Rei Kawakubo.', 'cdg_cropped_trouser.jpg'),
(21, 'Prada Sac Banane Re-Nylon Noir', '2026-06-16', 'Sac ceinture en fil de nylon régénéré Re-Nylon avec plaque triangulaire émaillée et boucle de fermeture en métal poli.', 5, 'L\'accessoire culte des années 90 réinventé en fibre durable.', 'prada_renylon_bag.jpg'),
(22, 'Balenciaga Casquette Destroyed Logo Piercing', '2026-06-22', 'Casquette en sergé de coton délavé avec effets d\'usure artisanaux, piercings métalliques sur la visière et logo brodé.', 5, 'Détournement luxe subversif et codes underground punk.', 'balenciaga_piercing_cap.jpg'),
(23, 'Porter Yoshida & Co Tanker 2-Way Helmet Bag', '2026-06-27', 'Sac d\'aviateur japonais inspiré de la veste MA-1 en nylon satiné 3 couches avec doublure intérieure orange de sauvetage.', 5, 'Le chef-d\'œuvre de bagagerie fonctionnelle fabriqué au Japon.', 'porter_tanker_helmet_bag.jpg'),
(24, 'Oakley Lunettes de Soleil Eye Jacket Redux', '2026-07-02', 'Monture ovale sculptée inspirée de l\'archive 1994, verres Prizm haute définition et branches à géométrie enveloppante.', 5, 'L\'esthétique y2k sportive et rétro-futuriste par excellence.', 'oakley_eye_jacket.jpg'),
(25, 'Bottega Veneta Portefeuille Intrecciato Cuir', '2026-07-08', 'Portefeuille compact à deux volets en cuir de veau souple tressé selon la technique artisanale historique Intrecciato.', 5, 'Le luxe discret du cuir tressé artisanal sans logo apparent.', 'bottega_portefeuille_intrecciato.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES
(1, 'admin', 'admin@myepse.be', '$2y$10$tJKd5u9SLHglYvLsjKWVmuurt/mZhx28fFTj8Zw9IsLYpq6.BGCbq'),
(2, 'julien_sneakers', 'julien.sneakers@bi2stock.local', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFvX0m8J0E6bKj3E4xM9Gz7bWq1w8n0m'),
(3, 'elena_designer', 'elena.designer@bi2stock.local', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFvX0m8J0E6bKj3E4xM9Gz7bWq1w8n0m');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
