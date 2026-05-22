<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width">
        <title>お問い合わせフォーム - 確認画面</title>    
    </head>
    <body>
        <header>
            <h1>お問い合わせフォーム - 確認画面</h1>
        </header>
        <div class="wrapper">
        <aside class="sidebar">
            <ul class="sidebar-list">
                <li class="items"><a href="">トップページ</a></li>
                <li class="items"><a href="">人気投稿</a></li>
                <li class="items"><a href="">エンジニアのおすすめ商品</a></li>
                <li class="items"><a href="">エンジニアのおすすめ記事</a></li>
                <li class="items"><a href="">人気投稿</a></li>
            </ul>
        </aside>    
        <main class="main-content">    
            <table border="1" class="table">
                <tr>
                    <td>名前</td>
                    <td id="name"> <?php echo htmlspecialchars($_POST["name"] ?? "", ENT_QUOTES,"UTF-8"); ?> </td>
                </tr>
                <tr>
                    <td>会社名</td>
                    <td id="companyName"> <?php echo htmlspecialchars($_POST["companyName"] ?? "",ENT_QUOTES,"UTF-8"); ?> </td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td id="email"> <?php echo htmlspecialchars($_POST["email"] ?? "",ENT_QUOTES,"UTF-8"); ?> </td>
                </tr>
                <tr>
                    <td>年齢</td>
                    <td id="age"> <?php echo htmlspecialchars($_POST["age"] ?? "",ENT_QUOTES,"UTF-8"); ?> </td>
                </tr>
                <tr>
                    <td>お問い合わせ内容</td>
                    <td id="message"> <?php echo htmlspecialchars($_POST["message"] ?? "",ENT_QUOTES,"utf-8"); ?> </td>
                </tr>
            </table>
            <button id="button2" onclick="history.back()">戻る</button>
            <button type="button" id="button">送信</button>
            <div id="errorMessage"></div>
            <script src="style.js"></script>
        </main>
        </div>
        <footer></footer>
    </body>
</html>