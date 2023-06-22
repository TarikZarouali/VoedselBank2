<?php

class Leverancier extends BaseController
{
    private readonly mixed $LeverancierModel;
    private string $infoMessage = '';
    private int $delay = 2;

    public function __construct()
    {
        $this->LeverancierModel = $this->model('LeverancierModel');
    }

    private function redirect($page)
    {
        header("Location: " . URLROOT . "/" . $page);
        exit;
    }

    public static function GetInfoMessage(string $message, string $type): string
    {
        $cssInfoMessage  = ' <link rel="stylesheet" href="' . URLROOT . '/public/css/style.css">';
        $cssInfoMessage .= '<div class="alert ' . $type . '">';
        $cssInfoMessage .= $message;
        $cssInfoMessage .= '</div>';

        return print($cssInfoMessage);
    }

    public function index()
    {
        // Fetch all dashboards from dashboard model.
        $dashboards = $this->LeverancierModel->GetLeverancier();

        // Assign the result data from model to local variable.
        $data = ['dashboards' => $dashboards];

        $this->view('Leverancier/index', $data);
    }

    public function details(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Fetch the Leverancier details by ID from LeverancierModel
            $dashboardproduct = $this->LeverancierModel->GetLeverancierById($id);
            $data = ['dashboardproduct' => $dashboardproduct];

            // Send the data to the view Leverancier/details.
            $this->view('Leverancier/details', $data);
        }
    }

    public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Get the selected Sollicitatie row from database by Id.
            $modifiedUserId = $this->LeverancierModel->GetLeverancierById($id);

            // Map the selected Sollicitatie row to object.
            $data = $modifiedUserId;

            // Send the modified Sollicitatie object to view Sollicitatie/update.
            $this->view('Leverancier/update', $data);
        } else //elseif($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST);

            // Get the input values of the Sollicitatie modified fields from the update view.
            $data = $_POST;

            // Validate all the input fields of update method.
            $isViewValid = true;

            // Check whether the update view is valid.
            // updateSollicitatieUseSP($data)
            if ($isViewValid) {
                // Check if the 'Houdbaarheidsdatum' exists and is valid
                if (isset($data['Houdbaarheidsdatum']) && $this->validateDate($data['Houdbaarheidsdatum'])) {
                    // Get the current date
                    $currentDate = new DateTime();
                    $maxVerlenging = 7;

                    // Set the maximum allowed date (current date + 7 days)
                    $maxAllowedDate = $this->getMaxHoudbaarheidsdatum();

                    // Check if the new date exceeds the maximum allowed date
                    if ($data['Houdbaarheidsdatum'] > $maxAllowedDate) {
                        $this->infoMessage = FormatTextHelper::GetErrorMessage("Wijziging niet doorgevoerd. De houdbaarsdatum mag maximaal 7 dagen in de toekomst liggen.", EnumTypeMessage::Error);
                        $data['Houdbaarheidsdatum'] = ''; // Clear the date field

                        // Send the error message and data back to the update view
                        $this->view('Leverancier/update', $data);
                        exit; // Stop further execution of the code.
                    }

                    // Set the maximum number of days to extend the houdbaarheidsdatum
                    $currentDate->add(new DateInterval("P{$maxVerlenging}D"));

                    // Get the extended houdbaarheidsdatum
                    $extendedDate = $currentDate->format('Y-m-d');

                    // Update the 'Houdbaarheidsdatum' in the $data array
                    $data['Houdbaarheidsdatum'] = $extendedDate;

                    if ($this->LeverancierModel->UpdateProductdatum($data)) {
                        $this->infoMessage = FormatTextHelper::GetInfoMessage("De houdbaarheidsdatum is gewijzigd", EnumTypeMessage::Success);

                        // Redirect to the index Sollicitatie view. 
                        header("refresh:$this->delay; url=" . URLROOT . '/Leverancier/update' . $this->infoMessage);
                    } else {
                        // Redirect to the update Sollicitatie view. 
                        header("refresh:$this->delay; url=" . URLROOT . '/Leveranciertact/update');

                        // Stay in the update Sollicitatie view.
                        $this->view('Leverancier/update', $data);
                    }
                }
            }
        }
    }

    private function validateDate($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    private function getMaxHoudbaarheidsdatum()
    {
        $currentDate = new DateTime();
        $currentDate->add(new DateInterval('P7D')); // Voeg 7 dagen toe aan de huidige datum
        return $currentDate->format('Y-m-d');
    }

    
}
