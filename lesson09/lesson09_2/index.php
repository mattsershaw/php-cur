<!-- フォームから送信されたID、パスワードを、名前を会員リストと比較(編集済) -->

<!DOCTYPE html>
<html lang = “ja”>
<head>
<meta charset = “UTF-8”>
<title>GET・POST練習</title>
</head>
<body>
<link rel="stylesheet" href="style.css">
<h1>データの送信</h1>
<form action="index.php" method="post">
<dl class="profile">
<dt>ID</dt>
<dd><input type="text" name="id"></dd>
<dt>パスワード</dt>
<dd><input type="password" name="pass"></dd>
<dt>名前</dt>
<dd><input type="text" name="name"></dd>
</dl>
<input type="submit" value="送信">
</form>
</body>
</html>

<?php

$array = [['id' => '1', 'pass' => '1234', 'name' => '山田'],
          ['id' => '2', 'pass' => '5678', 'name' => '田中'],
          ['id' => '3', 'pass' => '9012', 'name' => '中山'],
         ];

$count = count($array);

for($i = 0; $i < $count; $i++) {
    $array[$i]['id'];
    $array[$i]['pass'];
    $array[$i]['name'];
    if($array[$i]['id'] == $_POST['id'] && $array[$i]['pass'] == $_POST['pass'] && $array[$i]['name'] == $_POST['name']) {
        echo '名前: ' . $array[$i]['name'];
        break;
    } else {
        if (isset($_POST['id'])){
            if ($i = 2) {
                echo 'エラー';
            }
        }
    }
}

?>