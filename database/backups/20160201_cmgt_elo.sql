-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 feb 2016 om 10:05
-- Serverversie: 10.1.9-MariaDB
-- PHP-versie: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmgt_elo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `building_blocks`
--

CREATE TABLE `building_blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `challenges` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `building_blocks`
--

INSERT INTO `building_blocks` (`id`, `name`, `slogan`, `description`, `challenges`, `created_at`, `updated_at`) VALUES
(1, 'Functionele dingen programmeren', '“Ik pas de content van die 32 websites die ik beheer wel handmatig aan…”', '<p>Back-end development.</p>\r\n<p>Hierbij komt de techniek kijken waarbij informatie, aan de kant van de server, verwerkt wordt (bijv. in een database). Hiermee kan de informatie op &eacute;&eacute;n plek beheerd worden en kunnen meerdere clients van dezelfde data gebruik maken. Het beheren van de content kan ook via een webinterface gebeuren, een zogenaamd Content Management Systeem (CMS).</p>\r\n<p>Bij het uitwerken van de code is effici&euml;ntie van groot belang. De hoeveelheid data die van server naar client gaat moet zo laag mogelijk zijn en het moet voor een programmeur niet te veel tijd kosten om onderdelen aan de code toe te voegen of aanpassingen te doen. Hergebruik van code, aanbrengen van structuur en het generiek opzetten van code is daarom belangrijk.</p>\r\n<p>Een ander onderdeel dat bij effici&euml;ntie hoort, is het gebruik maken van onderdelen die al bestaan of te specialistisch zijn om zelf te bouwen, denk aan een bestaande library of het gebruik van een API. Kwaliteitscheck: je weet wanneer je code zelf moet schrijven of gebruik kan maken van libraries of het aanroepen van data uit een API. Je geeft nog steeds blijk van kennis wat er in de library of de API gebeurt, ondanks dat het niet jouw code is.</p>', '<ul>\r\n<li>je hebt een website gebouwd, gevoed door een database, waarbij inhoud (content), logica (programmeren) en opmaak van elkaar gescheiden zijn zodat overzicht en structuur ontstaat.</li>\r\n<li>een website gebouwd waarmee de content van een website beheert kan worden (eenvoudig CMS): CRUD functionaliteit\r\n<ul>\r\n<li>JOIN(s)</li>\r\n<li>Selections (bijv WHERE, LIKE, ORDER BY)</li>\r\n</ul>\r\n</li>\r\n<li>je weet wanneer je code zelf moet schrijven of gebruik kan maken van libraries of API om op die manier tijd te besparen.</li>\r\n<li>je weet hoe je een bestaande library kunt implementeren in jouw project zodanig dat je de functies in de library kunt aanspreken en dit kunt aantonen in projecten die je zelf gemaakt hebt.</li>\r\n<li>je kunt objectgeori&euml;nteerde code schrijven (tot enkelvoudige overerving) om op deze manier complexe code te structureren</li>\r\n</ul>', '2016-01-21 22:05:08', '2016-01-23 10:18:49'),
(2, 'Onderzoeken Block', '“Ik doe altijd maar wat en dan zie ik wel wat er uit komt…”', '<p>Om goede producten te ontwerpen en te ontwikkelen is onderzoek nodig. Onderzoek in het beginstadium van een ontwerp geeft bijvoorbeeld meer inzicht in de behoeften en wensen van gebruikers. Later in het proces kan onderzoek ingezet worden om een ontwerp of product te evalueren of testen.</p>\r\n<p>Voor een goed onderzoek begin je met vooronderzoek (desk research) om de context te verkennen. Op basis daarvan formuleer je een onderzoeksvraag. Vervolgens kies je een passende methode (bv. interview, enqu&ecirc;te of observatiestudie) bij deze vraag en ga je data verzamelen. Je analyseert de resultaten en op basis daarvan trek je conclusies en geef je aanbevelingen voor het (verder) ontwikkelen van je product of ontwerp.</p>\r\n<p>Tijdens je onderzoek betracht je zorgvuldigheid in de interactie met de deelnemers van je onderzoek en ben je je bewust van hun mogelijke kwetsbaarheden. Verder reflecteer je op je eigen rol in het onderzoek (subjectiviteit versus objectiviteit).</p>', '<ul>\r\n<li>Je hebt relevante bronnen op een correcte wijze verwerkt in tekst en bronnenlijst zodanig dat anderen een goed inzicht krijgen in je onderbouwing</li>\r\n<li>Je hebt het onderzoeksdoel zodanig afgebakend dat je een onderzoeksvraag kunt formuleren</li>\r\n<li>Je kan een onderzoeksmethode selecteren en uitwerken zodanig dat je daarmee een antwoord kunt vinden op de onderzoeksvraag</li>\r\n<li>Je weet data te verzamelen en weer te geven zodanig dat je conclusies kunt trekken en aanbevelingen kunt doen</li>\r\n<li>Je kunt zodanig op je eigen onderzoek reflecteren dat de sterke en zwakke punten van het onderzoek en jouw rol daarin duidelijk worden\\n Je gaat zodanig met je onderzoeksomgeving en deelnemers om dat je hiermee respect toont</li>\r\n</ul>', '2016-01-22 09:58:28', '2016-01-23 10:17:05'),
(3, 'Debriefing Block', '“How the customer explained it…”', '<p>Debriefing van de opdracht waarmee het concept uitgedacht kan gaan worden. De debriefing is in correct Nederlands. In presentatie-vorm gegeven en/of tekstueel uitgewerkt. Bevat een uitgebreide analyse van het probleem en is niet enkel een samenvatting van datgene dat gezegd is door de opdrachtgever. Bevat ook in de kern de opdracht zoals deze door het team is begrepen en een akkoord daarvoor van de opdrachtgever.</p>\r\n<p>Debriefing staat aan de ene kant voor een einddocument waarin de afgesproken opdracht in is uitgewerkt als het proces van het debriefen: vanaf het moment dat de klant contact met je opneemt tot het moment dat jullie beide helemaal helder hebben welke oplossingsrichting het beste past bij het probleem van de opdrachtgever.</p>', '<p dir="ltr">De opdracht wordt geverifieerd met de opdrachtgever, maar wel in EIGEN WOORDEN.</p>\r\n<p dir="ltr">Mogelijke onderdelen van een debriefing:</p>\r\n<ul>\r\n<li>Betrokkenen/partijen</li>\r\n<li>Doelstelling (nog oplossingsvrij)</li>\r\n<li>Doelgroep</li>\r\n<li>Opdracht</li>\r\n<li>Verificatie van de opdracht</li>\r\n<li>Visie, kansen, beperkingen en haalbaarheid</li>\r\n</ul>\r\n<div>Extra uitleg:</div>\r\n<div>De debriefing zelf is een document waarin de afspraken staan wat je gaat maken voor de opdrachtgever. Het is onderdeel van de offerte en vormt het deel wat gaat over wat de opdracht precies inhoudt en wat de klant kan verwachten (dus niet de prijs en uren, dat is een ander onderdeel van de offerte). Het moment dat een goede debriefing kan worden opgesteld is vaak na meerdere gesprekken met een opdrachtgever waarbij steeds duidelijker wordt wat de opdrachtgever echt wilt. In eerste instantie kan deze aangeven een webwinkel te willen maar uiteindelijk blijkt hij een beter contact met zijn vaste klanten als beoogd doel te hebben. Daar passen wellicht andere manieren van gebruik van digitale media beter bij (een abonnementsvorm voor vaste klanten bijvoorbeeld, die klanten zelf online kunnen beheren).</div>\r\n<div>De curatoren verwachten tijdens het assessment dat je kan aantonen dat je een aantal gesprekken hebt gevoerd met een opdrachtgever en dat daarin steeds duidelijker is geworden wat het probleem van de opdrachtgever is en hoe de oplossing er echt uit moet gaan zien (zonder al in visuals of functionele specificaties te denken, dat is weer een stap verder). Dat het proces van de opdracht helder krijgen is doorlopen kan je aantonen door bijvoorbeeld interviews als audio op te nemen of door na elk gesprek een gespreksverslag te maken en deze wederom door te nemen met de opdrachtgever. Je bewijst dit building block dus niet door alleen maar een eind-debriefing te laten zien waarin de opdracht uitgelegd wordt maar ook het proces naar dit document toe moet je kunnen aantonen.</div>\r\n<div>&nbsp;</div>', '2016-01-29 11:57:42', '2016-01-29 11:59:44'),
(4, 'Concepten Block', '“What the customer really needed…”', '<p>Concept dat aansluit bij de initi&euml;le opdracht en waar de opdrachtgever mee akkoord is gegaan. Concept kent een opvallende uitwerking en lost het vraagstuk op (divergentie, convergentie). De vraag van de opdrachtgever is omgezet in een concept dat veel meer de vraag achter de vraag beantwoordt dan letterlijk een uitwerking is van het initi&euml;le vraagstuk. De bronnen, het idee of onderdelen hiervan zijn verrassend en geven blijk van een goed overzicht op het probleemgebied maar ook op het vakgebied CMGT/mediatechnologie. Brainstorming, visual concepting, convergeren, divergeren.</p>', '<ul>\r\n<li>Kan een ontwikkelprocess kiezen en daarbij een planning opstellen.</li>\r\n<li>Gebruikt de resultaten van een onderzoek om een ontwerpkader te bepalen.</li>\r\n<li>Gebruikt de debriefing (probleemstelling) als aanleiding voor het concept.</li>\r\n<li>Kan ontwerprichtlijnen opstellen.</li>\r\n<li>Kent verschillende brainstorm methoden en kan deze toepassen.</li>\r\n<li>Draagt in iteraties verschillende oplossingen aan.</li>\r\n<li>Kan concepten visualiseren.</li>\r\n</ul>', '2016-01-29 12:03:11', '2016-01-29 12:04:44');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `building_block_student`
--

CREATE TABLE `building_block_student` (
  `building_block_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `building_block_student`
