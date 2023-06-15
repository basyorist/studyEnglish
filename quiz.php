<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
  <?php

$questions = array(
    array(
        'question' => 'I am a student.の否定文を書こう。',
        'choices' => array(
            'I don\'t a student.',
            'I am not a student.',
            'I am don\'t a student.',
            'I am not a student?'
        ),
        'correctAnswer' => 1
    ),
    array(
        'question' => 'You study English hard.の疑問文を書こう。',
        'choices' => array(
            'Are you study English hard?',
            'You do study English hard?',
            'Do you study English hard?',
            'Are do you study English hard?'
        ),
        'correctAnswer' => 2
    ),
    array(
        'question' => 'I like soccer.の否定文を書こう。',
        'choices' => array(
            'I am don\'t soccer.',
            'I do not like soccer.',
            'I am not like soccer.',
            'I like not soccer.'
        ),
        'correctAnswer' => 1
    ),
    array(
        'question' => 'When do you play the video game?の正しい答え方を選びなさい。',
        'choices' => array(
            'I am play the video in my room.',
            'I am play the video game in my room.',
            'I play the video game after dinner.',
            'I play the video geme in my room.'
        ),
        'correctAnswer' => 2
    ),
    array(
        'question' => 'Is JOJO\'S BIZARRE ADVENTURE very famous in the world?',
        'choices' => array(
            'ジョジョの人気は世界一ィィィィィイイ。',
            '占い師のわたしに予言で闘おうなどとは10年は早いんじゃあないかな。',
            'そして...やれやれ、間に合ったぜ。',
            'Yes, it is.'
        ),
        'correctAnswer' => 3
    )
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $score = 0;

    foreach ($questions as $index => $question) {
        $selectedAnswer = $_POST['answer' . $index];
        if ($selectedAnswer == $question['correctAnswer']) {
            $score += 10;
        }
    
    }



    echo "<h1>結果</h1>";
    echo "<h2>名前: $name</h2>";
    echo "<h3>スコア: $score / 50</h3>";
    echo '<button onclick="location.href=\'score_history.php\'">得点履歴を見る</button>';
} else {
    echo "<h1>中１英文法①</h1>";
    echo "<form method=post action=input.php>";
    
     echo "<label for=\"name\">名前:</label>";
    echo "<input type=\"text\" id=\"name\" name=\"name\" required><br><br>";

    foreach ($questions as $index => $question) {
        echo "<p>{$question['question']}</p>";
        foreach ($question['choices'] as $choiceIndex => $choice) {
            echo "<input type='radio' id='answer{$index}_{$choiceIndex}' name='answer{$index}' value='{$choiceIndex}' required>";
            echo "<label for='answer{$index}_{$choiceIndex}'>{$choice}</label><br>";
        }
        echo "<br>";
    }

    echo "<input type=\"submit\" value=\"回答する\">";
    echo "</form>";
}
?>



</body>
</html>