<?php
    ob_start();
    session_start();
    $pageTitle = 'Login';
    $noNavbar='';
    //check if there is the admin session redirect to dashboard page
    if (isset($_SESSION['admin'])) {
        header("Location: dashboard.php");
    }

    include 'init.php';
    //check if user come from post method of server rquerst
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $username = $_POST['usesrname'];
        $pass  =   sha1($_POST['password']);
        //check if user exists in the database....
        $stmt = $con->prepare("SELECT UserID, UserName, Password
                                FROM users 
                                WHERE UserName = ? 
                                AND Password = ?
                                AND GroupID = 1");
        $stmt ->execute(array($username,$pass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        // check the counter 
        if ($count > 0) {
            $_SESSION['admin'] = $username;
            $_SESSION['userid'] = $row['UserID'];
            header("Location: dashboard.php");
            exit();
        }
    }
?>
    
    <!-- Login form start -->
    <div class="login">
        <div class="w3-container w3-dispaly-middle w3-margin-top">
            <h2 class="w3-center w3-khaki">Admin Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
                <input class="w3-input"  type="text" name="usesrname" placeholder="Username" autocomplete="off" />
                <input class="w3-input" type="password" name="password" placeholder="Password" autocomplete="new-password" />
                <input class="w3-button w3-block w3-khaki w3-center" type="submit" value="LogIn" />
            </form>
        </div>
    </div>
    <!-- Login form end -->
<?php 
    include $tpl.'footer.php';
    ob_end_flush();
?>