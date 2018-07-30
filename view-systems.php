<?php
//Step1
$db = mysqli_connect('localhost','dbuser','dbpass','db')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 <title> view systems | pcg stellar database</title>
 <link rel="stylesheet" href="stellar-style.css">
 </head>
 <body>
 
<div id="navigation">
<p>pcg stellar database: <a href="index.html">home</a> | <a href="views.html">view</a> | <a href="find-star.html">find a star</a> | <a href="http://nikolaimallett.me/dbm">edit records</a></p>
</div>

<hr />


<p>
(querying systems... done!)<br />
</p>

<br />

<?php
$sql = "SELECT * FROM `system`";
$result = mysqli_query($db,$sql);
$numrows = mysqli_num_rows($result);

echo "<table>";
echo "<tr><th>Faction Name</th><th>ID</th><th>Faction</th><th>GLon/GLat</th><th>Satellites</th><th>Status</th><th>System Use</th><th>Population</th></tr>";
if ($numrows > 0) {
  while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $name = $row ['FNAME'];
    $id = $row ['HR'];
    $fact = $row ['FACT'];
    $gloc = $row ['GLON_GLAT'];
    $sat = $row ['SAT'];
    $sts = $row ['STS'];
    $sysusage = $row ['SYS_USAGE'];
    $pop = $row ['POP'];

    echo "<tr>";
    echo "<td>";
    echo $name;
    echo "</td>";
    echo "<td>";
    echo $id;
    echo "</td>";
    echo "<td>";
    echo $fact;
    echo "</td>";
    echo "<td>";
    echo $gloc;
    echo "</td>";
    echo "<td>";
    echo $sat;
    echo "</td>";
    echo "<td>";
    echo $sts;
    echo "</td>";
    echo "<td>";
    echo $sysusage;
    echo "</td>";
    echo "<td>";
    echo $pop;
    echo "</td>";
    echo "</tr>";
  }
}

echo "</table>";
mysqli_close($db);
?>

</body>
</html>
