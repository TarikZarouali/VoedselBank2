<?php

class GezinsAllergieModel
{
    private Database $Db;

    public function __construct()
    {
        $this->Db = new Database();
    }

    public function getAllergieOverzicht()
    {
        try {
            $getAllergieOverzicht = "CALL getoverzichtallergie()";
            $this->Db->query($getAllergieOverzicht);
            $result = $this->Db->resultSet();
            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get all Allergies from the database in class AllergieModel method getAllergiesUseSp!", 0);
            die('ERROR: Failed to get all Allergies from the database in class AllergieModel method getAllergiesUseSp! ' . $ex->getMessage());
        }
    }

    public function getOverzichtAllergieByFilter($allergyName = null)
    {
        try {
            $getOverzichtAllergieByFilter = "CALL getoverzichtallergiebyfilter(:allergynaam)";
            $this->Db->query($getOverzichtAllergieByFilter);
            $this->Db->bind(':allergynaam', $allergyName);
            $result = $this->Db->resultSet();
            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Allergies by filter from the database in class AllergieModel method getOverzichtAllergieByFilter!", 0);
            die('ERROR: Failed to get Allergies by filter from the database in class AllergieModel method getOverzichtAllergieByFilter! ' . $ex->getMessage());
        }
    }

    public function getDetailsById($id)
    {
        try {
            $getDetailsById = "CALL getdetailsbyid(:id)";
            $this->Db->query($getDetailsById);
            $this->Db->bind(':id', $id);
            $result = $this->Db->single();

            $conBijId = ($result);

            return $conBijId ?? [];

        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Allergy details from the database in class AllergieModel method getDetailsById!", 0);
            die('ERROR: Failed to get Allergy details from the database in class AllergieModel method getDetailsById! ' . $ex->getMessage());
        }
    }

    public function getGezinById($id)
    {
        try {
            $getGezinById = "CALL getgezinbyid(:id)";

            $this->Db->query($getGezinById);
            
            $this->Db->bind(':id', $id);
            $result = $this->Db->single();

                  $conBijId = ($result);

            return $conBijId ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Gezin by ID from the database in class AllergieModel method getGezinById!", 0);
            die('ERROR: Failed to get Gezin by ID from the database in class AllergieModel method getGezinById! ' . $ex->getMessage());
        }
    }

    public function updateAllergie($data)
    {
        try {
            $updateAllergie = "CALL updateAllergie(:id, :allergieid, :allergieopmerkingen)";
            $this->Db->query($updateAllergie);
            $this->Db->bind(':id', $data['id']);
            $this->Db->bind(':allergieid', $data['allergieid']);
            $this->Db->bind(':allergieopmerkingen', $data['allergieopmerkingen']);
            $result = $this->Db->execute();
            return $result;
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to update Allergie in the database in class AllergieModel method updateAllergie!", 0);
            die('ERROR: Failed to update Allergie in the database in class AllergieModel method updateAllergie! ' . $ex->getMessage());
        }
    }
}