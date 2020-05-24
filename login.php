<?php   
    include('header.php');
?>

<?php
    session_start();
    if(isset($_SESSION['uid']))
     {
        header('location:admin/admindash.php');
    }
?>

<html lang="en_US">
    <head> 
        <!-- <meta charset="UTF-8"> -->
        <title>Admin login</title>
    </head>
    <body>
     <h3 align="right" style="margin-right:20px;"><a href="index.php">back to student Login</a></h3>
     <h1 align="center">Admin login</h1>
    
        <form method ="post" action="login.php">
            <table style="width:50%"; align="center">
                <tr>
                    <td align="right">Enter Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td align="right">Enter Password</td>
                    <td><input type="text" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"> <input type="submit" name="submit" value="login"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
    include('dbconnection.php');
    if (isset($_POST['submit']))
    {
        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        $qry = "SELECT * FROM `admin` WHERE `username`='$uname' AND `password`='$pwd'";
        $run = mysqli_query($con,$qry);
        $row = mysqli_num_rows($run);
      if($row<1)
        {
            ?>
                <script>
                    alert('username or password is incorrect: please check if you have entered your password or username correct');
                    window.open('login.php','_self');
                </script>
            <?php
        }
     else
        {
         $data = mysqli_fetch_assoc($run);
         $id = $data['id'];
         $_SESSION['uid']=$id; 
         header('location:admin/admindash.php');
        }
    }
?> 