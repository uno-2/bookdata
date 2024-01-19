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
        <title>登録画面</title>
    </head>
    <body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into book(book_id, book_name, author)values (?, ?, ?)');
    if (empty($_POST['book_name'] )) {
        echo '書籍名を入力してください。';
    }else if (empty($_POST['book_name'] )) {
        echo '著者を入力してください。';
    }else if ($sql->execute([ $_POST['book_id'], $_POST['book_name'], $_POST['author'] ]) ) {
        echo '<font color="red">登録に成功しました。</font>';
    } else {
        echo '<font color="red">登録に失敗しました。</font>';
    }
?>
    <br><hr><br>
    <table>
        <tr><th>書籍ID</th><th>書籍名</th><th>著者</th></tr>
<?php
    foreach ($pdo->query('select * from book') as $row) {
        echo '<tr>';
        echo '<td>', $row['book_id'], '</td>';
        echo '<td>', $row['book_name'], '</td>';
        echo '<td>', $row['author'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
</table>
    <form action="registration-input.php" method="post">
        <button type="submit">登録画面に戻る</button>
</form>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>