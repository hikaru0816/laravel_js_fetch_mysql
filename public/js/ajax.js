// 一覧表示
function getAllData() {
    fetch('show_all', {}) // 第1引数に送り先
    .then(response => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ
    .then(res => {
        // データ取得成功時の処理
        // 取得したレコードをforEachで順次取り出す
        res.forEach(element => {
            let insertHTML = "<tr class=\"target\"><td>" + element["id"] + "</td><td>" + element["name"] + "</td><td>" + element["price"] + "</td></tr>";
            let all_show_result = document.getElementById("all_show_result");
            all_show_result.insertAdjacentHTML("afterend", insertHTML);
        });
    })
    // エラー時の処理
    .catch(error => {
        console.log(error);
    });
}

getAllData();

// 詳細ボタンイベント
let ajax_show =document.getElementById('ajax_show');
ajax_show.addEventListener('click', () => {
    const postData = new FormData; // フォーム方式で送るデータの格納場所
    postData.set('id', document.getElementById('id_number').value); // setで送るデータを格納
    fetch('show', {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
        body: postData
    })
    .then(response => response.json())
    .then(res => {
        document.getElementById('result').innerHTML = "ID番号" + res[0].id + "は「" + res[0].name + "」です。価格は「" + res[0].price + "円」です";
    })
    .catch(error => {
        console.log(error);
    });
});

// レコード追加
let ajax_add =document.getElementById('ajax_add');
ajax_add.addEventListener('click', () => {
    const postData = new FormData;
    postData.set('name', document.getElementById('name').value);
    postData.set('price', document.getElementById('price').value);
    fetch('add', {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
        body: postData
    }).then(response => response.json()).then(res => {
        document.getElementById('add_result').innerHTML = "<p>" + res[0].name + "が" + res[0].price + "円のデータを登録しました</p>";
        res.forEach(element => {
            let insertHTML = "<tr class=\"target\"><td>" + element["id"] + "</td><td>" + element["name"] + "</td><td>" + element["price"] + "</td></tr>";
            let all_show_result = document.getElementById("all_show_result");
            all_show_result.insertAdjacentHTML("afterend", insertHTML);
        });
    }).catch(error => {
        console.log(error);
    });
});

// レコードの削除
let ajax_del =document.getElementById('ajax_del');
ajax_del
.addEventListener('click', () => {
    const postData = new FormData;
    postData.set('id', document.getElementById('id_number_del').value);
    fetch('del', {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
        body: postData
    }).then(response => response.json()).then(res => {
        document.getElementById('del_result').innerHTML = res.del[0].name + "が" + res.del[0].price + "円のデータを削除しました。";
        // 一覧表示を全て削除
        const elements = document.getElementsByClassName('target');
        while (elements.length) {
            elements.item(0).remove();
        }
        // 新しく一覧表示
        res.lists.forEach(element => {
            let insertHTML = "<tr class=\"target\"><td>" + element["id"] + "</td><td>" + element["name"] + "</td><td>" + element["price"] + "</td></tr>";
            let all_show_result = document.getElementById("all_show_result");
            all_show_result.insertAdjacentHTML("afterend", insertHTML);
        });
    }).catch(error => {
        console.log(error);
    })
});
