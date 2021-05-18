<!DOCTYPE html>
<html lang = “ja”>
<head>
<meta charset = “UTF-8”>
<title>GET・POST練習</title>
</head>
<body>
<h1>データの送信</h1>
<form action="index.php" method="post">
<label>名前</label><input type="text" name="name"><br/>
<label>年齢</label><input type="number" name="age"><br/>
<input type="submit" value="送信">
</form>
</body>
</html>

<?php

// 上記のフォームからデータを受け取り、「XXさんはXX歳です」と表示
if (isset($_POST['name'])){
    if ($_POST['age'] > 120) {
        echo 'エラー';
    } else {
        echo $_POST['name'] . 'さんは' . $_POST['age'] . '歳です';
    }
}

?>