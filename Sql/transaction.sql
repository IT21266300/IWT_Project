-- CREATE TABLE transactions(

--     transID INT PRIMARY KEY AUTO_INCREMENT,
--     accNo INT,
--     tDate Date NOT NULL,
--     tAbout varchar(255) NOT NULL,
--     tValue FLOAT NOT NULL,
--     CONSTRAINT FK_accNo FOREIGN KEY (accNo) REFERENCES UserAccount(AccountNo)
-- );


INSERT INTO transactions (accNo, tDate, tAbout, tValue) VALUES
(10001,'2022-03-05', 'Money Transfer Account No: 4521489', 1000000.00),
(10001,'2022-03-10', 'Money Transfer Account No: 5879641', 1000.00),
(10001,'2022-03-11', 'Money Transfer Account No: 1207845', 20000.00),
(10001,'2022-03-17', 'Money Transfer Account No: 1478526', 5000.00),
(10001,'2022-03-17', 'Money Transfer Account No: 5217896', 400.00),
(10001,'2022-03-22', 'Bill Payment', 1000.00),
(10001,'2022-03-24', 'Bill Payment', 600.00),
(10001,'2022-03-25', 'Bill Payment', 900.00),
(10001,'2022-03-25', 'Bill Payment', 4000.00),
(10001,'2022-03-26', 'Money Transfer Account No: 2589742', 8400.00),
(10001,'2022-03-27', 'Money Transfer Account No: 5217896', 452000.00),
(10001,'2022-03-27', 'Money Transfer Account No: 1547895', 78500.00),
(10001,'2022-04-07', 'Bill Payment', 20000.00),
(10001,'2022-04-16', 'Money Transfer Account No: 3456789', 1000.00),
(10001,'2022-04-20', 'Bill Payment', 40000.00),
(10001,'2022-05-02', 'Bill Payment', 20000.00),
(10001,'2022-05-05', 'Bill Payment', 20000.00),
(10001,'2022-05-12', 'Bill Payment', 80000.00),
(10001,'2022-05-14', 'Money Transfer Account No: 3456789', 100000.00),
(10001,'2022-05-16', 'Bill Payment', 2000.00),
(10001,'2022-05-20', 'Money Transfer Account No: 2453729', 50000.00),
(10001,'2022-05-22', 'Bill Payment', 2300.00);

