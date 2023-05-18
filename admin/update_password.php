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
    <title>Change Password</title>
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
    <style>
        body
        {
            width: 100%;
            height: 650px;
            background-image: url("https://source.unsplash.com/800x730/?numbers");
            /* background-repeat: no-repeat; */
        }
        .wrapper
        {
            width: 430px;
            height: 500px;
            margin: 100px auto;
            background-color: black;
            opacity: .8;
            color: white;
            padding: 27px 15px;
        }
        .form-control
        {
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div style="text-align: center;">
            <h1 style="text-align: center; font-size: 35px; font-family: Aboreto; ">Change Your Password</h1>
        </div>
        <div style="padding: 50px;">
            <form action="" method="post">
                <input class="form-control" type="text " name="username" placeholder="Username " required=" "><br>
                <input class="form-control" type="text" name="email" placeholder="Email" required=" "><br>
                <input class="form-control" type="password" name="password" placeholder="New Password" required=" "><br>
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['submit'])) 
        {    
            $sql = "select * from admin";
            $res = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($res))
            {
                // echo "<pre>"; print_r($_POST['username']);
                // echo "<pre>"; print_r($row['username']);
                // echo "<pre>"; print_r($_POST['email']);
                // echo "<pre>"; print_r($row['email']);
                // exit();
                if($_POST['username'] == $row['username'] && $_POST['email'] == $row['email'])
                {
                    if(mysqli_query($db, "update `admin` set password='$_POST[password]' where username='$_POST[username]' AND email='$_POST[email]';"))
                    {
                        ?>
                        <script>
                            alert("The Password Updated Successfully.");
                            location.href = "index.php";
                        </script>
                        <?php
                    }
                }
            }
            echo "<h2 style='text-align: center;'>Please Enter correct username and email.</h2>";
        }
    ?>
</body>
</html>