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
    <title>Admin Registration</title>
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
        <div class="reg_img">
            <br><br>
            <div class="box2">
                <br>
                <h1 style="text-align: center; font-size: 35px; font-family: Aboreto;">Library Management System</h1>
                <h1 style="text-align: center; font-size: 35px; font-family: Aldrich;">Admin Registration Form</h1><br>
                <form name="registration" action=" " method="post">
                    <div class="registration">
                        <input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
                        <input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
                        <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                        <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
                        <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
                        <input class="form-control" type="file" name="picture" value="upload" id="file" accept="image/*"><br>
                        <button class="btn btn-primary" type="submit" name="submit" value="Register" style="width: 100px; height: 35px;">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php
    // check sign up button is clicked or not 
    if (isset($_POST['submit'])) {
        $count = 0;
        $sql = "select username from `admin`";
        $res = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            if ($row['username'] == $_POST['username']) {
                $count += 1;
            }
        }
        if ($count == 0) {
            mysqli_query($db, "insert into `admin` values('', '$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]', '$_POST[picture]');");
    ?>
            <!-- whenever the user register successfully -->
            <script>
                alert("Registration Successfully");
                location.href = "index.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("The username already exist.");
            </script>
    <?php
        }
    }
    ?>
</body>

</html>