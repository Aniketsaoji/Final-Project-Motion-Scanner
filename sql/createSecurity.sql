drop table Security;

create table Security(
    propertyID int not null,
    motionZones BIT(500) not null DEFAULT 0,
    PRIMARY KEY (propertyID)
);