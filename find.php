<?php
//  <?php $db = mysqli_connect('localhost:3308','root','','shop')
$con= mysqli_connect("localhost", "root", "", "stock");
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$compnay = $_REQUEST['name'];
$sql = "Select * from company where name LIKE '%$compnay%'";

if($result= mysqli_query($con, $sql))
{
    $i=1;
    while ($row= mysqli_fetch_row($result))
    {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[0]."</td>";
        echo "</tr>";
        $i++;
        
    }
}

mysqli_close($con);
?>
//compare company symbol from name