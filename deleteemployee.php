<?php 
include 'inc/function.php';
if (isset($_GET['id'])) {
    $workerId = intval($_GET['id']);
    deleteEmployee($workerId);
}
header("Location: dbemployee.php");
exit();

?>