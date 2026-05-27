-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2026 at 09:01 PM
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
-- Database: `hollowknight`
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
(4, 'Grimmchild', 'Worn by the bearer to summon a scarlet hatchling. The hatchling will consume Scarlet Flames to grow in strength.', 2, 'grimmchild.png', 'Dirthmouth - Troupe Master Grimm', 'Companion'),
(5, 'Soul Catcher', 'Used by shamans to draw more Soul from the world around them. Increases the amount of Soul gained when striking an enemy with the Nail.', 2, 'soulCatcher.png', 'Ancestral Mound', 'Soul'),
(6, 'Shaman Stone', 'Said to contain the knowledge of past shamans. Increases the power of spells, dealing more damage to foes.', 3, 'shamanStone.png', 'Forgotten Crossroads - Salubra', 'Spells'),
(7, 'Dashmaster', 'Bears the likeness of an eccentric bug known only as the Dashmaster. Allows the bearer to dash more often as well as dash downwards.', 2, 'dashmaster.png', 'Fungal Wastes', 'Movement'),
(8, 'Thorns of Agony', 'Senses the pain of its bearer and lashes out at the world around them. When taking damage, sprout thorny vines that damage nearby enemies.', 1, 'thornsOfAgony.png', 'Greenpath', 'Combat'),
(9, 'Fury of the Fallen', 'Embodies the fury and heroism of those who are about to die. When close to death, the bearer\'s strength will increase.', 2, 'furyOfTheFallen.png', 'King\'s Pass', 'Combat'),
(10, 'Fragile Heart', 'Increases the health of the bearer, allowing them to take more damage. This charm is fragile and will break if its bearer is killed.', 2, 'fragileHeart.png', 'Fungal Wastes - Leg Eater', 'Health'),
(11, 'Fragile Greed', 'Causes the bearer to find more Geo when defeating enemies. This charm is fragile and will break if its bearer is killed.', 2, 'fragileGreed.png', 'Fungal Wastes - Leg Eater', 'Utility'),
(12, 'Fragile Strength', 'Strengthens the bearer, increasing the damage they deal to enemies with the Nail. This charm is fragile and will break if its bearer is killed.', 3, 'fragileStrength.png', 'Fungal Wastes - Leg Eater', 'Combat'),
(13, 'Spell Twister', 'Reflecting the desires of the Soul Sanctum for mastery over Soul. Reduces the Soul cost of casting spells.', 2, 'spellTwister.png', 'Soul Sanctum', 'Spells'),
(14, 'Steady Body', 'Keeps the bearer from recoiling backwards when they strike an enemy with a Nail. Allows one to stay steady and keep attacking.', 1, 'steadyBody.png', 'Forgotten Crossroads - Salubra', 'Combat'),
(15, 'Heavy Blow', 'Increases the force of the bearers Nail, causing enemies to recoil further when hit.', 2, 'heavyBlow.png', 'Dirtmouth - Sly Store', 'Combat'),
(16, 'Quick Slash', 'Born from imperfect, discarded nails. Allows the bearer to slash much more rapidly with their Nail.', 3, 'quickSlash.png', 'Kingdom\'s Edge', 'Combat'),
(17, 'Longnail', 'Increases the range of the bearers Nail, allowing them to strike enemies from further away.', 2, 'longnail.png', 'Forgotten Crossroads - Salubra', 'Combat'),
(18, 'Mark of Pride', 'Freely given by the Mantis Tribe to those they respect. Greatly increases the range of the bearer\'s Nail.', 3, 'markOfPride.png', 'Mantis Village', 'Combat'),
(19, 'Quick Focus', 'A charm containing a crystal lens. Increases the speed of focusing Soul, allowing the bearer to heal damage faster.', 3, 'quickFocus.png', 'Forgotten Crossroads - Salubra', 'Health'),
(20, 'Deep Focus', 'Naturally formed within a crystal over a long period. The bearer will focus Soul at a slower rate, but the healing effect will be doubled.', 4, 'deepFocus.png', 'Crystal Peak', 'Health'),
(21, 'Lifeblood Heart', 'Contains a living core that bleeds precious lifeblood. When resting, the bearer will gain a coating of lifeblood that protects from a small amount of damage.', 2, 'lifebloodHeart.png', 'Forgotten Crossroads - Salubra', 'Health'),
(22, 'Lifeblood Core', 'Contains a thick core that bleeds a large amount of lifeblood. When resting, the bearer will gain a thick coating of lifeblood that protects from a significant amount of damage.', 3, 'lifebloodCore.png', 'The Abyss', 'Health'),
(23, 'Jonis Blessing', 'Blessed by Joni, the kindly heretic. Transmutes vital fluids into blue lifeblood. The bearer will have a much healthier shell, but they will be unable to heal themselves by focusing Soul.', 4, 'jonisBlessing.png', 'Howling Cliffs', 'Health'),
(24, 'Grubsong', 'Contains the gratitude of freed grubs. Gain Soul when taking damage.', 1, 'grubsong.png', 'Forgotten Crossroads- Grubfather', 'Soul'),
(25, 'Grubberflys Elegy', 'Contains the gratitude of grubs who have moved onto the next stage of their lives. When the bearer is at full health, they will fire beams of white-hot energy from their Nail.', 3, 'grubberflysElegy.png', 'Forgotten Crossroads- Grubfather', 'Combat'),
(26, 'Flukenest', 'A living charm plucked from the womb of a Flukemarm. Transforms the Vengeful Spirit spell into a horde of volatile baby flukes.', 3, 'flukenest.png', 'Royal Waterways', 'Spells'),
(27, 'Defenders Crest', 'Unique charm bestowed by the King of Hallownest to his most loyal knight. Causes the bearer to emit a heroic odor.', 1, 'defendersCrest.png', 'Royal Waterways', 'Utility'),
(28, 'Shape of Unn', 'Reveals the form of Unn within the bearer. While focusing Soul, the bearer will take on a new shape and can move freely to avoid enemies.', 2, 'shapeOfUnn.png', 'Lake of Unn', 'Movement'),
(29, 'Spore Shroom', 'Composed of living fungal matter. When focusing Soul, the bearer will emit a cloud of spores that slowly damages nearby enemies.', 1, 'sporeShroom.png', 'Fungal Wastes', 'Utility'),
(30, 'Sharp Shadow', 'Contains a forbidden spell that transforms shadows into deadly weapons. When using Shade Cloak, the bearers body will sharpen and damage enemies passed through.', 2, 'sharpShadow.png', 'Deepnest', 'Movement'),
(31, 'Dream Wielder', 'Transient charm embodying the dreams of those who forget. Allows the bearer to charge the Dream Nail faster and gain more Soul when hitting an enemy.', 1, 'dreamWielder.png', 'Resting Grounds', 'Soul'),
(32, 'Dreamshield', 'Defensive charm that summons a shield that rotates around the bearer. The shield will block projectiles and deal damage to enemies it strikes.', 3, 'dreamshield.png', 'Resting Grounds', 'Combat'),
(33, 'Weaversong', 'Silken charm containing a song of farewell, used by the Weavers to leave Hallownest. Summons tiny weaverlings to give the bearer company and aid in battle.', 2, 'weaversong.png', 'Deepnest', 'Companion'),
(34, 'Sprintmaster', 'Bears the likeness of a strange bug known only as the Sprintmaster. Increases the movement speed of the bearer.', 1, 'sprintmaster.png', 'Dirtmouth - Sly Store', 'Movement'),
(35, 'Glowing Womb', 'Drains the Soul of its bearer to birth hatchlings. The hatchlings will aid the bearer in battle, but will die after attacking an enemy.', 2, 'glowingWomb.png', 'Forgotten Crossroads - Ancestral Mound', 'Companion'),
(36, 'Carefree Melody', 'Token of a friendship that persisted through dark times. Contains a song that has a chance to block incoming damage.', 3, 'carefreeMelody.png', 'Dirtmouth - Nymm', 'Health'),
(37, 'Kingsoul', 'Holy charm symbolizing a union between higher beings. The bearer will slowly absorb the infinite Soul which permeates the world.', 5, 'kingsoul.png', 'White Palace - Queens Gardens', 'Soul'),
(38, 'Void Heart', 'An empty shell that shines with a dark light. It unifies the void under the bearers will. This charm is a part of its bearer and cannot be unequipped.', 0, 'voidHeart.png', 'The Abyss', 'Soul'),
(39, 'Hiveblood', 'Golden nugget of the Hives precious hardened nectar. Heals the bearers wounds over time without consuming Soul.', 4, 'hiveblood.png', 'The Hive', 'Health'),
(40, 'Unbreakable Heart', 'Increases the health of the bearer, allowing them to take more damage. This charm is made of a sturdy material and will never break.', 2, 'unbreakableHeart.png', 'Dirthmouth - Divine', 'Health'),
(41, 'Unbreakable Greed', 'Causes the bearer to find more Geo when defeating enemies. This charm is made of a sturdy material and will never break.', 2, 'unbreakableGreed.png', 'Dirthmouth - Divine', 'Utility'),
(42, 'Unbreakable Strength', 'Strengthens the bearer, increasing the damage they deal to enemies with the Nail. This charm is made of a sturdy material and will never break.', 3, 'unbreakableStrength.png', 'Dirthmouth - Divine', 'Combat');

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
(20, 'Radiance'),
(21, 'Wandering Husk'),
(22, 'Husk Hornhead'),
(23, 'Leaping Husk'),
(24, 'Husk Bully'),
(25, 'Husk Warrior'),
(26, 'Husk Guard'),
(27, 'Maggot'),
(28, 'Menderbug'),
(29, 'Baldur'),
(30, 'Elder Baldur'),
(31, 'Vengefly'),
(32, 'Furious Vengefly'),
(33, 'Mosscreep'),
(34, 'Mosskin'),
(35, 'Volatile Mosskin'),
(36, 'Fool Eater'),
(37, 'Squit'),
(38, 'Obble'),
(39, 'Gulka'),
(40, 'Maskfly'),
(41, 'Moss Charger'),
(42, 'Massive Moss Charger'),
(43, 'Moss Knight'),
(44, 'Moss Vagabond'),
(45, 'Ambloom'),
(46, 'Fungling'),
(47, 'Fungoon'),
(48, 'Sporg'),
(49, 'Fungified Husk'),
(50, 'Shrumeling'),
(51, 'Shrumal Warrior'),
(52, 'Shrumal Ogre'),
(53, 'Mantis Youth'),
(54, 'Mantis Warrior'),
(55, 'Husk Sentry'),
(56, 'Heavy Sentry'),
(57, 'Winged Sentry'),
(58, 'Lance Sentry'),
(59, 'Mistake'),
(60, 'Folly'),
(61, 'Soul Twister'),
(62, 'Belfly'),
(63, 'Dirtcarver'),
(64, 'Carver Hatcher'),
(65, 'Stalking Devout'),
(66, 'Lesser Mawlek'),
(67, 'Great Husk Sentry'),
(68, 'Brooding Mawlek');

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
(34, 2, 1),
(34, 3, 1),
(34, 4, 1),
(34, 5, 1),
(34, 6, 1),
(34, 7, 1),
(34, 8, 1),
(34, 9, 1),
(34, 10, 1),
(34, 11, 1),
(34, 12, 1),
(34, 13, 1),
(34, 14, 1),
(34, 15, 1),
(34, 16, 1),
(34, 17, 1),
(34, 18, 0),
(34, 19, 1),
(34, 20, 1),
(34, 23, 1),
(34, 24, 1),
(34, 25, 1),
(34, 26, 1),
(34, 27, 1),
(34, 28, 1),
(34, 29, 1),
(34, 30, 1),
(34, 31, 1),
(34, 32, 1),
(34, 33, 1),
(34, 34, 1),
(34, 35, 1),
(34, 36, 1),
(34, 38, 1),
(34, 39, 1),
(34, 40, 1),
(34, 41, 1),
(34, 43, 1),
(34, 44, 1),
(34, 45, 1),
(34, 46, 1),
(34, 47, 1),
(34, 48, 1),
(34, 49, 1),
(34, 53, 1),
(34, 54, 1),
(34, 56, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `enemies`
--
ALTER TABLE `enemies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
