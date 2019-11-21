CREATE DATABASE IF NOT EXISTS stfh_images;

USE stfh_images;

CREATE TABLE IF NOT EXISTS Files (
	fileID INT(10) AUTO_INCREMENT,
	fileName VARCHAR(255) NOT NULL,
	fileType VARChar(255) NOT NULL,
	fileSize INT(32) NOT NULL,
	fileUploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (fileId)
);

INSERT INTO Files (fileName, fileType, FileSize)
	VALUES ('file_name', 'file_type', 'file_size');