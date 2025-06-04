USE garden_to_table;

CREATE TABLE products (
    pID INT AUTO_INCREMENT PRIMARY KEY,
    sID INT NOT NULL,
    cID INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    mass DECIMAL(6,2) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    quantity INT NOT NULL,
    image MEDIUMBLOB NOT NULL,
    dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sID) REFERENCES sellers(sID),
    FOREIGN KEY (cID) REFERENCES categories(cID)
);

SELECT * FROM garden_to_table.products;

SELECT * FROM garden_to_table.products ORDER BY price DESC;