SELECT pets_sitter.sitter_id, personal_info.Fname,personal_info.Lname, personal_info.email, personal_info.Gender, personal_info.Age, 
        personal_info.city, pets_sitter.image, pets_sitter.daily_price,pets_sitter.rate
        FROM pets_sitter INNER JOIN personal_info ON pets_sitter.sitter_id=personal_info.persnal_id;

SELECT pets_sitter.sitter_id, personal_info.Fname,personal_info.Lname, personal_info.email, personal_info.Gender, personal_info.Age, 
            personal_info.city, pets_sitter.image, pets_sitter.daily_price,pets_sitter.rate
            FROM pets_sitter INNER JOIN personal_info ON pets_sitter.sitter_id=personal_info.persnal_id
            WHERE CONCAT(personal_info.city) LIKE "Dhahran";
        
SELECT * FROM personal_info WHERE persnal_id = 16;

SELECT * FROM pets_owner WHERE personal_info = 16;

SELECT * FROM pets WHERE owner_id = (SELECT owner_id FROM pets_owner WHERE personal_info = 16);