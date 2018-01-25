<?php
    ob_start();
    session_start();
    //check session...
    if (isset($_SESSION['admin'])){
        $pageTitle = 'Dashboard';
        include 'init.php';
        echo '<div class="w3-container">';
            echo '<h2 class="w3-center w3-lime w3-round">Welcome To Dashboard</h2>'; ?>
                <!-- boxes for displaying items in dashboard start -->
                <div class="w3-row">
                    <!-- directors box start -->
                    <div class="w3-round w3-col m4 13">
                        <div class="box w3-card-4 w3-food-salmon">
                            <h3 class="w3-center">Directors</h3>
                            <div class="w3-center">
                                <a href="users.php" class="w3-btn">
                                    <i class="fa fa-users fa-5x"></i>
                                    <span class="w3-badge"><?php echo countUser('UserID','users','UserRole',2);?></span>
                                </a>    
                            </div>
                        </div>    
                    </div>
                    <!-- directors box start -->
                    <!-- Teachers box start  -->
                    <div class="w3-round w3-col m4 13">
                        <div class="box w3-card-4 w3-food-spearmint">
                            <h3 class="w3-center">Teachers</h3>
                            <div class="w3-center">
                                <a href="users.php" class="w3-btn">
                                    <i class="fa fa-users fa-5x"></i>
                                    <span class="w3-badge"><?php echo countUser('UserID','users','UserRole',3);?></span>
                                </a>    
                            </div>
                        </div>    
                    </div>
                    <!-- Teachers box end  -->
                    <!-- Co-Teachers box start -->
                    <div class="w3-round w3-col m4 13">
                        <div class="box w3-card-4 w3-food-wheat">
                            <h3 class="w3-center">Co-Teachers</h3>
                                <div class="w3-center">
                                    <a href="users.php" class="w3-btn">
                                        <i class="fa fa-users fa-5x"></i>
                                        <span class="w3-badge"><?php echo countUser('UserID','users','UserRole',4);?></span>
                                    </a>    
                            </div>
                        </div>    
                    </div>
                    <!-- Co-Teachers box end -->
                </div>
                <div class="w3-row">
                    <!-- students box start -->
                    <div class="w3-round w3-col m4 13">
                        <div class="box w3-card-4 w3-food-egg">
                            <h3 class="w3-center">Students</h3>
                            <div class="w3-center">
                                <a href="users.php" class="w3-btn">
                                    <i class="fa fa-users fa-5x"></i>
                                    <span class="w3-badge"><?php echo countUser('UserID','users','UserRole',5);?></span>
                                </a>    
                            </div>
                        </div>    
                    </div>
                    <!-- students box end -->
                    <!-- Subject box start  -->
                    <div class="w3-round w3-col m4 13">
                        <div class="box w3-card-4 w3-food-coffee">
                            <h3 class="w3-center">Subjects</h3>
                            <div class="w3-center">
                                <a href="subjects.php" class="w3-btn">
                                    <i class="fa fa-book fa-5x"></i>
                                    <span class="w3-badge"><?php echo countItems('SubjectID', 'subjects') ?></span>
                                </a>    
                            </div>
                        </div>    
                    </div>
                    <!-- Subject box end  -->
                    <!-- Co-Teachers box start -->
                    <div class="w3-round w3-col m4 13">
                        <div class="box w3-card-4 w3-food-mint">
                            <h3 class="w3-center">Comments</h3>
                                <div class="w3-center">
                                <a href="comments.php" class="w3-btn">    
                                    <i class="fa fa-comments fa-5x"></i>
                                    <span class="w3-badge"><?php echo countItems('ComID','comments')?></span>
                                </a>    
                            </div>
                        </div>    
                    </div>
                    <!-- Co-Teachers box end -->
                </div>      
    <?php   include $tpl.'footer.php'; 
            echo '</div>';    
    }else {
        header("Location :index.php");
        exit();
    }
    ob_end_flush();
?>