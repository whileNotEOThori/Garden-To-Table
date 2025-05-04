USE garden_to_table;

CREATE TABLE categories(
cID INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL UNIQUE
);

Insert into gard