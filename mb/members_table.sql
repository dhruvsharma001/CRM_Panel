CREATE TABLE IF NOT EXISTS members (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(15) NOT NULL,
  email varchar(25) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Dumping data for table `members`
--
INSERT INTO members ('id', 'username', 'email') VALUES
(1, 'John.Smith', 'john.smith@gmail.com'),
(2, 'Mariah.Carey', 'mariah.carey@gmail.com'),
(3, 'Michael.Jackson', 'micahel.jackson@gmail.com'),
(4, 'Tommy.Jones', 'tommy.jones@gmail.com'),
(5, 'Jade.Krafsig', 'jade@design1online.com'),
(6, 'Tom.Hanks', 'tom.hanks@gmail.com'),
(7, 'Dr.Suess', 'dr.suess@whooville.com'),
(8, 'Santa.Clause', 'santa.clause@nrthpole.com'),
(9, 'Leo.Decaprio', 'leo@lionsden.com'),
(10, 'Haley.Berry', 'haley@catwomen.com'),
(11, 'Basil', 'basil@herbs.com'),
(12, 'Thyme', 'thyme@herbs.com'),
(13, 'Dog', 'dog@animal.com'),
(14, 'Chimp', 'chimp@animal.com'),
(15, 'Coffee', 'coffee@drink.com'),
(16, 'Soda', 'soda@drink.com'),
(17, 'Pizza', 'pizza@food.com'),
(18, 'Salad', 'salad@food.com'),
(19, 'Rome', 'rome@italy.com'),
(20, 'Tokyo', 'tokyo@japan.com'),
(21, 'Google', 'google@google.com'),
(22, 'AOL', 'aol@aol.com'),
(23, 'Smile', 'smile@happy.com'),
(24, 'Frown', 'frown@sad.com'),
(25, 'Sing', 'sing@music.com'),
(26, 'White Noise', 'noise@paddedroom.com');