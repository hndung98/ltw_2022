-- Init DB
CREATE SCHEMA IF NOT EXISTS dbo;
USE dbo;

-- Init table
CREATE TABLE IF NOT EXISTS `Control`(
	ControlKey VARCHAR(20),
	ControlCode TINYINT,
    ControlName VARCHAR(50),
    CONSTRAINT PK_Control PRIMARY KEY (ControlKey,ControlCode)
);
CREATE TABLE IF NOT EXISTS `Image` (
  Id int NOT NULL AUTO_INCREMENT,
  Filename varchar(100) NOT NULL,
  PRIMARY KEY (Id)
);
CREATE TABLE IF NOT EXISTS `User`(
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
    IsActive TINYINT DEFAULT 0,
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP(),
    CONSTRAINT UC_User UNIQUE (Username)
);
CREATE TABLE IF NOT EXISTS `Product`(
    ProductId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(50),
    CategoryId TINYINT,
    Season VARCHAR(10),
    Brand TINYINT,
    Image1 VARCHAR(50),
    Image2 VARCHAR(50),
    Image3 VARCHAR(50),
    Image4 VARCHAR(50),
    SalesPrice INT,
    PurchasePrice INT,
    AllowSales TINYINT,
    Inventory TINYINT,
    Description TEXT,
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE IF NOT EXISTS `SalesHeader`(
	SalesHeaderId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserId TINYINT,
    Confirm TINYINT,
    Pay TINYINT,
    TotalPrice INT,
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE IF NOT EXISTS `SalesDetails`(
	SalesDetailsId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    SalesHeaderId TINYINT,
    ProductId INT,
    Size TINYINT,
    Quantity INT
);
CREATE TABLE IF NOT EXISTS `Comment`(
	CommentId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserId INT,
    ProductId INT,
    Content TEXT,
    Star TINYINT,
    CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP()
);

-- Init data
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('AppName',0,'BK SHOP');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Sys_Email',0,'mybk.cs@hcmut.edu.vn');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Sys_Phone',0,'035 905 6348');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('UserType',1,'Admin');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('UserType',2,'Employee');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('UserType',3,'Customer');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Brand',1,'Nike');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Brand',2,'Puma');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Brand',3,'Adidas');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Brand',9,'Other');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Size',1,'S');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Size',2,'M');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Size',3,'L');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Size',4,'XL');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',1,'??o CLB s??n nh??');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',2,'??o CLB s??n kh??ch');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',3,'??o kho??c CLB s??n nh??');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',4,'??o kho??c CLB s??n kh??ch');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',5,'??o ??TQG s??n nh??');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',6,'??o ??TQG s??n kh??ch');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',7,'??o kho??c ??TQG s??n nh??');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',8,'??o kho??c ??TQG s??n kh??ch');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',9,'Gi??y b??ng ????');
INSERT INTO `control`(`ControlKey`,`ControlCode`,`ControlName`) VALUES ('Category',10,'Kh??c');

