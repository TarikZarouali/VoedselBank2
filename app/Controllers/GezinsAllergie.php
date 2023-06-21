<?php

class GezinsAllergie extends BaseController
{
    private int $delay = 2;
    private string $infoMessage = '';
    private mixed $gezinsAllergieModel;

    public function __construct()
    {
        $this->gezinsAllergieModel = $this->model('GezinsAllergieModel');
    }

    public function index()
    {
         echo "ik ben bij index";
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $allergyName = $_GET['allergy'] ?? null;
            $allergieData = ($allergyName !== null && $allergyName !== 'all') ?
                $this->gezinsAllergieModel->getOverzichtAllergieByFilter($allergyName) :
                $this->gezinsAllergieModel->getAllergieOverzicht();

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
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data2['detail'] = $this->gezinsAllergieModel->getDetailsById($id);
        $data['Allergie'] = $this->gezinsAllergieModel->getGezinById($id);

        $this->view('GezinsAllergie/details', $data, $data2);
    }
}


    public function update($id)
    {
        echo "ik ben bij update";
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data['Allergie'] = $this->gezinsAllergieModel->getGezinById($id);

            $this->view('GezinsAllergie/wijzigen', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);

            $data = $_POST;
            $isViewValid = $data;

            if ($isViewValid && $this->gezinsAllergieModel->updateAllergie($data)) {
                $this->infoMessage = "Selected Allergie has been modified";
                header("refresh:$this->delay; url=" . URLROOT . '/GezinsAllergie/wijzigen' . $this->infoMessage);
                $this->view('GezinsAllergie/wijzigen', $data);
            }
        }
    }
}