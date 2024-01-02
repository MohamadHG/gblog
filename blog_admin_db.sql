-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 11:05 PM
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
-- Database: `blog_admin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminEmail` varchar(150) NOT NULL,
  `adminPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminEmail`, `adminPass`) VALUES
('mohamad@gmail.com', '123456789'),
('sara@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fId` int(255) NOT NULL,
  `fUsername` varchar(255) NOT NULL,
  `fEmail` varchar(255) NOT NULL,
  `fMsg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fId`, `fUsername`, `fEmail`, `fMsg`) VALUES
(1, 'Jason ', 'mohd@gmail.com', 'test message ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Pid` int(150) NOT NULL,
  `title` varchar(50) NOT NULL,
  `article` mediumtext NOT NULL,
  `imag` varchar(70) NOT NULL,
  `PublishedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Pid`, `title`, `article`, `imag`, `PublishedDate`) VALUES
(20, 'The Impact of Artificial Intelligence on Web Devel', 'The rapid advancements in Artificial Intelligence (AI) have significantly influenced the field of web development. From personalized user experiences to automated testing, this article explores the various ways AI is shaping the future of web development.\r\n\r\nThe utilization of machine learning algorithms enhances website functionality, providing tailored content and recommendations based on user behavior. Additionally, AI-driven chatbots are revolutionizing customer interactions, offering real-time assistance and improving user engagement.\r\n\r\nDespite the positive aspects, challenges such as ethical considerations and potential biases in AI models must be addressed. Developers need to strike a balance between harnessing the power of AI and ensuring responsible and fair use in web development.\r\n\r\nIn conclusion, the integration of AI in web development is inevitable. Developers should embrace this technological shift, understanding its potential benefits while being vigilant about ethical concerns.', 'Art3.jpg', '2023-12-27'),
(21, 'The In-Depth Evolution of JavaScript: A Comprehens', 'JavaScript, the cornerstone of web development, has undergone a profound evolution with the introduction of ECMAScript 6 (ES6) and subsequent versions. This comprehensive guide explores the intricate features of ES6 and delves into its enduring impact on modern JavaScript development, providing developers with a thorough understanding of the language\'s evolution.\r\n\r\nES6 introduces a plethora of features, including arrow functions, template literals, and destructuring, which enhance code readability and reduce boilerplate. The incorporation of classes and modules brings structural improvements, making JavaScript applications more maintainable and scalable.\r\n\r\nFurthermore, ES6 serves as a precursor to subsequent ECMAScript versions, paving the way for innovative features. Notable additions like async/await simplify asynchronous programming, presenting a more elegant solution compared to traditional callback patterns.\r\n\r\nIn conclusion, staying abreast of JavaScript\'s evolution, especially with ES6 and beyond, is paramount for developers aiming to unlock the language\'s full potential. This guide equips developers with the knowledge needed to create efficient, maintainable, and future-proof JavaScript code.', 'js.jpg', '2023-12-27'),
(22, 'Responsive Design Mastery: Navigating Strategies', 'Responsive design stands as a cornerstone of web development, ensuring a seamless user experience across diverse devices and browsers. This expansive guide navigates through advanced strategies for achieving cross-browser compatibility, empowering developers to master the art of responsive design.\r\n\r\nAdopting a mobile-first approach, where design commences with the smallest screens and progressively scales for larger devices, lays a robust foundation for cross-browser compatibility. This approach ensures a solid framework that adapts gracefully across various browsers and devices.\r\n\r\nRigorous testing across multiple browsers and devices is imperative to identify and rectify compatibility issues proactively. Leveraging browser developer tools and online testing services empowers developers to pinpoint and address issues before reaching end-users.\r\n\r\nAdditionally, embracing modern CSS techniques such as flexbox and grid layout simplifies the creation of responsive designs. These tools provide developers with greater control over layout and positioning, facilitating seamless adaptation to diverse screen sizes.\r\n\r\nIn conclusion, mastery of responsive design demands a nuanced amalgamation of strategic approaches, meticulous testing, and the adept utilization of modern CSS techniques. Prioritizing cross-browser compatibility enables developers to craft web applications that deliver a consistently exceptional experience to users.', 'Art4.jpg', '2023-12-27'),
(23, 'Revolutionizing User Experiences: The Ascendancy o', 'Progressive Web Apps (PWAs) have emerged as a revolutionary paradigm in web development, bridging the gap between traditional web applications and native mobile experiences. This expansive exploration delves into the key features of PWAs and their profound impact on user engagement and overall web development.\r\n\r\nPWAs leverage service workers to impart offline functionality, allowing users to access content seamlessly even without an active internet connection. This transformative feature elevates user experience by ensuring continuous engagement, irrespective of connectivity challenges.\r\n\r\nThe concept of \"installability\" is pivotal to PWAs, enabling users to add them to their device\'s home screen without the need for traditional app store installations. This streamlined process contributes to increased user adoption, retention, and a frictionless onboarding experience.\r\n\r\nFurthermore, the integration of push notifications augments user engagement by keeping them informed about updates and relevant content. Combined with swift loading times, this feature-rich environment provides users with an app-like experience directly through the web.\r\n\r\nIn conclusion, the ascendancy of Progressive Web Apps signifies a paradigm shift toward dynamic and engaging user experiences. Developers are encouraged to explore the vast potential of PWAs to create applications that seamlessly blend the best attributes of web and native apps.', 'Art2.jpg', '2023-12-27'),
(24, 'Navigating the Debugging Landscape: Advanced Techn', 'Debugging stands as an indispensable facet of the software development process, and JavaScript developers encounter distinctive challenges in their debugging endeavors. This comprehensive guide offers an in-depth exploration of advanced debugging techniques, empowering developers to navigate the debugging landscape with finesse.\r\n\r\nLeveraging browser developer tools serves as a fundamental pillar of effective JavaScript debugging. Developers gain the ability to set breakpoints, inspect variables, and step through code execution, providing invaluable insights to identify and rectify issues systematically.\r\n\r\nConsole logging emerges as a simple yet potent technique for gaining a granular understanding of code execution flow. Thoughtfully placed log statements facilitate developers in tracing the logic of their programs, making it easier to identify and troubleshoot potential bugs.\r\n\r\nSource maps assume a pivotal role in debugging minified or transpiled code. By generating and deploying source maps, developers can debug the original source code, simplifying the debugging process and ensuring the identification of issues with precision.\r\n\r\nIn conclusion, mastery of advanced debugging techniques is imperative for JavaScript developers aiming to expedite issue identification and resolution. By seamlessly integrating browser developer tools, console logging strategies, and judicious use of source maps, developers can streamline their debugging workflow and deliver robust applications with confidence.', 'Art1.jpg', '2023-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `Sid` int(150) NOT NULL,
  `SEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`Sid`, `SEmail`) VALUES
(1, 'sara@gmail.com'),
(2, 'mohammad@hotmail.com'),
(3, 'lara@gmail.com'),
(4, 'majid@outlook.com'),
(5, 'mostafa@gmail.com'),
(6, 'hadi@gmail.com'),
(10, 'conoer@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`Sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Pid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `Sid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
