<?php
include 'inc/function.php';
htmlHead('IMS', 'Register');
?>
<body id="loginBODY">
<div class="container">
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>

    </div>
    <div class="loginBody">
        <h3>Register</h3>
        <form action="">
            <div class="inputField">
                <input type="text" class="input" placeholder="Username" required>
                <i class="bx bx-user"></i>
            </div>

            <div class="inputField">
                <input type="text" class="inputEmail" placeholder="E-mail" required>
                <i class="bx bx-envelope"></i>
                <div class="regexCheck"></div>
            </div>

            <div class="inputField">
                <input onkeyup="trigger()" type="password" class="inputPas" placeholder="New password" required>
                <i class="bx bx-lock"></i>
                <span class="showBtn" id="showBTN">SHOW</span>
                <div class="indicator">
                    <span class="weak"></span>
                    <span class="meduim"></span>
                    <span class="strong"></span>
                </div>
                <div class="txtStrength"></div>
            </div>

            <div class="inputField">
                <input type="password" class="inputPas2" placeholder="confim password" required>
                <i class="bx bx-lock"></i>
                <div class="matchedPass"></div>
            </div>

            <div class="payment-plan">
                <label>Payment Plan:</label>
                    <select id="payment_plan">
                        <optgroup label="Payment Plan">
                        <option value="free">Free</option>
                        <option value="basic">Pro</option>
                        <option value="premium">Enterprise</option>
                        </optgroup>
                    </select> 
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