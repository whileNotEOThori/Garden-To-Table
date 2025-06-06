USE garden_to_table;

CREATE TABLE revenue(
	rID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    oID INT UNIQUE NOT NULL,
    totalRevenue DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (oID) REFERENCES orders(oID)
);

SELECT * FROM garden_to_table.revenue;

drop table garden_to_table.revenue;