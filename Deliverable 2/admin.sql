USE garden_to_table;

CREATE TABLE admins(
	aID INT AUTO_INCREMENT PRIMARY KEY,
    uID INT NOT NULL,
    FOREIGN KEY (uID) REFERENCES users(uID)
);

select * from garden_to_table.admins;