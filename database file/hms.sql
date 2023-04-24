-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 09:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `Hostel_hid` int(11) NOT NULL,
  `Student_sid` int(11) NOT NULL,
  `Form_no` int(11) NOT NULL,
  `Standard_sid` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `Saddress` varchar(100) NOT NULL,
  `Father_name` varchar(45) NOT NULL,
  `Father_mobile` varchar(10) NOT NULL,
  `Last_school` varchar(50) NOT NULL,
  `School_LC` varchar(255) NOT NULL,
  `AdharCard` varchar(255) NOT NULL,
  `Last_Result` varchar(255) NOT NULL,
  `iscancel` tinyint(1) NOT NULL DEFAULT 0,
  `isaccepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`Hostel_hid`, `Student_sid`, `Form_no`, `Standard_sid`, `Date`, `Gender`, `DOB`, `Saddress`, `Father_name`, `Father_mobile`, `Last_school`, `School_LC`, `AdharCard`, `Last_Result`, `iscancel`, `isaccepted`) VALUES
(1, 1, 2, 1, '2023-04-24', 'Male', '2002-04-05', 'vavdi,babra,amreli,365410', 'Vipulbhai koladiya', '9998488376', 'J S malaviya high school', '', '', '', 0, 1),
(1, 2, 3, 1, '2023-04-24', 'Male', '2004-01-04', 'amreli,365601', 'Vipulbhai koladiya', '9878456523', 'oxford amreli', '', '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ctid` int(11) NOT NULL,
  `ctname` varchar(45) NOT NULL,
  `State_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ctid`, `ctname`, `State_sid`) VALUES
(1, 'Amreli', 1),
(2, 'Gondal', 1),
(3, 'Ahmedabad', 1),
(4, 'Gandhinagar', 1),
(5, 'Jaipur', 2),
(6, 'Udaipur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cid` int(11) NOT NULL,
  `cname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cid`, `cname`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Empid` int(11) NOT NULL,
  `Emp_name` varchar(45) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Erole` varchar(45) NOT NULL,
  `Emp_mobile` varchar(10) NOT NULL,
  `Emp_email` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Hostel_hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Empid`, `Emp_name`, `Gender`, `Erole`, `Emp_mobile`, `Emp_email`, `Password`, `Hostel_hid`) VALUES
(3, 'Admin', 'Male', 'Admin', '7878982145', 'admin@gmail.com', '$2y$10$5GDd7Wp4kHImT4ezinYuMOSeqTA5LMIYJ7U.7VTnq5M0q1gznfLoy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `Hostel_hid` int(11) NOT NULL,
  `Standard_sid` int(11) NOT NULL,
  `School_fees` int(11) NOT NULL,
  `Hostel_fees` int(11) NOT NULL,
  `Other_fees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`Hostel_hid`, `Standard_sid`, `School_fees`, `Hostel_fees`, `Other_fees`) VALUES
(1, 1, 1200, 1400, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hid` int(11) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `haddress` varchar(50) NOT NULL,
  `hmobile` varchar(10) NOT NULL,
  `hemail` varchar(45) NOT NULL,
  `City_ctid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hid`, `hname`, `haddress`, `hmobile`, `hemail`, `City_ctid`) VALUES
(1, 'Shree Swaminarayan  Gurukul Gondal', '12-Ramanagar,Nr Gundala Fatak,Gondal', '7567653925', 'gurukul@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `sid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `hid` int(11) NOT NULL,
  `form_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`sid`, `path`, `date`, `hid`, `form_no`) VALUES
(1, '/HMS/docs/1_1.JPG', '2023-04-24', 1, 2),
(1, '/HMS/docs/1_2.JPG', '2023-04-24', 1, 2),
(1, '/HMS/docs/1_3.png', '2023-04-24', 1, 2),
(1, '/HMS/docs/1_4.jpg', '2023-04-24', 1, 2),
(2, '/HMS/docs/2_1.jpg', '2023-04-24', 1, 3),
(2, '/HMS/docs/2_2.jpg', '2023-04-24', 1, 3),
(2, '/HMS/docs/2_3.jpg', '2023-04-24', 1, 3),
(2, '/HMS/docs/2_4.jpg', '2023-04-24', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `rname` int(11) NOT NULL,
  `Hostel_hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `rname`, `Hostel_hid`) VALUES
