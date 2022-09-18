-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 06:17 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paws_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `ACC_ID` int(10) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHN_NO` varchar(11) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `PASSWORD` varchar(8) NOT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `position` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`ACC_ID`, `NAME`, `EMAIL`, `PHN_NO`, `ADDRESS`, `PASSWORD`, `GENDER`, `position`) VALUES
(1, 'Mohiuzzaman Bornav', 'mzbornav1@gmail.com', '01558016661', 'Zigatola, Dhanmondi', '12345678', 'male', 'user'),
(2, 'nomrota', 'nomnom@gmail.com', '01555555555', 'wari', '8765', 'female', 'admin'),
(3, 'Sadia', 'Sadia@gmail.com', '5495', 'afaf', '02580258', 'female', 'user'),
(13, 'Fahim Zaman', 'fahimzaman@gmail.com', '01552361709', '28/B Zigatola, Dhaka', '1122', 'male', 'user'),
(14, 'nusrat', 'ns@gmail.com', '01715593549', 'uuu', '123456', 'female', 'user'),
(15, 'Chanchal', 'chanchal@gmail.com', '01859875056', 'pulpar', '0258', 'male', 'user'),
(16, 'Saikat Saha', 'saikats1995@gmail.com', '01948129892', 'zigatola, dhanmondi, 28/b, tannary block', '24681357', 'male', 'user'),
(17, 'thht', 'tvrth', 'th', 'th ', 'rth', 'male', 'user'),
(18, 'Rifat Hasan', 'rb@gmail.com', '01737343130', 'shantinogor,dhaka', 'nomnom', 'male', 'user'),
(19, 'Rimu', 'rimu@gmail.com', '01795562226', 'ng', '1234', 'female', 'user'),
(20, 'Nishu', 'hishu@gmail.com', '0194948578', 'puran dhaka', '987654', 'female', 'user'),
(21, 'Tanim', 'tanim@gmail.com', '01559988788', 'dhanmondi', '02580258', 'male', 'user'),
(22, 'Nitu', 'nitu@gmail.com', '01852852654', 'rampura', '134679', 'female', 'user'),
(23, 'Ayaan', 'antu@gmail.com', '01676780098', 'khilgaon', '321654', 'male', 'user'),
(24, 'Rasif bin', 'ovi12@gmail.com', '015154815', 'uk', 'http://l', 'male', 'user'),
(25, 'hadi', 'hadi@gmail.com', '0778164474', 'khulna', '77777', 'male', 'user'),
(27, 'Nayeem', 'nha@gmail.com', '01718164474', 'rangpur', '00000', 'male', 'user'),
(28, 'lira', 'lira@gmail.com', '0158287539', 'monali', '01987632', 'female', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(10) NOT NULL,
  `AMOUNT` int(10) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `NO_OF_PIECE` int(10) DEFAULT NULL,
  `ACC_ID` int(10) DEFAULT NULL,
  `FOOD_ID` int(10) DEFAULT NULL,
  `MED_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_serial`
--

CREATE TABLE `doctor_serial` (
  `SERIAL_ID` int(10) NOT NULL,
  `CURR_DATE` date DEFAULT NULL,
  `APPOINMENT_DATE` date DEFAULT NULL,
  `ACC_ID` int(10) DEFAULT NULL,
  `PET_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_info`
--

CREATE TABLE `doc_info` (
  `DOC_ID` int(10) NOT NULL,
  `DOC_NAME` varchar(50) DEFAULT NULL,
  `DOC_DEGREE` varchar(200) DEFAULT NULL,
  `DOC_visiting_add` varchar(100) DEFAULT NULL,
  `DOC_visiting_time` varchar(100) DEFAULT NULL,
  `DOC_CONTACT_NO` int(11) DEFAULT NULL,
  `DOC_EMAIL` varchar(50) DEFAULT NULL,
  `RESCUE_DETAILS` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `DONATOR_ID` int(10) NOT NULL,
  `DONATOR_NAME` varchar(50) DEFAULT NULL,
  `DONATOR_EMAIL` varchar(50) DEFAULT NULL,
  `DONATOR_ADDRESS` varchar(100) DEFAULT NULL,
  `NOTE` varchar(100) DEFAULT NULL,
  `DONATION_TIME` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `FOOD_ID` int(10) NOT NULL,
  `FOOD_NAME` varchar(50) DEFAULT NULL,
  `FOOD_TYPE` varchar(25) DEFAULT NULL,
  `FOOD_WEIGHT` int(10) DEFAULT NULL,
  `FOOD_DETAILS` text,
  `FOOD_available` int(10) DEFAULT NULL,
  `FOOD_exp_date` date DEFAULT NULL,
  `FOOD_image` longblob,
  `FOOD_PRICE` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`FOOD_ID`, `FOOD_NAME`, `FOOD_TYPE`, `FOOD_WEIGHT`, `FOOD_DETAILS`, `FOOD_available`, `FOOD_exp_date`, `FOOD_image`, `FOOD_PRICE`) VALUES
(6, 'Brit Care Cat Angel', 'Cat', 250, 'Grain-free SALMON & POTATO Formula for Adult cats of small and medium breeds', 0, '2021-12-12', 0x4272697420436172652043617420416e67656c2e6a7067, 450),
(7, 'Brit Care Cat Crazy', 'Cat', 250, 'Hypoallergenic LAMB & RICE Formula for  Junior cats of All Breeds', 20, '2021-12-12', 0x42726974204361726520436174204372617a792e6a7067, 250),
(8, 'Brit Care Cat Lucky', 'Cat', 250, 'Grain-free SALMON & POTATO Formula for cats of All Breeds', 23, '2021-12-12', 0x42726974204361726520436174204c75636b792e6a7067, 300),
(9, 'Brit Premium Cat Adult Chicken', 'Cat', 250, 'Hypoallergenic CHICKEN & RICE Formula for cat of All Breeds', 30, '2021-12-01', 0x42726974205072656d69756d20436174204164756c7420436869636b656e2e6a7067, 500),
(10, 'Brit Premium Cat Adult Salmon', 'Cat', 500, 'Grain-free SALMON & POTATO Formula for cats of All Breeds ', 25, '2021-12-01', 0x42726974205072656d69756d20436174204164756c742053616c6d6f6e2e6a7067, 800),
(11, 'Brit Premium Cat Indoor', 'Cat', 500, 'Adult cats require complete and balanced nutrition that meets their requirements to maintain good health and condition. this food is formulated to meet adult catsâ€™s requirements using the best quality ingredients and supplemented with fish oil (rich in DHA and Omega-3 fatty acid) and Lecithin (rich in Choline) to help enhance brain and nervous system function and promote heart health.', 35, '2021-12-05', 0x42726974205072656d69756d2043617420496e646f6f722e6a7067, 300),
(12, 'catsy dry fruit', 'Cat', 500, 'Designed for adult cats. Enriched with antioxidants to help maintain a strong immune system.', 34, '2021-12-12', 0x6361747379206472792066727569742e6a7067, 750),
(13, 'Flexible Pet Food ', 'Cat', 500, 'Grain-free mixed fruit Formula for Adult cats of small and medium breeds.', 14, '2021-12-12', 0x466c657869626c652050657420466f6f64202e6a7067, 400),
(15, 'Juwel Cat Food Turkey', 'Cat', 500, 'Contains L-Carnitine with additional CLA to help your cat  maintain ideal weight for a healthy lifestyle by increasing the use of body fat as energy source.', 23, '2020-12-12', 0x4a7577656c2043617420466f6f64205475726b65792e6a7067, 1200),
(16, 'Brit Care Salmon & Potato ', 'Dog', 500, 'Grain-free SALMON & POTATO Formula for Adult Dogs of small and medium breeds.', 29, '2020-12-12', 0x312e6a7067, 1000),
(17, 'Brit Care Puppy Lamb & Rice', 'Dog', 500, 'Hypoallergenic LAMB & RICE Formula for Puppies & Junior Dogs of All Breeds.', 20, '2021-11-12', 0x322e6a7067, 860),
(18, 'Brit Care Puppy Salmon ', 'Dog', 500, 'Grain-free SALMON & POTATO Formula for Puppies & Junior Dogs of All Breeds.', 18, '2021-11-12', 0x332e6a7067, 900),
(19, 'Brit Premium Puppies', 'Dog', 1000, 'Premium food with high digestibility, giving your dog everything he needs. Complete food for puppies from weaning to transition to â€œJuniorâ€: 4-8 weeks for medium breeds (10-25kg).', 30, '2021-12-11', 0x342e6a7067, 1300),
(20, 'SH DOG FOOD BEEF', 'Dog', 1000, 'Adult dogs require complete and balanced nutrition that meets their requirements to maintain good health and condition. SmartHeartÂ® adult dog food is formulated to meet adult dogâ€™s requirements.\r\n  ', 16, '2021-12-12', 0x352e6a7067, 2000),
(21, 'SH food CHICKEN & LIVER', 'Dog', 1000, 'Adult dogs require complete and balanced nutrition that meets their requirements to maintain good health and condition. SmartHeartÂ® adult dog food is formulated to meet adult dogâ€™s requirements using the best quality ingredients and supplemented with fish oil. ', 28, '2021-12-12', 0x362e6a7067, 1450),
(22, 'SH FOOD CHICKEN & EGG', 'Dog', 1000, 'Adult dogs require complete and balanced nutrition that meets their requirements to maintain good health and condition. SmartHeartÂ® adult dog food is formulated to meet adult dogâ€™s requirements using the best quality ingredients and supplemented with fish oil (rich in DHA and Omega-3 fatty acid) and Lecithin (rich in Choline) to help enhance brain and nervous system function and promote heart health.', 28, '2021-12-12', 0x372e6a7067, 1800),
(23, 'SH FOOD BEEF & MILK', 'Dog', 1000, 'Puppies experience their most rapid period of development during their first years of age. This includes their activities and learning new challenges.Complete and balanced nutrition is essential for their proper growth and healthy development.SmartHeartÂ® puppy food is formulated to meet puppiesâ€™ nutritional requirements using the best quality ingredients and supplemented with fish oil (rich in DHA and Omega-3 fatty acid) and Lecithin (rich in Choline) to help enhance brain development, nervous system function and heart health.', 30, '2021-12-12', 0x382e6a7067, 2300),
(24, 'SH  ADULT POWER PACK', 'Dog', 1000, 'High Energy ( For Active or Energetic Dogs)\r\n1.Build Up Muscle Mass and Substance\r\n2.Boost Up Body Power and Conserve Muscle \r\n3.L-Carnitine Added for Lean Muscle\r\n4.Healthy Skin and Shiny Coat\r\n5.Strong Immune System\r\n6.Healthy Digestion', 18, '2021-12-12', 0x392e706e67, 2500),
(25, 'SH GOLD ADULT FIT & FIRM ', 'Dog', 1000, 'Contains L-Carnitine with additional CLA to help your dog maintain ideal weight for a healthy lifestyle by increasing the use of body fat as energy source and elevating enzymes needed to matabolize sugars, starch and other Carbohydrates.', 21, '2021-12-12', 0x31302e6a7067, 2350);

-- --------------------------------------------------------

--
-- Table structure for table `fostering`
--

CREATE TABLE `fostering` (
  `FOSTERING_ID` int(10) NOT NULL,
  `GIVING_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `ACC_ID` int(10) DEFAULT NULL,
  `PET_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MEDICINE_ID` int(10) NOT NULL,
  `MEDICINE_NAME` varchar(50) DEFAULT NULL,
  `MEDICINE_TYPE` varchar(25) DEFAULT NULL,
  `MEDICINE_DETAILS` varchar(500) DEFAULT NULL,
  `MEDICINE_available` int(10) DEFAULT NULL,
  `MEDICINE_exp_date` date DEFAULT NULL,
  `MEDICINE_image` longblob,
  `MEDICINE_PRICE` int(50) DEFAULT NULL,
  `MEDICINE_supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MEDICINE_ID`, `MEDICINE_NAME`, `MEDICINE_TYPE`, `MEDICINE_DETAILS`, `MEDICINE_available`, `MEDICINE_exp_date`, `MEDICINE_image`, `MEDICINE_PRICE`, `MEDICINE_supplier`) VALUES
