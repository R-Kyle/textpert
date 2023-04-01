-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 09:22 AM
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
-- Database: `textpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `common_bot`
--

CREATE TABLE `common_bot` (
  `id` int(255) NOT NULL,
  `Intro_Message` varchar(255) NOT NULL,
  `System_Logo` longtext NOT NULL,
  `Mainline` varchar(255) NOT NULL,
  `Subline` varchar(255) NOT NULL,
  `Tagline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common_bot`
--

INSERT INTO `common_bot` (`id`, `Intro_Message`, `System_Logo`, `Mainline`, `Subline`, `Tagline`) VALUES
(1, 'Hello There I\'m Bot ! Welcome', 'tLogo.png', 'Artificial Intelligence for Programming Applications', 'An all-in-one platform to build and enhanced your coding skills', 'Empowering individuals to stand out with with their programming skills');

-- --------------------------------------------------------

--
-- Table structure for table `cplus`
--

CREATE TABLE `cplus` (
  `id` int(255) NOT NULL,
  `Queries` varchar(255) NOT NULL,
  `Replies` varchar(255) NOT NULL,
  `Sample_Code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cplus`
--

INSERT INTO `cplus` (`id`, `Queries`, `Replies`, `Sample_Code`) VALUES
(1, 'hi', 'Hello', 'printf(\"hello world\");'),
(3, '1312312', '1232312', 'print\'\'hello\'\''),
(4, '13123', '12312', '3123123'),
(5, '11111111', '111111111111111111', '111111111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` int(255) NOT NULL,
  `Post_Id` varchar(255) NOT NULL,
  `User_Id` varchar(255) NOT NULL,
  `Comment` longtext NOT NULL,
  `Code` longtext NOT NULL,
  `Comment_Date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `Post_Id`, `User_Id`, `Comment`, `Code`, `Comment_Date`) VALUES
(1, '1', '6', '123', '123', '2023-03-15 11:46:50'),
(2, '1', '6', '111', '1111', '2023-03-15 11:46:57'),
(3, '1', '6', '12321', '12312', '2023-03-15 11:51:38'),
(4, '1', '6', '123', '12312', '2023-03-15 11:54:49'),
(5, '1', '6', 'Sample ', 'Sample', '2023-03-15 11:54:59'),
(6, '1', '6', '12312', '123123', '2023-03-15 14:09:51'),
(7, '1', '6', 'Sample', 'Sample', '2023-03-15 14:10:03'),
(8, '1', '4', 'Sample', 'Sample', '2023-03-15 14:10:33'),
(9, '1', '4', '12312', '', '2023-03-15 14:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pageview`
--

