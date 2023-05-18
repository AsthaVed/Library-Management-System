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
    <title>Edit Profile</title>
    <style>
        .form-control
        {
            width: 250px;
            height: 35px;
            margin-bottom: 5px;
        }

        form
        {
            padding-left: 630px;
        }

        label
        {
            color: white;
        }
    </style>
</head>
<body style="background-color: #004528;">
    <h2 style="text-align: center; color: #fff;">Edit Information</h2>
    <?php
    $sql = "select * from admin where username='$_SESSION[login_admin]'";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $first = $row['first'];
        $last = $row['last'];
        $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $contact = $row['contact'];
    }
    ?>

    <div class="profile_info" style="text-align: center;">
        <span style="color: white;">Welcome,</span>
        <h4 style="color: white;">
            <?php
                echo $_SESSION['login_admin'];
            ?>
        </h4>
    </div><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <input class="form-control" type="file" name="picture" ><br>
        <label><h4><b>First Name : </b></h4></label>
        <input class="form-control" type="text" name="first" value="<?php echo $first; ?>">
        <label><h4><b>Last Name : </b></h4></label>
        <input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
        <label><h4><b>Username : </b></h4></label>
        <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
        <label><h4><b>Password : </b></h4></label>
        <input class="form-control" type="text" name="password" value="<?php echo $password; ?>">
        <label><h4><b>Email : </b></h4></label>
        <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
        <label><h4><b>Contact No : </b></h4></label>
        <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">
        <div style="padding-left: 70px; margin-top: 15px;">
        <button style=" width: 100px; height: 35px;" class="btn btn-primary" type="submit" name="submit">Save</button>
        </div>
        </form>

        <?php
        if(isset($_POST['submit']))
        {
            move_uploaded_file($_FILES['picture']['tmp_name'] ,"__DIR__.images/".$_FILES['picture']['name']);

            $first = $_POST['first'];
            $last = $_POST['last'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $picture = $_FILES['picture']['name'];

            $sql1 = "update `admin` set `picture`='$picture', `first`='$first', `last`='$last', `username`='$username', `password`='$password', `email`='$email', `contact`='$contact' where username='$_SESSION[login_admin]';";

            if(mysqli_query($db, $sql1))
            {
                ?>
                <script>
                    alert("Saved Successfully.");
                            window.location.href = "profile.php";
                </script>
                <?php
            }
        }
        ?>
</body>
</html>