INSERT INTO `user`(`Usertype`,`Username`,`Password`,`FirstName`,`LastName`,`Birthday`,`Gender`,`Email`,`Phone`,`IsActive`)
VALUES (0, 'sa', '123', 'System', 'Admin', '1999-01-20', 0, 'sys.bk@gmail.com', '037 492 1052',1);
INSERT INTO `user`(`Usertype`,`Username`,`Password`,`FirstName`,`LastName`,`Birthday`,`Gender`,`Email`,`Phone`,`IsActive`)
VALUES (1, '1', '1', 'Luis', 'Nani', '1989-11-26', 0, 'nani@gmail.com', '032 132 4331',1);
INSERT INTO user(Usertype,`Username`,`Password`,`FirstName`,`LastName`,`Birthday`,`Gender`,`Email`,`Phone`,`IsActive`)
VALUES (0, '2', '2', 'Reece', 'James', '1999-02-20', 0, 'james@gmail.com', '032 434 1552',1);

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o AC Milan s??n nh??', 1, '2022-2023', '2','AC1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o AC Milan s??n kh??ch', 2, '2022-2023', '2','AC2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Arsenal s??n nh??', 1, '2022-2023', '1','arsenal1.jpg','arsenal1.jpg','arsenal1.jpg','arsenal1.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Arsenal s??n kh??ch', 2, '2022-2023', '1','arsenal2.jpg','arsenal2.jpg','arsenal2.jpg','arsenal2.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Barca s??n nh??', 1, '2022-2023', '1','barca1.jpg','barca1.jpg','barca1.jpg','barca1.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Barca s??n kh??ch', 2, '2022-2023', '1','barca2.jpg','barca2.jpg','barca2.jpg','barca2.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Bayern s??n nh??', 1, '2022-2023', '1','bayern1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Bayern s??n kh??ch', 2, '2022-2023', '1','bayern2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Chelsea s??n nh??', 1, '2022-2023', '3','chelsea1.jpg','chelsea1.jpg','chelsea1.jpg','chelsea1.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Chelsea s??n kh??ch', 1, '2022-2023', '3','chelsea2.jpg','chelsea2.jpg','chelsea2.jpg','chelsea2.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Dortmund s??n nh??', 1, '2022-2023', '1','dortmund1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Dortmund s??n kh??ch', 2, '2022-2023', '1','dortmund2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Juventus s??n nh??', 1, '2022-2023', '1','juventus1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Juventus s??n kh??ch', 2, '2022-2023', '1','juventus2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Liverpool s??n nh??', 1, '2022-2023', '2','liver1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Liverpool s??n kh??ch', 2, '2022-2023', '2','liver2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o MU s??n nh??', 1, '2022-2023', '2','MU1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o MU s??n kh??ch', 2, '2022-2023', '2','MU2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o MC s??n nh??', 1, '2022-2023', '2','MC1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o MC s??n kh??ch', 2, '2022-2023', '2','MC2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o PSG s??n nh??', 1, '2022-2023', '3','psg1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o PSG s??n kh??ch', 2, '2022-2023', '3','psg2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Real s??n nh??', 1, '2022-2023', '3','real1.jpg','real1.jpg','real1.jpg','real1.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o Real s??n kh??ch', 2, '2022-2023', '3','real2.jpg','real2.jpg','real2.jpg','real2.jpg',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??TArgentina s??n nh??', 5, 'WC 2022', '2','arg1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??TArgentina s??n kh??ch', 6, 'WC 2022', '2','arg2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??TBrazil s??n nh??', 5, 'WC 2022', '2','brazil1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T Brazil s??n kh??ch', 6, 'WC 2022', '2','brazil2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T B??N s??n nh??', 5, 'WC 2022', '2','portugal1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T B??N s??n kh??ch', 6, 'WC 2022', '2','portugal2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T Ph??p s??n nh??', 5, 'WC 2022', '2','france1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T B??? s??n nh??', 5, 'WC 2022', '2','belgium1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T Croatia s??n nh??', 5, 'WC 2022', '2','croatia1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T Anh s??n nh??', 5, 'WC 2022', '2','england1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T ?????c s??n nh??', 5, 'WC 2022', '2','germany1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T ?????c s??n kh??ch', 6, 'WC 2022', '2','germany2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T H?? Lan s??n kh??ch', 6, 'WC 2022', '2','holand2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T Nh???t s??n nh??', 5, 'WC 2022', '2','japan1.jpg','','','',120000, 80000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('??o ??T Nh???t s??n kh??ch', 6, 'WC 2022', '2','japan2.jpg','','','',120000, 80000, 1, 20, 'M?? t???');




INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('Gi??y Copa xanh l??', 9, '2022', '1','shoe1.jpg','shoe1.jpg','shoe1.jpg','shoe1.jpg',380000, 260000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('Gi??y Copa xanh d????ng', 9, '2022', '1','shoe2.jpg','shoe2.jpg','shoe12.jpg','shoe2.jpg',390000, 270000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('Gi??y Copae h???ng', 9, '2022', '1','shoe3.jpg','shoe3.jpg','shoe3.jpg','shoe3.jpg',390000, 270000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('Gi??y Copa ?????', 9, '2022', '1','shoe4.jpg','','','',380000, 260000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('Gi??y Copa ??en', 9, '2022', '1','shoe5.jpg','','','',380000, 260000, 1, 20, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('Gi??y Copa tr???ng', 9, '2022', '1','shoe6.jpg','','','',380000, 260000, 1, 20, 'M?? t???');


INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('B??ng futsal v??ng xanh', 10, '2022', '1','ball1.jpg','ball1.jpg','ball1.jpg','ball1.jpg',250000, 170000, 1, 10, 'M?? t???');

INSERT INTO `product`(`ProductName`,`CategoryId`,`Season`,`Brand`,`Image1`,`Image2`,`Image3`,`Image4`,`SalesPrice`,`PurchasePrice`,`AllowSales`,`Inventory`,`Description`)
VALUES ('B??ng futsal tr???ng ?????', 10, '2022', '1','ball2.jpg','ball2.jpg','ball2.jpg','ball2.jpg',250000, 170000, 1, 10, 'M?? t???');

