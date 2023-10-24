<html>

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>
    <button type="button" id="func1">検索</button>
    <table border="1">
        <thead>
            <th>id</th>
            <th>名前</th>
            <th></th>
        </thead>
        <tr class='result_list'>
            <td>11</td>
            <td>鈴木一郎</td>
            <td><button type="button">削除</td>
        </tr>
    </table>
    <script>
        $('#func1').on('click', () => {
            $.ajax({
                type: 'get',
                url: 'json',
            }).done(response => {
                $('.result_list').remove();
                response.forEach(element => {
                    $('table').append(
                        `<tr class="result_list">
                            <td>${element.id}</td>
                            <td>${element.name}</td>
                            <td>
                                <button onclick="del_function(${element.id})">
                                    削除
                                </button>
                            </td>
                        </tr>`
                    );
                });
            });
        });

        const del_function = input_id => {
            $.ajax({
                type: 'get',
                url: 'del/' + input_id,
            }).done(response => {
                $('.result_list').remove();
                response.forEach(element => {
                    $('table').append(
                        `<tr class="result_list">
                            <td>${element.id}</td>
                            <td>${element.name}</td>
                            <td>
                                <button onclick="del_function(${element.id})"">削除</button>
                            </td>
                        </tr>`
                    );
                });
            });
        };
    </script>
</body>

</html>
