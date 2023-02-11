
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE SCHEMA IF NOT EXISTS `register` DEFAULT CHARACTER SET utf8 ;
USE `register` ;


CREATE TABLE IF NOT EXISTS `register`.`faculty` (
  `fac_code` VARCHAR(5) NOT NULL,
  `fac_tname` VARCHAR(45) NULL,
  `fac_ename` VARCHAR(45) NULL,
  `fac_id` INT NULL,
  PRIMARY KEY (`fac_code`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`table1` (
)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`major` (
  `mj_code` VARCHAR(5) NOT NULL,
  `mj_tname` VARCHAR(45) NULL,
  `mj_ename` VARCHAR(45) NULL,
  `fac_code` VARCHAR(5) NULL,
  PRIMARY KEY (`mj_code`),
  
    FOREIGN KEY (`fac_code`)
    REFERENCES `register`.`faculty` (`fac_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`semester` (
  `sem_code` VARCHAR(10) NOT NULL,
  `sem_begin_date` DATE NULL,
  `sem_end_date` DATE NULL,
  PRIMARY KEY (`sem_code`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `register`.`grade` (
  `grade_code` VARCHAR(2) NOT NULL,
  `grade_weight` DECIMAL(4,2) NULL,
  `grade_meaning` VARCHAR(45) NULL,
  PRIMARY KEY (`grade_code`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`lecturer` (
  `lec_id` VARCHAR(3) NOT NULL,
  `lect_name` VARCHAR(45) NULL,
  `lec_lname` VARCHAR(45) NULL,
  `lec_status` VARCHAR(10) NULL,
  `mj_code` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`lec_id`),
  
    FOREIGN KEY (`mj_code`)
    REFERENCES `mydb`.`major` (`mj_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`student` (
  `std_id` VARCHAR(8) NOT NULL,
  `std_name` VARCHAR(45) NULL,
  `std_lname` VARCHAR(45) NULL,
  `major_mj_code` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`std_id`),
 
    FOREIGN KEY (`major_mj_code`)
    REFERENCES `mydb`.`major` (`mj_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`subject` (
  `subj_code` VARCHAR(10) NOT NULL,
  `subj_tname` VARCHAR(45) NULL,
  `subj_ename` VARCHAR(45) NULL,
  `subj_desc` VARCHAR(50) NULL,
  `subj_credit` INT NULL,
  `subj_lect` INT NULL,
  `subj_lab` INT NULL,
  `subj_self` INT NULL,
  `mj_code` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`subj_code`),
  
    FOREIGN KEY (`mj_code`)
    REFERENCES `mydb`.`major` (`mj_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`register` (
  `register_id` INT NOT NULL,
  `subj_code` VARCHAR(10) NOT NULL,
  `sem_code` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`register_id`),
  
    FOREIGN KEY (`subj_code`)
    REFERENCES `mydb`.`subject` (`subj_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  
    FOREIGN KEY (`sem_code`)
    REFERENCES `mydb`.`semester` (`sem_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `register`.`teaching` (
  `lec_id` VARCHAR(3) NOT NULL,
  `register_id` INT NOT NULL,
  PRIMARY KEY (`lec_id`, `register_id`),
  
    FOREIGN KEY (`lec_id`)
    REFERENCES `mydb`.`lecturer` (`lec_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  
    FOREIGN KEY (`register_id`)
    REFERENCES `mydb`.`register` (`register_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`register_detail` (
  `std_id` VARCHAR(8) NOT NULL,
  `register_id` INT NOT NULL,
  `grade_code` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`std_id`, `register_id`),
  
    FOREIGN KEY (`std_id`)
    REFERENCES `mydb`.`student` (`std_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  
    FOREIGN KEY (`register_id`)
    REFERENCES `mydb`.`register` (`register_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
 
    FOREIGN KEY (`grade_code`)
    REFERENCES `mydb`.`grade` (`grade_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
