<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    .no-people-message {
        background-color: red;
        padding: 10px;
        color: white;
        text-align: center;
    }
    </style>
    <title>GezinsAllergie</title>
    <script>
    setTimeout(function() {
        window.location.href = "<?php echo URLROOT; ?>/GezinsAllergie/index?allergy=all";
    }, 3000);
    </script>
</head>

<body>
    <h1 style="color: green;">Overzicht gezinnen met allergieën</h1>

    <form action="<?php echo URLROOT; ?>/GezinsAllergie/index" method="GET">
        <label for="allergy">Select Allergy:</label>
        <select name="allergy" id="allergy">
            <option value="Gluten">Gluten</option>
            <option value="Peanut">Peanut</option>
            <option value="Schaaldieren">Schaaldieren</option>
            <option value="Hazelnoten">Hazelnoten</option>
            <option value="Lactose">Lactose</option>
            <option value="Soja">Soja</option>
            <option value="all">Show All</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <div class="table-container">
        <?php if ($data['HasMatchingPeople']) { ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                    <th>Volwassenen</th>
                    <th>Kinderen</th>
                    <th>Babys</th>
                    <th>Vertegenwoordiger</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['Allergie'] as $Allergie) { ?>
                <tr>
                    <input type="hidden" id="id" value="<?= $Allergie->Id ?>">
                    <td><?= $Allergie->Naam ?></td>
                    <td><?= $Allergie->Omschrijving ?></td>
                    <td><?= $Allergie->AantalVolwassenen ?></td>
                    <td><?= $Allergie->AantalKinderen ?></td>
                    <td><?= $Allergie->AantalBabys ?></td>
                    <td><?= $Allergie->IsVertegenwoordiger ?></td>
                    <td>
                        <a class="btn btn-info" href="<?php URLROOT; ?>/GezinsAllergie/details/<?= $Allergie->Id ?>">
                            <i class="fas fa-info-circle" title="Details Allergie"></i>
                        </a>
                    </td>
                    <td class="float-right">
                        <!-- Add other actions here if needed -->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="no-people-message">Er zijn geen personen met deze allergie.</div>
        <?php } ?>
    </div>
</body>

</html>