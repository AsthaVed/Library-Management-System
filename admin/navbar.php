<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <!-- use bootstrap -->
    <!-- Bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>

                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>

            <?php
                if(isset($_SESSION['login_admin']))
                {
            ?>
                    <ul class="nav navbar-nav">
                    <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="student.php">STUDENT-INFORMATION</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> &nbsp <span class="badge bg-green">0</span></a></li>
                        <li><a style="padding: 10px 10px 0px 15px;" href="profile.php">
                            <div style="color: white;">
                                <?php
                                    // Define user image and name using php with html img tag
                                    echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['admin_pic']."'>";
                                    echo " ".$_SESSION['login_admin'];
                                ?>
                            </div>
                        </a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                    </ul>
            <?php
                }
                else
                {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>                
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                </ul>
                <?php
                }
            ?>

            
        </div>
    </nav>
</body>
</html>