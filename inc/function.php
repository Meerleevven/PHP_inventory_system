<?php

function htmlHead($name, $currentPage){
    ?>
    <!doctype html>
    <html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS - <?=$currentPage?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/6ef0b15b08.js"></script>

</head>
    
<?php
}



function htmlFoot(){

    ?>
    </body>
    </html>
    <?php
    }
    ?>
