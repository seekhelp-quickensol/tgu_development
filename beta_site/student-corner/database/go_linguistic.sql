-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 11:07 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_linguistic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audio_question_description`
--

CREATE TABLE `tbl_audio_question_description` (
  `id` int(11) NOT NULL,
  `question_data_id` int(11) NOT NULL,
  `question_description` text NOT NULL,
  `audio` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `full_name`, `email`, `message`, `phone_number`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(7, 'shubham', 'admin@gmail.com', 'hi', 1236547895, '1', '0', '2021-09-20 11:15:49', '2021-09-20 05:45:49'),
(8, 'shubham', 'demo@gmail.com', 'bye', 1236547895, '1', '0', '2021-09-20 11:17:08', '2021-09-20 05:47:08'),
(9, 'shubham', 'admin@gmail.com', 'hiii', 1236547895, '1', '0', '2021-09-20 11:20:43', '2021-09-20 05:50:43'),
(10, 'shubham yadav', 'demo@gmail.com', 'testing', 1236547895, '1', '0', '2021-09-20 11:26:21', '2021-09-20 05:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_duration` varchar(100) NOT NULL,
  `exam_attempt` varchar(100) NOT NULL,
  `assessment` varchar(100) NOT NULL,
  `course_amount` varchar(100) NOT NULL,
  `cover_img` varchar(100) NOT NULL,
  `course_info` text NOT NULL,
  `course_slug_name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`id`, `course_name`, `course_duration`, `exam_attempt`, `assessment`, `course_amount`, `cover_img`, `course_info`, `course_slug_name`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(25, 'English', '2', '5', '35', '2500', 'c45ffba61f570a37dfda723d2f68d1a6.jpg', '<article class=\"seller-desc\" style=\"margin: 0px; padding: 12px 0px 0px; color: rgb(34, 35, 37); font-family: Muli, sans-serif; font-size: 13px;\"><div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px;\"><div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; font-size: 14px; color: rgb(98, 100, 106); line-height: 23px;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig<p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\"></p></div><div><br></div></div></article>', 'english', '1', '0', '2021-09-18 11:56:40', '2021-09-18 06:26:40'),
(26, 'Hindi', '5', '2', '50', '6000', 'e01e1baaecf979a65e4455d8d8ddb6a0.jpg', '<div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px; color: rgb(34, 35, 37); font-family: Muli, sans-serif; font-size: 13px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; font-size: 14px; color: rgb(98, 100, 106); line-height: 23px; font-family: Muli, sans-serif;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig', 'hindi', '1', '0', '2021-09-18 11:57:59', '2021-09-18 06:27:59'),
(27, 'Age phonic', '4', '2', '15', '3500', '59aeab9eec568973c83237a6a0ffaa7e.jpg', 'Age phonic', 'age-phonic', '1', '0', '2021-09-18 11:59:37', '2021-09-18 06:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fill_in_blank_question`
--

