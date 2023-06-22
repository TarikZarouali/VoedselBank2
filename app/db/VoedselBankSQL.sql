DROP DATABASE IF EXISTS VoedselBank2;
create database if not exists VoedselBank2;
Use VoedselBank2;

DROP TABLE IF EXISTS Allergie;
CREATE TABLE IF NOT EXISTS Allergie (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50),
    Omschrijving VARCHAR(200),
    AnafylactischRisico VARCHAR(100),
    IsActief BIT,
    Opmerking VARCHAR(255) NULL,
    DatumAangemaakt DATETIME(6),
    DatumGewijzigd DATETIME(6)
);

INSERT INTO Allergie (Naam, Omschrijving, AnafylactischRisico, IsActief, DatumAangemaakt, DatumGewijzigd)
VALUES
    ('Gluten', 'Allergisch voor gluten', 'zeerlaag', b'1', SYSDATE(6), SYSDATE(6)),
    ('Pindas', 'Allergisch voor pindas', 'Hoog', b'1', SYSDATE(6), SYSDATE(6)),
    ('Schaaldieren', 'Allergisch voor schaaldieren', 'RedelijkHoog', b'1', SYSDATE(6), SYSDATE(6)),
    ('Hazelnoten', 'Allergisch voor hazelnoten', 'laag', b'1', SYSDATE(6), SYSDATE(6)),
    ('Lactose', 'Allergisch voor lactose', 'Zeerlaag', b'1', SYSDATE(6), SYSDATE(6)),
    ('Soja', 'Allergisch voor soja', 'Zeerlaag', b'1', SYSDATE(6), SYSDATE(6));

DROP TABLE IF EXISTS Gezin;
CREATE TABLE IF NOT EXISTS Gezin (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50),
    Code VARCHAR(10),
    Omschrijving VARCHAR(100),
    AantalVolwassenen INT,
    AantalKinderen INT,
    AantalBabys INT,
    TotaalAantalPersonen INT,
    IsActief BIT,
    Opmerking VARCHAR(255) NULL,
    DatumAangemaakt DATETIME(6),
    DatumGewijzigd DATETIME(6)
);

INSERT INTO Gezin (Naam, Code, Omschrijving, AantalVolwassenen, AantalKinderen, AantalBabys, TotaalAantalPersonen, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES
    ('ZevenhuizenGezin', 'G0001', 'Bijstandsgezin', 2, 2, 0, 4, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    ('BergkampGezin', 'G0002', 'Bijstandsgezin', 2, 1, 1, 4, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    ('HeuvelGezin', 'G0003', 'Bijstandsgezin', 2, 0, 0, 2, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    ('ScherderGezin', 'G0004', 'Bijstandsgezin', 1, 0, 2, 3, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    ('DeJongGezin', 'G0005', 'Bijstandsgezin', 1, 1, 0, 2, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    ('VanderBergGezin', 'G0006', 'AlleenGaande', 1, 0, 0, 1, b'1', NULL, SYSDATE(6), SYSDATE(6));
    
    DROP TABLE IF EXISTS Persoon;
    CREATE TABLE IF NOT EXISTS Persoon (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    GezinId INT,
    Voornaam VARCHAR(50),
    Tussenvoegsel VARCHAR(50),
    Achternaam VARCHAR(50),
    Geboortedatum DATE,
    TypePersoon VARCHAR(50),
    IsVertegenwoordiger BIT,
    IsActief BIT,
    Opmerking VARCHAR(255) NULL,
    DatumAangemaakt DATETIME(6),
    DatumGewijzigd DATETIME(6),
    FOREIGN KEY (GezinId) REFERENCES Gezin(Id)
);

INSERT INTO Persoon (GezinId, Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, TypePersoon, IsVertegenwoordiger, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES
    (NULL, 'Hans', 'van', 'Leeuwen', '1958-02-12', 'Manager', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (NULL, 'Jan', 'van der', 'Sluijs', '1993-04-30', 'Medewerker', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (NULL, 'Herman', 'den', 'Duiker', '1989-08-30', 'Vrijwilliger', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (1, 'Johan', 'van', 'Zevenhuizen', '1990-05-20', 'Klant', b'1', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (1, 'Sarah', 'den', 'Dolder', '1985-03-23', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (1, 'Theo', 'van', 'Zevenhuizen', '2015-03-08', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (1, 'Jantien', 'van', 'Zevenhuizen', '2016-09-20', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (2, 'Arjan', NULL, 'Bergkamp', '1968-07-12', 'Klant', b'1', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (2, 'Janneke', NULL, 'Sanders', '1969-05-11', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (2, 'Stein', NULL, 'Bergkamp', '2009-02-02', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (2, 'Judith', NULL, 'Bergkamp', '2022-02-05', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (3, 'Mazin', 'van', 'Vliet', '1968-08-18', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (3, 'Selma', 'van de', 'Heuvel', '1965-09-04', 'Klant', b'1', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (4, 'Eva', NULL, 'Scherder', '2000-04-07', 'Klant', b'1', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (4, 'Felicia', NULL, 'Scherder', '2021-11-29', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (4, 'Devin', NULL, 'Scherder', '2023-03-01', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (5, 'Frieda', NULL, 'de Jong', '1980-09-04', 'Klant', b'1', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (5, 'Simeon', NULL, 'de Jong', '2018-05-23', 'Klant', b'0', b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (6, 'Hanna', 'van der', 'Berg', '1999-09-09', 'Klant', b'1', b'1', NULL, SYSDATE(6), SYSDATE(6));
    
    DROP TABLE IF EXISTS AllergiePerPersoon;
    CREATE TABLE IF NOT EXISTS AllergiePerPersoon (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    PersoonId INT,
    AllergieId INT,
    IsActief BIT,
    Opmerking VARCHAR(255) NULL,
    DatumAangemaakt DATETIME(6),
    DatumGewijzigd DATETIME(6),
    FOREIGN KEY (PersoonId) REFERENCES Persoon(Id),
    FOREIGN KEY (AllergieId) REFERENCES Allergie(Id)
);

INSERT INTO AllergiePerPersoon (PersoonId, AllergieId, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES
    (4, 1, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (5, 2, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (6, 3, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (7, 4, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (8, 3, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (9, 2, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (10, 5, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (12, 2, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (13, 4, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (14, 1, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (15, 3, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (16, 5, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (17, 1, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (17, 2, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (18, 4, b'1', NULL, SYSDATE(6), SYSDATE(6)),
    (19, 4, b'1', NULL, SYSDATE(6), SYSDATE(6));

    
    

