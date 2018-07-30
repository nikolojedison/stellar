<html>
 <head>
 <title> find stars | pcg stellar database</title>
 <link rel="stylesheet" href="stellar-style.css">
 </head>
 <body>
 
<div id="navigation">
<p>pcg stellar database: <a href="index.html">home</a> | <a href="views.html">view</a> | <a href="find-star.html">find a star</a> | <a href="http://nikolaimallett.me/dbm">edit records</a></p>
</div>

<hr />

<p>

</p>


<br />

<?php
 $db = mysqli_connect('localhost','dbuser','dbpass','db')
 or die('Error connecting to MySQL server.');
 $query = $_GET['query']; 
 
        $query = htmlspecialchars($query); 
        
        $sql = "SELECT * FROM star WHERE (`HR` LIKE $query) OR (`GLON_GLAT` LIKE $query) OR (`Name` LIKE $query) OR (`MAG` LIKE $query) OR (`RAD` LIKE $query) OR (`MASS` LIKE $query)";
         
        $result = mysqli_query($db,$sql);
        $numrows = mysqli_num_rows($result);

        echo "<p>(finding HR, GLon/GLat, Name, Magnitude, Radius, or Mass like ";
        echo $query;
        echo "... done!)</p>";

        if($numrows > 0){ 
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Variable ID</th><th>GLon/GLat</th><th>Magnitude</th><th>Spectral Type</th><th>Radius</th><th>Mass</th></tr>";
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
            echo "</table>";
             
        }
        else{ // if there is no matching rows do following
            echo "<br />no results matching your search have been found.";
        }
mysqli_close($db);
?>

</body>
</html>
