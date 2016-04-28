# USE CASES

## 1. Add Property

### Actor

User

### Pre-condition

None

### Post-condition

Property is added to account

### Queries

```SQL
insert into Properties values(?);
```

## 2. Add Sensor

### Actor

User

### Pre-condition

User is Authenticated

### Post-condition

Property Table is updated

### Queries

```SQL
insert into Sensor values (?);
```

## 3. Remove Sensor

### Actor

User

### Pre-condition

1. User is Authenticated

### Post-condition

Property Table is updated

### Queries

```SQL
delete * from Sensor where sensorid=?;
```

## 4. Get Price Quote

### Actor

User

### Pre-condition

Nonr

### Post-condition

price per sensor is quoted

### Queries

```SQL
select * from quotes;
```


## 5. View Security System Status

### Actor

User / Administrator

### Pre-condition

1. User / Administrator is Authenticated
2. User / Administrator requests to see status

### Post-condition

return admin page of sensor data

### Queries

```SQL
select (propertyID, StreetAddress, ZipCode, TextAlerts) from Properties where `AssociatedAccountID`=?;
select (motionZones) from Security where propertyID=?; // ID from query i
```

## 6. Delete Property

### Actor

User

### Pre-condition

User is Authenticated

### Post-condition

1. delete entry Properties table
2. delete Rendering file from storage

### Queries

```SQL
delete from Properties where propertyID=?
```

## 7. See Recent Crime Feed

### Actor

User

### Pre-condition

User is Authenticated

### Post-condition

Display recent Crimes in Area

### Queries


## 8. NSA Finder

### Actor

User

### Pre-condition

User is Authenticated

### Post-condition

Display Results for user

## 9. Report a Crime

### Actor

User

### Pre-condition

User is Authenticated
User fills out form

### Post-condition

Form is submitted

### Crime Database updated

```SQL
insert into crimes values(?);
```