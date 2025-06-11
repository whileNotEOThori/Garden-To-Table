CREATE DATABASE garden_to_table;

USE garden_to_table;

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    emailAddress VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    isRead BOOLEAN DEFAULT FALSE,
    timeSent TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM garden_to_table.messages;

update garden_to_table.messages set isRead = 1 where mID = 1;

ALTER TABLE garden_to_table.messages RENAME COLUMN id to mID;