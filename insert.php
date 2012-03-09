<html>
<body>

<div id="fields" style="width:150px;float:left;">
<form action="insert.php" method="post">
Firstname:<br /> <input type="text" name="firstname" /><br />
Lastname:<br /> <input type="text" name="lastname" /><br />
Age:<br /> <input type="text" name="age" /><br />
<input type="submit" value="Add Row" />
</form>

<form action="insert.php" method="post">
First Name:<br /> <input type='text' name='deleteObject' /><br />
<input type="submit" value="Delete Row" />
</form>
</div>

<?php
$con = mysql_connect("localhost","root");
if (!$con)
  {
  die( mysql_error());
  }

mysql_select_db("my_db", $con);


$sql="INSERT INTO Persons (FirstName, LastName, Age)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_query("DELETE FROM Persons WHERE FirstName=''");
mysql_query("DELETE FROM Persons WHERE FirstName='$_POST[deleteObject]'");
$result = mysql_query("SELECT * FROM Persons");

echo '<div id="table" style="float:left;">';
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "</div>";


mysql_close($con);
?>


</body>
</html>
