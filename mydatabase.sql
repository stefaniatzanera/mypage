-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Σεπ 2021 στις 20:10:28
-- Έκδοση διακομιστή: 10.4.19-MariaDB
-- Έκδοση PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `mydatabase`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `difficulty` char(10) NOT NULL,
  `type` char(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answers` varchar(500) NOT NULL,
  `correctAnswers` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `questions`
--

INSERT INTO `questions` (`id`, `difficulty`, `type`, `question`, `answers`, `correctAnswers`, `status`) VALUES
(1, 'easy', 'checkbox', 'Σε ποια χερσόνησο έγιναν οι Βαλκανικοί πόλεμοι;', 'Βαλκανική,Ιβηρική,Ιταλική', '0', 'approved'),
(2, 'easy', 'checkbox', 'Ποιος ήταν ο πρωθυπουργός της Ελλάδας κατά τους βαλκανικούς πολέμους;', 'Βενιζέλος,Καποδίστριας,Μεταξάς', '0', 'approved'),
(3, 'easy', 'true/false', 'Στον Α\"παγκόσμιο πόλεμο νικητές ήταν οι Γερμανοί.', '0,1', '1', 'approved'),
(4, 'easy', 'text', 'Πώς ονομαζόντουσαν οι Μεγάλες Δυνάμεις;', 'Αντάντ', 'Αντάντ', 'approved'),
(5, 'easy', 'checkbox', 'Ποιά συνθήκη υπογράφτηκε στις 30 Οκτωβρίου 1918', 'Μούδρου,Σεβρών,Βερσαλιών', '1', 'waiting'),
(6, 'easy', 'true/false', 'Στον Α\"παγκόσμιο πόλεμο νικητές ήταν οι Γερμανοί.', '0,1', '1', 'waiting'),
(7, 'easy', 'checkbox', 'Αρχηγός των Γερμανών στον Β\"παγκόσμιο πόλεμο ήταν ο Αδόλφος Χίτλερ.', '0,1', '1', 'waiting'),
(8, 'easy', 'select', 'Ποιοί απαρτίζανε κυρίως την ομάδα των Συμμάχων;', 'Αγγλία,ΗΠΑ,Ρωσία,ΗΠΑ,Κίνα,Γερμανία,Αγγλία,Βουλγαρία,Γαλλία', '0', 'approved'),
(9, 'easy', 'text', 'Οι Κεντρικές Δυνάμεις πώς αλλιώς ονομαζόντουσαν;', 'Τριπλή Συμμαχία', 'Τριπλή Συμμαχία', 'aapproved');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `date` date NOT NULL,
  `gender` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `photo` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `date`, `gender`, `username`, `password`, `email`, `photo`, `role`) VALUES
(1, 'ioanna', 'papailiou', '2000-05-27', 'female', 'ioanpap', 'Papailiou8', 'ioanpap@gmail.com', '../media/photo/users/1pap.png', 'admin'),
(2, 'stefania', 'tzanera', '1999-08-07', 'female', 'steftzan', 'Stefania7', 'steftzan@gmail.com', '../media/photo/users/2stef.jpg', 'admin'),
(3, 'nikolaos', 'tselikas', '1991-01-21', 'male', 'nikostsel', 'Osfp666', 'ntsel@uop.gr', '../media/photo/users/3nikostsel', 'moderator'),
(4, 'tzoulia', 'alexandratou', '1985-11-24', 'female', 'tzoulia', 'Alexan8', 'tsoulia@yahoo.gr', '../media/photo/users/4tzoulia', 'user');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
