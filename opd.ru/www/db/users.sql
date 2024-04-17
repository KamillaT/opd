-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2024 at 08:03 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `experts_marks`
--

CREATE TABLE `experts_marks` (
  `id` int NOT NULL,
  `expert_id` int NOT NULL,
  `job_id` int NOT NULL,
  `memory` int NOT NULL,
  `effciency` int NOT NULL,
  `oral_skills` int NOT NULL,
  `prof_vocab` int NOT NULL,
  `creativity` int NOT NULL,
  `logic` int NOT NULL,
  `communication` int NOT NULL,
  `time_manag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experts_marks`
--

INSERT INTO `experts_marks` (`id`, `expert_id`, `job_id`, `memory`, `effciency`, `oral_skills`, `prof_vocab`, `creativity`, `logic`, `communication`, `time_manag`) VALUES
(1, 1, 1, 80, 75, 60, 65, 40, 75, 75, 90),
(2, 1, 2, 60, 65, 50, 65, 75, 75, 55, 55),
(3, 1, 3, 65, 65, 60, 65, 80, 30, 85, 55),
(4, 2, 1, 70, 80, 55, 60, 45, 70, 75, 85),
(5, 2, 2, 65, 60, 45, 60, 65, 70, 50, 60),
(6, 2, 3, 60, 60, 65, 65, 75, 35, 80, 45),
(7, 3, 1, 75, 75, 60, 65, 40, 80, 75, 95),
(8, 3, 2, 70, 65, 45, 65, 70, 75, 55, 50),
(9, 3, 3, 65, 70, 60, 65, 80, 30, 85, 50);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`) VALUES
(1, 'Инженер Backend-разработчика'),
(2, 'Инженер-разработчик баз данных'),
(3, 'Инженер по фронтенд-разработке');

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` int NOT NULL,
  `job_id` int NOT NULL,
  `memory` int NOT NULL,
  `effciency` int NOT NULL,
  `oral_skills` int NOT NULL,
  `prof_vocab` int NOT NULL,
  `creativity` int NOT NULL,
  `logic` int NOT NULL,
  `communication` int NOT NULL,
  `time_manag` int NOT NULL,
  `description` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `job_id`, `memory`, `effciency`, `oral_skills`, `prof_vocab`, `creativity`, `logic`, `communication`, `time_manag`, `description`) VALUES
(1, 1, 70, 80, 60, 60, 40, 80, 70, 90, 'Острый взгляд на детали, способность координировать несколько задач, быть организованным и спланированным. Они также хороши в тайм-менеджменте и могут хорошо решать проблемы даже под давлением.'),
(2, 2, 60, 70, 50, 60, 70, 70, 50, 50, 'Инженеры баз данных отвечают за эксплуатацию и обслуживание баз данных, включая основные задачи, такие как установка базы данных, мониторинг, резервное копирование и восстановление. Однако на самом деле нам также необходимо нести ответственность за весь жизненный цикл продукта: от проектирования спроса, тестирования до поставки и запуска. В этом процессе мы несем ответственность не только за создание, эксплуатацию и обслуживание базы данных управления. системы, но также участвовать в раннем проектировании базы данных и промежуточном тестировании базы данных, а также в управлении емкостью базы данных и оптимизации производительности.'),
(3, 3, 60, 60, 60, 60, 80, 30, 80, 50, 'Интерфейсному инженеру необходимо преобразовать проект проекта в веб-страницу и отправить данные, сгенерированные пользователем, на сервер. Ему также нужно, чтобы продакт-менеджер обсудил детали взаимодействия. Это требует от фронтенд-инженеров высоких навыков общения и понимания.');

-- --------------------------------------------------------

--
-- Table structure for table `tests_info`
--

