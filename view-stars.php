<?php
//Step1
$db = mysqli_connect('localhost','dbuser','dbpass','db')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 <title> view stars | pcg stellar database</title>
 <link rel="stylesheet" href="stellar-style.css">
 </head>
 <body>
 
<div id="navigation">
<p>pcg stellar database: <a href="index.html">home</a> | <a href="views.html">view</a> | <a href="find-star.html">find a star</a> | <a href="http://nikolaimallett.me/dbm">edit records</a></p>
</div>

<hr />

<p>
(querying stars... done!)<br />
</p>

<br />

<?php
$sql = "SELECT * FROM `star`";
$result = mysqli_query($db,$sql);
$numrows = mysqli_num_rows($result);

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Variable ID</th><th>GLon/GLat</th><th>Magnitude</th><th>Spectral Type</th><th>Radius</th><th>Mass</th></tr>";
if ($numrows > 0) {
  while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $id = $row ['HR'];
    $name = $row ['Name'];
    $gloc = $row ['GLON_GLAT'];
    $mag = $row ['MAG'];
    $varid = $row ['VarID'];
    $stype = $row ['STYPE'];
    $rad = $row ['RAD'];
    $mass = $row ['MASS'];

    echo "<tr>";
    echo "<td>";
    echo $id;
    echo "</td>";
    echo "<td>";
    echo $name;
    echo "</td>";
    echo "<td>";
    echo $varid;
    echo "</td>";
    echo "<td>";
    echo $gloc;
    echo "</td>";
    echo "<td>";
    echo $mag;
    echo "</td>";
    echo "<td>";
    echo $stype;
    echo "</td>";
    echo "<td>";
    echo $rad;
    echo "</td>";
    echo "<td>";
    echo $mass;
    echo "</td>";
    echo "</tr>";
  }
}

echo "</table>";
mysqli_close($db);
?>

</body>
</html>
