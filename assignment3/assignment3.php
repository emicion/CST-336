<?php
$germanWords = array("Elefant","Kartoffel","Coffe","Land","Mann","Planet","Computer","Menschlich","Schwamm");
$spanishWords = array("Elefante","Patata","Café","País","Hombre","Planeta","Computadora","Humano","Esponja");
$frenchWords = array("Éléphant","Pomme de terre","Café","Pays","Homme","Planète","Ordinateur","Humain","Éponge");
$japaneseWords = array("象","じゃがいも","コーヒー","国","おとこ","惑星","コンピューター","人間","スポンジ");

$translatedWord = "";
$index = 0;
$language = "";
$word = "";
$sameWordMessage = "";

if(isset($_GET['language']) && isset($_GET['word']))
{
  $language = $_GET['language'];
  $word = $_GET['word'];
  $trimmedWord = substr($word, 2);
  $index = (int)$word[0] - 1;


  switch ($language)
  {
    case 'Spanish':
    $translatedWord = $spanishWords[$index];
    break;
    case 'French':
    $translatedWord = $frenchWords[$index];
    break;
    case 'Japanese':
    $translatedWord = $japaneseWords[$index];
    break;
    case 'German':
    //Array function 1
    if (in_array($trimmedWord, $germanWords))
    {
      $sameWordMessage = "The translation is actually the same!";
    }
    $translatedWord = $germanWords[$index];
    break;
    default:
    break;

  }
}

 ?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 3</title>
<style>
body {background-color: black; color: white}
h1 {color: #0099cc}
</style>

</head>

<body>
<h1>Translator</h1>
  <?php
    //Array function 2
    $allWords = array_merge($germanWords,$spanishWords,$frenchWords,$japaneseWords);
    //Array function 3
    echo "There are " . sizeof($allWords) . " translations available for the following 9 selectable words.";
   ?>
   <br><br>
  <form method = "get">
    Choose a word<select name = "word">
      <option>1.Elephant</option>
      <option>2.Potato</option>
      <option>3.Coffee</option>
      <option>4.Country</option>
      <option>5.Man</option>
      <option>6.Planet</option>
      <option>7.Computer</option>
      <option>8.Human</option>
      <option>9.Sponge</option>
    </select><br>
    Spanish<input type = "radio" name = "language" value = "Spanish">
    German<input type = "radio" name = "language" value = "German">
    French<input type = "radio" name = "language" value = "French">
    Japanese<input type = "radio" name = "language" value = "Japanese"><br>
    <input type = "submit" value = "Translate">
    <br>


  </form>
  <?= substr($word, 2) ?>
  <?php
  if ($translatedWord != "")
  {
    echo "in";
  }
  ?>
  <?= $language ?>
<?php
  if ($translatedWord != "")
  {
    echo " is";
  }
  ?>
  <?= $translatedWord ?><br><br>
  <?php
  if ($sameWordMessage != "")
  {
    echo $sameWordMessage . "<br><br>";
  }
  //Array Function 4
  shuffle($allWords);
  //Array Function 5
  for ($i = 0; $i < count($allWords); $i++)
  {
    echo $allWords[$i] . " ";
  }
   ?>

</body>
</html>
