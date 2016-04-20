# USE CASES

## 1. Add New User

### Actor

Registrar

### Pre-condition

None

### Post-condition

User is added to ACCOUNTS table

### Queries

```SQL
insert into ACCOUNTS (Email, LastName, FirstName, password, passwordSalt) values (?);
```

## 2. Add Property

### Actor

User

### Pre-condition

User is Authenticated
User's has .json formatted 3d rendering of house / property
User inputs conditions for Text alerts

### Post-condition

Property Table is updated
Property.json file is uploaded and named to ~propertyID~.json

### Queries

```SQL
insert into Properties (StreetAddress, ZipCode, TextAlerts, AssociatedAccount) values (?);
```

## 3. Add Zones to Property

### Actor

User

### Pre-condition

User is Authenticated
User has motion detectors installed at property by Technicial

### Post-condition

Security Table is updated with property id and 

### Queries

```SQL
insert into Security (propertyID) values(?);
```

## 4. Change Rate For Security Price

### Actor

Administrator

### Pre-condition

Administrator is Authenticated

### Post-condition

Quotes table is updated with new quote

### Queries

```SQL
update Quotes set sqft_to_price_multiplier=?;
```


## 5. View Security System Status

### Actor

User / Administrator

### Pre-condition

User / Administrator is Authenticated
User / Administrator requests to see status

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

delete entry Properties table
delete Rendering file from storage

### Queries

```SQL
delete from Properties where propertyID=?
```

## 7. Delete Account

### Actor

User

### Pre-condition

User is Authenticated

### Post-condition

remove properties from Properties table
remove user from ACCOUNTS table

### Queries

```SQL
delete from Properties where AssociatedAccountID=?;
delete from ACCOUNTS where email=?;
```

## 8. Get Price Quote

### Actor

Non-User

### Pre-condition

User enters sqft of covered property

### Post-condition

Create Quote from data in Quotes Table
Return that quote

### Queries

```SQL
select (sqft_to_price_multiplier) from Quotes limit 1;
```
