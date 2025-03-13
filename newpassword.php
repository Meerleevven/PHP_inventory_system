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
        <h3>Login</h3>
        <form action="">
            <div class="inputField">
                <input type="text" class="input" placeholder="Username" required>
                <i class="bx bx-user"></i>
                    <div class="forget">
                        <label>
                    <a href="#">Forget username</a>
                        </label>
                    </div>
                </div>
            <div class="inputField">
                <input type="password" class="input" placeholder="password" required>
                <i class="bx bx-lock"></i>
                    <div class="forget">
                        <label>
                    <a href="#">Forget password</a>
                        </label>
                    </div>
            </div>
            <div class="remember">
                <div class="left">
                    <input type="checkbox" id="remember">	
                    <label for="check">Remember Me</label>
                </div>
            </div>
            <div class="inputField">
                <input type="submit" class="submit" value="Login">
            </div>

            <div class="register">
            <label>
                <a href="#">Register new account</a>
            </label>
            </divr>
        </form>

    </div>
</div>
<?php
htmlFoot();
?>