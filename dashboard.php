<?php
include 'inc/function.php';
htmlHead('IMS', 'Dashboard');

session_start();
$useraccname = showTheLogin();

if (!isset($_SESSION['companyName'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['companyName'];
?>
<body>
    <div id="dbMainContainer">
        <div class="dbSidebar">
            <h3 class="dbsidebar-Logo" id="dbsidebar_Logo">Inventory Management System</h3>
            <div class="sidebarUser">
                <img src="" alt="user image" id="dbsidebar_userImage">
                <span id="username"><?= htmlspecialchars($useraccname) ?></span>
            </div>
            <div class="dbsidebar-Menus">
                <div class="dbsidebar-menuList" id="dbsidebar_menuList">
                    <li class="menuActive"><a href="#"><i class="fa-solid fa-house menuIcons"></i><span class="menuText"> Dashboard</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-user menuIcons"></i><span class="menuText"> User</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-warehouse menuIcons"></i><span class="menuText"> Storage</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-chart-simple menuIcons"></i><span class="menuText"> Perfomance</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-cart-shopping menuIcons"></i><span class="menuText"> Purchase</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-database menuIcons"></i><span class="menuText"> Database</span></a></li>
                </div>
            </div>
        </div>
        <div class="dbcontent-Container" id="dbcontent_Container">
            <div class="dbtopNav">
                <a href="#" id="toggleBtn"><i class="fa fa-navicon"></i></a>
                <a href="logout.php" id="logoutBtn"><i class="fa fa-power-off"></i>Log-out</a>
            </div>
            <div class="dbContent">
                <div class="dbcontent-Min">

                </div>
            </div>
        </div>
    </div>
<?php
htmlFoot();
?>   