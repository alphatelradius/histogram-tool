-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 11:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tool_histogram`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_automate`
--

CREATE TABLE IF NOT EXISTS `his_automate` (
`id` int(11) NOT NULL,
  `info` text NOT NULL,
  `file_result` varchar(200) NOT NULL,
  `end_process` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=567 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_automate`
--

INSERT INTO `his_automate` (`id`, `info`, `file_result`, `end_process`) VALUES
(258, 'ccs', '', '2015-03-19 04:14:43'),
(264, 'cek', '', '2015-03-19 06:09:25'),
(265, 'ccc', '', '2015-03-19 06:11:27'),
(267, 'new presentation', '', '2015-03-19 07:16:00'),
(268, 'hallo', '', '2015-03-19 07:17:16'),
(269, 'halo', '', '2015-03-19 07:17:51'),
(270, 'cewk', '', '2015-03-19 07:18:36'),
(271, 'halo', '', '2015-03-19 07:20:40'),
(272, 'pppttttt', '', '2015-03-19 07:23:55'),
(275, 'Presentation Ec Io', '', '2015-03-19 07:32:01'),
(276, 'cek lagi', '', '2015-03-19 07:33:09'),
(277, 'Presentation Today', '2015-03-19/result-presentation-today', '2015-03-19 07:36:09'),
(278, 'Halo apa kabar?', '2015-03-19/result-halo-apa-kabar', '2015-03-19 07:37:17'),
(289, 'cek EC IO', '2015-03-20/20150320104944_cek-ec-io', '2015-03-20 10:49:44'),
(290, 'cek ec io', '2015-03-20/20150320105210_cek-ec-io', '2015-03-20 10:52:10'),
(291, 'RSRP coba', '', '2015-03-20 11:08:03'),
(296, 'just trial', '', '2015-03-20 11:42:40'),
(305, '', '', '2015-03-23 00:47:08'),
(306, '', '', '2015-03-23 04:27:11'),
(307, '', '', '2015-03-23 04:29:57'),
(308, '', '', '2015-03-23 04:34:09'),
(309, '', '', '2015-03-23 04:35:09'),
(310, '', '', '2015-03-23 04:35:44'),
(318, '', '', '2015-03-23 07:52:02'),
(319, '', '', '2015-03-23 07:57:47'),
(320, '', '', '2015-03-23 08:03:15'),
(335, 'tes', '', '2015-03-23 13:15:59'),
(338, 'coba lagi', '', '2015-03-23 13:50:53'),
(339, '', '', '2015-03-24 06:40:45'),
(341, '', '', '2015-03-25 05:04:03'),
(343, 'title manual', '', '2015-03-25 10:49:04'),
(344, 'title manual', '', '2015-03-25 10:49:10'),
(347, 'cobacoba', '', '2015-03-25 14:15:05'),
(348, 'perime', '', '2015-03-25 14:19:21'),
(349, 'lagi', '', '2015-03-25 14:27:34'),
(350, 'lagiii', '', '2015-03-25 14:36:34'),
(351, '', '', '2015-03-25 20:08:45'),
(352, 'TEST', '', '2015-03-25 20:15:04'),
(353, '', '', '2015-03-25 20:20:06'),
(354, 'TEST', '', '2015-03-25 20:23:04'),
(355, '', '', '2015-03-25 20:26:48'),
(356, '', '', '2015-03-25 20:27:47'),
(357, '', '', '2015-03-25 20:38:40'),
(358, 'TEST', '', '2015-03-25 20:40:02'),
(359, 'TEST', '', '2015-03-25 20:40:16'),
(360, 'TEST', '', '2015-03-25 20:41:34'),
(361, 'TEST', '', '2015-03-25 20:44:50'),
(362, 'test', '', '2015-03-25 20:56:02'),
(363, '', '', '2015-03-25 20:58:30'),
(364, '', '', '2015-03-25 21:00:54'),
(365, '', '', '2015-03-25 21:02:08'),
(366, '', '', '2015-03-25 21:02:20'),
(367, '', '', '2015-03-25 21:02:35'),
(368, 'coba', '', '2015-03-25 21:09:44'),
(369, 'coba lagi', '', '2015-03-25 21:12:41'),
(370, 'coba coba', '', '2015-03-25 21:17:14'),
(371, 'try', '', '2015-03-25 21:24:07'),
(373, '', '', '2015-03-25 22:32:04'),
(374, '4383 Sc', '', '2015-03-25 22:33:29'),
(375, 'test', '', '2015-03-25 22:42:06'),
(376, 'lev a', '', '2015-03-25 22:43:26'),
(377, 'a', '', '2015-03-25 22:44:09'),
(378, '1', '', '2015-03-25 22:47:52'),
(379, '1', '', '2015-03-25 22:48:17'),
(380, 'test 1', '', '2015-03-25 22:54:49'),
(381, 'test 1', '', '2015-03-25 22:55:03'),
(382, 'lev 1', '', '2015-03-25 22:56:04'),
(383, 'coba', '', '2015-03-25 22:57:10'),
(384, 'wes', '', '2015-03-25 22:58:50'),
(385, 'asw', '', '2015-03-25 23:02:42'),
(386, 'ws', '', '2015-03-25 23:03:57'),
(388, 'Mba Dewi', '', '2015-03-25 23:11:55'),
(389, 'test w', '', '2015-03-25 23:13:23'),
(390, 'coba', '', '2015-03-25 23:14:39'),
(391, 'test', '', '2015-03-25 23:17:47'),
(394, 'Level A Ing-Eg', '', '2015-03-26 01:31:52'),
(398, '', '', '2015-03-26 03:26:32'),
(399, 'lagi ya', '', '2015-03-26 03:31:09'),
(400, 'terusan', '', '2015-03-26 03:34:38'),
(401, 'terusan', '', '2015-03-26 03:36:31'),
(402, '', '', '2015-03-26 03:37:34'),
(403, 'diam', '', '2015-03-26 03:43:29'),
(404, '', '', '2015-03-26 03:47:30'),
(405, 'we', '', '2015-03-26 03:50:57'),
(406, '', '', '2015-03-26 03:52:26'),
(407, '', '', '2015-03-26 03:53:18'),
(408, '', '', '2015-03-26 03:57:10'),
(410, '', '', '2015-03-26 03:59:47'),
(418, 'Level A', '2015-03-26/20150326065640_level-a', '2015-03-26 06:56:40'),
(419, 'Level B', '', '2015-03-26 07:03:52'),
(420, 'Level B', '', '2015-03-26 07:38:02'),
(434, 'aaaaaaaaaaaaaa', '', '2015-03-27 03:21:21'),
(438, 'Femto Level3', '', '2015-03-27 10:22:13'),
(439, 'Femto Level3', '', '2015-03-27 10:22:26'),
(440, 'cob', '', '2015-03-27 10:29:02'),
(468, 'Doc building RSRP ch. 2000', '', '2015-04-10 02:16:09'),
(470, '', '', '2015-04-10 02:21:35'),
(472, 'meida', '', '2015-04-10 02:30:40'),
(473, 'rsrp', '', '2015-04-10 02:32:58'),
(474, 'main BLD 8th floor LTE 5780 new', '', '2015-04-10 02:38:57'),
(491, 'main building SectionC F2 LTE 700 Scan - Ch.5780', '', '2015-04-13 02:19:36'),
(492, 'main building SectionC F2 LTE 700 Scan - Ch.5780', '', '2015-04-13 02:21:11'),
(493, 'main building sectionC F2 LTE 700 Scan - Ch.5780', '', '2015-04-13 02:28:19'),
(502, ' Add New Process Bellow (Manual Mode)\r\n', '', '2015-04-14 05:25:30'),
(504, 'edefred', '', '2015-04-14 05:35:14'),
(505, 'we', '', '2015-04-14 05:38:20'),
(506, 'sdewdsw', '', '2015-04-14 06:06:59'),
(507, 'test wilis', '', '2015-04-15 13:08:10'),
(510, '', '', '2015-04-15 13:40:31'),
(511, '', '', '2015-04-15 13:41:09'),
(512, 'Autrium Perimeter receiver', '', '2015-04-15 19:12:27'),
(513, '1111111111111111111111111', '', '2015-04-15 19:13:51'),
(514, 'test 1', '', '2015-04-15 19:19:29'),
(515, 'aaaaaaaaaaaaaaaaaa', '', '2015-04-15 19:26:14'),
(518, 'UMTS Atrium Perimeter', '', '2015-04-16 00:12:43'),
(519, 'umts atrium test', '', '2015-04-16 00:16:05'),
(520, 'umts atrium', '', '2015-04-16 00:24:43'),
(521, 'LTE Atrium Perimeter', '2015-04-16/20150416122737_lte-atrium-perimeter', '2015-04-16 00:27:37'),
(522, 'LTE Basement', '2015-04-16/20150416124103_lte-basement', '2015-04-16 00:41:03'),
(523, 'LTE H Perimeter', '2015-04-16/20150416125016_lte-h-perimeter', '2015-04-16 00:50:16'),
(524, 'LTE', '2015-04-16/20150416125243_lte', '2015-04-16 00:52:43'),
(525, 'LTE Floor 2', '2015-04-16/20150416125453_lte-floor-2', '2015-04-16 00:54:53'),
(526, 'LTE Floor 3', '2015-04-16/20150416125622_lte-floor-3', '2015-04-16 00:56:22'),
(527, 'LTE Floor 6', '2015-04-16/20150416125734_lte-floor-6', '2015-04-16 00:57:34'),
(528, 'LTE Ingress Egress', '2015-04-16/20150416125939_lte-ingress-egress', '2015-04-16 00:59:39'),
(529, 'UMTS Atrium Perimeter', '', '2015-04-16 01:01:30'),
(530, 'gbrfbvr', '', '2015-04-16 01:19:55'),
(531, 'gbrfbvr', '', '2015-04-16 01:20:12'),
(532, 'gbrfbvr', '', '2015-04-16 01:21:20'),
(533, 'gbrfbvr', '', '2015-04-16 01:22:16'),
(534, 'gbrfbvr', '', '2015-04-16 01:23:03'),
(535, 'UMTS Atrium Perimeter', '2015-04-16/20150416012733_umts-atrium-perimeter', '2015-04-16 01:27:34'),
(536, 'Receiver Atrium Perimeter', '2015-04-16/20150416013417_receiver-atrium-perimeter', '2015-04-16 01:34:17'),
(537, 'receiver', '', '2015-04-16 01:35:06'),
(538, 'receiver', '', '2015-04-16 01:35:17'),
(539, 'Receiver Basement', '2015-04-16/20150416013707_receiver-basement', '2015-04-16 01:37:07'),
(540, 'UMTS Basement', '2015-04-16/20150416013849_umts-basement', '2015-04-16 01:38:50'),
(541, 'Building H Perimeter', '', '2015-04-16 01:40:24'),
(542, 'Receiver Building H Perimeter', '2015-04-16/20150416014105_receiver-building-h-perimeter', '2015-04-16 01:41:05'),
(543, 'UMTS Building H Perimeter', '2015-04-16/20150416014234_umts-building-h-perimeter', '2015-04-16 01:42:34'),
(544, 'Receiver 1st Floor', '', '2015-04-16 01:43:49'),
(545, 'Receiver 1st Floor', '', '2015-04-16 01:44:19'),
(546, 'UMTS 1st Floor', '2015-04-16/20150416014524_umts-1st-floor', '2015-04-16 01:45:25'),
(547, 'Receiver 1st Floor', '', '2015-04-16 01:47:34'),
(548, 'Receiver 1st Floor', '', '2015-04-16 01:48:13'),
(549, 'receiver 1st floor', '', '2015-04-16 01:49:47'),
(550, 'receiver 1st floor', '', '2015-04-16 01:54:24'),
(551, 'Receiver 1st Floor', '2015-04-16/20150416015519_receiver-1st-floor', '2015-04-16 01:55:19'),
(552, 'Receiver 2nd Floor', '', '2015-04-16 01:56:48'),
(553, 'UMTS 2nd Floor', '2015-04-16/20150416020106_umts-2nd-floor', '2015-04-16 02:01:06'),
(554, 'UMTS 3rd Floor', '2015-04-16/20150416020242_umts-3rd-floor', '2015-04-16 02:02:42'),
(555, 'Receiver 3rd Floor', '2015-04-16/20150416020429_receiver-3rd-floor', '2015-04-16 02:04:29'),
(556, 'Receiver 6th Floor', '', '2015-04-16 02:06:14'),
(557, 'UMTS 6th Floor', '2015-04-16/20150416020744_umts-6th-floor', '2015-04-16 02:07:44'),
(558, 'Ingress Egress Receiver', '', '2015-04-16 02:09:17'),
(559, 'UMTS Ingress Egress', '2015-04-16/20150416021007_umts-ingress-egress', '2015-04-16 02:10:08'),
(560, 'Receiver 6th Floor', '', '2015-04-16 02:13:39'),
(561, 'Receiver 2nd Floor', '2015-04-16/20150416022452_receiver-2nd-floor', '2015-04-16 02:24:52'),
(562, 'Receiver 6th Floor', '2015-04-16/20150416022745_receiver-6th-floor', '2015-04-16 02:27:45'),
(563, 'LTE 1st Floor', '2015-04-16/20150416023751_lte-1st-floor', '2015-04-16 02:37:51'),
(564, 'LTE 1st Floor', '2015-04-16/20150416031539_lte-1st-floor', '2015-04-16 03:15:40'),
(565, 'receiver ingress egress', '', '2015-04-16 03:56:18'),
(566, 'Receiver Ingress Egress', '2015-04-16/20150416035909_receiver-ingress-egress', '2015-04-16 03:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `his_file`
--

CREATE TABLE IF NOT EXISTS `his_file` (
`id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=532 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_file`
--

INSERT INTO `his_file` (`id`, `filename`, `uploaded_at`) VALUES
(26, '2015-03-19/UMTS 850 Scan - Ch.4358 ECIO.xlsx', '2015-03-18 18:54:01'),
(27, '2015-03-19/UMTS Ch. 437 ecio UE.xls', '2015-03-18 19:57:30'),
(51, '2015-03-20/UMTS 850 Scan - Ch.4358 ECIO.xlsx', '2015-03-20 04:27:02'),
(59, '2015-03-20/UMTS 850 Scan - Ch.4458 RX.xlsx', '2015-03-20 04:27:03'),
(62, '2015-03-20/UMTS 850 Ue - Ch.4358 RX.xlsx', '2015-03-20 04:27:03'),
(63, '2015-03-20/UMTS 850 Ue - Ch.4458 ECIO.xlsx', '2015-03-20 04:27:04'),
(108, '2015-03-23/UMTS 850 Scan - Ch.4358 RX.xlsx', '2015-03-23 00:35:25'),
(143, '2015-03-25/UMTS Scan 4358 RSCP.xlsx', '2015-03-24 21:13:42'),
(234, '2015-03-27/aaaaaaaaaaaaaaaaaaaaaaaaaaaa.xlsx', '2015-03-26 20:22:27'),
(301, '2015-04-07/LTE Scan 5780 CINR.xlsx', '2015-04-06 21:36:36'),
(324, '2015-04-08/UMTS Ch.4381 RSCP.xlsx', '2015-04-07 21:53:47'),
(327, '2015-04-08/UMTS Ch.4381 RSCP.xlsx', '2015-04-07 22:02:22'),
(329, '2015-04-08/UMTS Ch.4381 RSCP.xlsx', '2015-04-07 22:06:01'),
(332, '2015-04-08/UMTS Ch.4381 RSCP.xlsx', '2015-04-07 22:11:55'),
(335, '2015-04-08/UMTS Ch.4381 RSCP.xlsx', '2015-04-07 22:14:35'),
(338, '2015-04-08/UMTS CH.4381 RSCP.xlsx', '2015-04-07 22:17:01'),
(347, '2015-04-08/LTE RSRP.xlsx', '2015-04-08 00:05:50'),
(365, '2015-04-09/LTE RSRP.xlsx', '2015-04-08 18:24:39'),
(369, '2015-04-09/LTE RSRP.xlsx', '2015-04-08 18:26:46'),
(371, '2015-04-09/LTE RSRP.xlsx', '2015-04-08 18:30:36'),
(374, '2015-04-09/LTE RSRP.xlsx', '2015-04-08 18:35:01'),
(378, '2015-04-09/LTE RSRP.xlsx', '2015-04-08 18:38:22'),
(495, '2015-04-16/UMTS Autrium Perimeter 2.xlsx', '2015-04-16 05:24:23'),
(496, '2015-04-16/LTE Autrium Perimeter.xlsx', '2015-04-16 05:26:17'),
(497, '2015-04-16/LTE basement.xlsx', '2015-04-16 05:29:06'),
(498, '2015-04-16/LTE basement.xlsx', '2015-04-16 05:40:13'),
(499, '2015-04-16/LTE H perimeter.xlsx', '2015-04-16 05:47:17'),
(500, '2015-04-16/LTE floor 1.xlsx', '2015-04-16 05:52:00'),
(501, '2015-04-16/LTE floor 2.xlsx', '2015-04-16 05:54:08'),
(502, '2015-04-16/LTE floor 3.xlsx', '2015-04-16 05:55:35'),
(503, '2015-04-16/LTE floor 6.xlsx', '2015-04-16 05:57:07'),
(504, '2015-04-16/LTE Ing-Eg.xlsx', '2015-04-16 05:58:30'),
(505, '2015-04-16/UMTS Autrium Perimeter.xlsx', '2015-04-15 18:00:51'),
(506, '2015-04-16/UMTS Autrium Perimeter.xlsx', '2015-04-15 18:21:58'),
(507, '2015-04-16/UMTS Autrium Perimeter.xlsx', '2015-04-15 18:24:27'),
(508, '2015-04-16/receiver Autrium Perimeter.xlsx', '2015-04-15 18:30:46'),
(509, '2015-04-16/receiver basement.xlsx', '2015-04-15 18:36:30'),
(510, '2015-04-16/UMTS basement.xlsx', '2015-04-15 18:38:14'),
(511, '2015-04-16/Receiver H perimeter.xlsx', '2015-04-15 18:39:51'),
(512, '2015-04-16/UMTS H perimeter.xlsx', '2015-04-15 18:41:52'),
(513, '2015-04-16/receiver floor 1.xlsx', '2015-04-15 18:43:16'),
(514, '2015-04-16/UMTS floor 1.xlsx', '2015-04-15 18:44:43'),
(515, '2015-04-16/receiver floor 1.xlsx', '2015-04-15 18:46:06'),
(516, '2015-04-16/receiver floor 1.xlsx', '2015-04-15 18:54:34'),
(517, '2015-04-16/receiver floor 2.xlsx', '2015-04-15 18:56:21'),
(518, '2015-04-16/UMTS floor 2.xlsx', '2015-04-15 19:00:37'),
(519, '2015-04-16/UMTS floor 3.xlsx', '2015-04-15 19:01:59'),
(520, '2015-04-16/receiver floor 3.xlsx', '2015-04-15 19:03:47'),
(521, '2015-04-16/receiver floor 6.xlsx', '2015-04-15 19:05:29'),
(522, '2015-04-16/UMTS floor 6.xlsx', '2015-04-15 19:06:35'),
(523, '2015-04-16/receiver Ing-Eg.xlsx', '2015-04-15 19:08:41'),
(524, '2015-04-16/UMTS Ing-Eg.xlsx', '2015-04-15 19:09:28'),
(525, '2015-04-16/receiver floor 6.xlsx', '2015-04-15 19:13:09'),
(526, '2015-04-16/receiver floor 2.xlsx', '2015-04-15 19:24:17'),
(527, '2015-04-16/receiver floor 6.xlsx', '2015-04-15 19:27:10'),
(528, '2015-04-16/LTE floor 1.xlsx', '2015-04-15 19:36:40'),
(529, '2015-04-16/LTE floor 1.xlsx', '2015-04-15 20:14:51'),
(530, '2015-04-16/receiver Ing-Eg.xlsx', '2015-04-15 20:55:51'),
(531, '2015-04-16/receiver Ing-Eg.xlsx', '2015-04-15 20:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `his_log_chart`
--

CREATE TABLE IF NOT EXISTS `his_log_chart` (
`id` int(11) NOT NULL,
  `id_plot` int(11) NOT NULL,
  `id_result` int(11) NOT NULL,
  `title` text NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_log_chart`
--

INSERT INTO `his_log_chart` (`id`, `id_plot`, `id_result`, `title`, `filename`) VALUES
(16, 1, 278, 'Histogram', '/charts/2015-03-19/60-150319073716.png'),
(17, 3, 278, 'Histogram', '/charts/2015-03-19/928-150319073716.png'),
(34, 7, 289, ' Metric:UMTSDominantPilotEcIo, UMTS 850 Ue - Ch.4458, Min:-17.00, Max:-5.50, Avg:-12.16, Standard Deviation:2.67', '/charts/2015-03-20/545-150320104943.png'),
(35, 7, 290, ' Metric:UMTSRxPower, UMTS 1900 Scan - Ch.587, Min:-105.31, Max:-67.98, Avg:-94.77, Standard Deviation:7.04', '/charts/2015-03-20/977-150320105209.png'),
(476, 6, 418, 'Femto Scan -  Ch.612 RSRP Histogram ', '/charts/2015-03-26/887-150326065635.png'),
(477, 5, 418, 'LTE 700 Ue – EARFCN 5780 SINR Histogram ', '/charts/2015-03-26/73-150326065635.png'),
(478, 6, 418, 'LTE 700 Ue – EARFCN 5780 RSSI Histogram ', '/charts/2015-03-26/447-150326065635.png'),
(479, 4, 418, 'LTE 700 Ue – EARFCN 5780 RSRP Histogram ', '/charts/2015-03-26/804-150326065635.png'),
(480, 7, 418, 'UMTS 1900 Ue – UARFCN 587  Ec/Io Histogram ', '/charts/2015-03-26/254-150326065635.png'),
(481, 1, 418, 'UMTS 1900 Ue – UARFCN 587  Io (RSSI) Histogram ', '/charts/2015-03-26/773-150326065635.png'),
(482, 3, 418, 'UMTS 1900 Ue – UARFCN 587 Ec (RSCP) Histogram ', '/charts/2015-03-26/361-150326065636.png'),
(483, 7, 418, 'UMTS 850 Ue – UARFCN 4458 Ec/Io Histogram ', '/charts/2015-03-26/869-150326065636.png'),
(484, 1, 418, 'UMTS 850 Ue – UARFCN 4458 Io (RSSI) Histogram ', '/charts/2015-03-26/764-150326065636.png'),
(485, 3, 418, 'UMTS 850 Ue – UARFCN 4458 Ec (RSCP) Histogram ', '/charts/2015-03-26/955-150326065636.png'),
(486, 7, 418, 'UMTS 850 Ue – UARFCN 4383  Ec/Io Histogram ', '/charts/2015-03-26/815-150326065636.png'),
(487, 1, 418, 'UMTS 850 Ue – UARFCN 4383  Io (RSSI) Histogram ', '/charts/2015-03-26/156-150326065636.png'),
(488, 3, 418, 'UMTS 850 Ue – UARFCN 4383 Ec (RSCP) Histogram ', '/charts/2015-03-26/254-150326065636.png'),
(489, 7, 418, 'UMTS 850 Ue  – UARFCN 4358  Ec/Io Histogram ', '/charts/2015-03-26/860-150326065636.png'),
(490, 3, 418, 'UMTS 850 Ue  – UARFCN 4358  Io (RSSI) Histogram ', '/charts/2015-03-26/392-150326065636.png'),
(491, 1, 418, 'UMTS 850 Ue – UARFCN 4358 Ec (RSCP) Histogram ', '/charts/2015-03-26/325-150326065637.png'),
(492, 5, 418, 'LTE 1900 Scan – EARFCN 1025 SINR Histogram ', '/charts/2015-03-26/54-150326065637.png'),
(493, 6, 418, 'LTE 1900 Scan – EARFCN 1025 RSSI Histogram ', '/charts/2015-03-26/513-150326065637.png'),
(494, 4, 418, 'LTE 1900 Scan – EARFCN 1025 RSRP Histogram ', '/charts/2015-03-26/53-150326065637.png'),
(495, 5, 418, 'LTE 850 Scan – EARFCN 2576 SINR Histogram ', '/charts/2015-03-26/309-150326065637.png'),
(496, 6, 418, 'LTE 850 Scan – EARFCN 2576 RSSI Histogram ', '/charts/2015-03-26/949-150326065637.png'),
(497, 4, 418, 'LTE 850 Scan – EARFCN 2576 RSRP Histogram ', '/charts/2015-03-26/682-150326065637.png'),
(498, 5, 418, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-03-26/344-150326065637.png'),
(499, 6, 418, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-03-26/536-150326065638.png'),
(500, 4, 418, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-03-26/836-150326065638.png'),
(501, 7, 418, 'UMTS 1900 Scan – UARFCN 587  Ec/Io Histogram ', '/charts/2015-03-26/141-150326065638.png'),
(502, 1, 418, 'UMTS 1900 Scan – UARFCN 587  Io (RSSI) Histogram ', '/charts/2015-03-26/588-150326065638.png'),
(503, 3, 418, 'UMTS 1900 Scan – UARFCN 587 Ec (RSCP) Histogram ', '/charts/2015-03-26/901-150326065638.png'),
(504, 7, 418, 'UMTS 850 Scan – UARFCN 4458 Ec/Io Histogram ', '/charts/2015-03-26/522-150326065638.png'),
(505, 1, 418, 'UMTS 850 Scan – UARFCN 4458 Io (RSSI) Histogram ', '/charts/2015-03-26/97-150326065638.png'),
(506, 3, 418, 'UMTS 850 Scan – UARFCN 4458 Ec (RSCP) Histogram ', '/charts/2015-03-26/269-150326065638.png'),
(507, 7, 418, 'UMTS 850 Scan – UARFCN 4383  Ec/Io Histogram ', '/charts/2015-03-26/642-150326065639.png'),
(508, 1, 418, 'UMTS 850 Scan – UARFCN 4383  Io (RSSI) Histogram ', '/charts/2015-03-26/718-150326065639.png'),
(509, 3, 418, 'UMTS 850 Scan – UARFCN 4383 Ec (RSCP) Histogram ', '/charts/2015-03-26/161-150326065639.png'),
(510, 7, 418, 'UMTS 850 Scan – UARFCN 4358  Ec/Io Histogram ', '/charts/2015-03-26/508-150326065639.png'),
(511, 1, 418, 'UMTS 850 Scan – UARFCN 4358  Io (RSSI) Histogram ', '/charts/2015-03-26/161-150326065639.png'),
(512, 3, 418, 'UMTS 850 Scan – UARFCN 4358 Ec (RSCP) Histogram ', '/charts/2015-03-26/537-150326065639.png'),
(865, 4, 521, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/101-150416122736.png'),
(866, 6, 521, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/282-150416122736.png'),
(867, 5, 521, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/487-150416122736.png'),
(868, 4, 521, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/49-150416122736.png'),
(869, 6, 521, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/939-150416122736.png'),
(870, 5, 521, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/675-150416122736.png'),
(871, 4, 522, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/497-150416124102.png'),
(872, 6, 522, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/509-150416124102.png'),
(873, 5, 522, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/612-150416124102.png'),
(874, 4, 522, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/587-150416124102.png'),
(875, 6, 522, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/64-150416124103.png'),
(876, 5, 522, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/208-150416124103.png'),
(877, 4, 523, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/751-150416125015.png'),
(878, 6, 523, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/724-150416125016.png'),
(879, 5, 523, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/653-150416125016.png'),
(880, 4, 523, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/283-150416125016.png'),
(881, 6, 523, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/239-150416125016.png'),
(882, 5, 523, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/286-150416125016.png'),
(883, 4, 524, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/703-150416125242.png'),
(884, 6, 524, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/121-150416125242.png'),
(885, 5, 524, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/801-150416125243.png'),
(886, 4, 524, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/342-150416125243.png'),
(887, 6, 524, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/646-150416125243.png'),
(888, 5, 524, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/21-150416125243.png'),
(889, 4, 525, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/607-150416125452.png'),
(890, 6, 525, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/766-150416125452.png'),
(891, 5, 525, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/527-150416125452.png'),
(892, 4, 525, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/472-150416125452.png'),
(893, 6, 525, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/556-150416125452.png'),
(894, 5, 525, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/719-150416125452.png'),
(895, 4, 526, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/640-150416125621.png'),
(896, 6, 526, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/579-150416125621.png'),
(897, 5, 526, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/732-150416125621.png'),
(898, 4, 526, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/310-150416125621.png'),
(899, 6, 526, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/899-150416125622.png'),
(900, 5, 526, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/647-150416125622.png'),
(901, 4, 527, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/907-150416125733.png'),
(902, 6, 527, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/217-150416125733.png'),
(903, 5, 527, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/395-150416125734.png'),
(904, 4, 527, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/469-150416125734.png'),
(905, 6, 527, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/286-150416125734.png'),
(906, 5, 527, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/684-150416125734.png'),
(907, 4, 528, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/65-150416125938.png'),
(908, 6, 528, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/893-150416125939.png'),
(909, 5, 528, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/768-150416125939.png'),
(910, 4, 528, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/396-150416125939.png'),
(911, 6, 528, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/755-150416125939.png'),
(912, 5, 528, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/506-150416125939.png'),
(913, 3, 535, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/867-150416012732.png'),
(914, 1, 535, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/432-150416012732.png'),
(915, 7, 535, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/396-150416012732.png'),
(916, 3, 535, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/420-150416012732.png'),
(917, 1, 535, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/132-150416012732.png'),
(918, 7, 535, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/236-150416012733.png'),
(919, 3, 535, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/905-150416012733.png'),
(920, 1, 535, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/248-150416012733.png'),
(921, 7, 535, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/669-150416012733.png'),
(922, 1, 536, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/404-150416013417.png'),
(923, 1, 539, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/86-150416013707.png'),
(924, 3, 540, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/622-150416013848.png'),
(925, 1, 540, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/791-150416013848.png'),
(926, 7, 540, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/247-150416013848.png'),
(927, 3, 540, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/365-150416013848.png'),
(928, 1, 540, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/935-150416013848.png'),
(929, 7, 540, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/957-150416013849.png'),
(930, 3, 540, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/519-150416013849.png'),
(931, 1, 540, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/835-150416013849.png'),
(932, 7, 540, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/682-150416013849.png'),
(933, 1, 542, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/174-150416014104.png'),
(934, 3, 543, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/683-150416014232.png'),
(935, 1, 543, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/313-150416014233.png'),
(936, 7, 543, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/926-150416014233.png'),
(937, 3, 543, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/50-150416014233.png'),
(938, 1, 543, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/219-150416014233.png'),
(939, 7, 543, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/475-150416014233.png'),
(940, 3, 543, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/434-150416014233.png'),
(941, 1, 543, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/837-150416014233.png'),
(942, 7, 543, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/728-150416014233.png'),
(943, 3, 546, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/306-150416014523.png'),
(944, 1, 546, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/319-150416014523.png'),
(945, 7, 546, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/317-150416014523.png'),
(946, 3, 546, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/223-150416014523.png'),
(947, 1, 546, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/709-150416014523.png'),
(948, 7, 546, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/494-150416014523.png'),
(949, 3, 546, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/351-150416014524.png'),
(950, 1, 546, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/558-150416014524.png'),
(951, 7, 546, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/196-150416014524.png'),
(952, 1, 551, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/991-150416015518.png'),
(953, 3, 553, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/542-150416020105.png'),
(954, 1, 553, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/606-150416020105.png'),
(955, 7, 553, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/112-150416020105.png'),
(956, 3, 553, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/628-150416020105.png'),
(957, 1, 553, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/313-150416020105.png'),
(958, 7, 553, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/981-150416020105.png'),
(959, 3, 553, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/634-150416020106.png'),
(960, 1, 553, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/893-150416020106.png'),
(961, 7, 553, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/998-150416020106.png'),
(962, 3, 554, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/481-150416020240.png'),
(963, 1, 554, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/900-150416020240.png'),
(964, 7, 554, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/988-150416020241.png'),
(965, 3, 554, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/685-150416020241.png'),
(966, 1, 554, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/665-150416020241.png'),
(967, 7, 554, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/815-150416020241.png'),
(968, 3, 554, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/395-150416020241.png'),
(969, 1, 554, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/906-150416020241.png'),
(970, 7, 554, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/594-150416020241.png'),
(971, 1, 555, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/101-150416020429.png'),
(972, 3, 557, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/144-150416020742.png'),
(973, 1, 557, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/994-150416020742.png'),
(974, 7, 557, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/765-150416020742.png'),
(975, 3, 557, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/137-150416020743.png'),
(976, 1, 557, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/401-150416020743.png'),
(977, 7, 557, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/808-150416020743.png'),
(978, 3, 557, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/900-150416020743.png'),
(979, 1, 557, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/956-150416020743.png'),
(980, 7, 557, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/823-150416020743.png'),
(981, 3, 559, 'UMTS 850 Scan – UARFCN 4435 Ec (RSCP) Histogram ', '/charts/2015-04-16/217-150416021006.png'),
(982, 1, 559, 'UMTS 850 Scan – UARFCN 4435  Io (RSSI) Histogram ', '/charts/2015-04-16/202-150416021006.png'),
(983, 7, 559, 'UMTS 850 Scan – UARFCN 4435  Ec/Io Histogram ', '/charts/2015-04-16/196-150416021006.png'),
(984, 3, 559, 'UMTS 1900 Scan – UARFCN 662 Ec (RSCP) Histogram ', '/charts/2015-04-16/770-150416021006.png'),
(985, 1, 559, 'UMTS 1900 Scan – UARFCN 662  Io (RSSI) Histogram ', '/charts/2015-04-16/170-150416021007.png'),
(986, 7, 559, 'UMTS 1900 Scan – UARFCN 662  Ec/Io Histogram ', '/charts/2015-04-16/559-150416021007.png'),
(987, 3, 559, 'UMTS 1900 Scan – UARFCN 512 Ec (RSCP) Histogram ', '/charts/2015-04-16/920-150416021007.png'),
(988, 1, 559, 'UMTS 1900 Scan – UARFCN 512  Io (RSSI) Histogram ', '/charts/2015-04-16/984-150416021007.png'),
(989, 7, 559, 'UMTS 1900 Scan – UARFCN 512  Ec/Io Histogram ', '/charts/2015-04-16/904-150416021007.png'),
(990, 1, 561, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/131-150416022452.png'),
(991, 1, 562, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/989-150416022745.png'),
(992, 4, 563, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/978-150416023750.png'),
(993, 6, 563, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/811-150416023750.png'),
(994, 5, 563, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/426-150416023750.png'),
(995, 4, 563, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/321-150416023750.png'),
(996, 6, 563, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/851-150416023750.png'),
(997, 5, 563, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/149-150416023750.png'),
(998, 4, 564, 'LTE 700 Scan – EARFCN 5780 RSRP Histogram ', '/charts/2015-04-16/429-150416031539.png'),
(999, 6, 564, 'LTE 700 Scan – EARFCN 5780 RSSI Histogram ', '/charts/2015-04-16/129-150416031539.png'),
(1000, 5, 564, 'LTE 700 Scan – EARFCN 5780 SINR Histogram ', '/charts/2015-04-16/210-150416031539.png'),
(1001, 4, 564, 'LTE 2100 Scan – EARFCN 2000 RSRP Histogram ', '/charts/2015-04-16/638-150416031539.png'),
(1002, 6, 564, 'LTE 2100 Scan – EARFCN 2000 RSSI Histogram ', '/charts/2015-04-16/607-150416031539.png'),
(1003, 5, 564, 'LTE 2100 Scan – EARFCN 2000 SINR Histogram ', '/charts/2015-04-16/428-150416031539.png'),
(1004, 1, 566, 'Femto Scan -  Ch.612 RSSI Histogram ', '/charts/2015-04-16/691-150416035909.png');

-- --------------------------------------------------------

--
-- Table structure for table `his_plot`
--

CREATE TABLE IF NOT EXISTS `his_plot` (
`id` int(11) NOT NULL,
  `id_tech` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_plot`
--

INSERT INTO `his_plot` (`id`, `id_tech`, `name`, `info`) VALUES
(1, 1, 'RX Power', '"Receive Signal Strength Indicator", is a circuit to measure the strength of an incoming signal.'),
(3, 1, 'RSCP', 'Received Signal Code Power. It is measured after despreading of the signal (Narrowband). It is a some of RSSI(Received signal strength) and Ec/No in dbm.'),
(4, 2, 'RSRP', 'Reference Signal Received Power over the Reference Signal subcarriers. It is defined as the linear average over the power contributions (in[W]) of the resource elements that carry cell-specific reference signals within the considered measurement frequency bandwith.\r\n'),
(5, 2, 'SINR', ''),
(6, 6, 'RSSI', ''),
(7, 1, 'Ec/Io', ''),
(8, 2, 'RSSI', '');

-- --------------------------------------------------------

--
-- Table structure for table `his_plot_data`
--

CREATE TABLE IF NOT EXISTS `his_plot_data` (
`id` int(11) NOT NULL,
  `id_plot` int(11) NOT NULL,
  `start` double NOT NULL,
  `end` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_plot_data`
--

INSERT INTO `his_plot_data` (`id`, `id_plot`, `start`, `end`) VALUES
(157, 3, -140, -105),
(158, 3, -105, -95),
(159, 3, -95, -85),
(160, 3, -85, -75),
(161, 3, -75, -65),
(162, 3, -65, -30),
(179, 4, -140, -108),
(180, 4, -108, -98),
(181, 4, -98, -88),
(182, 4, -88, -78),
(183, 4, -78, -68),
(184, 4, -68, -30),
(190, 8, -140, -108),
(191, 8, -108, -98),
(192, 8, -98, -88),
(193, 8, -88, -78),
(194, 8, -78, -68),
(195, 8, -68, -30),
(212, 6, -140, -105),
(213, 6, -105, -95),
(214, 6, -95, -85),
(215, 6, -85, -75),
(216, 6, -75, -65),
(217, 6, -65, -30),
(218, 1, -140, -105),
(219, 1, -105, -95),
(220, 1, -95, -85),
(221, 1, -85, -75),
(222, 1, -75, -65),
(223, 1, -65, -30),
(224, 5, -50, -4),
(225, 5, -4, 0),
(226, 5, 0, 5),
(227, 5, 5, 10),
(228, 5, 10, 50),
(229, 7, -16, -14),
(230, 7, -14, -10),
(231, 7, -10, -7),
(232, 7, -7, 0),
(233, 7, 0, -16);

-- --------------------------------------------------------

--
-- Table structure for table `his_technology`
--

CREATE TABLE IF NOT EXISTS `his_technology` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_technology`
--

INSERT INTO `his_technology` (`id`, `name`, `info`) VALUES
(1, 'UMTS', 'UMTS is a'),
(2, 'LTE', 'LTE is a'),
(3, 'CDMA', 'CDMA is a'),
(5, 'GSM', 'GSM is a'),
(6, 'UMTS', 'UMTS is a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_automate`
--
ALTER TABLE `his_automate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `his_file`
--
ALTER TABLE `his_file`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `his_log_chart`
--
ALTER TABLE `his_log_chart`
 ADD PRIMARY KEY (`id`), ADD KEY `id_result` (`id_result`), ADD KEY `id_plot` (`id_plot`);

--
-- Indexes for table `his_plot`
--
ALTER TABLE `his_plot`
 ADD PRIMARY KEY (`id`), ADD KEY `id_tech` (`id_tech`);

--
-- Indexes for table `his_plot_data`
--
ALTER TABLE `his_plot_data`
 ADD PRIMARY KEY (`id`), ADD KEY `id_plot` (`id_plot`), ADD KEY `id_plot_2` (`id_plot`);

--
-- Indexes for table `his_technology`
--
ALTER TABLE `his_technology`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_automate`
--
ALTER TABLE `his_automate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=567;
--
-- AUTO_INCREMENT for table `his_file`
--
ALTER TABLE `his_file`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=532;
--
-- AUTO_INCREMENT for table `his_log_chart`
--
ALTER TABLE `his_log_chart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `his_plot`
--
ALTER TABLE `his_plot`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `his_plot_data`
--
ALTER TABLE `his_plot_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `his_technology`
--
ALTER TABLE `his_technology`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `his_log_chart`
--
ALTER TABLE `his_log_chart`
ADD CONSTRAINT `his_log_chart_ibfk_1` FOREIGN KEY (`id_result`) REFERENCES `his_automate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `his_log_chart_ibfk_2` FOREIGN KEY (`id_plot`) REFERENCES `his_plot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `his_plot`
--
ALTER TABLE `his_plot`
ADD CONSTRAINT `his_plot_ibfk_1` FOREIGN KEY (`id_tech`) REFERENCES `his_technology` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `his_plot_data`
--
ALTER TABLE `his_plot_data`
ADD CONSTRAINT `his_plot_data_ibfk_1` FOREIGN KEY (`id_plot`) REFERENCES `his_plot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
