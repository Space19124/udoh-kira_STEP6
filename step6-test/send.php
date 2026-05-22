<?php
                        

                        //届く先のメールアドレス
                        $to = "kiragorira124@gmail.com";

                        //内部文字エンコーティングの設定（日本語用メール）
                        mb_language("japanese");
                        mb_internal_encoding("UTF-8");

                        if ($_SERVER["REQUEST_METHOD"] === "POST"){
                        header("Content-Type: application/json; charset=UTF-8");

                        //jsから送られてきたjsonデータを受け取る
                        $rawInput = file_get_contents("php://input");
                        $data =json_decode($rawInput,true);

                        //返却データの初期値
                        $response = ["success" => false,
                        "message" => "" 
                        ];
                        //必須データがあるかの簡易チェック
                        if (!empty($data["name"]) && !empty($data["email"])){
                        //メールの件名
                        $subject = "【お問い合わせ】" . $data["companyName"]. " ". $data["name"] . "様";

                        //メールの本文組み立て
                        $body = "確認画面から以下の問い合わせがありました。" . "\n";
                        $body .= "[お名前] \n" . $data["name"] . "\n\n";
                        $body .= "[会社名] \n" . $data["companyName"] . "\n\n";
                        $body .= "[メールアドレス] \n" . $data["email"] . "\n\n";
                        $body .= "[年齢] \n" . $data["age"] . "\n\n";
                        $body .= "[お問い合わせ内容] \n" . $data["message"] . "\n";

                        $fromEmail = "no-reply@" . ($_SERVER["HTTP_HOST"] ??  "example.com");
                        $headers = "From: " . mb_encode_mimeheader("システム自動送信") . "<" . $fromEmail . ">\r\n";
                        $headers = "Reply-To:" . mb_encode_mimeheader($data["name"]) . "<" . $data["email"] . ">\r\n"

                        if (mb_send_mail($to,$subject,$body,$headers)){
                            $response["success"] = true; //JS側に成功を伝える    
                        }else {
                            $response["message"] = "メールサーバーのエラーです。";
                        }

                        }else{
                            $response["message"] = "データが不足しています。";
                        }
                            echo json_encode($response);
                            exit;
                        }
                        //B.送信成功後にjavascriptから画面遷移してきた場合
                            $status = $_GET["status"] ?? "";
                        if ($status !== "success") {
                        //直接アクセスされた場合は確認画面などにリダイレクト
                        header("Location:index.php");
                        exit;
                        } else{
                            echo $text;
                        }
            
                        ?>
                <!doctype html>
                <html lang="ja">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width">
                        <title>お問い合わせフォーム - 送信完了画面</title>
                    </head>
                    <body>
                        <header>
                            <h1>お問い合わせフォーム - 送信完了画面</h1>
                        </header>
                        <main>    
                            <p><?php $text = "お問い合わせが送信されました。ありがとうございます!";
                            echo $text;
                            ?> 
                            </p>
                        <ul>
                            <li><a href="contact.php">お問い合わせフォームに戻る</a></li>
                        </ul>
                        </main>
                    </body>    
                </html>

            







