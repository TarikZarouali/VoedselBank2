USE VoedselBank2;
DROP PROCEDURE IF EXISTS getgezinbyid2;

DELIMITER //

CREATE PROCEDURE getgezinbyid2(IN gezin_id INT)
BEGIN
    SELECT
        Gezin.Naam AS gezinsnaam,
        Gezin.Omschrijving AS omschrijving,
        (Gezin.AantalVolwassenen + Gezin.AantalKinderen + Gezin.AantalBabys) AS `totaal aantal personen`
    FROM Gezin
    WHERE Gezin.Id = gezin_id;
END //

DELIMITER ;
CALL getgezinbyid(1);
