<?php
  $error1 = "";
  $error2 = "";
  $inches = "";
  $cms = "";
  $result = "";
  if(isset($_GET['cm']))
  {
    $cm = $_GET['cm'];
    if(is_numeric($cm))
    {
      $inches = $cm * 0.393701;
    }
    else
    {
      $error1 = "Not a number. Please enter a number.";
    }
  }

  if(isset($_GET['input']))
  {
    $input = $_GET['input'];
    if(is_numeric($input) && isset($_GET['unit']))
    {
      $unit = $_GET['unit'];

      switch ($unit)
      {
        case 'cms':
          $result = $input * 2.54;
          break;
        case 'yards':
          $result = $input / 36;
          break;
        case 'feet':
          $result = $input / 12;
          break;
        case '': $result = "Please choose a unit to convert!";
        default:
          break;
      }
    }
    else
    {
      $error2 = "You must enter a number and check one of three options.";
    }
  }

 ?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Lab3</title>
<style type = "text/css">
@font-face {font-family: JosefinSans-Bold; src: url(JosefinSans-Bold.ttf);}
body {background-color: black; color: white; font-family: sans-serif;}
h1 {color:#0099cc; font-family: JosefinSans-Bold}
</style>

</head>

<body>
  <div>
    <h1>Length Converter</h1>
    <form method="get">
      Enter Centimeters: <input type="text" name="cm">
      <input type="submit" value="Convert to Inches">
    </form>
    <?php
    if($inches<>"")
    {
      echo"$inches Inches";
    }
    else
    {
      echo $error1;
    }
     ?>
     <br>
     <form method="get">
       Enter Inches: <input type="text" name="input"> <br>
       Convert to:
       <input type="radio" name="unit" value="cms"/> Centimeters
       <input type="radio" name="unit" value="yards"/> Yards
       <input type="radio" name="unit" value="feet"/> Feet

       <input type="submit" value="Convert">
     </form>
     <?= $result ?>
     <?= $error2 ?>
   </div>
</body>
</html>