CREATE TABLE `forum_pageview` (
  `id` int(255) NOT NULL,
  `Post_Id` int(255) NOT NULL,
  `User_Id` int(255) NOT NULL,
  `Date_View` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_pageview`
--

INSERT INTO `forum_pageview` (`id`, `Post_Id`, `User_Id`, `Date_View`) VALUES
(1, 1, 4, '2023-03-15 14:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `forum_post`
--

CREATE TABLE `forum_post` (
  `id` int(255) NOT NULL,
  `Title` longtext NOT NULL,
  `Category` longtext NOT NULL,
  `Content` longtext NOT NULL,
  `Sample_Code` longtext NOT NULL,
  `Date_Posted` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `Posted_By_Name` varchar(255) NOT NULL,
  `Posted_By_Id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_post`
--

INSERT INTO `forum_post` (`id`, `Title`, `Category`, `Content`, `Sample_Code`, `Date_Posted`, `Posted_By_Name`, `Posted_By_Id`) VALUES
(1, 'How To Create a Login Form in HTML?', 'PHP', 'Step 1) Add HTML:\nAdd an image inside a container and add inputs (with a matching label) for each field. Wrap a element around them to process the input. You can learn more about how to process input in our PHP tutorial.\n\nStep 2) Add CSS:', '// Include config file\nrequire_once \"config.php\";\n \n// Define variables and initialize with empty values\n$username = $password = $confirm_password = \"\";\n$username_err = $password_err = $confirm_password_err = \"\";\n \n// Processing form data when form is submitted\nif($_SERVER[\"REQUEST_METHOD\"] == \"POST\"){\n \n    // Validate username\n    if(empty(trim($_POST[\"username\"]))){\n        $username_err = \"Please enter a username.\";\n    } elseif(!preg_match(\'/^[a-zA-Z0-9_]+$/\', trim($_POST[\"username\"]))){\n        $username_err = \"Username can only contain letters, numbers, and underscores.\";\n    } else{\n        // Prepare a select statement\n        $sql = \"SELECT id FROM users WHERE username = ?\";\n        \n        if($stmt = mysqli_prepare($link, $sql)){\n            // Bind variables to the prepared statement as parameters\n            mysqli_stmt_bind_param($stmt, \"s\", $param_username);\n            \n            // Set parameters\n            $param_username = trim($_POST[\"username\"]);\n            \n            // Attempt to execute the prepared statement\n            if(mysqli_stmt_execute($stmt)){\n                /* store result */\n                mysqli_stmt_store_result($stmt);\n                \n                if(mysqli_stmt_num_rows($stmt) == 1){\n                    $username_err = \"This username is already taken.\";\n                } else{\n                    $username = trim($_POST[\"username\"]);\n                }\n            } else{\n                echo \"Oops! Something went wrong. Please try again later.\";\n            }\n\n            // Close statement\n            mysqli_stmt_close($stmt);\n        }\n    }\n    \n    // Validate password\n    if(empty(trim($_POST[\"password\"]))){\n        $password_err = \"Please enter a password.\";     \n    } elseif(strlen(trim($_POST[\"password\"])) < 6){\n        $password_err = \"Password must have atleast 6 characters.\";\n    } else{\n        $password = trim($_POST[\"password\"]);\n    }\n    \n    // Validate confirm password\n    if(empty(trim($_POST[\"confirm_password\"]))){\n        $confirm_password_err = \"Please confirm password.\";     \n    } else{\n        $confirm_password = trim($_POST[\"confirm_password\"]);\n        if(empty($password_err) && ($password != $confirm_password)){\n            $confirm_password_err = \"Password did not match.\";\n        }\n    }\n    \n    // Check input errors before inserting in database\n    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){\n        \n        // Prepare an insert statement\n        $sql = \"INSERT INTO users (username, password) VALUES (?, ?)\";\n         \n        if($stmt = mysqli_prepare($link, $sql)){\n            // Bind variables to the prepared statement as parameters\n            mysqli_stmt_bind_param($stmt, \"ss\", $param_username, $param_password);\n            \n            // Set parameters\n            $param_username = $username;\n            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash\n            \n            // Attempt to execute the prepared statement\n            if(mysqli_stmt_execute($stmt)){\n                // Redirect to login page\n                header(\"location: login.php\");\n            } else{\n                echo \"Oops! Something went wrong. Please try again later.\";\n            }\n\n            // Close statement\n            mysqli_stmt_close($stmt);\n        }\n    }\n    \n    // Close connection\n    mysqli_close($link);\n}', '2023-03-15 10:14:23', 'Josua Rhogel', '6');

-- --------------------------------------------------------

--
-- Table structure for table `javabot`
--

CREATE TABLE `javabot` (
  `id` int(255) NOT NULL,
  `Queries` varchar(255) NOT NULL,
  `Replies` longtext NOT NULL,
  `Sample_Code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `javabot`
--

INSERT INTO `javabot` (`id`, `Queries`, `Replies`, `Sample_Code`) VALUES
(2, 'for loop java ', 'Looping is continous display until the certain condition is met \r\nLooping is continous display until the certain condition is met \r\nLooping is continous display until the certain condition is met \r\nLooping is continous display until the certain condition is met \r\n', 'for (int i=0:i<=10:i++){\r\n     system.out.print(i);\r\n}'),
(15, 'Hello', 'Hello', 'system.out.println(\'Hello it\'s me Java\');'),
(16, 'Hello', '', 'hello'),
(17, 'Hello', '123', '123'),
(18, '13', '123123', '123123'),
(19, '12312', '12312', '31231'),
(20, '12312', '12312', '31231'),
(21, '12312', '12312', '31231'),
(22, '13123', '12312', '3123123'),
(23, '111111', '1111111111111111', '11111111111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `phpbot`
--

CREATE TABLE `phpbot` (
  `id` int(255) NOT NULL,
  `Queries` varchar(255) NOT NULL,
  `Replies` longtext NOT NULL,
  `Sample_Code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phpbot`
--

INSERT INTO `phpbot` (`id`, `Queries`, `Replies`, `Sample_Code`) VALUES
(4, 'Hi', 'Hello', 'echo \'Helloworld\';'),
(5, '1312312', '312312', '3123123'),
(6, '111111111', '1111111111111111', '111111111111111'),
(7, 'Hello', '1', '111echo \"hello world\"; ');

-- --------------------------------------------------------

--
-- Table structure for table `programming_description`
--

CREATE TABLE `programming_description` (
  `id` int(255) NOT NULL,
  `Language` varchar(255) NOT NULL,
  `Title_Description` longtext NOT NULL,
  `Description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programming_description`
--

INSERT INTO `programming_description` (`id`, `Language`, `Title_Description`, `Description`) VALUES
(1, 'Java', 'What is Java technology and why do I need it?', 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. It has evolved from humble beginnings to power a large share of today’s digital world, by providing the reliable platform upon which many services and applications are built. New, innovative products and digital services designed for the future continue to rely on Java, as well.\r\nWhile most modern Java applications combine the Java runtime and application together, there are still many applications and even some websites that will not function unless you have a desktop Java installed. Java.com, this website, is intended for consumers who may still require Java for their desktop applications – specifically applications targeting Java 8. Developers as well as users that would like to learn Java programming should visit the dev.java website instead and business users should visit oracle.com/java for more information.\r\n\r\n\r\nWhile most modern Java applications combine the Java runtime and application together, there are still many applications and even some websites that will not function unless you have a desktop Java installed. Java.com, this website, is intended for consumers who may still require Java for their desktop applications – specifically applications targeting Java 8. Developers as well as users that would like to learn Java programming should visit the dev.java website instead and business users should visit oracle.com/java for more information.\r\n'),
(3, 'PHP', 'What is PHP?', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.'),
(4, 'C++', 'What is C++?', 'C++ (pronounced \"C plus plus\") is a high-level general-purpose programming language created by Danish computer scientist Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\". The language has expanded significantly over time, and modern C++ now has object-oriented, generic, and functional features in addition to facilities for low-level memory manipulation. It is almost always implemented as a compiled language, and many vendors provide C++ compilers, including the Free Software Foundation, LLVM, Microsoft, Intel, Embarcadero, Oracle, and IBM, so it is available on many platforms.[13]'),
(5, 'Visual Basic', 'What is VB.Net?', 'VB.NET stands for Visual Basic.NET, and it is a computer programming language developed by Microsoft. It was first released in 2002 to replace Visual Basic 6. VB.NET is an object-oriented programming language. This means that it supports the features of object-oriented programming which include encapsulation, polymorphism, abstraction, and inheritance.'),
(12, 'C++', 'What is C++?', 'C++ is a cross-platform language that can be used to create high-performance applications.\r\n\r\nC++ was developed by Bjarne Stroustrup, as an extension to the C language.\r\n\r\nC++ gives programmers a high level of control over system resources and memory.\r\n\r\nThe language was updated 4 major times in 2011, 2014, 2017, and 2020 to C++11, C++14, C++17, C++20.'),
(13, 'C++', 'Why Use C++', 'C++ is one of the worlds most popular programming languages.\r\n\r\nC++ is portable and can be used to develop applications that can be adapted to multiple platforms.\r\n\r\nC++ is fun and easy to learn!\r\n\r\nAs C++ is close to C, C# and Java, it makes it easy for programmers to switch to C++ or vice versa.'),
(16, 'C++', '12312', '123123'),
(17, 'Java', '1231231', '2312312'),
(18, 'PHP', '12312', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `unanswered`
--

CREATE TABLE `unanswered` (
  `id` int(11) NOT NULL,
  `Programming_Language` varchar(255) NOT NULL,
  `unanswered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unanswered`
--

INSERT INTO `unanswered` (`id`, `Programming_Language`, `unanswered`) VALUES
(82, 'Java', 'hi'),
(83, 'Java', 'print'),
(84, 'Java', 'looping'),
(85, 'Java', 'hi'),
(86, 'Java', 'hi'),
(87, 'Java', 'Looping'),
(88, 'Java', 'Looping'),
(89, 'C++', 'afasfasd'),
(90, 'C++', 'dfaf'),
(91, 'C++', 'fasdfadsf'),
(92, 'C++', 'asdfasdf'),
(93, 'C++', 'sfasdf'),
(94, 'C++', 'hello'),
(95, 'Java', 'hi'),
(96, 'Java', '2434234234234234234234234234234244\'fasf\\afalf\\aslfaflalfas\\'),
(97, 'Java', '32423'),
(98, 'Java', 'hi'),
(99, 'Visual Basic', '3123'),
(100, 'PHP', '13123'),
(101, 'Java', '131231'),
(102, 'PHP', 'hh'),
(103, 'Visual Basic', 'hi'),
(104, 'Visual Basic', '313123'),
(105, 'Java', 'hi'),
(106, 'Java', 'looping'),
(107, 'PHP', 'loop'),
(108, 'Visual Basic', 'hi'),
(109, 'Visual Basic', 'hello'),
(110, 'Visual Basic', 'loop'),
(111, 'C++', 'loop'),
(112, 'C++', '423'),
(113, 'C++', 'hi'),
(114, 'C++', 'print'),
(115, 'C++', 'hello'),
(116, 'C++', 'hello'),
(117, 'C++', 'hello'),
(118, 'Java', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `Name`, `Username`, `Password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ProfilePhoto` varchar(255) NOT NULL,
  `Date_Registered` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `Fullname`, `Email_Address`, `Password`, `ProfilePhoto`, `Date_Registered`) VALUES
(4, 'Josua Rhogel Cuales', 'jrccuales@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Logoss.png', '2023-03-12 09:06:00'),
(6, 'Josua Rhogel', 'vsi.itfiles@gmail.com', '202cb962ac59075b964b07152d234b70', '284286816_1075155373351945_6914607821231176708_n.png', '2023-03-12 10:40:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `common_bot`
--
ALTER TABLE `common_bot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cplus`
--
ALTER TABLE `cplus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_pageview`
--
ALTER TABLE `forum_pageview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_post`
--
ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `javabot`
--
ALTER TABLE `javabot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phpbot`
--
ALTER TABLE `phpbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_description`
--
ALTER TABLE `programming_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unanswered`
--
ALTER TABLE `unanswered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `common_bot`
--
ALTER TABLE `common_bot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cplus`
--
ALTER TABLE `cplus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_pageview`
--
ALTER TABLE `forum_pageview`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `javabot`
--
ALTER TABLE `javabot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `phpbot`
--
ALTER TABLE `phpbot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programming_description`
--
ALTER TABLE `programming_description`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `unanswered`
--
ALTER TABLE `unanswered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
