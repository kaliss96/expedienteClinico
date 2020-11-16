CREATE DATABASE `expedienteclinico`
 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

--  
DROP SCHEMA IF EXISTS `default_schema` ;

CREATE SCHEMA IF NOT EXISTS `expedienteclinico` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

--  
CREATE USER 'expedienteclinico'@'%' IDENTIFIED BY 'expedienteclinico2017*';
GRANT ALL ON expedienteclinico.* TO 'expedienteclinico'@'%';

CREATE USER 'expedienteclinico'@'localhost' IDENTIFIED BY 'expedienteclinico2017*';
GRANT ALL ON expedienteclinico.* TO 'expedienteclinico'@'localhost';


 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

 