<?php
include 'inc/function.php';
htmlHead('IMS', 'Dashboard');

session_start();
$paymentplan = callpayment();
$useraccname = showTheLogin();
$userphoto = $_SESSION['companyPhoto'] ?? 'default.png';
$employeeList = showEmployee();
// if (!isset($_SESSION['paymentplanId']) || ($_SESSION['paymentplanId'] != 2 && $_SESSION['paymentplanId'] != 3)) {
//     header("Location: dashboard.php");
//     exit();
// }

var_dump($_SESSION['paymentplanId']);

if (!isset($_SESSION['companyName'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    registeremployee();
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
                                <div class="sectionHeader"><i class="bx bx-plus"></i><h1>add employee</h1></div>
                            <div id="useraddformContainer">
                                <form action="dbemployee.php" class="addEmployee" method="POST">
                                    <div class="appforminputContainer">
                                        <label for="">employee name</label>
                                        <input type="text" class="appformInput" id="workerName" name="workerName"/>
                                    </div>
                                    <div class="appforminputContainer">
                                        <label for="">E-mail</label>
                                        <input type="text" class="appformInput" id="workerEmail" name="workerEmail"/>
                                    </div>
                                    <div class="appforminputContainer">
                                        <label for="">password</label>
                                        <input type="text" class="appformInput" id="workerPassword" name="workerPassword"/>
                                    </div>
                                    <button type="submit">add employee<i class="bx bx-plus"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="column column-7">
                    <div class="dbcontent-Min">  
                        <div class="sectionHeader"><i class="bx bx-group"></i><h1>employee list</h1></div>
                        <div id="userlistContainer">
                            <table class="userlistTable">
                                <thead>
                                    <tr>
                                        <th>company</th>
                                        <th>name</th>
                                        <th>email</th>
                                    </tr>
                                </thead>
                                <tbody id="userListBody">
                                <?php foreach ($employeeList as $employee): ?>
                                    <tr>
                                        <td><?=htmlspecialchars($useraccname)?></td>
                                        <td><?= htmlspecialchars($employee['workerName']) ?></td>
                                        <td><?= htmlspecialchars($employee['workerEmail']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
htmlFoot();
?>   