<?php
include 'inc/function.php';
htmlHead('IMS', 'Dashboard');
?>
<body id="dashboard">
    <div id="dbMainContainer">
        <div class="dbSidebar">
            <h3 class="dbsidebar-Logo">Inventory Management System</h3>
            <div class="sidebarUser">
                <img src="" alt="user image">
                <span>username met php</span>
            </div>
            <div class="dbsidebar-Menus">
                <div class="dbsidebar-menuList">
                    <li><a href="#"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fa-solid fa-user"></i> User</a></li>
                    <li><a href="#"><i class="fa-solid fa-warehouse"></i> Storage</a></li>
                    <li><a href="#"><i class="fa-solid fa-chart-simple"></i> Perfomance</a></li>
                    <li><a href="#"><i class="fa-solid fa-cart-shopping"></i> Purchase</a></li>
                    <li><a href="#"><i class="fa-solid fa-database"></i> Database</a></li>
                </div>
            </div>
        </div>
        <div class="dbcontent-Container">
            <div class="dbTopNav">
                <a href="#"><i class="fa fa-navicon"></i></a>
                <a href="#"><i class="fa fa-power-off"></i>Log-out</a>
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