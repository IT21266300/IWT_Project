CREATE TABLE Loan(
    loanID INT PRIMARY KEY AUTO_INCREMENT,
    AccountNo INT,
    loanType varchar(255) NOT NULL,
    loanAmount FLOAT DEFAULT 00000.000,
    loanInterestRate FLOAT NOT NULL,
    loanInterest FLOAT NOT NULL,
    loanFinalAmount FLOAT NOT NULL, 
    loanPeriod varchar(255) NOT NULL,
    loanApplyDate DATE NOT NULL,
    loanExpiresDate DATE NOT NULL,
    peronStatus varchar(255) NOT NULL,
    peronIndustry varchar(255) NOT NULL,
    income FLOAT NOT NULL,
    workTelnumber INT NOT NULL,
    CONSTRAINT FK_AccountNo FOREIGN KEY (AccountNo) REFERENCES UserAccount(AccountNo)
);

ALTER TABLE Loan AUTO_INCREMENT = 1200;