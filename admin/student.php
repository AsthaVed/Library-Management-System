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
    <title>Student Information</title>
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
            padding-left: 75vw;
        }
        .scroll {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <!-- ___________________________________search bar___________________________________________ -->
    <div class="srch">
        <form action="" class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="search a student.." required="">
            <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </div>
    <h2>List of Student</h2>
    <div class="scroll">
        <?php

        if(isset($_POST['submit']))
        {
            $q = mysqli_query($db, "select first,last,username,roll,email,contact from `student` where username like '%$_POST[search]%'");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No student found with that username. Try searching again.";
            }
            else
            {
                echo "<table class='table table-bordered table-hover'>";
                        echo "<tr style='background-color: #6db6b9e6'>";
                            //Table header
                            echo "<th>";  echo "First Name";  echo "</th>";
                            echo "<th>";  echo "Last Name";  echo "</th>";
                            echo "<th>";  echo "Username";  echo "</th>";
                            echo "<th>";  echo "Roll";  echo "</th>";
                            echo "<th>";  echo "Email";  echo "</th>";
                            echo "<th>";  echo "Contact";  echo "</th>";
                        echo "</tr>";

                    while($row=mysqli_fetch_assoc($q))
                    {
                        echo "<tr style='background-color: white'>";
                            //Table data
                            echo "<td>";  echo $row['first'];  echo "</td>";
                            echo "<td>";  echo $row['last'];  echo "</td>";
                            echo "<td>";  echo $row['username'];  echo "</td>";
                            echo "<td>";  echo $row['roll'];  echo "</td>";
                            echo "<td>";  echo $row['email'];  echo "</td>";
                            echo "<td>";  echo $row['contact'];  echo "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            }
        }
        // if button is not pressed.
        else
        {
            $res = mysqli_query($db,"select first,last,username,roll,email,contact from `student` order by `student`.`first` ASC;");
            // For showing the data in table then 
            echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #6db6b9e6'>";
                        //Table header
                        echo "<th>";  echo "First Name";  echo "</th>";
                        echo "<th>";  echo "Last Name";  echo "</th>";
                        echo "<th>";  echo "Username";  echo "</th>";
                        echo "<th>";  echo "Roll";  echo "</th>";
                        echo "<th>";  echo "Email";  echo "</th>";
                        echo "<th>";  echo "Contact";  echo "</th>";
                    echo "</tr>";

                while($row=mysqli_fetch_assoc($res))
                {
                    echo "<tr style='background-color: white'>";
                        //Table data
                        echo "<td>";  echo $row['first'];  echo "</td>";
                        echo "<td>";  echo $row['last'];  echo "</td>";
                        echo "<td>";  echo $row['username'];  echo "</td>";
                        echo "<td>";  echo $row['roll'];  echo "</td>";
                        echo "<td>";  echo $row['email'];  echo "</td>";
                        echo "<td>";  echo $row['contact'];  echo "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>