<?php
if(isset($_POST['user_name']))
{
        session_start();
        $_SESSION['name']=$_POST['user_name'];
        //Storing the name of user in SESSION variable.
        header("location: profile.php");
}
?>
<html>
        <head>
                <title>Session Handling in PHP - CodeforGeek Demo's</title>
                </head>
                <body>
                        <form action="" method="post" id="main_form">
                                <input type="text" name="user_name" size="40"><br />
                                <input type="submit" value="Log in">                            
                        </form><br><br>                      
                </body>
</html>
