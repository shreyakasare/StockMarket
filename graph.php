<?php
$connect=mysqli_connect("localhost","root","","stock");
$query="SELECT * FROM stock";
$result = mysqli_query($connect, $query);
$chart_data='';
while($row = mysqli_fetch_array($result))
{
	$chart_data ="{timestamp:".$row[timestamp].",high:".$row["profit"]." low:".$row["low"].", volume:".$row["volume"]."},";
	$chart_data = substr($chart_data, 0, -2);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"
	>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<br> <br>
<div class="container" style="width:900px;"></div>
<h2 align="center"></h2>
</body>


<script>
Morris.Line({
	element : 'chart',
	data:[<?php echo $chart_data; ?>],
	xkey:'timestamp',
	ykeys:['high','low','volume'],
	labels:['high','low','volume'],
	hideHover:'auto'
});
</script>
</html>