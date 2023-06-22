<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<section>
    <h1 class="Leverancier1">Overzicht Leverancier</h1>

    <!-- Add the dropdown menu -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            LeverancierType
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Add dropdown options here -->
            <a class="dropdown-item show-all" href="#">Show All</a>
            <?php foreach ($data['dashboards'] as $dashboard) { ?>
                <a class="dropdown-item" href="#" data-leverancier="<?= $dashboard->LeverancierType ?>"><?= $dashboard->LeverancierType ?></a>
            <?php } ?>
            <a class="dropdown-item" href="#" data-leverancier="Geen Leverancier1">Donner</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Naam</th>
                <th>ContactPersoon</th>
                <th>Email</th>
                <th>Mobiel</th>
                <th>LeverancierNummer</th>
                <th>LeverancierType</th>
                <th>Product Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['dashboards'] as $dashboard) { ?>
                <tr>
                    <input type="hidden" id="id" value="<?= $dashboard->Id ?>">
                    <td><?= $dashboard->Naam ?></td>
                    <td><?= $dashboard->ContactPersoon ?></td>
                    <td><?= $dashboard->Email ?></td>
                    <td><?= $dashboard->Mobiel ?></td>
                    <td><?= $dashboard->LeverancierNummer ?></td>
                    <td><?= $dashboard->LeverancierType ?></td>
                    <td class="float">
                        <a class="btn btn-info" href="<?= URLROOT ?>/Leverancier/details/<?= $dashboard->Id ?>">
                            <i class="fab fa-readme" title="details Leverancier"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

     <!-- Message for no Leverancier1 -->
     <p id="no-leverancier1-message" style="display: none;">Geen bedrijven hebben Leverancier.</p>

<!-- Message for no Leverancier -->
<p id="no-leverancier-message" style="display: none;">Geen bedrijven hebben Leverancier.</p>

    <button class="btn">
        <a href="<?= URLROOT ?>index">Home</a>
    </button>
</section>

<script>
    $(document).ready(function() {
        $('.dropdown-item').click(function(e) {
            e.preventDefault();
            var selectedLeverancier = $(this).data('leverancier');

            // Hide all table rows initially
            $('tbody tr').hide();

            // Show the rows that match the selected leverancier
            if ($(this).hasClass('show-all')) {
                $('tbody tr').show();
            } else if (selectedLeverancier === 'Geen Leverancier1') {
                var found = false;
                $('tbody tr').each(function() {
                    if ($(this).find('td:eq(5)').text() === '') {
                        $(this).show();
                        found = true;
                    }
                });
                if (!found) {
                    $('#no-leverancier1-message').show();
                } else {
                    $('#no-leverancier1-message').hide();
                }
            } else if (selectedLeverancier === 'Geen Leverancier') {
                var found = false;
                $('tbody tr').each(function() {
                    if ($(this).find('td:eq(5)').text() === '') {
                        $(this).show();
                        found = true;
                    }
                });
                if (!found) {
                    $('#no-leverancier-message').show();
                } else {
                    $('#no-leverancier-message').hide();
                }
            } else {
                $('tbody tr').each(function() {
                    if ($(this).find('td:eq(5)').text() === selectedLeverancier) {
                        $(this).show();
                    }
                });
                $('#no-leverancier1-message').hide();
                $('#no-leverancier-message').hide();
            }
        });
    });
</script>




<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
