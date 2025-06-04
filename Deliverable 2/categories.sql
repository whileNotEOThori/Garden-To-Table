USE garden_to_table;

CREATE TABLE categories(
cID INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL UNIQUE
);

SELECT * FROM garden_to_table.categories;

INSERT INTO garden_to_table.categories (name) VALUES ('Fruit');
INSERT INTO garden_to_table.categories (name) VALUES ('Vegetables');
INSERT INTO garden_to_table.categories (name) VALUES ('Grains');
INSERT INTO garden_to_table.categories (name) VALUES ('Poultry');
INSERT INTO garden_to_table.categories (name) VALUES ('Seeds/Seedlings');
INSERT INTO garden_to_table.categories (name) VALUES ('Herbs');