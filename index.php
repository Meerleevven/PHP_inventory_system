<?php
include 'inc/function.php';
htmlHead('IMS', 'Homepagina ');
?>
<body>
    <div class="header"></div>
    <div class="banner">
    <div class="loginBtn"><a href="">log in</a></div>
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
            <div class="bannerContainer">
        <div class="bannerIcons">
            <a href="#"><i class='bx bxl-windows'></i></a>
            <a href="#"><i class='bx bxl-apple'></i></a>
            <a href="#"><i class='bx bxl-android'></i></a>
        </div>
            <div class="btnTogo"><a href="#">Get Started</a></div>
        </div>
        </div>
    </div>
    <div class="homepageContainer" id="container">
        <div class="homepageFeatures">
            <div class="homepageFeature">
                <span><i class='bx bxs-cog bx-rotate-90'></i></span>
                <h3>Easy To Use</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
            </div>
            <div class="homepageFeature">
                <span><i class='bx bxs-star'></i></span>
                <h3>Flat Design</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
            </div>
            <div class="homepageFeature">
                <span><i class='bx bx-world'></i></span>
                <h3>Reach Your Audience</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
            </div>
        </div>
    </div>
    <div class="footer">
     <div class="homepageContainer" id="foot">
        <div class="footerContent">
            <h3>Stay In Contact</h3>
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
        </div>
        <div class="footGoto">
            <a href="#">Contact</a>
            <a href="#">Download</a>
            <a href="#">Support</a>
            <a href="#">Faq</a>
            <a href="#">Github</a>
     </div>
     </div>  
    </div>
<?php
htmlFoot();
?>