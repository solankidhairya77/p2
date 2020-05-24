<?php
    function showdetails($standard,$rollno)
    {
        include('dbconnection.php');
        $sql="SELECT * FROM `student` WHERE `rollno` = '$rollno' AND `standard` = '$standard'";
        $run=mysqli_query($con,$sql);
        if(mysqli_num_rows($run)>0)
        {
            $data=mysqli_fetch_assoc($run);
            ?>
            <table border="3" align="center">
                    <tr>
                        <th colspan="3">student details</th>       
                    </tr>
                    <tr>
                        <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>"/></td>
                        <th>roll no</th>
                        <td><?php echo $data['rollno']; ?></td>    
                    </tr>
                    <tr>
                        <th>name</th>
                        <td><?php echo $data['name']; ?></td>    
                    </tr>
                    <tr>
                        <th>city</th>
                        <td><?php echo $data['city']; ?></td>    
                    </tr> 
                    <tr>
                        <th>parentcontact</th>
                        <td><?php echo $data['parentcontact']; ?></td>    
                    </tr>
                    <tr>
                        <th>standard</th>
                        <td><?php echo $data['standard']; ?></td>    
                    </tr>  
                </table>
            
             
            
            
            
         }
        else
        {
            <?php echo "no data found"; ?>    
        }

        }


    }

?>