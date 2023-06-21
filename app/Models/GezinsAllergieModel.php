<?php

    class GezinsAllergieModel
    {
        private Database $Db;

         public function __construct(Database $db = new Database)
        {
            $this->Db = $db;
        }


        public function getAllergieOverzicht()
        {
            try{
            $getAllergieOverzicht= "CALL getoverzichtallergie()";

            $this->Db->query($getAllergieOverzicht);

            $result = $this->Db->resultSet();

            return $result ?? [];
            }
            catch(PDOException $ex)
            {
                error_log("ERROR : Failed to get all Allergies from database in class AllergieModel method getAllergiesUseSp!", 0);
                die('ERROR : Failed to get all Allergies from database in class AllergieModel method getAllergiesUseSp! '. $ex->getMessage());
            }
            
        }

        public function getoverzichtallergiebyfilter($allergyName = null)
        {
            try {
                $getAllergieOverzicht = "CALL getoverzichtallergiebyfilter(:allergyName)";
                $this->Db->query($getAllergieOverzicht);
            if ($allergyName !== null) 
            {
                $this->Db->bind(':allergyName', $allergyName);
            }
                $result = $this->Db->resultSet();
                return $result ?? [];
            } catch (PDOException $ex) {
                error_log("ERROR: Failed to get all Allergies from the database in class AllergieModel method getAllergiesUseSp!", 0);
                die('ERROR: Failed to get all Allergies from the database in class AllergieModel method getAllergiesUseSp! ' . $ex->getMessage());
            }
        }

        public function getgezinbyid2($id)
        {
            try{
            $getselectedPersoon2 = "CALL getgezinbyid2(:id)";
            $this->Db->query($getselectedPersoon2);
            $this->Db->bind(':id', $id);
            $result = $this->Db->resultSet();


            $AllergieOBJ= $result;

            return $AllergieOBJ;
            }
            catch(PDOException $ex)
            {
                error_log("ERROR : Failed to get Allergie by id from database in class AllergieModel method getAllergieByIdUseSP!", 0);
                die('ERROR : Failed to get Allergie by id from database in class AllergieModel method getAllergieByIdUseSP! '. $ex->getMessage());
            }
        }

        public function getgezinbyid($Id)
        {

            try{
            $getselectedPersoon = "CALL getgezinbyid(:id)";
            $this->Db->query($getselectedPersoon);
            $this->Db->bind(':id', $Id);
            $result = $this->Db->resultSet();


            $AllergieOBJ= $result;

            return $AllergieOBJ;
            }
            catch(PDOException $ex)
            {
                error_log("ERROR : Failed to get Allergie by id from database in class AllergieModel method getAllergieByIdUseSP!", 0);
                die('ERROR : Failed to get Allergie by id from database in class AllergieModel method getAllergieByIdUseSP! '. $ex->getMessage());
            }
        }

    }

?>