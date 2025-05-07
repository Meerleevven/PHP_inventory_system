<?php
include 'inc/function.php';
htmlHead('IMS', 'Dashboard');

session_start();
$useraccname = showTheLogin();
$userphoto = $_SESSION['companyPhoto'] ?? 'default.png';
if (!isset($_SESSION['companyName'])) {
    header("Location: login.php");
    exit();
}

?>
<body>
    <div id="dbMainContainer">
        <?php include ('partials/dbsidebar.php') ?>
        <div class="dbcontent-Container" id="dbcontent_Container">
        <?php include ('partials/dbtopnav.php') ?>
            <div class="dbContent">
                <div class="dbcontent-Min">
                
                </div>
            </div>
        </div>
    </div>
<?php
htmlFoot();
?>   