(2, 'Bayer Advantage II', 'Cat', 'Flea Prevention for Cats.', 13, '2021-12-12', 0x322e6a7067, 650, 'Pet Kingdom Labs'),
(3, 'HomeoPet Nose Relief', 'Cat', 'A natural homeopathic medicine that provides support for a healthy nasal & sinus tract in cats. Can aid with runny nose, watery eyes, sneezing & congestion.', 20, '2021-12-12', 0x332e6a7067, 500, 'HomoPet'),
(4, 'Catego Flea Control', 'Cat', 'Catego a flea and tick product made especially for cats. Catego kills fleas in 6 hours while Frontline Plus and Advantage II kills fleas in 12 hours.', 9, '2021-12-12', 0x342e6a7067, 750, 'Catego'),
(5, 'Goodwinol Vet', 'Cat', 'Vet Rx improves respiratory function by stimulating the depth of ventilation and increasing lung ventilation', 7, '2021-12-12', 0x352e6a7067, 600, 'MetaRetail '),
(6, 'Flea Spot-On  ', 'Dog', 'Frontline Spot On Flea & Tick Treatment for large dogs weighing 20 to 40 kg and can be used in dogs and puppies from 8 weeks of age for the treatment of biting lice, fleas and ticks. Advantage 250 for dogs weighing between 10 and 25kg.', 9, '2021-12-12', 0x31322e6a7067, 850, 'Advantage'),
(7, 'Frontline Plus Flea & Tick ', 'Dog', 'FRONTLINE Plus for Dogs flea & tick treatment (Fipronil) is a fast acting, waterproof topical that remains effective even after bathing', 12, '2021-12-12', 0x31332e6a7067, 750, 'FRONPLUSDOG'),
(8, 'Advantage 40 Flea Spot-On ', 'Dog', 'Advantage 40 Flea Treatment should be used for smaller cats, small dogs and rabbits. Each pipette contains 0.4 ml (40 mg imidacloprid) and 0.1% butylated hydroxytoluene (E321) as a preservative. Indicated for the prevention and control treatment of flea infestations and can be used on kittens aged 8 weeks and older.', 11, '2021-12-12', 0x31342e6a7067, 870, 'FRONPLUSDOG'),
(9, 'Advantage 100 Flea Spot-On', 'Dog', 'Advantage 100 Flea Treatment for dogs contains 1.0 ml (100 mg imidacloprid) and 0.1% butylated hydroxytoluene (E321) as a preservative. Advantage 100 is a flea control product.', 14, '2021-12-12', 0x31352e6a7067, 870, 'FRONPLUSDOG'),
(10, 'Novartis Veterinary Capstar ', 'Dog', 'Novartis Veterinary Capstar Flea Tablets. Capstar are used to help treat flea infestations on dogs and cats. Capstar is the oral flea treatment tablet.', 30, '2021-12-12', 0x31362e6a7067, 1000, 'Novartis'),
(11, 'Prednidale', 'Cat', 'Prednidale 5 mg tablets are used to treat conditions characterised by inflammation or allergic reactions in cats and dogs.', 7, '2021-12-12', 0x362e6a7067, 450, 'dechra'),
(12, 'Milbemax Cat Wormer', 'Cat', 'Milbemax Tablets for small cats and kittens is indicated for the control of roundworms, tapeworms, hookworms as well as the prevention of heartworm in cats.', 13, '2021-12-12', 0x372e6a7067, 768, 'nelio'),
(13, 'Fiproclear Spot On', 'Dog', 'Norbrook Fiproclear Spot On For Dogs. Fiproclear Spot On For Dogs is for the treatment and prevention of flea and tick infestations in dogs. ', 15, '2021-12-12', 0x31372e706e67, 389, 'Nelio'),
(14, 'Veloxa Chewable Tablets ', 'Dog', ' Veloxa has a combination of Febantel, Pyrantel and Praziquantel which makes it effective against the four most common worms that affect dogs; roundworm, tapeworm, hookworm and whipworm.', 35, '2021-12-12', 0x31382e6a7067, 850, ' Merial');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `PET_ADOPTION_ID` int(10) NOT NULL,
  `PET_req_date` date DEFAULT NULL,
  `PET_adp_date` date DEFAULT NULL,
  `ACC_ID` int(10) DEFAULT NULL,
  `PET_ID` int(10) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'adopt_request'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`PET_ADOPTION_ID`, `PET_req_date`, `PET_adp_date`, `ACC_ID`, `PET_ID`, `status`) VALUES
