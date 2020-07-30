-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2020 at 02:05 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lekhni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `body` longtext,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `modified`, `auth_id`) VALUES
(10, 'Harry Potter and The Chamber of Secrets', 'October arrived, spreading a damp chill over the grounds and into the castle. Madam Pomfrey, the nurse, was kept busy by a sudden spate of colds among the staff and students. Her Pepperup potion worked instantly, though it left the drinker smoking at the ears for several hours afterward. Ginny Weasley, who had been looking pale, was bullied into taking some by Percy. The steam pouring from under her vivid hair gave the impression that her whole head was on fire.\r\n\r\nRaindrops the size of bullets thundered on the castle windows for days on end; the lake rose, the flower beds turned into muddy streams, and Hagrid\'s pumpkins swelled to the size of garden sheds. Oliver Wood\'s enthusiasm for regular training sessions, however, was not dampened, which was why Harry was to be found, late one stormy Saturday afternoon a few days before Halloween, returning to Gryffindor Tower, drenched to the skin and splattered with mud.\r\n\r\nEven aside from the rain and wind it hadn\'t been a happy practice session. Fred and George, who had been spying on the Slytherin team, had seen for themselves the speed of those new Nimbus Two Thousand and Ones. They reported that the Slytherin team was no more than seven greenish blurs, shooting through the air like missiles.\r\n\r\nAs Harry squelched along the deserted corridor he came across somebody who looked just as preoccupied as he was. Nearly Headless Nick, the ghost of Gryffindor Tower, was staring morosely out of a window, muttering under his breath, ". . . don\'t fulfill their requirements . . . half an inch, if that . . ."\r\n\r\n"Hello, Nick," said Harry.\r\n\r\n"Hello, hello," said Nearly Headless Nick, starting and looking round. He wore a dashing, plumed hat on his long curly hair, and a tunic with a ruff, which concealed the fact that his neck was almost completely severed. He was pale as smoke, and Harry could see right through him to the dark sky and torrential rain outside.\r\n\r\n"You look troubled, young Potter," said Nick, folding a transparent letter as he spoke and tucking it inside his doublet.\r\n\r\n"So do you," said Harry.\r\n\r\n"Ah," Nearly Headless Nick waved an elegant hand, "a matter of no importance. . . . It\'s not as though I really wanted to join. . . . Thought I\'d apply, but apparently I \'don\'t fulfill requirements\' -"\r\n', '2020-07-30 19:06:19', 5),
(11, 'Harry Potter & the Philosopherâ€™s Stone', 'Hagrid looked at Harry with warmth and respect blazing in his eyes, but Harry, instead of feeling pleased and proud, felt quite sure there had been a horrible mistake. A wizard? Him? How could he possibly be? Heâ€™d spent his life being clouted by Dudley and bullied by Aunt Petunia and Uncle Vernon; if he was really a wizard, why hadnâ€™t they been turned into warty toads every time theyâ€™d tried to lock him in his cupboard? If heâ€™d once defeated the greatest sorcerer in the world, how come Dudley had always been able to kick him around like a football?\r\n\r\nâ€œHagrid,â€ he said quietly, â€œI think you must have made a mistake. I donâ€™t think I can be a wizard.â€\r\n\r\nTo his surprise, Hagrid chuckled.\r\n\r\nâ€œNot a wizard, eh? Never made things happen when you was scared, or angry?â€\r\n\r\nHarry looked into the fire. Now he came to think about itâ€¦ every odd thing that had ever made his aunt and uncle furious with him had happened when he, Harry, had been upset or angryâ€¦ chased by Dudleyâ€™s gang, he had somehow found himself out of their reachâ€¦ dreading going to school with that ridiculous haircut, heâ€™d managed to make it grow backâ€¦ and the very last time Dudley had hit him, hadnâ€™t he got his revenge, without even realising he was doing it? Hadnâ€™t he set a boa constrictor on him? Harry looked back at Hagrid, smiling, and saw that Hagrid was positively beaming at him.\r\n\r\nâ€œSee?â€ said Hagrid. â€œHarry Potter, not a wizard â€“ you wait, youâ€™ll be right famous at Hogwarts.â€\r\n\r\n', '2020-07-30 19:07:27', 5),
(12, 'Harry Potter and The Sorcerer\'s Stone', 'Nearly ten years had passed since the Dursleys had woken up to find their nephew on the front step, but Privet Drive had hardly changed at all. The sun rose on the same tidy front gardens and lit up the brass number four on the Dursleys\' front door; it crept into their living room, which was almost exactly the same as it had been on the night when Mr. Dursley had seen that fateful news report about the owls. Only the photographs on the mantelpiece really showed how much time had passed. Ten years ago, there had been lots of pictures of what looked like a large pink beach ball wearing different-colored bonnets - but Dudley Dursley was no longer a baby, and now the photographs showed a large blond boy riding his first bicycle, on a carousel at the fair, playing a computer game with his father, being hugged and kissed by his mother. The room held no sign at all that another boy lived in the house, too.\r\n\r\nYet Harry Potter was still there, asleep at the moment, but not for long. His Aunt Petunia was awake and it was her shrill voice that made the first noise of the day.\r\n\r\n"Up! Get up! Now!"\r\n\r\nHarry woke with a start. His aunt rapped on the door again.\r\n\r\n"Up!" she screeched. Harry heard her walking toward the kitchen and then the sound of the frying pan being put on the stove. He rolled onto his back and tried to remember the dream he had been having. It had been a good one. There had been a flying motorcycle in it. He had a funny feeling he\'d had the same dream before.\r\n\r\nHis aunt was back outside the door.\r\n\r\n"Are you up yet?" she demanded.\r\n\r\n"Nearly," said Harry.\r\n\r\n"Well, get a move on, I want you to look after the bacon. And don\'t you dare let it burn, I want everything perfect on Duddy\'s birthday."\r\n\r\nHarry groaned.\r\n\r\n"What did you say?" his aunt snapped through the door. ', '2020-07-30 19:08:19', 5),
(13, 'World of Information technology', 'From Wikipedia, the free encyclopedia\r\nJump to navigation\r\nJump to search\r\n"IT" redirects here. For other uses, see IT (disambiguation).\r\n"Infotech" redirects here. For the Indian company, see Cyient.\r\nInformation science\r\nGeneral aspects\r\n\r\n    Information access\r\n    Information architecture\r\n    Information behavior\r\n    Information management\r\n    Information retrieval\r\n    Information seeking\r\n    Information society\r\n    Knowledge organization\r\n    Ontology\r\n    Philosophy of information\r\n    Science and technology studies\r\n    Taxonomy\r\n\r\nRelated fields and sub-fields\r\n\r\n    Bibliometrics\r\n    Categorization\r\n    Censorship\r\n    Classification\r\n    Computer data storage\r\n    Cultural studies\r\n    Data modeling\r\n    Informatics\r\n    Information technology\r\n    Intellectual freedom\r\n    Intellectual property\r\n    Library and information science\r\n    Memory\r\n    Preservation\r\n    Privacy\r\n    Quantum information science\r\n\r\n    vte\r\n\r\nInformation technology (IT) is the use of computers to store, retrieve, transmit, and manipulate data[1] or information. IT is typically used within the context of business operations as opposed to personal or entertainment technologies.[2] IT is considered to be a subset of information and communications technology (ICT). An information technology system (IT system) is generally an information system, a communications system or, more specifically speaking, a computer system â€“ including all hardware, software and peripheral equipment â€“ operated by a limited group of users.\r\n\r\nHumans have been storing, retrieving, manipulating, and communicating information since the Sumerians in Mesopotamia developed writing in about 3000 BC,[3] but the term information technology in its modern sense first appeared in a 1958 article published in the Harvard Business Review; authors Harold J. Leavitt and Thomas L. Whisler commented that "the new technology does not yet have a single established name. We shall call it information technology (IT)." Their definition consists of three categories: techniques for processing, the application of statistical and mathematical methods to decision-making, and the simulation of higher-order thinking through computer programs.[4]\r\n\r\nThe term is commonly used as a synonym for computers and computer networks, but it also encompasses other information distribution technologies such as television and telephones. Several products or services within an economy are associated with information technology, including computer hardware, software, electronics, semiconductors, internet, telecom equipment, and e-commerce.[5][a]\r\n\r\nBased on the storage and processing technologies employed, it is possible to distinguish four distinct phases of IT development: pre-mechanical (3000 BC â€“ 1450 AD), mechanical (1450â€“1840), electromechanical (1840â€“1940), and electronic (1940â€“present).[3] This article focuses on the most recent period (electronic). ', '2020-07-30 20:00:06', 6),
(14, 'Will AI Takeover?', 'From Wikipedia, the free encyclopedia\r\nJump to navigation\r\nJump to search\r\nRobots revolt in R.U.R., a 1920 play\r\n\r\nAn AI takeover is a hypothetical scenario in which artificial intelligence (AI) becomes the dominant form of intelligence on Earth, with computers or robots effectively taking the control of the planet away from the human species. Possible scenarios include replacement of the entire human workforce, takeover by a superintelligent AI, and the popular notion of a robot uprising. Some public figures, such as Stephen Hawking and Elon Musk, have advocated research into precautionary measures to ensure future superintelligent machines remain under human control.[1] \r\n\r\nTypes\r\nAutomation of the economy\r\nMain article: Technological unemployment\r\n\r\nThe traditional consensus among economists has been that technological progress does not cause long-term unemployment. However, recent innovation in the fields of robotics and artificial intelligence has raised worries that human labor will become obsolete, leaving people in various sectors without jobs to earn a living, leading to an economic crisis.[2][3][4][5] Many small and medium size businesses may also be driven out of business if they won\'t be able to afford or licence the latest robotic and AI technology, and may need to focus on areas or services that cannot easily be replaced for continued viability in the face of such technology.[6]\r\nTechnologies that may displace workers\r\nComputer-integrated manufacturing\r\nSee also: Industrial artificial intelligence\r\n\r\nComputer-integrated manufacturing is the manufacturing approach of using computers to control the entire production process. This integration allows individual processes to exchange information with each other and initiate actions. Although manufacturing can be faster and less error-prone by the integration of computers, the main advantage is the ability to create automated manufacturing processes. Computer-integrated manufacturing is used in automotive, aviation, space, and ship building industries.\r\nWhite-collar machines\r\nSee also: White-collar worker\r\n\r\nThe 21st century has seen a variety of skilled tasks partially taken over by machines, including translation, legal research and even low level journalism. Care work, entertainment, and other tasks requiring empathy, previously thought safe from automation, have also begun to be performed by robots.[7][8][9][10]\r\nAutonomous cars\r\n\r\nAn autonomous car is a vehicle that is capable of sensing its environment and navigating without human input. Many such vehicles are being developed, but as of May 2017 automated cars permitted on public roads are not yet fully autonomous. They all require a human driver at the wheel who is ready at a moment\'s notice to take control of the vehicle. Among the main obstacles to widespread adoption of autonomous vehicles, are concerns about the resulting loss of driving-related jobs in the road transport industry. On March 18, 2018, the first human was killed by an autonomous vehicle in Tempe, Arizona by an Uber self-driving car.[11]\r\n', '2020-07-30 20:13:40', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `name` varchar(60) NOT NULL,
  `pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `name`, `pass`) VALUES
(5, 'jk.rowlling@hp.com', 'JK Rowlling', '$2y$10$VHrN80NwXiwTB7klMuqhzOkKDngXsq7omybpY3zRZ7KWvfKvojZCK'),
(6, 'livefortech@tech.com', 'Lively Technical', '$2y$10$eLpsc3C6KuvF1ZVssSManeSfZAMb8j0VSN8mMIFy6zuicpww7N8qe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_id` (`auth_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`auth_id`) REFERENCES `user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
