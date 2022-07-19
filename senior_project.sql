-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 03:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senior_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `app_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `notes` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_id`, `patient_id`, `doctor_id`, `date`, `start_time`, `end_time`, `notes`, `status`) VALUES
(187, 3, 1, '2022-05-16', '08:00:00', '08:15:00', 'zeinab seems to suffer from anxiety and depression due to the death of her husband.', 1),
(188, 5, 8, '2022-05-16', '08:00:00', '08:30:00', 'low will and concentration noticed. Addiction on medication with a lot of side effects like feeling down without medication with no energy.', 1),
(189, 4, 8, '2022-05-18', '14:00:00', '14:30:00', 'low will and concentration noticed. Addiction on medication with a lot of side effects like feeling down without medication with no energy.', 1),
(190, 2, 8, '2022-05-18', '09:00:00', '09:30:00', 'low will and concentration noticed. Addiction on medication', 1),
(191, 3, 1, '2022-05-18', '11:00:00', '11:15:00', 'unhealthy strong attachment to her husband that passed away with low motivation and passion to live without him.', 1),
(192, 1, 1, '2022-05-18', '08:30:00', '08:45:00', 'patient has low self esteem and lost the motives to be productive without the medicine.', 1),
(193, 5, 1, '2022-05-18', '09:00:00', '09:15:00', 'Difficulty concentrating and low appetite', 1),
(197, 1, 1, '2022-05-20', '08:00:00', '08:15:00', 'low will and concentration noticed. Addiction on medication with a lot of side effects like feeling down without medication with no energy.', 1),
(198, 4, 1, '2022-05-20', '08:15:00', '08:30:00', ' low will and concentration noticed. Addiction on medication with a lot of side effects like feeling down without medication with no energy.', 1),
(199, 1, 1, '2022-05-20', '09:00:00', '09:15:00', '', 1),
(200, 2, 1, '2022-05-20', '09:15:00', '09:30:00', 'low will and concentration noticed. Addiction on medication with a lot of side effects like feeling down without medication with no energy.', 1),
(201, 3, 6, '2022-05-20', '08:00:00', '08:15:00', 'social anxiety and have PTSD from cars', 1),
(202, 4, 1, '2022-05-20', '10:00:00', '10:15:00', '', 1),
(203, 4, 6, '2022-05-20', '08:30:00', '08:45:00', 'have social anxiety and have difficulty leaving home', 1),
(204, 1, 1, '2022-05-20', '15:00:00', '15:15:00', '', 1),
(206, 4, 1, '2022-05-20', '08:30:00', '08:45:00', '', 1),
(207, 4, 6, '2022-05-20', '09:00:00', '09:15:00', '', 1),
(208, 5, 6, '2022-05-20', '10:00:00', '10:15:00', 'social anxiety and insomnia', 1),
(209, 1, 3, '2022-05-21', '09:00:00', '09:15:00', 'workaholic and antisocial traits', 1),
(210, 4, 3, '2022-05-21', '08:30:00', '08:45:00', 'workaholic and antisoial since 2 years', 1),
(211, 5, 3, '2022-06-13', '10:00:00', '10:15:00', '', 1),
(212, 4, 9, '2022-06-13', '10:00:00', '10:30:00', '', 1),
(213, 4, 9, '2022-06-13', '10:30:00', '11:00:00', '', 1),
(214, 3, 3, '2022-06-16', '08:00:00', '08:15:00', '', 1),
(215, 3, 4, '2022-10-04', '08:30:00', '08:45:00', '', 1),
(216, 1, 9, '2022-06-16', '08:00:00', '08:30:00', '', 1),
(217, 4, 7, '2022-07-05', '09:00:00', '09:15:00', '', 1),
(218, 5, 3, '2022-06-20', '08:00:00', '08:15:00', '', 1),
(219, 1, 7, '2022-07-19', '09:00:00', '09:15:00', '', 1),
(220, 2, 7, '2022-07-05', '11:00:00', '11:15:00', '', 1),
(221, 2, 3, '2022-06-13', '08:45:00', '09:00:00', '', 1),
(222, 4, 8, '2022-06-14', '10:00:00', '10:30:00', '', 1),
(223, 3, 3, '2022-06-13', '08:00:00', '08:15:00', '', 1),
(224, 2, 3, '2022-06-13', '08:15:00', '08:30:00', '', 1),
(225, 2, 3, '2022-06-13', '11:00:00', '11:15:00', '', 1),
(226, 1, 7, '2022-07-05', '08:30:00', '08:45:00', '', 1),
(227, 1, 3, '2022-06-13', '09:30:00', '09:45:00', '', 1),
(228, 4, 3, '2022-06-13', '09:45:00', '10:00:00', '', 1),
(229, 2, 8, '2022-06-14', '10:30:00', '11:00:00', '', 1),
(230, 5, 8, '2022-06-16', '08:00:00', '08:30:00', '', 1),
(231, 3, 8, '2022-06-21', '10:00:00', '10:30:00', '', 1),
(232, 1, 7, '2022-07-05', '10:00:00', '10:15:00', '', 1),
(233, 3, 2, '2022-06-16', '11:00:00', '11:15:00', '', 1),
(234, 5, 1, '2022-06-13', '10:30:00', '11:00:00', '', 1),
(235, 1, 1, '2022-06-13', '10:00:00', '10:30:00', '', 1),
(236, 4, 4, '2022-10-05', '08:45:00', '09:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `center_rules`
--

CREATE TABLE `center_rules` (
  `id` int(11) NOT NULL,
  `dr_type` varchar(16) NOT NULL,
  `session_duration` time NOT NULL,
  `session_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_rules`
--

INSERT INTO `center_rules` (`id`, `dr_type`, `session_duration`, `session_price`) VALUES
(1, 'doctor', '00:15:00', 75),
(2, 'psychotherapist', '00:30:00', 70);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `Phone_number` int(11) NOT NULL,
  `dr_type` int(1) NOT NULL,
  `professional_statement` text NOT NULL,
  `job_title` longtext NOT NULL,
  `about_yourself` text NOT NULL,
  `education` text NOT NULL,
  `experience` text NOT NULL,
  `doctor_age` int(3) NOT NULL,
  `doctor_gender` varchar(10) NOT NULL,
  `guild_number` int(10) NOT NULL,
  `doctor_image` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `Phone_number`, `dr_type`, `professional_statement`, `job_title`, `about_yourself`, `education`, `experience`, `doctor_age`, `doctor_gender`, `guild_number`, `doctor_image`, `start_date`, `end_date`, `status`, `user_id`) VALUES
(1, 'Mark', 'Kabalan', 78896755, 2, 'Once you start making the effort to wake yourself up that is, be more mindful in your activities you suddenly start appreciating life a lot more. Robert Biswas-Diener', 'Marriage and Family therapy.', 'Highly organized and detail-oriented honors graduate from the University of. Served as a peer treatment planner and recent therapeutic processes.  \n   ', 'Doctorate in Psychology, University of Milan, July-2014.Master in Harmonic psychology, University Of Milan, march-2010-2011.License in Clinical Psychology, Lebanese university, Beirut 2000-2005\r\n  Baccalaureate (1996) Biology.', 'Trained at Bahman Hospital(2012-2014).\n 40 Hours of CBT (Cognitive behavioral therapy) at Egyptian association for mental health and psychology-Egypt 2006.\n Researcher in hyperactivity AND LACK OF ATTENTION IN CHILDREN.', 40, 'male', 324355, 'ourTeam_m11.jpg', '2022-04-01', '2022-11-01', 1, 2),
(2, 'Elie', 'Khoury', 76452788, 1, 'Dont compare yourself with other people; compare yourself with who you were yesterday.', 'Group Therapy for substance use disorders', 'Highly organized and detail-oriented honors graduate from the University of. Served as a peer treatment planner and recent therapeutic processes.  \r\n   ', 'Doctorate in Psychology, Lebanese University, 2018.Master in Harmonic psychology, University Of Milan, march-2014-2015.License in Clinical Psychology, Lebanese university, Beirut 2000-2005\r\n  Baccalaureate (1996) Mathematics.', 'Worked at Al Wasata Center, Nabatieh in addiction with case studies and developing new therapeutic types. Teaching at Lebanese university, al Hadath.', 40, 'male', 345211, 'ourTeam_m5.jpg', '2022-03-02', '2022-09-30', 1, 3),
(3, 'Ahmad', 'Ramadan', 3757884, 1, 'Dont compare yourself with other people; compare yourself with who you were yesterday.', 'Child and adolescence psychology', 'Cognitive behavioral therapy and psychoanalytic therapy concentrated. Medication researcher.\r\n   ', 'Doctorate in Psychology AUB, 2018.Master in Humanistic psychology, University Of Michigan, march-2014-2015.License in Clinical Psychology, Lebanese university, Saida 2000-2005\r\n  Baccalaureate (1997) Economics.', 'Worked at Dar Al Yateem Center, Nabatieh in addiction with case studies and developing new therapeutic types. Teaching at Lebanese university, al Saida.', 58, 'male', 467783, 'ourTeam_m7.jpg', '2022-06-13', '2022-08-31', 1, 4),
(4, 'Rawane', 'Rizk', 78955342, 1, 'Probably the biggest insight.. is that happiness is not just a place, but also a process. Happiness is an ongoing process of fresh challenges, and it takes the right attitudes and activities to continue to be happy. Ed Diener', 'PTSD for children, adolescents and adults. phobias', 'Cognitive behavioral therapy and psychoanalytic therapy concentrated. Medication researcher.\r\n   ', 'Doctorate in Psychology LAU, 2015.Master in Psychoanalytic psychology, University Of Michigan, July-2010-2011.License in Clinical Psychology, Lebanese university, Saida 2010.\r\n  Baccalaureate (1999) Economics.', 'Worked at Dar Al Yateem Center, Nabatieh in addiction with case studies and developing new therapeutic types. Teaching at Lebanese university, al Saida.', 33, 'female', 434873, 'ourTeam_m2.jpg', '2022-03-02', '2023-01-02', 1, 5),
(5, 'Dima', 'Youness', 78717055, 2, 'When we encounter an unexpected challenge of threat, the only way to save ourselves is to hold on tight to the people around us and not let go. Shawn Achor', 'Parent-Child interaction therapy', 'Cognitive behavioral therapy and psychoanalytic therapy concentrated. Medication researcher.\r\n   ', 'Doctorate in Psychology LAU, 2015.Master in Psychoanalytic psychology, University Of Michigan, July-2010-2011.License in Clinical Psychology, Lebanese university, Saida 2010.\r\n  Baccalaureate (1999) Economics.', 'Worked at Tamkeen institution as a Coach for children therapy 2010-2014.\r\n Took a 50 hours training in Milan, Italy on Coaching specialized in children behavior.', 36, 'female', 892387, 'ourTeam_m8.jpg', '2022-03-02', '2022-10-01', 1, 6),
(6, 'Christina', 'Saliba', 70160995, 1, 'When we are open to new possibilities, we find them. Be open and skeptical of everything. Todd Kashdan', 'Social Anxiety expert, Acceptance and Commitment.', 'Helping patients to behave more consistently and being   mindful is what I thrive for. Started commitment therapy researches since 2013.', 'Doctorate in Psychology AUB, 2016.Master in Psychoanalytic psychology, University Of Michigan, July-2014-2013.License in Psychoanalytic Psychology, Lebanese university, AL Hadath 2010.\r\n  Baccalaureate (2005) Economics.', 'Worked at Tamkeen institution as a Coach for Commitment therapists 2010-2014.\r\n Took a 50 hours training in Egypt for psychoanalytic Therapy and CBT.', 35, 'female', 476873, 'ourTeam_m4.jpg', '2022-03-02', '2022-10-01', 1, 7),
(7, 'Laury', 'Richani', 78892922, 1, 'It s more selfless to act happy. It takes energy, generosity, and discipline to be unfailingly light hearted. Yet everyone takes the happy person for granted. Gretchen Rubin', 'Child psychologist, Specialized in OCD, ADHD and Autism', 'Helping Children achieve their best potential, developing responsibility in behavior using play therapy since 2016.', 'Doctorate in Psychology LU, 2015. Master in child psychology, University Of Michigan, July 2014 2013.License in Psychoanalytic Psychology, Lebanese university, AL Hadath 2010. Baccalaureate (2005) Mathematics.', 'Worked at Tamkeen institution as child therapist 2015 2021. Served in Coaching child therapists and students at Dar Al Yateem Saida 2015 2017.', 32, 'female', 458769, 'ourTeam_m3.jpg', '2022-07-01', '2022-10-31', 1, 8),
(8, 'Dana', 'Ashraf', 76663822, 2, 'A wonderful fact to reflect upon, that every human creature is constituted to be that profound secret and mystery to every other. Charles Dickens', 'Child psychologist, Specialized in Conduct Disorder, Depression and OCD.', 'Helping Children achieve their best potential, developing responsibility in behavior using play therapy since 2016.', 'Doctorate in Psychology LU, 2018.Master in child psychology, University Of Milan, March-2014-2013.License in Psychoanalytic Psychology, Lebanese university, Saida 2010.\r\n  Baccalaureate (2005) Mathematics.', 'Worked at al Wasata institution as child therapist 2015-2021. Served in Coaching child therapists and students at Dar Al Yateem Saida 2015-2017.', 39, 'female', 356743, 'ourTeam_m9.jpg', '2022-06-13', '2022-09-30', 1, 9),
(9, 'Anjela', 'Mehrej', 71289338, 2, 'A wonderful fact to reflect upon, that every human creature is constituted to be that profound secret and mystery to every other. Charles Dickens', 'Specialized in Tourette Syndrome, Oppositional Defiant Disorder and OCD.', 'Helping People to have control on their thoughts, behavior is my passion. Specialized in CBT since 2018.', 'Doctorate in Psychology LU, 2018.Master in CBT psychology, University Of Milan, March-2014-2013.License in Psychology, Lebanese university, Saida 2010.\r\n  Baccalaureate (2005) Mathematics.', 'Worked at al Wasata institution as Tourette Syndrome specialist 2015-2021. Served in Coaching child therapists and students at Dar Al Yateem Saida 2015-2017.', 33, 'female', 365789, 'ourTeam_m6.jpg', '2022-06-13', '2022-09-01', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
  `s_id` int(11) NOT NULL,
  `d_s_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_schedule`
--

INSERT INTO `doctors_schedule` (`s_id`, `d_s_id`, `date`, `start_time`, `end_time`, `status`) VALUES
(1, 3, '2022-10-03', '08:00:00', '15:00:00', 1),
(2, 3, '2022-10-10', '08:00:00', '15:00:00', 1),
(3, 3, '2022-10-17', '08:00:00', '15:00:00', 1),
(4, 3, '2022-10-24', '08:00:00', '15:00:00', 1),
(5, 3, '2022-10-31', '08:00:00', '15:00:00', 1),
(6, 3, '2022-11-07', '08:00:00', '15:00:00', 1),
(7, 3, '2022-11-21', '08:00:00', '15:00:00', 1),
(8, 3, '2022-11-28', '08:00:00', '15:00:00', 1),
(9, 3, '2022-11-14', '08:00:00', '15:00:00', 1),
(10, 3, '2022-12-05', '08:00:00', '15:00:00', 1),
(11, 3, '2022-12-26', '08:00:00', '15:00:00', 1),
(12, 3, '2022-12-12', '08:00:00', '15:00:00', 1),
(13, 3, '2022-12-19', '08:00:00', '15:00:00', 1),
(14, 3, '2023-01-02', '08:00:00', '15:00:00', 1),
(15, 3, '2022-10-20', '08:00:00', '15:00:00', 1),
(16, 3, '2022-10-06', '08:00:00', '15:00:00', 1),
(17, 3, '2022-10-13', '08:00:00', '15:00:00', 1),
(18, 3, '2022-10-27', '08:00:00', '15:00:00', 1),
(19, 3, '2022-11-03', '08:00:00', '15:00:00', 1),
(20, 3, '2022-11-10', '08:00:00', '15:00:00', 1),
(21, 3, '2022-11-17', '08:00:00', '15:00:00', 1),
(22, 3, '2022-12-01', '08:00:00', '15:00:00', 1),
(23, 3, '2022-11-24', '08:00:00', '15:00:00', 1),
(24, 3, '2022-12-08', '08:00:00', '15:00:00', 1),
(25, 3, '2022-12-22', '08:00:00', '15:00:00', 1),
(26, 3, '2022-12-29', '08:00:00', '15:00:00', 1),
(27, 3, '2022-12-15', '08:00:00', '15:00:00', 1),
(28, 4, '2022-10-04', '08:00:00', '15:00:00', 1),
(29, 4, '2022-10-11', '08:00:00', '15:00:00', 1),
(30, 4, '2022-10-25', '08:00:00', '15:00:00', 1),
(31, 4, '2022-10-18', '08:00:00', '15:00:00', 1),
(32, 4, '2022-11-01', '08:00:00', '15:00:00', 1),
(33, 4, '2022-11-08', '08:00:00', '15:00:00', 1),
(34, 4, '2022-11-15', '08:00:00', '15:00:00', 1),
(35, 4, '2022-11-22', '08:00:00', '15:00:00', 1),
(36, 4, '2022-11-29', '08:00:00', '15:00:00', 1),
(37, 4, '2022-12-06', '08:00:00', '15:00:00', 1),
(38, 4, '2022-12-13', '08:00:00', '15:00:00', 1),
(39, 4, '2022-12-20', '08:00:00', '15:00:00', 1),
(40, 4, '2022-12-27', '08:00:00', '15:00:00', 1),
(41, 4, '2022-10-05', '08:00:00', '15:30:00', 1),
(42, 4, '2022-10-19', '08:00:00', '15:30:00', 1),
(43, 4, '2022-10-12', '08:00:00', '15:30:00', 1),
(44, 4, '2022-10-26', '08:00:00', '15:30:00', 1),
(45, 4, '2022-11-02', '08:00:00', '15:30:00', 1),
(46, 4, '2022-11-09', '08:00:00', '15:30:00', 1),
(47, 4, '2022-11-16', '08:00:00', '15:30:00', 1),
(48, 4, '2022-11-30', '08:00:00', '15:30:00', 1),
(49, 4, '2022-11-23', '08:00:00', '15:30:00', 1),
(50, 4, '2022-12-07', '08:00:00', '15:30:00', 1),
(51, 4, '2022-12-14', '08:00:00', '15:30:00', 1),
(52, 4, '2022-12-21', '08:00:00', '15:30:00', 1),
(53, 4, '2022-12-28', '08:00:00', '15:30:00', 1),
(54, 9, '2022-06-20', '08:00:00', '15:00:00', 1),
(55, 9, '2022-06-13', '08:00:00', '15:00:00', 1),
(56, 9, '2022-06-27', '08:00:00', '15:00:00', 1),
(57, 9, '2022-07-04', '08:00:00', '15:00:00', 1),
(58, 9, '2022-07-11', '08:00:00', '15:00:00', 1),
(59, 9, '2022-07-18', '08:00:00', '15:00:00', 1),
(60, 9, '2022-07-25', '08:00:00', '15:00:00', 1),
(61, 9, '2022-08-01', '08:00:00', '15:00:00', 1),
(62, 9, '2022-08-08', '08:00:00', '15:00:00', 1),
(63, 9, '2022-06-30', '08:00:00', '15:00:00', 1),
(64, 9, '2022-06-16', '08:00:00', '15:00:00', 1),
(65, 9, '2022-06-23', '08:00:00', '15:00:00', 1),
(66, 9, '2022-08-22', '08:00:00', '15:00:00', 1),
(67, 9, '2022-08-15', '08:00:00', '15:00:00', 1),
(68, 9, '2022-08-29', '08:00:00', '15:00:00', 1),
(69, 9, '2022-07-07', '08:00:00', '15:00:00', 1),
(70, 9, '2022-07-21', '08:00:00', '15:00:00', 1),
(71, 9, '2022-07-14', '08:00:00', '15:00:00', 1),
(72, 9, '2022-08-04', '08:00:00', '15:00:00', 1),
(73, 9, '2022-08-11', '08:00:00', '15:00:00', 1),
(74, 9, '2022-07-28', '08:00:00', '15:00:00', 1),
(75, 9, '2022-08-18', '08:00:00', '15:00:00', 1),
(76, 9, '2022-08-25', '08:00:00', '15:00:00', 1),
(77, 9, '2022-09-01', '08:00:00', '15:00:00', 1),
(78, 7, '2022-07-12', '08:00:00', '15:30:00', 1),
(79, 7, '2022-07-19', '08:00:00', '15:30:00', 1),
(80, 7, '2022-07-05', '08:00:00', '15:30:00', 1),
(81, 7, '2022-07-26', '08:00:00', '15:30:00', 1),
(82, 7, '2022-08-02', '08:00:00', '15:30:00', 1),
(83, 7, '2022-08-09', '08:00:00', '15:30:00', 1),
(84, 7, '2022-08-16', '08:00:00', '15:30:00', 1),
(85, 7, '2022-08-23', '08:00:00', '15:30:00', 1),
(86, 7, '2022-08-30', '08:00:00', '15:30:00', 1),
(87, 7, '2022-09-06', '08:00:00', '15:30:00', 1),
(88, 7, '2022-10-04', '08:00:00', '15:30:00', 1),
(89, 7, '2022-09-13', '08:00:00', '15:30:00', 1),
(90, 7, '2022-09-20', '08:00:00', '15:30:00', 1),
(91, 7, '2022-09-27', '08:00:00', '15:30:00', 1),
(92, 7, '2022-10-11', '08:00:00', '15:30:00', 1),
(93, 7, '2022-10-18', '08:00:00', '15:30:00', 1),
(94, 7, '2022-10-25', '08:00:00', '15:30:00', 1),
(95, 7, '2022-07-13', '08:00:00', '15:30:00', 1),
(96, 7, '2022-07-06', '08:00:00', '15:30:00', 1),
(97, 7, '2022-07-27', '08:00:00', '15:30:00', 1),
(98, 7, '2022-07-20', '08:00:00', '15:30:00', 1),
(99, 7, '2022-08-03', '08:00:00', '15:30:00', 1),
(100, 7, '2022-08-10', '08:00:00', '15:30:00', 1),
(101, 7, '2022-08-17', '08:00:00', '15:30:00', 1),
(102, 7, '2022-08-24', '08:00:00', '15:30:00', 1),
(103, 7, '2022-08-31', '08:00:00', '15:30:00', 1),
(104, 7, '2022-09-14', '08:00:00', '15:30:00', 1),
(105, 7, '2022-09-07', '08:00:00', '15:30:00', 1),
(106, 7, '2022-09-21', '08:00:00', '15:30:00', 1),
(107, 7, '2022-09-28', '08:00:00', '15:30:00', 1),
(108, 7, '2022-10-05', '08:00:00', '15:30:00', 1),
(109, 7, '2022-10-12', '08:00:00', '15:30:00', 1),
(110, 7, '2022-10-19', '08:00:00', '15:30:00', 1),
(111, 7, '2022-10-26', '08:00:00', '15:30:00', 1),
(112, 3, '2022-06-13', '08:00:00', '15:00:00', 1),
(113, 3, '2022-06-27', '08:00:00', '15:00:00', 1),
(114, 3, '2022-06-20', '08:00:00', '15:00:00', 1),
(115, 3, '2022-07-04', '08:00:00', '15:00:00', 1),
(116, 3, '2022-07-11', '08:00:00', '15:00:00', 1),
(117, 3, '2022-07-18', '08:00:00', '15:00:00', 1),
(118, 3, '2022-07-25', '08:00:00', '15:00:00', 1),
(119, 3, '2022-08-01', '08:00:00', '15:00:00', 1),
(120, 3, '2022-08-08', '08:00:00', '15:00:00', 1),
(121, 3, '2022-08-15', '08:00:00', '15:00:00', 1),
(122, 3, '2022-08-22', '08:00:00', '15:00:00', 1),
(123, 3, '2022-08-29', '08:00:00', '15:00:00', 1),
(124, 3, '2022-06-16', '08:00:00', '15:30:00', 1),
(125, 3, '2022-06-30', '08:00:00', '15:30:00', 1),
(126, 3, '2022-06-23', '08:00:00', '15:30:00', 1),
(127, 3, '2022-07-07', '08:00:00', '15:30:00', 1),
(128, 3, '2022-07-28', '08:00:00', '15:30:00', 1),
(129, 3, '2022-07-14', '08:00:00', '15:30:00', 1),
(130, 3, '2022-07-21', '08:00:00', '15:30:00', 1),
(131, 3, '2022-08-11', '08:00:00', '15:30:00', 1),
(132, 3, '2022-08-18', '08:00:00', '15:30:00', 1),
(133, 3, '2022-08-04', '08:00:00', '15:30:00', 1),
(134, 3, '2022-08-25', '08:00:00', '15:30:00', 1),
(135, 8, '2022-06-14', '10:00:00', '11:00:00', 1),
(136, 8, '2022-06-28', '10:00:00', '11:00:00', 1),
(137, 8, '2022-07-05', '10:00:00', '11:00:00', 1),
(138, 8, '2022-06-21', '10:00:00', '11:00:00', 1),
(139, 8, '2022-07-12', '10:00:00', '11:00:00', 1),
(140, 8, '2022-07-19', '10:00:00', '11:00:00', 1),
(141, 8, '2022-08-02', '10:00:00', '11:00:00', 1),
(142, 8, '2022-07-26', '10:00:00', '11:00:00', 1),
(143, 8, '2022-08-16', '10:00:00', '11:00:00', 1),
(144, 8, '2022-08-09', '10:00:00', '11:00:00', 1),
(145, 8, '2022-08-23', '10:00:00', '11:00:00', 1),
(146, 8, '2022-08-30', '10:00:00', '11:00:00', 1),
(147, 8, '2022-09-06', '10:00:00', '11:00:00', 1),
(148, 8, '2022-09-13', '10:00:00', '11:00:00', 1),
(149, 8, '2022-06-30', '08:00:00', '15:30:00', 1),
(150, 8, '2022-06-16', '08:00:00', '15:30:00', 1),
(151, 8, '2022-09-20', '10:00:00', '11:00:00', 1),
(152, 8, '2022-09-27', '10:00:00', '11:00:00', 1),
(153, 8, '2022-06-23', '08:00:00', '15:30:00', 1),
(154, 8, '2022-07-07', '08:00:00', '15:30:00', 1),
(155, 8, '2022-07-14', '08:00:00', '15:30:00', 1),
(156, 8, '2022-07-21', '08:00:00', '15:30:00', 1),
(157, 8, '2022-08-04', '08:00:00', '15:30:00', 1),
(158, 8, '2022-07-28', '08:00:00', '15:30:00', 1),
(159, 8, '2022-08-18', '08:00:00', '15:30:00', 1),
(160, 8, '2022-08-11', '08:00:00', '15:30:00', 1),
(161, 8, '2022-09-01', '08:00:00', '15:30:00', 1),
(162, 8, '2022-08-25', '08:00:00', '15:30:00', 1),
(163, 8, '2022-09-08', '08:00:00', '15:30:00', 1),
(164, 8, '2022-09-15', '08:00:00', '15:30:00', 1),
(165, 8, '2022-09-29', '08:00:00', '15:30:00', 1),
(166, 8, '2022-06-17', '08:00:00', '13:30:00', 1),
(167, 8, '2022-09-22', '08:00:00', '15:30:00', 1),
(168, 8, '2022-06-24', '08:00:00', '13:30:00', 1),
(169, 8, '2022-07-01', '08:00:00', '13:30:00', 1),
(170, 8, '2022-07-08', '08:00:00', '13:30:00', 1),
(171, 8, '2022-07-15', '08:00:00', '13:30:00', 1),
(172, 8, '2022-07-22', '08:00:00', '13:30:00', 1),
(173, 8, '2022-07-29', '08:00:00', '13:30:00', 1),
(174, 8, '2022-08-05', '08:00:00', '13:30:00', 1),
(175, 8, '2022-08-19', '08:00:00', '13:30:00', 1),
(176, 8, '2022-08-12', '08:00:00', '13:30:00', 1),
(177, 8, '2022-09-02', '08:00:00', '13:30:00', 1),
(178, 8, '2022-08-26', '08:00:00', '13:30:00', 1),
(179, 8, '2022-09-09', '08:00:00', '13:30:00', 1),
(180, 8, '2022-09-23', '08:00:00', '13:30:00', 1),
(181, 8, '2022-09-30', '08:00:00', '13:30:00', 1),
(182, 8, '2022-09-16', '08:00:00', '13:30:00', 1),
(183, 2, '2022-06-16', '11:00:00', '14:30:00', 1),
(184, 2, '2022-06-30', '11:00:00', '14:30:00', 1),
(185, 2, '2022-06-23', '11:00:00', '14:30:00', 1),
(186, 2, '2022-07-07', '11:00:00', '14:30:00', 0),
(187, 2, '2022-07-14', '11:00:00', '14:30:00', 1),
(188, 2, '2022-07-21', '11:00:00', '14:30:00', 1),
(189, 2, '2022-07-28', '11:00:00', '14:30:00', 1),
(190, 2, '2022-08-11', '11:00:00', '14:30:00', 1),
(191, 2, '2022-08-04', '11:00:00', '14:30:00', 1),
(192, 2, '2022-08-18', '11:00:00', '14:30:00', 1),
(193, 2, '2022-08-25', '11:00:00', '14:30:00', 1),
(194, 2, '2022-09-01', '11:00:00', '14:30:00', 1),
(195, 2, '2022-09-08', '11:00:00', '14:30:00', 1),
(196, 2, '2022-09-15', '11:00:00', '14:30:00', 1),
(197, 2, '2022-09-22', '11:00:00', '14:30:00', 1),
(198, 2, '2022-09-29', '11:00:00', '14:30:00', 1),
(199, 2, '2022-06-18', '08:30:00', '13:30:00', 1),
(200, 2, '2022-06-25', '08:30:00', '13:30:00', 1),
(201, 2, '2022-07-09', '08:30:00', '13:30:00', 1),
(202, 2, '2022-07-02', '08:30:00', '13:30:00', 1),
(203, 2, '2022-07-16', '08:30:00', '13:30:00', 1),
(204, 2, '2022-07-23', '08:30:00', '13:30:00', 1),
(205, 2, '2022-07-30', '08:30:00', '13:30:00', 1),
(206, 2, '2022-08-06', '08:30:00', '13:30:00', 1),
(207, 2, '2022-08-13', '08:30:00', '13:30:00', 1),
(208, 2, '2022-08-20', '08:30:00', '13:30:00', 1),
(209, 2, '2022-08-27', '08:30:00', '13:30:00', 1),
(210, 2, '2022-09-03', '08:30:00', '13:30:00', 1),
(211, 2, '2022-09-10', '08:30:00', '13:30:00', 1),
(212, 2, '2022-09-17', '08:30:00', '13:30:00', 1),
(213, 2, '2022-09-24', '08:30:00', '13:30:00', 1),
(214, 1, '2022-06-13', '10:00:00', '15:00:00', 1),
(215, 1, '2022-06-27', '10:00:00', '15:00:00', 1),
(216, 1, '2022-06-20', '10:00:00', '15:00:00', 1),
(217, 1, '2022-07-11', '10:00:00', '15:00:00', 1),
(218, 1, '2022-07-18', '10:00:00', '15:00:00', 1),
(219, 1, '2022-07-04', '10:00:00', '15:00:00', 1),
(220, 1, '2022-08-01', '10:00:00', '15:00:00', 1),
(221, 1, '2022-08-08', '10:00:00', '15:00:00', 1),
(222, 1, '2022-08-15', '10:00:00', '15:00:00', 1),
(223, 1, '2022-07-25', '10:00:00', '15:00:00', 1),
(224, 1, '2022-09-05', '10:00:00', '15:00:00', 1),
(225, 1, '2022-08-29', '10:00:00', '15:00:00', 1),
(226, 1, '2022-08-22', '10:00:00', '15:00:00', 1),
(227, 1, '2022-09-12', '10:00:00', '15:00:00', 1),
(228, 1, '2022-09-19', '10:00:00', '15:00:00', 1),
(229, 1, '2022-09-26', '10:00:00', '15:00:00', 1),
(230, 1, '2022-10-03', '10:00:00', '15:00:00', 1),
(231, 1, '2022-10-10', '10:00:00', '15:00:00', 1),
(232, 1, '2022-10-17', '10:00:00', '15:00:00', 1),
(233, 1, '2022-10-24', '10:00:00', '15:00:00', 1),
(234, 1, '2022-10-31', '10:00:00', '15:00:00', 1),
(235, 1, '2022-06-15', '08:00:00', '14:30:00', 1),
(236, 1, '2022-06-29', '08:00:00', '14:30:00', 1),
(237, 1, '2022-07-06', '08:00:00', '14:30:00', 1),
(238, 1, '2022-07-13', '08:00:00', '14:30:00', 1),
(239, 1, '2022-06-22', '08:00:00', '14:30:00', 1),
(240, 1, '2022-07-20', '08:00:00', '14:30:00', 1),
(241, 1, '2022-07-27', '08:00:00', '14:30:00', 1),
(242, 1, '2022-08-03', '08:00:00', '14:30:00', 1),
(243, 1, '2022-08-17', '08:00:00', '14:30:00', 1),
(244, 1, '2022-08-10', '08:00:00', '14:30:00', 1),
(245, 1, '2022-08-31', '08:00:00', '14:30:00', 1),
(246, 1, '2022-09-07', '08:00:00', '14:30:00', 1),
(247, 1, '2022-08-24', '08:00:00', '14:30:00', 1),
(248, 1, '2022-09-14', '08:00:00', '14:30:00', 1),
(249, 1, '2022-09-21', '08:00:00', '14:30:00', 1),
(250, 1, '2022-09-28', '08:00:00', '14:30:00', 1),
(251, 1, '2022-10-05', '08:00:00', '14:30:00', 1),
(252, 1, '2022-10-26', '08:00:00', '14:30:00', 1),
(253, 1, '2022-10-19', '08:00:00', '14:30:00', 1),
(254, 1, '2022-10-12', '08:00:00', '14:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dr_has_speciality`
--

CREATE TABLE `dr_has_speciality` (
  `dr_has_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dr_has_speciality`
--

INSERT INTO `dr_has_speciality` (`dr_has_id`, `spec_id`, `dr_id`) VALUES
(1, 9, 1),
(2, 10, 1),
(3, 12, 1),
(4, 16, 1),
(5, 15, 1),
(6, 5, 2),
(7, 6, 2),
(8, 3, 2),
(9, 8, 2),
(10, 9, 2),
(11, 2, 2),
(12, 14, 3),
(13, 16, 3),
(14, 17, 3),
(15, 20, 3),
(16, 6, 3),
(17, 4, 4),
(18, 5, 4),
(19, 1, 4),
(20, 3, 4),
(21, 9, 4),
(22, 19, 4),
(23, 2, 5),
(24, 3, 5),
(25, 5, 5),
(26, 10, 5),
(27, 20, 5),
(28, 2, 6),
(29, 1, 6),
(30, 5, 6),
(31, 7, 6),
(32, 9, 6),
(33, 11, 6),
(34, 3, 7),
(35, 4, 7),
(36, 6, 7),
(37, 16, 7),
(38, 18, 7),
(39, 9, 7),
(40, 7, 7),
(41, 3, 8),
(42, 14, 8),
(43, 15, 8),
(44, 17, 8),
(45, 18, 8),
(46, 20, 8),
(47, 7, 9),
(48, 2, 9),
(49, 8, 9),
(50, 14, 9),
(51, 13, 9),
(52, 4, 6),
(53, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dr_speciality`
--

CREATE TABLE `dr_speciality` (
  `spec_id` int(11) NOT NULL,
  `spec_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dr_speciality`
--

INSERT INTO `dr_speciality` (`spec_id`, `spec_name`) VALUES
(1, 'Humanistic Therapy'),
(2, 'Psychodynamic Therapy'),
(3, 'Psychoanalytic Therapy'),
(4, 'Trauma'),
(5, 'Bipolar'),
(6, 'Neuropsychology'),
(7, 'Sports psychology'),
(8, 'Phobias'),
(9, 'CBT'),
(10, 'holistic therapy'),
(11, 'Developmental Psychology'),
(12, 'Addiction'),
(13, 'eating disorders'),
(14, 'ADHD'),
(15, 'dyspraxias'),
(16, 'OCD'),
(17, 'Schizophrenia'),
(18, 'PTSD'),
(19, 'Sleep disorders'),
(20, 'Communication Disorders ');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `p_user_id` int(11) NOT NULL,
  `p_first_name` varchar(30) NOT NULL,
  `p_middle_name` varchar(30) NOT NULL,
  `p_last_name` varchar(30) NOT NULL,
  `p_age` int(3) NOT NULL,
  `p_gender` varchar(10) NOT NULL,
  `nb_of_family` int(2) NOT NULL,
  `employed_or_not` varchar(3) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `p_phone_number` int(11) NOT NULL,
  `patient_image` varchar(50) NOT NULL,
  `student_or_not` varchar(20) NOT NULL,
  `history` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `emergency_nb` int(8) NOT NULL,
  `marital_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `p_user_id`, `p_first_name`, `p_middle_name`, `p_last_name`, `p_age`, `p_gender`, `nb_of_family`, `employed_or_not`, `location`, `description`, `p_phone_number`, `patient_image`, `student_or_not`, `history`, `city`, `emergency_nb`, `marital_status`) VALUES
(1, 11, 'Ahmad', 'ali', 'alhajj', 22, 'male', 7, 'no', 'Beirut', 'Struggling with low energy, lack of motivation and interest for almost a year. With decrease in appetite and more insomnia.', 76897454, 'OIP2.jpg', 'yes', 'I have been on medications since 2020 due to a car accident that had a great effect on my physical health. No other medications are used.', 'Al dahye', 78893788, 'single'),
(2, 12, 'Georgoes', 'hannah', 'alhaddad', 35, 'male', 6, 'yes', 'zahle', 'low energy, lack of motivation and interest for almost a year. With decrease in appetite and more insomnia.', 76897454, 'OIP2.jpg', 'yes', 'I have been on medications for 4 years, medications including Depakine and insomnia medicine. I struggle with seizure and mood issues.', 'zahle', 70343657, 'married'),
(3, 13, 'Zeinab', 'youssef', 'Haidar', 44, 'female', 10, 'yes', 'south lebanon', 'currently facing a daily struggle with depression, my husband just passed away 2 months ago and its been challenging to cope with it. ', 76898333, 'OIP2.jpg', 'no', 'I have been working in my business for 15 years now, recently its feeling like a difficult task to continue. ', 'bnt jbeil', 76895993, 'widow'),
(4, 14, 'Hussein', 'youness', 'Taleb', 50, 'male', 6, 'yes', 'North lebanon', 'My son died 6 months ago, in a car accident we had together. since then its been challenging to do the normal daily tasks and living without regret.', 78889967, 'OIP2.jpg', 'no', 'I don not take any medications except insulin for diabetes, I have visited a psychologist but it did not work out well.', 'tripoli', 76545656, 'divorced'),
(5, 15, 'Maria', 'georges', 'matta', 30, 'female', 9, 'yes', 'Beirut', 'Currently dealing with raced heart beats most of the time, experiencing anxiety and and low energy. lost passion towards my old hobbies..', 70576787, 'OIP2.jpg', 'no', 'I have visited a psychiatrist before and I have been taking Bromocriptine  which helped me at the beginning but no I cannot live without it so I quit therapy 2 month ago.', 'AL Hadath', 71787222, 'divorced');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `pay_app_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_date` date NOT NULL DEFAULT current_timestamp(),
  `pay_time` time NOT NULL DEFAULT current_timestamp(),
  `pay_method` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `pay_app_id`, `pay_amount`, `pay_date`, `pay_time`, `pay_method`) VALUES
(65, 187, 75, '2022-03-17', '16:58:53', 'Cash'),
(66, 188, 70, '2022-03-17', '16:58:57', 'Cash'),
(67, 189, 70, '2022-03-17', '17:12:59', 'Cash'),
(68, 190, 70, '2022-04-17', '17:13:03', 'Cash'),
(83, 197, 75, '2022-05-19', '21:20:03', 'visa'),
(84, 199, 75, '2022-05-19', '21:23:54', 'visa'),
(85, 200, 75, '2022-05-19', '21:29:26', 'mastercard'),
(86, 201, 75, '2022-05-19', '21:36:09', 'visa'),
(87, 202, 75, '2022-05-19', '21:49:38', 'mastercard'),
(88, 203, 75, '2022-05-19', '22:11:15', 'visa'),
(89, 204, 75, '2022-05-19', '22:12:30', 'Cash'),
(90, 203, 75, '2022-05-19', '22:42:37', 'mastercard'),
(91, 207, 75, '2022-05-19', '22:44:08', 'visa'),
(92, 208, 75, '2022-05-19', '22:47:00', 'visa'),
(93, 209, 75, '2022-05-20', '17:04:10', 'mastercard'),
(94, 210, 75, '2022-05-20', '22:13:46', 'Cash'),
(95, 211, 75, '2022-06-11', '16:47:27', 'visa'),
(96, 212, 70, '2022-06-11', '17:17:14', 'visa'),
(97, 213, 70, '2022-06-11', '17:17:36', 'visa'),
(98, 214, 75, '2022-06-11', '17:20:45', 'mastercard'),
(99, 215, 75, '2022-06-11', '18:41:51', 'Cash'),
(100, 216, 70, '2022-06-11', '18:42:09', 'Cash'),
(101, 217, 75, '2022-06-11', '18:42:22', 'Cash'),
(102, 218, 75, '2022-06-11', '18:42:57', 'Cash'),
(103, 219, 75, '2022-06-11', '18:43:17', 'Cash'),
(104, 220, 75, '2022-06-11', '18:43:35', 'Cash'),
(105, 221, 75, '2022-06-11', '18:45:53', 'visa'),
(106, 222, 70, '2022-06-11', '18:58:45', 'visa'),
(107, 223, 75, '2022-06-11', '19:10:34', 'Cash'),
(108, 224, 75, '2022-06-11', '19:11:06', 'Cash'),
(109, 225, 75, '2022-06-11', '19:11:22', 'Cash'),
(110, 226, 75, '2022-06-11', '19:11:37', 'Cash'),
(111, 227, 75, '2022-06-11', '19:11:58', 'Cash'),
(112, 228, 75, '2022-06-11', '19:12:17', 'Cash'),
(113, 229, 70, '2022-06-11', '19:12:53', 'Cash'),
(114, 230, 70, '2022-06-11', '19:13:04', 'Cash'),
(115, 231, 70, '2022-06-11', '19:13:25', 'Cash'),
(116, 232, 75, '2022-06-12', '12:17:58', 'visa'),
(117, 233, 75, '2022-06-12', '12:32:11', 'visa'),
(118, 234, 70, '2022-06-12', '12:50:21', 'visa'),
(119, 235, 70, '2022-06-12', '12:54:08', 'visa'),
(120, 236, 75, '2022-06-12', '16:24:37', 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_type`, `status`) VALUES
(1, 'center', 'center@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'admin', 1),
(2, 'mark_kabalan', 'mark.kabalan@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(3, 'elie_khoury', 'elie.khoury@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(4, 'ahmad_ramadan', 'ahmad.ramadan@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(5, 'rawane_rize', 'rawan.rize@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(6, 'dima_youness', 'dima.youness@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(7, 'chritina_saliba', 'chritina.saliba@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(8, 'laury_richani', 'laury.richani@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(9, 'dana_ashraf', 'dana.ashraf@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(10, 'anjela_mehrej', 'anjela.mehrej@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'doctor', 1),
(11, 'ahmad_alhajj', 'ahmad.alhaj@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'patient', 1),
(12, 'georgoes_alhadad', 'georgoes.alhadad@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'patient', 1),
(13, 'zeinab_haidar', 'zeinab.haidar@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'patient', 1),
(14, 'hussein_taleb', 'hussein.taleb@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'patient', 1),
(15, 'maria_matta', 'maria.matta@gmail.com', '$2y$10$a3NNfhuRrrt2Px5BLe0./ucPeP7amTZuPNFfbw0GX/vWKPLw0uNZ2', 'patient', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `center_rules`
--
ALTER TABLE `center_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `dr_type` (`dr_type`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `d_s_id` (`d_s_id`);

--
-- Indexes for table `dr_has_speciality`
--
ALTER TABLE `dr_has_speciality`
  ADD PRIMARY KEY (`dr_has_id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `spec_id` (`spec_id`);

--
-- Indexes for table `dr_speciality`
--
ALTER TABLE `dr_speciality`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `p_user_id` (`p_user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `pay_app_id` (`pay_app_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `center_rules`
--
ALTER TABLE `center_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `dr_has_speciality`
--
ALTER TABLE `dr_has_speciality`
  MODIFY `dr_has_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `dr_speciality`
--
ALTER TABLE `dr_speciality`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`dr_type`) REFERENCES `center_rules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD CONSTRAINT `doctors_schedule_ibfk_1` FOREIGN KEY (`d_s_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dr_has_speciality`
--
ALTER TABLE `dr_has_speciality`
  ADD CONSTRAINT `dr_has_speciality_ibfk_1` FOREIGN KEY (`spec_id`) REFERENCES `dr_speciality` (`spec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dr_has_speciality_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`p_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`pay_app_id`) REFERENCES `appointments` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
