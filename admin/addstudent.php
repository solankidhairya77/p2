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
    include('../dbconnection.php');
?>

<form method="post" action="addstudent.php" enctype="multipart/form-data">
<table align="center" border="2" style="widht:70; margin-top:40px;">
    <tr>
        <td>roll no</td>
        <td><input type="text" name="rollno" required></td>
    </tr>
    <tr>
        <td>fullname</td>
        <td><input type="text" name="name" required></td>
    </tr>    
    <tr>
        <td>city</td>
        <td><input type="text" name="city" required></td>
    </tr>
    <tr>
        <td>parentcontact</td>
        <td><input type="text" name="parentcontact" required></td>
    </tr>        
    <tr>
        <td>standard</td>
        <td>
            <select name="standard">
            <option value="1">1st</option>
            <option value="2">2nd</option>
            <option value="3">3rd</option>
            <option value="4">4th</option>
            <option value="5">5th</option>
            <option value="6">6th</option>
            <option value="7">7th</option>
            <option value="8">8th</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>image</td>
        <td><input type="file" name="image" required></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit"></td>
    </tr>
</table>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        include('../dbconnection.php');
        $con = mysqli_connect('localhost','root','','p1');
        
        $rollno=intval($_POST['rollno']);
        $name=$_POST['name'];
        $city=$_POST['city'];
        $parentcontact=intval($_POST['parentcontact']);
        $standard=intval($_POST['standard']);
        $imagename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        move_uploaded_file($tempname,"../dataimg/$imagename");

        $con = mysqli_connect('localhost','root','','p1');
        $qry="INSERT INTO `student`(`rollno`, `name`, `city`, `parentcontact`, `standard`,`image`) VALUES ('$rollno','$name','$city','$parentcontact','$standard','$imagename')";
        $run=mysqli_query($con,$qry);

        if($run == TRUE)
        #if($con==true) 
        {
            ?>
                <script>
                    alert('data inserted successfully');
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
    }
?>