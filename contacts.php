<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> CollabHub </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- Sripts -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body id="_4">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">c</div><div id="cir">.</div><div id="ntro">ollabHub</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
			<a href="globalForum.php"><li>Global Forum</li></a>
            <a href="categories.php"><li>Categories</li></a>
            
            <a href="ask.php"><li>Ask Question</li></a>
            <a href="contacts.php"><li id="home">Contact</li></a>
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        <!-- content -->
        <div id="content" class="clearfix">
            
            <div id="box-1">
                <div class="heading">
                    <center>
                    <h1 class="logo"><div id="i">c</div><div id="cir">.</div><div id="ntro">ollabHub</div></h1>
                    <p id="tag-line">A collaborative platform for teachers</p>
                    </center>
                </div>
            </div>
            <div id="box-2">
                <div id="text">
                    <h1>CollabHub Inc.</h1>
                    <p style="line-height: 20px;">
                        Dr. Sriram Kailasam<br><a href="mailto:sriram@iitmandi.ac.in">sriram@iitmandi.ac.in</a><br>
                        Contact: +91 8894275490<br>
                        
                        Social: <a href="https://github.com/Aryan-Garg/ISTP_Platform">Github@CollabHub</a><br>
                        License: <a href=http://CollabHub.herokuapp.com/LICENSE>MIT</a>
                    </p>
                </div>
            </div>
            
        </div>
    
        <!-- Footer -->
        <div id="footer">
            &copy; 2022 &bull; ISTP Project.
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
    
</html>