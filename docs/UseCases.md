# USE CASES

## 1. Add User and Property

### Actor

Registrar

### Pre-condition

None

### Post-condition

User is added to ACCOUNTS table

### Queries

```SQL
insert into ACCOUNTS values (?);
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
delete * from Sensor where sensorId=?;
```

## 4. Get Price Quote

### Actor

User

### Pre-condition

User is Authenticated

### Post-condition

Quotes table is updated with new quote

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

return 3d rendering of property with live heat map of movement

### Queries

```SQL
i.  select (propertyID, StreetAddress, ZipCode, TextAlerts) from Properties where `AssociatedAccountID`=?;
ii. select (motionZones) from Security where propertyID=?; // ID from query i
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