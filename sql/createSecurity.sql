drop table Security;

create table Security(
    propertyID int not null,
    motionZones BIT(500),
    PRIMARY KEY (propertyID)
);