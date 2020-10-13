<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ジュースのレビューサイト</title>
</head>

<body>
    <h1>ジュースのレビューサイト</h1>
    <div>
        <form action="/new"  method="GET">
            @csrf
            <button type="submit">新規作成</button>
        </form>
    </div>

    @foreach ($juiceList as $image)
        <div>
            <img src="{{$image->image}}" alt="img" style="width:250px; height:100px;">
        </div>
    @endforeach


</body>

</html>
