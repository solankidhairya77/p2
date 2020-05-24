<?php
    session_start();
    if(isset($_SESSION['uid']))
    {
        echo "";
    }
    else
    {
        header('location ../login.php');
    }
?>

<?php
    include('header.php');
?>
    <div class="admintitle">
        <h4><a href="logout.php" style="float:right; " >logout</a></h4>
        <h1 align="center" >welcome to admin dashboard</h1>
    </div>

    <div class="dashbord">
        <table align="center">
            <tr>
                <td>1.</td><td><a href="addstudent.php">Insert student detail</a></td>
            </tr>
            <tr>
                <td>2.</td><td><a href="updatestudent.php">Update student detail</a></td>
            </tr>
            <tr>
                <td>3.</td><td><a href="deletestudent.php">Delete student detail</a></td>
            </tr>
        </table>
    </div>

    </body>
</html> 