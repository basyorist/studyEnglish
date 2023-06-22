<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スコア履歴</title>
</head>
<body>
    
    <?php
    $scoreFile = "data/scores.txt";
    // var_dump($scoreFile);
    // exit();
    echo '<a href="quiz.php">テストに戻る</a>';
    echo "<h1>スコア履歴</h1>";

    if (file_exists($scoreFile)) {
      //スコア履歴ファイルが存在する場合
        $scores = file($scoreFile);

        if ($scores === false || count($scores) === 0) {
          //スコア履歴がない場合
            echo "<p>スコア履歴はありません。</p>";
        } else {
          //スコア履歴がある場合
            echo "<table>";
            echo "<tr><th>名前</th><th>スコア</th></tr>";

            foreach ($scores as $scoreEntry) {
                [$name, $score] = explode(",", $scoreEntry);
                echo "<tr><td>{$name}</td><td>{$score}点</td></tr>";
            }

            echo "</table>";
        }
    } else {
        echo "<p>スコア履歴はありません。</p>";
    }
    ?>



 

</body>
</html>
