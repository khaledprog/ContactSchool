<?php
    /*
    =========================================================
    == In this page You Can Insert | Edit | Delete comments
    =========================================================
    */
    ob_start();
    session_start();
    $pageTitle = 'Comments';
    if (isset($_SESSION['admin'])) {
            include 'init.php';
            $do = isset($_GET['do']) ? $_GET['do']: 'Manage';
            if ($do == 'Manage') {
                    $stmt = $con->prepare("SELECT * FROM comments");
                    $stmt -> execute();
                    $comments = $stmt->fetchAll();
                    
                    if (empty($comments)){
                        echo "<div class='w3-panel w3-red w3-padding w3-leftbar w3-center w3-card-4'>There are no comments to show</div>";
                    }else { ?>
                        <div class='w3-container'>
                            <h2 class="w3-center w3-card-4 w3-round w3-padding w3-light-green">Manage COmments</h2>
                            <table class="w3-table-all w3-hoverable w3-round w3-centered">
                                <thead>
                                    <tr class="w3-light-blue ">
                                        <th>#ID</th>
                                        <th>Comment</th>
                                        <th>Date-Added</th>
                                        <th>User</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <?php
                                    foreach ($comments as $comment) {
                                        echo "<tr>";
                                        echo "<td>".$comment['ComID']."</td>";
                                        echo "<td>".$comment['Comment']."</td>";
                                        echo "<td>".$comment['ComDate']."</td>";
                                        echo "<td>".$comment['UserID']."</td>";
                                        echo "<td>
                                            <a class='w3-button w3-card-4 w3-lime' href='comments.php?do=Edit&comid=".$comment['ComID']."'><i class='fa fa-edit'></i>Edit</a>
                                            <a class='w3-button w3-card-4 w3-red' href='comments.php?do=Delete&comid=".$comment['ComID']."'><i class='fa fa-close'></i>Delete</a>
                                            
                                        </td>";
                                        echo "</tr>";
                                    }
                                ?>        
                            </table>
                        </div>   
                <?PHP    }
                
            }elseif ($do == 'Edit') {
                 echo "<div class='w3-container'>";
                    echo "<h2 class='w3-center w3-card-4 w3-round w3-light-green'>Edit Comments</h2>";
                $comid = isset($_GET['comid']) && is_numeric($_GET['comid'])? intval($_GET['comid']):0;
                //selecting comment depends on this id ,,
                
                $stmt = $con ->prepare("SELECT * FROM comments WHERE ComID = ? ");
                $stmt->execute(array($comid));
                $row = $stmt->fetch();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    
                ?>
                        <form class="w3-container w3-card-4 w3-light-grey" action="?do=Update" method="POST" >
                            <input type="hidden" name="comid" value="<?php echo $row['ComID']?>" />
                            
                            <textarea class="w3-input" name="comment" rows="10" cols="30">
                            <?php echo $row['Comment'];?>    
                            </textarea>    
                            <input class="w3-button w3-card-4 w3-block w3-lime" type="submit" value="Save" />
                        </form>
                <?php
                }else{
                    $msg = "<div class='w3-panel w3-padding w3-leftbar w3-red'>THIS IS NOT GOOD</div>";
                    redirectTo($msg);
                        
                }
                echo "</div>";
            }elseif ($do == 'Update') {
                 echo "<div class='w3-container'>";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //collecing variables,,,,
                    $commid = $_POST['comid'];
                    $comment = $_POST['comment'];
                    $stmt1 = $con->prepare("UPDATE comments SET Comment = ? WHERE ComID = ?");
                    $stmt1 ->execute(array($comment,$commid));
                    //echo success message ....
                    $msg = "<div class='w3-panel w3-round w3-margin w3-padding w3-center w3-light-green'>Comment Updated successfully</div>";
                    redirectTo($msg,'back');
                }else{
                    $msg = "<div class='w3-panel w3-leftbar w3-red w3-round w3-center w3-card-4'>THIS IS NOT GOOD</div>";
                    redirectTo($msg);
                }
                echo "</div>";
            }elseif ($do == 'Delete') {
                 echo "<div class='w3-container'>";
                    $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']):0;
                    // selecting all data depends on this id...
                    $check = checkX('ComID','comments',$comid);
                    if ($check > 0 ) {
                            $stmt1 = $con -> prepare("DELETE FROM comments WHERE COMID = ?");
                            $stmt1 ->execute(array($comid));
                        //success message....
                        $msg = "<div class='w3-panel w3-padding w3-light-green w3-text-red w3-center w3-card-4 w3-round'>Comment Deleted Successfully</div>";
                        redirectTo($msg,'back');
                    }else {
                        $msg = "<div class='w3-panel w3-red w3-leftbar w3-round w3-card-4'>THIS IS NOT GOOD</div>";
                        redirectTo($msg);
                    }
                echo "</div>";
            }
                
            include $tpl.'footer.php';
    }else {
        header("Location: index.php");
        exit();
    }
    ob_end_flush();
?>