<?php
    define("PATH","http://localhost/LibraryManagementSystem/");
?>

<meta charset="UTF-8">
<title>LibraryManagementSystem</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<!-- bootstrap files -->
<link rel="stylesheet" href="<?= PATH ?>bootstrap/bootstrap.min.css">
<script src="<?= PATH ?>bootstrap/bootstrap.min.js"></script>
<script src="<?= PATH ?>bootstrap/jquery.min.js"></script>
<script src="<?= PATH ?>bootstrap/popper.min.js"></script>

<!-- // css files -->
<link rel="stylesheet" href="<?= PATH ?>css/app.css">
<Link rel="icon"  href="favIcon.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">

<!-- // js files -->
<script src="<?=PATH ?>js/app.js"></script>

<?php
      
    $lang="en";
    if(isset($_GET["lang"])){
        $lang=$_GET["lang"];
    }

    $L=parse_ini_file(PATH."languages/$lang.ini")//en.ini ok
?>