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
                error_log("ERROR : Failed to get all Sollicitaties from database in class SollicitatieModel method getSollicitatiesUseSp!", 0);
                die('ERROR : Failed to get all Sollicitaties from database in class SollicitatieModel method getSollicitatiesUseSp! '. $ex->getMessage());
            }
            
        }

    }

?>