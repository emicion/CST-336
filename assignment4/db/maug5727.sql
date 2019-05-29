-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2017 at 01:34 PM
-- Server version: 5.5.31-cll
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maug5727`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movieId` int(4) DEFAULT NULL,
  `movieName` varchar(50) DEFAULT NULL,
  `MPAAId` int(1) DEFAULT NULL,
  `duration` int(4) DEFAULT NULL,
  `imdbRating` float DEFAULT NULL,
  `genreId` int(1) DEFAULT NULL,
  UNIQUE KEY `movieId` (`movieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `movieName`, `MPAAId`, `duration`, `imdbRating`, `genreId`) VALUES
(1, 'Finding Dory', 2, 97, 7.4, 2),
(2, 'Rogue One', 3, 133, 7.9, 4),
(3, 'Captain America: Civil War', 3, 147, 7.9, 5),
(4, 'The Secret Life of Pets', 2, 87, 6.6, 2),
(5, 'The Jungle Book', 2, 106, 7.5, 5),
(6, 'Deadpool', 4, 108, 8, 1),
(7, 'Zootopia', 2, 108, 8.1, 2),
(8, 'Batman v Superman: Dawn of Justice', 3, 151, 6.7, 3),
(9, 'Suicide Squad', 3, 123, 6.2, 3),
(10, 'Doctor Strange', 3, 115, 7.6, 5),
(11, 'Fantastic Beasts and Where to Find Them', 3, 133, 7.4, 6),
(12, 'Moana', 2, 107, 7.7, 2),
(13, 'Sing', 2, 108, 7.2, 2),
(14, 'Jason Bourne', 3, 123, 6.7, 3),
(15, 'Star Trek Beyond', 3, 122, 7.1, 4),
(16, 'X-Men: Apocaplypse', 3, 144, 7, 4),
(17, 'Trolls', 2, 92, 6.5, 2),
(18, 'Kung Fu Panda 3', 2, 95, 7.2, 2),
(19, 'Ghostbusters', 3, 116, 5.3, 2),
(20, 'Central Intelligence', 3, 107, 6.3, 1),
(21, 'The Legend of Tarzan', 3, 110, 6.3, 5),
(22, 'Sully', 3, 96, 7.5, 7),
(23, 'Bad Moms', 4, 100, 6.2, 1),
(24, 'The Angry Birds Movie', 2, 97, 6.3, 2),
(25, 'Independence Day: Resurgence', 3, 120, 5.3, 4),
(26, 'Warcraft: The Beginning', 3, 123, 6.9, 6),
(27, 'The Magnificent Seven', 3, 132, 6.9, 1),
(28, 'La La Land', 3, 128, 8.2, 8),
(29, 'Manchester by the Sea', 4, 137, 7.9, 7),
(30, 'Arrival', 3, 116, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `movie_descriptions`
--

CREATE TABLE IF NOT EXISTS `movie_descriptions` (
  `movieId` int(4) DEFAULT NULL,
  `movieDescription` varchar(300) DEFAULT NULL,
  UNIQUE KEY `movieId` (`movieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_descriptions`
--

INSERT INTO `movie_descriptions` (`movieId`, `movieDescription`) VALUES
(1, 'The friendly but forgetful blue tang fish, Dory, begins a search for her long-lost parents, and everyone learns a few things about the real meaning of family along the way.'),
(2, 'The Rebel Alliance makes a risky move to steal the plans for the Death Star, setting up the epic saga to follow.'),
(3, 'Political interference in the Avengers'' activities causes a rift between former allies Captain America and Iron Man.'),
(4, 'The quiet life of a terrier named Max is upended when his owner takes in Duke, a stray whom Max instantly dislikes.'),
(5, 'After a threat from the tiger Shere Khan forces him to flee the jungle, a man-cub named Mowgli embarks on a journey of self discovery with the help of panther, Bagheera, and free spirited bear, Baloo.'),
(6, 'A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.'),
(7, 'In a city of anthropomorphic animals, a rookie bunny cop and a cynical con artist fox must work together to uncover a conspiracy.'),
(8, 'Fearing that the actions of Superman are left unchecked, Batman takes on the Man of Steel, while the world wrestles with what kind of a hero it really needs.'),
(9, 'A secret government agency recruits some of the most dangerous incarcerated super-villains to form a defensive task force. Their first mission: save the world from the apocalypse.'),
(10, 'While on a journey of physical and spiritual healing, a brilliant neurosurgeon is drawn into the world of the mystic arts.'),
(11, 'The adventures of writer Newt Scamander in New York''s secret community of witches and wizards seventy years before Harry Potter reads his book in school.'),
(12, 'In Ancient Polynesia, when a terrible curse incurred by the Demigod Maui reaches Moana''s island, she answers the Ocean''s call to seek out the Demigod to set things right.'),
(13, 'In a city of humanoid animals, a hustling theater impresario''s attempt to save his theater with a singing competition becomes grander than he anticipates even as its finalists'' find that their lives will never be the same.'),
(14, 'The CIA''s most dangerous former operative is drawn out of hiding to uncover more explosive truths about his past.'),
(15, 'The U.S.S. Enterprise crew explores the furthest reaches of uncharted space, where they encounter a new ruthless enemy, who puts them, and everything the Federation stands for, to the test.'),
(16, 'After the re-emergence of the world''s first mutant, world-destroyer Apocalypse, the X-Men must unite to defeat his extinction level plan.'),
(17, 'After the Bergens invade Troll Village, Poppy, the happiest Troll ever born, and the curmudgeonly Branch set off on a journey to rescue her friends.'),
(18, 'Continuing his legendary adventures of awesomeness, Po must face two hugely epic, but different threats: one supernatural and the other a little closer to his home.'),
(19, 'Following a ghost invasion of Manhattan, paranormal enthusiasts Erin Gilbert and Abby Yates, nuclear engineer Jillian Holtzmann, and subway worker Patty Tolan band together to stop the otherworldly threat.'),
(20, 'After he reconnects with an awkward pal from high school through Facebook, a mild-mannered accountant is lured into the world of international espionage.'),
(21, 'Tarzan, having acclimated to life in London, is called back to his former home in the jungle to investigate the activities at a mining encampment.'),
(22, 'The story of Chesley Sullenberger, an American pilot who became a hero after landing his damaged plane on the Hudson River in order to save the flight''s passengers and crew.'),
(23, 'When three overworked and under-appreciated moms are pushed beyond their limits, they ditch their conventional responsibilities for a jolt of long overdue freedom, fun, and comedic self-indulgence.'),
(24, 'Find out why the birds are so angry. When an island populated by happy, flightless birds is visited by mysterious green piggies, it''s up to three unlikely outcasts - Red, Chuck and Bomb - to figure out what the pigs are up to.'),
(25, 'Two decades after the first Independence Day invasion, Earth is faced with a new extra-Solar threat. But will mankind''s new space defenses be enough?'),
(26, 'As an Orc horde invades the planet Azeroth using a magic portal, a few human heroes and dissenting Orcs must attempt to stop the true evil behind this war.'),
(27, 'Seven gunmen in the old west gradually come together to help a poor village against savage thieves.'),
(28, 'Two proper L.A. dreamers, a suavely charming soft-spoken jazz pianist and a brilliant vivacious playwright, while waiting for their big break, attempt to reconcile aspirations and relationship in a magical old-school romance.'),
(29, 'A depressed uncle is asked to take care of his teenage nephew after the boy''s father dies'),
(30, 'When twelve mysterious spacecraft appear around the world, linguistics professor Louise Banks is tasked with interpreting the language of the apparent alien visitors.');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE IF NOT EXISTS `movie_genres` (
  `genreId` int(1) DEFAULT NULL,
  `genre` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`genreId`, `genre`) VALUES
(1, 'comedy'),
(2, 'family'),
(3, 'action'),
(4, 'sci-fi'),
(5, 'adventure'),
(6, 'fantasy'),
(7, 'drama'),
(8, 'musical');

-- --------------------------------------------------------

--
-- Table structure for table `MPAA_ratings`
--

CREATE TABLE IF NOT EXISTS `MPAA_ratings` (
  `MPAAId` int(1) DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MPAA_ratings`
--

INSERT INTO `MPAA_ratings` (`MPAAId`, `rating`) VALUES
(1, 'G'),
(2, 'PG'),
(3, 'PG-13'),
(4, 'R');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
