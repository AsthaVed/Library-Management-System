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
    <title>ChatBox</title>
    <style>
        body
        {
        background-image: url("https://source.unsplash.com/1000x710/?message");
        }

        .wrapper
        {
            height: 600px;
            width: 500px;
            background-color: black;
            opacity: .9;
            color: white;
            margin: -20px auto;
            padding: 10px;
        }
        .form-control
        {
            height: 46px;
            width: 76%;
            margin-right: 6px;
        }

        .msg
        {
            height: 450px;
            overflow-y : scroll;
        }

        .btn-info
        {
            background-color: #02c5b6;
        }

        .chat
        {
            display: flex;
            flex-flow: row wrap;
        }

        .user .chatbox
        {
            height: 50px;
            width: 400px;
            padding: 13px 10px;
            background-color: #821b69;
            border-radius: 10px;
            order: -1;
        }

        .admin .chatbox
        {
            height: 50px;
            width: 400px;
            padding: 13px 10px;
            background-color: #423471;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['submit']))
        {
            mysqli_query($db, "insert into `library`.`message` values ('', '$_SESSION[login_user]', '$_POST[message]', 'no', 'student');");
        }
        else
        {
            $res = mysqli_query($db, "select * from message where username='$_SESSION[login_user]';");
        }
    ?>

   <div class="wrapper">
        <div style="height: 70px; width: 100%; background-color: #2eac8b; text-align:center;">
            <h3 style="margin-top: -5px; padding: 15px;">Admin</h3>
        </div>
        <div class="msg">
            <br>
            <?php
                while($row = mysqli_fetch_assoc($res))
                {
                    echo "<pre>"; print_r($row);
                    exit();
                    if($row['sender'] == 'student')
                    {
            ?>
                        <!-- ___________________________________________________student___________________________________________________________ -->
                        <div class="chat user">
                            <div style="float: left; padding-top: 5px;"> &nbsp; 
                                <?php
                                // Define user image and name using php with html img tag
                                echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['admin_pic']."'>";
                                ?> &nbsp;
                            </div>
                            <div style="float: left;" class="chatbox">
                                <!-- <p>Hello! This is Student.</p> -->
                                <?php
                                    echo "mvv";
                                ?>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
            ?>
            <!-- ___________________________________________________admin___________________________________________________________ -->
            <div class="chat admin">
                <div style="float: left; padding-top: 5px;"> &nbsp; 
                    <img style="border-radius: 50%;" src="images/picture.png" alt="pic" height="40px" width="40px">
                &nbsp;
                </div>
                <div style="float: left;" class="chatbox">
                    <p>Hello! This is Admin.</p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div style="height: 100px; padding-top: 10px;">
            <form action="" method="post">
                <input type="text" name="message" class="form-control" required="" placeholder="Write message..." style="float: left;">
                <button class="btn btn-info btn-lg" name="submit" type="submit"><span class="glyphicon glyphicon-send"></span> &nbsp; Send</button>
            </form>
        </div>
   </div> 

</body>
</html>