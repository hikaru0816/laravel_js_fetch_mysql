<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>非同期通信</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <h1>Laravel×js(Fetch)×MySQLの非同期通信練習<h1>
    <div class="col-sm-4">
        <div class="card mb-5">
            <div class="card-header">詳細検索</div>
            <div class="card-body">
                <p class="card-text">
                    <div class="card-text">
                        <div class="form-group row">
                            <div class="col-md-4">IDを入力:</div>
                            <div class="col-md-7">
                                <input class="form-control" id="id_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button id="ajax_show" class="btn btn-info text-white">詳細ボタン</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="result"></div>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card mb-5">
            <div class="card-header">追加</div>
            <div class="card-body">
                <p class="card-text">
                    <div class="form-group row">
                        <div class="col-md-5">商品名を入力:</div>
                        <div class="col-md-7">
                            <input class="form-control" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">価格を入力:<br><span class="text-danger" style="font-size: 12px;">(数字のみ入力可)</span></div>
                        <div class="col-md-7">
                            <input class="form-control" id="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button id="ajax_add" class="btn btn-info text-white">追加ボタン</button>
                        </div>
                    </div>
                    <div class="col-md-12" id="add_result"></div>
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card mb-5">
            <div class="card-header">削除</div>
            <div class="card-body">
                <p class="card-text">
                    <div class="form-group row">
                        <div class="col-md-4">IDを入力:</div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="id_number_del">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="coml-md-12">
                            <button id="ajax_del" class="btn btn-info text-white">削除ボタン</button>
                        </div>
                    </div>
                    <div class="col-md-12" id="del_result"></div>
                </p>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <tr id="all_show_result">
            <th>id</th>
            <th>商品名</th>
            <th>価格</th>
        </tr>
    </table>

    {{-- 非同期通信処理 --}}
    <script src="js/ajax.js"></script>
</body>
</html>
