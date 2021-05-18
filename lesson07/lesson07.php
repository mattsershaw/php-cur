<?php

// 掛け算の九九の表示
for ($first_row = 1; $first_row <= 9; $first_row++) {
    for ($second_row = 1; $second_row <= 9; $second_row++) {
        $result = $first_row * $second_row;
        echo $first_row . ' * ' . $second_row . ' = ' . $result . "<br />";
    }
}

// 配列
$emp = ['山田' => ['age' => '20','pref' => '東京'],
        '田中' => ['age' => '23','pref' => '神奈川'],
        '佐藤' => ['age' => '24','pref' => '埼玉'],
        '鈴木' => ['age' => '25','pref' => '千葉']
        ];

// 上記の配列から名前、年齢、出身を表示(修正済)
foreach ($emp as $name => $array_info) {
    echo 'name: ' . $name . '<br />';
    echo 'age: ' . $array_info['age'] . '<br />';
    echo 'pref: ' . $array_info['pref'] . '<br />';
}

// 1〜50までの3が付く数字と3の倍数だけの配列を作成、出力(修正済)
$get_num3 = [];

for ($first_row = 1; $first_row <= 50; $first_row++) {
    if ($first_row % 3 == 0 || preg_match('/3/', (string) $first_row)) {
        array_push($get_num3, $first_row);
    }
}
foreach ($get_num3 as $result) {
    echo $result . ' ';
}
echo '<br />';

// 名前と出身地だけの連想配列を作成し、表示
$init = [];

foreach ($emp as $key => $val) {
    $array = array('name' => $key, 'pref' => $val['pref']);
    array_push($init, $array);
}

echo '<pre>';
var_dump($init);
echo '</pre>';

?>