<html>
    <head>
        <meta charset="UTF-8">
        <meta htttp-equiv="Cache-control" content="no-cache">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo SITENAME; ?></title>

        <link rel="stylesheet" href="<?= URLROOT ?>/public/css/style.css">
        <link rel="stylesheet" href="<?= URLROOT ?>/public/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?= URLROOT ?>/public/css/iconawesome/css/all.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script type="text/javascript" src="<?= URLROOT ?>/public/js/deleteCompany.js"></script>
        <script type="text/javascript" src="<?= URLROOT ?>/public/js/ajaxNotify.js"></script>
    </head>
    <body>
        <div class="navbar">
            <?php
                require_once APPROOT . '/Views/Includes/navigation.php';
            ?>
        </div>
    </body>



