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

    $sid = $_GET['sid'];
    $qry = "SELECT * FROM `student` WHERE `id`='$sid'";
    $run = mysqli_query($con,$qry);
    $data = mysqli_fetch_assoc($run);
?>

<form method="post" action="updatedata.php" enctype="multipart/form-data">
<table align="center" border="2" style="widht:70; margin-top:40px;">
    <tr>
        <td>roll no</td>
        <td><input type="text" name="rollno" value=<?php echo $data['rollno'];?> required></td>
    </tr>
    <tr>
        <td>fullname</td>
        <td><input type="text" name="name" value=<?php echo $data['name'];?> required></td>
    </tr>    
    <tr>
        <td>city</td>
        <td><input type="text" name="city" value=<?php echo $data['city'];?> required></td>
    </tr>
    <tr>
        <td>parentcontact</td>
        <td><input type="text" name="parentcontact" value=<?php echo $data['parentcontact'];?> required></td>
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
            value=<?php echo $data['standard'];?>
            </select>
        </td>
    </tr>
    <tr>
        <td>image</td>
        <td><input type="file" name="image" required></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
            <input type="submit" name="submit">
        </td>
    </tr>
</table>
</body>