<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>   
    <style>
        .wrapper{
            width: 350px;
            margin: 0 auto;
            color: white;
        }
    </style>
</head>
<body style="background-color: #004528;">
    <div class="container">
        <form action="" method="post">
            <button class="btn btn-primary" style="float: right; width: 80px; height: 35px;" name="submit1">Edit</button> 
        </form>
        <div class="wrapper">
            <?php

            if(isset($_POST['submit1']))
            {
                ?>
                <script>
                    window.location.href = "edit.php";
                </script>
                <?php
            }
            $q = mysqli_query($db,"select * from `admin` where username='$_SESSION[login_admin]';");
            ?>
            <br>
            <h2 style="text-align: center;">My Profile</h2>
            <?php
                $row = mysqli_fetch_assoc($q);
                echo "<div style='text-align: center;'><img class='img-circle profile_img' height=130 src='images/".$_SESSION['admin_pic']."'></div>";
            ?>
            <div style="text-align:center;">
                <b>Welcome,</b>
                <h4>
                    <?php
                    echo " ".$_SESSION['login_admin'];
                    ?>
                </h4>
            </div>
            <?php
                echo "<b>";
                echo "<table class='table table-bordered'>";
                    echo "<tr>";
                        echo "<td>";  echo "<b>ID</b>";  echo "</td>";
                        echo "<td>";  echo $row['id'];  echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";  echo "<b>FIRST Name</b>";  echo "</td>";
                        echo "<td>";  echo $row['first'];  echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";  echo "<b>LAST NAME</b>";  echo "</td>";
                        echo "<td>";  echo $row['last'];  echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";  echo "<b>Username</b>";  echo "</td>";
                        echo "<td>";  echo $row['username'];  echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";  echo "<b>Password</b>";  echo "</td>";
                        echo "<td>";  echo $row['password'];  echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";  echo "<b>Email</b>";  echo "</td>";
                        echo "<td>";  echo $row['email'];  echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";  echo "<b>Contact</b>";  echo "</td>";
                        echo "<td>";  echo $row['contact'];  echo "</td>";
                    echo "</tr>";
                echo "</table>";
                echo "</b>";
            ?>
        </div>
    </div>
</body>
</html>