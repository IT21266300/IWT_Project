create table UserAccount( 
  FirstName VARCHAR(255) NOT NULL,
  LastName VARCHAR(255) NOT NULL,
  FULLName VARCHAR(255) NOT NULL,
  DateOFBirth DATE NOT NULL,
  NIC CHAR(13) NOT NULL,
  PassportNO CHAR(20) DEFAULT '-',
  Gender CHAR(7) NOT NULL,
  Telephone INT(13) NOT NULL,
  Email VARCHAR(255) DEFAULT '-',
  MaritalStatus CHAR(20) NOT NULL,
  Home VARCHAR(255) NOT NULL,
  City VARCHAR(255) NOT NULL,
  Province VARCHAR(255) NOT NULL,
  Country VARCHAR(255) DEFAULT 'Sri Lanka',
  AccountType VARCHAR(255) NOT NULL,
  Username VARCHAR(255) DEFAULT '-',
  Apassword VARCHAR(255) DEFAULT '-',
  AccountNo INT PRIMARY KEY AUTO_INCREMENT,
  AccountBalance FLOAT DEFAULT 2000.00,
  ZipPostalCode char(50) DEFAULT '-',
  EmployeeStatus VARCHAR(255) DEFAULT '-',
  EmployeeIndustry varchar(255) DEFAULT '-',
  MonthlyIncome float DEFAULT 00000.00,
  workTelnumber INT(13) DEFAULT 07,
  cardType varchar(255) DEFAULT '-'
);

ALTER TABLE UserAccount AUTO_INCREMENT = 10001;