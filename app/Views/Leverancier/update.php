<?php require_once APPROOT . '/Views/Includes/header.php'; ?>

<?php
function getMaxHoudbaarheidsdatum() {
    $currentDate = new DateTime();
    $currentDate->add(new DateInterval('P7D')); // Voeg 7 dagen toe aan de huidige datum
    return $currentDate->format('Y-m-d');
}
?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Wijzig Product</h2>
            <form id="UpdateUser" method="POST" action="<?= URLROOT; ?>Leverancier/update/<?= $data->Id ?>"
                autocomplete="on" onsubmit="validateForm(event)">
                <input type="hidden" name="Id" value="<?= $data->Id ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Houdbaarheidsdatum *</label>
                    <input type="date" class="input-field-error-message" name="Houdbaarheidsdatum" required="true"
                        maxlength="255" value="<?= $data->Houdbaarheidsdatum ?>" max="<?= getMaxHoudbaarheidsdatum() ?>">
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>Leverancier/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>

<script>
    function validateForm(event) {
        const houdbaarheidsdatumInput = document.querySelector('input[name="Houdbaarheidsdatum"]');
        const maxVerlenging = 7; // Maximum 7 dagen verlenging

        // Check if the input value is a valid date
        if (houdbaarheidsdatumInput.value && !isNaN(Date.parse(houdbaarheidsdatumInput.value))) {
            const currentDate = new Date();
            const selectedDate = new Date(houdbaarheidsdatumInput.value);

            // Calculate the difference in days
            const differenceInDays = Math.floor((selectedDate - currentDate) / (1000 * 60 * 60 * 24));

            // If the difference is greater than the maximum extension, adjust the selected date
            if (differenceInDays > maxVerlenging) {
                selectedDate.setDate(currentDate.getDate() + maxVerlenging);
                houdbaarheidsdatumInput.value = selectedDate.toISOString().split('T')[0];
            }
        }
    }
</script>
