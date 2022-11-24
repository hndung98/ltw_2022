-- Init DB
CREATE SCHEMA IF NOT EXISTS dbo;
USE dbo;

-- Init table
CREATE TABLE IF NOT EXISTS dbo.Control(
	ControlKey VARCHAR(20),
	ControlCode TINYINT,
    ControlName VARCHAR(50),
    CONSTRAINT PK_Control PRIMARY KEY (ControlKey,ControlCode)
);
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
CREATE TABLE IF NOT EXISTS dbo.Product(
	ProductId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(50),
    CategoryId TINYINT,
    SalesPrice INT,
    PurchasePrice INT,
    AllowSales TINYINT,
    Inventory TINYINT,
    Description TEXT,
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE IF NOT EXISTS dbo.SalesHeader(
	SalesHeaderId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserId TINYINT,
    TotalPrice INT,
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE IF NOT EXISTS dbo.SalesDetails(
	SalesDetailsId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    SalesHeaderId TINYINT,
    ProductId INT,
    Quantity INT
);

-- Init data
INSERT INTO `dbo`.`control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('AppName',0,'BK SHOP');
INSERT INTO `dbo`.`control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Sys_Email',0,'1610538@hcmut');
INSERT INTO `dbo`.`control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Sys_Phone',0,'035 905 6348');
INSERT INTO `dbo`.`control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('UserType',1,'Admin');
INSERT INTO `dbo`.`control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('UserType',2,'Employee');
INSERT INTO `dbo`.`control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('UserType',3,'Customer');

INSERT INTO `dbo`.`user`(`Usertype`,`Username`,`Password`,`FirstName`,`LastName`,`Birthday`,`Gender`,`Email`,`Phone`)
VALUES (0, 'sa', '123', 'System', 'Admin', '1999-01-20', 0, 'sys.bk@gmail.com', '037 492 1052');
INSERT INTO `dbo`.`user`(`Usertype`,`Username`,`Password`,`FirstName`,`LastName`,`Birthday`,`Gender`,`Email`,`Phone`)
VALUES (1, '1', '1', 'Luis', 'Nani', '1989-11-26', 0, 'nani@gmail.com', '032 132 1052');
INSERT INTO `dbo`.`user`(`Usertype`,`Username`,`Password`,`FirstName`,`LastName`,`Birthday`,`Gender`,`Email`,`Phone`)
VALUES (0, '2', '2', 'Reece', 'James', '1999-02-20', 0, 'james@gmail.com', '032 434 1552');

