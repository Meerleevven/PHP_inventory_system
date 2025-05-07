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

                    <form action="" class="addEmployee" method="POST">
                        <div>
                            <label for="">employee name</label>
                            <input type="text" class="appformInput" id="workerName" name="workerName"/>
                        </div>
                        <div>
                            <label for="">E-mail</label>
                            <input type="text" class="appformInput" id="workerEmail" name="workerEmail"/>
                        </div>
                        <div>
                            <label for="">password</label>
                            <input type="text" class="appformInput" id="workerpassword" name="workerEmail"/>
                        </div>
                        <button type="submit">add employee<i class="bx bx-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
htmlFoot();
?>   