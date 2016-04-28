drop table Security;

create table Security(
    propertyID int not null,
    sensorId int not null,
    `value` BOOL not null default false,
    `motiontime` datetime not null,
    PRIMARY KEY (sensorId)
);