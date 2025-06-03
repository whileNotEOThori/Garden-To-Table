USE garden_to_table;

CREATE TABLE sellers(
	sID INT AUTO_INCREMENT PRIMARY KEY,
    uID INT NOT NULL,
    physicalAddress TEXT NOT NULL,
    totalSales DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (uID) REFERENCES users(uID)
);

SELECT * FROM garden_to_table.sellers;

ALTER TABLE garden_to_table.sellers DROP COLUMN physicalAddress;

ALTER TABLE garden_to_table.sellers ADD streetAddress VARCHAR(100) NOT NULL;

ALTER TABLE garden_to_table.sellers ADD postcode VARCHAR(5) NOT NULL;

ALTER TABLE `garden_to_table`.`sellers` 
ADD UNIQUE INDEX `uID_UNIQUE` (`uID` ASC) VISIBLE;

ALTER TABLE garden_to_table.sellers ADD bankName VARCHAR(100) NOT NULL;
ALTER TABLE garden_to_table.sellers ADD branchCode VARCHAR(10) NOT NULL;
ALTER TABLE garden_to_table.sellers ADD accountNumber VARCHAR(25) NOT NULL;

ALTER TABLE `garden_to_table`.`sellers` 
CHANGE COLUMN `bankName` `bankName` VARCHAR(100) NULL ,
CHANGE COLUMN `branchCode` `branchCode` VARCHAR(10) NULL ,
CHANGE COLUMN `accountNumber` `accountNumber` VARCHAR(25) NULL ;

ALTER TABLE garden_to_table.sellers ADD deliveryRate DECIMAL(3,2) DEFAULT 1.00;


