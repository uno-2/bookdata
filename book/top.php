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
		<title>top画面</title>
	</head>
	<body>
        <h1>書籍一覧</h1>
        <hr>
        <button onclick="location.href='registration-input.php'">新規登録</button>
        <table>
    <tr><th>書籍ID</th><th>書籍名</th><th>著者</th><th>更新</th><th>削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from book') as $row) {
        echo '<tr>';
        echo '<td>', $row['book_id'], '</td>';
        echo '<td>', $row['book_name'], '</td>';
        echo '<td>', $row['author'], '</td>';
        echo '<td>';
        echo '<form action="edit-input.php" method="post">';
        echo '<input type="hidden" name="book_id" value="', $row['book_id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="book_id" value="', $row['book_id'],'">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>
