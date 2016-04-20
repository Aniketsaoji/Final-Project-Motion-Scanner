drop table Properties;

create table Properties(
    propertyID int NOT NULL AUTO_INCREMENT,
    StreetAddress varchar(255) NOT NULL,
    ZipCode int NOT NULL,
    TextAlerts BOOL NOT NULL DEFAULT TRUE,
    AssociatedAccount int,
    PRIMARY KEY (propertyID)
);