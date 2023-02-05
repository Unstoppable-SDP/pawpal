CREATE SCHEMA pawpal;

USE pawpal;

CREATE TABLE pets_owner (
owner_id INT PRIMARY KEY,
email VARCHAR(50) UNIQUE,
password VARCHAR(25),
Fname VARCHAR(25),
Lname VARCHAR(25),
Gender VARCHAR(6),
Birthdate DATE,
Age INT,
city VARCHAR(20),
street VARCHAR(20),
hn INT
);

CREATE TABLE pets_sitter (
	setter_id INT PRIMARY KEY,
	email VARCHAR(50) UNIQUE,
	Fname VARCHAR(25),
	Lname VARCHAR(25),
	Gender VARCHAR(6),
	Birthdate DATE,
	Age INT,
	city VARCHAR(20),
	street VARCHAR(20),
	hn INT,
	image VARCHAR(100),
	experience INT,
	daily_price DOUBLE,
	rate INT
);


CREATE TABLE pets_type (
    type_name VARCHAR(25),
    setter_id INT NOT NULL REFERENCES pets_sitter(setter_id) ON DELETE CASCADE
);

CREATE TABLE Pets (
	pet_id INT PRIMARY KEY,
    pet_name VARCHAR(25),
    owner_id INT NOT NULL REFERENCES pets_owner(owner_id) ON DELETE CASCADE,
    pet_type VARCHAR(25),
    pet_age INT,
    pet_gender VARCHAR(6),
    requirements VARCHAR(300) 
);

CREATE TABLE booking(
	booking_id INT,
    pet_id INT NOT NULL REFERENCES Pets(pe_id) ON DELETE CASCADE,
    sitter_id INT NOT NULL REFERENCES pets_sitter(setter_id) ON DELETE CASCADE,
    start_date DATE,
    end_date DATE,
    total_price DOUBLE
);

