-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 10, 2017 at 08:37 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codejudge`
--

-- --------------------------------------------------------

--
-- Table structure for table `pq_bank`
--

CREATE TABLE IF NOT EXISTS `pq_bank` (
  `qid` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `uploaded_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pq_bank`
--

INSERT INTO `pq_bank` (`qid`, `tid`, `heading`, `description`, `uploaded_by`) VALUES
('47bc26e8d95bd35da486', '41035330d6493d1676ce', 'Programs based on various operators', 'Write a program to perform various operators (like Arithmetic Operators, Relational Operators, Logical Operators and so on..).\r\n\r\nInput Format\r\n\r\nInput 2 variables a and b from user and perform the following operations,\r\n\r\nArithmetic Operators\r\n\r\nDivision, modulus, increment operator(hint -> a++) on a and decrement operator(hint -> b--) on b.\r\n\r\nRelational Operators\r\n\r\nCheck if the values of two operands are equal or not, check if the value of left operand is greater than or equal to the value of right operand. \r\n\r\nLogical Operators\r\n\r\nCall logical AND operator and call logical NOT operator(hint perform logical NOT operator on the a && b).\r\n\r\nBitwise Operators\r\n\r\nPerform bitwise OR operator.\r\n\r\nAssignment Operators\r\n\r\nPerform multiply AND assignment operator (hint b *= a).\r\n\r\nOutput Format\r\n\r\nPrint the result of all the operation performed on those 2 variables (*caution print the output in the same sequence as given above).\r\n\r\nSample Input\r\n\r\n10 5\r\n\r\nSample Output\r\n\r\n2 0 11 4 0 1 1 0 1', '4ca68ea6396273136ae8'),
('f281e7f25b18e3c211a8', '41035330d6493d1676ce', 'Programs based on Decision Control Structure', 'The marks obtained by a student in 5 different subjects are input through the keyboard. The student gets a division as per the following rules:\r\n\r\nPercentage above or equal to 60 - First Division\r\nPercentage between 50 and 59 - Second Division\r\nPercentage between 40 and 49 - Third Division\r\nPercentage less than 40 - Fail\r\n\r\nInput Format\r\n\r\nInput the marks of 5 subjects.\r\n\r\nOutput Format\r\n\r\nPrint the division of the student.\r\n\r\nSample Input\r\n\r\n80 80 80 80 80\r\n\r\nSample Output\r\n\r\nFirst Division', '4ca68ea6396273136ae8');

-- --------------------------------------------------------

--
-- Table structure for table `q_bank`
--

CREATE TABLE IF NOT EXISTS `q_bank` (
  `qid` varchar(20) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `uploaded_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_bank`
--

INSERT INTO `q_bank` (`qid`, `heading`, `description`, `uploaded_by`) VALUES
('0cb44391b5505dc77e9d', 'Pointer', 'A pointer in C is a way to share a memory address among different contexts (primarily functions). They are primarily used whenever a function needs to modify the content of a variable, of which it doesn''t have ownership. \r\n\r\nIn order to access the memory address of a variable, val, we need to prepend it with & sign. E.g., &val returns the memory address of val. \r\n\r\nThis memory address is assigned to a pointer and can be shared among various functions. E.g. int*p = &val will assign the memory address of val to pointer p. To access the content of the memory to which the pointer points, prepend it with a *. For example, *p will return the value reflected by val and any modification to it will be reflected at the source (val).\r\n\r\n  void increment(int *v) {\r\n    (*v)++;\r\n  }\r\n\r\n  int main() {\r\n    int a;\r\n    scanf("%d", &a);\r\n    increment(&a);\r\n    printf("%d", a);\r\n    return 0;\r\n  }\r\n  \r\nYou have to complete the function void update(int *a,int *b), which reads two integers as argument, and sets a with the sum of them, and b with the absolute difference of them.\r\n\r\na'' = a + b\r\nb'' = |a - b|\r\n\r\nInput Format\r\n\r\nInput will contain two integers, a and b, separated by a newline.\r\n\r\nOutput Format\r\n\r\nYou have to print the updated value of a and b, on two different lines.\r\n\r\nSample Input\r\n\r\n4\r\n5\r\n\r\nSample Output\r\n\r\n9\r\n1\r\n\r\nExplanation\r\n\r\na'' = 4 + 5 = 9\r\nb'' = |4 - 5| = 1', '4ca68ea6396273136ae8'),
('178db3a484aeb5e42434', 'Bubble Sort', 'Bubble sort is a simple sorting algorithm that repeatedly steps through the list to be sorted, compares each pair of adjacent items and swaps them if they are in the wrong order. The pass through the list is repeated until no swaps are needed, which indicates that the list is sorted.\r\n\r\nInput Format\r\n\r\nThe first line contains an integer, N, denoting the size of the array. \r\nThe second line contains N space-separated integers representing the array''s elements.\r\n\r\nOutput Format\r\n\r\nPrint the sorted array.\r\n\r\nSample Input\r\n\r\n6\r\n9 8 3 4 10 11\r\n\r\nSample Output\r\n\r\n3 4 8 9 10 11', '4ca68ea6396273136ae8'),
('83175d75181e6467f14d', 'Variable Sized Arrays', 'Consider an n-element array, a, where each index i in the array contains a reference to an array of ki integers (where the value of ki varies from array to array). See the Explanation section below for a diagram.\r\n\r\nGiven a, you must answer q queries. Each query is in the format i j, where i denotes an index in array a and j denotes an index in the array located at a[i]. For each query, find and print the value of element j in the array at location a[i] on a new line.\r\n\r\nInput Format\r\n\r\nThe first line contains two space-separated integers denoting the respective values of n (the number of variable-length arrays) and q (the number of queries). \r\nEach line i of the n subsequent lines contains a space-separated sequence in the format k a[i]0 a[i]1 â€¦ a[i]k-1 describing the k-element array located at a[i].\r\nEach of the q subsequent lines contains two space-separated integers describing the respective values of i (an index in array a) and j (an index in the array referenced by a[i]) for a query.\r\n\r\nOutput Format\r\n\r\nFor each pair of i and j values (i.e., for each query), print a single integer denoting the element located at index j of the array referenced by a[i]. There should be a total of q lines of output.\r\n\r\nSample Input\r\n\r\n2 2\r\n3 1 5 4\r\n5 1 2 8 9 3\r\n0 1\r\n1 3\r\n\r\nSample Output\r\n\r\n5\r\n9', '4ca68ea6396273136ae8'),
('dea8bc85811523dd6415', 'Simple Array Sum', 'Given an array of N integers, can you find the sum of its elements?\r\n\r\nInput Format\r\n\r\nThe first line contains an integer, N, denoting the size of the array. \r\nThe second line contains N space-separated integers representing the array''s elements.\r\n\r\nOutput Format\r\n\r\nPrint the sum of the array''s elements as a single integer.\r\n\r\nSample Input\r\n\r\n6\r\n1 2 3 4 10 11\r\n\r\nSample Output\r\n\r\n31\r\n\r\nExplanation\r\n\r\nWe print the sum of the array''s elements, which is: 1 + 2 + 3 + 4 + 10 + 11 = 31.', '4ca68ea6396273136ae8'),
('fb007cdfd1ae975549d2', 'Solve Me First', 'Welcome! The purpose of this challenge is to familiarize you with reading input from stdin (the standard input stream) and writing output to stdout (the standard output stream) using our environment.\r\n\r\nReview the code provided in the editor below, then complete the solveMeFirst function so that it returns the sum of two integers read from stdin. Take some time to understand this code so you''re prepared to write it yourself in future challenges.\r\n\r\nSelect a language below, and start coding!\r\n\r\nInput Format\r\n\r\nCode that reads input from stdin is provided for you in the editor. There are  lines of input, and each line contains a single integer.\r\n\r\nOutput Format\r\n\r\nCode that prints the sum calculated and returned by solveMeFirst is provided for you in the editor.', '4ca68ea6396273136ae8');

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

CREATE TABLE IF NOT EXISTS `reg_users` (
  `uid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `post` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`uid`, `name`, `email`, `pass`, `post`) VALUES
