drop table ACCOUNTS;

create table ACCOUNTS(
    `ID` int NOT NULL AUTO_INCREMENT,
    Email NOT NULl,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    password BIT(128) NOT NULL,
    passwordSalt BIT(64) NOT NULL,
    PRIMARY KEY (ID)
);