(41, '2019-04-12', '2019-04-20', 15, 27, 'approve'),
(42, '2019-04-12', '2019-04-20', 16, 29, 'approve'),
(43, '2019-04-13', '2019-04-20', 1, 29, 'approve'),
(44, '2019-04-13', '2019-04-20', 1, 28, 'approve'),
(50, '2019-04-20', '2019-04-20', 27, 29, 'approve'),
(52, '2019-04-20', NULL, 16, 27, 'adopt_req'),
(53, '2019-04-20', NULL, 16, 28, 'adopt_req'),
(54, '2019-04-20', NULL, 28, 27, 'adopt_req'),
(55, '2019-04-20', '2019-04-20', 13, 31, 'approve'),
(56, '2019-04-20', '2019-04-20', 14, 31, 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `pet_info`
--

CREATE TABLE `pet_info` (
  `pet_name` varchar(40) NOT NULL,
  `PET_ID` int(10) NOT NULL,
  `PET_TYPE` varchar(10) NOT NULL,
  `PET_GENDER` varchar(10) NOT NULL,
  `PET_AGE` int(10) NOT NULL,
  `STATUS` varchar(30) DEFAULT 'donate',
  `ACC_ID` int(10) DEFAULT NULL,
  `details` text,
  `photo` longblob,
  `donate_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_info`
--

INSERT INTO `pet_info` (`pet_name`, `PET_ID`, `PET_TYPE`, `PET_GENDER`, `PET_AGE`, `STATUS`, `ACC_ID`, `details`, `photo`, `donate_date`) VALUES
('Cherry', 27, 'Huski pupp', 'Female', 13, 'donate', 1, 'It has been with us for a long time. She is a little bit naughty, but she is too much cute.', 0x3249655466662d565f343030783430302e6a706567, '2019-04-12 02:59:41'),
('Jezzz', 28, 'Hunson Dog', 'Male', 25, 'donate', 15, 'he is a little ruf, bur loyal', 0x70656d62726f6b652d77656c73682d636f7267692e6a7067, '2019-04-12 03:01:23'),
('Hachi', 29, 'Bulldog', 'Male', 24, 'donate', 15, 'Strong and royal', 0x70696374757265732d6f662d676f6c64656e2d7265747269657665722d646f67732d312e6a7067, '2019-04-12 04:56:20'),
('jony', 30, 'German She', 'Male', 6, 'donate', 16, 'Newly born. Love him so much. Still lackes traning ', 0x637574655f646f675f666c6f7070795f656172732e6a70672e36353378305f7138305f63726f702d736d6172742e6a7067, '2019-04-12 05:04:26'),
('nami', 31, 'Dag', 'Female', 12, 'donate', 1, 'sdaf sds', 0x3333352e6a7067, '2019-04-20 06:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `rescue_info`
--

CREATE TABLE `rescue_info` (
  `RESCUER_NAME` varchar(50) DEFAULT NULL,
  `R_CONTACT_NO` int(20) NOT NULL,
  `R_LOCATION` varchar(100) DEFAULT NULL,
  `RESCUE_DETAILS` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `COURSE_NAME` varchar(50) NOT NULL,
  `COURSE_TIME` varchar(100) DEFAULT NULL,
  `ACC_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`ACC_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `PHN_NO` (`PHN_NO`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `FK9` (`ACC_ID`),
  ADD KEY `FK10` (`FOOD_ID`),
  ADD KEY `FK11` (`MED_ID`);

--
-- Indexes for table `doctor_serial`
--
ALTER TABLE `doctor_serial`
  ADD PRIMARY KEY (`SERIAL_ID`),
  ADD KEY `FK7` (`ACC_ID`),
  ADD KEY `FK8` (`PET_ID`);

--
-- Indexes for table `doc_info`
--
ALTER TABLE `doc_info`
  ADD PRIMARY KEY (`DOC_ID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`DONATOR_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`FOOD_ID`);

--
-- Indexes for table `fostering`
--
ALTER TABLE `fostering`
  ADD PRIMARY KEY (`FOSTERING_ID`),
  ADD KEY `FK4` (`ACC_ID`),
  ADD KEY `FK5` (`PET_ID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MEDICINE_ID`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`PET_ADOPTION_ID`),
  ADD KEY `FK2` (`ACC_ID`),
  ADD KEY `FK3` (`PET_ID`);

--
-- Indexes for table `pet_info`
--
ALTER TABLE `pet_info`
  ADD PRIMARY KEY (`PET_ID`),
  ADD KEY `FK1` (`ACC_ID`);

--
-- Indexes for table `rescue_info`
--
ALTER TABLE `rescue_info`
  ADD PRIMARY KEY (`R_CONTACT_NO`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`COURSE_NAME`),
  ADD KEY `FK6` (`ACC_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `ACC_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_serial`
--
ALTER TABLE `doctor_serial`
  MODIFY `SERIAL_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_info`
--
ALTER TABLE `doc_info`
  MODIFY `DOC_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `DONATOR_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `FOOD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `fostering`
--
ALTER TABLE `fostering`
  MODIFY `FOSTERING_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MEDICINE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `PET_ADOPTION_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `pet_info`
--
ALTER TABLE `pet_info`
  MODIFY `PET_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`FOOD_ID`) REFERENCES `food` (`FOOD_ID`),
  ADD CONSTRAINT `FK11` FOREIGN KEY (`MED_ID`) REFERENCES `medicine` (`MEDICINE_ID`),
  ADD CONSTRAINT `FK9` FOREIGN KEY (`ACC_ID`) REFERENCES `account_info` (`ACC_ID`);

--
-- Constraints for table `doctor_serial`
--
ALTER TABLE `doctor_serial`
  ADD CONSTRAINT `FK7` FOREIGN KEY (`ACC_ID`) REFERENCES `account_info` (`ACC_ID`),
  ADD CONSTRAINT `FK8` FOREIGN KEY (`PET_ID`) REFERENCES `pet_info` (`PET_ID`);

--
-- Constraints for table `fostering`
--
ALTER TABLE `fostering`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`ACC_ID`) REFERENCES `account_info` (`ACC_ID`),
  ADD CONSTRAINT `FK5` FOREIGN KEY (`PET_ID`) REFERENCES `pet_info` (`PET_ID`);

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`ACC_ID`) REFERENCES `account_info` (`ACC_ID`),
  ADD CONSTRAINT `FK3` FOREIGN KEY (`PET_ID`) REFERENCES `pet_info` (`PET_ID`);

--
-- Constraints for table `pet_info`
--
ALTER TABLE `pet_info`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`ACC_ID`) REFERENCES `account_info` (`ACC_ID`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `FK6` FOREIGN KEY (`ACC_ID`) REFERENCES `account_info` (`ACC_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