(1, 101, 1),
(2, 102, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_allocate`
--

CREATE TABLE `room_allocate` (
  `Room_rid` int(11) NOT NULL,
  `Student_sid` int(11) NOT NULL,
  `Bad_no` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_allocate`
--

INSERT INTO `room_allocate` (`Room_rid`, `Student_sid`, `Bad_no`) VALUES
(1, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `sid` int(11) NOT NULL,
  `sname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`sid`, `sname`) VALUES
(1, '5'),
(2, '6');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(11) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `Country_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`, `Country_cid`) VALUES
(1, 'Gujarat', 1),
(2, 'Rajasthan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `smobile` varchar(10) NOT NULL,
  `semail` varchar(45) NOT NULL,
  `spassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `smobile`, `semail`, `spassword`) VALUES
(1, 'Jaimin Koladiya', '7624068023', 'koladiyajaimin@gmail.com', '$2y$10$49xAsYLw6yz2Wfk1ZpsEjekMT99GUgpBdXGzsrW7haSMpYI3ULzbW'),
(2, 'Sanket Ramani', '7878982133', 'sanket@gmail.com', '$2y$10$BNYJ9lTwFu7CNPop.cIglOy5jCwHUrLkAUC4OQky9YGzwfDOXxFGe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`Form_no`,`Student_sid`),
  ADD UNIQUE KEY `Student_sid_UNIQUE` (`Student_sid`),
  ADD KEY `fk_Hostel_has_Student_Student1_idx` (`Student_sid`),
  ADD KEY `fk_Hostel_has_Student_Hostel1_idx` (`Hostel_hid`),
  ADD KEY `fk_Admission_Standard1_idx` (`Standard_sid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ctid`),
  ADD KEY `fk_City_State1_idx` (`State_sid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Empid`),
  ADD KEY `fk_Employee_Hostel1_idx` (`Hostel_hid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`Hostel_hid`,`Standard_sid`),
  ADD UNIQUE KEY `Standard_sid_UNIQUE` (`Standard_sid`),
  ADD UNIQUE KEY `Hostel_hid_UNIQUE` (`Hostel_hid`),
  ADD KEY `fk_Hostel_has_Standard_Standard1_idx` (`Standard_sid`),
  ADD KEY `fk_Hostel_has_Standard_Hostel1_idx` (`Hostel_hid`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `fk_Hostel_City1_idx` (`City_ctid`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD KEY `fk_hostelid` (`hid`),
  ADD KEY `fk_studentid` (`sid`),
  ADD KEY `fk_formnumber` (`form_no`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`,`rname`),
  ADD UNIQUE KEY `rname_UNIQUE` (`rname`),
  ADD KEY `fk_Room_Hostel1_idx` (`Hostel_hid`);

--
-- Indexes for table `room_allocate`
--
ALTER TABLE `room_allocate`
  ADD PRIMARY KEY (`Student_sid`),
  ADD KEY `fk_Room_allocate_Room1_idx` (`Room_rid`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`sid`,`sname`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `fk_State_Country_idx` (`Country_cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `Form_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `fk_Admission_Standard1` FOREIGN KEY (`Standard_sid`) REFERENCES `standard` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Hostel_has_Student_Hostel1` FOREIGN KEY (`Hostel_hid`) REFERENCES `hostel` (`hid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Hostel_has_Student_Student1` FOREIGN KEY (`Student_sid`) REFERENCES `student` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_City_State1` FOREIGN KEY (`State_sid`) REFERENCES `state` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_Employee_Hostel1` FOREIGN KEY (`Hostel_hid`) REFERENCES `hostel` (`hid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fk_Hostel_has_Standard_Hostel1` FOREIGN KEY (`Hostel_hid`) REFERENCES `hostel` (`hid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Hostel_has_Standard_Standard1` FOREIGN KEY (`Standard_sid`) REFERENCES `standard` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `fk_Hostel_City1` FOREIGN KEY (`City_ctid`) REFERENCES `city` (`ctid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_formnumber` FOREIGN KEY (`form_no`) REFERENCES `admission` (`Form_no`),
  ADD CONSTRAINT `fk_hostelid` FOREIGN KEY (`hid`) REFERENCES `admission` (`Hostel_hid`),
  ADD CONSTRAINT `fk_studentid` FOREIGN KEY (`sid`) REFERENCES `admission` (`Student_sid`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_Room_Hostel1` FOREIGN KEY (`Hostel_hid`) REFERENCES `hostel` (`hid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_allocate`
--
ALTER TABLE `room_allocate`
  ADD CONSTRAINT `fk_Room_allocate_Room1` FOREIGN KEY (`Room_rid`) REFERENCES `room` (`rid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Room_allocate_Student1` FOREIGN KEY (`Student_sid`) REFERENCES `student` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk_State_Country` FOREIGN KEY (`Country_cid`) REFERENCES `country` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
