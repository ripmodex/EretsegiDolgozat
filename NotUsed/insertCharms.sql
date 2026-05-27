INSERT INTO charms (name, description, notches, imagePath, location, category) VALUES
('Wayward Compass', 'Whispers its location to the bearer whenever a map is open.', 1, 'waywardCompass.png', 'Dirtmouth - Iselda Store', 'Utility'),
('Gathering Swarm', 'A swarm will follow the bearer and gather up any loose Geo.', 1, 'gatheringSwarm.png', 'Dirtmouth - Sly Store', 'Utility'),
('Stalwart Shell', 'Builds resilience. After taking damage, the bearer will remain invulnerable for longer.', 2, 'stalwartShell.png', 'Dirtmouth - Sly Store', 'Combat');

INSERT INTO `charms` (`id`, `name`, `description`, `notches`, `imagePath`, `location`, `category`) VALUES
(5, 'Soul Catcher', 'Used by shamans to draw more Soul from the world around them. Increases the amount of Soul gained when striking an enemy with the Nail.', 2, 'soulCatcher.png', 'Ancestral Mound', 'Soul'),
(6, 'Shaman Stone', 'Said to contain the knowledge of past shamans. Increases the power of spells, dealing more damage to foes.', 3, 'shamanStone.png', 'Forgotten Crossroads - Salubra', 'Spells'),
(7, 'Dashmaster', 'Bears the likeness of an eccentric bug known only as the Dashmaster. Allows the bearer to dash more often as well as dash downwards.', 2, 'dashmaster.png', 'Fungal Wastes', 'Movement'),
(8, 'Thorns of Agony', 'Senses the pain of its bearer and lashes out at the world around them. When taking damage, sprout thorny vines that damage nearby enemies.', 1, 'thornsOfAgony.png', 'Greenpath', 'Combat'),
(9, 'Fury of the Fallen', 'Embodies the fury and heroism of those who are about to die. When close to death, the bearer''s strength will increase.', 2, 'furyOfTheFallen.png', 'King''s Pass', 'Combat'),
(10, 'Fragile Heart', 'Increases the health of the bearer, allowing them to take more damage. This charm is fragile and will break if its bearer is killed.', 2, 'fragileHeart.png', 'Fungal Wastes - Leg Eater', 'Health'),
(11, 'Fragile Greed', 'Causes the bearer to find more Geo when defeating enemies. This charm is fragile and will break if its bearer is killed.', 2, 'fragileGreed.png', 'Fungal Wastes - Leg Eater', 'Utility'),
(12, 'Fragile Strength', 'Strengthens the bearer, increasing the damage they deal to enemies with the Nail. This charm is fragile and will break if its bearer is killed.', 3, 'fragileStrength.png', 'Fungal Wastes - Leg Eater', 'Combat'),
(13, 'Spell Twister', 'Reflecting the desires of the Soul Sanctum for mastery over Soul. Reduces the Soul cost of casting spells.', 2, 'spellTwister.png', 'Soul Sanctum', 'Spells'),
(14, 'Steady Body', 'Keeps the bearer from recoiling backwards when they strike an enemy with a Nail. Allows one to stay steady and keep attacking.', 1, 'steadyBody.png', 'Forgotten Crossroads - Salubra', 'Combat'),
(15, 'Heavy Blow', 'Increases the force of the bearers Nail, causing enemies to recoil further when hit.', 2, 'heavyBlow.png', 'Dirtmouth - Sly Store', 'Combat'),
(16, 'Quick Slash', 'Born from imperfect, discarded nails. Allows the bearer to slash much more rapidly with their Nail.', 3, 'quickSlash.png', 'Kingdom''s Edge', 'Combat'),
(17, 'Longnail', 'Increases the range of the bearers Nail, allowing them to strike enemies from further away.', 2, 'longnail.png', 'Forgotten Crossroads - Salubra', 'Combat'),
(18, 'Mark of Pride', 'Freely given by the Mantis Tribe to those they respect. Greatly increases the range of the bearer''s Nail.', 3, 'markOfPride.png', 'Mantis Village', 'Combat'),
(19, 'Quick Focus', 'A charm containing a crystal lens. Increases the speed of focusing Soul, allowing the bearer to heal damage faster.', 3, 'quickFocus.png', 'Forgotten Crossroads - Salubra', 'Health'),
(20, 'Deep Focus', 'Naturally formed within a crystal over a long period. The bearer will focus Soul at a slower rate, but the healing effect will be doubled.', 4, 'deepFocus.png', 'Crystal Peak', 'Health');


