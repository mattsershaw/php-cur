<?php

// 価格を渡し税込価格を返す関数を作成(編集済)
function calculate($arg) {
    if (isset($arg) && is_numeric($arg)) {
        $total =  $arg * 1.1;
        return '税込価格: ' . $total . '円';
    } elseif(is_null($arg) || empty($arg)) {
        echo '引数がありません';
    } else {
        echo '引数が数値ではありません';
    }
}

$test1 = 1000;
$test2 = 'テスト';
$test3 = null;
$test4 = '';
$test5 = '1000';
echo calculate($test1) . '<br />';
echo calculate($test2) . '<br />';
echo calculate($test3) . '<br />';
echo calculate($test4) . '<br />';
echo calculate($test5) . '<br />';
  
// 空の場合OK、空でない場合はNGと表示する処理
function if_empty($val) {
    if (empty($val)) {
        return 'OK';
    } else {
        return 'NG';
    }
}

$test1 = null;
$test2 = 1;
echo if_empty($test1) . '<br />';
echo if_empty($test2) . '<br />';
  
// 配列の場合はOK、配列でない場合はNGと表示する処理
function if_array($val) {
    if (is_array($val)) {
        echo 'OK';
    } else {
        echo 'NG';
    }
}

$test1 = [1, 2, 3, 4, 5];
$test2 = 1;
echo if_array($test1) . '<br />';
echo if_array($test2) . '<br />';

?>