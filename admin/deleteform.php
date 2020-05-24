<?php
    include('../dbconnection.php');
    $id=$_REQUEST['sid'];
    $qry="DELETE FROM `student` WHERE `id`='$id';";
    $run=mysqli_query($con,$qry);

    if($run == TRUE)
    #if($con==true) 
    {
        ?>
            <script>
                alert('user deleted successfully');
                window.open('deletestudent.php','_self');
            </script>
        <?php
    }
    else 
    {
        ?>
            <script>
                alert('not submitted');
            </script>
        <?php
    }
?>