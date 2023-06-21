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
                <th>Type Persoon</th>
                <th>Gezinsrol</th>
                <th>Allergie</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Assuming $data['Allergie'] is the array containing Allergie data
            if (isset($data['Allergie']) && is_array($data['Allergie'])) {
                foreach ($data['Allergie'] as $allergie) {
                    $id = isset($allergie->Id) ? $allergie->Id : '';
                    $naam = isset($allergie->Naam) ? $allergie->Naam : '';
                    $typePersoon = isset($allergie->TypePersoon) ? $allergie->TypePersoon : '';
                    $isVertegenwoordiger = isset($allergie->IsVertegenwoordiger) && $allergie->IsVertegenwoordiger == 1;
                    $gezinsrol = $isVertegenwoordiger ? 'vertegenwoordiger' : 'gezinslid';
                    $allergieNaam = isset($allergie->Allergie) ? $allergie->Allergie : '';
            ?>
            <tr>
                <td><?= $naam ?></td>
                <td><?= $typePersoon ?></td>
                <td class="float-right">
                    <span><?= $gezinsrol ?></span>
                </td>
                <td><?= $allergieNaam ?></td>
                <td>
                    <a class="btn btn-info" href="<?= URLROOT ?>/GezinsAllergie/wijzigen/<?= $id ?>">
                        <i class="fas fa-pencil-alt" title="Wijzigen Allergie"></i>
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