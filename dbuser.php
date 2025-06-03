<?php
include 'inc/function.php';
htmlHead('IMS', 'User');

session_start();
$useraccname = showTheLogin();
$userEmail = EmailofTheLogin();
$userphoto = $_SESSION['companyPhoto'] ?? $_SESSION['workerPhoto'] ?? 'default.png';  

if (!isset($_SESSION['companyName']) && !isset($_SESSION['workerName'])) {
    header("Location: login.php");
    exit();
}

?>
<body>
    <div class="successMsg" id="successMsg">
    <i class='bx bx-check'></i>
    <span class="theMsg">Registration successful!</span>
</div>
<div class="failureMsg" id="failureMsg">
    <i class='bx bx-x'></i>
    <span class="theMsg">Registration failed!</span>
</div>
    <div id="dbMainContainer">
        <?php include ('partials/dbsidebar.php') ?>
        <div class="dbcontent-Container" id="dbcontent_Container">
        <?php include ('partials/dbtopnav.php') ?>
            <div class="dbContent">
                <div class="row">
                    <div class="column column-5">
                        <div class="dbcontent-Min">
                            <div class="sectionHeader"><i class="fa-solid fa-gear"></i><h1>account management</h1></div>                
                                <div id="settingsContainer">
                                    <form action="dbuser" class="editUser" method="POST"></form>
                                       <div class="settingsRow">
                                            <div class="userforminputContainer">
                                                <input type="file" name="companyImage" id="enterImage" accept="image/*">
                                                <img src="img/companyphotos/<?=htmlspecialchars($userphoto)?>" alt="user image" id="dbsidebar_userImage">
                                            </div>
                                            <div class="userforminputContainer">
                                                <label>Account name:</label><input type="text" class="usersetInput" id="userInput" name="useremail" value="<?= htmlspecialchars($useraccname) ?>"/> 
                                            </div>
                                            <div class="userforminputContainer">
                                                <label>E mail:</label>
                                                <input type="text" class="usersetInput" id="emailInput" name="useremail" value="<?= htmlspecialchars($userEmail) ?>"/> 
                                            </div>

                                            <div class="userforminputContainer">
                                                <label>password:</label>
                                                <?php $Url = pagernavigation(5); ?>
                                                <label id="userforminputPassword"><a href="<?= $Url?>">***********</a></label>
                                            </div>
                                        </div>
                                        <button type="submit" id="btnEdit">Edit</button>
                                        
                            </div>
                        </div>
                    </div>
                    <div class="column column-7">
                        <div class="dbcontent-Min">
                            <div class="sectionHeader"><i class="fa-solid fa-city"></i><h1>company management</h1></div>                


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
htmlFoot();
?>   