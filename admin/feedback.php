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
    <title>Feedback</title>
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
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-image: url("https://source.unsplash.com/800x800/?feedback");
        }

        .wrapper {
            height: 85vh;
            width: 65vw;
            padding: 10px;
            margin-top: -20px;
            margin-left: 300px;
            background-color: black;
            color: white;
            opacity: .8;
        }

        .form-control {
            height: 70px;
            width: 60%;
        }

        .scroll {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
    </style>
</head>

<body>
    
    <div class="wrapper">
        <h4>If you have any suggesions or questions please comment below.</h4>
        <form action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="Write something." required=""><br><br>
            <button class="btn btn-primary" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">Comment</button>
        </form>
        <br><br>
        <div class="scroll">
            <?php
            if (isset($_POST['submit'])) 
            {
                $sql = "insert into `comments` values('','$_SESSION[login_admin]','$_POST[comment]');";
                if (mysqli_query($db, $sql)) 
                {
                    $q = "select * from `comments` order by `comments`.`f_id` desc";
                    $res = mysqli_query($db, $q);
                    if( $res )
                    {
                        // success! check results
                        echo "<table class='table table-bordered'>";
                        while( $row = mysqli_fetch_assoc( $res ) )
                        {
                            /* . . . do something */
                            echo "<tr>";
                                echo "<td>";  echo $row['username'];  echo "</td>";
                                echo "<td>";  echo $row['comment'];  echo "</td>";
                            echo "</tr>";
                        }
                    }
                }
                else
                {
                    // failure! check for errors and do something else
                    $q = "select * from `comments` order by `comments`.`f_id` desc";
                    $res = mysqli_query($db, $q);
                    echo "<table class='table table-bordered'>";
                    while ($row = mysqli_fetch_assoc($res)) 
                    {
                        echo "<tr>";
                            echo "<td>";  echo $row['username'];  echo "</td>";
                            echo "<td>";  echo $row['comment'];  echo "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </div> 
    </div>
</body>
</html>