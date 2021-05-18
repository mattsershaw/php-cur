<?php

// jsonファイルを読み込んで各都道府県名を表示させる(修正済)
$fil = __DIR__.'/sample.json'; // phpではjson形式のデータをそのまま扱うことができない(同じディレクトリ内に入れる)
$json = file_get_contents($fil);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true); // trueがあることによって連想配列になる
$num_prefs = count($arr[0]); // 47

// for文でのコード(コード量削減)
for ($i = 1; $i <= $num_prefs; $i++) {
    echo $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
}

// 配列にセットして表示させる(課題2)(修正済)

// foreach文でのコード
$array = [];
$cities = [];

foreach($arr[0] as $pref) {
    $cities=null;
    foreach($pref['city'] as $city) {
        $cities[]=$city['city'];
        $array[$pref['name']]=$cities;
    }
}

echo '<pre>';
var_dump($array);
echo '</pre>';

// for文でのコード(コード量削減)
$array = [];
$cities = [];

for ($i = 1; $i <= $num_prefs; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    $array = $array + array($arr[0][sprintf('%02d', $i)]['name'] => null);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $array[$arr[0][sprintf('%02d', $i)]['name']] = $cities;
    $cities = [];
}

echo '<pre>';
var_dump($array);
echo '</pre>';

// 配列にセットして表示させる(課題3)
// 北海道(01)、東北(02-07)、関東(08-14)、中部(15-23)、近畿(24-30)、中国(31-35)、四国(36-39)、九州(40-47)
$japan = array('北海道地方'=> null, '東北地方'=> null, '関東地方'=> null, '中部地方'=> null, '近畿地方'=> null, '中国地方'=> null, '四国地方'=> null, '九州地方'=> null);
$hokkaido = array('県名'=> null, '市町村名'=> null);
$tohoku = array('県名'=> null, '市町村名'=> null);
$kanto = array('県名'=> null, '市町村名'=> null);
$chubu = array('県名'=> null, '市町村名'=> null);
$kinki = array('県名'=> null, '市町村名'=> null);
$chugoku = array('県名'=> null, '市町村名'=> null);
$shikoku = array('県名'=> null, '市町村名'=> null);
$kyushu = array('県名'=> null, '市町村名'=> null);

// 北海道 // 各18行から13行まで削減
$hokkaido_prefs = [];
$hokkaido_cities = [];
for ($i = 1; $i <= 1; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($hokkaido_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($hokkaido_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $hokkaido['県名'] = $hokkaido_prefs;
    $hokkaido['市町村名'] = $hokkaido_cities;
}

// 東北
$tohoku_prefs = [];
$tohoku_cities = [];
for ($i = 2; $i <= 7; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($tohoku_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($tohoku_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $tohoku['県名'] = $tohoku_prefs;
    $tohoku['市町村名'] = $tohoku_cities;  
}

// 関東
$kanto_prefs = [];
$kanto_cities = [];
for ($i = 8; $i <= 14; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($kanto_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($kanto_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $kanto['県名'] = $kanto_prefs;
    $kanto['市町村名'] = $kanto_cities;   
}

// 中部
$chubu_prefs = [];
$chubu_cities = [];
for ($i = 15; $i <= 23; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($chubu_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($chubu_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $chubu['県名'] = $chubu_prefs;
    $chubu['市町村名'] = $chubu_cities;  
}

// 近畿
$kinki_prefs = [];
$kinki_cities = [];
for ($i = 24; $i <= 30; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($kinki_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($kinki_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $kinki['県名'] = $kinki_prefs;
    $kinki['市町村名'] = $kinki_cities;
}

// 中国
$chugoku_prefs = [];
$chugoku_cities = [];
for ($i = 31; $i <= 35; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($chugoku_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($chugoku_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $chugoku['県名'] = $chugoku_prefs;
    $chugoku['市町村名'] = $chugoku_cities;  
}

// 四国
$shikoku_prefs = [];
$shikoku_cities = [];
for ($i = 36; $i <= 39; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($shikoku_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($shikoku_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $shikoku['県名'] = $shikoku_prefs;
    $shikoku['市町村名'] = $shikoku_cities; 
}

// 九州
$kyushu_prefs = [];
$kyushu_cities = [];
for ($i = 40; $i <= 47; $i++) {
    $arr[0][sprintf('%02d', $i)]['name'] . '<br />';
    $num_cities = count($arr[0][sprintf('%02d', $i)]['city']) . '<br />';
    array_push($kyushu_prefs, $arr[0][sprintf('%02d', $i)]['name']);
    for ($j = 0; $j < $num_cities; $j++) {
        $arr[0][sprintf('%02d', $i)]['city'][$j]['city']; // 市町村名の取得
        array_push($kyushu_cities, $arr[0][sprintf('%02d', $i)]['city'][$j]['city']);
    }
    $kyushu['県名'] = $kyushu_prefs;
    $kyushu['市町村名'] = $kyushu_cities;
}

$japan['北海道地方'] = $hokkaido;
$japan['東北地方'] = $tohoku;
$japan['関東地方'] = $kanto;
$japan['中部地方'] = $chubu;
$japan['近畿地方'] = $kinki;
$japan['中国地方'] = $chugoku;
$japan['四国地方'] = $shikoku;
$japan['九州地方'] = $kyushu;

echo '<pre>';
var_dump($japan);
echo '</pre>';

?>