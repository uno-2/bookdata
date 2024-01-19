<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>登録画面</title>
</head>
<body>
    <p>書籍情報を登録します。</p>
    <form action="registration-output.php" method="post">
        書籍ID<input type="text" name="book_id"><br>
        書籍名<input type="text" name="book_name"><br>
        著者<input type="text" name="author"><br>
        <button type="submit">追加</button>
</form>
</body>
</html>