USE VoedselBank2;
DROP PROCEDURE IF EXISTS getoverzichtallergiebyfilter;
DELIMITER //

CREATE PROCEDURE getoverzichtallergiebyfilter(IN allergyName VARCHAR(200))
BEGIN
    SELECT Gezin.Id,
           Gezin.Code,
           CONCAT_WS(' ', Persoon.Voornaam, Persoon.Tussenvoegsel, Persoon.Achternaam) AS Naam,
           Gezin.Omschrijving,
           Gezin.AantalVolwassenen,
           Gezin.AantalKinderen,
           Gezin.AantalBabys,
           Persoon.IsVertegenwoordiger
    FROM Persoon
    INNER JOIN Gezin ON Persoon.GezinId = Gezin.Id
    INNER JOIN AllergiePerPersoon ON Persoon.Id = AllergiePerPersoon.PersoonId
    INNER JOIN Allergie ON AllergiePerPersoon.AllergieId = Allergie.Id
    WHERE Allergie.Naam = allergyName;
END //

DELIMITER ;
CALL getoverzichtallergiebyfilter('Gluten');
