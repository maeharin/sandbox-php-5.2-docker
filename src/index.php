<?php

echo 'hello!';

$conn = mysql_connect('localhost', 'root', '') or die('db connect error' . mysql_error());
mysql_select_db('employees') or die ('use db error' . mysql_error());

/**
 * departments
 */
echo "<h1>departments</h1>";

$sql = "select * from departments";
$rs = mysql_query($sql, $conn);
while($item = mysql_fetch_assoc($rs))
{
    echo "<h2>${item['dept_name']}</h2>";
    var_dump($item);
}

mysql_close($conn);
