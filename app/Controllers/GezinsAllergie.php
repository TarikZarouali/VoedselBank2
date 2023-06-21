<?php

    Class GezinsAllergie extends BaseController
    {

        private int $delay = 2;
        private string $infoMessage = '';

        private readonly mixed $GezinsAllergieModel;

        public function __construct() 
        {
            $this->GezinsAllergieModel = $this->model('GezinsAllergieModel');
        }
        
       public function index()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $allergyName = $_GET['allergy'] ?? null;
        $allergieData = ($allergyName !== null && $allergyName !== 'all') ?
            $this->GezinsAllergieModel->getoverzichtallergiebyfilter($allergyName) :
            $this->GezinsAllergieModel->getAllergieOverzicht();

        $hasMatchingPeople = count($allergieData) > 0;
        $data = [
            'Allergie' => $allergieData,
            'HasMatchingPeople' => $hasMatchingPeople
        ];
        $this->view('GezinsAllergie/index', $data);
    }
}

public function details($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Fetch selected Gezin by Id from Gezin model.
        $data2['detail'] = $this->GezinsAllergieModel->getgezinbyid2($id);
        $data['Allergie'] = $this->GezinsAllergieModel->getgezinbyid($id);
        // Send the selected Gezin to view Gezin/details.
        $this->view('GezinsAllergie/details', $data);
    }
}



public function update()
{
    
     $this->view('GezinsAllergie/wijzigen');
}

    }
?>