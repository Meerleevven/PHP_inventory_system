<?php
include 'inc/function.php';
htmlHead('IMS', 'Send Email');
?>
<body id="loginBODY">
<div class="container">
    <div class="loginHeader">
        <h1>Inventory Management Systems</h1>

    </div>
    <div class="loginBody">
        <h3>Send Username to your Email</h3>
        <form action="">
            <div class="inputField" id="inputField">
                <input type="text" class="input" placeholder="E-mail" required>
                <i class="bx bx-envelope"></i>
            </div>

            <div class="inputField">
                <input type="submit" class="submit" value="Send">
            </div>

        </form>

    </div>
</div>
<?php
htmlFoot();
?>