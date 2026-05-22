const button = document.getElementById("button");
const errorDiv = document.getElementById("errorMessage");

button.addEventListener("click",async () => {
    

    errorDiv.textContent = "";//エラー表示のクリア
    button.disabled = true; //連打防止

    //1.各<td>要素からテキストデータを取得
    const payload = {
    name: document.getElementById("name").textContent.trim(),
    companyName: document.getElementById("companyName").textContent.trim(),
    email: document.getElementById("email").textContent.trim(),
    age: document.getElementById("age").textContent.trim(),
    message: document.getElementById("message").textContent.trim()
    }
    const hasEmptyField = Object.values(payload).some(value => value === "");
    if(hasEmptyField){
        alert("必須項目が未入力です。入力内容をご確認ください。");
        button.disabled = false;
        return;
    }

    const confirmMessage = 
    `以下の内容で送信してもよろしいですか？
    
    【お名前】
    ${payload.name}
    
    【会社名】
    ${payload.companyName}
    
    【メールアドレス】
    ${payload.email}
    
    【年齢】
    ${payload.age}
    
    【お問い合わせ内容】
    ${payload.message}`;
    
    const isConfirmed = confirm(confirmMessage);

    try{
        //2.send.phpにデータを非同期送信
        const response = await fetch("send.php", {
            method: "POST",
            headers:{"Content-Type" : "application/json"},
            body:JSON.stringify(payload)
        });

        if(!response.ok) {
            throw new Error("サーバーとの通信に失敗しました。");
        }
        //3.PHPからの結果を解析して表示を切り替える
        const result = await response.json();

        if(result.success) {
            //3.成功時　send.php　の完了画面URLへ移動(GET遷移)
            window.location.href = "send.php?status=success";
        }else{
            //4.失敗時　画面はそのまま　エラー理由の表示
            errorDiv.textContent = "失敗："+ result.message;
            button.disabled = false;
        }
    } catch (error){
        errorDiv.textContent ="失敗：通信エラーが発生しました。"
        button.disabled = false;
    }
});

//value .textContent　違い　
//入力可能：value
//入力不可: textContent