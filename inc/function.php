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

        if (empty($username) && empty($email) && empty($password) && empty($confirmPassword)) {

            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('noName').style.display = 'block';
                    document.getElementById('noName').innerHTML = 'enter Company Name!';
                    document.getElementById('emailExist').style.display = 'block';
                    document.getElementById('emailExist').innerHTML = 'enter Email!';
                    document.getElementById('txtStrength').style.display = 'block';
                    document.getElementById('txtStrength').innerHTML = 'Password is too weak!';
                    document.getElementById('matchedPass').style.display = 'block';
                    document.getElementById('matchedPass').innerHTML = 'Password does not match!';

                    document.getElementById('failureMsg').style.display = 'block';
                            setTimeout(() => {
                            document.getElementById('failureMsg').style.display = 'none';
                            }, 3000);
                });
            </script>";
        }
        $passwordRegex = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    
        if ($paymentPlan == "") {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('noPlan').style.display = 'block';
                });
            </script>";

        }
        //Zorg ervoor dat de #txtStrength en #matchedPass echt in de HTML aanwezig zijn en niet ergens in een andere display: none wrapper die het verbergt ondanks de inline display: block.
        elseif ($confirmPassword !== $password || !preg_match($passwordRegex, $password) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // wachtwoord komt niet overeen OF is te zwak
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {";
        
            if ($confirmPassword !== $password) {
                echo "document.getElementById('matchedPass').style.display = 'block';
                      document.getElementById('matchedPass').innerHTML = 'Password does not match!';";
            }
        
            if (!preg_match($passwordRegex, $password)) {
                echo "document.getElementById('txtStrength').style.display = 'block';
                      document.getElementById('txtStrength').innerHTML = 'Password is too weak!';";
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "document.getElementById('regexCheck').style.display = 'block';
                      document.getElementById('regexCheck').innerHTML = 'Invalid email!';";
            }
            echo "});
            </script>";
            
        } else {
            // Check if username or email already exists
            $stmt = $conn->prepare("SELECT * FROM company WHERE companyName=? OR companyEmail=?");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 0) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                //Insert new user into the database
                // $stmt = $conn->prepare("INSERT INTO company (companyName, companyEmail, companyPassword, paymentPlanId) VALUES (?, ?, ?, ?)");
                // $stmt->bind_param("ssss", $username, $email, $hashedPassword, $paymentPlan);
    
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
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('emailExist').style.display = 'block';
                    document.getElementById('emailExist').innerHTML = 'Email already exists!';
                });
                </script>";
            }
        }
    }
}

function callpayment(){
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM payment_plan");
    $stmt->execute();
    $result = $stmt->get_result();
    

}

function htmlFoot(){

    ?>
    </body>
    </html>
    <?php
    }
    ?>
