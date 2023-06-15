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
    
    }}

/*-------------------------------------------------------------------------------------------*/
//データ入力機構
// データ1件を1行にまとめる（最後に改行を入れる）

// スコアを保存
$scoreData = $name . ',' . $score . "\n";
/*-------------------------------------------------------------------------------------------*/
//確認
/*
var_dump($scoreData);
exit;
*/
/*-------------------------------------------------------------------------------------------*/
// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/scores.txt','a');
// ファイルをロックする
flock($file, LOCK_EX);
// 指定したファイルに指定したデータを書き込む
fwrite($file, $scoreData);
//file_put_contents('scores.txt', $scoreData, FILE_APPEND);
// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);
header("Location:score_history.php");
/*-------------------------------------------------------------------------------------------*/
?>