-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 04:57 AM
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
-- Database: `comp3421`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `QuestionID` int(6) NOT NULL,
  `AnswerNum` int(1) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `Answer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(4) NOT NULL,
  `StudentID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `StudentID`) VALUES
(0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classname`
--

CREATE TABLE `classname` (
  `ClassID` int(4) NOT NULL,
  `TeacherID` int(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classname`
--

INSERT INTO `classname` (`ClassID`, `TeacherID`, `name`) VALUES
(0, 0, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` int(6) NOT NULL,
  `QuizID` int(4) NOT NULL,
  `Content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `QuizID`, `Content`) VALUES
(-1, -1, 'PlaceHolder');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `QuizID` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ClassID` int(4) NOT NULL,
  `TeacherID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QuizID`, `name`, `ClassID`, `TeacherID`) VALUES
(-1, 'PlaceHolder', -1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `QuestionID` int(6) NOT NULL,
  `StudentID` int(4) NOT NULL,
  `Correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `PW` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `username`, `PW`, `email`) VALUES
(0, 'test', '12345678', 'test@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `PW` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `username`, `PW`, `email`) VALUES
(0, 'test', '12345678', 'test@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`QuestionID`,`AnswerNum`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`,`StudentID`);

--
-- Indexes for table `classname`
--
ALTER TABLE `classname`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QuizID`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`QuestionID`,`StudentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
