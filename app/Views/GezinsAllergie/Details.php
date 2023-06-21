<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
.table-container {
    width: 80%;
    margin: 0 auto;
}

table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ccc;
}

th {
    font-weight: bold;
    border-right: 1px solid #ccc;
}

th:last-child {
    border-right: none;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
}

td:last-child {
    border-right: none;
}

tr:hover {
    background-color: #f5f5f5;
}

.button-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.button-container button {
    padding: 8px 16px;
    border: none;
    color: #fff;
    cursor: pointer;
}

.blue-button {
    background-color: blue;
}

.grey-button {
    background-color: grey;
}
</style>

<h1 style="color: green;">Allergieën in het gezin</h1>

<div class="table-container">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Naam</th>
                <th>TypePersoon</th>
                <th>Gezinsrol</th>
                <th>Allergie</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Assuming $data['Allergie'] is the array containing Allergie data
            if (isset($data['Allergie']) && is_array($data['Allergie'])) {
                foreach ($data['Allergie'] as $Allergie) {
                    $AllergieId = isset($Allergie->Id) ? $Allergie->Id : '';
                    $Naam = isset($Allergie->Naam) ? $Allergie->Naam : '';
                    $TypePersoon = isset($Allergie->TypePersoon) ? $Allergie->TypePersoon : '';
                    $IsVertegenwoordiger = isset($row['IsVertegenwoordiger']) && $row['IsVertegenwoordiger'] == 1;
                    $Gezinsrol = $IsVertegenwoordiger ? 'vertegenwoordiger' : 'gezinslid';
                    $AllergieNaam = isset($Allergie->Allergie) ? $Allergie->Allergie : '';
            ?>
            <tr>
                <input type="hidden" id="id" value="<?= $AllergieId ?>">
                <td><?= $Naam ?></td>
                <td><?= $TypePersoon ?></td>
                <td class="float-right">
                    <span><?= $Gezinsrol ?></span>
                </td>
                <td><?= $AllergieNaam ?></td>
                <td>
                    <a class="btn btn-info" href="<?php echo URLROOT; ?>/GezinsAllergie/wijzigen/<?= $AllergieId ?>">
                        <i class="fas fa-info-circle" title="Wijzigen Allergie"></i>
                    </a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="4">Geen allergieën gevonden</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>