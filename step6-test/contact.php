<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css">
        <title>お問い合わせフォーム
        </title>
    </head>
    <body>
        <header>
            <h2>お問い合わせフォーム</h2>
        </header>
        <div class="wrapper">
            <aside class="sidebar">
            <ul class="sidebar-list">
               <li class="items"><a href="">トップページ</a></li>
               <li><a href="items">人気投稿</a></li>
               <li><a href="items">エンジニアおすすめ商品</a></li>
               <li><a href="items">エンジニアおすすめ記事</a></li>
               <li><a href="items">投稿ページ</a></li>
            </ul>
            </aside>
        <main class="main-content">
            <form method="POST" action="confirm.php">
            <table border="2" class="table">    
                <tr>
                    <td><label for="name">名前</label></td>
                    <td><input type="text" id="name" name="name"></td>
                </tr> 
                <tr>  
                    <td><label for="companyName">会社名</label></td>
                    <td><input type="text" id="companyName" name="companyName"></td>
                </tr>
                <tr>
                    <td><label for="email">メールアドレス</label></td>
                    <td><input type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="age">年齢</label></td>
                    <td><input type="number" id="age" name="age"></td>
                </tr>
                <tr>
                    <td><label for="message">お問い合わせ内容</label></td>
                    <td><textarea id="message" name="message" placeholder="お問い合わせ内容" cols="40"></textarea></td>
                </tr>
            </table>        
                <button id="btn" type="submit">送信</button>
            </form>
        </main>
        </div>
        <footer id="footer">
            <p>横のボタンを押すとfooterの背景色が変わります。</p>            
            <button id="button1">押してみてね</button>
            <script>
                const button1 = document.getElementById("button1");
                let currentIndex = -1;
                const colors = ["blue","red","yellow","grey"];
                const footer = document.getElementById("footer");

                button1.addEventListener("click",function changeColor(){
                    currentIndex =(currentIndex + 1) % colors.length;
                    footer.style.backgroundColor = colors[currentIndex];
                });
            </script>
        </footer>
    </body>
</html>    