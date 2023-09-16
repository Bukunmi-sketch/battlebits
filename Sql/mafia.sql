
--
-- Database: `mafia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--


CREATE TABLE IF NOT EXISTS `mafia_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL UNIQUE,
  `playername` varchar(255) NOT NULL UNIQUE,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(15) NOT NULL,
   `password` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `reg_step` int(11) NOT NULL,
  `subscription` varchar(255) NOT NULL,
  `chatbotCount` varchar(255) NOT NULL,
  `mailotp` int(11),
  `ip_address` double(11,2) NOT NULL,
  `browser_type` varchar(255) NOT NULL,
  `profileimage`  blob NOT NULL,
  `bio` text NOT NULL,
  `reg_date` varchar(255) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `mafia_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depositor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL UNIQUE,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `mafia_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `mafia_settings` (
  `id` int(11) NOT NULL  AUTO_INCREMENT,
  `website_name` varchar(250) DEFAULT NULL,
  `website_url` varchar(250) DEFAULT NULL,
  `website_email` varchar(250) DEFAULT NULL,
  `admin_mail` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`


 INSERT INTO `mafia_settings`(`id`, `website_name`, `website_url`, `website_email`, `admin_mail`) VALUES (1, 'mafia', 'http://mafia', 'support@mafia.com', 'mafia@gmail.com' );

-- ------------------------------------------------------




-- ALTER TABLE `users`
-- ADD `mailotp` int(11) NOT NULL AFTER `identity`,
-- CHANGE `interest` `category` varchar(255),
-- CHANGE `status` `account_status` varchar(255),
-- ADD `gender` varchar(255) NOT NULL AFTER `username`,
-- ADD `unique_id` char(255) NOT NULL AFTER `id`,
 -- ADD `mailotp` int(11) NOT NULL AFTER `identity`,
 -- CHANGE `customers_name` `customers_firstname` varchar(255),
-- ADD `verification_blue` varchar(255) NOT NULL AFTER `email`;

--  ALTER TABLE `Feedbacks`
--  ADD `notify_status` varchar(255) NOT NULL AFTER `ip_address`;



--
-- Indexes for table `exam_timetable`
--
-- ALTER TABLE `exam_timetable`
--  ADD PRIMARY KEY (`id`);

--


--
-- AUTO_INCREMENT for table `admin`
--
-- ALTER TABLE `admin`
-- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat`
--

-- ALTER TABLE `teacher_salary_history`
-- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
