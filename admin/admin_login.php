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
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUeDogPZhMsapYbMyCBMfchFwWy8U2gFGhIg&usqp=CAU">
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
    <!-- use bootstrap -->
    <!-- Bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        section {
            margin-top: -20px;
        }
    </style>
</head>

<body>
    <section>
        <div class="log_img ">
            <br><br><br>
            <div class="box1 ">
                <br><br>
                <h1 style="text-align: center; font-size: 35px; font-family: Aboreto; ">Library Management System</h1>
                <h1 style="text-align: center; font-size: 35px; font-family: Aldrich; ">Admin Login Form</h1><br>
                <form name="login " action=" " method="post">
                    <div class="login ">
                        <input class="form-control" type="text " name="username" placeholder="Enter Username " required=" "><br>
                        <input class="form-control" type="password" name="password" placeholder="Enter Password" required=" "><br>
                        <button class="btn btn-primary " type="submit " name="submit" value="Login" style="width: 100px; height: 35px;">Login</button>
                    </div>
                </form>
                <p style="padding-left: 33px; ">
                    <br><br>
                    <a href="update_password.php" style="color: yellow; text-decoration:none;"> Forget Password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <b style="color:white;">New to the website?</b><a href="registration.php " style="color: yellow; text-decoration:none;">Sign Up</a>
                </p>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['submit'])) 
    {
        $count = 0;
        $res = mysqli_query($db, "select * from `admin` where username='$_POST[username]' && password='$_POST[password]';");

        $row = mysqli_fetch_assoc($res);
        $count = mysqli_num_rows($res);
        // this function will count how many rows in your result
    
        if ($count == 0) 
        {
         ?>
            <!-- <script>
                alert("The username and password does not match.");
            </script> -->
            <div class="alert alert-danger" style="width:700px; margin-left:400px; background-color: #de1313; color:white;">
                <strong>The username and password does not match.</strong>
            </div>
        <?php
        } 
        else 
        {
            // if username and password matches
            $_SESSION['login_admin'] = $_POST['username'];
            $_SESSION['admin_pic'] = $row['picture'];
         ?>
            <script>
                location.href = "index.php";
            </script>
    <?php
        }
    }
    ?>
</body>

</html>

</html>