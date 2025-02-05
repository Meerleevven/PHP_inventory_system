<?php
include 'inc/function.php';
htmlHead('IMS', 'Login');
?>
<div class="container">
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>

    </div>
    <div class="loginBody">
        <h3>Login</h3>
        <form action="">
            <div>
                <input type="text" name="username" id="username" placeholder="Username">
                </div>
                <div>
                <input type="password" name="password" id="password" placeholder="password">
                </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>

    </div>
</div>
<?php
htmlFoot();
?>