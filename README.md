![logo](https://user-images.githubusercontent.com/70900361/122216683-524b4880-ceb5-11eb-90e4-8ab4f59fa2d7.png)




# Summer internship on "Optimization of Shipping Costs: Parimautomaat"

![Image of our page](https://github.com/stellamarii/suvepraktika/blob/main/GitHubImages/main.png?raw=true)

### Purpose and brief description

As part of the software project course of the Digital Technology Institute of Tallinn University, our goal was to create a website that would allow people to send parcels with parcel machines as cheaply as possible. During the summer internship period, we made a website called Parimautomaat, which allows the user to enter the dimensions, weight, starting and final location of the package, and based on these, our system calculates the cheapest transport company with which to send the package. The system works by converting entered addresses into coordinates. It then takes the coordinates of the parcel machines from the database and calculates their distance from the addresses entered by the user (which have been converted into coordinates). The results are given by the system on the results page, which shows the cheapest way of sending the specified package for each transport company.

### Used software and versions

•Opencagedata Geocoding API

•PHP v.7.4.20

•MySql v.15.1

•Html v.5

•Javascript v.puudub

•Css v.3

•Ajax v.puudub

### Contributors to the project
Marcus-Indrek Simmer, 
Stella-Marii Tamme, 
Margen Peterson, 
Margarita Zahharova

### Installation instructions
Et projekti paigaldada enda lehele, soovitame me esiteks alustada andmebaasi koostamisega. Dpd.sql, itella.sql, omniva_machines.sql, pakid.sql ja accounts.sql leiab rootis asuvast kaustast nimega "ToDatabase".

There are two ways to create a database.
1) Import dpd.sql, itella.sql, omniva_machines.sql, pakid.sql and accounts.sql into the database with phpMyAdmin.
2) Open each file and copy the "CREATE TABLE..., INSERT INTO...., ALTER TABLE...," in each file to MySql in the order they were written to the file, one at a time.

Next, all project files must be uploaded to a server or a computer that supports all used software. To use your own databases, you need to change $database = "if20_marcus_praktika" to your own database in some .php files. For security reasons, you must make your own config file consisting of @serverhost, @serverUsername and @serverPassword, and this config file must be located 2 directories before the project files. (Logically, before public_html)

To open the web page, you need to open index.php, and to open the system manager, you need to open "SystemMaintancePage" in the index.php folder.

### License
![Image of Copyright](https://camo.githubusercontent.com/9e918e1e7cd28a73246cf1c8d2c9903da3e487a65931c823a2391afe4b4a0d04/68747470733a2f2f6c6963656e7365627574746f6e732e6e65742f702f7a65726f2f312e302f38387833312e706e67)

To the extent possible under law, Marcus-Indrek Simmer, Stella-Marii Tamme, Margen Peterson ja Margarita Zahharova have waived all copyright and related or neighboring rights to this work.

