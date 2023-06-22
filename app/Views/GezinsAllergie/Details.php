<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<!-- Check if there is a message and display it -->

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Details van Leverancier</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>TypePersoon</th>
                        <th>Gezinsrol</th>
                        <th>Allergie</th>
                        <th>wijzig Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->Naam ?></td>
                        <td><?= $item->TypePersoon ?></td>
                        <td><?= $item->Gezinsrol ?></td>
                        <td><?= $item->Allergie ?></td>
                        <td class="float">
                            <a class="btn btn-info" href="<?php URLROOT; ?>/GezinsAllergie/update/<?= $item->id ?>"><i
                                    class="fab fa-readme" title="details GezinsAllergie"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>



                </tbody>
            </table>
            <div class="form-group row float-lg-right">
                <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/GezinsAllergie/index">Back</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>