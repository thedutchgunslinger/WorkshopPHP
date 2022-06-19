/*
     Opdracht:      Blogger
     Auteur:        Noah Beij
     Aanmaakdatum:  Juni 2022 
     Bestandsnaam:  createDatabase.sql
*/

-- Start in master database
USE MASTER;
GO

-- Drop in case database already exists
DROP DATABASE IF EXISTS [bloggerdb];
GO

-- Create database called 'bloggerdb'
CREATE DATABASE bloggerdb;
GO
-- Use database called 'bloggerdb'
USE bloggerdb;


-- Het aanmaken van de tabel Gebruikers
CREATE TABLE Gebruikers 
(
  id			int		NOT NULL IDENTITY(1,1),
  voornaam		varchar NOT NULL	 (255),
  achternaam	varchar NOT NULL	 (255),
  email			varchar NOT NULL	 (255),
  datum			date					  ,
  wachtwoord	varchar NOT NULL	 (255),
  PRIMARY KEY (id) -- met alter table en constraint
);

-- Het aanmaken van de tabel Berichten
CREATE TABLE Berichten (
  id			int		NOT NULL	IDENTITY(1,1),
  userId		int		NOT NULL,
  title			varchar NOT NULL	(255),
  bericht		text	NOT NULL
  PRIMARY KEY (id)
);

-- Mockup data voor de tabel Gebruikers
insert into gebruikers (voornaam, achternaam, email, datum, wachtwoord) values ('dev', 'dev', 'dev@dev.com', '2020-12-24 15:55:02', 'ef260e9aa3c673af240d17a2660480361a8e081d1ffeca2a5ed0e3219fc18567');
insert into gebruikers (voornaam, achternaam, email, datum, wachtwoord) values ('Torbjorn', 'Grattan', 'test@test.com', '2020-08-26 03:54:25', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
insert into gebruikers (voornaam, achternaam, email, datum, wachtwoord) values ('Len', 'Giacopini', 'igiacopini2@trellian.com', '2020-08-01 18:26:28', 'be7373a7fcbb08619c63d24bd5987a2e3d6da0c0803bdd1a1f1e525a21ceccdb');
insert into gebruikers (voornaam, achternaam, email, datum, wachtwoord) values ('Lucrece', 'Aronov', 'maronov3@blogspot.com', '2020-06-23 03:36:47', '6a5fcdc40e774406a6297afd9b6e41937d6c33af9069cd609d92373efb1de796');
insert into gebruikers (voornaam, achternaam, email, datum, wachtwoord) values ('Laurene', 'Leftbridge', 'gleftbridge4@thetimes.co.uk', '2020-07-26 01:54:11', 'c7879a6b648d956fe701a0a0b4b3a4a6d0a1f0a151a3993e5790f79f88f4643c');

-- Mockup data voor de tabel Berichten
insert into berichten (userId, title, bericht) values (5, 'Nulla ac enim.', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.

Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.');
insert into berichten (userId, title, bericht) values (5, 'Etiam vel augue.', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.

Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.');
insert into berichten (userId, title, bericht) values (2, 'In eleifend quam a odio.', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.');
insert into berichten (userId, title, bericht) values (3, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.');
insert into berichten (userId, title, bericht) values (3, 'Pellentesque viverra pede ac diam.', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.

Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.');
insert into berichten (userId, title, bericht) values (1, 'Nulla facilisi.', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.');
insert into berichten (userId, title, bericht) values (1, 'Donec ut dolor.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.

Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.

Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.');
insert into berichten (userId, title, bericht) values (4, 'Proin risus.', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.

Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.');
insert into berichten (userId, title, bericht) values (2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.');
insert into berichten (userId, title, bericht) values (3, 'Aliquam erat volutpat.', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.');
insert into berichten (userId, title, bericht) values (3, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.');
insert into berichten (userId, title, bericht) values (2, 'Nam dui.', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.

Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.');
insert into berichten (userId, title, bericht) values (1, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.');
insert into berichten (userId, title, bericht) values (2, 'Curabitur gravida nisi at nibh.', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.

Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.');
insert into berichten (userId, title, bericht) values (5, 'Donec posuere metus vitae ipsum.', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.');
insert into berichten (userId, title, bericht) values (1, 'Nullam porttitor lacus at turpis.', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.');
insert into berichten (userId, title, bericht) values (1, 'Nullam varius.', 'In congue. Etiam justo. Etiam pretium iaculis justo.

In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.');
insert into berichten (userId, title, bericht) values (1, 'Aenean sit amet justo.', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.

Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.');
insert into berichten (userId, title, bericht) values (3, 'Etiam faucibus cursus urna.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.

Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.

In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.');
insert into berichten (userId, title, bericht) values (4, 'Nulla nisl.', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.');
