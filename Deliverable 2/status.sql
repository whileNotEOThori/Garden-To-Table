USE garden_to_table;

CREATE TABLE status(
statusID INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(25) NOT NULL UNIQUE
);

SELECT * FROM garden_to_table.status;

INSERT INTO garden_to_table.status (name) VALUES ('Pending');
INSERT INTO garden_to_table.status (name) VALUES ('Paid');
INSERT INTO garden_to_table.status (name) VALUES ('Verified');
INSERT INTO garden_to_table.status (name) VALUES ('Shipped');
INSERT INTO garden_to_table.status (name) VALUES ('Ready for collection');
INSERT INTO garden_to_table.status (name) VALUES ('Delivered');
INSERT INTO garden_to_table.status (name) VALUES ('Collected');
INSERT INTO garden_to_table.status (name) VALUES ('Paid Out');

DROP TABLE `garden_to_table`.`status`;
