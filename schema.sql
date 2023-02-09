CREATE SCHEMA pawpal;

USE pawpal;

CREATE TABLE personal_info (
	persnal_id INT PRIMARY KEY,
	email VARCHAR(50) UNIQUE,
	Fname VARCHAR(25),
	Lname VARCHAR(25),
	Gender VARCHAR(6),
	Birthdate DATE,
	Age INT,
	city VARCHAR(20),
	street VARCHAR(20),
	hn INT
);

CREATE TABLE pets_owner (
	owner_id INT PRIMARY KEY,
	prsonal_info INT,
	password VARCHAR(25),
	CONSTRAINT personal_info
		FOREIGN KEY (personal_info) 
		REFERENCES personal_info(personal_info)
		ON DELETE CASCADE
);

CREATE TABLE pets_sitter (
	sitter_id INT PRIMARY KEY,
    prsonal_info INT,
	image VARCHAR(100),
	daily_price DOUBLE,
	rate INT,
	CONSTRAINT sitter_info
		FOREIGN KEY (prsonal_info) 
		REFERENCES personal_info(prsonal_info)
		ON DELETE CASCADE
);


CREATE TABLE pets_type (
    type_name VARCHAR(25),
    sitter_id INT NOT NULL,
    CONSTRAINT fk_pt
		FOREIGN KEY (sitter_id) 
		REFERENCES pets_sitter(sitter_id)
		ON DELETE CASCADE
);

CREATE TABLE Pets (
	pet_id INT PRIMARY KEY,
    pet_name VARCHAR(25),
    owner_id INT NOT NULL,
    pet_type VARCHAR(25),
    pet_age INT,
    pet_gender VARCHAR(6),
    requirements VARCHAR(500),
	CONSTRAINT fk_p_owner
		FOREIGN KEY (owner_id) 
		REFERENCES pets_owner(owner_id)
		ON DELETE CASCADE
);

CREATE TABLE booking(
	booking_id INT,
    pet_id INT NOT NULL,
    sitter_id INT NOT NULL,
    start_date DATE,
    end_date DATE,
    quantity Int,
    total_price DOUBLE,
    	CONSTRAINT fk_p_book
			FOREIGN KEY (pet_id) 
			REFERENCES Pets(pet_id)
			ON DELETE CASCADE,
        CONSTRAINT fk_s_book
			    FOREIGN KEY (sitter_id) 
				REFERENCES pets_sitter(sitter_id)
				ON DELETE CASCADE,
        CONSTRAINT quan
				check(quantity < 7)
);
