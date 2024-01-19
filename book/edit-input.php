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
		<title>更新画面</title>
	</head>
	<body>
    <table>
    <tr><th>書籍ID</th><th>書籍名</th><th>著者</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from book where book_id=?');
	$sql->execute([$_POST['book_id']]);
	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="edit-output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="book_id" value="', $row['book_id'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="book_name" value="', $row['book_name'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="author" value="', $row['author'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

