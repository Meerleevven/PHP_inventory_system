<?php

function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_inventory_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    //check connection
    if ($conn->connect_error)
    {
        die("connect failed: ". $conn->connect_error);
    }
    return $conn;
}

function htmlHead($name, $currentPage){
    ?>
    <!doctype html>
    <html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS - <?=$currentPage?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/6ef0b15b08.js"></script>

</head>
    
<?php
}

function logincompany(){
    $conn = connectDB();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = ($_POST['password']);
        
        $stmt = $conn->prepare("SELECT * FROM company WHERE companyName=? OR companyEmail=?");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
    

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Wachtwoord vergelijken met database-hash
            if (password_verify($_POST['password'], $row['companyPassword']) || 
            $_POST['password'] === $row['companyPassword']) {
                session_start();
                $_SESSION['companyName'] = $row['companyName'];
                if (isset($_POST['remember'])) {
                    setcookie('companyName', $row['companyName'], time() + (60*60*24*30), "/");
                    setcookie('cookies_remember', 'true', time() + (60*60*24*30), "/");  // Consistentie: altijd 'true'
                } else {
                    setcookie('companyName', '', time() - 3600, "/");
                    setcookie('cookies_remember', '', time() - 3600, "/");
                }
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('foutMessage').style.display = 'block';
                    document.getElementById('errorUser').style.display = 'none';
                    
                    setTimeout(() => {
                    document.getElementById('foutMessage').style.display = 'none';
                    }, 3000);
                });
                </script>";
            }
    } 
    else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('foutMessage').style.display = 'block';
                    document.getElementById('errorUser').style.display = 'block';
                    document.getElementById('errorWachtwoord').style.display = 'none';
                    
                    setTimeout(() => {
                    document.getElementById('foutMessage').style.display = 'none';
                    }, 3000);
                });
                </script>";;
    }
    
}
}



function showTheLogin() {

    logincompany();

    if (isset($_SESSION['companyName'])) {
        return $_SESSION['companyName'];
    }
    
}

function registerCompany(){
    $conn = connectDB();
    

    if(isset($_POST['regUsername']) && isset($_POST['regEmail']) && isset($_POST['regPassword']) && isset($_POST['regconfirmPas']) && isset($_POST['payment_plan'])){
        $username = $_POST['regUsername'];
        $email = $_POST['regEmail'];
        $password = $_POST['regPassword'];
        $confirmPassword = $_POST['regconfirmPas'];
        $paymentPlan = $_POST['payment_plan'];
    
        if ($confirmPassword === $password && $paymentPlan !== 'option') {
             
            // Check if username or email already exists
            $stmt = $conn->prepare("SELECT * FROM company WHERE companyName=? OR companyEmail=?");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows === 0) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                // Insert new user into the database
                //$stmt = $conn->prepare("INSERT INTO company (companyName, companyEmail, companyPassword, paymentPlanId) VALUES (?, ?, ?, ?)");
                //$stmt->bind_param("ssss", $username, $email, $hashedPassword, $paymentPlan);
    
                if ($stmt->execute()) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('successMsg').style.display = 'block';

                            setTimeout(() => {
                            document.getElementById('successMsg').style.display = 'none';
                            }, 3000);
                        });
                    </script>";
                } else {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('failureMsg').style.display = 'block';
                            setTimeout(() => {
                            document.getElementById('failureMsg').style.display = 'none';
                            }, 3000);
                        });
                    </script>";
                }
            } else {
                
            }
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                     document.getElementById('matchedPass').style.display = 'block';
                     document.getElementById('matchedPass').innerHTML = 'Password does not match!';
                });
            </script>";
        }
    }
}

function htmlFoot(){

    ?>
    </body>
    </html>
    <?php
    }
    ?>
