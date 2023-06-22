<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

    <!-- Check if there is a message and display it -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Details van Leverancier</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ProductNaam</th>
                        <th>Allergie</th>
                        <th>Barcode</th>
                        <th>Houdbaarheidsdatum</th>
                        <th>wijzig Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item) : ?>
                        <tr>
                            <td><?= $item->ProductNaam ?></td>
                            <td><?= $item->Allergie ?></td>
                            <td><?= $item->Barcode ?></td>
                            <td><?= $item->Houdbaarheidsdatum ?></td>
                            <td class="float">
                            <a class="btn btn-info" href="<?php URLROOT; ?>/Leverancier/update/<?= $item->Id ?>"><i class="fab fa-readme" title="details Leverancier"></i></a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    


                </tbody>
            </table>
            <div class="form-group row float-lg-right">
                <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Leverancier/index">Back</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>