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
    <title>Book Request</title>
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
            height: 400px;
            overflow: auto;
        }

        th,td
        {
            width: 10%;
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
        <div class="h"><a href="expired.php">Expired List</a></div>
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
            <?php
                if(isset($_SESSION['login_admin']))
                {
                    ?>
                    <div class="srch">
                        <br>
                        <form action="" method="post" name="form1">
                            <input type="text" class="form-control" name="username" placeholder="Username" required=""><br>
                            <input type="text" class="form-control" name="b_id" placeholder="Book ID" required=""><br>
                            <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $var1 = "<p style='color: yellow; background-color: green;'>Returned</p>";
                        mysqli_query($db, "update `issue_book` set `approve`='var1' where username='$_POST[username]' and b_id='$_POST[b_id]';");
                        mysqli_query($db, "update `books` set `quantity`='quantity+1' where b_id='$_POST[b_id]';");
                    }
                }
            ?>
                <h3 style="text-align: center;">Date Expired List</h3>
                <?php
                $c = 0;
                    if(isset($_SESSION['login_admin']))
                    {
                        $sql = "SELECT student.username,roll,books.b_id,name,authors,edition,approve,issue,issue_book.return FROM student INNER JOIN issue_book ON student.username = issue_book.username INNER JOIN books ON issue_book.b_id = books.b_id WHERE issue_book.approve != '' and issue_book.approve != 'Yes' order by issue_book.return ASC";
                        $res = mysqli_query($db, $sql);
                        
                        echo "<br>";
                        echo "<table class='table table-bordered' style='width: 100%;'>";
                            echo "<tr style='background-color: #6db6b9e6'>";
                                //Table header
                                echo "<th style='text-align: center;'>";  echo "Username";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Roll No";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Book ID";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Book Name";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Authors Name";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Edition";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Status";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Issue Date";  echo "</th>";
                                echo "<th style='text-align: center;'>";  echo "Return Date";  echo "</th>";
                            echo "</tr>";
                        echo "</table>";

                        echo "<div class='scroll'>";
                        echo "<table class='table table-bordered'>";
                            while($row=mysqli_fetch_assoc($res))
                            {
                                echo "<tr>";
                                    //Table data
                                    echo "<td>";  echo $row['username'];  echo "</td>";
                                    echo "<td>";  echo $row['roll'];  echo "</td>";
                                    echo "<td>";  echo $row['b_id'];  echo "</td>";
                                    echo "<td>";  echo $row['name'];  echo "</td>";
                                    echo "<td>";  echo $row['authors'];  echo "</td>";
                                    echo "<td>";  echo $row['edition'];  echo "</td>";
                                    echo "<td>";  echo $row['approve'];  echo "</td>";
                                    echo "<td>";  echo $row['issue'];  echo "</td>";
                                    echo "<td>";  echo $row['return'];  echo "</td>";
                                echo "</tr>";
                            }
                        echo "</table>";
                        echo "</div>";
                    }
                    else
                    {
                        ?>
                        <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
                        <?php
                    }
                ?>
        </div>
    </div>
</body>
</html>