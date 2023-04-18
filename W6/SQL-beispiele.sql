-- SELECT Beispiel: alle Kommentare auslesen
SELECT * FROM `comments`;

-- SELECT Beispiel: alle Kommentare auslesen, die zu einem bestimmten Post gehören
SELECT * FROM `comments` 
WHERE `IDpost` = 18;

-- JOIN Beispiel für die Tabelle comments - hier wird auch noch der Titel des Posts und der Autor mit eingelesen
SELECT c.*, `feusers`.`user_name` AS `autor`, `blogpost`.`post_title` 
FROM `comments` AS c
JOIN `feusers` ON c.`feuser_id` = `feusers`.`IDuser`
JOIN `blogpost` ON c.`IDpost` = `blogpost`.`ID`;

-- JOIN Beispiel mit Aliasnamen für die Tabelle comments und die user spalte user_name:
SELECT c.*, `feusers`.`user_name` AS `autor`, `blogpost`.`post_title` 
FROM `comments` AS c
JOIN `feusers` ON c.`feuser_id` = `feusers`.`IDuser`
JOIN `blogpost` ON c.`IDpost` = `blogpost`.`ID`;