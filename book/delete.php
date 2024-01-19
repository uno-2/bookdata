<?php
    const SERVER = 'mysql215.phy.lolipop.lan';
    const DBNAME = 'LAA1517425-shop';
    const USER = 'LAA1517425';
    const PASS = 'Pass0809';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>削除画面</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from book where book_id=?');
    if ($sql->execute([$_POST['book_id']])) {
        echo '削除に成功しました。';
    } else {
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
	<table>
		<tr><th>書籍ID</th><th>書籍名</th><th>著者</th></tr>
<?php
    foreach ($pdo->query('select * from book') as $row) {
        echo '<tr>';
        echo '<td>',$row['book_id'], '</td>';
        echo '<td>',$row['book_name'], '</td>';
        echo '<td>',$row['author'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
    <button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>