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
    include('titlehead.php');
?>

<table align="center">
    <form action="updatestudent.php" method="post">
        <tr>
            <th>enter standard</th>
            <td><input type="number" name="standard" placeholder="enter standard" required="required" /></td>
        </tr>
        <tr>
            <th>enter name</th>
            <td><input type="text" name="stuname" placeholder="enter standard" required="required" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="search"/></td>
        </tr>
    </form>
</table>  

<table align="center" width="80%" border="2">
    <tr>
        <th>no</th>
        <th>image</th>
        <th>name</th>
        <th>rollno</th>
        <th>edit</th>
    </tr>


    <?php
        if(isset($_POST['submit']))
        {
            include('../dbconnection.php');
            $standard=$_POST['standard'];
            $name=$_POST['stuname'];
            $sql="SELECT * FROM `student` WHERE `standard`='$standard' AND `name` LIKE '%$name%'";
            $run=mysqli_query($con,$sql);

            if(mysqli_num_rows($run)<1)
            {
                echo "<tr><td>record not found</td></tr>";
            }
            else
            {
                $count=0;
                while($data=mysqli_fetch_assoc($run))
                {
                    $count++;  
                    ?>
                        <tr>
                            <th><?php echo $count;?></th>
                            <th><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;"/></th>
                            <th><?php echo $data['name']?></th>
                            <th><?php echo $data['rollno']?></th>
                            <th><a href="editform.php?sid=<?php echo $data['id']; ?>">edit</a></th>
                        </tr>
                    <?php
                }
            }
        }
    ?>
</table>