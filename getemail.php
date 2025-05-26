<?php
include 'inc/function.php';
htmlHead('IMS', 'getEmail');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $theEmail = $_POST['getEmail'];

    $workerEmail = getworkerEmail($theEmail);
    $companyEmail = getcompanyEmail($theEmail);
    if (!$workerEmail && !$companyEmail) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('failureMsg').style.display = 'block';
        }); </script>";
    }else {
        header("Location: resetpassword.php");
        exit();
    }
}
?>
<body id="loginBODY">
<div class="container">

    <div class="failureMsg" id="failureMsg">
    <i class='bx bx-x'></i>
    <span class="theMsg">Unknown Email</span>
    </div>
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>
    </div>
    <div class="loginBody">
        <h3>Enter your E-mail</h3>
        <form action="getemail.php" method="POST">
            <div class="inputField" id="inputfieldLog">
                <input type="text" class="inputEmail" name="getEmail" placeholder="E-mail"  >
                <i class="bx bx-envelope"></i>
            </div>

            <div class="inputField">
                <input type="submit" class="submit" value="Login">
            </div>
        </form>

    </div>
</div>
<?php
htmlFoot();
?>