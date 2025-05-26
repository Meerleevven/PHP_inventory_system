<?php
session_start();
include 'inc/function.php';
htmlHead('IMS', 'Login');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!logincompany()) {
        loginEmployee();
    }
}



if (isset($_SESSION['companyName']) || isset($_SESSION['workerName'])) {	
    header("Location: dashboard.php");
    exit();
}


$disp_email = !empty($_COOKIE['companyName']) ? $_COOKIE['companyName'] : '';
$checked = isset($_COOKIE['cookies_remember']) ? "checked" : '';  
?>
<body id="loginBODY">
<div class="container">
<div class="foutMessage" id="foutMessage" style="display: none;">
    <p id="errorWachtwoord"> fout Wachtwoord</p>
    <p id="errorUser"> fout Gebruikersnaam/E-mail</p>
</div>
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>

    </div>
    <div class="loginBody">
        <h3>Login</h3>
        <form action="login.php" method="POST">
            <div class="inputField" id="inputfieldLog">
                <input type="text" class="input" name="username" placeholder="Username or Email" required value="<?php echo htmlspecialchars($disp_email, ENT_QUOTES, 'UTF-8'); ?>">
                <i class="bx bx-user"></i>
                </div>
            <div class="inputField">
                <input type="password" class="input" name="password" placeholder="password" required>
                <i class="bx bx-lock"></i>
                    <div class="forget">
                        <label>
                    <?php $Url = pagernavigation(6); ?>
                    <a href="<?= $Url ?>">Forget password</a>
                        </label>
                    </div>
            </div>
            <div class="remember">
                <div class="left">
                    <input type="checkbox" name="remember" id="remember" <?php echo $checked; ?>>	
                    <label for="check">Remember Me</label>
                </div>
            </div>
            <div class="inputField">
                <input type="submit" class="submit" value="Login">
            </div>

            <div class="register">
            <label>
                <?php $Url = pagernavigation(4); ?>
                <a href="<?= $Url ?>">Register new account</a>
            </label>
            </div>
        </form>

    </div>
</div>
<?php
htmlFoot();
?>