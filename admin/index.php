<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUeDogPZhMsapYbMyCBMfchFwWy8U2gFGhIg&usqp=CAU">
    <style>
        li a {
            color: white;
            text-decoration: none;
            background-color: rgb(128, 7, 7);
            padding: 12px;
        }
        
        nav {
            float: right;
            /* give space between words */
            word-spacing: 30px;
            padding: 29px;
            padding-bottom: 10px;
        }
        
        nav li {
            display: inline-block;
            /* give space from top */
            line-height: 80px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/online-book-library-logo-design-template-6169b7966e7ca31f82476b27a426b8eb_screen.jpg?ts=1585147878" alt="logo" height="140vh">
            </div>

            <?php
            if($_SESSION['login_admin'])
            { ?>
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <li><a href="feedback.php">FEEDBACK</a></li>
                    </ul>
                </nav>
            <?php
            }
            else
            {?>
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="admin_login.php">LOGIN</a></li>
                        <li><a href="feedback.php">FEEDBACK</a></li>
                    </ul>
                </nav>
            <?php
            }
            ?>
            
        </header>
        <section>
            <div class="sec_img">
                <br>
                <div class="box">
                    <br><br><br>
                    <h1 style="font-size: 35px;">Welcome to Library</h1><br><br>
                    <h1 style="font-size: 25px;">Opens at: 09:00AM</h1><br>
                    <h1 style="font-size: 25px;">Closes at: 15:00PM</h1><br>
                </div>
            </div>
        </section>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>