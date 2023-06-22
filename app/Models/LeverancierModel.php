<?php
class LeverancierModel
{
    private Database $Db;


    public function __construct(Database $db = new Database)
    {
        $this->Db = $db;
    }


    public function GetLeverancier(): array
    {
        try
        {
            // Use sql script to fetch all Magazijn from Magazijn database.
            $getAllMagazijnenQuery = "CALL spGetKlantLeverancier()";

            $this->Db->query($getAllMagazijnenQuery);

            $result = $this->Db->resultSet();

            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to get all Magazijn from database in class MagazijnModel method getMagazijnsUseSp!", 0);
            die('ERROR : Failed to get all Magazijn from database in class MagazijnModel method getMagazijncitatiesUseSp! ' . $ex->getMessage());
        }
    }

    public function GetLeverancierById(int $id)
    {
        try {

            // Call the stored procedure from the database.
            $getSelectedApplicant = "CALL spGetKlantLeverancierById(:prm_klantId)";

            $this->Db->query($getSelectedApplicant);
            $this->Db->bind(':prm_klantId', $id);
            $result = $this->Db->single();

            $ContactenById = ($result);

            return $ContactenById ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById!", 0);
            die('ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById! ' . $ex->getMessage());
        }
    }


    
    public function GetProductById(int $id)
    {
        try {

            // Call the stored procedure from the database.
            $getSelectedApplicant = "CALL spGetKlantLeverancierById(:prm_klantId)";

            $this->Db->query($getSelectedApplicant);
            $this->Db->bind(':prm_klantId', $id);
            $result = $this->Db->single();

            $ContactenById = ($result);

            return $ContactenById;
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById!", 0);
            die('ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById! ' . $ex->getMessage());
        }
    }


    public function UpdateProductdatum($selectedUser): bool
    {
        try
        {
            
                // Call the stored procedure from the database.
                $spQuery = "CALL spUpdateProduct(  
                                                :id,
                                                :Houdbaarheidsdatum)";
                $this->Db->query($spQuery);

                // Bind values
                $this->Db->bind(':id', $selectedUser['Id']);
                $this->Db->bind(':Houdbaarheidsdatum', $selectedUser['Houdbaarheidsdatum']);

                // Execute the query
                if ($this->Db->execute())
                {
                    error_log("INFO: Selected Sollicitatie has been modified in the AdminModel class method UpdateUserDetails!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR: Selected Sollicitatie has not been modified in the AdminModel class method UpdateUserDetails!", 0);
                    return false;
                }
        }
        catch (PDOException $ex)
        {
            error_log("ERROR: Failed to update the selected Sollicitatie by ID from the database in the AdminModel class method UpdateUserDetails!", 0);
            die('ERROR: Failed to update the selected Sollicitatie from the database in the AdminModel class method UpdateUserDetails! ' . $ex->getMessage());
        }
    }


}