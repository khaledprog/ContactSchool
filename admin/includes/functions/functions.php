<?php
    // checkX function v1.0
    // a function to check for user or any name in the database to be existed or not
    // this function has 3 parameters $select  $table $value...
    function checkX($select,$table,$value) {
        global $con;
        $stmt = $con -> prepare("SELECT $select FROM $table WHERE $select = ?");
        $stmt ->execute(array($value));
        $count = $stmt->rowCount();
        return $count;
    }

    //groupRole function v1.0
    // a function to show each role user in a separate table or group
    // parametes  $role to sepecify the role to be separated
    function groupRole($role) {
        global $con;
        $stmt = $con->prepare("SELECT * FROM users WHERE UserRole = ?");
        $stmt->execute(array($role));
        $users = $stmt->fetchAll();
        return $users;
    }

    // redirctTo function v1.0
    // a function to redirct to specific page after successfull or failure of doing any process
    // parameters $msg ->mesage displayed - $url -> the url to be redirected to $seconds -> number of seconds
    function redirectTo($msg, $url= null, $seconds=4){
        
        if ($url === null) {
            $url = 'index.php';
            $link = 'Homepage';
        } else {
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
                $url = $_SERVER['HTTP_REFERER'];
                $link = 'Previous Page';
            } else{
                $url = 'index.php';
                $link = 'Homepage';
            }
        }
            echo $msg;
            echo "<div class='w3-panel w3-padding w3-card-4 w3-center w3-light-blue'>You Will Be Redirected To $link After $seconds seconds.</div>";
            header("refresh:$seconds;url=$url");
            exit();
    }
    
    // countUser function v1.0
    // a function to count each role users from  users tables. 
    // parameters $count item to be counted | $table table selected for count | $value the value to count
    function countUser($count,$table,$field,$value) {
        global $con;
        $stmt = $con ->prepare("SELECT COUNT($count) FROM $table where $field = ? ");
        $stmt ->execute(array($value));
        $result = $stmt->fetchColumn();
        return $result;
    }
    // countItems function v1.0
    // a function to count items from a table in database.
    // parameters $count | $table....
    function countItems($count, $table) {
        global $con;
        $stmt = $con ->prepare("SELECT COUNT($count) FROM $table");
        $stmt ->execute();
        return $stmt->fetchColumn();
    }
?>
