CREATE SCHEMA IF NOT EXISTS dbo;
USE dbo;

CREATE TABLE IF NOT EXISTS dbo.User(
    UserId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Usertype TINYINT,
	Username VARCHAR(50) ,
    Password VARCHAR(50),
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    Birthday DATE,
    Gender TINYINT,
    Email VARCHAR(100),
    Phone CHAR(15),
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP(),
    CONSTRAINT UC_User UNIQUE (Username)
);

DELIMITER $	
CREATE PROCEDURE dbo.AddUser(
IN Usertype TINYINT,
IN Username VARCHAR(50),
IN Password VARCHAR(50),
IN Firstname VARCHAR(30),
IN Lastname VARCHAR(30),
IN Birthday DATE,
IN Gender TINYINT,
IN Email VARCHAR(100),
IN Phone CHAR(15)
)
BEGIN
	INSERT INTO dbo.User (Usertype,Username,Password,FirstName,LastName,Birthday,Gender,Email,Phone)
	VALUES (0,Username,Password,Firstname,Lastname,Birthday,Gender,Email,Phone)
END DELIMITER $	
CALL dbo.AddUser(0, 'sa', '123', 'System', 'Admin', '1999-01-20', 0, 'sys.bk@gmail.com', '037 492 1052');
CALL dbo.AddUser(1, '1', '1', 'Luis', 'Nani', '1989-11-26', 0, 'nani@gmail.com', '032 132 1052');

SELECT * FROM dbo.User;

