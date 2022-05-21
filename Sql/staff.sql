CREATE TABLE Staff(
    STID char(20) NOT NULL PRIMARY KEY,
    Sortname VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    DOB DATE,
    email VARCHAR(255) NOT NULL,
    Tphone INT NOT NULL,
    Saddress VARCHAR(255) NOT NULL,
    jobStatus VARCHAR(255) NOT NULL,
    department varchar(255) NOT NULL,
    joinDate DATE NOT NULL,
    basicSalary FLOAT NOT NULL,
    oTHRS INT NOT NULL,
    monthlySalary FLOAT NOT NULL,
    userName VARCHAR(255) NOT NULL,
    Spassword VARCHAR(255) NOT NULL
);

INSERT INTO Staff Values 
('L1001', 'Kosala', 'Kosala Muthugala', '1993-10-31', 'ksdala@gmail.com', 712345678, '12/23 Park Road, Matara', 'Manager', 'Management', '2010-09-11', 100000.00, 5, 200000.00, 'user1' , 'pass1'),
('L1002', 'Supun', 'Supun Nawarattna', '1993-11-13', 'kosala@gmail.com', 712225638, '31/13 main Road, Kalutara', 'Creator', 'IT', '2011-02-04', 300000.00, 2, 300000.00,'user2' , 'pass2'),
('L1003', 'Ravi', 'Ravi karu', '1995-09-22', 'dssddsala@gmail.com', 712225638, '11/23 Temple Road, Kandy', 'Developer', 'IT', '2016-04-02', 400000.00, 2, 20000.00, 'user3' , 'pass3'),
('L1004', 'Sunil', 'Sunil Rahal', '1993-01-22', 'kdsala@gmail.com', 712321167, '12/123 TRT Road, Badulla', 'Admin', 'Security', '2016-06-01', 500000.00, 1, 400000.00, 'user4' , 'pass4'),
('L1005', 'Alwis', 'Alwis perera', '1996-02-20', 'kdsfsala@gmail.com', 712341674, '22/23 main Road, Anuradapura', 'Admin', 'Admin', '2013-01-04', 500000.00, 7, 100000.00, 'user5' , 'pass5'),
('L1006', 'Nimal', 'Nimal Silva', '1996-11-05', 'dfdssala@gmail.com', 712145674, '12/23 Pass Road, Jaffna', 'Chairman', 'Manager', '2012-07-03', 700000.00, 6, 500000.00, 'user6' , 'pass6'),
('L1007', 'Kevin', 'Kevin Silva', '1996-12-04', 'dffskosala@gmail.com', 711345674, '22/63 rock Road, Colombo', 'Developer', 'IT', '2015-09-02', 700000.00, 5, 700000.00, 'user7' , 'pass7'),
('L1008', 'Kamal', 'Kamal Rosh', '1996-04-03', 'kosdggla@gmail.com', 711345671, '15/233 Bird Road, Hatton', 'Admin', 'Security', '2014-10-10', 700000.00, 3, 900000.00, 'user8' , 'pass8'),
('L1009', 'Roshan', 'Roshan Bandara', '1995-06-02', 'kosaldfgd@gmail.com', 712345671, '16/25 Temple Road, Galle', 'Developer', 'IT', '2013-11-12', 200000.00, 2, 300000.00, 'user9' , 'pass9');