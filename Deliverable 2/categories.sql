USE garden_to_table;

CREATE TABLE categories(
cID INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL UNIQUE
);

select * from garden_to_table.categories;

Insert into garden_to_table.categories (name) values ('Fruit');
Insert into garden_to_table.categories (name) values ('Vegetables');