('270da1c5e864ffad44f3', 'Divyank Pahlazani', 'divyank.pahlazani_cs13@gla.ac.in', '17d1e39b1c642ba9857b7722be945ef1', 'admin'),
('3ff763c8fce0e6187a62', 'Deepanshu Jain', 'deepanshu.jain_cs13@gla.ac.in', 'bf76b73579ee889af8815b497e5c6bbe', 'student'),
('4ca68ea6396273136ae8', 'Deependra Das', 'deependra.das_cs13@gla.ac.in', '2a6571da26602a67be14ea8c5ab82349', 'teacher'),
('6a542a96e4289a8d1273', 'Gaurav Rajput', 'gaurav.rajput_cs13@gla.ac.in', 'abfbea0ea09d07b4342c5cbc8fcd745f', 'admin'),
('8e2e9b2b37ea4752117a', 'Love Gupta', 'love.gupta_cs13@gla.ac.in', '0829857d24d596d0ab9363f459abc871', 'student'),
('92e723dbf19a34f1f4ff', 'Himanshu Nigam', 'himanshu.nigam_cs13@gla.ac.in', '6d7e8664505010dc18f6d3c3f31b585a', 'teacher'),
('d60c939a820feca148d1', 'Ashish Pahlazani', 'pahlaz.ashish@gmail.com', '89cd279e1dbab7a8518361804a388062', 'teacher'),
('ddbfe22d81a58160360a', 'Himank Bansal', 'himank.bansal_cs13@gla.ac.in', 'f10963df6492717b1b697940d770e88c', 'student'),
('f18e40d460d5cd7eaf63', 'Gaurav Pathak', 'gaurav.pathak_cs13@gla.ac.in', '35eceaa876a167ac8edc2ced0be72eb4', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `signin_log`
--

CREATE TABLE IF NOT EXISTS `signin_log` (
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submited_practice_question`
--

CREATE TABLE IF NOT EXISTS `submited_practice_question` (
  `uid` varchar(20) NOT NULL,
  `qid` varchar(20) NOT NULL,
  `testcase_passed` int(11) NOT NULL,
  `code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submited_practice_question`
--

INSERT INTO `submited_practice_question` (`uid`, `qid`, `testcase_passed`, `code`) VALUES
('8e2e9b2b37ea4752117a', '178db3a484aeb5e42434', 0, 'bubble');

-- --------------------------------------------------------

--
-- Table structure for table `submited_test`
--

CREATE TABLE IF NOT EXISTS `submited_test` (
  `uid` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `qid` varchar(20) NOT NULL,
  `testcase_passed` int(11) NOT NULL,
  `code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submited_test`
--

INSERT INTO `submited_test` (`uid`, `tid`, `qid`, `testcase_passed`, `code`) VALUES
('3ff763c8fce0e6187a62', '41035330d6493d1676ce', 'f281e7f25b18e3c211a8', 0, 'deepanshu'),
('8e2e9b2b37ea4752117a', '41035330d6493d1676ce', 'f281e7f25b18e3c211a8', 0, 'love gupta'),
('ddbfe22d81a58160360a', '41035330d6493d1676ce', 'f281e7f25b18e3c211a8', 0, 'himank '),
('f18e40d460d5cd7eaf63', '41035330d6493d1676ce', '47bc26e8d95bd35da486', 0, 'pathak');

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE IF NOT EXISTS `testcases` (
  `tcid` varchar(20) NOT NULL,
  `qid` varchar(20) NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`tcid`, `qid`, `input`, `output`) VALUES
('47e1019b66044468efd4', '178db3a484aeb5e42434', '6 9 8 3 4 10 11', '3 4 8 9 10 11'),
('51549229adc63fad6ade', '0cb44391b5505dc77e9d', '4 5', '9 1'),
('5204cbae3ae322e8c5de', 'fb007cdfd1ae975549d2', '2 3', '5'),
('8fa8b9f95d3f24f2d38e', '83175d75181e6467f14d', '2 2 3 1 5 4 5 1 2 8 9 3 0 1 1 3', '5 9'),
('914b1e1bd4f62113d786', 'dea8bc85811523dd6415', '6 1 2 3 4 10 11', '31'),
('979505dac45f6a3c910d', '47bc26e8d95bd35da486', '10 5', '2 0 11 4 0 1 1 0 15 50'),
('de4a79103e56077c848c', 'f281e7f25b18e3c211a8', '80 80 80 80 80', 'First Division');

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE IF NOT EXISTS `t_bank` (
  `tid` varchar(20) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `uploaded_by` varchar(20) NOT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`tid`, `heading`, `description`, `uploaded_by`, `pass`) VALUES
('0b4fd6ce879bef84da8a', 'CSE4081: OPERATING SYSTEMS LAB', 'The objective of this lab is to provide students practical knowledge of various scheduling , page replacement and deadlock handling algorithms. ', '4ca68ea6396273136ae8', 'cse4081'),
('41035330d6493d1676ce', 'CSE1181: COMPUTER PROGRAMMING LAB I ', 'The objective is to provide a comprehensive study of the C programming language. It stress the strengths of C, which provide students with the means of writing efficient, maintainable, and portable code.', '4ca68ea6396273136ae8', 'cse1181'),
('8119eafc792197e24f7f', 'CSE3081: DATA STRUCTURES & ALGORITHMS LAB', 'The objective of this Lab is to teach students various data structures and to explain them algorithms for performing various operations on these data structures. ', '4ca68ea6396273136ae8', 'cse3081'),
('c261359d3053273422f4', 'CSE482: ADVANCED COMPUTER ARCHITECTURE LAB', 'The objective is to identify and analyze the attributes of computer architecture design with recent trend technology and to identify the techniques to improve the speed and performance of computers Parallelism in Instruction level and multiple issues of instructions. ', '4ca68ea6396273136ae8', 'cse482'),
('e2e98d2b9235d5d23994', 'CSE2181: COMPUTER PROGRAMMING LAB II ', 'The objective is to provide a comprehensive study of the C programming language. It stress the strengths of C, which provide students with the means of writing efficient, maintainable, and portable code.', '92e723dbf19a34f1f4ff', 'cse2181'),
('e73481eb6d52edb638a2', 'CSE5081: DESIGN & ANALYSIS OF ALGORITHMS LAB', 'The objective of this lab is give student practical experience of working of various algorithms for sorting, searching, insertion and matching and analyzes them.', '92e723dbf19a34f1f4ff', 'cse5081');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pq_bank`
--
ALTER TABLE `pq_bank`
  ADD PRIMARY KEY (`qid`),
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `q_bank`
--
ALTER TABLE `q_bank`
  ADD PRIMARY KEY (`qid`),
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `reg_users`
--
ALTER TABLE `reg_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `signin_log`
--
ALTER TABLE `signin_log`
  ADD PRIMARY KEY (`lid`),
  ADD UNIQUE KEY `lid` (`lid`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD PRIMARY KEY (`tcid`),
  ADD UNIQUE KEY `tcid` (`tcid`);

--
-- Indexes for table `t_bank`
--
ALTER TABLE `t_bank`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `tid` (`tid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
