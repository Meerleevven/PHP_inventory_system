<?php
include 'inc/function.php';
htmlHead('IMS', 'Homepagina ');
?>
<body>
    <div class="header"></div>
    <div class="banner">
        <div class="homepageContainer">
            <div class="bannerHeader">
            <h1 id="txt1" class="txtGreen">The</h1>
            <h1 id="txt2">Inventory</h1>
            <h1 id="txt3" class="txtGreen">Management</h1>
            <h1 id="txt4">System</h1>
            </div>
            <p class="bannerText">
                Boost efficiency and cut costs with our inventory system—track stock, manage locations,
                <br>
                and stay in control effortlessly!
            </p>
            <div class="bannerIcons">
                <a href=""><i class='bx bxl-windows'></i></a>
                <a href=""><i class='bx bxl-apple'></i></a>
                <a href=""><i class='bx bxl-android'></i></a>
            </div>
        </div>
    </div>
<?php
htmlFoot();
?>