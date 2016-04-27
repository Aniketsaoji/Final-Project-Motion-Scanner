drop table ACCOUNTS;

create table ACCOUNTS(
    `ID` int NOT NULL AUTO_INCREMENT,
    Email NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    password BIT(128) NOT NULL,
    passwordSalt BIT(64) NOT NULL,
    isAdmin bool not null default 0,
    PRIMARY KEY (ID)
);