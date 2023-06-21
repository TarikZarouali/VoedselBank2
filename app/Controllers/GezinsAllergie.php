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
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $Allergie = $this->GezinsAllergieModel->getAllergieOverzicht();

                $data = ['Allergie' => $Allergie];
                // Send the data to view Sollicitatie/index.
                $this->view('GezinsAllergie/index', $data);
            }
		}
    }

?>