--

INSERT INTO `building_block_student` (`building_block_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, '1', '2016-01-30 01:37:41', '0000-00-00 00:00:00'),
(2, 7, '1', '2016-01-30 01:37:11', '0000-00-00 00:00:00'),
(3, 7, '0', '2016-01-30 23:39:21', '0000-00-00 00:00:00'),
(4, 7, '2', '2016-01-30 01:29:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `building_block_user`
--

CREATE TABLE `building_block_user` (
  `building_block_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `building_block_user`
--

INSERT INTO `building_block_user` (`building_block_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-01-21 22:05:08', '2016-01-21 22:05:08'),
(1, 6, '2016-01-25 14:24:24', '2016-01-25 14:24:24'),
(2, 1, '2016-01-22 09:58:28', '2016-01-22 09:58:28'),
(2, 6, '2016-01-22 23:21:17', '2016-01-22 23:21:17'),
(3, 1, '2016-01-29 11:59:27', '2016-01-29 11:59:27'),
(4, 1, '2016-01-29 12:03:46', '2016-01-29 12:03:46');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'CLE2', 'CLE2 description', '2015-11-16', '2016-02-05', '2016-01-15 20:51:04', '2016-01-15 20:51:04'),
(2, 'CLE1', 'CLE1 description', '0000-00-00', '0000-00-00', '2016-01-16 09:39:35', '2016-01-16 09:39:35');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `criteria` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `description`, `criteria`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sprint 1', 'professionaliteit', '2016-01-15 13:21:38', '2016-01-15 13:21:38'),
(2, 1, 'Sprint 2', '', '2016-01-15 21:57:50', '2016-01-15 21:57:50'),
(3, 1, 'Sprint 3', '', '2016-01-16 00:13:19', '2016-01-16 00:13:19'),
(4, 2, 'Sprint 1', 'criteria', '2016-01-16 09:39:59', '2016-01-16 09:39:59');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `result_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `result_id`, `content`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dit was echt niet zo best', 7, '2016-01-15 13:22:00', '2016-01-15 13:22:00'),
(2, 1, 'Dat ging al een stuk beter', 7, '2016-01-16 11:38:17', '2016-01-16 11:38:17'),
(3, 1, 'Dit is de feedback voor sprint 1 van CLE2', 7, '2016-01-17 14:23:23', '2016-01-17 14:23:23'),
(4, 8, 'mooi', 7, '2016-01-18 16:06:05', '2016-01-18 16:06:05'),
(5, 9, 'niet mooi', 7, '2016-01-18 16:06:05', '2016-01-18 16:06:05'),
(6, 10, 'WAARDELOOS', 7, '2016-01-18 16:06:05', '2016-01-18 16:06:05'),
(7, 11, 'Geweldig', 7, '2016-01-18 19:41:35', '2016-01-18 19:41:35'),
(8, 12, 'Joepi', 7, '2016-01-19 11:43:12', '2016-01-19 11:43:12'),
(9, 13, 'gfgfgfgfh', 1, '2016-01-19 12:53:15', '2016-01-19 12:53:15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_15_133423_create_feedbacks_table', 1),
('2016_01_15_141716_create_exams_table', 1),
('2016_01_15_145223_create_courses_table', 1),
('2016_01_15_214322_create_results_table', 1),
('2016_01_20_214142_create_buildingblocks_table', 2),
('2016_01_20_220343_create_building_block_user_pivot_table', 3),
('2016_01_29_220343_create_building_block_student_pivot_table', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `results`
--

INSERT INTO `results` (`id`, `student_id`, `exam_id`, `result`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'v', '2016-01-15 20:51:42', '2016-01-15 20:51:42'),
(2, 7, 3, '10', '2016-01-16 00:14:10', '2016-01-16 00:14:10'),
(3, 7, 1, 'O', '2016-01-16 00:20:10', '2016-01-16 00:20:10'),
(4, 7, 4, '9,5', '2016-01-16 09:41:35', '2016-01-16 09:41:35'),
(5, 6, 1, '100', '2016-01-18 15:50:50', '2016-01-18 15:50:50'),
(6, 7, 1, 'beoordeling 6', '2016-01-18 16:01:17', '2016-01-18 16:01:17'),
(7, 7, 1, 'beoordeling 6', '2016-01-18 16:01:56', '2016-01-18 16:01:56'),
(8, 7, 1, '8,5', '2016-01-18 16:06:05', '2016-01-18 16:06:05'),
(9, 7, 2, '5,5', '2016-01-18 16:06:05', '2016-01-18 16:06:05'),
(10, 7, 3, '3', '2016-01-18 16:06:05', '2016-01-18 16:06:05'),
(11, 7, 2, '100', '2016-01-18 19:41:35', '2016-01-18 19:41:35'),
(12, 7, 1, '7', '2016-01-19 11:43:12', '2016-01-19 11:43:12'),
(13, 1, 4, '6', '2016-01-19 12:53:15', '2016-01-19 12:53:15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_prefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `code`, `firstname`, `name_prefix`, `lastname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PIKAB', 'Bob', '', 'Pikaar', 'pikab@hr.nl', 'test', NULL, '2016-01-14 15:15:12', '2016-01-14 15:15:12'),
(6, 'ZOETR', 'Rob', '', 'Zoeteweij', 'zoetr@hr.nl', 'test', NULL, '2016-01-14 21:19:03', '2016-01-14 21:19:03'),
(7, '12345', 'Henk', 'van', 'Truus', 'henk@henk.com', '$2y$10$SXDSOlwMHQTeUPvzOHyTmuvcx5ngR8v7ZNIg2Di3GVqsKYRCeV9Fy', '0CCPvjLNOykwGswlS1Y5XFAAAjwdTs1GlmGXhzGksECCXB3QjIHTyXTpJkwI', '2016-01-14 22:35:54', '2016-01-14 22:44:32');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `building_blocks`
--
ALTER TABLE `building_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `building_block_student`
--
ALTER TABLE `building_block_student`
  ADD PRIMARY KEY (`building_block_id`,`user_id`),
  ADD KEY `building_block_student_building_block_id_index` (`building_block_id`),
  ADD KEY `building_block_student_user_id_index` (`user_id`);

--
-- Indexen voor tabel `building_block_user`
--
ALTER TABLE `building_block_user`
  ADD PRIMARY KEY (`building_block_id`,`user_id`),
  ADD KEY `building_block_user_building_block_id_index` (`building_block_id`),
  ADD KEY `building_block_user_user_id_index` (`user_id`);

--
-- Indexen voor tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_course_id_index` (`course_id`) USING BTREE;

--
-- Indexen voor tabel `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_exam_id_index` (`result_id`),
  ADD KEY `feedbacks_student_id_index` (`student_id`) USING BTREE;

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexen voor tabel `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_student_id_index` (`student_id`),
  ADD KEY `results_exam_id_index` (`exam_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `building_blocks`
--
ALTER TABLE `building_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `building_block_student`
--
ALTER TABLE `building_block_student`
  ADD CONSTRAINT `building_block_student_building_block_id_foreign` FOREIGN KEY (`building_block_id`) REFERENCES `building_blocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `building_block_student_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `building_block_user`
--
ALTER TABLE `building_block_user`
  ADD CONSTRAINT `building_block_user_building_block_id_foreign` FOREIGN KEY (`building_block_id`) REFERENCES `building_blocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `building_block_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
