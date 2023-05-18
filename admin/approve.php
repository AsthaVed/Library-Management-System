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
    <title>Approve Request</title>
    <style>
        .srch{
            padding-left: 55vw;
        }

        .form-control
        {
            width: 300px;
            height: 40px;
            background-color: black;
            color: white;
        }

        .scroll {
            height: 300px;
            overflow: auto;
        }

        body {
            background-image: url("https://source.unsplash.com/1000x710/?numbers");
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            margin-top: 50px;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #222;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        .img-circle
        {
            margin-left: 40px;
        }

        .container
        {
            height: 555px;
            background-color: black;
            color: white;
            opacity: .8;
        }
        .approve
        {
            margin-left: 420px;
        }

        .h:hover
        {
            color: white;
            width: 300px;
            height: 50px;
            background-color: #00544c;
        }
    </style>
</head>
<body>
<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div style="color: white; margin-left: 40px; font-size: 20px;">
            <?php
            if(isset($_SESSION['login_admin']))
            {
                // Define user image and name using php with html img tag
                echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['admin_pic']."'>";
                echo "<br>";
                echo "Welcome  ".$_SESSION['login_admin'];
            }
                ?>
        </div>
        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="request.php">Book Request</a></div>
        <div class="h"><a href="issue_info.php">Issue Information</a></div>
</div>

    <div id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Open</span>

        <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
            }
        </script>
        <div class="container">
            <br><h3 style="text-align: center; font-size:30px;">Approve Request</h3><br>
            <form class="approve" action="" method="post">
                <input type="text" name="approve" placeholder="Yes or No" required="" class="form-control"><br>
                <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
                <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
                <button class="btn btn-primary" type="submit" name="submit">Approve</button>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['submit']))
    {
        mysqli_query($db,"update `issue_book` SET `approve` = '$_POST[approve]', `issue` = '$_POST[issue]', `return` = '$_POST[return]' where username='$_SESSION[name]' and b_id='$_SESSION[b_id]';");

        mysqli_query($db, "update `books` set `quantity` = quantity-1 where b_id = '$_SESSION[b_id]';");

        $res = mysqli_query($db, "select `quantity` from `books` where b_id='$_SESSION[b_id]';");
        $row = mysqli_fetch_assoc($res);
        if($row['quantity'] == 0)
            {
                mysqli_query($db, "update `books` set `status` = 'Not-available' where b_id='$_SESSION[b_id]';");
            }
        ?>
        <script>
            alert("Updated Sccessfully.");
            window.location.href = "request.php";
        </script>
        <?php
    }
    ?>
</body>
</html>  