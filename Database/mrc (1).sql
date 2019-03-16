-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2019 at 10:31 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `pid`) VALUES
(0, 'Country', 1),
(1, 'Egypt', 0),
(2, 'Cairo', 1),
(4, 'Alex', 1),
(5, 'England', 0);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(255) NOT NULL,
  `physicallink` varchar(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `linkname`, `physicallink`, `isdeleted`) VALUES
(1, 'RESERVATION', 'reservation.php', 'false'),
(2, 'ADMIN PANEL', 'adminPanel.php', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `radiology`
--

DROP TABLE IF EXISTS `radiology`;
CREATE TABLE IF NOT EXISTS `radiology` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiology`
--

INSERT INTO `radiology` (`ID`, `Name`, `price`, `isdeleted`) VALUES
(1, 'PET', 300, 'false'),
(2, 'CT', 100, 'false'),
(3, 'XRay', 150, 'false'),
(4, 'UV-Ray', 400, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `reservationdetails`
--

DROP TABLE IF EXISTS `reservationdetails`;
CREATE TABLE IF NOT EXISTS `reservationdetails` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ReserveID` int(255) NOT NULL,
  `RadiologyID` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`),
  KEY `RID` (`ReserveID`),
  KEY `PID` (`RadiologyID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationdetails`
--

INSERT INTO `reservationdetails` (`ID`, `ReserveID`, `RadiologyID`, `quantity`, `isdeleted`) VALUES
(2, 3, 1, 1, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

DROP TABLE IF EXISTS `reserve`;
CREATE TABLE IF NOT EXISTS `reserve` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `PatientID` int(255) NOT NULL,
  `DoctorID` int(255) NOT NULL,
  `Date` datetime(6) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`),
  KEY `PID` (`PatientID`),
  KEY `DID` (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ID`, `PatientID`, `DoctorID`, `Date`, `isdeleted`) VALUES
(3, 1, 5, '2018-10-23 20:40:00.000000', 'false'),
(4, 7, 8, '2019-03-14 12:59:00.000000', 'false'),
(5, 7, 8, '2019-03-14 12:59:00.000000', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

DROP TABLE IF EXISTS `static`;
CREATE TABLE IF NOT EXISTS `static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(60000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`id`, `content`) VALUES
(1, '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <!-- Required Meta Tags -->\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\r\n\r\n    <!-- Page Title -->\r\n    <title>About</title>\r\n\r\n    <!-- Favicon -->\r\n    <link rel=\"shortcut icon\" href=\"assets/images/logo/favicon.png\" type=\"image/x-icon\">\r\n\r\n    <!-- CSS Files -->\r\n    <link rel=\"stylesheet\" href=\"assets/css/animate-3.7.0.css\">\r\n    <link rel=\"stylesheet\" href=\"assets/css/font-awesome-4.7.0.min.css\">\r\n    <link rel=\"stylesheet\" href=\"assets/css/bootstrap-4.1.3.min.css\">\r\n    <link rel=\"stylesheet\" href=\"assets/css/owl-carousel.min.css\">\r\n    <link rel=\"stylesheet\" href=\"assets/css/jquery.datetimepicker.min.css\">\r\n    <link rel=\"stylesheet\" href=\"assets/css/linearicons.css\">\r\n    <link rel=\"stylesheet\" href=\"assets/css/style.css\">\r\n</head>\r\n<body>\r\n    <!-- Preloader Starts -->\r\n    <div class=\"preloader\">\r\n        <div class=\"spinner\"></div>\r\n    </div>\r\n    <!-- Preloader End -->\r\n\r\n    <!-- Header Area Starts -->\r\n    <header class=\"header-area\">\r\n        <div class=\"header-top\">\r\n            <div class=\"container\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-lg-9 d-md-flex\">\r\n                        <h6 class=\"mr-3\"><span class=\"mr-2\"><i class=\"fa fa-mobile\"></i></span> call us now! +1 305 708 2563</h6>\r\n                        <h6 class=\"mr-3\"><span class=\"mr-2\"><i class=\"fa fa-envelope-o\"></i></span> medical@example.com</h6>\r\n                        <h6><span class=\"mr-2\"><i class=\"fa fa-map-marker\"></i></span> Find our Location</h6>\r\n                    </div>\r\n                    <div class=\"col-lg-3\">\r\n                        <div class=\"social-links\">\r\n                            <ul>\r\n                                <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-instagram\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-vimeo\"></i></a></li>\r\n                            </ul>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div id=\"header\" id=\"home\">\r\n            <div class=\"container\">\r\n                <div class=\"row align-items-center justify-content-between d-flex\">\r\n                <div id=\"logo\">\r\n                    <a href=\"index.html\"><img src=\"assets/images/logo/logo.png\" alt=\"\" title=\"\" /></a>\r\n                </div>\r\n                <nav id=\"nav-menu-container\">\r\n                    <ul class=\"nav-menu\">\r\n                        <li class=\"menu-active\"><a href=\"index.html\">Home</a></li>\r\n                        <li><a href=\"departments.html\">departments</a></li>\r\n                        <li><a href=\"doctors.html\">doctors</a></li>\r\n                        <li class=\"menu-has-children\"><a href=\"\">Pages</a>\r\n                            <ul>\r\n                                <li><a href=\"about.html\">about us</a></li>\r\n                                <li><a href=\"elements.html\">elements</a></li>\r\n                            </ul>\r\n                        </li>\r\n                        <li class=\"menu-has-children\"><a href=\"\">blog</a>\r\n                            <ul>\r\n                                <li><a href=\"blog-home.html\">blog home</a></li>\r\n                                <li><a href=\"blog-details.html\">blog details</a></li>\r\n                            </ul>\r\n                        </li>\r\n                        <li><a href=\"contact.html\">Contact</a></li>			          				          \r\n                    </ul>\r\n                </nav><!-- #nav-menu-container -->		    		\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </header>\r\n    <!-- Header Area End -->\r\n\r\n    <!-- Banner Area Starts -->\r\n    <section class=\"banner-area other-page\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-12\">\r\n                    <h1>About Us</h1>\r\n                    <a href=\"index.html\">Home</a> <span>|</span> <a href=\"about.html\">About Us</a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Banner Area End -->\r\n\r\n    <!-- Welcome Area Starts -->\r\n    <section class=\"welcome-area section-padding\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-5 align-self-center\">\r\n                    <div class=\"welcome-img\">\r\n                        <img src=\"assets/images/welcome.png\" alt=\"\">\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-7\">\r\n                    <div class=\"welcome-text mt-5 mt-lg-0\">\r\n                        <h2>Welcome to our clinic</h2>\r\n                        <p class=\"pt-3\">Subdue whales void god which living don\'t midst lesser yielding over lights whose. Cattle greater brought sixth fly den dry good tree isn\'t seed stars were.</p>\r\n                        <p>Subdue whales void god which living don\'t midst lesser yielding over lights whose. Cattle greater brought sixth fly den dry good tree isn\'t seed stars were the boring.</p>\r\n                        <a href=\"#\" class=\"template-btn mt-3\">learn more</a>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Welcome Area End -->\r\n\r\n    <!-- Patient Area Starts -->\r\n    <section class=\"patient-area section-padding3\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6 offset-lg-3\">\r\n                    <div class=\"section-top text-center\">\r\n                        <h2>Patient are saying</h2>\r\n                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link available in the service for subdue fruit.</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-5\">\r\n                    <div class=\"single-patient mb-4\">\r\n                        <img src=\"assets/images/patient1.png\" alt=\"\">\r\n                        <h3>daren jhonson</h3>\r\n                        <h5>hp specialist</h5>\r\n                        <p class=\"pt-3\">Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora cursus hendrerit bib elit Tempus inceptos posuere metus.</p>\r\n                    </div>\r\n                    <div class=\"single-patient\">\r\n                        <img src=\"assets/images/patient2.png\" alt=\"\">\r\n                        <h3>black heiden</h3>\r\n                        <h5>hp specialist</h5>\r\n                        <p class=\"pt-3\">Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora cursus hendrerit bib elit Tempus inceptos posuere metus.</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-5 offset-lg-1 align-self-center\">\r\n                    <div class=\"appointment-form text-center mt-5 mt-lg-0\">\r\n                        <h3 class=\"mb-5\">appointment now</h3>\r\n                        <form action=\"#\">\r\n                            <div class=\"form-group\">\r\n                                <input type=\"text\" placeholder=\"Your Name\" onfocus=\"this.placeholder = \'\'\" onblur=\"this.placeholder = \'Your Name\'\" required>\r\n                            </div>\r\n                            <div class=\"form-group\">\r\n                                <input type=\"email\" placeholder=\"Your Email\" onfocus=\"this.placeholder = \'\'\" onblur=\"this.placeholder = \'Your Email\'\" required> \r\n                            </div>\r\n                            <div class=\"form-group\">\r\n                                <input type=\"text\" id=\"datepicker\" placeholder=\"Date\" onfocus=\"this.placeholder = \'\'\" onblur=\"this.placeholder = \'Date\'\" required>\r\n                            </div>\r\n                            <div class=\"form-group\">\r\n                                <textarea name=\"message\" cols=\"20\" rows=\"7\"  placeholder=\"Message\" onfocus=\"this.placeholder = \'\'\" onblur=\"this.placeholder = \'Message\'\" required></textarea>\r\n                            </div>\r\n                            <a href=\"#\" class=\"template-btn\">appointment now</a>\r\n                        </form>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n    <!-- Patient Area Starts -->\r\n    \r\n    <!-- Footer Area Starts -->\r\n    <footer class=\"footer-area section-padding\">\r\n        <div class=\"footer-widget\">\r\n            <div class=\"container\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-xl-2 col-lg-3\">\r\n                        <div class=\"single-widget-home mb-5 mb-lg-0\">\r\n                            <h3 class=\"mb-4\">top products</h3>\r\n                            <ul>\r\n                                <li class=\"mb-2\"><a href=\"#\">managed website</a></li>\r\n                                <li class=\"mb-2\"><a href=\"#\">managed reputation</a></li>\r\n                                <li class=\"mb-2\"><a href=\"#\">power tools</a></li>\r\n                                <li><a href=\"#\">marketing service</a></li>\r\n                            </ul>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"col-xl-5 offset-xl-1 col-lg-6\">\r\n                        <div class=\"single-widget-home mb-5 mb-lg-0\">\r\n                            <h3 class=\"mb-4\">newsletter</h3>\r\n                            <p class=\"mb-4\">You can trust us. we only send promo offers, not a single.</p>  \r\n                            <form action=\"#\">\r\n                                <input type=\"email\" placeholder=\"Your email here\" onfocus=\"this.placeholder = \'\'\" onblur=\"this.placeholder = \'Your email here\'\" required>\r\n                                <button type=\"submit\" class=\"template-btn\">subscribe now</button>\r\n                            </form>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"col-xl-3 offset-xl-1 col-lg-3\">\r\n                        <div class=\"single-widge-home\">\r\n                            <h3 class=\"mb-4\">instagram feed</h3>\r\n                            <div class=\"feed\">\r\n                                <img src=\"assets/images/feed1.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed2.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed3.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed4.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed5.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed6.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed7.jpg\" alt=\"feed\">\r\n                                <img src=\"assets/images/feed8.jpg\" alt=\"feed\">\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"footer-copyright\">\r\n            <div class=\"container\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-lg-8 col-md-6\">\r\n                        <span>\r\n<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->\r\nCopyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> by <a href=\"https://colorlib.com\" target=\"_blank\">Colorlib</a>\r\n<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->\r\n</span>\r\n                    </div>\r\n                    <div class=\"col-lg-4 col-md-6\">\r\n                        <div class=\"social-icons\">\r\n                            <ul>\r\n                                <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-dribbble\"></i></a></li>\r\n                                <li><a href=\"#\"><i class=\"fa fa-behance\"></i></a></li>\r\n                            </ul>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </footer>\r\n    <!-- Footer Area End -->\r\n\r\n\r\n    <!-- Javascript -->\r\n    <script src=\"assets/js/vendor/jquery-2.2.4.min.js\"></script>\r\n	<script src=\"assets/js/vendor/bootstrap-4.1.3.min.js\"></script>\r\n    <script src=\"assets/js/vendor/wow.min.js\"></script>\r\n    <script src=\"assets/js/vendor/owl-carousel.min.js\"></script>\r\n    <script src=\"assets/js/vendor/jquery.datetimepicker.full.min.js\"></script>\r\n    <script src=\"assets/js/vendor/jquery.nice-select.min.js\"></script>\r\n    <script src=\"assets/js/vendor/superfish.min.js\"></script>\r\n    <script src=\"assets/js/main.js\"></script>\r\n\r\n\r\n</body>\r\n</html>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `socialnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertypeid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `addressid` int(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `addressid` (`addressid`),
  KEY `UTID` (`usertypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `socialnumber`, `password`, `usertypeid`, `username`, `dob`, `addressid`, `isdeleted`) VALUES
(1, 'Mohamed', 'Radrod', 'reda@reda.com', '123456789', '123', 2, 'Mreda', '1998-09-23', 2, 'false'),
(2, 'Sherif', 'Nayad', 'reda@reda.com', '987654321', 'admin', 1, 'admin', '1998-10-25', 2, 'false'),
(3, 'Omar', 'Anas', 'Email@email.com', '123431', 'omar', 2, 'oanas', '1997-11-29', 2, 'true'),
(4, 'Alley', 'Dorry', 'Email@email.com', '748394827', '123', 2, 'Dorry3', '1997-09-22', 2, 'false'),
(5, 'Mohamed', 'Abo El Rejal', 'email@email.com', '134983', '123', 3, 'MA', '2010-02-13', 2, 'false'),
(6, 'Ahmed', 'Reda', 'Email@email.com', '123431', '123', 2, 'areda', '1996-03-04', 2, 'false'),
(7, 'Karim', 'Dorry', 'Email@email.com', '73894857481', '123', 2, 'kdorry', '2006-10-23', 4, 'false'),
(8, 'Sherif', 'Dorry', 'email@email.com', '87654131', '123', 3, 'sdorry', '1992-01-01', 4, 'false'),
(9, 'Karim', 'Karim', 'Email@email.com', '34565432', '123', 2, 'kdorry', '1987-02-03', 4, 'false'),
(10, 'Mego', 'Cena', 'Email@email.com', '1235431', '123', 2, 'mCena', '1992-10-28', 4, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `useroptions`
--

DROP TABLE IF EXISTS `useroptions`;
CREATE TABLE IF NOT EXISTS `useroptions` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useroptions`
--

INSERT INTO `useroptions` (`id`, `name`, `type`, `isdeleted`) VALUES
(1, 'working_hours', 'number', 'false'),
(2, 'Field', 'text', 'false'),
(4, 'Salary', 'number', 'true'),
(5, 'Bonus', 'number', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `useropvalue`
--

DROP TABLE IF EXISTS `useropvalue`;
CREATE TABLE IF NOT EXISTS `useropvalue` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `userTyOpId` int(30) NOT NULL,
  `userId` int(30) NOT NULL,
  `value` varchar(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `userTyOpId` (`userTyOpId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useropvalue`
--

INSERT INTO `useropvalue` (`id`, `userTyOpId`, `userId`, `value`, `isdeleted`) VALUES
(1, 1, 5, '10', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`, `isdeleted`) VALUES
(1, 'Admin', 'false'),
(2, 'Patient', 'false'),
(3, 'doctor', 'false'),
(6, 'Janitor', 'false'),
(10, 'Receptionist', 'false'),
(11, 'intern', 'true'),
(12, 'Diseased', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `usertypelinks`
--

DROP TABLE IF EXISTS `usertypelinks`;
CREATE TABLE IF NOT EXISTS `usertypelinks` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `typeid` int(255) NOT NULL,
  `linkid` int(255) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `LID` (`linkid`),
  KEY `TID` (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypelinks`
--

INSERT INTO `usertypelinks` (`id`, `typeid`, `linkid`, `isdeleted`) VALUES
(1, 2, 1, 'false'),
(2, 1, 2, 'true'),
(3, 3, 1, 'false'),
(4, 10, 1, 'false'),
(5, 11, 2, 'false'),
(8, 12, 1, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `usertypeoptions`
--

DROP TABLE IF EXISTS `usertypeoptions`;
CREATE TABLE IF NOT EXISTS `usertypeoptions` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `userTypeId` int(30) NOT NULL,
  `optionsId` int(30) NOT NULL,
  `isdeleted` varchar(255) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `optionsId` (`optionsId`),
  KEY `userTypeId` (`userTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypeoptions`
--

INSERT INTO `usertypeoptions` (`id`, `userTypeId`, `optionsId`, `isdeleted`) VALUES
(1, 3, 1, 'false'),
(2, 3, 2, 'false'),
(3, 6, 1, 'false');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD CONSTRAINT `reservationdetails_ibfk_1` FOREIGN KEY (`ReserveID`) REFERENCES `reserve` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservationdetails_ibfk_2` FOREIGN KEY (`RadiologyID`) REFERENCES `radiology` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`usertypeid`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `useropvalue`
--
ALTER TABLE `useropvalue`
  ADD CONSTRAINT `useropvalue_ibfk_1` FOREIGN KEY (`userTyOpId`) REFERENCES `usertypeoptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `useropvalue_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  ADD CONSTRAINT `usertypelinks_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertypelinks_ibfk_2` FOREIGN KEY (`linkid`) REFERENCES `links` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertypeoptions`
--
ALTER TABLE `usertypeoptions`
  ADD CONSTRAINT `usertypeoptions_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertypeoptions_ibfk_2` FOREIGN KEY (`optionsId`) REFERENCES `useroptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
