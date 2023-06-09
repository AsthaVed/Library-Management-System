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
    <title>Books</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUeDogPZhMsapYbMyCBMfchFwWy8U2gFGhIg&usqp=CAU"> 
    <!-- use bootstrap -->
    <!-- Bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .srch{
            padding-left: 58vw;
        }
        .scroll {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
        body {
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
    <!-- ___________________________________sidenav______________________________________________ -->
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
        <div class="h"><a href="add.php">Add Books</a></div>
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
    
        <!-- ___________________________________search bar___________________________________________ -->
        <div class="srch">
            <form  class="navbar-form" method="post" name="form1">
                <input class="form-control" type="text" name="search" placeholder="search books..." required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
            <form action="" class="navbar-form" method="post" name="form1">
                <input class="form-control" type="text" name="b_id" placeholder="Enter Book ID" required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Delete</button>
            </form>
        </div>
        <h2>List of Books</h2>
        <div class="scroll">
            <?php

            if(isset($_POST['submit']))
            {
                $q = mysqli_query($db, "select * from `books` where name like '%$_POST[search]%'");
                if(mysqli_num_rows($q)==0)
                {
                    echo "Sorry! No book found. Try searching again.";
                }
                else
                {
                    echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #6db6b9e6'>";
                //Table header
                echo "<th>";  echo "ID";  echo "</th>";
                echo "<th>";  echo "Book-Name";  echo "</th>";
                echo "<th>";  echo "Authors-Name";  echo "</th>";
                echo "<th>";  echo "Edition";  echo "</th>";
                echo "<th>";  echo "Status";  echo "</th>";
                echo "<th>";  echo "Quantity";  echo "</th>";
                echo "<th>";  echo "Department";  echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr style='background-color: white'>";
                    //Table data
                    echo "<td>";  echo $row['b_id'];  echo "</td>";
                    echo "<td>";  echo $row['name'];  echo "</td>";
                    echo "<td>";  echo $row['authors'];  echo "</td>";
                    echo "<td>";  echo $row['edition'];  echo "</td>";
                    echo "<td>";  echo $row['status'];  echo "</td>";
                    echo "<td>";  echo $row['quantity'];  echo "</td>";
                    echo "<td>";  echo $row['department'];  echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
                }
            }
            // if button is not pressed.
            else
            {
                $res = mysqli_query($db,"select * from `books` order by `books`.`name` ASC;");
            // For showing the data in table then 
            echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #6db6b9e6'>";
                //Table header
                echo "<th>";  echo "ID";  echo "</th>";
                echo "<th>";  echo "Book-Name";  echo "</th>";
                echo "<th>";  echo "Authors-Name";  echo "</th>";
                echo "<th>";  echo "Edition";  echo "</th>";
                echo "<th>";  echo "Status";  echo "</th>";
                echo "<th>";  echo "Quantity";  echo "</th>";
                echo "<th>";  echo "Department";  echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr style='background-color: white'>";
                    //Table data
                    echo "<td>";  echo $row['b_id'];  echo "</td>";
                    echo "<td>";  echo $row['name'];  echo "</td>";
                    echo "<td>";  echo $row['authors'];  echo "</td>";
                    echo "<td>";  echo $row['edition'];  echo "</td>";
                    echo "<td>";  echo $row['status'];  echo "</td>";
                    echo "<td>";  echo $row['quantity'];  echo "</td>";
                    echo "<td>";  echo $row['department'];  echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            }

            if(isset($_POST['submit1']))
            {
                if(isset($_SESSION['login_admin'])) 
                {
                    mysqli_query($db, "delete from `books` where b_id='$_POST[b_id]';");
                    ?>
                    <script>
                        alert("Deleted Successfully.");
                    </script>
                <?php
                }
                else
                {
                    ?>
                    <script>
                        alert("Please Login First.");
                    </script>
                    <?php
                }
            }
            ?>
        </div>
    </div>  
</body>
</html>