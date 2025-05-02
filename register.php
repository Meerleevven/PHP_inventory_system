<?php
include 'inc/function.php';
htmlHead('IMS', 'Register');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    registercompany();
}
?>
<body id="loginBODY">
<div class="container">
    <div class="successMsg" id="successMsg">
        <i class='bx bx-check'></i>
        <span class="theMsg">Registration successful!</span>
    </div>
    <div class="failureMsg" id="failureMsg">
        <i class='bx bx-x'></i>
        <span class="theMsg">Registration failed!</span>

    </div>
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>

    </div>
    <div class="loginBody">
        <h3>Register</h3>
        <form action="register.php" method="POST">
            <div class="inputField">
                <input type="text" class="input" name="regUsername" value="<?php echo isset($_SESSION['form_data']['username']) ? htmlspecialchars($_SESSION['form_data']['username']) : ''; ?> placeholder="Company Name"  >
                <i class="bx bx-user"></i>
                <div id="noName"></div>
                
            </div>

            <div class="inputField">
                <input type="text" class="inputEmail" name="regEmail" value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?> placeholder="E-mail"  >
                <i class="bx bx-envelope"></i>
                <div class="regexCheck" id="regexCheck"></div>
                <span id="emailExist"></span>
            </div>

            <div class="inputField">
                <input onkeyup="trigger()" type="password" class="inputPas" name="regPassword"placeholder="New password"  >
                <i class="bx bx-lock"></i>
                <span class="showBtn" id="showBTN">SHOW</span>
                <div class="indicator">
                    <span class="weak"></span>
                    <span class="meduim"></span>
                    <span class="strong"></span>
                </div>
                <div class="txtStrength" id="txtStrength"></div>
            </div>

            <div class="inputField">
                <input type="password" class="inputPas2" name="regconfirmPas" placeholder="confirm password"  >
                <i class="bx bx-lock"></i>
                <div class="matchedPass" id="matchedPass">
                </div>

            </div>

            <div class="payment-plan">
            <label>Payment Plan:</label>
                <select id="payment_plan" name="payment_plan">
                        <option value="" selected hidden>Select Option</option>
                        <option value="free" >Free</option>
                        <option value="basic">Pro</option>
                        <option value="premium">Enterprise</option>
                    </select> 
                    <div id="noPlan">no Plan selected!</div>
            </div>

            <div class="inputField">
                <input type="submit" class="submit" value="register">
            </div>
        </form>

    </div>
</div>
<?php
htmlFoot();
?>