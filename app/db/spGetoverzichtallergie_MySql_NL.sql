
    USE VoedselBank2;
    DROP PROCEDURE IF EXISTS getoverzichtallergie;
    
	DELIMITER //

CREATE PROCEDURE getoverzichtallergie()
BEGIN
    SELECT 			Gezin.Code, 
					CONCAT_WS(' ', Persoon.Voornaam, Persoon.Tussenvoegsel, Persoon.Achternaam) AS Naam ,
                    Gezin.Omschrijving, 
                    Gezin.AantalVolwassenen, 
                    Gezin.AantalKinderen, 
                    Gezin.AantalBabys, 
                    Persoon.IsVertegenwoordiger
    FROM Persoon
    INNER JOIN Gezin ON Persoon.GezinId = Gezin.Id;
END //

DELIMITER ;

    DELIMITER ;
	
    
	CALL getoverzichtallergie()
	

    
 

   
   
   