CREATE TABLE `tests_info` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tests_info`
--

INSERT INTO `tests_info` (`id`, `name`) VALUES
(1, 'Свет'),
(2, 'Свет_1'),
(3, 'Свет_2'),
(4, 'Точность реакции (простая)'),
(5, 'РДО (cложная)'),
(6, 'Звук'),
(7, 'Сложение (текст)'),
(8, 'Аналоговое преследование'),
(9, 'Внимание'),
(10, 'Аналоговое слежение'),
(11, 'Память'),
(12, 'Мышление');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `test_id` int NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `avg_time` varchar(255) NOT NULL,
  `total_time` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `misses` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `user_id`, `test_id`, `test_name`, `avg_time`, `total_time`, `correct`, `misses`, `score`) VALUES
(1, 1, 7, 'Сложение (текст)', '1730.56', '15575.00', '9', '1', '56.15850580514892'),
(2, 1, 6, 'Звук', '505.56', '4550.00', '', '', '50.56'),
(3, 1, 1, 'Свет', '363', '3630', '10', '1', '91'),
(4, 1, 1, 'Свет', '441', '4412', '10', '0', '100'),
(5, 1, 7, 'Сложение (текст)', '1113.81', '11138.10', '10', '0', 'NaN'),
(6, 2, 6, 'Звук', '987.78', '8890.00', '', '', '98.78'),
(7, 2, 7, 'Сложение (текст)', '1176.70', '10590.30', '9', '1', '58.342010015335234'),
(8, 2, 1, 'Свет', '439', '4390', '10', '0', '100'),
(9, 2, 1, 'Свет', '379', '3790', '10', '2', '83'),
(10, 2, 4, 'Точность реакции (простая)', '95', '', '', '', '95'),
(11, 3, 4, 'Точность реакции (простая)', '93', '', '', '', '93'),
(12, 3, 7, 'Сложение (текст)', '1766.57', '17665.70', '10', '0', 'NaN'),
(13, 3, 6, 'Звук', '686.44', '6178.00', '', '', '68.64'),
(14, 3, 1, 'Свет', '356', '3564', '10', '6', '63'),
(15, 3, 1, 'Свет', '385', '3851', '10', '0', '100'),
(16, 1, 1, 'Свет', '410', '4095', '10', '1', '91'),
(19, 1, 8, 'Аналоговое преследование', '1.03', '', '52.01', '', '52.01'),
(20, 1, 8, 'Аналоговое преследование', '0.10', '', '65.01', '', '65.01'),
(23, 1, 9, 'Внимание', '1311.3', '', '20', '', '131'),
(24, 1, 4, 'Точность реакции (простая)', '-19', '', '', '', '-19'),
(25, 1, 8, 'Аналоговое преследование', '0.77', '', '56.67', '', '56.67'),
(26, 1, 8, 'Аналоговое преследование', '0.58', '', '40.00', '', '40.00'),
(28, 1, 10, 'Аналоговое слежение', '18.80', '', '24.99', '', '24.99'),
(29, 1, 9, 'Внимание', '1115.6842105263158', '', '19', '', '112'),
(30, 1, 7, 'Сложение (текст)', '1014.80', '9133.20', '9', '1', '50.424844720926096'),
(31, 1, 10, 'Аналоговое слежение', '18.78', '', '21.49', '', '21.49'),
(32, 2, 4, 'Точность реакции (простая)', '98', '', '', '', '98'),
(33, 2, 10, 'Аналоговое слежение', '19.65', '', '14.54', '', '14.54'),
(34, 2, 8, 'Аналоговое преследование', '0.39', '', '51.12', '', '51.12'),
(35, 2, 8, 'Аналоговое преследование', '1.00', '', '62.24', '', '62.24'),
(36, 1, 9, 'Внимание', '1223.6', '', '20', '', '122'),
(37, 7, 6, 'Звук', '726.78', '6541.00', '', '', '72.68'),
(38, 7, 9, 'Внимание', '4212.368421052632', '', '19', '', '421'),
(39, 1, 9, 'Внимание', '1724.75', '', '20', '', '172');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `state` varchar(45) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `pswd`, `state`, `age`, `gender`) VALUES
(1, 'kami', 'kami', 'Admin/Expert', 2005, 'female'),
(2, 'ruohan', 'ruohan', 'Admin/Expert', 2005, 'female'),
(3, 'tuan', 'tuan', 'Admin/Expert', 2003, 'male'),
(4, 'ann', 'ann', 'User', 1982, 'female'),
(5, 'alex', 'alex', 'User', 1994, 'male'),
(6, 'alice', 'alice', 'User', 2004, 'female'),
(7, 'Фан Нгок Туан', '1111', 'User', 2003, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experts_marks`
--
ALTER TABLE `experts_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expert_id` (`expert_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `tests_info`
--
ALTER TABLE `tests_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experts_marks`
--
ALTER TABLE `experts_marks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests_info`
--
ALTER TABLE `tests_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experts_marks`
--
ALTER TABLE `experts_marks`
  ADD CONSTRAINT `experts_marks_ibfk_1` FOREIGN KEY (`expert_id`) REFERENCES `user_data` (`id`),
  ADD CONSTRAINT `experts_marks_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `pvk`.`jobs` (`id`);

--
-- Constraints for table `qualities`
--
ALTER TABLE `qualities`
  ADD CONSTRAINT `qualities_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `test_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`id`),
  ADD CONSTRAINT `test_results_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
