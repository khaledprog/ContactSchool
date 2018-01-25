<?php 
        
    /*
    == In Users page You Can Add | Edit | Delete user....
    */
    ob_start();
    session_start();
    //check if user have a session...
    if (isset($_SESSION['admin'])) {
        $pageTitle = 'Users';
        include 'init.php';
        $do = isset($_GET['do'])? $_GET['do']:'Manage';
        // cenario for do request 
        if($do == 'Manage'){ // Manage users page..
               
                ?>
                <!--       All Directors-->
                    <div class="w3-container">
                        <h2 class="w3-center w3-food-mint w3-card-4 w3-margin">Directors</h2>

                        <table class="w3-table-all w3-hoverable w3-card-4 w3-centered">
                            <thead>
                                <tr class="w3-blue">
                                    <th>#ID</th>
                                    <td>User-Image</td>
                                    <th>User Name</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Reg-Date</th>
                                    <th>Control</th>
                                    
                                </tr>
                            </thead>
                                <?php
                                foreach (groupRole(2) as $user) {
                                    echo "<tr>";
                                        echo "<td>".$user['UserID']."</td>";
                                        echo "<td><img class='w3-image w3-circle' width='40' src='uploads/userimage/".$user['UserImage']."' alt='image' class='uimage'/></td>";
                                        echo "<td>".$user['UserName']."</td>";
                                        echo "<td>".$user['FirstName']."-".$user['LastName']."</td>";
                                        echo "<td>".$user['Email']."</td>";
                                        echo "<td>".$user['MobileNum']."</td>";
                                        echo "<td>".$user['RegDate']."</td>";
                                        echo "<td><a href='users.php?do=Edit&userid=". $user['UserID'] ."' class='w3-button w3-light-green'><i class='fa fa-edit'></i>Edit</a>
                                                  <a href='users.php?do=Delete&userid=". $user['UserID'] ."' class='w3-button w3-red'><i class='fa fa-close'></i>Delete</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                          </table>
                        </div>
                        
                        <hr/>
                        
                        <!-- All Teachers -->
                    <div class="w3-container">
                        <h2 class="w3-center w3-food-lime w3-card-4 w3-margin">Teachers</h2>

                        <table class="w3-table-all w3-hoverable w3-card-4 w3-centered">
                            <thead>
                                <tr class="w3-blue">
                                    <th>#ID</th>
                                    <td>User-Image</td>
                                    <th>User Name</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Reg-Date</th>
                                    <th>Control</th>
                                    
                                </tr>
                            </thead>
                                <?php
                                foreach (groupRole(3) as $user) {
                                    echo "<tr>";
                                        echo "<td>".$user['UserID']."</td>";
                                        echo "<td><img class='w3-image w3-circle' width='40' src='uploads/userimage/".$user['UserImage']."' alt='image' class='uimage'/></td>";
                                        echo "<td>".$user['UserName']."</td>";
                                        echo "<td>".$user['FirstName']."-".$user['LastName']."</td>";
                                        echo "<td>".$user['Email']."</td>";
                                        echo "<td>".$user['MobileNum']."</td>";
                                        echo "<td>".$user['RegDate']."</td>";
                                        echo "<td><a href='users.php?do=Edit&userid=". $user['UserID'] ."' class=' w3-button w3-light-green'><i class='fa fa-edit'></i>Edit</a>
                                                  <a href='users.php?do=Delete&userid=". $user['UserID'] ."' class=' w3-button w3-red'><i class='fa fa-close'></i>Delete</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                          </table>
                        </div>
                        <hr/>
                            <!-- All Co-Teachers -->
                    <div class="w3-container">
                        <h2 class="w3-center w3-food-mustard w3-card-4 w3-margin">Co-Teachers</h2>

                        <table class="w3-table-all w3-hoverable w3-card-4 w3-centered">
                            <thead>
                                <tr class="w3-blue">
                                    <th>#ID</th>
                                    <td>User-Image</td>
                                    <th>User Name</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Reg-Date</th>
                                    <th>Control</th>
                                    
                                </tr>
                            </thead>
                                <?php
                                foreach (groupRole(4) as $user) {
                                    echo "<tr>";
                                        echo "<td>".$user['UserID']."</td>";
                                        echo "<td><img class='w3-image w3-circle' width='40' src='uploads/userimage/".$user['UserImage']."' alt='image' class='uimage' /></td>";
                                        echo "<td>".$user['UserName']."</td>";
                                        echo "<td>".$user['FirstName']."-".$user['LastName']."</td>";
                                        echo "<td>".$user['Email']."</td>";
                                        echo "<td>".$user['MobileNum']."</td>";
                                        echo "<td>".$user['RegDate']."</td>";
                                        echo "<td><a href='users.php?do=Edit&userid=". $user['UserID'] ."' class=' w3-button w3-light-green'><i class='fa fa-edit'></i>Edit</a>
                                                  <a href='users.php?do=Delete&userid=". $user['UserID'] ."' class=' w3-button w3-red'><i class='fa fa-close'></i>Delete</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                          </table>
                        </div>
                        <hr/>    
                        <!-- All Students -->
                    <div class="w3-container">
                        <h2 class="w3-center w3-food-pea w3-card-4 w3-margin">Students</h2>

                        <table class="w3-table-all w3-hoverable w3-card-4 w3-centered">
                            <thead>
                                <tr class="w3-blue">
                                    <th>#ID</th>
                                    <td>User-Image</td>
                                    <th>User Name</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Reg-Date</th>
                                    <th>Control</th>
                                    
                                </tr>
                            </thead>
                                <?php
                                foreach (groupRole(5) as $user) {
                                    echo "<tr>";
                                        echo "<td>".$user['UserID']."</td>";
                                        echo "<td><img class='w3-image w3-circle' width='40' src='uploads/userimage/".$user['UserImage']."' alt='image' class='uimage' /></td>";
                                        echo "<td>".$user['UserName']."</td>";
                                        echo "<td>".$user['FirstName']."-".$user['LastName']."</td>";
                                        echo "<td>".$user['Email']."</td>";
                                        echo "<td>".$user['MobileNum']."</td>";
                                        echo "<td>".$user['RegDate']."</td>";
                                        echo "<td><a href='users.php?do=Edit&userid=". $user['UserID'] ."' class=' w3-btn w3-light-green'><i class='fa fa-edit'></i>Edit</a>
                                                  <a href='users.php?do=Delete&userid=". $user['UserID'] ."' class=' w3-btn w3-red'><i class='fa fa-close'></i>Delete</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                          </table>
                        </div>
    
                <?php
                
            echo "<a href='users.php?do=Add' class='w3-button w3-light-green w3-margin'><i class='fa fa-user-plus'></i> Add User</a>";
            
        }elseif ($do == 'Add'){ // add users page..
            echo "<h2 class='w3-center w3-green w3-margin'>Add Users</h2>";
            echo "<div class='w3-container w3-margin we-padding w3-center'>";
                echo "<div class=''>"; ?>
                    <form action="?do=Insert" method="POST" enctype="multipart/form-data">
                        <!-- Username field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">UserName:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="text" name="username" placeholder="Username" autocomplete="off" required="required" />
                        </div>
                        <!-- Username field end -->
                        <!-- Password field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Password:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="password" name="password1" placeholder="Password" autocomplete="new-password"  required="required"/>
                        </div>
                        <!-- Password field end -->
                        <!-- confirn Password field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Confirm Password:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="password" name="password2" placeholder="Confirm-Password" autocomplete="new-password" required="required"/>
                        </div>
                        <!-- confirm Password field end -->
                        <!-- First Name field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">First Name:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="text" name="fname" placeholder="First Name" required="required"/>
                        </div>
                        <!-- first name field end -->
                        <!-- Last Name field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Last Name:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="text" name="lname" placeholder="Last Name" required="required"/>
                        </div>
                        <!-- Last Name field end -->
                        <!-- E-mail field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">E-mail:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="email" name="email" placeholder="E-mail" required="required"/>
                        </div>
                        <!-- E-mail field end -->
                        <!-- Mobile number field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Mobile Number:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="number" name="mobnum" placeholder="Mobile Number" required="required"/>
                        </div>
                        <!-- Mobile Number field end -->
                        <!-- Role field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">User Role:</label>
                            <select class="w3-select w3-card-4 w3-col m4 w3-margin-bottom" name="role" required="required">
                                <option value="" disabled selected>Choose Your Role</option>
                                <option value="2">Director</option>
                                <option value="3">Teacher</option>
                                <option value="4">Co-Teacher</option>
                                <option value="5">Student</option>
                            </select>
                        </div>
                        <!-- Role field end -->
                        <!-- image field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">User Image:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="file" name="userimage" required="required"/>
                        </div>
                        <!-- image field end -->
                        <!-- Button start -->
                        <div class="w3-row-">
                            <label class="w3-col m2">...</label>
                            <input type="submit" value="Add User" class="w3-button w3-card-4 w3-col m4  w3-light-green" />
                        </div>
                        <!-- Button end -->
                    </form>

            <?php    echo "</div>";
            echo "</div>";
        }elseif ($do == 'Insert') {     
                //check if user data comes from post request method
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     echo "<h2 class='w3-center w3-cyan'> Insert User</h2>";
                    echo "<div class='w3-container w3-padding w3-margin'>";
                    // collecting variables
                        $username = $_POST['username'];
                        $pass1 = $_POST['password1'];
                        $pass2 = $_POST['password2'];
                        $hashedpass = sha1($pass1);
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $mobnum = $_POST['mobnum'];
                        $role = $_POST['role'];
                    // image vairalbles
                        $imagename = $_FILES['userimage']['name'];
                        $imagesize = $_FILES['userimage']['size'];
                        $imagetmpn = $_FILES['userimage']['tmp_name'];
                        $imagetype = $_FILES['userimage']['type'];
                    // extensions allowed to be uploaded
                    $allowedExtensions = array("jpeg","jpg","png","gif");
                    // extracting image extension
                    $imageExtension = strtolower(end(explode('.',$imagename)));
                    // checking for errors
                    $formErrors = array();
                    if (strlen($username)<4){
                        $formErrors[] = "User Name must Not be less than 4 letters";
                    }
                    if (strlen($username)>20){
                        $formErrors[] = "User Name must Not be more than 20 letters";
                    }
                    if (empty($username)){
                        $formErrors[] = "User Name is required";
                    }
                    if (empty($pass1)){
                        $formErrors[] = "Password is rquired";
                    }
                    if (empty($pass2)){
                        $formErrors[] = "Password must be confirmed";
                    }
                    if ($pass1 !== $pass2){
                        $formErrors[] = "Passwords not the same";
                    }
                    if (empty($fname)){
                        $formErrors[] = "First Name is  Required";
                    }
                    if (empty($lname)){
                        $formErrors[] = "Last Name is  Required";
                    }
                    if (empty($email)){
                        $formErrors[] = "E-mail is Required";
                    }
                    if (empty($mobnum)){
                        $formErrors[] = "Mobile Number is Required";
                    }
                    if (strlen($mobnum) !== 11){
                        $formErrors[] = "Mobile Number Must be 11 numbers";
                    }
                    if (empty($role)){
                        $formErrors[] = "You Must Select A Role";
                    }
                    if (!empty($imagename) && !in_array($imageExtension,$allowedExtensions)){
                        $formErrors[] = "This Extension Is Not Allowd";
                    }
                    if (empty($imagename)){
                        $formErrors[] = "Your Image Is Required";
                    }
                    if ($imagesize > 4194304) {
                        $formErrors[] = "Image size must not Exceed 4MB";
                    }
                        
                    foreach($formErrors as $error){
                        echo "<div class='w3-panel w3-food-strawberry w3-round w3-leftbar w3-card-4 w3-padding w3-animate-top'>". $error . "</div>";
                    }
                    
                    if (empty($formErrors)) {
                        $userImage = rand(0,100000).'_'.$imagename;
                        move_uploaded_file($imagetmpn,"uploads/userimage//".$userImage);
                    }
                      //check if there is a user with the same name in the database....
                        $check = checkX('UserName','users',$username);
                        if ($check > 0){
                            echo "<div class='w3-panel w3-food-strawberry w3-round w3-leftbar w3-card-4 w3-padding w3-animate-top'>Sorry This UserName Existed Find Another One</div>";
                        }else{
                            //insert user in the database...
                            $stmt1 = $con->prepare("INSERT INTO users (UserName, Password, FirstName, LastName, Email, MobileNum, RegDate, UserImage, UserRole, GroupID) 
                                                    VALUES (:zuser,:zpass, :zfname, :zlname, :zemail, :zmobnum, now(), :zimage, :zrole, 0)");
                            $stmt1->execute(array(
                                'zuser' =>$username ,
                                'zpass' => $hashedpass,
                                'zfname' =>$fname ,
                                'zlname' =>$lname ,
                                'zemail' =>$email ,
                                'zmobnum' =>$mobnum ,
                                'zimage' => $userImage,
                                'zrole' => $role
                            ));
                                $msg = "<div class='w3-panel w3-round w3-padding w3-card-4 w3-food-apple'>" .$stmt1->rowCount(). "User Inserted</div>";
                                redirectTo($msg,'back');
                            }
                    echo "</div>";    
                }else {
                    $msg = "<div class='w3-panel w3-round w3-card-4 w3-padding w3-food-tomato w3-leftbar'>There is some thing wrong</div>";
                    redirectTo($msg);
                }
        }elseif ($do == 'Edit') { //
                echo "<div class='w3-container'>";
                    // check if get request user id is number and get its integer value.
                    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']):0;
                    
                    // selecting data depends on this id..
                    $stmt1 = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
                    //execute query
                    $stmt1->execute(array($userid));
                    //fetch data.
                    $row = $stmt1->fetch();
                    // The row count..
                    $count = $stmt1->rowCount();
                    // If the ID is Found show The form for Edit...
                    if ($count > 0 ){
                    ?>
                      <h2 class="w3-food-spearmint w3-padding w3-margin w3-round w3-card-4 w3-center">Edit User</h2>
                        <form action="?do=Update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="userid" value="<?php echo $userid?>" />
                        <!-- Username field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">UserName:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="text" name="username" 
                                   value="<?php echo $row['UserName']?>" />
                        </div>
                        <!-- Username field end -->
                        <!-- Password field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Password:</label>
                            <input type="hidden" name="oldpass" value="<?php echo $row['Password']?>" />
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="password" name="password1"
                                   placeholder="Leave blank in case no change in password" autocomplete="new-password"/>
                        </div>
                        <!-- Password field end -->
                        <!-- confirn Password field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Confirm Password:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="password" name="password2"
                                   placeholder="Leave blank in case no change in password" autocomplete="new-password"/>
                        </div>
                        <!-- confirm Password field end -->
                        <!-- First Name field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">First Name:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="text" name="fname"
                                   value="<?php echo $row['FirstName']?>"/>
                        </div>
                        <!-- first name field end -->
                        <!-- Last Name field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Last Name:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="text" name="lname"
                                   value="<?php echo $row['LastName']?>"/>
                        </div>
                        <!-- Last Name field end -->
                        <!-- E-mail field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">E-mail:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="email" name="email"
                                   value="<?php echo $row['Email']?>"/>
                        </div>
                        <!-- E-mail field end -->
                        <!-- Mobile number field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">Mobile Number:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="number" name="mobnum" 
                                   value="<?php echo $row['MobileNum']?>"/>
                        </div>
                        <!-- Mobile Number field end -->
                        <!-- Role field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">User Role:</label>
                            <select class="w3-select w3-card-4 w3-col m4 w3-margin-bottom" name="role">
                                
                                <option value="2" <?php if($row['UserRole']== 2){echo 'selected';}?>>Director</option>
                                <option value="3" <?php if($row['UserRole']== 3){echo 'selected';}?>>Teacher</option>
                                <option value="4" <?php if($row['UserRole']== 4){echo 'selected';}?>>Co-Teacher</option>
                                <option value="5" <?php if($row['UserRole']== 5){echo 'selected';}?>>Student</option>
                            </select>
                        </div>
                        <!-- Role field end -->
                        <!-- image field start -->
                        <div class="w3-row">
                            <label class="w3-col m2">User Image:</label>
                            <input class="w3-input w3-card-4 w3-col m4 w3-margin-bottom" type="file" name="userimage" />
                        </div>
                        <!-- image field end -->
                        <!-- Button start -->
                        <div class="w3-row-">
                            <label class="w3-col m2">...</label>
                            <input type="submit" value="Update User" class="w3-button w3-card-4 w3-col m4  w3-light-green" />
                        </div>
                        <!-- Button end -->
                    </form>
                    <?php  }else{
                        echo "<div class='w3-panel w3-padding w3-food-tomato w3-leftbar'>There is no such id no edit will be done</div>";
                        }
                echo "</div>";
        }elseif ($do == 'Update') {
                        echo "<div class='w3-container'>";
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                echo "<h2 class='w3-card-4 w3-light-blue w3-center'>Update User</h2>";
                                // collecting variables
                                $uid = $_POST['userid'];
                                $username = $_POST['username'];
                                $password1 = $_POST['password1'];
                                $password2 = $_POST['password2'];
                                $hashedpass = empty($_POST['password1'])? $_POST['oldpass']: sha1($_POST['password1']);
                                $firname = $_POST['fname'];
                                $laname = $_POST['lname'];
                                $uemail = $_POST['email'];
                                $monum = $_POST['mobnum'];
                                $urole = $_POST['role'];
                                // image vairalbles
                                $imagename = $_FILES['userimage']['name'];
                                $imagesize = $_FILES['userimage']['size'];
                                $imagetmpn = $_FILES['userimage']['tmp_name'];
                                $imagetype = $_FILES['userimage']['type'];
                                // extensions allowed to be uploaded
                                $allowedExtensions = array("jpeg","jpg","png","gif");
                                // extracting image extension
                                $imageExtension = strtolower(end(explode('.',$imagename)));
                            
                                // checking for errors
                                $formErrors = array();
                                if(strlen($username) <4){
                                    $formErrors[] = "User Name must not be less than 4 letters";
                                }
                                if(strlen($username) >20){
                                    $formErrors[] = "User Name must not be more than 20 letters";
                                }
                                if (empty($username)) {
                                    $formErrors[] = "User Name Is required";
                                }
                                if ($password1 !== $password2){
                                 $formErrors[] = "Passwords Must Match";   
                                }
                                if (empty($firname)) {
                                    $formErrors[] = "First Name Is required";
                                }
                                if (empty($laname)) {
                                    $formErrors[] = "Last Name Is required";
                                }
                                if (empty($uemail)) {
                                    $formErrors[] = "E-mail Is required";
                                }
                                if (empty($monum)) {
                                    $formErrors[] = "Mobile  Is required";
                                }
                                if (empty($urole)) {
                                    $formErrors[] = "You Must choose A Role";
                                }
                                //fetching errors
                                foreach($formErrors as $error) {
                                    $msg =  "<div class='w3-panel w3leftbar w3-red w3-card-4 w3-padding'>".$error."</div>";
                                    redirectTo($msg,'back',7);
                                }
                                if (empty($formErrors)){
                                    $stmt2 = $con ->prepare("SELECT * FROM users 
                                                            WHERE UserID != ? AND UserName = ? ");
                                    $stmt2 ->execute(array($uid, $username));
                                    $count = $stmt2->rowCount();
                                    if ($count == 1) {
                                        $msg = "<div class='w3-panel w3-padding w3-food-tomato w3-leftbar w3-card-4'>This UserName is Existed</div>";
                                        redirectTo($msg,'back');
                                    }else {
                                        $stmt = $con->prepare("UPDATE users SET UserName =?, Password=?, FirstName=?, LastName=?, Email=?, MobileNum=?, UserRole=?
                                                                WHERE UserID = ?");
                                        $stmt->execute(array($username,$hashedpass, $firname, $laname, $uemail, $monum,$urole,$uid));
                                        //echo the success message
                                        $msg = "<div class='w3-panel w3-padding w3-leftbar w3-food-apple w3-card-4'>".$stmt->rowCount()."User Updated</div>";
                                        redirectTo($msg,'back');
                                    }
                                }
                        }else {
                            header("Location: index.php");
                            exit();
                        }
                            
                            
                        echo "</div>";
                    
        }elseif ($do == 'Delete') {
                echo "<div class='w3-container'>";
                    echo "<h2 class='w3-orange w3-padding w3-round w3-card-4 w3-center'>Delete User</h2>";
                    //check if user come from get request and int value
                    $userid = isset($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']):0;
                    // get all data depending on this id
                     $check = checkX('UserID','users',$userid);
                    // check  the result
                    if ($check > 0) {
                        $stmt = $con->prepare("DELETE FROM users WHERE UserID = ?");
                        $stmt->execute(array($userid));
                        $msg = "<div class='w3-panel w3-padding w3-green w3-text-red w3-card-4'>".$stmt->rowCount()."User Deleted Successfully</div>";
                        redirectTo($msg,'back');
                    }else {
                        $msg = "<div class='w3-panel w3-red w3-card-4 '>There Is No such ID</div>";
                        redirectTo($msg);
                    }
                echo "</div>";
        }
    }else {
        header("Location: index.php");
        exit();
    }
    ob_end_flush();
?>