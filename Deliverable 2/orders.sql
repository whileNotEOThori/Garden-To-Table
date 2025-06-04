USE garden_to_table;

CREATE TABLE orders (
    oID INT AUTO_INCREMENT PRIMARY KEY,
    bID INT NOT NULL,
    statusID INT DEFAULT 1,
    item_quant TEXT NOT NULL,
    delivery BOOLEAN DEFAULT FALSE,
    collection BOOLEAN DEFAULT TRUE,
    amount DECIMAL(10,2) NOT NULL,
    serviceFee DECIMAL(10,2) NOT NULL,
    deliveryFee DECIMAL(10,2) DEFAULT 0.00,
    totalAmount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bID) REFERENCES buyers(bID),
    FOREIGN KEY (statusID) REFERENCES status(statusID)
);

SELECT * FROM garden_to_table.orders;
