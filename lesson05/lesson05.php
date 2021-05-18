<?php

// 1〜10まで数値をランダムで生成し偶数か奇数かを判定
$num_random = rand(1,10);
echo '生成したランダム値 -> ' . $num_random . ' ';

if($num_random % 2 == 0) {
    echo '(偶数)<br />';
} else {
    echo '(奇数)<br />';
}

// テストの点数をランダムで生成し点数に応じて成績を表示
$num_exam = rand(1,100);

// 変数の初期値の空文字を削除
// $result = '';

if ($num_exam == 100) {
    $result = '満点';
} else if ($num_exam >= 80){
    $result = '優';
} else if ($num_exam >= 70){
    $result = '良';
} else if ($num_exam >= 50){
    $result = '可';
} else if ($num_exam >= 0){
    $result = '不可';
}

echo '得点は' . $num_exam . '点、テスト結果は' . $result . 'です。<br />';

// 2教科のテストの点数をランダムで生成し合格/不合格を表示
$subject1 = rand(1,100);
echo '1教科目: ' . $subject1 . '点<br />';
$subject2 = rand(1,100);
echo '2教科目: ' . $subject2 . '点<br />';
$subject_total = $subject1 + $subject2;

// 1教科目、2教科目ともに60点以上、
// もしくは両科目が130点以上、
// もしくは両科目が100点以上かつ1教科目もしくは2教科目が90点以上の場合に合格判定
// それ以外は不合格判定
if (($subject1 >= 60 && $subject2 >= 60) || $subject_total >= 130 || ($subject_total >= 100 && ($subject1 >= 90 || $subject2 >= 90))) {
    echo '結果 -> 合格';
} else {
    echo '結果 -> 不合格';
}

?>