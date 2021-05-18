<!DOCTYPE html>
<html lang = "ja">
<head><meta charset = "UFT-8"></head>
<body>
<form action = "index.php" method = "get">
<input type = "text" name ="message" pattern=".{1,100}"><br/> <!-- パターン属性だとアラートが表示されるだけなのでNG -->
<input type="checkbox" name="hoby[]" value="musicappreciation">音楽鑑賞<br/>
<input type="checkbox" name="hoby[]" value="moviegoing">映画鑑賞<br/>
<input type="checkbox" name="hoby[]" value="reading">読書<br/>
<input type="checkbox" name="hoby[]" value="fishing">釣り<br/>
<input type = "submit" value ="submit">
</form>
</body>
</html>

<?php

// クロスサイトスクリプティング(XSS)対策
if (!empty($_GET)) {
    if (!empty($_GET['message'])) {
        $message = $_GET['message'];
        $filtered_msg = htmlspecialchars($message);
        echo $filtered_msg . '<br />';
    }
    if (!empty($_GET['hoby'])) {
        $hobby = $_GET['hoby'];
        foreach($hobby as $print) {
            echo $print . '<br />';
        }
    }
}

?>