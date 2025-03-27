<?php
include 'inc/function.php';
htmlHead('IMS', 'Login');
?>
<body id="loginBODY">
<div class="container">
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>

    </div>
    <div class="loginBody">
        <h3>Reset password</h3>
        <form action="">
            <div class="inputField">
                <input onkeyup="trigger()" type="password" class="inputPas" placeholder="New password" required>
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
                <input type="password" class="inputPas2" placeholder="confirm password" required>
                <i class="bx bx-lock"></i>
                <div class="matchedPass"></div>
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