INSERT INTO `charms` (`name`, `description`, `notches`, `imagePath`, `location`, `category`) VALUES
('Lifeblood Heart', 'Contains a living core that bleeds precious lifeblood. When resting, the bearer will gain a coating of lifeblood that protects from a small amount of damage.', 2, 'lifebloodHeart.png', 'Forgotten Crossroads - Salubra', 'Health'),
('Lifeblood Core', 'Contains a thick core that bleeds a large amount of lifeblood. When resting, the bearer will gain a thick coating of lifeblood that protects from a significant amount of damage.', 3, 'lifebloodCore.png', 'The Abyss', 'Health'),
('Jonis Blessing', 'Blessed by Joni, the kindly heretic. Transmutes vital fluids into blue lifeblood. The bearer will have a much healthier shell, but they will be unable to heal themselves by focusing Soul.', 4, 'jonisBlessing.png', 'Howling Cliffs', 'Health'),                                                                                                 ('Grubsong', 'Contains the gratitude of freed grubs. Gain Soul when taking damage.', 1, 'grubsong.png', 'Forgotten Crossroads - Grubfather (10 Grubs)', 'Soul'),
('Grubberflys Elegy', 'Contains the gratitude of grubs who have moved onto the next stage of their lives. When the bearer is at full health, they will fire beams of white-hot energy from their Nail.', 3, 'grubberflysElegy.png', 'Forgotten Crossroads', 'Combat'),
('Flukenest', 'A living charm plucked from the womb of a Flukemarm. Transforms the Vengeful Spirit spell into a horde of volatile baby flukes.', 3, 'flukenest.png', 'Royal Waterways', 'Spells'),
('Defenders Crest', 'Unique charm bestowed by the King of Hallownest to his most loyal knight. Causes the bearer to emit a heroic odor.', 1, 'defendersCrest.png', 'Royal Waterways', 'Utility'),
('Shape of Unn', 'Reveals the form of Unn within the bearer. While focusing Soul, the bearer will take on a new shape and can move freely to avoid enemies.', 2, 'shapeOfUnn.png', 'Lake of Unn', 'Movement'),
('Spore Shroom', 'Composed of living fungal matter. When focusing Soul, the bearer will emit a cloud of spores that slowly damages nearby enemies.', 1, 'sporeShroom.png', 'Fungal Wastes', 'Utility'),
('Sharp Shadow', 'Contains a forbidden spell that transforms shadows into deadly weapons. When using Shade Cloak, the bearers body will sharpen and damage enemies passed through.', 2, 'sharpShadow.png', 'Deepnest', 'Movement'),
('Dream Wielder', 'Transient charm embodying the dreams of those who forget. Allows the bearer to charge the Dream Nail faster and gain more Soul when hitting an enemy.', 1, 'dreamWielder.png', 'Resting Grounds', 'Soul'),
('Dreamshield', 'Defensive charm that summons a shield that rotates around the bearer. The shield will block projectiles and deal damage to enemies it strikes.', 3, 'dreamshield.png', 'Resting Grounds', 'Combat'),
('Weaversong', 'Silken charm containing a song of farewell, used by the Weavers to leave Hallownest. Summons tiny weaverlings to give the bearer company and aid in battle.', 2, 'weaversong.png', 'Deepnest', 'Companion'),
('Sprintmaster', 'Bears the likeness of a strange bug known only as the Sprintmaster. Increases the movement speed of the bearer.', 1, 'sprintmaster.png', 'Dirtmouth - Sly Store', 'Movement'),
('Glowing Womb', 'Drains the Soul of its bearer to birth hatchlings. The hatchlings will aid the bearer in battle, but will die after attacking an enemy.', 2, 'glowingWomb.png', 'Forgotten Crossroads - Ancestral Mound', 'Companion'),
('Carefree Melody', 'Token of a friendship that persisted through dark times. Contains a song that has a chance to block incoming damage.', 3, 'carefreeMelody.png', 'Dirtmouth - Nymm', 'Health'),
('Kingsoul', 'Holy charm symbolizing a union between higher beings. The bearer will slowly absorb the infinite Soul which permeates the world.', 5, 'kingsoul.png', 'White Palace - Queens Gardens', 'Soul'),
('Void Heart', 'An empty shell that shines with a dark light. It unifies the void under the bearers will. This charm is a part of its bearer and cannot be unequipped.', 0, 'voidHeart.png', 'Birthplace (Abyss)', 'Soul'),
('Hiveblood', 'Golden nugget of the Hives precious hardened nectar. Heals the bearers wounds over time without consuming Soul.', 4, 'hiveblood.png', 'The Hive', 'Health');