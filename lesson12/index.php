<?php

// 変数名は付ける時にしっかり考える

// Hello World!の表示
echo 'Hello World!<br />';

// userテーブルから20名表示させる
$dsn = 'mysql:dbname=mzn;host=mzn_db'; // hostはlocalhostでない
$user = 'user';
$password = 'pass';

try{
    $dbh = new PDO($dsn, $user, $password);
    $s=$dbh->prepare('SELECT * FROM users LIMIT 20');
    $s->execute();

    while($result = $s->fetch(PDO::FETCH_ASSOC)){
        echo 'NAMEは' . $result['user_id'] . 'です。<br />';
        echo 'IDは' . $result['id'] . 'です。<br />';
    }
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
    die();
    $dbh = null;
}

// SQLを渡して実行し結果を返す関数を作成する
$sql_query = 'SELECT * FROM users LIMIT 20'; // データの量が膨大なため、上記の設問と同じLIMIT 20を使用

echo getSql($sql_query); // 関数の呼び出し

function getSql($sql_content) {
    $dsn = 'mysql:dbname=mzn;host=mzn_db';
    $user = 'user';
    $password = 'pass';

    try{
        $dbh = new PDO($dsn, $user, $password);
        $s=$dbh->prepare($sql_content);
        $s->execute();
    
        while($result = $s->fetch(PDO::FETCH_ASSOC)){
            echo 'id: ' . $result['id'] . '<br />';
            echo 'user_id: ' . $result['user_id'] . '<br />';
        }
    } catch (PDOException $e){
        echo 'Error:' . $e->getMessage();
        die();
        $dbh = null;
    }
}

// 作成したテーブルにレコードを追加する
$dsn = 'mysql:dbname=mzn;host=mzn_db';
$user = 'user';
$password = 'pass';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    echo 'Error:' . $e->getMessage();
    die();
    $dbh = null;
}

$fil = __DIR__ . '/sample.json';
$json = file_get_contents($fil);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);

$num_prefs = count($arr[0]); // 47
 for ($i = 1; $i <= $num_prefs; $i++) {
    $parse_str = strval($i);
    $num_str = $parse_str;

    if (strlen($i) == 1) {
        $num_str = '0' . $num_str;
    }

    $get_name = $arr[0][$num_str]['name'];
    $get_id = $arr[0][$num_str]['id'];

    // 北海道(01)、東北(02-07)、関東(08-14)、中部(15-23)、近畿(24-30)、中国(31-35)、四国(36-39)、九州(40-47)で設定
    $pref = null;
    if ($i == 1) {
        $pref = '北海道';
    } elseif($i <= 7) {
        $pref = '東北';
    } elseif($i <= 14) {
        $pref = '関東';
    } elseif($i <= 23) {
        $pref = '中部';
    } elseif($i <= 30) {
        $pref = '近畿';
    } elseif($i <= 35) {
        $pref = '中国';
    } elseif($i <= 39) {
        $pref = '四国';
    } elseif($i <= 47) {
        $pref = '九州';
    } else {
        $pref = 'エラー';
    }

$num_cities = count($arr[0][$num_str]['city']);

$stmt_large = $dbh->prepare("INSERT INTO large_area (name, prefecture_name, prefecture_id) values ('{$pref}', '{$get_name}', '')");
$stmt_pref = $dbh->prepare("INSERT INTO prefecture (prefecture_id, name) values ('{$get_id}', '{$get_name}')");
$stmt_large->execute();
$stmt_pref->execute();

for ($j = 0; $j < $num_cities; $j++) {
    $num_of_citycodes = $arr[0][$num_str]['city'][$j]['citycode'];
    $num_of_cities = $arr[0][$num_str]['city'][$j]['city'];
    $stmt_city = $dbh->prepare("INSERT INTO city (prefecture_id, name, citycode) values ('{$get_id}', '{$num_of_cities}', '{$num_of_citycodes}')");
    $stmt_city->execute();
    }
}

// 地方ごとの県を表示
$query_prefs=$dbh->prepare('SELECT * FROM prefecture');
$query_prefs->execute();

while($result = $query_prefs->fetch(PDO::FETCH_ASSOC)){
    if ($result['prefecture_id'] == 1) {
        $pref = '北海道';
    } elseif($result['prefecture_id'] <= 7) {
        $pref = '東北';
    } elseif($result['prefecture_id'] <= 14) {
        $pref = '関東';
    } elseif($result['prefecture_id'] <= 23) {
        $pref = '中部';
    } elseif($result['prefecture_id'] <= 30) {
        $pref = '近畿';
    } elseif($result['prefecture_id'] <= 35) {
        $pref = '中国';
    } elseif($result['prefecture_id'] <= 39) {
        $pref = '四国';
    } elseif($result['prefecture_id'] <= 47) {
        $pref = '九州';
    } else {
        $pref = 'エラー';
    }
    echo $pref . '地方の県は' . $result['name'] . 'です。<br />';
}

// 県ごとの区の数を表示
for ($k = 1; $k <= $num_prefs; $k++) {
    $stmt_city=$dbh->prepare('SELECT count(*) FROM city WHERE prefecture_id = ' . $k);
    $stmt_pref=$dbh->prepare('SELECT * FROM prefecture WHERE prefecture_id = ' . $k);
    $stmt_city->execute();
    $stmt_pref->execute();
    $result_count = $stmt_city->fetch(PDO::FETCH_ASSOC);
    $result_name = $stmt_pref->fetch(PDO::FETCH_ASSOC);
    echo $result_name['name'] . 'の市町村区の数は' . $result_count['count(*)'] . '<br />';
};

?>