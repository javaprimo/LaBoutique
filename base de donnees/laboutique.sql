-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 06 juin 2021 à 19:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(70) NOT NULL,
  `Description` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id`, `Nom`, `Description`) VALUES
(1, 'Smartphones', 'Smartphones'),
(2, 'TV et SmartTV', 'TV et SmartTV'),
(3, 'Imprimantes', 'Imprimantes'),
(4, 'Ordinateur', 'Ordinateur'),
(5, 'Accessoires', 'Accessoires'),
(6, 'Logiciels', 'Logiciels');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Complete` tinyint(1) NOT NULL DEFAULT '0',
  `IdUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`Id`, `DateCreation`, `Complete`, `IdUtilisateur`) VALUES
(14, '2021-05-31 21:33:53', 1, 1),
(15, '2021-05-31 21:55:30', 0, 1),
(16, '2021-06-03 23:32:59', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(270) NOT NULL,
  `Description` varchar(2700) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `PrixInitial` decimal(10,0) NOT NULL,
  `PrixActuel` decimal(10,0) NOT NULL,
  `Photo1` varchar(300) NOT NULL,
  `Photo2` varchar(300) NOT NULL,
  `Photo3` varchar(300) NOT NULL,
  `IdCategorie` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdCategorie` (`IdCategorie`),
  KEY `IdCategorie_2` (`IdCategorie`),
  KEY `IdCategorie_3` (`IdCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`Id`, `Libelle`, `Description`, `Quantite`, `PrixInitial`, `PrixActuel`, `Photo1`, `Photo2`, `Photo3`, `IdCategorie`) VALUES
(1, 'SAMSUNG Galaxy S21 - 128Go Gris', 'Con&ccedil;u pour une exp&eacute;rience inoubliable au quotidien\r\nPour des photos et des vid&eacute;os toujours r&eacute;ussies. D&eacute;couvrez les Galaxy S21 5G et S21+ 5G. Con&ccedil;us pour r&eacute;volutionner la vid&eacute;o et la photographie, avec une r&eacute;solution 8K exceptionnelle et des photos jusqu&#039;en 64 MP. Disponibles en deux tailles et avec un design affirm&eacute; et unique, les Galaxy S21 illumineront votre quotidien.\r\n\r\nLes points forts :\r\nTaille de la diagonale : 6.2&quot;\r\nR&eacute;solution du capteur : 12 m&eacute;gapixels\r\nCapacit&eacute; de la batterie : 4000 mAh\r\nCapacit&eacute; de la m&eacute;moire interne : 128 Go\r\n8 coeurs\r\nRAM : 8 Go - LPDDR5 SDRAM\r\nG&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 5G\r\nProtection : Corning Gorilla Glass Victus (verre r&eacute;sistant aux rayures)', 89, '7999', '6999', 'photos-produit-1/1622761089_slider_apple-iphone-12.png', 'photos-produit-1/1622396161_samsung-galaxy-s21-128go-gris-4.jpg', 'photos-produit-1/1622396161_samsung-galaxy-s21-128go-gris-3.jpg', 1),
(2, 'iPhone 12 Plus	128Go Gris', 'Iphone 12 - Vers la vitesse et au del&agrave; \r\n\r\nUne puce A14 Bionic, la plus rapide sur smartphone. Un &eacute;cran OLED bord &agrave; bord. Le Ceramic Shield, qui multiplie par quatre la r&eacute;sistance aux chutes. Et le mode Nuit sur chaque appareil photo. L&rsquo;iPhone 12 a tout, en deux tailles parfaites.\r\n\r\nPuce A14 Bionic, la plus rapide sur smartphone - Ecran OLED bord &agrave; bord\r\nMode nuit quand la lumi&egrave;re vient &agrave; manquer - Deep Fusion - Smart HDR3 Automatique\r\nRecharge &eacute;clair sans fil MagSafe ! - Ceramic Shield beaucoup plus r&eacute;sistant que le verre - Bord en aluminium\r\n&Eacute;couteurs EarPods avec connecteur Lightning et C&acirc;ble USB C vers Lightning inclus', 90, '12000', '10000', 'photos-produit-2/1622761052_slider_apple-iphone-12.png', 'photos-produit-2/1622396200_apple-iphone-12-mini-colors.jpg', 'photos-produit-2/1622396200_apple-iphone-12-01.jpg', 1),
(31, 'iPhone 6 Plus - 64Go - 4G DÃ©bloquÃ©', 'Smartphone 4G D&eacute;bloqu&eacute; Dual SIM', 99, '10000', '6000', 'photos-produit-31/1622761097_slider_apple-iphone-12.png', 'photos-produit-31/1622396281_iphone-02.png', 'photos-produit-31/1622504713_1622396281_iphone-03.png', 1),
(38, 'SAMSUNG Galaxy S21 64Go Gris', 'Con&ccedil;u pour une exp&eacute;rience inoubliable au quotidien Pour des photos et des vid&eacute;os toujours r&eacute;ussies. D&eacute;couvrez les Galaxy S21 5G et S21+ 5G. Con&ccedil;us pour r&eacute;volutionner la vid&eacute;o et la photographie, avec une r&eacute;solution 8K exceptionnelle et des photos jusqu&#039;en 64 MP. Disponibles en deux tailles et avec un design affirm&eacute; et unique, les Galaxy S21 illumineront votre quotidien. Les points forts : Taille de la diagonale : 6.2&quot; R&eacute;solution du capteur : 12 m&eacute;gapixels Capacit&eacute; de la batterie : 4000 mAh Capacit&eacute; de la m&eacute;moire interne : 128 Go 8 coeurs RAM : 8 Go - LPDDR5 SDRAM G&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 5G Protection : Corning Gorilla Glass Victus (verre r&eacute;sistant aux rayures)', 97, '7999', '6999', 'photos-produit-38/1622763029_1622396161_samsung-galaxy-s21-128go-gris-4.jpg', 'photos-produit-38/1622763029_1622396161_samsung-galaxy-s21-128go-gris-3.jpg', 'photos-produit-38/1622763029_1622396161_samsung-galaxy-s21-128go-gris-1.jpg', 1),
(39, 'APPLE iPhone 12 Pro Max 128Go Bleu Pacifique', 'Les points forts :\r\nTaille de la diagonale : 6.7&quot;\r\nR&eacute;solution du capteur : 12 m&eacute;gapixels\r\nCapacit&eacute; de la m&eacute;moire interne : 128 Go\r\n6 coeurs\r\nG&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 5G\r\nProtection : Rev&ecirc;tement ol&eacute;ophobe antitrace, Ceramic Shield\r\nSyst&egrave;me d&#039;exploitation : iOS 14\r\nAdaptateur secteur : Non', 96, '10000', '9999', 'photos-produit-39/1622763095_apple-iphone-12.jpg', 'photos-produit-39/1622763095_iphone-12-orig.jpg', 'photos-produit-39/1622763095_apple-iphone-12-01.jpg', 1),
(44, 'Casque Parrot haute qualitÃ© sonaure', 'Casque Parrot', 99, '3999', '2999', 'photos-produit-44/1622764041_casque-parrot-01.jpg', 'photos-produit-44/1622764041_casque-parrot-02.jpg', 'photos-produit-44/1622764041_casque-parrot-03.jpg', 5),
(48, 'HP LaserJet Enterprise MFP M577dn', 'Imprimante multifonctions\r\nImpression &agrave; partir d&#039;un lecteur flash USB, sauvegarde sur lecteur flash USB, num&eacute;risation vers e-mail, Hard Disk Drive Encryption, enregistrer vers le dossier r&eacute;seau, HP High-Performance Secure Hard Disk, technologie Instant-on, num&eacute;risation vers FTP, logement pour verrou de s&eacute;curit&eacute;\r\nLaser - couleur\r\n1 x LAN Gigabit - RJ-45, 1 x USB 2.0 - USB 4 broches type B, 2 x h&ocirc;te USB 2.0 - USB de type A 4 broches\r\nTaille des supports pris en charge : Legal (216 x 356 mm), A4 (210 x 297 mm), 76 x 127 mm\r\nImpression recto-verso automatique : Oui', 60, '20000', '19000', 'photos-produit-48/1622936479_hp-laserjet-enterprise-mfp-m577dn.jpg', 'photos-produit-48/1622936479_hp-laserjet-enterprise-mfp-m577dn_1.jpg', 'photos-produit-48/1622936479_hp-laserjet-enterprise-mfp-m577dn_2.jpg', 3),
(49, 'Imprimante HP tout-en-un jet d&#039;encre couleur - DeskJet 2710e', 'Imprimante multifonctions\r\nImpression &agrave; partir d&#039;appareil mobile\r\nJet d&#039;encre (couleur)\r\nTaille des supports pris en charge : ANSI A (Letter) (216 x 279 mm), Legal (216 x 356 mm), A4 (210 x 297 mm), B5 (176 x 250 mm), A6 (105 , x 148 mm), 101.6 x 152.4 ', 100, '600', '570', 'photos-produit-49/1622937134_imprimante-hp-tout-en-un-jet-d-encre-couleur.jpg', 'photos-produit-49/1622937134_imprimante-hp-tout-en-un-jet-d-encre-couleur_1.jpg', 'photos-produit-49/1622937134_imprimante-hp-tout-en-un-jet-d-encre-couleur_2.jpg', 3),
(50, 'EPSON Imprimante WorkForce WF-2810 Jet d&#039;encre', 'Les points forts :\r\nImprimante multifonctions\r\nJet d&#039;encre - couleur\r\n1 x USB 2.0\r\nTaille des supports pris en charge : ANSI A (Letter) (216 x 279 mm), Legal (216 x 356 mm), A4 (210 x 297 mm), A5 (148 x 210 mm), B5 (176 x 250 mm), A6 (105 x 148)', 100, '770', '770', 'photos-produit-50/1622937265_epson-imprimante-workforce-wf-2810-jet-d-encre.jpg', 'photos-produit-50/1622937265_epson-imprimante-workforce-wf-2810-jet-d-encre_1.jpg', 'photos-produit-50/1622937265_epson-imprimante-workforce-wf-2810-jet-d-encre_2.jpg', 3),
(51, 'Imprimante multifonction HP Color LaserJet Pro M182n', 'Les points forts :\r\nImprimante multifonctions\r\nNum&eacute;riser vers un dossier, num&eacute;risation vers PDF\r\nLaser - couleur\r\n1 x USB 2.0 - USB 4 broches type B, 1 x LAN - RJ-45\r\nTaille des supports pris en charge : ANSI A (Letter) (216 x 279 mm), Legal (216 x 356 mm), Executive (184 x 267 mm), A4 (210 x 297 mm), A5 (148 x 210 mm)', 100, '2700', '2700', 'photos-produit-51/1622937376_imprimante-multifonction-hp-color-laserjet-pro-m18 (1).jpg', 'photos-produit-51/1622937376_imprimante-multifonction-hp-color-laserjet-pro-m18 (2).jpg', 'photos-produit-51/1622937376_imprimante-multifonction-hp-color-laserjet-pro-m18.jpg', 3),
(52, 'HP Imprimante Jet d&#039;Encre Multifonction Officejet Pro 8012', 'Les points forts :\r\nImprimante multifonctions\r\nHP Auto Wireless Connect, num&eacute;risation vers PC\r\nJet d&#039;encre - couleur\r\nTaille des supports pris en charge : ANSI A (Letter) (216 x 279 mm), Legal (216 x 356 mm), Executive (184 x 267 mm), A4 (210 x 297 mm), A5 (148 x 210 mm), A6 (105 x 148 mm), JIS B5 (182 x 257 mm), Statement (139.7 x 215.9 mm), 76.2 x 127 mm\r\nImpression recto-verso automatique : Oui', 100, '1600', '1200', 'photos-produit-52/1622937605_hp-imprimante-jet-d-encre-multifonction-officejet.jpg', 'photos-produit-52/1622937605_hp-imprimante-jet-d-encre-multifonction-officejet (2).jpg', 'photos-produit-52/1622937605_hp-imprimante-jet-d-encre-multifonction-officejet (1).jpg', 3),
(53, 'HP Officejet PRO 8730 Imprimante Multifonctions (D9L20A)', 'HP Officejet PRO 8730 Imprimante Multifonctions (D9L20A)\r\n\r\n', 100, '3700', '3000', 'photos-produit-53/1622937700_hp-officejet-pro-8730-imprimante-multifonctions-d.jpg', 'photos-produit-53/1622937700_hp-officejet-pro-8730-imprimante-multifonctions-d (1).jpg', 'photos-produit-53/1622937700_hp-officejet-pro-8730-imprimante-multifonctions-d (2).jpg', 3),
(54, 'HP Imprimante laser LaserJet Pro M118dw - Monochrome', 'Imprimante laser HP LaserJet Pro M118dw - Monochrome - Impression 49 ppm Mono - 1200 x 1200 dpi - Recto/Verso Automatique - Bac d&#039;Alimentation 260 Feuilles - R&eacute;seau sans-fil - HP ePrint, Apple AirPrint, Mopria, Wi-Fi Direct, Google Cloud Print', 100, '1600', '1200', 'photos-produit-54/1622937937_hp-imprimante-laser-laserjet-pro-m118dw-monochro (2).jpg', 'photos-produit-54/1622937937_hp-imprimante-laser-laserjet-pro-m118dw-monochro (1).jpg', 'photos-produit-54/1622937937_hp-imprimante-laser-laserjet-pro-m118dw-monochro.jpg', 3),
(55, 'OPPO Find X3 - Ecran 6.55&quot; - Neo 5G - 256Go Noir', 'Les points forts :\r\nTaille de la diagonale : 6.55&quot;\r\nR&eacute;solution du capteur : 50 m&eacute;gapixels\r\nCapacit&eacute; de la batterie : 4500 mAh\r\nCapacit&eacute; de la m&eacute;moire interne : 256 Go\r\n8 coeurs\r\nRAM : 12 Go - LPDDR4X SDRAM\r\nG&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 5G\r\nProtection : Rev&ecirc;tement r&eacute;sistant aux empreintes digitales', 100, '7670', '7600', 'photos-produit-55/1622938781_oppo-find-x3-neo-5g-256go-noir.jpg', 'photos-produit-55/1622938781_oppo-find-x3-neo-5g-256go-noir (1).jpg', 'photos-produit-55/1622938781_oppo-find-x3-neo-5g-256go-noir (2).jpg', 1),
(56, 'SAMSUNG Galaxy A21s - 6.5&quot; - Noir', 'Les points forts :\r\nTaille de la diagonale : 6.5&quot;\r\nR&eacute;solution du capteur : 48 m&eacute;gapixels\r\nCapacit&eacute; de la batterie : 5000 mAh\r\nCapacit&eacute; de la m&eacute;moire interne : 32 Go\r\n8 coeurs\r\nRAM : 3 Go\r\nG&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 4G\r\nCartes m&eacute;moire flash prises en charge : microSDHC, microSDXC - jusqu&#039;&agrave; 512 Go', 100, '1900', '1700', 'photos-produit-56/1622939108_samsung-galaxy-a21s-noir.jpg', 'photos-produit-56/1622939108_samsung-galaxy-a21s-noir (2).jpg', 'photos-produit-56/1622939108_samsung-galaxy-a21s-noir (1).jpg', 1),
(57, 'OPPO A72 128Go - Ecran 6.5&quot; - Noir', 'Les points forts :\r\nTaille de la diagonale : 6.5&quot;\r\nR&eacute;solution du capteur : 48 m&eacute;gapixels\r\nCapacit&eacute; de la batterie : 5000 mAh\r\nCapacit&eacute; de la m&eacute;moire interne : 128 Go\r\n8 coeurs\r\nRAM : 4 Go - LPDDR4X SDRAM\r\nG&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 4G\r\nSyst&egrave;me d&#039;exploitation : ColorOS 7.1 (bas&eacute; sur Android 10)', 100, '1700', '1600', 'photos-produit-57/1622939209_oppo-a72-128go-noir.jpg', 'photos-produit-57/1622939209_oppo-a72-128go-noir (1).jpg', 'photos-produit-57/1622939209_oppo-a72-128go-noir (2).jpg', 1),
(58, 'Sony Xperia 5 Smartphone dÃ©bloquÃ© 4G - Ecran OLED 6.1', 'Marque: Sony MobileCouleur: NoirCaract&eacute;ristiques: Pr&eacute;cision absolue eye AF: mise au point plus rapide pour des images inoubliables avec la pr&eacute;cision de l&#039;autofocus eye AF. Formats vid&eacute;o pris en charge: MPEG-4 Video, H.263, H.264, H.265, VP8, VP9Trois cam&eacute;ras, trois objectifs, des possibilit&eacute;s infinies: avec un objectif super grand angle de 16 mm, un 26 mm polyvalent et un t&eacute;l&eacute;objectif 52 mm pour les portraits', 100, '3700', '3600', 'photos-produit-58/1622939470_sony-xperia-5-smartphone-debloque-4g-ecran-21-9.jpg', 'photos-produit-58/1622939470_sony-xperia-5-smartphone-debloque-4g-ecran-21-9 (1).jpg', 'photos-produit-58/1622939470_sony-xperia-5-smartphone-debloque-4g-ecran-21-9 (2).jpg', 1),
(59, 'SONY Xperia 10 II Noir - Ecran 6&quot; - 128 GO', 'Les points forts :\r\nTaille de la diagonale : 6&quot;\r\nR&eacute;solution du capteur : 12 m&eacute;gapixels\r\nCapacit&eacute; de la batterie : 3600 mAh\r\nCapacit&eacute; de la m&eacute;moire interne : 128 Go\r\nRAM : 4 Go\r\nG&eacute;n&eacute;ration &agrave; haut d&eacute;bit mobile : 4G\r\nProtection : Verre Corning Gorilla 6 (verre r&eacute;sistant aux rayures)', 100, '3000', '2700', 'photos-produit-59/1622939913_sony-xperia-10-ii-noir-128-go.jpg', 'photos-produit-59/1622939913_sony-xperia-10-ii-noir-128-go (1).jpg', 'photos-produit-59/1622939913_sony-xperia-10-ii-noir-128-go (2).jpg', 1),
(60, 'Apple Watch Series 6 GPS + Cellular, 40mm Bo&icirc;tier en Aluminium Gris Sid&eacute;ral avec Bracelet Sport Noir', 'Sant&eacute; : Mesurez votre taux d&rsquo;oxyg&egrave;ne dans le sang ou faites un &eacute;lectrocardiogramme n&rsquo;importe o&ugrave;, n&rsquo;importe quand&sup2;. Fitness : Suivez votre activit&eacute; physique, jour apr&egrave;s jour. Mesurez pr&eacute;cis&eacute;ment vos entra&icirc;nements pr&eacute;f&eacute;r&eacute;s. S&eacute;curit&eacute; : Avec la fonctionnalit&eacute; Appel d&rsquo;urgence, et la d&eacute;tection des chutes, vous pouvez &ecirc;tre tranquille. Garder le contact : Avec l&rsquo;&eacute;cran Retina toujours activ&eacute; de l&rsquo;Apple Watch, ce qui compte reste visible en permanence.\r\n', 100, '6000', '5700', 'photos-produit-60/1622940045_apple-watch-series-6-gps-cellular-40mm-boitier.jpg', 'photos-produit-60/1622940045_apple-watch-series-6-gps-cellular-40mm-boitier (1).jpg', 'photos-produit-60/1622940045_apple-watch-series-6-gps-cellular-40mm-boitier (2).jpg', 5),
(61, 'HISENSE 40A5600F - TV LED 40\" - Full HD - Smart TV - Design slim - 2 X HDMI', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 100.5 cm (40&quot;)\r\nR&eacute;tro&eacute;clairage par LED\r\nFormat d&#039;affichage : 1080p (Full HD)\r\nR&eacute;solution : 1920 x 1080\r\nTuner TV num&eacute;rique : DVB-C, DVB-S, DVB-S2, DVB-T, DVB-T2\r\nAm&eacute;liorations d&#039;image : R&eacute;duction de bruit MPEG, R&eacute;duction de bruit, Rehausseur de couleur naturelle\r\nInterface vid&eacute;o : Composite, HDMI', 100, '2700', '1700', 'photos-produit-61/1622940264_hisense-40a5600f-tv-led-40-101cm-full-hd (1).jpg', 'photos-produit-61/1622940264_hisense-40a5600f-tv-led-40-101cm-full-hd (2).jpg', 'photos-produit-61/1622940264_hisense-40a5600f-tv-led-40-101cm-full-hd.jpg', 2),
(62, 'THOMSON 50UZ6420 TV LED 50&#039;&#039; - UHD 4K - HDR10 - Android 9.0 - 3 X HDMI', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 127 cm (50&quot;)\r\nR&eacute;tro&eacute;clairage par LED\r\nFormat d&#039;affichage : 4K UHD (2160p)\r\nR&eacute;solution : 3840 x 2160\r\nTechnologie HDR : Quantificateur perceptuel 10 (PQ10), Hybrid Log-Gamma (HLG), HDR 10\r\nTuner TV num&eacute;rique : DVB-C, DVB-S2, DVB-T2\r\nAm&eacute;liorations d&#039;image : Mega Dynamic Contrast Ratio, R&eacute;duction de bruit, iPQ 2.0 Engine\r\nInterface vid&eacute;o : HDMI', 100, '3999', '3700', 'photos-produit-62/1622940404_thomson-50uz6420-tv-led-50-126cm-uhd-4k-hd.jpg', 'photos-produit-62/1622940404_thomson-50uz6420-tv-led-50-126cm-uhd-4k-hd (1).jpg', 'photos-produit-62/1622940404_thomson-50uz6420-tv-led-50-126cm-uhd-4k-hd (2).jpg', 2),
(63, 'SAMSUNG UE43TU7022 - TV LED 43&#039;&#039; - UHD 4K- HDR10+ - Smart TV - 2xHDMI - 1xUSB - Classe &eacute;nerg&eacute;tique A', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 108 cm (43&quot;)\r\nR&eacute;tro&eacute;clairage par LED - assombrissement UHD\r\nFormat d&#039;affichage : 4K UHD (2160p)\r\nR&eacute;solution : 3840 x 2160\r\nTechnologie HDR : HDR 10+, Hybrid Log-Gamma (HLG)\r\nTuner TV num&eacute;rique : DVB-C, DVB-T2\r\nAm&eacute;liorations d&#039;image : Digital Clean View, Mega Contrast, accentuation du contraste, Contraste &agrave; haute accessibilit&eacute;, PurColor, Amplificateur de jeu, Affichage Crystal\r\nInterface vid&eacute;o : HDMI', 100, '3999', '4799', 'photos-produit-63/1622940489_samsung-ue43tu7022-tv-led-43-108cm-uhd-4k (1).jpg', 'photos-produit-63/1622940489_samsung-ue43tu7022-tv-led-43-108cm-uhd-4k.jpg', 'photos-produit-63/1622940489_samsung-ue43tu7022-tv-led-43-108cm-uhd-4k (2).jpg', 2),
(64, 'Samsung QE55Q60T - TV QLED UHD 4K - 55&#039;&#039; - HDR10+ - Smart TV - 3 x HDMI - 2 x USB - Classe F', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 138 cm (55&quot;)\r\nR&eacute;tro&eacute;clairage par LED - assombrissement UHD Supreme\r\nFormat d&#039;affichage : 4K UHD (2160p)\r\nR&eacute;solution : 3840 x 2160\r\nTechnologie HDR : Quantum HDR\r\nAm&eacute;liorations d&#039;image : Accentuation du contraste, 100% Color Volume\r\nInterface vid&eacute;o : HDMI', 100, '6999', '6700', 'photos-produit-64/1622940568_samsung-qe55q60t-tv-qled-uhd-4k-55-138cm.jpg', 'photos-produit-64/1622940568_samsung-qe55q60t-tv-qled-uhd-4k-55-138cm (1).jpg', 'photos-produit-64/1622940568_samsung-qe55q60t-tv-qled-uhd-4k-55-138cm (2).jpg', 2),
(65, 'HISENSE 50BE7000F - TV LED UHD 4K - 50&quot; - Smart TV - Dolby Audio - 3xHDMI, 2xUSB', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 125.7 cm (50&quot;)\r\nR&eacute;tro&eacute;clairage par LED\r\nFormat d&#039;affichage : 4K UHD (2160p)\r\nR&eacute;solution : 3840 x 2160\r\nTuner TV num&eacute;rique : DVB-C, DVB-S, DVB-S2, DVB-T, DVB-T2\r\nAm&eacute;liorations d&#039;image : R&eacute;duction de bruit MPEG, R&eacute;duction de bruit, Filtre 3D Digital Comb, PreciseColor, MEMC, UHD AI Upscaler\r\nInterface vid&eacute;o : Composite, HDMI', 100, '4200', '3999', 'photos-produit-65/1622940664_hisense-50be7000f-tv-led-uhd-4k-50-127cm.jpg', 'photos-produit-65/1622940664_hisense-50be7000f-tv-led-uhd-4k-50-127cm (2).jpg', 'photos-produit-65/1622940664_hisense-50be7000f-tv-led-uhd-4k-50-127cm (1).jpg', 2),
(66, 'LG OLED55CX6 - TV OLED UHD 4K - 55&quot;- Smart TV - Dolby Vision IQ - 4 x HDMI - 3 x USB - Classe A', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 139 cm (55&quot;)\r\nFormat d&#039;affichage : 4K UHD (2160p)\r\nR&eacute;solution : 3840 x 2160\r\nTechnologie HDR : HDR Effect, HDR 10 Pro, Cinema HDR, Dolby Vision IQ\r\nTuner TV num&eacute;rique : DVB-C, DVB-S, DVB-S2, DVB-T, DVB-T2\r\nAm&eacute;liorations d&#039;image : 4K Upscaling, PerfectColor, Calibration automatique, Perfect Black, Billion Rich Colours, Att&eacute;nuation de pixel, HDR Dynamic Tone Mapping Pro, AI Brightness, Angle de vision parfait, AI Picture Pro, Am&eacute;lioration du visage\r\nInterface vid&eacute;o : HDMI', 100, '12000', '12000', 'photos-produit-66/1622940749_lg-oled55cx6-tv-oled-uhd-4k-55-139cm-smar.jpg', 'photos-produit-66/1622940749_lg-oled55cx6-tv-oled-uhd-4k-55-139cm-smar (1).jpg', 'photos-produit-66/1622940749_lg-oled55cx6-tv-oled-uhd-4k-55-139cm-smar (2).jpg', 2),
(67, 'LG OLED65C8 TV OLED 4K UHD - 65&quot; - 4K HDR Dolby Vision - son Dolby Atmos - Smart TV - 4xHDMI - 3xUSB - Classe &eacute;nerg&eacute;tique A', 'Les points forts :\r\nTaille d&#039;&eacute;cran : 164 cm (65&quot;)\r\nFormat d&#039;affichage : 4K UHD (2160p)\r\nR&eacute;solution : 3840 x 2160\r\nTechnologie HDR : HDR 10 Pro, Technicolor Advanced HDR, Hybrid Log-Gamma (HLG)\r\nTuner TV num&eacute;rique : DVB-C, DVB-S2, DVB-T2\r\nAm&eacute;liorations d&#039;image : 4K Upscaling, Calibration automatique, Contraste infini, Perfect Black, Billion Rich Colours, True Color Accuracy Pro, Object Depth Enhancer, Adaptive Color Enhancer, Quad Step Noise Reduction, Sharpness Enhancer, Enhanced Dynamic Tone Mapping\r\nInterface vid&eacute;o : HDMI', 100, '27000', '27000', 'photos-produit-67/1622940976_lg-oled65c8-tv-oled-4k-uhd-65-164cm-4k-hdr.jpg', 'photos-produit-67/1622940976_lg-oled65c8-tv-oled-4k-uhd-65-164cm-4k-hdr (1).jpg', 'photos-produit-67/1622940976_lg-oled65c8-tv-oled-4k-uhd-65-164cm-4k-hdr (2).jpg', 2),
(68, 'PC Portable ASUS Vivobook R515MA-BQ257T - 15,6&quot; FHD - Intel Pentium N5030 - RAM 8 Go - Stockage SSD 512 Go - Windows 10 - AZERTY', 'Les points forts :\r\nUsage : Polyvalent &amp; Multim&eacute;dia\r\nProcesseur : Intel Pentium Silver N5030 / 1.1 GHz\r\nRAM : 8 Go (1 x 8 GB)\r\nR&eacute;solution : 1920 x 1080 (Full HD)\r\nFonctions : Technologie ASUS SPLENDID Video Intelligence, anti-&eacute;blouissement, gamme de couleurs &eacute;tendue NTSC de 45 %, Tru2Life, niveau IPS\r\nStockage principal : 512 Go SSD M.2 PCIe - NVM Express (NVMe)\r\nProcesseur graphique : Intel UHD Graphics 605\r\nGarantie (&sup2;) : 2 ans\r\nSyst&egrave;me d&#039;exploitation : Windows 10 Home\r\nPoids : 1.8 kg', 100, '5000', '4799', 'photos-produit-68/1622941198_pc-portable-asus-vivobook-r515ma-bq257t-15-6-fh (1).jpg', 'photos-produit-68/1622941198_pc-portable-asus-vivobook-r515ma-bq257t-15-6-fh.jpg', 'photos-produit-68/1622941198_pc-portable-asus-vivobook-r515ma-bq257t-15-6-fh (2).jpg', 4),
(69, 'PC HP Compaq 6200 Pro SFF Ecran 19\" G630 RAM 16Go Disque Dur 1To Windows 10 Wifi', 'Mod&egrave;le : HP Compaq 6200 Pro format SFF (Small Form Factor)Processeur : Intel Pentium Dual-Core G630 - 2.7 GHz - 2 coeurs - Cache : 3 Mo - Socket 1155 / H2 / LGA1155M&eacute;moire Vive : 16 Go - DDR3Disque dur : 1 To SATA (Format 3,5&quot;)Lecteur optique : Graveur DVDContr&ocirc;leur graphique : Int&eacute;gr&eacute; au processeur - HD (Sandy Bridge)R&eacute;seau : RJ-45 Ethernet 10/100/1000 Mbps + Clef USB WifiSyst&egrave;me d&#039;exploitation : Windows', 100, '1999', '1999', 'photos-produit-69/1622941290_pc-hp-compaq-6200-pro-sff-ecran-19-g630-ram-16go.jpg', 'photos-produit-69/1622941290_pc-hp-compaq-6200-pro-sff-ecran-19-g630-ram-16go (1).jpg', 'photos-produit-69/1622941290_pc-hp-compaq-6200-pro-sff-ecran-19-g630-ram-16go (2).jpg', 4),
(70, 'Apple - 13,3&quot; MacBook Air (2020) - Puce Apple M1 - RAM 8Go - Stockage 256Go - Gris Sid&eacute;ral - AZERTY', 'Les points forts :\r\nUsage : Ultraportable &amp; Performant\r\nProcesseur : Apple M1\r\nRAM : 8 Go (la m&eacute;moire fournie est soud&eacute;e)\r\nR&eacute;solution : 2560 x 1600 (WQXGA)\r\nFonctions : Sans BFR/PVC, sans mercure, sans b&eacute;ryllium, sans arsenic, affichage Retina, P3 Wide Color Gamut, technologie True Tone\r\nStockage principal : 256 Go SSD soud&eacute;\r\nProcesseur graphique : Apple M1 7-core\r\nDur&eacute;e de fonctionnement : Jusqu&#039;&agrave; 15 heures\r\nGarantie (&sup2;) : 2 ans\r\nSyst&egrave;me d&#039;exploitation : Apple macOS Big Sur 11.0', 100, '12000', '12000', 'photos-produit-70/1622941384_apple-13-3-macbook-air-2020-puce-apple-m1.jpg', 'photos-produit-70/1622941384_apple-13-3-macbook-air-2020-puce-apple-m1 (1).jpg', 'photos-produit-70/1622941384_apple-13-3-macbook-air-2020-puce-apple-m1 (2).jpg', 4),
(71, 'PC Portable - HP 15-dw1050nf - 15,6&quot; HD - Core i3-10110U - RAM 4 Go - Stockage 128 Go SSD - Windows 10 Home - AZERTY', 'Les points forts :\r\nProcesseur : Intel Core i3 (10&egrave;me g&eacute;n&eacute;ration) 10110U / 2.1 GHz\r\nRAM : 4 Go (1 x 4 Go)\r\nR&eacute;solution : 1366 x 768 (HD)\r\nFonctions : Anti-&eacute;blouissement, gamme de couleurs &eacute;tendue NTSC de 45 %, Micro Edge\r\nStockage principal : 128 Go SSD M.2 SATA\r\nProcesseur graphique : Intel UHD Graphics\r\nDur&eacute;e de fonctionnement : Jusqu&#039;&agrave; 12.25 heures\r\nGarantie (&sup2;) : 2 ans\r\nSyst&egrave;me d&#039;exploitation : Windows 10 Home in S mode - Anglais/Fran&ccedil;ais\r\nPoids : 1.78 kg', 100, '6666', '6000', 'photos-produit-71/1622941449_pc-portable-hp-15-dw1050nf-15-6-hd-core-i3.jpg', 'photos-produit-71/1622941449_pc-portable-hp-15-dw1050nf-15-6-hd-core-i3 (1).jpg', 'photos-produit-71/1622941449_pc-portable-hp-15-dw1050nf-15-6-hd-core-i3 (2).jpg', 4),
(72, 'PC Complet 19&quot; pouce &eacute;cran HP Compaq 6000 Pro', 'PC Complet 19&quot; pouce &eacute;cran HP Compaq 6000 Pro reconditionn&eacute;s, compos&eacute; d&rsquo;un processeur Intel Dual Core 2.7Ghz, 4Go de M&eacute;moire vive et 250 Go de stockage WIN7 Clavier Souris et Cables marque mix +WIFI pack office 2007', 100, '2000', '1700', 'photos-produit-72/1622941583_pc-complet-19-pouce-ecran-hp-compaq-6000-pro-reco.jpg', 'photos-produit-72/1622941583_pc-complet-19-pouce-ecran-hp-compaq-6000-pro-reco (1).jpg', 'photos-produit-72/1622941583_pc-complet-19-pouce-ecran-hp-compaq-6000-pro-reco (2).jpg', 4),
(73, 'Ordinateur Portable Chromebook ASUS C423NA-BV0051', 'Les points forts :\r\nUsage : Basique &amp; Bureautique\r\nProcesseur : Intel Celeron N3350 / 1.1 GHz\r\nRAM : 4 Go (la m&eacute;moire fournie est soud&eacute;e)\r\nR&eacute;solution : 1366 x 768 (HD)\r\nFonctions : Anti-&eacute;blouissement, gamme de couleurs &eacute;tendue NTSC de 45 %\r\nStockage principal : 64 Go SSD eMMC\r\nProcesseur graphique : Intel HD Graphics 500\r\nGarantie (&sup2;) : 2 ans\r\nSyst&egrave;me d&#039;exploitation : Google Chrome OS\r\nPoids : 1.2 kg', 100, '2999', '2700', 'photos-produit-73/1622941690_ordinateur-portable-chromebook-asus-c423na-bv0051 (2).jpg', 'photos-produit-73/1622941690_ordinateur-portable-chromebook-asus-c423na-bv0051 (1).jpg', 'photos-produit-73/1622941690_ordinateur-portable-chromebook-asus-c423na-bv0051.jpg', 4),
(74, 'Ordinateur portable Chromebook ACER 314 CB314-1HT-P39K ', 'Les points forts :\r\nProcesseur : Intel Pentium Silver N5030 / 1.1 GHz\r\nRAM : 8 Go (la m&eacute;moire fournie est soud&eacute;e)\r\nR&eacute;solution : 1920 x 1080 (Full HD)\r\nFonctions : Anti-&eacute;blouissement, ComfyView, taux de r&eacute;ponse de 25 ms, &eacute;cran &agrave; bord &eacute;troit\r\nStockage principal : 64 Go SSD eMMC - SanDisk\r\nProcesseur graphique : Intel UHD Graphics 605\r\nDur&eacute;e de fonctionnement : Jusqu&#039;&agrave; 12.5 heures\r\nGarantie (&sup2;) : 2 ans\r\nSyst&egrave;me d&#039;exploitation : Google Chrome OS\r\nPoids : 1.5 kg', 100, '3270', '2700', 'photos-produit-74/1622941774_ordinateur-portable-chromebook-acer-314-cb314-1ht (1).jpg', 'photos-produit-74/1622941774_ordinateur-portable-chromebook-acer-314-cb314-1ht.jpg', 'photos-produit-74/1622941774_ordinateur-portable-chromebook-acer-314-cb314-1ht (2).jpg', 4),
(75, 'Microsoft 365 Personnel - 1 utilisateur - PC ou Mac - Abonnement 1 an', 'Version Premium de la suite bureautique Office pour un utilisateur, comprenant Word, Excel, PowerPoint, OneNote, Outlook, Access et Publisher. Inclut de nouvelles fonctionnalit&eacute;s tous les mois. 1 To de stockage en ligne OneDrive pour sauvegarder automatiquement vos photos et vos dossiers. Abonnement 1 an sans renouvellement automatique.', 100, '570', '570', 'photos-produit-75/1622942295_microsoft-365-personnel-1-utilisateur-pc-ou-ma.jpg', 'photos-produit-75/1622942295_microsoft-365-personnel-1-utilisateur-pc-ou-ma (1).jpg', 'photos-produit-75/1622942295_microsoft-365-personnel-1-utilisateur-pc-ou-ma (2).jpg', 6),
(76, 'Kaspersky Antivirus 2021* - 1 Poste - 1 An | Version T&eacute;l&eacute;chargement', 'Kaspersky Anti-virus - 1 Appareil - Abonnement 1 An. - Activable sur 1 appareil de type (PC) - Version d&eacute;mat&eacute;rialis&eacute;e pour un nouvel abonnement ou un renouvellement - Livraison sur la messagerie Cdiscount en moins de 1h &amp; 24h/24.', 100, '170', '170', 'photos-produit-76/1622942384_kaspersky-antivirus-security-2019-1-poste-1-a.jpg', 'photos-produit-76/1622942384_kaspersky-antivirus-security-2019-1-poste-1-a (1).jpg', 'photos-produit-76/1622942384_kaspersky-antivirus-security-2019-1-poste-1-a (2).jpg', 6),
(77, 'NordVPN - garantit la s&eacute;curit&eacute; de vos donn&eacute;es', 'T&eacute;l&eacute;charger NordVPN, rien de plus simple, rapide et &eacute;conomique avec Cdiscount ! VPN garantit gratuitement votre s&eacute;curit&eacute; et votre anonymat en ligne.\r\n', 100, '300', '270', 'photos-produit-77/1622942505_nordvpn.jpg', 'photos-produit-77/1622942505_nordvpn (2).jpg', 'photos-produit-77/1622942505_nordvpn (1).jpg', 6),
(78, 'ADOBE Premiere Elements 2021* - 2 Postes - Sans abonnement PC/MAC | Version T&eacute;l&eacute;chargement', 'ADOBE Premiere Elements - Activable sur 2 Appareils (PC, Mac) - Version d&eacute;finitive - Livraison sur la messagerie Cdiscount en moins de 1h &amp; 24h/24.\r\n', 100, '699', '699', 'photos-produit-78/1622942575_adobe-premiere-elements-2-postes-sans-abonn.jpg', 'photos-produit-78/1622942575_adobe-premiere-elements-2-postes-sans-abonn (1).jpg', 'photos-produit-78/1622942575_adobe-premiere-elements-2-postes-sans-abonn (2).jpg', 6),
(79, 'MAGIX Vid&eacute;o Deluxe Plus 2021 - Concevez des films ambitieux', 'VideÌo deluxe 2021 Plus permet de reÌaliser facilement des films ambitieux. Profitez d&#039;outils d&#039;eÌdition efficaces et de possibiliteÌs d&#039;optimisation pour l&#039;image et le son. Jusqu&#039;aÌ€ 1 500 transitions, effets et titres creÌatifs : concevez d&rsquo;impressi\r\n', 100, '999', '999', 'photos-produit-79/1622942693_magix-video-deluxe-plus-2021.jpg', 'photos-produit-79/1622942693_magix-video-deluxe-plus-2021 (1).jpg', 'photos-produit-79/1622942693_magix-video-deluxe-plus-2021 (2).jpg', 6),
(80, 'SOUND FORGE Audio Studio 15 - Online Shipping Pack', 'SOUND FORGE Audio Studio 15 est un logiciel polyvalent qui garantit des &eacute;ditions audio rapides. Podcasts et enregistrements de chants en haute r&eacute;solution, &eacute;dition Wave non destructive, restauration et mastering : profitez d&rsquo;un pack complet id&eacute;al.', 100, '590', '590', 'photos-produit-80/1622942863_sound-forge-audio-studio-15-online-shipping-pack.jpg', 'photos-produit-80/1622942863_sound-forge-audio-studio-15-online-shipping-pack (1).jpg', 'photos-produit-80/1622942863_sound-forge-audio-studio-15-online-shipping-pack (2).jpg', 6),
(81, 'ESET NOD32 Antivirus 12-2019 | 3 Postes - 1 An - Version d&eacute;mat&eacute;rialis&eacute;e', 'ESET Anti-virus NOD32 - 3 Appareils - Abonnement 1 An - Cette version est limit&eacute;e &agrave; 3PC - Version d&eacute;mat&eacute;rialis&eacute;e pour un nouvel abonnement ou un renouvellement - Livraison sur la messagerie Cdiscount en moins 1H 24h/24\r\n', 100, '320', '299', 'photos-produit-81/1622943028_eset-nod32-antivirus-11-2018-3-postes-1-an-v.jpg', 'photos-produit-81/1622943028_eset-nod32-antivirus-11-2018-3-postes-1-an-v (1).jpg', 'photos-produit-81/1622943028_eset-nod32-antivirus-11-2018-3-postes-1-an-v (2).jpg', 6),
(82, 'THE G-LAB Gaming KEYZ Tellurium Clavier r&eacute;tro&eacute;clair&eacute; - Avec Logiciel - Repose poignet - FR - AZERTY', 'Un Clavier con&ccedil;u pour de longues parties - Avec sa membrane ultra r&eacute;active, le Keyz Tellurium est con&ccedil;u pour r&eacute;sister &agrave; plus de 5 millions de frappes ! Son repose poignet magn&eacute;tique permet d&#039;adopter une posture plus naturelle et donc de soulager les tensions lors de longues sessions ! Ces 25 touches anti-ghosting assureront des frappes pr&eacute;cises et &eacute;viteront que certaines touches soient activ&eacute;es de mani&egrave;re non intentionn&eacute;e.', 100, '390', '390', 'photos-produit-82/1622943117_the-g-lab-gaming-keyz-tellurium-clavier-retroeclai (1).jpg', 'photos-produit-82/1622943117_the-g-lab-gaming-keyz-tellurium-clavier-retroeclai.jpg', 'photos-produit-82/1622943117_the-g-lab-gaming-keyz-tellurium-clavier-retroeclai (2).jpg', 5),
(83, 'Souris Gamer RGB Filaire PICTEK /Souris de Jeu 8 Boutons Programmables, 7200 dpi r&eacute;glable/Souris Gaming Ergonomique', 'Visuel Des Couleurs Impressionnant. Excellente R&eacute;activit&eacute; Et Performance Incroyable. Avec la conception confortable sym&eacute;trique et profil&eacute;e. Qualit&eacute; Fiable Et Support &Eacute;prouv&eacute;e. Souris Gamer Polyvalente Configurable.', 100, '230', '199', 'photos-produit-83/1622943189_souris-sans-fil-2-4g-victsing-2400-cpi-souris-opt.jpg', 'photos-produit-83/1622943189_souris-sans-fil-2-4g-victsing-2400-cpi-souris-opt (1).jpg', 'photos-produit-83/1622943189_souris-sans-fil-2-4g-victsing-2400-cpi-souris-opt (2).jpg', 5),
(84, 'CRUCIAL - Disque SSD Interne - BX500 - 240Go - 2,5&quot; - CT240BX500SSD1', 'L&#039;achat de ce produit vous permet d&#039;obtenir Norton 360 Deluxe pendant 1 an &agrave; 1&euro; seulement ! Une fois votre commande valid&eacute;e, vous recevrez un e-mail sous 24h. Vous &ecirc;tes-vous d&eacute;j&agrave; demand&eacute; pourquoi votre smartphone &eacute;tait plus rapide que votre ordinateur ? C&rsquo;est parce que votre t&eacute;l&eacute;phone fonctionne avec de la m&eacute;moire flash. Ajoutez de la m&eacute;moire flash &agrave; votre ordinateur avec le SSD Crucial&reg; BX500, le meilleur moyen d&rsquo;obtenir les performances d&rsquo;un ordinateur neuf sans en payer le prix.', 100, '370', '370', 'photos-produit-84/1622943286_crucial-disque-ssd-interne-bx500-240go-2-5.jpg', 'photos-produit-84/1622943286_crucial-disque-ssd-interne-bx500-240go-2-5 (1).jpg', 'photos-produit-84/1622943286_crucial-disque-ssd-interne-bx500-240go-2-5 (2).jpg', 5),
(85, 'Sapphire Carte graphique Radeon RX 580 8 Go PULSE OC - GDDR5 - 11265-05-20G', 'Les points forts :\r\nAMD Radeon RX 580\r\nType de bus : PCI Express 3.0 x16\r\nHorloge principale : 1366 MHz\r\nInterfaces : 2 x HDMI, 2 x DisplayPort, DVI-D\r\nTechnologie : GDDR5 SDRAM\r\nAPI prises en charge : DirectX 12, OpenGL 4.5, OpenCL 2.0', 100, '12000', '12000', 'photos-produit-85/1622943371_sapphire-carte-graphique-radeon-rx-580-8-go-pulse.jpg', 'photos-produit-85/1622943371_sapphire-carte-graphique-radeon-rx-580-8-go-pulse (2).jpg', 'photos-produit-85/1622943371_sapphire-carte-graphique-radeon-rx-580-8-go-pulse (1).jpg', 5),
(86, 'Corsair Vengeance RGB PRO Series 16 Go - 2x 8 Go - DDR4 3600 MHz CL18 - Kit Dual Channel 2 barrettes de RAM DDR4 PC4-28800', 'Les points forts :\r\n16 Go: 2 x 8 Go - 1.35 V\r\nTechnologie : DDR4 SDRAM\r\nVitesse : 3600 MHz (PC4-28800)\r\nTemps de latence : CL18 (18-22-22-42)\r\nNon ECC', 100, '1999', '1700', 'photos-produit-86/1622943998_corsair-vengeance-rgb-pro-series-16-go-2x-8-go-d (1).jpg', 'photos-produit-86/1622943998_corsair-vengeance-rgb-pro-series-16-go-2x-8-go-d (2).jpg', 'photos-produit-86/1622943998_corsair-vengeance-rgb-pro-series-16-go-2x-8-go-d.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `produitspanier`
--

DROP TABLE IF EXISTS `produitspanier`;
CREATE TABLE IF NOT EXISTS `produitspanier` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdProduit` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `IdPanier` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdProduit` (`IdProduit`),
  KEY `IdPanier` (`IdPanier`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produitspanier`
--

INSERT INTO `produitspanier` (`Id`, `IdProduit`, `Quantite`, `IdPanier`) VALUES
(44, 1, 3, 14),
(45, 1, 1, 15),
(46, 2, 1, 15),
(47, 31, 1, 15),
(48, 38, 3, 16),
(50, 44, 1, 16),
(51, 39, 4, 16);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Adresse` varchar(300) NOT NULL,
  `Ville` varchar(300) NOT NULL,
  `Login` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `Nom`, `Prenom`, `Telephone`, `Adresse`, `Ville`, `Login`, `Password`, `IsAdmin`) VALUES
(1, 'Utilisateur', 'Client', '0606060606', '10 rue du Client', 'Tetouan', 'utilisateur.client@gmail.com', '123456', 0),
(2, 'Utilisateur', 'Admin', '0606060606', '10 rue du Admin', 'Martil', 'utilisateur.admin@gmail.com', '123456', 1),
(3, 'prenom', 'nom', '0606060606', '17 rue de l\'adresse', 'ville', 'e-shop-user@gmail.com', '', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_Utilisateur_IdUtilisateur` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`Id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_Categorie_IdCategorie` FOREIGN KEY (`IdCategorie`) REFERENCES `categorie` (`Id`);

--
-- Contraintes pour la table `produitspanier`
--
ALTER TABLE `produitspanier`
  ADD CONSTRAINT `fk_Panier_IdPanier` FOREIGN KEY (`IdPanier`) REFERENCES `panier` (`Id`),
  ADD CONSTRAINT `fk_Produit_IdProduit` FOREIGN KEY (`IdProduit`) REFERENCES `produit` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
