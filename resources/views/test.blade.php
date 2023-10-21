<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-12 mt-3 mb-3 text-end">
                <a href="{{ url('/add') }}">>>登録</a>
            </div>

            <div class="col-12 mt-3 mb-3 text-end">
                <button type="button" id="func1">検索</button>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <th>名前</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th></th>
                </thead>
                <tr>
                    <td>鈴木一郎</td>
                    <td>090-1234-5678</td>
                    <td>test@test.com</td>
                    <td><a href="{{ url('edit') . '/1' }}">>>編集</a></td>
                </tr>
                <tr>
                    <td>鈴木一郎</td>
                    <td>090-1234-5678</td>
                    <td>test@test.com</td>
                    <td><a href="{{ url('edit') . '/2' }}">>>編集</a></td>
                </tr>
                <tr>
                    <td>鈴木一郎</td>
                    <td>090-1234-5678</td>
                    <td>test@test.com</td>
                    <td><a href="{{ url('edit') . '/3' }}">>>編集</a></td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        $('#func1').on('click', () => {
            $.ajax({
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                type: 'get',
                url: 'json',
                dataType: 'json'
            }).done(res => {
                $('td').remove();
                res.forEach(element => {
                    $('table').append(
                        `<tr>
                            <td>${element.id}</td>
                            <td>${element.name}</td>
                            <td>${element.name}</td>
                            <td>
                                <a href="javaScript:void(0)" class="btn btn-danger" onclick = "delfunc(${element.id})">
                                    削除
                                </a>
                            </td>
                        </tr>`
                    );
                });
            }).fail(error => {
                console.log(error);
            });
        });

        const delfunc = input_id => {
            if (confirm('削除してよろしいでしょうか？')) {
                $.ajax({
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    type: 'get',
                    url: 'del/' + input_id,
                    dataType: 'json'
                }).done(res => {
                    $('td').remove();
                    res.forEach(element => {
                        $('table').append(
                            `<tr>
                            <td>${element.id}</td>
                            <td>${element.name}</td>
                            <td>${element.name}</td>
                            <td>
                                <a href="javaScript:void(0)" class="btn btn-danger" onclick = "delfunc(${element.id})">
                                    削除
                                </a>
                            </td>
                        </tr>`
                        );
                    });
                }).fail(error => {
                    console.log(error);
                });
            }
        };
    </script>
</body>

</html>
