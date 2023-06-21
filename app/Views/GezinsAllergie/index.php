<table class="table table-hover">
    <thead>
        <tr>
            <th>Code</th>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>Volwassenen</th>
            <th>Kinderen</th>
            <th>Babys</th>
            <th>vertegenwoordiger</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['Sollicitaties'] as $sollicitatie) {?>
        <tr>
            <input type="hidden" id="id" value="<?= $sollicitatie->Id ?>">
            <td> <?= $sollicitatie->Voornaam . ' ' . $sollicitatie->Achternaam ?> </td>
            <td> <?= $sollicitatie->Bedrijfnaam ?> </td>
            <td> <?= $sollicitatie->Straat . ' ' . $sollicitatie->Huisnummer ?> </td>
            <td> <?= $sollicitatie->Gespreksdatum ?> </td>
            <td> <?= $sollicitatie->Gesprekstijd ?> </td>

            <td class="float-right">
                <a class="btn btn-info" href="<?php URLROOT; ?>/sollicitatie/details/<?= $sollicitatie->Id ?>"><i
                        class="fab fa-readme" title="details sollicitatie"></i></a>
                <a class="btn btn-danger" href="<?php URLROOT; ?>/sollicitatie/delete/<?= $sollicitatie->Id ?>"><i
                        class="fab fa-trash" title="delete sollicitatie"></i></a>
                <!-- <a class="btndelete btn btn-danger" href="javascript:void(0)"><i class="fab fa-trash" title="delete company"></i></a>  -->
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>