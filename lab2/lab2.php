<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Lab 2</title>

<style type = "text/css">
.even {background-color:#0099cc}

body{background-color: black; color: white}
table{margin:0 auto}
td{padding:10px; border:white 1px solid}
h3,h5{text-align: center; color:white}

</style>
</head>

<body>
  <?php
  $cols = 10;
  $even = 0;
  $odd = 0;

  echo "<table border = \"1\">";
  for ($i = 0; $i < 10; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++)
    {
      $randNum = rand(1,100);
      if ($randNum % 2 == 0)
      {
        echo "<td class = 'even'>$randNum</td>";
        $even++;
      }
      else
      {
        echo "<td>$randNum</td>";
        $odd++;
      }
    }
    echo "</tr>";
  }
  echo "</table>";
  echo "<h3>There are $even even numbers and $odd odd numbers.</h3>";
  echo "<h3>There are $even % even numbers and $odd % odd numbers.</h3>";
  ?>
  <h5>Hit refresh to change.</h5>
</body>
</html>
