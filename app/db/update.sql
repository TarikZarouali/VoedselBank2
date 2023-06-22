USE VoedselBank2;
DROP PROCEDURE IF EXISTS updateAllergie;

DELIMITER //

CREATE PROCEDURE updateAllergie(
    IN p_id INT,
    IN p_allergieid INT,
    IN p_allergieopmerkingen VARCHAR(255)
)
BEGIN
    UPDATE AllergiePerPersoon
    SET AllergieId = p_allergieid, Opmerkingen = p_allergieopmerkingen
    WHERE PersoonId = p_id;

    SELECT ROW_COUNT() AS RowsAffected;
END //

DELIMITER ;
