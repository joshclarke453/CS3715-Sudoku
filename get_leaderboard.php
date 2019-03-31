<?php
$con = mysqli_connect('localhost','root','********','leaderboard');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"leaderboard");
$sql= "SELECT * FROM ranking ORDER BY time ASC limit 10";
$result = mysqli_query($con,$sql);

echo "<table id='lbtable'>
<tr>
<th id='lbth'>time</th>
<th id='lbth'>name</th>
<th id='lbth'>diff</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td id='lbtd'>" . $row['time'] . "</td>";
    echo "<td id='lbtd'>" . $row['name'] . "</td>";
	echo "<td id='lbtd'>" . $row['difficulty'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
