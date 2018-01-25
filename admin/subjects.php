<?php
    /*
    ====================================================
    == In this page You can Add | Edit | Delete subject
    ====================================================
    */
    ob_start();
    session_start();
    // check if there is a session...
    if (isset($_SESSION['admin'])) {
        $pageTitle = 'Subjects';
        include 'init.php';
        echo "<div class='w3-container'>";
           // check do request
            $do = isset($_GET['do'])? $_GET['do']:'Manage';
            //the senareio of do
            if ($do == 'Manage'){ // Manage page
                echo "<div class='w3-container'>";
                echo "<h2 class='w3-card-4 w3-round w3-padding  w3-center w3-light-blue'>Manage Subjects</h2>";
                // selecting data from subjects table
                $stmt = $con->prepare("SELECT * FROM subjects");
                $stmt ->execute();
                $rows = $stmt->fetchAll();
                
                ?>
                    <!-- table of Subjects start -->
                    <table class="w3-table-all w3-hoverable w3-card-4 w3-centered w3-round">
                            <thead>
                                <tr class="w3-blue">
                                    <th>#ID</th>
                                    <td>Subject Name</td>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Added-Date</th>
                                    <th>Added-By</th>
                                    <th>Control</th>
                                    <?php
                                    foreach ($rows as $row){
                                        echo "<tr>";
                                            echo "<td>".$row['SubjectID']."</td>";
                                            echo "<td>".$row['SubjectName']."</td>";
                                            echo "<td>".$row['Year']."</td>";
                                            echo "<td>".$row['Term']."</td>";
                                            echo "<td>".$row['DateAdded']."</td>";
                                            echo "<td>".$row['UserID']."</td>";
                                            echo "<td>
                                                    <a class='w3-button w3-orange w3-card-4' href='subjects.php?do=Edit&subjid=".$row['SubjectID']."'><i class='fa fa-edit'></i>Edit</a>
                                                    <a class='w3-button w3-red w3-card-4' href='subjects.php?do=Delete&subjid=".$row['SubjectID']."'><i class='fa fa-close'></i>Delete</a>
                                                </td>";
                                        echo "</tr>";
                                    }
                                    ?>    
                                </tr>
                            </thead>
                    </table>
                    <!-- table of Subjects end -->
                <?php
                    echo "<a class='w3-button w3-yellow w3-card-4 w3-margin' href='subjects.php?do=Add'><i class='fa fa-plus'></i>Add Subject</a>";
                    
                echo "</div>";
            }elseif ($do == 'Add') { // add page
                echo "<h2 class='w3-card-4 w3-round w3-padding  w3-center w3-light-blue'>Add Subject</h2>";
            ?>
                
                    <form action="?do=Insert" method="POST">
                        <!-- subject name field start -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            <label class="w3-col m2 w3-center w3-input">Subject Name:</label>
                            <input class="w3-col m4 w3-input" type="text" name="name" placeholder="Subject Name" required="required" />
                        </div>
                        <!-- subject name field end -->
                        <!-- subject Term field start -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            
                            <label class="w3-col m2 w3-center w3-input">Term:</label>
                            <input  class="w3-radio" type="radio" name="term" value="first">
                            <label>First</label>
                            <input  class="w3-radio" type="radio" name="term" value="second">
                            <label>Second</label>
                            <input  class="w3-radio" type="radio" name="term" value="all-year" checked="checked">
                            <label>All year</label>
                        </div>
                        <!-- subject Term field end -->
                        <!-- subject Year field start -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            <label class="w3-col m2 w3-center w3-input">Year:</label>
                            <select class="w3-select w3-col m4" name="year" required="required" />
                                <option value="" disabled selected>choose Year</option>
                                <option value="1">first</option>
                                <option value="2">second</option>
                                <option value="3">third</option>
                                <option value="4">fourth</option>
                                <option value="5">fifth</option>
                                <option value="6">sex</option>
                                <option value="7">seven</option>
                            </select>
                        </div>
                        <!-- subject Year field end -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            <label class="w3-col m2 w3-center w3-input">...</label>
                            <input type="submit" value="Add" class="w3-col m4 w3-button w3-yellow" />
                        </div>
                    </form>
                
            <?php
            }elseif ($do == 'Insert') { // insert page
                //check if user come from server request method post
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo "<div class='w3-container'>";
                        echo "<h2 class='w3-panel w3-card-4 w3-round w3-aqua w3-center'>Insert Subject</h2>";
                        // collecting variables
                        $subjname = $_POST['name'];
                        $subjterm = $_POST['term'];
                        $subjyear = $_POST['year'];
                        //check for errors
                        $formErrors = array();
                        if (strlen($subjname) < 4) {
                            $formErrors[] = "Subject Name must not be less than 4 letters";
                        }
                        if (strlen($subjname) > 20) {
                            $formErrors[] = "Subject Name must not be more than 20 letters";
                        }
                        if (empty($subjname)) {
                            $formErrors[] = "Subject Name is required";
                        }
                        if (empty($subjterm)) {
                            $formErrors[] = "Term is required";
                        }
                        if (empty($subjyear)) {
                            $formErrors[] = "Year is required";
                        }
                        // show errors
                        foreach ($formErrors as $error) {
                            echo "<div class='w3-panel w3-leftbar w3-food-tomato w3-round w3-padding'>".$error."</div>";
                        }
                        if (empty($formErrors)) {
                        // if there is no errors check if there is a similar name in DB...
                        $check = checkX('SubjectName','subjects',$subjname);
                        if ($check > 0 ) {
                                $msg = "<div class='w3-panel w3-food-tomato w3-card-4 w3-padding w3-leftbar'>Sorry This Subject Name Existed </div>";
                                redirectTo($msg,'back');
                        }else {
                                $stmt = $con->prepare("INSERT INTO subjects (SubjectName,Year,Term,DateAdded,UserID)
                                                        VALUES (:zname, :zyear,:zterm,now(),1)");
                                $stmt -> execute(array(
                                    'zname' => $subjname,
                                    'zyear' =>$subjyear ,
                                    'zterm' => $subjterm
                                    
                                ));
                                //success message
                                $msg = "<div class='w3-panel w3-padding w3-leftbar w3-card-4 w3-light-green'>".$stmt->rowCount()."Subject Inserted</div>";
                                redirectTo($msg,'back');
                        }
                        }
                    echo "</div>";
                }else {
                     $msg = "Not Allwoed";
                    redirectTo($msg);
                }
            }elseif ($do == 'Edit') { // edit page
                    //check get request method 
                    $subjid = isset($_GET['subjid']) && is_numeric($_GET['subjid'])? intval($_GET['subjid']):0;
                    // selecting data depends on the id
                    $stmt = $con ->prepare("SELECT * FROM subjects WHERE SubjectID = ?");
                    $stmt -> execute(array($subjid));
                    $subject = $stmt->fetch();
                    $counter = $stmt->rowCount();
                    if ($counter > 0) {
                        echo "<div class='w3-container'>";
                            echo "<h2 class='w3-round w3-padding w3-card-4 w3-food-apple w3-center'>Edit Subject</h2>";
                    ?>
                            <form action="?do=Update" method="POST">
                                <input type="hidden" name="subjid" value="<?php echo $subjid ?>" />
                        <!-- subject name field start -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            <label class="w3-col m2 w3-center w3-input">Subject Name:</label>
                            <input class="w3-col m4 w3-input" type="text" name="name"
                                value="<?php echo $subject['SubjectName']?>"  required="required" />
                        </div>
                        <!-- subject name field end -->
                        <!-- subject Term field start -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            
                            <label class="w3-col m2 w3-center w3-input">Term:</label>
                            <input  class="w3-radio" type="radio" name="term" value="first" <?php if ($subject['Term'] == 'first'){echo 'checked';}?>>
                            <label>First</label>
                            <input  class="w3-radio" type="radio" name="term" value="second" <?php if ($subject['Term'] == 'second'){echo 'checked';}?>>
                            <label>Second</label>
                            <input  class="w3-radio" type="radio" name="term" value="all-year" <?php if ($subject['Term'] == 'all-year'){echo 'checked';}?>>
                            <label>All year</label>
                        </div>
                        <!-- subject Term field end -->
                        <!-- subject Year field start -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            <label class="w3-col m2 w3-center w3-input">Year:</label>
                            <select class="w3-select w3-col m4" name="year" required="required" />
                                
                                <option value="1" <?php if ($subject['Year'] == 1) {echo 'selected';}?>>first</option>
                                <option value="2" <?php if ($subject['Year'] == 2) {echo 'selected';}?>>second</option>
                                <option value="3" <?php if ($subject['Year'] == 3) {echo 'selected';}?>>third</option>
                                <option value="4" <?php if ($subject['Year'] == 4) {echo 'selected';}?>>fourth</option>
                                <option value="5" <?php if ($subject['Year'] == 5) {echo 'selected';}?>>fifth</option>
                                <option value="6" <?php if ($subject['Year'] == 6) {echo 'selected';}?>>six</option>
                                <option value="7" <?php if ($subject['Year'] == 7) {echo 'selected';}?>>seven</option>
                            </select>
                        </div>
                        <!-- subject Year field end -->
                        <div class="w3-row w3-card-4 w3-padding w3-margin">
                            <label class="w3-col m2 w3-center w3-input">...</label>
                            <input type="submit" value="Edit" class="w3-col m4 w3-button w3-yellow" />
                        </div>
                    </form>
                    <?php
                    } else {
                        $msg ="<div class='W3-red w3-round w3-card-4 w3-leftbar'>There is no such ID</div>";
                        redirectTo($msg);
                    }
                        echo "</div>";
            }elseif ($do == 'Update') { // update page
                    //check server request method post
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            echo "<div class='w3-container'>";
                                echo "<h2 class='w3-light-green w3-round w3-card-4 w3-center'>Update Subject</h2>";
                                // collecting variables..
                                $subid = $_POST['subjid'];
                                $subname = $_POST['name'];
                                $subterm = $_POST['term'];
                                $subyear = $_POST['year'];
                                //cheking for errors
                                $formErrors = array();
                        if (strlen($subname) < 4) {
                            $formErrors[] = "Subject Name must not be less than 4 letters";
                        }
                        if (strlen($subname) > 20) {
                            $formErrors[] = "Subject Name must not be more than 20 letters";
                        }
                        if (empty($subname)) {
                            $formErrors[] = "Subject Name is required";
                        }
                        if (empty($subterm)) {
                            $formErrors[] = "Term is required";
                        }
                        if (empty($subyear)) {
                            $formErrors[] = "Year is required";
                        }
                        // show errors
                        foreach ($formErrors as $error) {
                            echo "<div class='w3-panel w3-leftbar w3-food-tomato w3-round w3-padding'>".$error."</div>";
                        }
                        if (empty($formErrors))   {
                                $stmt1 = $con->prepare("SELECT * FROM subjects WHERE SubjectName = ? AND SubjectID != ?");
                                $stmt1 -> execute(array($subname,$subid));
                                $count = $stmt1-> rowCount();
                            if ($count == 1){
                                $msg = "<div class='w3-panel w3-red w3-leftbar w3-round w3-card-4 w3-padding'>Sorry This Name Existed</div>";
                                redirectTo($msg,'back');
                            } else{
                                    //update the DB..
                                $stmt1 = $con->prepare("UPDATE subjects SET SubjectName = ?, Year = ?, Term = ?
                                                        WHERE SubjectID = ?");
                                $stmt1 -> execute(array($subname, $subyear, $subterm, $subid));
                                //echo success message
                                $msg = "<div class='w3-panel w3-leftbar w3-light-green w3-card-4 w3-padding'>".$stmt1->rowCount()."Subject Updated</div>";
                                    redirectTo($msg,'back');
                            }  
                        }
                            
                        echo "</div>";
                        
                    }else {
                        $msg = "<div class='w3-panel w3-leftbar w3-red w3-padding w3-round w3-card-4'>Not Valid </div>";
                        redirectTo($msg);
                    }
            }elseif ($do == 'Delete') { // delete page
                    //check id...
                $subjectid = isset($_GET['subjid']) && is_numeric($_GET['subjid'])? intval($_GET['subjid']):0;
                    $check = checkX('SubjectID','subjects', $subjectid);
                    if ($check > 0) {
                         $stmt = $con ->prepare("DELETE FROM subjects WHERE SubjectID = ?");
                         $stmt -> execute(array($subjectid));
                        //echo message
                        $msg = "<div class='w3-panel w3-green w3-text-red w3-padding w3-car-4'>".$stmt->rowCount()."Subject Deleted</div>";
                        redirectTo($msg,'back');
                    }else {
                        $msg = "<div class='w3-panel w3-red w3-padding w3-car-4'>There is no such ID</div>";
                        redirectTo($msg);
                    }
            }else {
                
            }
        echo "</div>";
        include $tpl.'footer.php';
    }else {
        header("Location: index.php");
        exit();
    }
    ob_end_flush();
?>