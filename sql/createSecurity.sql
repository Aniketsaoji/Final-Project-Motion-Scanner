drop table Security;

create table Security(
    entry int not null AUTO_INCREMENT,
    propertyID int not null,
    sensorId int not null,
    `motiontime` timestamp not null,
    Primary Key (`entry`)
);