CREATE TABLE `tbl_fill_in_blank_question` (
  `id` int(11) NOT NULL,
  `question_data_id` int(11) NOT NULL,
  `audio_question_description_id` int(50) NOT NULL,
  `question` text NOT NULL,
  `fill_blank_option` text NOT NULL,
  `correct_answer` text NOT NULL,
  `marks` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fill_in_blank_question`
--

INSERT INTO `tbl_fill_in_blank_question` (`id`, `question_data_id`, `audio_question_description_id`, `question`, `fill_blank_option`, `correct_answer`, `marks`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(1, 264, 0, 'india is a blank_space', 'a,b,s,county', 'county', '2', '1', '0', '2021-11-12 13:13:56', '2021-11-12 07:43:56'),
(2, 265, 0, 'this is a paper set(2)  ____', 'a,b,c,d', 'a', '2', '1', '0', '2021-11-12 13:16:30', '2021-11-12 07:46:30'),
(3, 266, 0, 'this is a paper set(3) blank_space', 'a,b,s', 'a', '2', '1', '0', '2021-11-12 13:17:21', '2021-11-12 07:47:21'),
(4, 267, 0, 'this is paper(4))__', 'a,b,c,d', 'a', '2', '1', '0', '2021-11-12 13:18:19', '2021-11-12 07:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_final_test_result`
--

CREATE TABLE `tbl_final_test_result` (
  `id` int(50) NOT NULL,
  `course_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `attempt_no` int(11) NOT NULL,
  `paper_set` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `student_total_marks` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_match_the_following`
--

CREATE TABLE `tbl_match_the_following` (
  `id` int(11) NOT NULL,
  `question_data_id` int(50) NOT NULL,
  `question` text NOT NULL,
  `question_a` text NOT NULL,
  `answer_a` text NOT NULL,
  `question_b` text NOT NULL,
  `answer_b` text NOT NULL,
  `question_c` text NOT NULL,
  `answer_c` text NOT NULL,
  `question_d` text NOT NULL,
  `answer_d` text NOT NULL,
  `question_e` text NOT NULL,
  `answer_e` text NOT NULL,
  `marks` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_match_the_following`
--

INSERT INTO `tbl_match_the_following` (`id`, `question_data_id`, `question`, `question_a`, `answer_a`, `question_b`, `answer_b`, `question_c`, `answer_c`, `question_d`, `answer_d`, `question_e`, `answer_e`, `marks`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(5, 233, 'sum of ', '2+2', '4', '2+6', '8', '1+5', '6', '5+5', '10', '5+4', '9', '2', '1', '0', '2021-11-02 20:51:34', '2021-11-02 15:21:34'),
(6, 256, 'match the following', '2+5', '7', '1000+2', '1002', '10+20', '30', '20+1', '21', '25+25', '50', '2', '1', '0', '2021-11-09 16:18:41', '2021-11-09 10:48:41'),
(7, 257, 'match the following', '25+1', '26', 'dog', 'bark', 'cat', 'mau', 'ant', 'small', 'men', 'women', '6', '1', '0', '2021-11-09 16:23:14', '2021-11-09 10:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mcq_question`
--

CREATE TABLE `tbl_mcq_question` (
  `id` int(11) NOT NULL,
  `question_data_id` int(10) NOT NULL,
  `audio_question_description_id` int(50) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `marks` text NOT NULL,
  `correct_answer` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mcq_question`
--

INSERT INTO `tbl_mcq_question` (`id`, `question_data_id`, `audio_question_description_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `marks`, `correct_answer`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(67, 260, 0, 'this is a  set 4 ?', 'question', 'no', 'sdsd', 'sfd', '1', 'A', '1', '0', '2021-11-12 11:52:30', '2021-11-12 06:22:30'),
(68, 261, 0, 'this is a  set 3 ?', 'test', 'Aristotle felt the need for rote-learning; Socrates emphasized on dialogic learning', 'There was no difference', 'Aristotle emphasized on the importance of paying attention to human nature; Socrates emphasized upon science', '3', 'C', '1', '0', '2021-11-12 12:02:48', '2021-11-12 06:32:48'),
(69, 262, 0, 'this is a  set 2 ?', 'Aristotle felt the need for repetition to develop good habits in students; Socrates felt that students need to be constantly questioned', 'a', 'aaa', 'None of the above', '2', 'B', '1', '0', '2021-11-12 12:03:39', '2021-11-12 06:33:39'),
(70, 263, 0, 'this is a  set 1 ?', 'Aristotle felt the need for repetition to develop good habits in students; Socrates felt that students need to be constantly questioned', 'test1', 'test', 'None of the above', '1', 'A', '1', '0', '2021-11-12 12:04:29', '2021-11-12 06:34:29'),
(71, 268, 0, 'भारतवर्ष में हिंदी को आप किस वर्ग में रखेंगे', 'राजभाषा', 'test', 'aaa', 'test', '1', 'A', '1', '0', '2021-11-12 13:58:21', '2021-11-12 08:28:21'),
(72, 269, 0, 'ढूढाली बोली है', 'test1', 'test1', 'aaa', 'test', '1', 'A', '1', '0', '2021-11-12 13:59:09', '2021-11-12 08:29:09'),
(73, 270, 0, 'हिंदी की विशिष्ट बोली ब्रजभाषा किस रूप में सबसे अधिक प्रसिद्ध है', 'test', 'test', 'test', 'aaa', '1', 'A', '1', '0', '2021-11-12 14:00:00', '2021-11-12 08:30:00'),
(74, 271, 0, 'mere nam shuham', 'राजभाषा', 'test', 'sdsd', 'aaa', '1', 'A', '1', '0', '2021-11-12 14:00:55', '2021-11-12 08:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_one_word_question`
--

CREATE TABLE `tbl_one_word_question` (
  `id` int(11) NOT NULL,
  `question_data_id` int(11) NOT NULL,
  `audio_question_description_id` int(50) NOT NULL,
  `question` text NOT NULL,
  `fill_blank_option` text NOT NULL,
  `correct_answer` text NOT NULL,
  `marks` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_one_word_question`
--

INSERT INTO `tbl_one_word_question` (`id`, `question_data_id`, `audio_question_description_id`, `question`, `fill_blank_option`, `correct_answer`, `marks`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(12, 250, 0, '<br>up--blank_space <br>left--blank_space', 'a,b,c,d,right,down', 'down,right', '2', '1', '0', '2021-11-08 18:36:09', '2021-11-08 13:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_one_word_question_description`
--

CREATE TABLE `tbl_one_word_question_description` (
  `id` int(11) NOT NULL,
  `question_data_id` int(20) NOT NULL,
  `question_description` text NOT NULL,
  `marks` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_one_word_question_old`
--

CREATE TABLE `tbl_one_word_question_old` (
  `id` int(11) NOT NULL,
  `question_data_id` int(11) NOT NULL,
  `question_description_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paper_set`
--

CREATE TABLE `tbl_paper_set` (
  `id` int(11) NOT NULL,
  `set_name` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paper_set`
--

INSERT INTO `tbl_paper_set` (`id`, `set_name`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(1, 'A', '1', '0', '2021-11-11 07:01:14', '2021-11-11 06:01:39'),
(2, 'B', '1', '0', '2021-11-11 07:01:14', '2021-11-11 06:01:39'),
(3, 'C', '1', '0', '2021-11-11 07:01:48', '2021-11-11 06:02:00'),
(4, 'D', '1', '0', '2021-11-11 07:01:48', '2021-11-11 06:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passage_reading_description`
--

CREATE TABLE `tbl_passage_reading_description` (
  `id` int(11) NOT NULL,
  `question_data_id` int(20) NOT NULL,
  `passage` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passage_reading_description`
--

INSERT INTO `tbl_passage_reading_description` (`id`, `question_data_id`, `passage`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(15, 236, 'passsagre thestinng ', '1', '0', '2021-11-03 11:02:58', '2021-11-03 05:32:58'),
(16, 239, 'passage no 2', '1', '0', '2021-11-03 12:26:10', '2021-11-03 06:56:10'),
(17, 242, 'SHUBHAM PASSAGE', '1', '0', '2021-11-03 13:23:19', '2021-11-03 07:53:19'),
(18, 244, 'passsss', '1', '0', '2021-11-03 15:37:35', '2021-11-03 10:07:35'),
(19, 245, 'sddsjdsjndsncdsk', '1', '0', '2021-11-03 17:21:05', '2021-11-03 11:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passage_reading_question`
--

CREATE TABLE `tbl_passage_reading_question` (
  `id` int(11) NOT NULL,
  `question_data_id` int(20) NOT NULL,
  `question_description_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `marks` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passage_reading_question`
--

INSERT INTO `tbl_passage_reading_question` (`id`, `question_data_id`, `question_description_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `marks`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(27, 244, 18, '333333333333333333333333', 'xsxsa', 'sxxsxs', 'sxsx', 's', 'A', 2, '1', '0', '2021-11-03 15:37:35', '2021-11-03 10:07:35'),
(28, 244, 18, '444444444444444444444', 'sxs', 'sxx', 'ssxs', 'asddsc', 'A', 2, '1', '0', '2021-11-03 15:37:36', '2021-11-03 10:07:36'),
(29, 245, 19, 'scscnck k', 'sdcsc', 'scscscscsc', 'scsc cv c', 'scc cx ', 'A', 2, '1', '0', '2021-11-03 17:21:05', '2021-11-03 11:51:05'),
(30, 245, 19, 'scvvvd', 'scsdkmlkm', 'mcsclsl', 'mcsccs', 'smckslcdslc', 'B', 2, '1', '0', '2021-11-03 17:21:05', '2021-11-03 11:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_info`
--

CREATE TABLE `tbl_payment_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unpaid,1=paid',
  `exam_attempt` int(11) NOT NULL DEFAULT 1,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_info`
--

INSERT INTO `tbl_payment_info` (`id`, `user_id`, `course_id`, `payment_id`, `payment_status`, `exam_attempt`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(25, 13, '25', '1', '1', 1, '1', '0', '2021-11-08 16:10:10', '2021-11-08 10:40:10'),
(27, 13, '26', '1', '1', 1, '1', '0', '2021-11-10 14:05:20', '2021-11-10 08:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picture_question`
--

CREATE TABLE `tbl_picture_question` (
  `id` int(11) NOT NULL,
  `question_data_id` int(11) NOT NULL,
  `question_description_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `marks` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picture_question_description`
--

CREATE TABLE `tbl_picture_question_description` (
  `id` int(11) NOT NULL,
  `question_data_id` int(50) NOT NULL,
  `question_description` text NOT NULL,
  `question_image` varchar(100) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_data`
--

CREATE TABLE `tbl_question_data` (
  `id` int(11) NOT NULL,
  `course_name` int(50) NOT NULL,
  `question_category` int(50) NOT NULL COMMENT '1=Assessment,2=Test Paper,3=Both',
  `course_level` int(50) NOT NULL COMMENT '1=basic;2=intermediate;3=advance',
  `topic_id` int(50) NOT NULL,
  `paper_set` int(50) NOT NULL COMMENT '1=A,2=b,3=C,4=D',
  `question_type` int(50) NOT NULL COMMENT 'MCQ=1,fill_blank=2,one_word=3,picture=4,tick mark=5,passage_reading=6,audio_question=7,match_following=8',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question_data`
--

INSERT INTO `tbl_question_data` (`id`, `course_name`, `question_category`, `course_level`, `topic_id`, `paper_set`, `question_type`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(258, 27, 2, 0, 0, 1, 1, '1', '0', '2021-11-11 20:17:06', '2021-11-11 14:47:06'),
(259, 25, 2, 0, 0, 1, 1, '1', '0', '2021-11-11 20:18:22', '2021-11-11 14:48:22'),
(260, 25, 2, 0, 0, 4, 1, '1', '0', '2021-11-12 11:50:45', '2021-11-12 06:20:45'),
(261, 25, 2, 0, 0, 3, 1, '1', '0', '2021-11-12 12:02:04', '2021-11-12 06:32:04'),
(262, 25, 2, 0, 0, 2, 1, '1', '0', '2021-11-12 12:03:03', '2021-11-12 06:33:03'),
(263, 25, 2, 0, 0, 1, 1, '1', '0', '2021-11-12 12:03:56', '2021-11-12 06:33:56'),
(264, 25, 2, 0, 0, 1, 2, '1', '0', '2021-11-12 13:11:09', '2021-11-12 07:41:09'),
(265, 25, 2, 0, 0, 2, 2, '1', '0', '2021-11-12 13:14:44', '2021-11-12 07:44:44'),
(266, 25, 2, 0, 0, 3, 2, '1', '0', '2021-11-12 13:16:51', '2021-11-12 07:46:51'),
(267, 25, 2, 0, 0, 4, 2, '1', '0', '2021-11-12 13:17:36', '2021-11-12 07:47:36'),
(268, 26, 2, 0, 0, 1, 1, '1', '0', '2021-11-12 13:57:41', '2021-11-12 08:27:41'),
(269, 26, 2, 0, 0, 2, 1, '1', '0', '2021-11-12 13:58:43', '2021-11-12 08:28:43'),
(270, 26, 2, 0, 0, 3, 1, '1', '0', '2021-11-12 13:59:43', '2021-11-12 08:29:43'),
(271, 26, 2, 0, 0, 4, 1, '1', '0', '2021-11-12 14:00:16', '2021-11-12 08:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_test`
--

CREATE TABLE `tbl_student_test` (
  `id` int(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `question_type` varchar(50) NOT NULL,
  `question_id` int(100) NOT NULL,
  `paper_set` int(20) NOT NULL,
  `attempt_no` int(50) NOT NULL,
  `marks` int(11) NOT NULL,
  `student_marks` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_test`
--

INSERT INTO `tbl_student_test` (`id`, `course_id`, `student_id`, `question_type`, `question_id`, `paper_set`, `attempt_no`, `marks`, `student_marks`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(16, 25, 13, 'mcq', 70, 1, 1, 1, 0, '1', '0', '2021-11-12 15:22:01', '2021-11-12 09:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tick_mark_question`
--

CREATE TABLE `tbl_tick_mark_question` (
  `id` int(11) NOT NULL,
  `question_data_id` int(11) NOT NULL,
  `audio_question_description_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `marks` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tick_mark_question`
--

INSERT INTO `tbl_tick_mark_question` (`id`, `question_data_id`, `audio_question_description_id`, `question`, `option_a`, `option_b`, `correct_answer`, `marks`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(14, 255, 0, 'capital of india ?', 'delhi', 'pune', 'A', '2', '1', '0', '2021-11-09 16:14:46', '2021-11-09 10:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topic_list`
--

CREATE TABLE `tbl_topic_list` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_level` varchar(100) NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `topic_name_slug` varchar(100) NOT NULL,
  `topic_content` text NOT NULL,
  `topic_audio` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_topic_list`
--

INSERT INTO `tbl_topic_list` (`id`, `course_id`, `course_level`, `topic_name`, `topic_name_slug`, `topic_content`, `topic_audio`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(17, 26, '1', 'lesson 1', 'lesson-1', 'lesson 1 ', 'e42755c796eb2612e884f75861f48bb9.mp3', '1', '0', '2021-09-14 18:34:17', '2021-09-14 13:04:17'),
(21, 26, '2', '1st lesson', '1st-lesson', '<p> <img src=\"http://127.0.0.1/login/assets/admin/images/summernote_images_topic_data/ef895dd64c65c65a3371eef775c45c8b.png\" style=\"width: 25%;\"></p><p>TOPIC 1</p><p>new thing to do learn</p>', '1d8100ed96587ce8edd184d74d605857.png', '1', '0', '2021-09-15 13:14:21', '2021-09-15 07:44:21'),
(22, 26, '3', 'lesson 1', 'lesson-1', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-15 16:45:36', '2021-09-15 11:15:36'),
(24, 26, '3', 'lesson 1', 'lesson-1', '<p>lesson 1<br></p>', '', '1', '1', '2021-09-18 14:52:09', '2021-09-18 09:22:09'),
(25, 25, '1', 'lesson 1', 'lesson-1', '<div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px; color: rgb(34, 35, 37); font-family: Muli, sans-serif; font-size: 13px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; font-size: 14px; color: rgb(98, 100, 106); line-height: 23px; font-family: Muli, sans-serif;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig</div><p><img src=\"http://127.0.0.1/go_linguistic/assets/admin/images/summernote_images_topic_data/2a553afb1e9b04a6b4b9f3fd30abfc7c.jpg\" style=\"\" class=\"\"></p><div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px; color: rgb(34, 35, 37); font-family: Muli, sans-serif; font-size: 13px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; font-size: 14px; color: rgb(98, 100, 106); line-height: 23px; font-family: Muli, sans-serif;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig</div><div class=\"inner\" style=\"margin: 0px; padding: 0px; font-size: 14px; color: rgb(98, 100, 106); line-height: 23px; font-family: Muli, sans-serif;\"><div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px; color: rgb(34, 35, 37); font-size: 13px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; line-height: 23px;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig</div><div class=\"inner\" style=\"margin: 0px; padding: 0px; line-height: 23px;\"><div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px; color: rgb(34, 35, 37); font-size: 13px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; line-height: 23px;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig</div></div></div>', 'bcc2efcb757847feae2a9eec24e093d4.mp3', '1', '0', '2021-09-23 11:25:01', '2021-09-23 05:55:01'),
(26, 25, '1', ' lesson 2', 'lesson-2', '<div id=\"overview\" class=\"description\" style=\"margin: 0px; padding: 0px; color: rgb(34, 35, 37); font-family: Muli, sans-serif; font-size: 13px;\"><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p><p style=\"margin-bottom: 1rem; padding: 0px; font-size: 15px; color: rgb(98, 100, 106);\">Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div class=\"inner\" style=\"margin: 0px; padding: 0px; font-size: 14px; color: rgb(98, 100, 106); line-height: 23px; font-family: Muli, sans-serif;\">- Wireframes for mobile apps &amp; Website<br style=\"margin: 0px; padding: 0px;\">- Flowcharts for the whole system<br style=\"margin: 0px; padding: 0px;\">- Mobile app prototypes, interactive UI designs<br style=\"margin: 0px; padding: 0px;\">- UI for social media postings<br style=\"margin: 0px; padding: 0px;\">- Desig</div>', '2caf2102262a96044a461162a23057d6.mp3', '1', '0', '2021-09-23 12:43:31', '2021-09-23 07:13:31'),
(27, 25, '1', ' lesson 3', 'lesson-3', '<p> lesson 3<br></p>', 'c86cd82fee8deae110cff74c56ce0cc4.mp3', '1', '0', '2021-09-23 12:48:39', '2021-09-23 07:18:39'),
(28, 25, '2', 'lesson 1', 'lesson-1', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:49:09', '2021-09-23 07:19:09'),
(29, 25, '2', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 12:49:29', '2021-09-23 07:19:29'),
(30, 25, '2', 'lesson 3', 'lesson-3', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:49:54', '2021-09-23 07:19:54'),
(31, 25, '3', 'lesson 1', 'lesson-1', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:50:26', '2021-09-23 07:20:26'),
(32, 25, '3', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 12:51:09', '2021-09-23 07:21:09'),
(33, 25, '3', 'lesson 3', 'lesson-3', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:51:20', '2021-09-23 07:21:20'),
(34, 27, '1', 'lesson 1', 'lesson-1', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:57:39', '2021-09-23 07:27:39'),
(35, 27, '2', 'lesson 1', 'lesson-1', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:57:53', '2021-09-23 07:27:53'),
(36, 27, '3', 'lesson 1', 'lesson-1', '<p>lesson 1<br></p>', '', '1', '0', '2021-09-23 12:58:04', '2021-09-23 07:28:04'),
(37, 27, '1', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 12:58:41', '2021-09-23 07:28:41'),
(38, 27, '2', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 12:58:54', '2021-09-23 07:28:54'),
(39, 27, '3', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 12:59:05', '2021-09-23 07:29:05'),
(40, 27, '1', 'lesson 3', 'lesson-3', '<p>lesson 3<br></p>', '', '1', '0', '2021-09-23 12:59:20', '2021-09-23 07:29:20'),
(41, 27, '2', 'lesson 3', 'lesson-3', '<p>lesson 3<br></p>', '', '1', '0', '2021-09-23 12:59:31', '2021-09-23 07:29:31'),
(42, 27, '3', 'lesson 3', 'lesson-3', '<p>lesson 3<br></p>', '', '1', '0', '2021-09-23 12:59:44', '2021-09-23 07:29:44'),
(43, 26, '1', 'lesson 2', 'lesson-2', '<p><span style=\"white-space:pre\">	</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px;\">महत्व-&nbsp;</span><span style=\"background-color: rgb(246, 246, 246); color: rgb(51, 51, 51); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; font-weight: 400;\">यूं तो भारत में भाई-बहनों के बीच प्रेम और कर्तव्य की भूमिका किसी एक दिन की मोहताज नहीं है पर रक्षाबंधन के ऐतिहासिक और धार्मिक महत्व की वजह से ही यह दिन इतना महत्वपूर्ण बना है। बरसों से चला आ रहा यह त्योहार आज भी बेहद हर्षोल्लास के साथ मनाया जाता है। हिन्दू श्रावण मास (जुलाई-अगस्त) में पूर्णिमा के दिन मनाया जाने वाला यह त्योहार भाई का बहन के प्रति प्यार का प्रतीक है। रक्षाबंधन पर बहनें भाइयों की दाहिनी कलाई में राखी बांधती हैं, उनका तिलक करती हैं और उनसे अपनी रक्षा का संकल्प लेती हैं। हालांकि रक्षाबंधन की व्यापकता इससे भी कहीं ज्यादा है। राखी बांधना सिर्फ भाई-बहन के बीच का कार्यकलाप नहीं रह गया है। राखी देश की रक्षा, पर्यावरण की रक्षा, हितों की रक्षा आदि के लिए भी बांधी जाने लगी है।</span></p><div style=\"color: rgb(51, 51, 51); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(246, 246, 246);\"></div><div style=\"color: rgb(51, 51, 51); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; background-color: rgb(246, 246, 246);\"><span style=\"font-weight: 700;\">इतिहास की नजर से-</span>&nbsp;रक्षाबंधन के त्योहार का इतिहास हिंदू पुराण कथाओं में है। वामनावतार नामक पौराणिक कथा में रक्षाबंधन का प्रसंग मिलता है।</div><p><span style=\"white-space:pre\">				</span></p>', '', '1', '0', '2021-09-23 13:03:41', '2021-09-23 07:33:41'),
(44, 26, '2', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 13:04:29', '2021-09-23 07:34:29'),
(45, 26, '3', 'lesson 2', 'lesson-2', '<p>lesson 2<br></p>', '', '1', '0', '2021-09-23 13:04:41', '2021-09-23 07:34:41'),
(46, 26, '1', 'lesson 3', 'lesson-3', '<p>lesson 3<br></p>', '', '1', '0', '2021-09-23 13:04:58', '2021-09-23 07:34:58'),
(47, 26, '2', 'lesson 3', 'lesson-3', '<p>lesson 3<br></p>', '', '1', '0', '2021-09-23 13:05:08', '2021-09-23 07:35:08'),
(48, 26, '3', 'lesson 3', 'lesson-3', '<p>test<br></p>', '7496adcf5063321b0c93e4e68c21568d.mp3', '1', '0', '2021-09-23 13:05:17', '2021-09-23 07:35:17'),
(49, 26, '1', 'chapter-4', 'chapter-4', '', '', '1', '0', '2021-10-12 10:12:11', '2021-10-12 04:42:11'),
(50, 26, '1', 'chapter-5', 'chapter-5', '', '', '1', '0', '2021-10-12 12:53:29', '2021-10-12 07:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topic_question`
--

CREATE TABLE `tbl_topic_question` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_level` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `marks` varchar(100) NOT NULL,
  `correct_answer` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_topic_question`
--

INSERT INTO `tbl_topic_question` (`id`, `course_id`, `course_level`, `topic_id`, `option_a`, `question`, `option_b`, `option_c`, `option_d`, `marks`, `correct_answer`, `status`, `is_deleted`, `created_on`, `updated_on`) VALUES
(1, 25, 1, 25, 'b', 'a', 'v', 'd', 'h', '1', 'B', '1', '1', '2021-09-29 17:56:23', '2021-09-29 12:26:23'),
(2, 26, 2, 21, 'dvv', 'test1', 'xcv', 'xcv', 'xcvxcv', 'xcvxcv', 'B', '1', '0', '2021-09-29 17:57:22', '2021-09-29 12:27:22'),
(3, 26, 2, 21, 'dgdfgdf', 'xcbbfgbgbcv ', 'fdbbfghf', 'fghfg', 'fgh', 'hfghfgh', 'A', '1', '0', '2021-09-29 17:57:22', '2021-09-29 12:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mobile_number` varchar(1000) NOT NULL,
  `type` enum('0','1','2') NOT NULL COMMENT '0 = admin,',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `mobile_number`, `type`, `created_on`, `updated_on`, `status`, `is_deleted`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '999999999', '0', '2021-05-29 12:52:38', '2021-05-29 07:23:57', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_number` bigint(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile_number`, `is_deleted`, `status`, `created_on`, `updated_on`) VALUES
(10, 'shubham', 'yadav', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 123456782, '0', '0', '2021-09-22 16:25:35', '2021-09-22 10:55:35'),
(12, 'shubham', 'yadav', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 123, '0', '0', '2021-09-23 09:55:42', '2021-09-23 04:25:42'),
(13, 'shubham', 'yadav', 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1234567858, '0', '1', '2021-09-23 19:16:27', '2021-09-23 13:46:27'),
(14, 'Demo', 'demo', 'demo1@gmail.com', 'c33367701511b4f6020ec61ded352059', 1234567895, '0', '1', '2021-09-27 10:49:31', '2021-09-27 05:19:31'),
(15, 'rahul', 'nikad', 'rahul@gmail.com', 'bf58d3ae3a4f63fdc9719204846e3ffd', 7378399622, '0', '1', '2021-10-29 12:43:27', '2021-10-29 07:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_audio_question_description`
--
ALTER TABLE `tbl_audio_question_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fill_in_blank_question`
--
ALTER TABLE `tbl_fill_in_blank_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_final_test_result`
--
ALTER TABLE `tbl_final_test_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_match_the_following`
--
ALTER TABLE `tbl_match_the_following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mcq_question`
--
ALTER TABLE `tbl_mcq_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_one_word_question`
--
ALTER TABLE `tbl_one_word_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_one_word_question_description`
--
ALTER TABLE `tbl_one_word_question_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_one_word_question_old`
--
ALTER TABLE `tbl_one_word_question_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paper_set`
--
ALTER TABLE `tbl_paper_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passage_reading_description`
--
ALTER TABLE `tbl_passage_reading_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passage_reading_question`
--
ALTER TABLE `tbl_passage_reading_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_picture_question`
--
ALTER TABLE `tbl_picture_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_picture_question_description`
--
ALTER TABLE `tbl_picture_question_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question_data`
--
ALTER TABLE `tbl_question_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_test`
--
ALTER TABLE `tbl_student_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tick_mark_question`
--
ALTER TABLE `tbl_tick_mark_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_topic_list`
--
ALTER TABLE `tbl_topic_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_topic_question`
--
ALTER TABLE `tbl_topic_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audio_question_description`
--
ALTER TABLE `tbl_audio_question_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_fill_in_blank_question`
--
ALTER TABLE `tbl_fill_in_blank_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_final_test_result`
--
ALTER TABLE `tbl_final_test_result`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_match_the_following`
--
ALTER TABLE `tbl_match_the_following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_mcq_question`
--
ALTER TABLE `tbl_mcq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_one_word_question`
--
ALTER TABLE `tbl_one_word_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_one_word_question_description`
--
ALTER TABLE `tbl_one_word_question_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_one_word_question_old`
--
ALTER TABLE `tbl_one_word_question_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paper_set`
--
ALTER TABLE `tbl_paper_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_passage_reading_description`
--
ALTER TABLE `tbl_passage_reading_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_passage_reading_question`
--
ALTER TABLE `tbl_passage_reading_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_picture_question`
--
ALTER TABLE `tbl_picture_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_picture_question_description`
--
ALTER TABLE `tbl_picture_question_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_question_data`
--
ALTER TABLE `tbl_question_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `tbl_student_test`
--
ALTER TABLE `tbl_student_test`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_tick_mark_question`
--
ALTER TABLE `tbl_tick_mark_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_topic_list`
--
ALTER TABLE `tbl_topic_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_topic_question`
--
ALTER TABLE `tbl_topic_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
