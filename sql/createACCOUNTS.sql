drop table ACCOUNTS;

create table ACCOUNTS(
    `ID` int NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    password varchar(32) NOT NULL,
    passwordSalt BIT(16) NOT NULL,
    isAdmin bool not null default 0,
    PRIMARY KEY (ID)
);