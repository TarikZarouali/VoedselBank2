USE VoedselBank2;
DROP PROCEDURE IF EXISTS getgezinbyid;

DELIMITER //

CREATE PROCEDURE getgezinbyid(IN gezin_id INT)
BEGIN
    SELECT
        Gezin.Naam AS Naam,
        Persoon.TypePersoon,
        CASE Persoon.IsVertegenwoordiger WHEN b'1' THEN 'Vertegenwoordiger' ELSE 'Gezinslid' END AS Gezinsrol,
        Allergie.Naam AS Allergie
    FROM Persoon
    INNER JOIN Gezin ON Persoon.GezinId = Gezin.Id
    LEFT JOIN AllergiePerPersoon ON Persoon.Id = AllergiePerPersoon.PersoonId
    LEFT JOIN Allergie ON AllergiePerPersoon.AllergieId = Allergie.Id
    WHERE Gezin.Id = gezin_id;
END //

DELIMITER ;
CALL getgezinbyid(1);
