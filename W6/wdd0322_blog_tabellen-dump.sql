-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Apr 2023 um 19:23
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wdd0322_blog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admins`
--

CREATE TABLE `admins` (
  `IDadmin` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `admins`
--

INSERT INTO `admins` (`IDadmin`, `admin_name`, `admin_email`, `admin_passwort`) VALUES
(1, 'Terry Harker', 'terry@bytekultur.net', '$2y$10$OrlOGdFZPEbS/kJRM7GoJe3XM8Cy9mzDTSOw8UR2DWKDnReTw9xda');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blogpost`
--

CREATE TABLE `blogpost` (
  `ID` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_author` varchar(64) NOT NULL,
  `post_category` varchar(64) NOT NULL,
  `post_shorttext` text NOT NULL,
  `post_longtext` text NOT NULL,
  `post_state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `blogpost`
--

INSERT INTO `blogpost` (`ID`, `post_title`, `post_created`, `post_author`, `post_category`, `post_shorttext`, `post_longtext`, `post_state`) VALUES
(1, 'Willkommen', '2016-03-15 23:01:24', 'Terry Harker', 'PHP Blog', 'Willkommen in meinem PHP Blog! ', '<p>Ich hoffe, ich kann dir regelmässig interessante Updates, Tipps und Tricks zu PHP geben. Wenn du etwas vermisst oder Ideen hast, melde dich bei mir unter <joomla-hidden-mail is-link=\"1\" is-email=\"1\" first=\"dGVycnk=\" last=\"Ynl0ZWt1bHR1ci5uZXQ=\" text=\"dGVycnlAYnl0ZWt1bHR1ci5uZXQ=\" base=\"/joomla4\"><a href=\"mailto:terry@bytekultur.net\" base=\"/joomla4\">terry@bytekultur.net</a></joomla-hidden-mail></p>', 1),
(2, '7 Dinge, die du nicht tun solltest in PHP', '2017-08-24 22:01:52', 'Terry Harker', 'PHP Blog', 'Was ist der Nachteil daran, keine Funktionen zu erstellen in PHP? \r\n\r\n', '<p><span class=\"author_name\">Joseph Benharosh hat vor einiger Zeit diesen <a href=\"https://phpenthusiast.com/blog/7-problems-that-may-prevent-your-PHP-code-from-being-awesome\" target=\"_blank\" rel=\"noopener\">Artikel auf phpenthusiast.com</a> veröffentlicht, in dem er auf ein paar Verhaltensweisen hinweist, die für das saubere Coden in PHP nicht förderlich sind.</span></p><p><span class=\"author_name\">Im Grossen Ganzen gelten sie immer noch, auch wenn die Liste bestimmt nicht vollständig ist. PHP Code kann auf verschiedene weisen geschrieben werden, die Sprache zeichet sich dadurch aus, dass sie auch \"quick and dirty\" genutzt werden kann. Man muss die Frage danach, was \"guter\" (oder sinnvoller) PHP Code ist, auch im Kontext des Projekts betrachten. Wenn eine einmalige Anwendung von kleinem Umfang,&nbsp; wie beispielsweise ein One-Pager mit Kontaktformular, mit wenig Initial-Aufwand realisiert werden kann, ist die Lösung aus ökonomischer Sicht durchaus sinnvoll, auch wenn sie nicht allen Konventionen entspricht. Für grössere Projekte ist eine gute Organisation und Einhaltung von Konventionen jedoch unabdingbar.</span></p>', 1),
(3, 'Die beliebtesten PHP Tutorials', '2021-05-09 22:01:52', 'Terry Harker', 'PHP Blog', 'Heute habe ich euch ein paar PHP Tutorial-Seiten zusammengestellt. Ich hoffe, ihr könnt das eine oder andere davon nutzen.\r\n\r\n', '<p>Heute habe ich euch ein paar PHP Tutorial-Seiten zusammengestellt. Ich hoffe, ihr könnt das eine oder andere davon nutzen.</p>\r\n \r\n<h4>PHP in 10 Minuten</h4>\r\n<p>Zugegeben, dies ist kein wirkliches Tutorial. Aber wenn du jemandem zeigen möchtest, wie PHP funktioniert, oder selbst das erste mal damit zu tun hast, ist das ein ziemlich knackiger Einblick. PHP gibt immer HTML zurück - stimmt denn das?</p>\r\n<p><a href=\"https://www.youtube.com/watch?v=iungnszzyNE\">https://www.youtube.com/watch?v=iungnszzyNE</a></p>\r\n<p>&nbsp;</p>\r\n<h4>PHP Einfach</h4>\r\n<p>Wie der Name sagt, findet man hier viele Code Snippets und kleine Beispiele mit Erklärungen in deutscher Sprache. Eine gute Begleitung für die Basics, zum Wiederholen und trainieren geeignet. Besprochen wird im Moment PHP 7, welches sich für den Anfang nicht wesentlich von PHP 8 unterscheidet.</p>\r\n<p><a href=\"https://www.php-einfach.de/\">https://www.php-einfach.de</a></p>\r\n<p>&nbsp;</p>\r\n<h4>W3Schools</h4>\r\n<p>Die beliebte Tutorialbase W3Schools bietet ein einfaches Einsteigerprogramm für prozeduralen und objektorientierten Code in Englisch. Hier kannst du Themen aus dem Unterricht wiederholen, einfache Beispiele nachschlagen. Die Seite bietet ausserdem eine Funktionsreferenz, du kannst also auch einfach nachsehen, in welcher Reihenfolge du die Parameter für str_replace() eingeben musst, zum Beispiel...&nbsp;</p>\r\n<p><a href=\"https://www.w3schools.com/php/default.asp\">https://www.w3schools.com/php/default.asp</a></p>\r\n<p>&nbsp;</p>\r\n<h4>PHP.net</h4>\r\n<p>Dies ist die offizielle Referenz von PHP. Nicht unbedingt die übersichtlichste, aber sicher die aktuellste Referenz und auch sehr umfangreich, da sie direkt von den PHP-Entwicklern betrieben wird. Typische Anwendungsbeispiele und Diskussionen dazu von diversen Benutzern findet man jeweils unterhalb jeder Funktion. Die Referenz ist grösstenteils in deutscher Sprache verfügbar.</p>\r\n<p><a href=\"https://www.php.net/manual/de\">https://www.php.net/manual/de</a>&nbsp;</p>            \r\n       ', 1),
(4, 'PHP 8 Release', '2021-07-28 22:05:26', 'Terry Harker', 'PHP Blog', 'PHP 8.0 ist eine umfassende Aktualisierung der PHP-Sprache. Heute ist sie im Stable Release erschienen!\r\n\r\n', '<p>Es enthält viele neue Funktionen und Optimierungen, darunter benannte Argumente, Union-Typen, Attribute, Beförderung von Konstruktoreigenschaften, Match-Ausdruck, Nullsafe-Operator, JIT sowie Verbesserungen des Typsystems, der Fehlerbehandlung und der Konsistenz.</p><p>Weitere Details findest du auf <a href=\"https://www.php.net/releases/8.0/en.php\">https://www.php.net/releases/8.0/en.php</a></p>', 1),
(10, 'Der erste Tag im PHP Kurs', '2021-09-23 18:17:12', 'Terry', 'PHP Blog', 'Wir haben vor allem die PHP.INI gesucht ;-)', '<p>Die PHP.INI ist <strong>MEGA schwierig</strong> zum finden!!! Ausser natürlich, wenn man weiss, wo man suchen muss.</p>\n<p>Was habt ihr für Tipps, wie man die PHP.INI einfacher finden kann?</p>', 1),
(18, 'Neuer PHP Kurs des WDD921', '2022-09-22 16:44:15', 'Terry', 'PHP Blog', 'Wir befassen uns mit den Möglichkeiten von PHP / SQL', '<p>PHP und SQL sind typische technologien, auf denen die meisten gebräuchlichen <strong>Webseiten und CMS-Systeme</strong> aufgebaut sind. Man findet sie auch auf allen üblichen Shared Hosting Accounts vorinstalliert.</p>\r\n<p>Was denkt ihr über Backend Programmierung?</p>', 1),
(19, 'Terry Testet', '2023-03-14 16:55:38', 'Terry', 'PHP Blog', 'test', '<p>Test <strong>Test</strong></p>', 0),
(20, 'Willkommen im PHP / SQL Kurs', '2023-03-14 18:27:55', 'Terry', 'PHP Blog', 'PHP ist server side...', '<p>Das bedeutet, dass wir XAMPP oder MAMP brauchen, anders als bei JavaScript. Was meint ihr dazu?</p>', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `IDcomment` int(11) NOT NULL,
  `IDpost` int(11) NOT NULL,
  `feuser_id` int(11) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `comment_title` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`IDcomment`, `IDpost`, `feuser_id`, `author_email`, `comment_title`, `comment_text`, `comment_timestamp`, `comment_status`) VALUES
(3, 18, 1, '', '', 'Ohne geht\'s jedenfalls auch nicht...', '2023-03-10 18:47:00', 0),
(4, 18, 1, '', '', 'Juhuu, es funktioniert!!!\r\n\r\nIch kann kommentieren, wenn ich eingeloggt bin', '2023-03-10 18:47:00', 0),
(5, 10, 3, '', '', 'Für Windows ist es kein Problem, es gibt nur eine PHP.INI - wer weis bei MAMP auf Mac bescheid?', '2023-03-10 19:09:37', 1),
(6, 20, 4, '', '', 'Ich registiren !', '2023-03-14 19:31:17', 1),
(7, 20, 1, '', '', 'Server side bedeuet, dass wir einen Testsesrver installieren müssen... XAMPP, MAMP, composer, brew... bald wird es zum glück weniger trocken!', '2023-03-14 19:41:17', 1),
(8, 20, 12, '', '', 'Bin registriert', '2023-03-14 19:43:51', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `feusers`
--

CREATE TABLE `feusers` (
  `IDuser` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `feusers`
--

INSERT INTO `feusers` (`IDuser`, `user_name`, `user_email`, `user_passwort`) VALUES
(1, 'Citystrolch', 'citystrolch@gmail.com', '$2y$10$OrlOGdFZPEbS/kJRM7GoJe3XM8Cy9mzDTSOw8UR2DWKDnReTw9xda'),
(3, 'Terry Harker', 'terry@bytekultur.net', '$2y$10$BqZQUcFzehr8q8AyW9hYzujr6dA40tuvyqfWcOr3nnxdP5mZcLK1O'),
(4, 'Ahmet KIZAL', 'ahmetkizal34@gmail.com', '$2y$10$GLlCUOtct5J8Xg91aAc9KOfE9L6R3.tcw6RfyIXEjSmmocFp8mBwy'),
(12, 'Stephanie Sieber', 'sieber.stephanie@bluewin.ch', '$2y$10$7BvjqtqK1NBHkjA80qfsrOGperMPQKEJKEUyBVfVYwR7v9QbV0yIi'),
(13, 'Kadir Karadavut', 'kadir9625+bytekultur@gmail.com', '$2y$10$9cSqnRKAu0w33DYGtvMu/uUuhj6pv1rQwiScs/ZPGSS6ZMvpfEbfy');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`IDadmin`);

--
-- Indizes für die Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`IDcomment`),
  ADD KEY `IDpost` (`IDpost`);

--
-- Indizes für die Tabelle `feusers`
--
ALTER TABLE `feusers`
  ADD PRIMARY KEY (`IDuser`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admins`
--
ALTER TABLE `admins`
  MODIFY `IDadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `IDcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `feusers`
--
ALTER TABLE `feusers`
  MODIFY `IDuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
