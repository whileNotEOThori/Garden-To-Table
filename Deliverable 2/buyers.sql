USE garden_to_table;

CREATE TABLE buyers(
	bID INT AUTO_INCREMENT PRIMARY KEY,
    uID INT NOT NULL,
    physicalAddress TEXT NOT NULL,
    FOREIGN KEY (uID) REFERENCES users(uID)
);

SELECT * FROM garden_to_table.buyers;

ALTER TABLE garden_to_table.buyers DROP COLUMN physicalAddress;

ALTER TABLE garden_to_table.buyers ADD streetAddress VARCHAR(100) NOT NULL;

ALTER TABLE garden_to_table.buyers ADD postcode VARCHAR(5) NOT NULL;

ALTER TABLE `garden_to_table`.`buyers` 
ADD UNIQUE INDEX `uID_UNIQUE` (`uID` ASC) VISIBLE;
;
