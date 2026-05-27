-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2026 at 11:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `main_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `description`, `main_image`) VALUES
(1, 'Dirtmouth', 'The fading town above the ruins of Hallownest. Once a bustling center for travelers, it is now home to only a few lingering souls waiting for the world to wake up.', 'dirtmouth.jpg'),
(2, 'Forgotten Crossroads', 'A bustling hub of travel for the kingdom of Hallownest, now fallen into decay and infested with husks. It connects many of the higher paths of the world.', 'forgottenCrossroads.jpg'),
(3, 'Greenpath', 'A lush, verdant labyrinth of moss and vegetation. It is home to the Mosskin and is protected by the mysterious warrior, Hornet.', 'greenpath.jpg'),
(4, 'Crystal Peak', 'A glittering mine filled with dangerous crystals and industrial machinery. The light here is beautiful but deadly to those unprepared.', 'crystalPeak.jpg'),
(5, 'City of Tears', 'The capital of Hallownest, where it eternally rains. Built into a massive cavern, it remains a monument to the kingdoms former glory.', 'cityofTears.jpg'),
(6, 'Fungal Wastes', 'A humid region filled with massive mushrooms and corrosive pools. Home to the territorial Mantis Tribe and the bouncy Shrumas.', 'fungalWastes.jpg'),
(7, 'Fog Canyon', 'A misty, ethereal canyon filled with explosive jellyfish and translucent bubbles. It houses the Teacher’s Archives.', 'fogCanyon.jpg'),
(8, 'Royal Waterways', 'Located beneath the City of Tears, this dank network of pipes and tunnels manages the kingdom’s waste and water flow.', 'royalWaterways.jpg'),
(9, 'Howling Cliffs', 'The desolate, wind-swept edge of the world. It is where many travelers first enter Hallownest, or leave it to lose their minds.', 'howlingCliffs.jpg'),
(10, 'Ancient Basin', 'A lonely, silent cavern at the very bottom of the kingdom. It holds the remains of a civilization older than Hallownest itself.', 'ancientBasin.jpg'),
(11, 'Kingdoms Edge', 'A vast, ash-covered cliffside on the eastern border. Giants once fell here, and their discarded shells form the landscape.', 'kingdomsEdge.jpg'),
(12, 'The Hive', 'A golden, secluded stronghold hidden within Kingdom’s Edge. It is ruled by the Bees and smells eternally of honey.', 'theHive.jpg'),
(13, 'Queens Gardens', 'A refined, elegant sanctuary once maintained for the White Lady. It has since been overgrown by wild, thorny flora.', 'queensGardens.jpg'),
(14, 'Resting Grounds', 'A peaceful and somber place of burial. It is a sacred site where the memories of those passed are watched over by the Seer.', 'restingGrounds.jpg'),
(15, 'Deepnest', 'A dark, claustrophobic network of tunnels and spider webs. It is home to the most terrifying creatures in Hallownest and is avoided by most.', 'deepnest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `charms`
--

CREATE TABLE `charms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `notches` int(10) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charms`
--

INSERT INTO `charms` (`id`, `name`, `description`, `notches`, `imagePath`, `location`, `category`) VALUES
(1, 'Wayward Compass', 'Whispers its location to the bearer whenever a map is open.', 1, 'waywardCompass.png', 'Dirtmouth - Iselda Store', 'Utility'),
(2, 'Gathering Swarm', 'A swarm will follow the bearer and gather up any loose Geo.', 1, 'gatheringSwarm.png', 'Dirtmouth - Sly Store', 'Utility'),
(3, 'Stalwart Shell', 'Builds resilience. After taking damage, the bearer will remain invulnerable for longer.', 2, 'stalwartShell.png', 'Dirtmouth - Sly Store', 'Combat'),
(4, 'Grimmchild', 'Worn by the bearer to summon a scarlet hatchling. The hatchling will consume Scarlet Flames to grow in strength.', 2, 'grimmchild.png', 'Dirthmouth - Troupe Master Grimm', 'Companion');

-- --------------------------------------------------------

--
-- Table structure for table `enemies`
--

CREATE TABLE `enemies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enemies`
--

INSERT INTO `enemies` (`id`, `name`) VALUES
(1, 'Crawlid'),
(2, 'Vengefly'),
(3, 'Gruzzer'),
(4, 'Tiktik'),
(5, 'Aspid Hunter'),
(6, 'Great Husk Sentry'),
(7, 'Mosscreep'),
(8, 'Baldur'),
(9, 'False Knight'),
(10, 'Hornet'),
(11, 'Mantis Warrior'),
(12, 'Soul Twister'),
(13, 'Dung Defender'),
(14, 'Crystal Guardian'),
(15, 'Primal Aspid'),
(16, 'Nosk'),
(17, 'The Hollow Knight'),
(18, 'Pure Vessel'),
(19, 'Grimm'),
(20, 'Radiance');

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` int(5) NOT NULL,
  `title` varchar(150) NOT NULL,
  `caption` text NOT NULL,
  `imagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `title`, `caption`, `imagePath`) VALUES
(1, 'The Knight and Quirrel', 'The Knight is chilling with Quirrel at the entrance of City of Tears. It is raining heavily, but why though?', '20250401220234_1.jpg'),
(5, 'Flying through Crystal Peak', 'Flying through Crystal Peak, with my new ability. I am so happy that I have succeeded getting my new fast traveling method.', '20250407142112_1.jpg'),
(6, 'Respect of the Mantises', 'After a very tough and an exciting fight with the Mantis Lords, we earned their respect throughout their kingdom. What an achievement.', '20250412113100_1.jpg'),
(8, 'The earned respect', 'One of the Mantises showing respect to me, what i earned with effort. It feels very rewarding.', '20250412113515_1.jpg'),
(9, 'Respected by Mantis Lords', 'The one and only picture of me with the Mantis Lords. I respect them and now they respect me. A clear view who is better now.', '20250412113634_1.jpg'),
(10, 'The Blue Lake', 'Flying through the Blue Lake, maybe this is the source of the rain in City of Tears?', '20250419121858_1.jpg'),
(11, 'The last moments with Quirrel', 'Spending his last moments at the Blue Lake with me. Respect to him, and see you later in another world Quirrel!', '20250419120019_1.jpg'),
(12, 'The View', 'The view from the Watchers Spire.', '20250420223747_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `role`) VALUES
(1, 'asd', 'asd@gmail.com', '$2y$10$3BbV0tdm1jC9wdTj3.tJcO165PZC1V/gQFJpypexarmnDzxctTJJG', 0),
(20, 'bravo', 'bravo@gmail.com', '$2y$10$HxSj4EztURAeB8SJX0fOXue0Qlk3pSJqRKxMJCwTW7fRjluN9RbMK', 0),
(21, 'anyu', 'anyu@gmail.com', '$2y$10$pRU0RdbtCagigxPlVJQ6GuMCEBjwGhfRGDC1X/5PDKv6Sxrz.uc8S', 0),
(22, 'Boldizsar', 'boldizsar@boldi.com', '$2y$10$eEMhATK7nfwKL8C7RKCptuXkWJxLxGv8cRVBXHmMs2kCyi7sQC1Ly', 0),
(25, 'Boldi', 'boldi@boldi.com', '$2y$10$f1wKr7xbJg5VEDxdni4T5uLJ13Xi1LuX2tZ1qWEdK9kh7FAJ4XbJm', 0),
(26, 'Boldi2', 'boldi2@boldi.com', '$2y$10$nQX6doSwQPPDTz7egV7BYO2uuFUUi6aACk4agwWbxvxbHdXzuD0dW', 0),
(27, 'Nemar', 'nemar@gmail.com', '$2y$10$/4WHt91UEf6.THUoIfT8qeregTlizMjLk8Q0beecIl9uHHD1Tsvqm', 0),
(28, 'garfield', 'garfield@gmail.com', '$2y$10$BW5SAw6DQPbkiz.phBv31OMaL6wD7oUtswzDZaX4OpPcNJddkSV/S', 0),
(29, 'nermal', 'nermal@abu.dabi.com', '$2y$10$7ufHEZtKagParvLQvZ4.QuXp264ekYhDg/d1jHIqP60zWldGS/0F2', 0),
(30, 'proba', 'proba12@proba.hu', '$2y$10$kshiWj4N2wBui6vvHdVaiOEZ/e7z7WdtjftLHF8SYro/TAFjnLwNy', 0),
(31, 'proba', 'proba@proba.hu', '$2y$10$5mUEeLNMQ9bgVzgNNytTM.Th0jnNCQ.vb9CxxWlWoxXd8VbgM/Pp6', 1),
(32, 'nemtom1234', 'marksuranyi07@gmail.com', '$2y$10$oqYQcOXherv4.RWr3cOkQOrcxB0zgBhLlrDCvFf8CTORXV1chyqRi', 1),
(33, 'ferihegy', 'ferihegy@feri.hegy', '$2y$10$lLP8ua00O67F.H1OTi1NuO5UjfeB/3TjQa82j..FAEAOmFWYaOqj.', 0),
(34, 'bywor', 'bywor69@gmail.com', '$2y$10$kbv1K4utzVnJsn04VQ/nqutJLX7E5Ho2mEiB9EtZFRUmZcSjgn.uC', 1),
(35, 'unknow', 'unknow@unknow.un', '$2y$10$MRbnmtMhzovWwzMpOF5uUu948/ljmsgAUeAGUrxt.dmnjteB/hvFu', 0),
(36, 'quirrel', 'quirrel@hollow.com', '$2y$10$NF79kpbOxzab1ydagDKiROAjUAiRMnd5NRsTI2DAPonurvoS9xyMa', 0),
(37, 'relax', 'relax@hawaii.beach', '$2y$10$WBH8wl2oeO8jIro7XCjjnONExP5ikXXUpB6.vTVmloWue9mZc4.gq', 0),
(38, 'felkeszito', 'felkeszult@vagyok.most', '$2y$10$UAhL96OfxDj8UCPnANpi9.wZXY.eyPBgVNAiuy./9TJpRpcrH0pVW', 0),
(39, 'asd', 'asd@a.com', '$2y$10$VuHz47EJRN84.EoTZKIaVuDxX9odcUL9HAeUAoflx2k8aY4COoOdO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_enemies`
--

CREATE TABLE `user_enemies` (
  `user_id` int(11) NOT NULL,
  `enemy_id` int(11) NOT NULL,
  `is_discovered` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_enemies`
--

INSERT INTO `user_enemies` (`user_id`, `enemy_id`, `is_discovered`) VALUES
(29, 1, 1),
(29, 11, 0),
(29, 20, 1),
(34, 1, 1),
(34, 4, 1),
(34, 6, 1),
(34, 7, 1),
(34, 9, 1),
(34, 11, 1),
(34, 14, 1),
(34, 16, 1),
(34, 19, 1),
(34, 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charms`
--
ALTER TABLE `charms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enemies`
--
ALTER TABLE `enemies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_enemies`
--
ALTER TABLE `user_enemies`
  ADD PRIMARY KEY (`user_id`,`enemy_id`),
  ADD KEY `enemy_id` (`enemy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `charms`
--
ALTER TABLE `charms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enemies`
--
ALTER TABLE `enemies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_enemies`
--
ALTER TABLE `user_enemies`
  ADD CONSTRAINT `user_enemies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_enemies_ibfk_2` FOREIGN KEY (`enemy_id`) REFERENCES `enemies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
