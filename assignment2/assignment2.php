<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 2</title>

<style type = "text/css">
@font-face {font-family: JosefinSans-Bold; src: url(JosefinSans-Bold.ttf);}
#highlight {color:#0099cc; display: inline}
.format1 {background-color:#0099cc; font-size: 20px}
.format2{color:#0099cc; font-size: 30px}
.format3{font-style: oblique; font-size: 40px; color: grey}
.format4{font-size: 40px; color: white}

#hiddenWord{display:none}
.format1:hover #hiddenWord{display:block}
.format1:hover #japanese{color:#0099cc}

.format2:hover #hiddenWord{display:block}
.format2:hover #japanese{color:black}

.format3:hover #hiddenWord{display:block}
.format3:hover #japanese{color:black}

.format4:hover #hiddenWord{display:block}
.format4:hover #japanese{color:black}

body{background-color: black; color: white}
table{margin:0 auto}
td{padding:10px; border:white 1px solid; text-align: center;font-family: sans-serif;}
h1,h3{text-align: center; color:white; font-family: JosefinSans-Bold;}

</style>
</head>

<body>
<h1>Japanese Reading Practice</h1>
<h3>(Roll over word to see English pronounciation. Hit <div id = "highlight">refresh</div> to change.)</h3>
  <?php
    $japaneseWords = "トイレ 手洗い 助けて わかりません やめて 英語 服 死にそう 警察 危ない 危険 どうした どうして なに 時間 質問 だれ いつ 先生 学生 会社員 人 私 あなた ホテル どこ 空港 駅 日本 大学 本屋 まんが喫茶 タクシー 家 おなかすいた 食べます 食べません 飲みます 飲みません 水 飲み物 食べ物 美味しい 不味い レストラン コンビニ スーパー ありがとうございます すみません ごめんなさい";
    $englishWords = "toire tearai tasukete wakarimasen yamete eigo fuku shini-sou keisatsu abunai kiken doushita doushite nani jikan shitsumon dare itsu sensei gakusei kaishain hito watashi anata hoteru doko kuukou eki nippon daigaku honya manga-kissa takushi ie onaka-suita tabemasu tabemasen nomimasu nomimasen mizu nomimono tabemono oishii mazui resutoran konbini suupaa arigatougozaimasu sumimasen gomennasai";
    $japaneseWordsArray = explode(" ", $japaneseWords);
    $englishWordsArray = explode(" ", $englishWords);
    $index = 0;

    echo "<table border = \"1\">";
    for ($i = 0; $i < 10; $i++)
    {
      echo "<tr>";
      for ($j = 0; $j < 5; $j++)
      {
        $index = rand(0, 49);
        if ($index % 2 == 0)
        {
          echo "<td class = 'format1'><div id = \"japanese\">$japaneseWordsArray[$index]</div><div id = \"hiddenWord\">$englishWordsArray[$index]</div></td>";

        }
        else if ($index % 3 == 0)
        {
          echo "<td class = 'format2'><div id = \"japanese\">$japaneseWordsArray[$index]</div><div id = \"hiddenWord\">$englishWordsArray[$index]</div></td>";
        }
        else if ($index % 5 == 0)
        {
          echo "<td class = 'format3'><div id = \"japanese\">$japaneseWordsArray[$index]</div><div id = \"hiddenWord\">$englishWordsArray[$index]</div></td>";
        }
        else
        {
          echo "<td class = 'format4'><div id = \"japanese\">$japaneseWordsArray[$index]</div><div id = \"hiddenWord\">$englishWordsArray[$index]</div></td>";
        }
      }
      echo "</tr>";
    }
    echo "</table>";
   ?>
</body>
</html>
