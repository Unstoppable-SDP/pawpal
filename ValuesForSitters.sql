Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("ahmed@gmail.com", "Ahmed", "Aljohani", "Male", "1998-02-10", "Riyadh","Al-Mansour Street", 1234);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://cdn1.sportngin.com/attachments/roster_player_info/8810/1371/thomas_gonzalez_medium.png",75,4);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);

Insert into pets_type
Values ("Dog",1);

Insert into pets_type
Values ("Cat",1);

Insert into pets_type
Values ("Birds",1);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("fatimah@gmail.com", "Fatimah", "Alharbi", "Female", "1995-12-05", "Jeddah","King Abdulaziz Road", 5678);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://cdn4.premiumread.com/?url=https://al-madina.com/uploads/images/2021/11/04/1963856.jpg&w=801&q=100&f=webp",80,5);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Dog",2);

Insert into pets_type
Values ("Cat",2);

Insert into pets_type
Values ("Rabbit",2);

Insert into pets_type
Values ("Fish",2);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("abdullah@gmail.com", "Abdullah", "Alsulami", "Male", "1992-07-03", "Dammam","Prince Mohammed Road", 9012);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://medicalcity.ksu.edu.sa/images/uploads/news/_details/dralmhisin.jpeg",70,3);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Guinea pig",3);

Insert into pets_type
Values ("Ferret",3);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("amina@gmail.com", "Amina", "Alkhudair", "Female", "1994-11-11", "Makkah","King Abdulaziz Road", 3456);


Insert into pets_sitter(image,daily_price,rate)
Values ("https://www.gheir.com/big/yd-18-11-202010.jpg",80,4);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Turtle",4);

Insert into pets_type
Values ("Hamster",4);

Insert into pets_type
Values ("Rabbit",4);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("mohammed1@gmail.com", "Mohammed", "Alqahtani", "Male", "1991-01-02", "Dhahran","King Fahd Road", 7890);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://faculty.psau.edu.sa/files/profile/t.alqahtani%40psau.edu.sa/pic.jpeg",75,5);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Monkey",5);

Insert into pets_type
Values ("Amphibians",5);

Insert into pets_type
Values ("Bearded dragons",5);

Insert into pets_type
Values ("Guinea pig",5);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("hanan@gmail.com", "Hanan", "Alshehri", "Female", "1996-04-04", "Tabuk","Prince Sultan Road", 2345);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://www.thegirlsnetwork.org.uk/GetImage.aspx?IDMF=ede1780f-257a-4dc1-a8d6-0e461518d9b7&w=564&h=817&src=mc",79,4);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Monkey",6);

Insert into pets_type
Values ("Amphibians",6);

Insert into pets_type
Values ("Fish",6);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("ibrahim2@gmail.com", "Ibrahim", "Alshammari", "Male", "1993-08-08", "Buraidah","King Khalid Road", 6789);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://olympic.sa/sites/default/files/cocoon/%d8%a5%d8%a8%d8%b1%d8%a7%d9%87%d9%8a%d9%85%20%d8%a7%d9%84%d9%85%d8%b9%d9%8a%d9%82%d9%84_0.jpeg",85,4);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Turtle",7);

Insert into pets_type
Values ("Hamster",7);

Insert into pets_type
Values ("Guinea pig",7);

Insert into pets_type
Values ("Birds",7);


Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("saad2@gmail.com", "Saad", "Almalki", "Male", "1989-06-06", "Abha","Prince Sultan Road", 1234);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://maaal.com/wp-content/uploads/2018/01/WhatsApp-Image-2018-01-01-at-1.03.15-PM-1.jpg",76,3);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Fish",8);

Insert into pets_type
Values ("Ferret",8);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("noura2@gmail.com", "Noura", "Alzaid", "Female", "1997-09-09", "Hail","King Khalid Road", 5678);

Insert into pets_sitter(image,daily_price,rate)
Values ("https://www.theartcollector.org/wp-content/uploads/2019/04/img62.jpg",80,4);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Bearded dragons",9);

Insert into pets_type
Values ("Dog",9);

Insert into pets_type
Values ("Cat",9);

Insert into pets_type
Values ("Ferret",9);

Insert into personal_info(email,Fname,Lname,Gender,Birthdate,city,street,hn)
Values ("ahmad4@gmail.com", "Ahmad", "Alsharif", "Male", "1992-01-01", "Qatif","Prince Mohammed Road", 9012);

Insert into pets_sitter(image,daily_price,rate)
Values("https://assets-global.website-files.com/620ff6c426544faf00000d23/620ff6c426544f00fe000ea1_Abdulaziz%20Bin%20Huwel.jpg",90,2);

UPDATE pets_sitter 
SET personal_info = (SELECT persnal_id 
					FROM  personal_info 
					ORDER BY persnal_id DESC LIMIT 1)
where sitter_id = (SELECT   sitter_id
					FROM  pets_sitter 
					ORDER BY sitter_id DESC LIMIT 1);
                    
Insert into pets_type
Values ("Cat",10);

Insert into pets_type
Values ("Dog",10);