

--
-- Database: `nkt5`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `college` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `firstname`, `lastname`, `phone`, `birthday`, `gender`, `password`, `college`, `major`) VALUES
(1, 'mjlee@njit.edu', 'Mike', 'Lee', '974-555-5555', '2000-05-05', 'male', '1234', '', ''),
(2, 'janedoe@njit.edu', 'John', 'Doe', '555-555-5555', '1950-07-07', 'female', '1234', '', ''),
(3, 'ml4q73@njit.edu', NULL, NULL, NULL, NULL, NULL, '1', '', ''),
(4, 'ml24q73@njit.edu', '1', '1', '111', '0011-01-01', 'male', '2', '', ''),
(5, 'ml241q73@njit.edu', '1', '1', '111', '0011-01-01', 'male', '1', '', ''),
(6, 'js829', '', '', '', '2000-05-05', '', '123', '', ''),
(7, 'test@njit.edu', 'yong', 'zhao', '911', '2000-05-05', 'male', '1234', '', ''),
(8, 'Rebecca@gmail.com', 'Rebecca', 'cortes', '7777', '2000-05-05', 'female', 'cortes', '', ''),
(9, '', '', '', '', '2000-05-05', '', '', '', ''),
(10, 'test@gmail.com', 'test', 'test', '222', '2000-05-05', 'f', 'test', '', ''),
(11, 'test2@gmail.com', 'test', 'test', '444', '2000-05-05', 'female', 'test', '', ''),
(12, 'mjlee@njit.edu0', 'yong', 'yong', '911', '2000-05-05', 'male', '1234', '', ''),
(13, 'j@njit.edu', 'jose', 'nunez', 'afa', '2000-05-01', 'M', 'jj', 'hass', 'ass'),
(20, 'mnunez@njit.edu', 'michelle', 'nunez', '123', '2000-05-01', 'Female', '123', 'jack', 'ass'),
(21, 'alex@njcu.edu', 'alex', 'dejesus', '123', '1998-12-14', 'female', '123', 'njcu', 'edu'),
(23, 'mpnunez5@gmail.com', 'Michelle', 'Nunez', '2019360692', '2000-05-01', '131', '123', '1231', '123'),
(24, 'yanet@njit.edu', 'Yanet', 'Ortiz', '123456789', '1974-06-19', 'Female', '123', 'NJCU', 'Cooking'),
(25, 'yikes@pls.com', 'Michelle', 'Nunez', '2019360692', '2000-05-01', 'female', '123', '123', '123'),
(26, 'mpn6@njit.edu', 'michelle', 'nunez', '131', '2000-05-01', 'FEMALE', '123', '132', '213'),
(27, 'ppppp@njit.edu', 'sfdkj', 'ajkhf', '234', '4444-12-12', '1243', 'j1231', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) UNSIGNED NOT NULL,
  `owneremail` varchar(60) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `message` text,
  `description` varchar(144) NOT NULL,
  `isdone` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `owneremail`, `ownerid`, `createddate`, `duedate`, `message`, `description`, `isdone`, `status`) VALUES
(1, 'janedoe@njit.edu', 2, '2017-01-01 00:00:00', '2017-05-03 00:00:00', 'This is test #B', '', 0, ''),
(2, 'mjlee@njit.edu', 1, '2017-05-03 00:00:00', '2017-05-27 00:00:00', 'new name 2', '', 0, ''),
(3, 'janedoe@njit.edu', 2, '2017-01-01 00:00:00', '2017-05-01 00:00:00', 'This is test #A', '', 1, ''),
(4, 'mjlee@njit.edu', 1, '2017-05-03 00:00:00', '2017-05-26 00:00:00', 'test again', '', 0, ''),
(5, 'mjlee@njit.edu', 1, '2017-05-07 00:00:00', '2017-05-28 00:00:00', '1111', '', 0, ''),
(6, 'test@gmail.com', 13, '2000-05-05 00:00:00', '2000-05-05 00:00:00', 'HELLO', '', 0, ''),
(20, 'janedoe@njit.edu', 2, NULL, '2020-05-10 11:59:00', 'testing', 'akflk', 1, 'In Progress');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
