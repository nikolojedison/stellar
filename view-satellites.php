<?php
//Step1
$db = mysqli_connect('localhost','dbuser','dbpass','db')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 <title> view satellites | pcg stellar database</title>
 <link rel="stylesheet" href="stellar-style.css">
 </head>
 <body>

<div id="navigation">
<p>pcg stellar database: <a href="index.html">home</a> | <a href="views.html">view</a> | <a href="find-star.html">find a star</a> | <a href="http://nikolaimallett.me/dbm">edit records</a></p>
</div>

<hr />

<p>
(querying satellites... done!)<br />
</p>

<br />

<?php
$sql = "SELECT * FROM `satellite`";
$result = mysqli_query($db,$sql);
$numrows = mysqli_num_rows($result);

echo "<table>";
echo "<tr><th>System Name</th><th>Object Name</th><th>Object Type</th><th>Distance From Star</th><th>Period</th><th>Satellites</th><th>Radius</th><th>Mass</th><th>Day</th><th>Object Use</th></tr>";
if ($numrows > 0) {
  while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $name = $row ['FNAME'];
    $oname = $row ['ONAME'];
    $type = $row ['TYPE'];
    $dist = $row ['DIST'];
    $per = $row ['PER'];
    $sat = $row ['SAT'];
    $rad = $row ['RAD'];
    $mass = $row ['MASS'];
    $day = $row ['DAY'];
    $objuse = $row ['OBJ_USE'];

    echo "<tr>";
    echo "<td>";
    echo $name;
    echo "</td>";
    echo "<td>";
    echo $oname;
    echo "</td>";
    echo "<td>";
    echo $type;
    echo "</td>";
    echo "<td>";
    echo $dist;
    echo "</td>";
    echo "<td>";
    echo $per;
    echo "</td>";
    echo "<td>";
    echo $sat;
    echo "</td>";
    echo "<td>";
    echo $rad;
    echo "</td>";
    echo "<td>";
    echo $mass;
    echo "</td>";
    echo "<td>";
    echo $day;
    echo "</td>";
    echo "<td>";
    echo $objuse;
    echo "</td>";
    echo "</tr>";
  }
}

echo "</table>";
mysqli_close($db);
?>

</body>
</html>
