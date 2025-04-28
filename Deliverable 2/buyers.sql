USE garden_to_table;

CREATE TABLE buyers(
	bID INT AUTO_INCREMENT PRIMARY KEY,
    uID INT NOT NULL,
    physicalAddress TEXT NOT NULL,
    FOREIGN KEY (uID) REFERENCES users(uID)
);