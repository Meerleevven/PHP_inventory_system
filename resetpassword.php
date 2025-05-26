<?php
include 'inc/function.php';
htmlHead('IMS', 'Reset Password');
session_start();
if (!isset($_SESSION['companyId']) && !isset($_SESSION  ['workerId'])) {
    if (!isset($_SESSION['companyEmail']) && !isset($_SESSION['workerEmail'])) {
        header("Location: login.php");
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!updatecompanypassword()){
    updateworkerpassword(); 
    }
}
var_dump($_SESSION);
$useraccname = showTheLogin();
?>
<body id="loginBODY">
<div class="container">
  
    <div class="successMsg" id="successMsg">
    <i class='bx bx-check'></i>
    <span class="theMsg">New password confirmed!</span>
    </div>
    <div class="failureMsg" id="failureMsg">
    <i class='bx bx-x'></i>
    <span class="theMsg">New Password unconfirmed!</span>
    </div>
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>
    </div>
    <div class="loginBody">
        <h3>Reset password</h3>
        <div class="name"><span><?= htmlspecialchars($useraccname) ?></span></div>
        <form action="resetpassword.php" method="POST">
            <div class="inputField">
                <input onkeyup="trigger()" type="password" class="inputPas" name="newPassword" placeholder="New password" required>
                <i class="bx bx-lock"></i>
                <span class="showBtn">SHOW</span>
                <div class="indicator">
                    <span class="weak"></span>
                    <span class="meduim"></span>
                    <span class="strong"></span>
                </div>
                <div class="txtStrength"></div>
            </div>

            <div class="inputField">
                <input type="password" class="inputPas2" name="confirmnewpass" placeholder="confirm password" required>
                <i class="bx bx-lock"></i>
                <div class="matchedPass" id="matchedPass">
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