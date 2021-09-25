<?php
    $symbol = $_REQUEST['symbol'];
    $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=".$symbol."&apikey=WKJFL11AHEZLEEOV&datatype=csv";
    $data = file_get_contents($url);
    
    $row = explode("\n", $data);
    $count = count($row)-1;
    for($x=0; $x< $count; $x++)
    {
        $day[] = explode(",", $row[$x]);
    }
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo $day[0][0]?></th>
            <th><?php echo $day[0][1]?></th>
            <th><?php echo $day[0][2]?></th>
            <th><?php echo $day[0][3]?></th>
            <th><?php echo $day[0][4]?></th>
            <th><?php echo $day[0][5]?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        for($x=1; $x< $count; $x++)
        {
            $day[] = explode(",", $row[$x]);
            echo "<tr>";
            echo "<th>".$x."</th>";
            echo "<td>".$day[$x][0]."</td>";
            echo "<td>".$day[$x][1]."</td>";
            echo "<td>".$day[$x][2]."</td>";
            echo "<td>".$day[$x][3]."</td>";
            echo "<td>".$day[$x][4]."</td>";
            echo "<td>".$day[$x][5]."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
