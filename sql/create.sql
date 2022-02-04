use cyber;

CREATE TABLE `fky_person` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ;

CREATE TABLE `fky_user` (
  `person_id` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `increase` varchar(45) NOT NULL,
  `login` varchar(255) NOT NULL,
  PRIMARY KEY (`person_id`)
) ;

CREATE UNIQUE INDEX index_login_unique ON fky_user(login);
CREATE UNIQUE INDEX index_name_unique ON fky_person(name);
ALTER TABLE fky_user ADD FOREIGN KEY (person_id) REFERENCES fky_person(_id);


DROP PROCEDURE IF EXISTS register;
DELIMITER //
CREATE PROCEDURE register(IN login VARCHAR(255), IN name VARCHAR(255), IN contact VARCHAR(255), IN  password VARCHAR(255), IN increase  VARCHAR(255) )
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
          ROLLBACK;
    END;
  START TRANSACTION;
  INSERT INTO fky_person(`name`, `contact`) VALUES (name, contact);
  INSERT INTO fky_user(`person_id`, `password`, `increase`, `login`) VALUES (LAST_INSERT_ID(), password, increase, login);
  COMMIT;
END //register
DELIMITER ;
