<?php
if ($userphoto == null || $userphoto == '') {
    $userphoto = 'default.png'; 
}
?>

<div class="dbSidebar">
    <h3 class="dbsidebar-Logo" id="dbsidebar_Logo">Inventory Management System</h3>
    <div class="sidebarUser">
        <img src="img/companyphotos/<?=htmlspecialchars($userphoto)?>" alt="user image" id="dbsidebar_userImage">
        <span id="username"><?= htmlspecialchars($useraccname) ?></span>
    </div>
    <div class="dbsidebar-Menus">
        <div class="dbsidebar-menuList" id="dbsidebar_menuList">
                <?php $Url = pagernavigation(7); ?>
            <li><a href="<?= $Url ?>"><i class="fa-solid fa-house menuIcons"></i><span class="menuText"> Dashboard</span></a></li>
                <?php $Url = pagernavigation(8); ?>
            <li><a href="<?= $Url ?>"><i class="fa-solid fa-user menuIcons"></i><span class="menuText"> User</span></a></li>
                <?php $Url = pagernavigation(9); ?>
            <li><a href="<?= $Url ?>"><i class="fa-solid fa-list"></i><span class="menuText"> Employee</span></a></li>
                <?php $Url = pagernavigation(10); ?>
            <li><a href="<?= $Url ?>"><i class="fa-solid fa-warehouse menuIcons"></i><span class="menuText"> Storage</span></a></li>
            <li><a href="#"><i class="fa-solid fa-chart-simple menuIcons"></i><span class="menuText"> Perfomance</span></a></li>
            <?php $Url = pagernavigation(13); ?>
            <li><a href="<?= $Url ?>"><i class="fa-solid fa-database menuIcons"></i><span class="menuText"> Database</span></a></li>
        </div>
    </div>
</div>
        