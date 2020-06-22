-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2019 at 08:23 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secure_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `sa_categories`
--

CREATE TABLE `sa_categories` (
  `catID` int(11) UNSIGNED NOT NULL,
  `catTitle` varchar(255) DEFAULT NULL,
  `catSlug` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sa_categories`
--

INSERT INTO `sa_categories` (`catID`, `catTitle`, `catSlug`) VALUES
(5, 'jQuery', 'jquery'),
(4, 'PHP', 'php'),
(8, 'AngularJS', 'angularjs');

-- --------------------------------------------------------

--
-- Table structure for table `sa_posts`
--

CREATE TABLE `sa_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postSlug` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_posts`
--

INSERT INTO `sa_posts` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postDate`, `image`) VALUES
(7, 'Google Two Factor Authentication Sign In and Join', 'google-two-factor-authentication-sign-in-and-join', '<p>Hi, friends in this post I show you how to do google two-factor authentication sign in and join now using jQuery, PHP &amp; MySQL. Two-factor authentication using Google Authenticator App for Android or iPhone. You having the problem with hackers for your password.</p>', '<p>Hi, friends in this post I show you how to do google two-factor authentication sign in and join now using jQuery, PHP &amp; MySQL. Two-factor authentication using Google Authenticator App for Android or iPhone. You having the problem with hackers for your password.</p>\r\n<p>Then the two-step verification can defend from abuse of your account if someone having your password, since signing into your account regularly you need a verification code this verification code is different created for your account, by scanning QR code from your mobile Google Authenticator App, a different code is sent to your Google Authentication App for every 40-50 seconds.</p>\r\n<p>In the next step, you enter your password with two-step verification, we can keep our account high securely with both password &amp; google authentication code. Add this two-factor authentication to secure your account much stronger.</p>', '2018-05-30 19:27:59', 'Google-Two-Factor-Authentication-Sign-In-and-Join-Now-using-jQuery-PHP-MySQL.jpg'),
(8, 'Send an E-mail with PHP using Gmail SMTP Server', 'send-an-e-mail-with-php-using-gmail-smtp-server', '<p>Hello, friends In this tutorial We&rsquo;re going to learn how we can send an e-mail with PHP using Gmail SMTP server. SMTP is also known&hellip;</p>', '<p>Hello, friends In this tutorial We&rsquo;re going to learn how we can send an e-mail with PHP using Gmail SMTP server. SMTP is also known as Simple Mail Transfer Protocol. SMTP is an internet standard for electronic mail. Each mail servers and other mail transfer agencies use SMTP to send and receive emails. Now we take a look at the PHPMailer library and we&rsquo;re going to use. You can take this library as an option to mail() function in PHP.</p>', '2018-06-01 21:01:15', 'Send-an-E-mail-with-PHP-using-Gmail-SMTP.jpg'),
(9, 'Ajax Drag And Drop Online Shopping Cart Using jQuery & PHP', 'ajax-drag-and-drop-online-shopping-cart-using-jquery-php', '<p>In this tutorial, we going to see how to create Ajax drag and drop online shopping cart using jQuery &amp; PHP. It is easy but&hellip;</p>', '<p>In this tutorial, we going to see how to create Ajax drag and drop online shopping cart using jQuery &amp; PHP. It is easy but also very useful for online shopping system that you can include in your E-commerce website. If you like to create easy online shopping website the drag and drop cart system is really useful for online shopping websites something the user needs or wish he can just drag and drop into the shopping cart. Shopping cart is a number of items that the user needs to buy. It has the complete record of items the user wants ahead of the last payment.</p>\r\n<p>&nbsp;</p>', '2018-06-02 17:59:59', 'ajax_drag_and_drop_onlineshopping.jpg'),
(11, 'Online Shopping Cart Using jQuery & PHP', 'online-shopping-cart-using-jquery-php', '<p>In this tutorial, we going to see how to create Ajax drag and drop online shopping cart using jQuery &amp; PHP. It is easy but also very useful for online shopping system that you can include in your E-commerce website. If you like to create easy online shopping website the drag and drop cart system is really useful for online shopping websites something the user needs or wish he can just drag and drop into the shopping cart. Shopping cart is a number of items that the user needs to buy. It has the complete record of items the user wants ahead of the last payment.</p>\r\n<p>&nbsp;</p>', '<p>In this tutorial, we going to see how to create Ajax drag and drop online shopping cart using jQuery &amp; PHP. It is easy but also very useful for online shopping system that you can include in your E-commerce website. If you like to create easy online shopping website the drag and drop cart system is really useful for online shopping websites something the user needs or wish he can just drag and drop into the shopping cart. Shopping cart is a number of items that the user needs to buy. It has the complete record of items the user wants ahead of the last payment.</p>\r\n<h2>Ajax Drag And Drop Online Shopping Cart Using jQuery &amp; PHP | Part &ndash; 1</h2>\r\n<div class=\"su-youtube su-responsive-media-yes\"><iframe src=\"http://www.youtube.com/embed/SQEElkEkLS0?autohide=2&amp;autoplay=0&amp;mute=0&amp;controls=1&amp;fs=1&amp;loop=0&amp;modestbranding=0&amp;playlist=https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbpKBKbb1iN7LZKnEY0yFH5ESQTvmdA36&amp;rel=1&amp;showinfo=1&amp;theme=dark&amp;wmode=&amp;playsinline=0\" width=\"600\" height=\"400\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n<h2>Ajax Drag And Drop Online Shopping Cart Using jQuery &amp; PHP | Part &ndash; 2</h2>\r\n<div class=\"su-youtube su-responsive-media-yes\"><iframe src=\"http://www.youtube.com/embed/hkjhQsF4qAI?autohide=2&amp;autoplay=0&amp;mute=0&amp;controls=1&amp;fs=1&amp;loop=0&amp;modestbranding=0&amp;playlist=https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbpKBKbb1iN7LZKnEY0yFH5ESQTvmdA36&amp;rel=1&amp;showinfo=1&amp;theme=dark&amp;wmode=&amp;playsinline=0\" width=\"600\" height=\"400\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n<h2>Ajax Drag And Drop Online Shopping Cart Using jQuery &amp; PHP | Part &ndash; 3</h2>\r\n<div class=\"su-youtube su-responsive-media-yes\"><iframe src=\"http://www.youtube.com/embed/nkLLG9KLOHI?autohide=2&amp;autoplay=0&amp;mute=0&amp;controls=1&amp;fs=1&amp;loop=0&amp;modestbranding=0&amp;playlist=https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbpKBKbb1iN7LZKnEY0yFH5ESQTvmdA36&amp;rel=1&amp;showinfo=1&amp;theme=dark&amp;wmode=&amp;playsinline=0\" width=\"600\" height=\"400\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>&nbsp;</div>', '2018-06-03 20:03:07', 'ajax_drag_and_drop_onlineshopping.jpg'),
(13, 'OnClick Insert Radio Button value into Database using PDO in Jquery Ajax PHP', 'onclick-insert-radio-button-value-into-database-using-pdo-in-jquery-ajax-php', '<p>Hi, Friends in this tutorial I show you how to insert data into MySQL database table using PHP PDO (PHP Data Object). Using Radio button&hellip;</p>\r\n<p><span style=\"color: #181818; font-family: geomanist, system; font-size: 16px; letter-spacing: 0.1px;\">&nbsp;</span></p>', '<p>Hi, Friends in this tutorial I show you how to insert data into MySQL database table using PHP PDO (PHP Data Object). Using Radio button I am going to insert values in the database. PDO helps named parameters, which makes the instant statements easier to read and understand for maintenance. MySQL only helps interrogation point as placeholders in prepared statements. You can handle all errors with one simple try/catch statement, which is way more easy to read than the procedural MySQL way.</p>\r\n<p>&nbsp;</p>', '2018-06-04 20:08:00', 'pdo_in_PHP-1.jpg'),
(14, 'PHP If else & elseif', 'php-if-else-elseif', '<p>Similar most programming languages, PHP also allows you to write code that does different actions based on the decisions of a logical or comparable test conditions at run time. That means you can create test conditions in the form of expressions that decides to either true or false and based on those results you can do specific actions. You can improve the decision making process by giving an alternative option through adding an else statement to the if statement. The if&hellip;else statement enables you to execute one section of code if the detailed condition evaluates to true and another section of code if it is decided to false.</p>\r\n<p>&nbsp;</p>', '<p>Similar most programming languages, PHP also allows you to write code that does different actions based on the decisions of a logical or comparable test conditions at run time. That means you can create test conditions in the form of expressions that decides to either true or false and based on those results you can do specific actions. You can improve the decision making process by giving an alternative option through adding an else statement to the if statement. The if&hellip;else statement enables you to execute one section of code if the detailed condition evaluates to true and another section of code if it is decided to false.</p>\r\n<p>&nbsp;</p>', '2018-06-04 20:12:17', 'PHP-If-else-elseif.jpg'),
(19, 'Ajax & jQuery â€“ Cascading DropDownList using JSON', 'ajax-jquery-cascading-dropdownlist-using-json', '<p>Hi, friends in this post I show you how to make Ajax &amp; jQuery cascading DropDownList using JSON. The subordinate select box will be a needed functionality if there is a dependency between options of the select box lists.&nbsp;</p>', '<p>Hi, friends in this post I show you how to make Ajax &amp; jQuery cascading DropDownList using JSON. The subordinate select box will be a needed functionality if there is a dependency between options of the select box lists. Subordinate drop-down list box when we have select in parent select box then it will allow to refresh child select box data without a refresh of the web page. In this post, we have used JSON to store the data for fill parent and child select box and in that file, we have to give the link between parent data with child. We will use Ajax jQuery for fetch data from JSON and filled parent select box.</p>\r\n<form id=\"edd_purchase_2290\" class=\"edd_download_purchase_form edd_purchase_2290\" method=\"post\">\r\n<div class=\"edd_purchase_submit_wrapper\"><a class=\"edd-add-to-cart button blue edd-submit edd-has-js\" href=\"http://softaox.info/ajax-jquery-cascading-dropdownlist-using-json/\" data-nonce=\"2bf34900b1\" data-action=\"edd_add_to_cart\" data-download-id=\"2290\" data-variable-price=\"no\" data-price-mode=\"single\" data-price=\"0.00\"><span class=\"edd-add-to-cart-label\">Free&nbsp;&ndash;&nbsp;Download</span></a></div>\r\n</form>', '2018-06-04 20:21:39', 'Ajax-jQuery-Cascading-DropDownList-using-JSON.jpg'),
(20, 'How to Create a Calculator with AngularJS', 'how-to-create-a-calculator-with-angularjs', '<p>In this tutorial, we going to see how to create a calculator with AngularJS. AngularJS is a JavaScript framework it helps to create powerful web applications and reduce your website or application load capacity. AngularJS provides&nbsp;Data-binding,&nbsp;MVC architecture&nbsp;and much more options.</p>', '<p>In this tutorial, we going to see how to create a calculator with AngularJS. AngularJS is a JavaScript framework it helps to create powerful web applications and reduce your website or application load capacity. AngularJS provides&nbsp;Data-binding,&nbsp;MVC architecture&nbsp;and much more options.</p>\r\n<p>Using&nbsp;HTML,&nbsp;CSS, and&nbsp;AngularJS&nbsp;below you can see&nbsp;Preview&nbsp;for the stylish calculator. There is a built-in function for the calculator in AngularJS that help to minimize the code.</p>\r\n<p>In this tutorial, we going to see how to create a calculator with AngularJS. AngularJS is a JavaScript framework it helps to create powerful web applications and reduce your website or application load capacity. AngularJS provides&nbsp;Data-binding,&nbsp;MVC architecture&nbsp;and much more options.</p>\r\n<p>Using&nbsp;HTML,&nbsp;CSS, and&nbsp;AngularJS&nbsp;below you can see&nbsp;Preview&nbsp;for the stylish calculator. There is a built-in function for the calculator in AngularJS that help to minimize the code.</p>', '2018-06-05 19:19:59', 'How-to-Create-a-Calculator-with-AngularJS-.jpg'),
(21, 'Upload Image/File with AngularJS and PHP', 'upload-image-file-with-angularjs-and-php', '<p>In this tutorial, we going to see how to upload Image/File with AngularJS and PHP. The main advantage in the AngularJS is weightless and without&hellip;</p>', '<p>In this tutorial, we going to see how to upload Image/File with&nbsp;<a href=\"https://angularjs.org/\" target=\"_blank\" rel=\"noopener noreferrer\">AngularJS</a>&nbsp;and PHP. The main advantage in the AngularJS is weightless and without reloading your web page you can do more things. As like the same without web page refresh or reload you can upload your image and file.</p>\r\n<p>The process of this Image/File uploading is you can upload the Image/File in your preferable path. Here I have done with uploads folder as same like this you can create whatever folder which would you like and one more thing is you can store your Image/File name in your database using PHP. After completion of this process, you can fetch those images and preview on your web page without a refresh by using AngularJS.</p>\r\n<p>If you looking for Image/File uploading with AngularJS and PHP, Here this can help you simple integration process with your project. With the help of AngularJS and PHP, we going to do the following process to execute the Image/File upload and preview.</p>', '2019-07-12 19:18:17', 'Upload-ImageFile-with-Angular-JS-and-PHP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sa_post_categories`
--

CREATE TABLE `sa_post_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `postID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sa_post_categories`
--

INSERT INTO `sa_post_categories` (`id`, `postID`, `catID`) VALUES
(45, 13, 4),
(43, 8, 4),
(42, 14, 4),
(41, 7, 5),
(44, 9, 5),
(48, 11, 5),
(39, 20, 8),
(38, 21, 8),
(40, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sa_users`
--

CREATE TABLE `sa_users` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_users`
--

INSERT INTO `sa_users` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'demo@softaox.com', '$2y$10$EBSi06Gfv7b8jWkzlDp25evh.BtB1e3v3j31etvonHS/Gz1.dUEQ.', 'mraj@softaox.info'),
(2, 'mohan', '$2y$10$T0YjNkiFL5DdFjSwVOIWb.PFxxyZICs2gnWcIzRtEhrSjFYnVoQ4W', 'mohan@yahool.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sa_categories`
--
ALTER TABLE `sa_categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `sa_posts`
--
ALTER TABLE `sa_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `sa_post_categories`
--
ALTER TABLE `sa_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sa_users`
--
ALTER TABLE `sa_users`
  ADD PRIMARY KEY (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sa_categories`
--
ALTER TABLE `sa_categories`
  MODIFY `catID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sa_posts`
--
ALTER TABLE `sa_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sa_post_categories`
--
ALTER TABLE `sa_post_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sa_users`
--
ALTER TABLE `sa_users`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
