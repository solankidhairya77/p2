<?php
    include('../dbconnection.php');
    $con = mysqli_connect('localhost','root','','p1');
    
    $rollno=intval($_POST['rollno']);
    $name=$_POST['name'];
    $city=$_POST['city'];
    $parentcontact=intval($_POST['parentcontact']);
    $standard=intval($_POST['standard']);
    $id=$_POST['sid'];
    $imagename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$imagename");

    $con = mysqli_connect('localhost','root','','p1');
    $qry="UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `parentcontact` = '$parentcontact', `standard` = '$standard', `image` = '$imagename' WHERE `id` = $id;";
    $run=mysqli_query($con,$qry);

    if($run == TRUE)
    #if($con==true) 
    {
        ?>
            <script>
                alert('data inserted successfully');
                window.open('editform.php?sid=<?php echo $id;?>','_self');
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