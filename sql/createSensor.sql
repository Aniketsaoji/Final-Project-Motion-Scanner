DROP TABLE mitchko.Sensor;

CREATE TABLE Sensor (
  `sensorid`         INT          NOT NULL AUTO_INCREMENT,
  `propertyid` INT NOT NULL,
  `active` bool not null default true,
  PRIMARY KEY (sensorid)
);