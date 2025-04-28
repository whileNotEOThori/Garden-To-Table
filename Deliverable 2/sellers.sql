USE garden_to_table;

CREATE TABLE sellers(
	sID INT AUTO_INCREMENT PRIMARY KEY,
    uID INT NOT NULL,
    physicalAddress TEXT NOT NULL,
    totalSales decimal(10,2) default 0.00,
    FOREIGN KEY (uID) REFERENCES users(uID)
);