CREATE TABLE Users (
  `National_ID` VARCHAR(10) NOT NULL,
  `FName` VARCHAR(45) NULL,
  `LName` VARCHAR(45) NULL,
  `Role_ID` int NULL,
  `Gender` VARCHAR(1) NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Status` VARCHAR(45) NULL,
  `BirthDate` DATE NULL,
  `Password` VARCHAR(45) NULL,
  `Team_ID` INT,
  PRIMARY KEY (`National_ID`));

CREATE TABLE Teams (
  `Team_ID` INT NOT NULL AUTO_INCREMENT,
  `Team_Name` VARCHAR(45) NULL,
  `Team_Leader` VARCHAR(10) NULL,
  PRIMARY KEY (`Team_ID`),
    FOREIGN KEY (`Team_Leader`)
    REFERENCES Users (`National_ID`));
    
CREATE TABLE `Events` (
  `Event_ID` INT NOT NULL AUTO_INCREMENT,
  `Team_ID` INT NULL,
  `Name` VARCHAR(45) NULL,
  `Description` VARCHAR(45) NULL,
  `StartTime` TIME NULL,
  `EndTime` TIME NULL,
  `Date` DATE NULL,
  `Gender` VARCHAR(45) NULL,
  `Capacity` INT NULL,
  `IMG` VARCHAR(45) NULL,
  `Location` VARCHAR(45) NULL,
  PRIMARY KEY (`Event_ID`),
    FOREIGN KEY (`Team_ID`)
    REFERENCES Teams (`Team_ID`)
);


CREATE TABLE Applications (
  `User_ID` VARCHAR(10) NOT NULL,
  `Event_ID` INT NOT NULL,
  `Status` VARCHAR(10) NOT NULL,
    FOREIGN KEY (`Event_ID`)
    REFERENCES `Events` (`Event_ID`),
	FOREIGN KEY (`User_ID`)
    REFERENCES Users (`National_ID`)

);

CREATE TABLE Attendance (
  `User_ID` VARCHAR(10) NOT NULL,
  `Event_ID` INT NOT NULL,
  `Hours` INT NOT NULL,
    FOREIGN KEY (`Event_ID`)
    REFERENCES `Events` (`Event_ID`),
	FOREIGN KEY (`User_ID`)
    REFERENCES `Users` (`National_ID`)
);
