<?php

// 変数の上書き
$num = 10;
echo $num . "\n"; // 結果 10
$num = 15;
echo $num . "\n"; // 結果 15

// 変数に変数を代入
$num = 0;
$num = $num + 10;
echo $num . "\n"; // 結果 10

// インクリメント
$num = 1;
$num++;
echo ++$num . "\n"; // 結果 3
echo $num++ . "\n"; // 結果 3
echo $num . "\n"; // 結果 4

?>